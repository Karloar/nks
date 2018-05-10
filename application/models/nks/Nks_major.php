<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/4
 * Time: 19:56
 */

class Nks_major extends CI_Model
{
    const _table = 'nks_major';
    public $mj_id;
    public $mj_name;
    public $ac_id;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($arr) {
        $this->mj_id = isset($arr['mj_id']) ? $arr['mj_id']: null;
        $this->mj_name = $arr['mj_name'];
        $this->ac_id = $arr['ac_id'];
        return $this->db->insert(Nks_major::_table, $this);
    }

    public function getAllMajors() {
        $query = $this->db->select(array('mj_id', 'mj_name', 'nks_major.ac_id as ac_id', 'ac_name'))
            ->from(Nks_major::_table)
            ->join('nks_academy', 'nks_academy.ac_id=nks_major.ac_id', 'left')
            ->get();
        return $query->result();
    }

    public function getMajorById($mj_id) {
        $query = $this->db->where('mj_id', $mj_id)->get(Nks_major::_table);
        return $query->result()[0];
    }

    public function getMajorsByAcId($ac_id) {
        $query = $this->db->where('ac_id', $ac_id)->get(Nks_major::_table);
        return $query->result();
    }

    public function update($arr) {
        $this->mj_id = $arr['mj_id'];
        $this->mj_name = $arr['mj_name'];
        $this->ac_id = $arr['ac_id'];
        return $this->db->where('mj_id', $arr['mj_id'])->update(Nks_major::_table, $this);
    }

    public function deleteMajorById($mj_id) {
        $res = $this->db->where('mj_id', $mj_id)->get('nks_exam');
        foreach($res->result() as $row) {
            $row->mj_id = 0;
            $this->db->where('ex_id', $row->ex_id)->update('nks_exam', $row);
        }
        return $this->db->delete(Nks_major::_table, array('mj_id'=>$mj_id));
    }
}