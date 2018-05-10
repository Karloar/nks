<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/6
 * Time: 16:17
 */

class Nks_exam extends CI_Model {

    const _table = 'nks_exam';

    public $ex_id;
    public $ex_name;
    public $ex_grade;
    public $nt_id;
    public $ex_mode;
    public $ex_date;
    public $tm_id = 0;
    public $pl_id = 0;
    public $ac_id = 0;
    public $mj_id = 0;
    public $class_id = 0;
    public $ex_stunum;
    public $ex_absence;
    public $ex_invinum;
    public $ex_maininv;
    public $ex_invname;
    public $ex_xunkao;
    public $ex_note;
    public $ex_lab = 0;
    public $ex_input_date;



    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($arr) {
        $this->ex_id = isset($arr['ex_id']) ? $arr['ex_id']: null;
        $this->ex_name = $arr['ex_name'];
        $this->ex_grade = $arr['ex_grade'];
        $this->nt_id = $arr['nt_id'];
        $this->ex_mode = $arr['ex_mode'];
        $this->ex_date = $arr['ex_date'];
        $this->tm_id = isset($arr['tm_id']) ? $arr['tm_id']: $this->tm_id;
        $this->pl_id = isset($arr['pl_id']) ? $arr['pl_id']: $this->pl_id;
        $this->ac_id = isset($arr['ac_id']) ? $arr['ac_id']: $this->ac_id;
        $this->mj_id = isset($arr['mj_id']) ? $arr['mj_id']: $this->mj_id;
        $this->class_id = isset($arr['class_id']) ? $arr['class_id']: $this->class_id;
        $this->ex_stunum = $arr['ex_stunum'];
        $this->ex_absence = $arr['ex_absence'];
        $this->ex_invinum = $arr['ex_invinum'];
        $this->ex_maininv = $arr['ex_maininv'];
        $this->ex_invname = isset($arr['ex_invname']) ? $arr['ex_invname']: '';
        $this->ex_xunkao = $arr['ex_xunkao'];
        $this->ex_note = $arr['ex_note'];
        $this->ex_lab = isset($arr['ex_lab']) ? $arr['ex_lab']: $this->ex_lab;
        $this->ex_input_date = $arr['ex_input_date'];
        return $this->db->insert(Nks_exam::_table, $this);
    }

    public function getExamById($ex_id) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->where('ex_id', $ex_id)
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->get(Nks_exam::_table);
        return $query->result()[0];
    }

    public function getExamsByPage($firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->limit($maxResults, $firstResult)->order_by('ex_input_date desc')
            ->get(Nks_exam::_table);
        return $query->result();
    }

    public function getExamsNotInvByPage($firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->where('ex_invname', '')
            ->limit($maxResults, $firstResult)->order_by('ex_input_date desc')
            ->get(Nks_exam::_table);
        return $query->result();
    }

    public function getExamsInvByPage($firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->where('ex_invname !=', '')
            ->limit($maxResults, $firstResult)->order_by('ex_input_date desc')
            ->get(Nks_exam::_table);
        return $query->result();
    }

    public function getExamsByLabByPage($lb_id, $firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->where('lb_id', $lb_id)
            ->limit($maxResults, $firstResult)->order_by('ex_input_date desc')
            ->get(Nks_exam::_table);
        return $query->result();
    }

    public function getExamsInvByLabByPage($lb_id, $firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->where('ex_invname !=', '')
            ->where('lb_id', $lb_id)
            ->limit($maxResults, $firstResult)->order_by('ex_input_date desc')
            ->get(Nks_exam::_table);
        return $query->result();
    }

    public function getExamsNotInvByLabByPage($lb_id, $firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->where('ex_invname', '')
            ->where('lb_id', $lb_id)
            ->limit($maxResults, $firstResult)->order_by('ex_input_date desc')
            ->get(Nks_exam::_table);
        return $query->result();
    }

    public function getExamNum() {
        return $this->db->count_all(Nks_exam::_table);
    }

    public function getInvExamNum() {
        return $this->db->where('ex_invname !=', '')->count_all(Nks_exam::_table);
    }

    public function getNotInvExamNum() {
        return $this->db->where('ex_invname', '')->count_all(Nks_exam::_table);
    }

    public function getExamNumByLabId($lb_id) {
        return $this->db->where('ex_lab', $lb_id)->count_all(Nks_exam::_table);
    }

    public function getInvExamNumByLabId($lb_id) {
        return $this->db->where('ex_invname !=', '')->where('ex_lab', $lb_id)->count_all(Nks_exam::_table);
    }

    public function getNotInvExamNumByLabId($lb_id) {
        return $this->db->where('ex_invname', '')->where('ex_lab', $lb_id)->count_all(Nks_exam::_table);
    }

    public function update($arr) {
        $data = array(
            'ex_name' => $arr['ex_name'],
            'ex_grade' => $arr['ex_grade'],
            'nt_id' => $arr['nt_id'],
            'ex_mode' => $arr['ex_mode'],
            'ex_date' => $arr['ex_date'],
            'tm_id' => isset($arr['tm_id']) ? $arr['tm_id']: 0,
            'pl_id' => isset($arr['pl_id']) ? $arr['pl_id']: 0,
            'ac_id' => isset($arr['ac_id']) ? $arr['ac_id']: 0,
            'mj_id' => isset($arr['mj_id']) ? $arr['mj_id']: 0,
            'class_id' => isset($arr['class_id']) ? $arr['class_id']: 0,
            'ex_stunum' => $arr['ex_stunum'],
            'ex_absence' => $arr['ex_absence'],
            'ex_invinum' => $arr['ex_invinum'],
            'ex_invname' => isset($arr['ex_invname']) ? $arr['ex_invname']: '',
            'ex_xunkao' => $arr['ex_xunkao'],
            'ex_note' => $arr['ex_note'],
            'ex_lab' => isset($arr['ex_lab']) ? $arr['ex_lab']: $this->getExamById($this->ex_id)->ex_lab,
            'ex_input_date' => $arr['ex_input_date'],
        );

        return $this->db->where('ex_id', $arr['ex_id'])->update(Nks_exam::_table, $data);
    }


    public function deleteExamById($ex_id) {
        return $this->db->delete(Nks_exam::_table, array('ex_id'=>$ex_id));
    }

}