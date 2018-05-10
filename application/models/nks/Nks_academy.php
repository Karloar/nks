<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/4
 * Time: 19:56
 */

class Nks_academy extends CI_Model
{
    const _table = 'nks_academy';
    public $ac_id;
    public $ac_name;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($arr) {
        $this->ac_id = isset($arr['ac_id']) ? $arr['ac_id']: null;
        $this->ac_name = $arr['ac_name'];
        return $this->db->insert(Nks_academy::_table, $this);
    }

    public function getAllAcademies() {
        $query = $this->db->get(Nks_academy::_table);
        return $query->result();
    }

    public function getAcademyById($ac_id) {
        $query = $this->db->where('ac_id', $ac_id)->get(Nks_academy::_table);
        return $query->result()[0];
    }

    public function update($arr) {
        $this->ac_id = $arr['ac_id'];
        $this->ac_name = $arr['ac_name'];
        return $this->db->where('ac_id', $arr['ac_id'])->update(Nks_academy::_table, $this);
    }

    public function deleteAcademyById($ac_id) {
        $res = $this->db->where('ac_id', $ac_id)->get('nks_major');
        foreach($res->result() as $row) {
            $this->db->delete('nks_major', array('mj_id'=>$row->mj_id));
        }
        $res = $this->db->where('ac_id', $ac_id)->get('nks_exam');
        foreach($res->result() as $row) {
            $row->ac_id = 0;
            $row->mj_id = 0;
            $this->db->where('ex_id', $row->ex_id)->update('nks_exam', $row);
        }

        return $this->db->delete(Nks_academy::_table, array('ac_id'=>$ac_id));
    }
}