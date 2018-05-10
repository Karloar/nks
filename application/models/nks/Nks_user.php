<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/4
 * Time: 9:37
 */

class Nks_user extends CI_Model
{
    const _table = 'nks_user';
    public $us_id;
    public $us_number;
    public $us_name;
    public $us_password;
    public $us_email;
    public $us_img;
    public $us_admin = 0;
    public $us_phone;
    public $us_solt;




    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function us_number_exists($us_number) {
        $this->db->where('us_number', $us_number);
        $query = $this->db->get(Nks_user::_table);
        return count($query->result()) != 0;
    }


    public function insert($arr) {
        $this->us_id = isset($arr['us_id']) ? $arr['us_id'] : null;
        $this->us_number = $arr['us_number'];
        $this->us_name = $arr['us_name'];
        $this->us_password = $arr['us_password'];
        $this->us_email = $arr['us_email'];
        $this->us_img = isset($arr['us_img']) ? $arr['us_img'] : null;
        $this->us_admin = isset($arr['us_admin']) ? $arr['us_admin']: $this->us_admin;
        $this->us_phone = $arr['us_phone'];
        $this->us_solt = $arr['us_solt'];
        return $this->db->insert(Nks_user::_table, $this);
    }

    public function update($arr) {
        $this->us_id = $arr['us_id'];
        $this->us_number = $arr['us_number'];
        $this->us_name = $arr['us_name'];
        $this->us_password = $arr['us_password'];
        $this->us_email = $arr['us_email'];
        $this->us_img = isset($arr['us_img']) ? $arr['us_img'] : null;
        $this->us_phone = $arr['us_phone'];
        $this->us_admin = isset($arr['us_admin']) ? $arr['us_admin']: $this->db->select('us_admin')->where('us_id', $arr['us_id'])->get(Nks_user::_table)->result()[0];
        $this->us_solt = $this->db->select('us_solt')->where('us_id', $arr['us_id'])->get(Nks_user::_table)->result()[0];
        return $this->db->where('us_id', $arr['us_id'])->update(Nks_user::_table, $this);
    }

    public function getAllUsers() {
        $query = $this->db->get(Nks_user::_table);
        return $query->result();
    }

    public function getUsersByAdmin($us_admin) {
        $query = $this->db->where('us_admin', $us_admin)->get(Nks_user::_table);
        return $query->result();
    }


    public function getUsersByPage($firstResult, $maxResults) {
        $query = $this->db->limit($maxResults, $firstResult)->order_by('us_admin desc, us_number asc')->get(Nks_user::_table);
        return $query->result();
    }

    public function getUserById($us_id) {
        $this->db->where('us_id', $us_id);
        $query = $this->db->get(Nks_user::_table);
        return $query->result()[0];
    }

    public function getUserByNumber($us_number) {
        $this->db->where('us_number', $us_number);
        $query = $this->db->get(Nks_user::_table);
        return $query->result()[0];
    }

    public function deleteUserById($us_id) {
        return $this->db->delete(Nks_user::_table, array('us_id'=>$us_id));
    }



}