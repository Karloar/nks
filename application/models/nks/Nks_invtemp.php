<?php
/**
 * Created by PhpStorm.
 * User: Karloar
 * Date: 2018/6/9
 * Time: 11:49
 */

class Nks_invtemp extends CI_Model
{
    const _table = 'nks_invtemp';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($arr) {
        $data = array(
            'ex_id' => $arr['ex_id'],
            'ex_invname' => $arr['ex_invname'],
            'ex_invinum' => $arr['ex_invinum']
        );
        return $this->db->insert(self::_table, $data);
    }

    public function update($arr) {
        $data = array(
            'ex_id' => $arr['ex_id'],
            'ex_invname' => $arr['ex_invname'],
            'ex_invinum' => $arr['ex_invinum']
        );
        return $this->db->where('tinv_id', $arr['tinv_id'])->update(self::_table, $data);
    }

    public function deleteById($tinv_id) {
        return $this->db->delete(self::_table, array('tinv_id'=>$tinv_id));
    }

    public function getInvtempByExid($ex_id) {
        $query = $this->db->where('ex_id', $ex_id)->get(self::_table);
        return count($query->result()) > 0 ? $query->result()[0]: null;
    }
}