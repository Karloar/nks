<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/6
 * Time: 16:17
 */

// 按照班级升序排序
function class_name_cmp($a, $b) {
    $x = explode('-', $a->class_name);
    $y = explode('-', $b->class_name);
    $x = str_replace('班', '', $x);
    $y = str_replace('班', '', $y);
    if($a->ex_date > $b->ex_date) {
        return 1;
    } elseif($a->ex_date < $b->ex_date) {
        return -1;
    } else {
        if($a->tm_time > $b->tm_time) {
            return 1;
        } elseif($a->tm_time < $b->tm_time) {
            return -1;
        } else {
            if($a->ex_name > $b->ex_name) {
                return 1;
            } elseif($a->ex_name < $b->ex_name) {
                return -1;
            } else {
                if($a->ex_grade > $b->ex_grade) {
                    return 1;
                } elseif($a->ex_grade < $b->ex_grade) {
                    return -1;
                } else {
                    return $x[0] > $y[0];
                }
            }
        }
    }

    return 0;
}


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
    public $ex_not_lab = '';



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
        $this->ex_not_lab = $arr['ex_not_lab'];
        return $this->db->insert(Nks_exam::_table, $this);
    }

    public function getExamById($ex_id) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->where('ex_id', $ex_id)
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id', 'left')
            ->get(Nks_exam::_table);
        return $query->result()[0];
    }

    public function getExamsByPage($firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id', 'left')
            ->limit($maxResults, $firstResult)->order_by('ex_input_date desc')
            ->get(Nks_exam::_table);
        return $query->result();
    }

    public function getExamsBetweenDateByPage($begin_date, $end_date, $firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id', 'left')
            ->where('ex_date >=', $begin_date)
            ->where('ex_date <=', $end_date)
            ->get(Nks_exam::_table);
        $rs = $query->result();
        usort($rs, 'class_name_cmp');
        return array_slice($rs, $firstResult, $maxResults);
    }

    public function getExamsBetweenDateByNameByPage($begin_date, $end_date, $ex_name, $firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id', 'left')
            ->where('ex_date >=', $begin_date)
            ->where('ex_date <=', $end_date)
            ->where('ex_name', $ex_name)
            ->get(Nks_exam::_table);
        $rs = $query->result();
        usort($rs, 'class_name_cmp');
        return array_slice($rs, $firstResult, $maxResults);
    }

//    得到没有录入监考教师的考试
    public function getExamsNotInvByPage($firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id', 'left')
            ->where('ex_invname', '')
            ->where('ex_lab !=', 0)
            ->get(Nks_exam::_table);
        $rs = $query->result();
        usort($rs, 'class_name_cmp');
        return array_slice($rs, $firstResult, $maxResults);
    }

//    根据日期范围得到没有安排监考研究室的考试
    public function getExamsNotLabByDateByPage($begin_date, $end_date, $firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id', 'left')
            ->where('ex_date >=', $begin_date)
            ->where('ex_date <=', $end_date)
            ->where('ex_lab', 0)
            ->get(Nks_exam::_table);
        $rs = $query->result();
        usort($rs, 'class_name_cmp');
        return array_slice($rs, $firstResult, $maxResults);
    }

//    根据日期范围得到没有安排监考研究室的考试数目
    public function getExamNotLabByDateNum($begin_date, $end_date) {
        return $this->db
            ->where('ex_date >=', $begin_date)
            ->where('ex_date <=', $end_date)
            ->where('ex_lab', 0)->get(self::_table)->num_rows();
    }

//    得到当天录入或修改的考试
    public function getExamsUpdateTodayByPage($today, $firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id', 'left')
            ->where('ex_input_date like', $today . '%')
            ->get(Nks_exam::_table);
        $rs = $query->result();
        usort($rs, 'class_name_cmp');
        return array_slice($rs, $firstResult, $maxResults);
    }

