<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/4
 * Time: 19:56
 */

class Nks_place extends CI_Model
{
    const _table = 'nks_place';
    public $pl_id;
    public $pl_place;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($arr) {
        $this->pl_id = isset($arr['pl_id']) ? $arr['pl_id']: null;
        $this->pl_place = $arr['pl_place'];
        return $this->db->insert(Nks_place::_table, $this);
    }

    public function getAllPlaces() {
        $query = $this->db->get(Nks_place::_table);
        return $query->result();
    }

    public function getPlaceById($pl_id) {
        $query = $this->db->where('pl_id', $pl_id)->get(Nks_place::_table);
        return $query->result()[0];
    }

    public function update($arr) {
        $this->pl_place = $arr['pl_place'];
        $this->pl_id = $arr['pl_id'];
        return $this->db->where('pl_id', $arr['pl_id'])->update(Nks_place::_table, $this);
    }

    public function deletePlaceById($pl_id) {
        $res = $this->db->where('pl_id', $pl_id)->get('nks_exam');
        foreach($res->result() as $row) {
            $row->pl_id = 0;
            $this->db->where('ex_id', $row->ex_id)->update('nks_exam', $row);
        }
        return $this->db->delete(Nks_place::_table, array('pl_id'=>$pl_id));
    }
}