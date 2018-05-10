<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/4
 * Time: 19:56
 */

class Nks_nature extends CI_Model
{
    const _table = 'nks_nature';
    public $nt_id;
    public $nt_name;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($arr) {
        $this->nt_id = isset($arr['nt_id']) ? $arr['nt_id']: null;
        $this->nt_name = $arr['nt_name'];
        return $this->db->insert(Nks_nature::_table, $this);
    }

    public function getAllNatures() {
        $query = $this->db->get(Nks_nature::_table);
        return $query->result();
    }

    public function getNatureById($nt_id) {
        $query = $this->db->where('nt_id', $nt_id)->get(Nks_nature::_table);
        return $query->result()[0];
    }

    public function update($arr) {
        $this->nt_name = $arr['nt_name'];
        $this->nt_id = $arr['nt_id'];
        return $this->db->where('nt_id', $arr['nt_id'])->update(Nks_nature::_table, $this);
    }

    public function deleteNatureById($nt_id) {
        $res = $this->db->where('nt_id', $nt_id)->get('nks_exam');
        foreach($res->result() as $row) {
            $row->nt_id = 0;
            $this->db->where('ex_id', $row->ex_id)->update('nks_exam', $row);
        }
        return $this->db->delete(Nks_nature::_table, array('nt_id'=>$nt_id));
    }
}