//    得到当天录入或修改的考试数目
    public function getExamUpdateLabTodayNum($today) {
        return $this->db
            ->where('ex_input_date like', $today . '%')
            ->get(self::_table)->num_rows();
    }


    public function getExamsInvByPage($firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id', 'left')
            ->where('ex_invname !=', '')
            ->limit($maxResults, $firstResult)->order_by('ex_input_date desc')
            ->get(Nks_exam::_table);
        return $query->result();
    }

    public function getExamsByLabByDate($lb_id, $ex_date) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id', 'left')
            ->where('ex_date', $ex_date)
            ->where('lb_id', $lb_id)
            ->get(Nks_exam::_table);
        return $query->result();
    }

    public function getExamsByLabByPage($lb_id, $firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id', 'left')
            ->where('lb_id', $lb_id)
            ->limit($maxResults, $firstResult)->order_by('ex_input_date desc')
            ->get(Nks_exam::_table);
        return $query->result();
    }

    public function getExamsInvByLabByPage($lb_id, $firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id', 'left')
            ->where('ex_invname !=', '')
            ->where('lb_id', $lb_id)
            ->limit($maxResults, $firstResult)->order_by('ex_input_date desc')
            ->get(Nks_exam::_table);
        return $query->result();
    }

    public function getExamsNotInvByLabByPage($lb_id, $firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id', 'left')
            ->where('ex_invname', '')
            ->where('lb_id', $lb_id)
            ->limit($maxResults, $firstResult)->order_by('ex_input_date desc')
            ->get(Nks_exam::_table);
        return $query->result();
    }

    public function getExamsNotLabByPage($firstResult, $maxResults) {
        $query = $this->db->join('nks_time', 'nks_exam.tm_id=nks_time.tm_id', 'left')
            ->join('nks_place', 'nks_exam.pl_id=nks_place.pl_id', 'left')
            ->join('nks_major', 'nks_exam.mj_id=nks_major.mj_id', 'left')
            ->join('nks_academy', 'nks_exam.ac_id=nks_academy.ac_id', 'left')
            ->join('nks_class', 'nks_exam.class_id=nks_class.class_id', 'left')
            ->join('nks_nature', 'nks_exam.nt_id=nks_nature.nt_id', 'left')
            ->join('nks_lab', 'ex_lab=lb_id', 'left')
            ->join('nks_user', 'nks_lab.us_id=nks_user.us_id', 'left')
            ->where('ex_lab', 0)
            ->get(Nks_exam::_table);
        $rs = $query->result();
        usort($rs, 'class_name_cmp');
        return array_slice($rs, $firstResult, $maxResults);
    }

    public function getExamBetweenDateNum($begin_date, $end_date) {
        return $this->db->where('ex_date >=', $begin_date)
            ->where('ex_date <=', $end_date)
            ->get(self::_table)->num_rows();
    }

    public function getExamBetweenDateByNameNum($begin_date, $end_date, $ex_name) {
        return $this->db->where('ex_date >=', $begin_date)
            ->where('ex_date <=', $end_date)
            ->where('ex_name', $ex_name)
            ->get(self::_table)->num_rows();
    }

    public function getExamNotLabNum() {
        return $this->db->where('ex_lab', 0)->get(self::_table)->num_rows();
    }


    public function getExamNum() {
        return $this->db->count_all(Nks_exam::_table);
    }

    public function getInvExamNum() {
        return $this->db->where('ex_invname !=', '')->get(self::_table)->num_rows();
    }

    public function getNotInvExamNum() {
        return $this->db->where('ex_lab !=', 0)->where('ex_invname', '')->get(self::_table)->num_rows();
    }

    public function getExamNumByLabId($lb_id) {
        return $this->db->where('ex_lab', $lb_id)->get(self::_table)->num_rows();
    }

    public function getInvExamNumByLabId($lb_id) {
        return $this->db->where('ex_invname !=', '')->where('ex_lab', $lb_id)->get(self::_table)->num_rows();
    }

    public function getNotInvExamNumByLabId($lb_id) {
        return $this->db->where('ex_invname', '')->where('ex_lab', $lb_id)->get(self::_table)->num_rows();
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
            'ex_not_lab' => $arr['ex_not_lab'],
        );

        return $this->db->where('ex_id', $arr['ex_id'])->update(Nks_exam::_table, $data);
    }


    public function deleteExamById($ex_id) {
        return $this->db->delete(Nks_exam::_table, array('ex_id'=>$ex_id));
    }

}