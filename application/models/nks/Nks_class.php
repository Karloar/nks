<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/4
 * Time: 19:56
 */

class Nks_class extends CI_Model
{
    const _table = 'nks_class';
    public $class_id;
    public $class_name;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($arr) {
        $this->class_id = isset($arr['class_id']) ? $arr['class_id']: null;
        $this->class_name = $arr['class_name'];
        return $this->db->insert(Nks_class::_table, $this);
    }

    public function getAllClasses() {
        $query = $this->db->get(Nks_class::_table);
        return $query->result();
    }

    public function getClassById($class_id) {
        $query = $this->db->where('class_id', $class_id)->get(Nks_class::_table);
        return $query->result()[0];
    }

    public function update($arr) {
        $this->class_name = $arr['class_name'];
        $this->class_id = $arr['class_id'];
        return $this->db->where('class_id', $arr['class_id'])->update(Nks_class::_table, $this);
    }

    public function deleteClassById($class_id) {
        $res = $this->db->where('class_id', $class_id)->get('nks_exam');
        foreach($res->result() as $row) {
            $row->class_id = 0;
            $this->db->where('ex_id', $row->ex_id)->update('nks_exam', $row);
        }
        return $this->db->delete(Nks_class::_table, array('class_id'=>$class_id));
    }
}