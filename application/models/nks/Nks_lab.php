<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/4
 * Time: 19:55
 */

class Nks_lab extends CI_Model
{
    const _table = 'nks_lab';
    public $lb_id;
    public $lb_name;
    public $lb_num;
    public $lb_ex_num = 0;
    public $us_id;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($arr) {
        $this->lb_id = isset($arr['lb_id']) ? $arr['lb_id']: null;
        $this->lb_name = $arr['lb_name'];
        $this->lb_num = $arr['lb_num'];
        $this->lb_ex_num = isset($arr['lb_ex_num']) ? $arr['lb_ex_num']: $this->lb_ex_num;
        $this->us_id = $arr['us_id'];
        return $this->db->insert(Nks_lab::_table, $this);
    }

    public function getAllLabs() {
        $query = $this->db->from(Nks_lab::_table)
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id')
            ->get();
        return $query->result();
    }

    public function getLabsOrderByExnum() {
        $query = $this->db->from(Nks_lab::_table)
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id')
            ->order_by('lb_ex_num asc, lb_num asc')
            ->get();
        return $query->result();
    }

    public function getLabById($lb_id) {
        $query = $this->db->from(Nks_lab::_table)
            ->where('lb_id', $lb_id)
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id')
            ->get();
        return $query->result()[0];
    }

    public function getLabByUsId($us_id) {
        $query = $this->db->from(Nks_lab::_table)
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id')
            ->where('nks_user.us_id', $us_id)
            ->get();
        return $query->result()[0];
    }

    public function getLabsByPage($firstResult, $maxResults) {
        $query = $this->db->from(Nks_lab::_table)
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id')
            ->order_by('lb_num desc')
            ->limit($maxResults, $firstResult)
            ->get();
        return $query->result();
    }

    public function update($arr) {
        $this->lb_id = $arr['lb_id'];
        $this->lb_name = $arr['lb_name'];
        $this->lb_num = $arr['lb_num'];
        $this->us_id = $arr['us_id'];
        $this->lb_ex_num = isset($arr['lb_ex_num']) ? $arr['lb_ex_num']: $this->db->select('lb_ex_num')
            ->where('lb_id', $this->lb_id)->get(Nks_lab::_table)->result();
        return $this->db->where('lb_id', $arr['lb_id'])->update(Nks_lab::_table, $this);
    }

    public function deleteLabById($lb_id) {
        $res = $this->db->where('ex_lab', $lb_id)->get('nks_exam');
        foreach($res->result() as $row) {
            $row->ex_lab = 0;
            $this->db->where('ex_id', $row->ex_id)->update('nks_exam', $row);
        }
        return $this->db->delete(Nks_lab::_table, array('lb_id'=>$lb_id));
    }

}