<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/4
 * Time: 19:56
 */

class Nks_time extends CI_Model
{
    const _table = 'nks_time';
    public $tm_id;
    public $tm_time;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($arr) {
        $this->tm_id = isset($arr['tm_id']) ? $arr['tm_id']: null;
        $this->tm_time = $arr['tm_time'];
        return $this->db->insert(Nks_time::_table, $this);
    }

    public function tm_time_exists($tm_time) {
        $query = $this->db->where('tm_time', $tm_time)->get(Nks_time::_table);
        return count($query->result()) > 0;
    }

    public function getAllTime() {
        $query = $this->db->get(Nks_time::_table);
        return $query->result();
    }

    public function getTimeById($tm_id) {
        $query = $this->db->where('tm_id', $tm_id)->get(Nks_time::_table);
        return $query->result()[0];
    }

    public function update($arr) {
        $this->tm_time = $arr['tm_time'];
        $this->tm_id = $arr['tm_id'];
        return $this->db->where('tm_id', $arr['tm_id'])->update(Nks_time::_table, $this);
    }

    public function deleteTimeById($tm_id) {
        $res = $this->db->where('tm_id', $tm_id)->get('nks_exam');
        foreach($res->result() as $row) {
            $row->tm_id = 0;
            $this->db->where('ex_id', $row->ex_id)->update('nks_exam', $row);
        }
        return $this->db->delete(Nks_time::_table, array('tm_id'=>$tm_id));
    }
}