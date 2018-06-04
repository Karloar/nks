<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/5
 * Time: 15:50
 */
require_once('Nksmanager.php');

// 按照教研室老师人数降序排序
function rlb_num_cmp($a, $b) {
    return $a->lb_num < $b->lb_num;
}

// 按照教研室老师人数升序排序
function lb_num_cmp($a, $b) {
    return $a->lb_num > $b->lb_num;
}

// 按照考试监考教师降序排序
function rex_invinum_cmp($a, $b) {
    return $a->ex_invinum < $b->ex_invinum;
}

// 按照考试监考教师升序排序
function ex_invinum_cmp($a, $b) {
    return $a->ex_invinum > $b->ex_invinum;
}



class Nksexam extends Nksmanager
{
    public function __construct()
    {
        parent::__construct();
    }

//  显示所有考试列表
    public function examlist() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '考试列表',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $this->load->model('nks/nks_exam');
        $per_page_num = 13;
        $firstResult = $this->uri->segment(3);
        if(!isset($firstResult) || $firstResult == '') {
            $firstResult = 0;
        }
        $total_num = $this->nks_exam->getExamNum();
        $this->myinput->load_page($total_num, 'nksexam/examlist', $per_page_num);
        $data['result'] = $this->nks_exam->getExamsByPage($firstResult, $per_page_num);
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_exam/examlist");
        $this->load->view("nks/nks_global/footer_man");
    }

//  显示所有已录入监考教师的考试列表
    public function examlistinv() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '考试列表（已录入监考教师）',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $this->load->model('nks/nks_exam');
        $per_page_num = 13;
        $firstResult = $this->uri->segment(3);
        if(!isset($firstResult) || $firstResult == '') {
            $firstResult = 0;
        }
        $total_num = $this->nks_exam->getInvExamNum();
        $this->myinput->load_page($total_num, 'nksexam/examlistinv', $per_page_num);
        $data['result'] = $this->nks_exam->getExamsInvByPage($firstResult, $per_page_num);

        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_exam/examlistinv_admin");
        $this->load->view("nks/nks_global/footer_man");
    }

//  显示所有没有录入监考教师的考试列表
    public function examlistnotinv() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '考试列表（未录入监考教师）',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $this->load->model('nks/nks_exam');
        $per_page_num = 13;
        $firstResult = $this->uri->segment(3);
        if(!isset($firstResult) || $firstResult == '') {
            $firstResult = 0;
        }
        $total_num = $this->nks_exam->getNotInvExamNum();
        $this->myinput->load_page($total_num, 'nksexam/examlistnotinv', $per_page_num);
        $data['result'] = $this->nks_exam->getExamsNotInvByPage($firstResult, $per_page_num);

        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_exam/examlistnotinv_admin");
        $this->load->view("nks/nks_global/footer_man");
    }

//   显示今天添加或修改的考试列表
    public function showTodayExamList() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '考试列表（今日录入或修改）',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $this->load->model('nks/nks_exam');
        $per_page_num = 13;
        $firstResult = $this->uri->segment(3);
        if(!isset($firstResult) || $firstResult == '') {
            $firstResult = 0;
        }
        date_default_timezone_set("Asia/Shanghai");
        $today = date('Y-m-d');
        $total_num = $this->nks_exam->getExamUpdateLabTodayNum($today);
        $this->myinput->load_page($total_num, 'nksexam/showTodayExamList', $per_page_num);
        $data['result'] = $this->nks_exam->getExamsUpdateTodayByPage($today, $firstResult, $per_page_num);
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_exam/examlist_add");
        $this->load->view("nks/nks_global/footer_man");
    }



//  添加考试信息
    public function examadd(){
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];

        if(isset($_POST['ex_name']) && $_POST['ex_name'] != '' && isset($_POST['ex_grade']) && $_POST['ex_grade'] != ''
            && isset($_POST['ex_date']) && $_POST['ex_date'] != '' && isset($_POST['ex_invinum']) && $_POST['ex_invinum'] != '') {
            $arr = $this->myinput->getBykeys(array('ex_name', 'ex_grade', 'nt_id', 'ex_mode', 'ex_date', 'tm_id',
                'pl_id', 'ac_id', 'mj_id', 'class_id', 'ex_stunum', 'ex_absence', 'ex_invinum', 'ex_maininv', 'ex_xunkao',
                'ex_note'));
            $arr['ex_not_lab'] = '';
            if(isset($_POST['ex_not_lab'])) {
                foreach($_POST['ex_not_lab'] as $r) {
                    $arr['ex_not_lab'] .= $r . '-';
                }
            }
            $arr['ex_not_lab'] = trim($arr['ex_not_lab']);
            date_default_timezone_set("Asia/Shanghai");
            $arr['ex_input_date'] = date('Y-m-d H:i:s');
            $this->load->model('nks/nks_exam');
            $res = $this->nks_exam->insert($arr);
            $obj = array(
                'ex_name' => $arr['ex_name'],
                'ex_grade' => $arr['ex_grade'],
                'ex_date' => $arr['ex_date'],
                'nt_id' => $arr['nt_id'],
                'ex_mode' => $arr['ex_mode'],
                'tm_id' => $arr['tm_id'],
                'ac_id' => $arr['ac_id'],
                'mj_id' => $arr['mj_id']
            );
            $_SESSION['obj'] = (object)$obj;
            $this->handle_res($res, 'nksexam/showTodayExamList', 'nksexam/examadd');
        }

        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '添加考试信息',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksexam/examadd'
        );
        if(isset($_SESSION['obj'])) {
            $data['obj'] = $_SESSION['obj'];
        } else {
            $obj = array();
            if(isset($_POST['ex_name'])) {
                $obj['ex_name'] = $_POST['ex_name'];
            }
            if(isset($_POST['ex_grade'])) {
                $obj['ex_grade'] = $_POST['ex_grade'];
            }
            if(isset($_POST['ex_date'])) {
                $obj['ex_date'] = $_POST['ex_date'];
            }
            if(isset($_POST['ex_stunum'])) {
                $obj['ex_stunum'] = $_POST['ex_stunum'];
            }
            if(isset($_POST['ex_invinum'])) {
                $obj['ex_invinum'] = $_POST['ex_invinum'];
            }
            if(isset($_POST['ex_maininv'])) {
                $obj['ex_maininv'] = $_POST['ex_maininv'];
            }
            $data['obj'] = (object)$obj;
        }


        $this->load->model('nks/nks_academy');
        $this->load->model('nks/nks_place');
        $this->load->model('nks/nks_time');
        $this->load->model('nks/nks_class');
        $this->load->model('nks/nks_nature');
        $this->load->model('nks/nks_major');
        $this->load->model('nks/nks_lab');
        $academies = $this->nks_academy->getAllAcademies();
        $data['place_arr'] = $this->nks_place->getAllPlaces();
        $data['time_arr'] = $this->nks_time->getAllTime();
        $data['class_arr'] = $this->nks_class->getAllClasses();
        $data['nature_arr'] = $this->nks_nature->getAllNatures();
        $data['lab_arr'] = $this->nks_lab->getAllLabs();
        $data['academy_arr'] = $academies;
        $data['showExLab'] = true;
        if(count($academies) > 0) {
            $data['major_arr'] = $this->nks_major->getMajorsByAcId($academies[0]->ac_id);
        } else {
            $data['major_arr'] = $this->nks_major->getAllMajors();
        }
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_exam/exam_add");
        $this->load->view("nks/nks_global/footer_man");
    }

//    分配之前选择考试日期范围
    public function chooseAssignDate() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        if(isset($_POST['begin_date']) && isset($_POST['end_date'])) {
            $begin_date = $_POST['begin_date'];
            $end_date = $_POST['end_date'];
            $_SESSION['assign_args'] = array('begin_date' => $begin_date, 'end_date' => $end_date);
            redirect('nksexam/assignteacher');

        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '选择考试日期',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksexam/chooseAssignDate'
        );
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_exam/printargs");
        $this->load->view("nks/nks_global/footer_man");
    }


//    分配监考教师按钮
    public function assignteacher() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '分配监考教师',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        if(isset($_SESSION['assign_args'])) {
            $begin_date = $_SESSION['assign_args']['begin_date'];
            $end_date = $_SESSION['assign_args']['end_date'];
            $this->load->model('nks/nks_exam');
            $per_page_num = 13;
            $firstResult = $this->uri->segment(3);
            if(!isset($firstResult) || $firstResult == '') {
                $firstResult = 0;
            }
            $total_num = $this->nks_exam->getExamNotLabByDateNum($begin_date, $end_date);
            $_SESSION['assign_exams'] = $this->nks_exam->getExamsNotLabByDateByPage($begin_date, $end_date, 0, $total_num);
            $this->myinput->load_page($total_num, 'nksexam/assignteacher', $per_page_num);
            $data['result'] = $this->nks_exam->getExamsNotLabByDateByPage($begin_date, $end_date, $firstResult, $per_page_num);

            $this->load->view("nks/nks_global/admin_header_ks", $data);
            $this->load->view("nks/nks_exam/assignteacher");
            $this->load->view("nks/nks_global/footer_man");
        }
    }

//    执行分配监考教师
    public function executeAssignTeacher() {
        $this->check_admin(2);
        if(isset($_SESSION['assign_exams'])) {
            $exam_arr = $_SESSION['assign_exams'];
            $this->load->model('nks/nks_lab');
            $this->load->model('nks/nks_exam');
            $lab_arr = $this->nks_lab->getAllLabs();
            $invinum_arr = $this->getInvinumOfLab($lab_arr, $exam_arr);
            usort($exam_arr, 'rex_invinum_cmp');
            usort($lab_arr, 'rlb_num_cmp');
//            shuffle($lab_arr);
            $exam_num = count($exam_arr);
            $exam_copy = $exam_arr;
            foreach($exam_arr as $exam) {
                foreach($lab_arr as $lab) {
                    if(!$this->isInNotLab($lab, $exam) && !$this->hasExamCurrentDay($lab, $exam)
                        && $this->teacherEnough($lab, $exam) && $invinum_arr[$lab->lb_id] >= $exam->ex_invinum) {
                        $exam->ex_lab = $lab->lb_id;
                        $invinum_arr[$lab->lb_id] -= $exam->ex_invinum;
                        $exam_num --;
                        date_default_timezone_set("Asia/Shanghai");
                        $exam->ex_input_date = date('Y-m-d H:i:s');
                        $this->nks_exam->update((array)$exam);
                        break;
                    }
                }
            }

            if($exam_num == 0) {
                $res = true;
                $_SESSION['assign_exams'] = $exam_arr;
            } else {
                foreach($exam_copy as $e) {
                    $e->ex_lab = 0;
                    $this->nks_exam->update((array)$e);
                }
                $res = false;
            }

            $this->handle_res($res, 'nksexam/examlistnotinv', 'nksexam/assignteacher',
                '分配成功！', '分配失败');
        }
    }

//    撤销分配监考教师
    public function unassignteacher() {
        $this->check_admin(2);
        $this->load->model('nks/nks_exam');
        $exam_arr = $this->nks_exam->getExamsNotInvByPage(0, $this->nks_exam->getNotInvExamNum());
        $res = true;
        if(count($exam_arr) > 0) {
            foreach($exam_arr as $exam) {
                $exam->ex_lab = 0;
                date_default_timezone_set("Asia/Shanghai");
                $exam->ex_input_date = date('Y-m-d H:i:s');
                if(!$this->nks_exam->update((array)$exam)) {
                    $res = false;
                    break;
                }
            }
        }
        $this->handle_res($res, 'nksexam/examlistnotinv', 'nksexam/examlistnotiv',
            '撤销分配成功！', '撤销失败！');
    }

//    计算每个教研室所出的监考教师人数
    private function getInvinumOfLab($lab_arr, $exam_arr) {
        $total_teacher = 0;
        foreach($exam_arr as $ex) {
            $total_teacher += $ex->ex_invinum;
        }
//        如果总监考教师人数少于50，则按50计算
        if($total_teacher <= 50) {
            $total_teacher = 50;
        }
        $lab_teachers = 0;
        foreach($lab_arr as $lab) {
            $lab_teachers += $lab->lb_num;
        }
        $invinum_arr = array();
        foreach($lab_arr as $lab) {
            $invinum_arr[$lab->lb_id] = intval((floatval($total_teacher) / $lab_teachers) * $lab->lb_num) + 2;
        }
        return $invinum_arr;
    }

//   判断当前教研室是否在考试的黑名单上
    private function isInNotLab($lab, $exam) {
        $notlabarr = explode('-', $exam->ex_not_lab);
        if(in_array($lab->lb_id, $notlabarr)) {
            return true;
        }
        return false;
    }

//   判断在当天是否已经安排其它考试
    private function hasExamCurrentDay($lab, $exam) {
        $this->load->model('nks/nks_exam');
        $examArr = $this->nks_exam->getExamsByLabByDate($lab->lb_id, $exam->ex_date);
        return count($examArr) > 0;
    }

//   判断教研室的教师人数是否满足要求
    private function teacherEnough($lab, $exam) {
        switch ($exam->ex_invinum) {
            case 1:
            case 2:
            case 3:
                return true;
            case 4:
            case 5:
                if($lab->lb_num >= 10) {
                    return true;
                }
        }
        return false;
    }

//    public function test() {
//        $this->load->model('nks/nks_lab');
//        $this->load->model('nks/nks_exam');
//        $lab_arr = $this->nks_lab->getAllLabs();
//        $exam_arr = $this->nks_exam->getExamsNotLabByPage(0, 9999999);
//        $invinum_arr = $this->getInvinumOfLab($lab_arr, $exam_arr);
//        usort($exam_arr, 'ex_invinum_cmp');
//        usort($lab_arr, 'lb_num_cmp');
//        foreach($exam_arr as $ex) {
//            echo($ex->ex_invinum . '&nbsp;');
//        }
//        echo('<br />');
//        foreach($exam_arr as $ex) {
//            echo($ex->ex_invinum * 4 -2 . '&nbsp;');
//        }
//        echo('<br />');
//        echo('---------------------------------<br />');
//        foreach ($lab_arr as $lab) {
//            echo($invinum_arr[$lab->lb_id] . '&nbsp;');
//        }
//        echo('<br />');
//        foreach ($lab_arr as $lab) {
//            echo($lab->lb_num . '&nbsp;');
//        }
//        echo('<br />');
//        $examArr = $this->nks_exam->getExamsByPage(0, 1000);
//        var_dump($examArr);
//        echo('------------------------------------');
//        var_dump($this->isInNotLab($labArr[0], $examArr[9]));
//    }

//    private function manageExam($arr, $lab_arr) {
//        $this->load->model('nks/nks_lab');
//        $this->load->model('nks/nks_exam');
//        $lab_list = $this->nks_lab->getLabsOrderByExnum();
//        foreach($lab_list as $lab) {
//            if(isset($lab_arr) && count($lab_arr) > 0 && in_array($lab->lb_id, $lab_arr)) {
//                continue;
//            }
//            if($lab->lb_num / 4 + 1 > $arr['ex_invinum']) {
//                $flag = true;
//                $exam_list = $this->nks_exam->getExamsByLabByPage($lab->lb_id, 0, $this->nks_exam->getExamNumByLabId($lab->lb_id));
//                foreach($exam_list as $exam) {
//                    if($exam->ex_date == $arr['ex_date']) {
//                        $flag = false;
//                        break;
//                    }
//                }
//                if($flag) {
//                    $lab->lb_ex_num ++;
//                    $this->nks_lab->update((array)$lab);
//                    return $lab->lb_id;
//                }
//            }
//        }
//        return 0;
//    }

//    由添加考试中当天添加或修改的考试列表修改考试信息
    public function examupdateByshowToday($ex_id) {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $this->load->model('nks/nks_exam');
        $this->load->model('nks/nks_lab');
        $exam = $this->nks_exam->getExamById($ex_id);
        if(isset($_POST['ex_name']) && $_POST['ex_name'] != '' && isset($_POST['ex_grade']) && $_POST['ex_grade'] != ''
            && isset($_POST['ex_date']) && $_POST['ex_date'] != '' && isset($_POST['ex_invinum']) && $_POST['ex_invinum'] != '') {

            $arr = $this->myinput->getBykeys(array('ex_name', 'ex_grade', 'nt_id', 'ex_mode', 'ex_date', 'tm_id',
                'pl_id', 'ac_id', 'mj_id', 'class_id', 'ex_stunum', 'ex_absence', 'ex_invinum', 'ex_maininv', 'ex_xunkao',
                'ex_note', 'ex_lab'));
            date_default_timezone_set("Asia/Shanghai");
            $arr['ex_input_date'] = date('Y-m-d H:i:s');
            $arr['ex_not_lab'] = '';
            if(isset($_POST['ex_not_lab'])) {
                foreach($_POST['ex_not_lab'] as $r) {
                    $arr['ex_not_lab'] .= $r . '-';
                }
            }
            $arr['ex_not_lab'] = trim($arr['ex_not_lab']);
            $arr['ex_id'] = $ex_id;
            $flag = true;
            for($i=1;$i<=$exam->ex_invinum;$i++) {
                if(!isset($_POST['ex_invname' . $i]) || $_POST['ex_invname' . $i] == '') {
                    $flag = false;
                    break;
                }
            }
            if($flag) {
                $post_arr = array();
                for($i=1;$i<=$exam->ex_invinum;$i++) {
                    $post_arr[$i-1] = 'ex_invname' . $i;
                }
                $arr2 = $this->myinput->getBykeys($post_arr);
                $arr['ex_invname'] = '';
                if(count($arr2) > 0) {
                    for($i=1;$i<$exam->ex_invinum;$i++) {
                        $arr['ex_invname'] .= $arr2['ex_invname' . $i] . ' ';
                    }
                    $arr['ex_invname'] .= $arr2['ex_invname' . $i];
                }
            }
            if(isset($arr['ex_lab']) && $arr['ex_lab'] == 0) {
                $arr['ex_invname'] = '';
            }
            $res = $this->nks_exam->update($arr);
            $this->handle_res($res, 'nksexam/showTodayExamList', 'nksexam/examupdateByshowToday');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '修改考试信息',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksexam/examupdateByshowToday/' . $ex_id
        );
        $data['showExLab'] = true;
        $data['obj'] = $exam;
        $data['obj']->ex_invname = explode(' ', $data['obj']->ex_invname);
        $this->load->model('nks/nks_academy');
        $this->load->model('nks/nks_place');
        $this->load->model('nks/nks_time');
        $this->load->model('nks/nks_class');
        $this->load->model('nks/nks_nature');
        $this->load->model('nks/nks_major');
        $this->load->model('nks/nks_lab');
        $academies = $this->nks_academy->getAllAcademies();
        $data['place_arr'] = $this->nks_place->getAllPlaces();
        $data['time_arr'] = $this->nks_time->getAllTime();
        $data['class_arr'] = $this->nks_class->getAllClasses();
        $data['nature_arr'] = $this->nks_nature->getAllNatures();
        $lab_arr = $this->nks_lab->getAllLabs();
        $data['lab_arr'] = $lab_arr;

        $data['academy_arr'] = $academies;
        if(count($academies) > 0) {
            $data['major_arr'] = $this->nks_major->getMajorsByAcId($data['obj']->ac_id);
        } else {
            $data['major_arr'] = $this->nks_major->getAllMajors();
        }

        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_exam/exam_add");
        $this->load->view("nks/nks_global/footer_man");
    }

//   由分配监考教师界面修改考试信息
    public function examupdateassign($ex_id) {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $this->load->model('nks/nks_exam');
        $this->load->model('nks/nks_lab');
        $exam = $this->nks_exam->getExamById($ex_id);
        if(isset($_POST['ex_name']) && $_POST['ex_name'] != '' && isset($_POST['ex_grade']) && $_POST['ex_grade'] != ''
            && isset($_POST['ex_date']) && $_POST['ex_date'] != '' && isset($_POST['ex_invinum']) && $_POST['ex_invinum'] != '') {

            $arr = $this->myinput->getBykeys(array('ex_name', 'ex_grade', 'nt_id', 'ex_mode', 'ex_date', 'tm_id',
                'pl_id', 'ac_id', 'mj_id', 'class_id', 'ex_stunum', 'ex_absence', 'ex_invinum', 'ex_maininv', 'ex_xunkao',
                'ex_note', 'ex_lab'));
            date_default_timezone_set("Asia/Shanghai");
            $arr['ex_input_date'] = date('Y-m-d H:i:s');
            $arr['ex_not_lab'] = '';
            if(isset($_POST['ex_not_lab'])) {
                foreach($_POST['ex_not_lab'] as $r) {
                    $arr['ex_not_lab'] .= $r . '-';
                }
            }
            $arr['ex_not_lab'] = trim($arr['ex_not_lab']);
            $arr['ex_id'] = $ex_id;
            $flag = true;
            for($i=1;$i<=$exam->ex_invinum;$i++) {
                if(!isset($_POST['ex_invname' . $i]) || $_POST['ex_invname' . $i] == '') {
                    $flag = false;
                    break;
                }
            }
            if($flag) {
                $post_arr = array();
                for($i=1;$i<=$exam->ex_invinum;$i++) {
                    $post_arr[$i-1] = 'ex_invname' . $i;
                }
                $arr2 = $this->myinput->getBykeys($post_arr);
                $arr['ex_invname'] = '';
                if(count($arr2) > 0) {
                    for($i=1;$i<$exam->ex_invinum;$i++) {
                        $arr['ex_invname'] .= $arr2['ex_invname' . $i] . ' ';
                    }
                    $arr['ex_invname'] .= $arr2['ex_invname' . $i];
                }
            }
//            if($exam->ex_lab != 0 && isset($arr['ex_lab']) && $arr['ex_lab'] != 0) {
//                $lab = $this->nks_lab->getLabById($exam->ex_lab);
//                $lab->lb_ex_num --;
//                $this->nks_lab->update((array)$lab);
//                //var_dump($arr);
//                $nlab = $this->nks_lab->getLabById($arr['ex_lab']);
//                $nlab->lb_ex_num ++;
//                $this->nks_lab->update((array)$nlab);
//            }
            if(isset($arr['ex_lab']) && $arr['ex_lab'] == 0) {
                $arr['ex_invname'] = '';
            }
            $res = $this->nks_exam->update($arr);
            $this->handle_res($res, 'nksexam/assignteacher', 'nksexam/examupdateassign');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '修改考试信息',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksexam/examupdateassign/' . $ex_id
        );
        $data['showExLab'] = true;
        $data['obj'] = $exam;
        $data['obj']->ex_invname = explode(' ', $data['obj']->ex_invname);
        $this->load->model('nks/nks_academy');
        $this->load->model('nks/nks_place');
        $this->load->model('nks/nks_time');
        $this->load->model('nks/nks_class');
        $this->load->model('nks/nks_nature');
        $this->load->model('nks/nks_major');
        $this->load->model('nks/nks_lab');
        $academies = $this->nks_academy->getAllAcademies();
        $data['place_arr'] = $this->nks_place->getAllPlaces();
        $data['time_arr'] = $this->nks_time->getAllTime();
        $data['class_arr'] = $this->nks_class->getAllClasses();
        $data['nature_arr'] = $this->nks_nature->getAllNatures();
        $lab_arr = $this->nks_lab->getAllLabs();
        $data['lab_arr'] = $lab_arr;
        $data['academy_arr'] = $academies;
        if(count($academies) > 0) {
            $data['major_arr'] = $this->nks_major->getMajorsByAcId($data['obj']->ac_id);
        } else {
            $data['major_arr'] = $this->nks_major->getAllMajors();
        }

        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_exam/exam_add");
        $this->load->view("nks/nks_global/footer_man");
    }

//    由未分配监考教师菜单修改考试信息
    public function examupdatenotinv($ex_id) {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $this->load->model('nks/nks_exam');
        $this->load->model('nks/nks_lab');
        $exam = $this->nks_exam->getExamById($ex_id);
        if(isset($_POST['ex_name']) && $_POST['ex_name'] != '' && isset($_POST['ex_grade']) && $_POST['ex_grade'] != ''
            && isset($_POST['ex_date']) && $_POST['ex_date'] != '' && isset($_POST['ex_invinum']) && $_POST['ex_invinum'] != '') {

            $arr = $this->myinput->getBykeys(array('ex_name', 'ex_grade', 'nt_id', 'ex_mode', 'ex_date', 'tm_id',
                'pl_id', 'ac_id', 'mj_id', 'class_id', 'ex_stunum', 'ex_absence', 'ex_invinum', 'ex_maininv', 'ex_xunkao',
                'ex_note', 'ex_lab'));
            date_default_timezone_set("Asia/Shanghai");
            $arr['ex_input_date'] = date('Y-m-d H:i:s');
            $arr['ex_not_lab'] = '';
            if(isset($_POST['ex_not_lab'])) {
                foreach($_POST['ex_not_lab'] as $r) {
                    $arr['ex_not_lab'] .= $r . '-';
                }
            }
            $arr['ex_not_lab'] = trim($arr['ex_not_lab']);
            $arr['ex_id'] = $ex_id;
            $flag = true;
            for($i=1;$i<=$exam->ex_invinum;$i++) {
                if(!isset($_POST['ex_invname' . $i]) || $_POST['ex_invname' . $i] == '') {
                    $flag = false;
                    break;
                }
            }
            if($flag) {
                $post_arr = array();
                for($i=1;$i<=$exam->ex_invinum;$i++) {
                    $post_arr[$i-1] = 'ex_invname' . $i;
                }
                $arr2 = $this->myinput->getBykeys($post_arr);
                $arr['ex_invname'] = '';
                if(count($arr2) > 0) {
                    for($i=1;$i<$exam->ex_invinum;$i++) {
                        $arr['ex_invname'] .= $arr2['ex_invname' . $i] . ' ';
                    }
                    $arr['ex_invname'] .= $arr2['ex_invname' . $i];
                }
            }
            if(isset($arr['ex_lab']) && $arr['ex_lab'] == 0) {
                $arr['ex_invname'] = '';
            }
            $res = $this->nks_exam->update($arr);
            $this->handle_res($res, 'nksexam/examlistnotinv', 'nksexam/examupdatenotinv');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '修改考试信息',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksexam/examupdatenotinv/' . $ex_id
        );
        $data['showExLab'] = true;
        $data['obj'] = $exam;
        $data['obj']->ex_invname = explode(' ', $data['obj']->ex_invname);
        $this->load->model('nks/nks_academy');
        $this->load->model('nks/nks_place');
        $this->load->model('nks/nks_time');
        $this->load->model('nks/nks_class');
        $this->load->model('nks/nks_nature');
        $this->load->model('nks/nks_major');
        $this->load->model('nks/nks_lab');
        $academies = $this->nks_academy->getAllAcademies();
        $data['place_arr'] = $this->nks_place->getAllPlaces();
        $data['time_arr'] = $this->nks_time->getAllTime();
        $data['class_arr'] = $this->nks_class->getAllClasses();
        $data['nature_arr'] = $this->nks_nature->getAllNatures();
        $lab_arr = $this->nks_lab->getAllLabs();
        $data['lab_arr'] = $lab_arr;

        $data['academy_arr'] = $academies;
        if(count($academies) > 0) {
            $data['major_arr'] = $this->nks_major->getMajorsByAcId($data['obj']->ac_id);
        } else {
            $data['major_arr'] = $this->nks_major->getAllMajors();
        }

        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_exam/exam_add");
        $this->load->view("nks/nks_global/footer_man");
    }

//  修改考试信息
    public function examupdate() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $ex_id = $this->uri->segment(3);
        $this->load->model('nks/nks_exam');
        $this->load->model('nks/nks_lab');
        $exam = $this->nks_exam->getExamById($ex_id);
        if(isset($_POST['ex_name']) && $_POST['ex_name'] != '' && isset($_POST['ex_grade']) && $_POST['ex_grade'] != ''
            && isset($_POST['ex_date']) && $_POST['ex_date'] != '' && isset($_POST['ex_invinum']) && $_POST['ex_invinum'] != '') {

            $arr = $this->myinput->getBykeys(array('ex_name', 'ex_grade', 'nt_id', 'ex_mode', 'ex_date', 'tm_id',
                'pl_id', 'ac_id', 'mj_id', 'class_id', 'ex_stunum', 'ex_absence', 'ex_invinum', 'ex_maininv', 'ex_xunkao',
                'ex_note', 'ex_lab'));
            date_default_timezone_set("Asia/Shanghai");
            $arr['ex_input_date'] = date('Y-m-d H:i:s');
            $arr['ex_not_lab'] = '';
            if(isset($_POST['ex_not_lab'])) {
                foreach($_POST['ex_not_lab'] as $r) {
                    $arr['ex_not_lab'] .= $r . '-';
                }
            }
            $arr['ex_not_lab'] = trim($arr['ex_not_lab']);
            $arr['ex_id'] = $ex_id;
            $flag = true;
            for($i=1;$i<=$exam->ex_invinum;$i++) {
                if(!isset($_POST['ex_invname' . $i]) || $_POST['ex_invname' . $i] == '') {
                    $flag = false;
                    break;
                }
            }
            if($flag) {
                $post_arr = array();
                for($i=1;$i<=$exam->ex_invinum;$i++) {
                    $post_arr[$i-1] = 'ex_invname' . $i;
                }
                $arr2 = $this->myinput->getBykeys($post_arr);
                $arr['ex_invname'] = '';
                if(count($arr2) > 0) {
                    for($i=1;$i<$exam->ex_invinum;$i++) {
                        $arr['ex_invname'] .= $arr2['ex_invname' . $i] . ' ';
                    }
                    $arr['ex_invname'] .= $arr2['ex_invname' . $i];
                }
            }
            if(isset($arr['ex_lab']) && $arr['ex_lab'] == 0) {
                $arr['ex_invname'] = '';
            }
            $res = $this->nks_exam->update($arr);
            $this->handle_res($res, 'nksexam/examlist', 'nksexam/examupdate');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '修改考试信息',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksexam/examupdate/' . $ex_id
        );
        $data['showExLab'] = true;
        $data['obj'] = $exam;
        $data['obj']->ex_invname = explode(' ', $data['obj']->ex_invname);
        $this->load->model('nks/nks_academy');
        $this->load->model('nks/nks_place');
        $this->load->model('nks/nks_time');
        $this->load->model('nks/nks_class');
        $this->load->model('nks/nks_nature');
        $this->load->model('nks/nks_major');
        $this->load->model('nks/nks_lab');
        $academies = $this->nks_academy->getAllAcademies();
        $data['place_arr'] = $this->nks_place->getAllPlaces();
        $data['time_arr'] = $this->nks_time->getAllTime();
        $data['class_arr'] = $this->nks_class->getAllClasses();
        $data['nature_arr'] = $this->nks_nature->getAllNatures();
        $lab_arr = $this->nks_lab->getAllLabs();
        $data['lab_arr'] = $lab_arr;

        $data['academy_arr'] = $academies;
        if(count($academies) > 0) {
            $data['major_arr'] = $this->nks_major->getMajorsByAcId($data['obj']->ac_id);
        } else {
            $data['major_arr'] = $this->nks_major->getAllMajors();
        }

        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_exam/exam_add");
        $this->load->view("nks/nks_global/footer_man");
    }

//    显示教研室没有录入监考教师的考试列表
    public function examlistnotinvbylab() {
        $this->check_admin(1);
        $user = $_SESSION['nks_user'];
        $this->load->model('nks/nks_lab');
        $this->load->model('nks/nks_exam');
        $lab = $this->nks_lab->getLabByUsId($user->us_id);
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '考试列表（未录入监考教师）',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $per_page_num = 13;
        $firstResult = $this->uri->segment(3);
        if(!isset($firstResult) || $firstResult == '') {
            $firstResult = 0;
        }
        $total_num = $this->nks_exam->getNotInvExamNumByLabId($lab->lb_id);
        $this->myinput->load_page($total_num, 'nksexam/examlistnotinvbylab', $per_page_num);
        $data['result'] = $this->nks_exam->getExamsNotInvByLabByPage($lab->lb_id, $firstResult, $per_page_num);

        $this->load->view("nks/nks_global/header_ks", $data);
        $this->load->view("nks/nks_exam/examlistnotinv");
        $this->load->view("nks/nks_global/footer_man");
    }

//    显示教研室已录入监考教师的考试列表
    public function examlistinvbylab() {
        $this->check_admin(1);
        $user = $_SESSION['nks_user'];
        $this->load->model('nks/nks_lab');
        $this->load->model('nks/nks_exam');
        $lab = $this->nks_lab->getLabByUsId($user->us_id);
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '考试列表（已录入监考教师）',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $per_page_num = 13;
        $firstResult = $this->uri->segment(3);
        if(!isset($firstResult) || $firstResult == '') {
            $firstResult = 0;
        }
        $total_num = $this->nks_exam->getInvExamNumByLabId($lab->lb_id);
        $this->myinput->load_page($total_num, 'nksexam/examlistinvbylab', $per_page_num);
        $data['result'] = $this->nks_exam->getExamsInvByLabByPage($lab->lb_id, $firstResult, $per_page_num);

        $this->load->view("nks/nks_global/header_ks", $data);
        $this->load->view("nks/nks_exam/examlistinv");
        $this->load->view("nks/nks_global/footer_man");
    }

//    显示考试详细信息
    public function showdetail($ex_id) {
        $this->check_admin(1);
        $user = $_SESSION['nks_user'];
        $this->load->model('nks/nks_exam');
        $this->load->model('nks/nks_lab');
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '详细考试信息',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $data['obj'] = $this->nks_exam->getExamById($ex_id);
        $data['lab_arr'] = $this->nks_lab->getAllLabs();
        if($user->us_admin == 2) {
            $this->load->view("nks/nks_global/admin_header_ks", $data);
        } else {
            $this->load->view("nks/nks_global/header_ks", $data);
        }
        $this->load->view("nks/nks_exam/showdetail");
        $this->load->view("nks/nks_global/footer_man");
    }

//    教研室负责人添加监考教师
    public function addinv($ex_id) {
        $this->check_admin(1);
        $user = $_SESSION['nks_user'];
        $this->load->model('nks/nks_exam');
        $obj = $this->nks_exam->getExamById($ex_id);
        $flag = true;
        for($i=1;$i<=$obj->ex_invinum;$i++) {
            if(!isset($_POST['ex_invname' . $i]) || $_POST['ex_invname' . $i] == '') {
                $flag = false;
                break;
            }
        }
        if($flag) {

            $post_arr = array();
            for($i=1;$i<=$obj->ex_invinum;$i++) {
                $post_arr[$i-1] = 'ex_invname' . $i;
            }

            $arr = $this->myinput->getBykeys($post_arr);
            $arr['ex_invname'] = '';
            for($i=1;$i<$obj->ex_invinum;$i++) {
                $arr['ex_invname'] .= trim($arr['ex_invname' . $i]) . ' ';
            }
            $arr['ex_invname'] .= trim($arr['ex_invname' . $i]);
            $obj->ex_invname = $arr['ex_invname'];
            date_default_timezone_set("Asia/Shanghai");
            $obj->ex_input_date = date('Y-m-d H:i:s');
            $res = $this->nks_exam->update((array)$obj);
            $this->handle_res($res, 'nksexam/examlistinvbylab', 'nksexam/examlistnotinvbylab');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '添加监考教师',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksexam/addinv/' . $ex_id
        );
        $obj->ex_invname = explode(' ', $obj->ex_invname);
        $data['obj'] = $obj;
        $this->load->view("nks/nks_global/header_ks", $data);
        $this->load->view("nks/nks_exam/addinv");
        $this->load->view("nks/nks_global/footer_man");
    }

    // 教研室负责人修改监考教师
    public function updateinv($ex_id) {
        $this->check_admin(1);
        $user = $_SESSION['nks_user'];
        $this->load->model('nks/nks_exam');
        $obj = $this->nks_exam->getExamById($ex_id);
        $flag = true;
        for($i=1;$i<=$obj->ex_invinum;$i++) {
            if(!isset($_POST['ex_invname' . $i]) || $_POST['ex_invname' . $i] == '') {
                $flag = false;
                break;
            }
        }
        if($flag) {
            $post_arr = array();
            for($i=1;$i<=$obj->ex_invinum;$i++) {
                $post_arr[$i-1] = 'ex_invname' . $i;
            }
            $arr = $this->myinput->getBykeys($post_arr);
            $arr['ex_invname'] = '';
            for($i=1;$i<$obj->ex_invinum;$i++) {
                $arr['ex_invname'] .= $arr['ex_invname' . $i] . ' ';
            }
            $arr['ex_invname'] .= $arr['ex_invname' . $i];
            $obj->ex_invname = $arr['ex_invname'];
            date_default_timezone_set("Asia/Shanghai");
            $obj->ex_input_date = date('Y-m-d H:i:s');
            $res = $this->nks_exam->update((array)$obj);
            $this->handle_res($res, 'nksexam/examlistinvbylab', 'nksexam/examlistinvbylab');
        }

        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '修改监考教师',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksexam/addinv/' . $ex_id
        );
        $obj->ex_invname = explode(' ', $obj->ex_invname);
        $data['obj'] = $obj;
        $this->load->view("nks/nks_global/header_ks", $data);
        $this->load->view("nks/nks_exam/addinv");
        $this->load->view("nks/nks_global/footer_man");
    }


    // 菜单中的打印功能
    public function printexam() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        if(isset($_POST['begin_date']) && isset($_POST['end_date'])) {
            $begin_date = $_POST['begin_date'];
            $end_date = $_POST['end_date'];
            $ex_name = $_POST['ex_name'];
            $_SESSION['print_args'] = array('begin_date' => $begin_date, 'end_date' => $end_date, 'ex_name' => $ex_name);
            redirect('nksexam/showPrintExamList');

        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '选择考试时间范围以及考试科目',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksexam/printexam',
            'showName' => true
        );
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_exam/printargs");
        $this->load->view("nks/nks_global/footer_man");
    }

//    显示打印列表与打印选项
    public function showPrintExamList() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $printArgs = $_SESSION['print_args'];
        $this->load->model('nks/nks_exam');
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '打印考试列表',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $per_page_num = 13;
        $firstResult = $this->uri->segment(3);
        if(!isset($firstResult) || $firstResult == '') {
            $firstResult = 0;
        }
        if($printArgs['ex_name'] == '') {
            $total_num = $this->nks_exam->getExamBetweenDateNum($printArgs['begin_date'], $printArgs['end_date']);
            $this->myinput->load_page($total_num, 'nksexam/showPrintExamList', $per_page_num);
            $data['result'] = $this->nks_exam->getExamsBetweenDateByPage($printArgs['begin_date'], $printArgs['end_date'], $firstResult, $per_page_num);
        } else {
            $total_num = $this->nks_exam->getExamBetweenDateByNameNum($printArgs['begin_date'], $printArgs['end_date'], $printArgs['ex_name']);
            $this->myinput->load_page($total_num, 'nksexam/showPrintExamList', $per_page_num);
            $data['result'] = $this->nks_exam->getExamsBetweenDateByNameByPage($printArgs['begin_date'], $printArgs['end_date'], $printArgs['ex_name'], $firstResult, $per_page_num);
        }
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_exam/showprintexamlist");
        $this->load->view("nks/nks_global/footer_man");
    }


//    打印考试大表
    public function printExamBigTable() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $printArgs = $_SESSION['print_args'];
        $this->load->model('nks/nks_exam');
        if($printArgs['ex_name'] == '') {
            $total_num = $this->nks_exam->getExamBetweenDateNum($printArgs['begin_date'], $printArgs['end_date']);
            $examList = $this->nks_exam->getExamsBetweenDateByPage($printArgs['begin_date'], $printArgs['end_date'], 0, $total_num);
        } else {
            $total_num = $this->nks_exam->getExamBetweenDateByNameNum($printArgs['begin_date'], $printArgs['end_date'], $printArgs['ex_name']);
            $examList = $this->nks_exam->getExamsBetweenDateByNameByPage($printArgs['begin_date'], $printArgs['end_date'], $printArgs['ex_name'], 0, $total_num);
        }

        $perpage = 40;
        $pages = floor($total_num / $perpage);
        if($total_num % $perpage != 0) {
            $pages ++;
        }
        $page = array();
        for($i=0;$i<$pages;$i++) {
            $b = $i * $perpage;
            if($printArgs['ex_name'] == '') {
                $total_num = $this->nks_exam->getExamBetweenDateNum($printArgs['begin_date'], $printArgs['end_date']);
                $page[$i] = $this->nks_exam->getExamsBetweenDateByPage($printArgs['begin_date'], $printArgs['end_date'], $b, $perpage);
            } else {
                $total_num = $this->nks_exam->getExamBetweenDateByNameNum($printArgs['begin_date'], $printArgs['end_date'], $printArgs['ex_name']);
                $page[$i] = $this->nks_exam->getExamsBetweenDateByNameByPage($printArgs['begin_date'], $printArgs['end_date'], $printArgs['ex_name'], $b, $perpage);
            }
        }
        if($total_num == 0) {
            $page[0] = array();
        }
        $data['page'] = $page;
        $this->load->view('nks/nks_exam/exambigtable', $data);

    }

// 导出考试大表的Excel
    public function exportExcel() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $printArgs = $_SESSION['print_args'];
        $this->load->model('nks/nks_exam');
        if($printArgs['ex_name'] == '') {
            $total_num = $this->nks_exam->getExamBetweenDateNum($printArgs['begin_date'], $printArgs['end_date']);
            $examList = $this->nks_exam->getExamsBetweenDateByPage($printArgs['begin_date'], $printArgs['end_date'], 0, $total_num);
        } else {
            $total_num = $this->nks_exam->getExamBetweenDateByNameNum($printArgs['begin_date'], $printArgs['end_date'], $printArgs['ex_name']);
            $examList = $this->nks_exam->getExamsBetweenDateByNameByPage($printArgs['begin_date'], $printArgs['end_date'], $printArgs['ex_name'], 0, $total_num);
        }
        $data['p'] = $examList;
        $filename = 'excel-doc';
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=$filename.xls");
        $this->load->view('nks/nks_exam/examtoexcel', $data);
    }


//    打印单张通知单
    public function printnotice($ex_id) {
        $this->check_admin(2);
        $this->load->model('nks/nks_exam');
        $obj = $this->nks_exam->getExambyId($ex_id);
        $data['obj'] = $obj;
        $this->load->view('nks/nks_manager/kstzd', $data);

    }

//    打印全部通知单
    public function printAllNotice() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $printArgs = $_SESSION['print_args'];
        $this->load->model('nks/nks_exam');
        if($printArgs['ex_name'] == '') {
            $total_num = $this->nks_exam->getExamBetweenDateNum($printArgs['begin_date'], $printArgs['end_date']);
            $examList = $this->nks_exam->getExamsBetweenDateByPage($printArgs['begin_date'], $printArgs['end_date'], 0, $total_num);
        } else {
            $total_num = $this->nks_exam->getExamBetweenDateByNameNum($printArgs['begin_date'], $printArgs['end_date'], $printArgs['ex_name']);
            $examList = $this->nks_exam->getExamsBetweenDateByNameByPage($printArgs['begin_date'], $printArgs['end_date'], $printArgs['ex_name'], 0, $total_num);
        }
        foreach($examList as $exam) {
            $data['obj'] = $exam;
            $data['some'] = true;
            $this->load->view('nks/nks_manager/kstzd', $data);
        }
    }


//    打印单个试卷卷封（按班级)
    public function printcover($ex_id) {
        $this->check_admin(2);
        $this->load->model('nks/nks_exam');
        $this->load->model('nks/nks_major');
        $obj = $this->nks_exam->getExamById($ex_id);
        $data['major_arr'] = $this->nks_major->getMajorsByAcId($obj->ac_id);
        $data['obj'] = $obj;
        $cl_name = $obj->class_name;
        if($cl_name != '') {

            if($cl_name == '重修') {
                $data['nc'] = '重修';
                $this->load->view('nks/nks_manager/kssjjf2', $data);
            } else {

                $cl_name = str_replace('班', '', $cl_name);
                $cl_name = explode('、', $cl_name);
                for($i=0;$i<count($cl_name);$i++) {
                    $cl_name[$i] = explode('-', $cl_name[$i]);
                    if(count($cl_name[$i]) == 1) {
                        $cl_name[$i][1] = $cl_name[$i][0];
                    }
                    for($j=$cl_name[$i][0];$j<=$cl_name[$i][1];$j++) {
                        $data['nc'] = $j;
                        $this->load->view('nks/nks_manager/kssjjf2', $data);
                    }
                }
            }

        } else {
            $data['nc'] = '';
            $this->load->view('nks/nks_manager/kssjjf2', $data);
        }
    }

//    打印全部试卷卷封
    public function printAllCovers() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $printArgs = $_SESSION['print_args'];
        $this->load->model('nks/nks_exam');
        if($printArgs['ex_name'] == '') {
            $total_num = $this->nks_exam->getExamBetweenDateNum($printArgs['begin_date'], $printArgs['end_date']);
            $examList = $this->nks_exam->getExamsBetweenDateByPage($printArgs['begin_date'], $printArgs['end_date'], 0, $total_num);
        } else {
            $total_num = $this->nks_exam->getExamBetweenDateByNameNum($printArgs['begin_date'], $printArgs['end_date'], $printArgs['ex_name']);
            $examList = $this->nks_exam->getExamsBetweenDateByNameByPage($printArgs['begin_date'], $printArgs['end_date'], $printArgs['ex_name'], 0, $total_num);
        }
        $this->load->model('nks/nks_major');
        foreach($examList as $exam) {
            $data['obj'] = $exam;
            $data['major_arr'] = $this->nks_major->getMajorsByAcId($exam->ac_id);
            $data['obj'] = $exam;
            $cl_name = $exam->class_name;
            if($cl_name != '') {
                if($cl_name == '重修') {
                    $data['nc'] = '重修';
                    $this->load->view('nks/nks_manager/kssjjf2', $data);
                } else {

                    $cl_name = str_replace('班', '', $cl_name);
                    $cl_name = explode('、', $cl_name);
                    for($i=0;$i<count($cl_name);$i++) {
                        $cl_name[$i] = explode('-', $cl_name[$i]);
                        if(count($cl_name[$i]) == 1) {
                            $cl_name[$i][1] = $cl_name[$i][0];
                        }
                        for($j=$cl_name[$i][0];$j<=$cl_name[$i][1];$j++) {
                            $data['nc'] = $j;
                            $this->load->view('nks/nks_manager/kssjjf2', $data);
                        }
                    }
                }
            } else {
                $data['nc'] = '';
                $this->load->view('nks/nks_manager/kssjjf2', $data);
            }
        }
    }


//    删除考试
    public function examdelete() {
        $this->check_admin(2);
        $ex_id = $this->uri->segment(3);
        $this->load->model('nks/nks_exam');
        $this->load->model('nks/nks_lab');
        $ex = $this->nks_exam->getExamById($ex_id);
        if($ex->ex_lab != 0) {
            $lab = $this->nks_lab->getLabById($ex->ex_lab);
            if(isset($lab)) {
                $lab->lb_ex_num --;
                $this->nks_lab->update((array)$lab);
            }
        }
        $res = $this->nks_exam->deleteExamById($ex_id);
        $this->handle_res($res, 'nksexam/examlist', 'nksexam/examlist');

    }

//    添加或修改考试时，当学院变化时，专业选项也变化
    public function academychange($ac_id) {
        $this->check_admin(2);
        $this->load->model('nks/nks_major');
        $res = $this->nks_major->getMajorsbyAcId($ac_id);
        echo(json_encode($res));
    }

//    添加或修改考试时，选择考试地点时，进行提示
    public function place_change() {
        $this->check_admin(2);
        $mydata = json_decode($_GET['mydata']);
        $ex_id = $mydata->ex_id;
        $this->load->model('nks/nks_exam');
        $res = true;
        if($ex_id != '') {
            $pl_id = $mydata->pl_id;
            $exams = $this->nks_exam->getExamsByplid($pl_id);
        }

        if($res) {
            $rtv = array('color'=> 'green', 'message'=>'OK!!');
        } else {
            $rtv = array('color'=> 'red', 'message' => '不推荐!!');
        }

        echo(json_encode($rtv));
    }

public function timeEqual($t1, $t2) {

}


//    添加或修改考试时，当手动分配监考教师所属的研究室时，所显示的信息
    public function exlab_change() {
        $this->check_admin(2);
        $mydata = json_decode($_GET['mydata']);
        $ex_lab =$mydata->ex_lab;
        $ex_id = $mydata->ex_id;
        $this->load->model('nks/nks_lab');
        $this->load->model('nks/nks_exam');
        $lab = $this->nks_lab->getLabByid($ex_lab);
        if(isset($mydata->ex_not_lab)) {
            $notlab_arr = $mydata->ex_not_lab;
            $mydata->ex_not_lab = '';
            foreach($notlab_arr as $notlab) {
                $mydata->ex_not_lab .= $notlab . '-';
            }
        } else {
            $mydata->ex_not_lab = '';
        }
        $exam = $mydata;
        $res = true;
        if($ex_id != '') {
            $ex = $this->nks_exam->getExamById($ex_id);
            if($ex->ex_lab == $ex_lab) {
                $res = true;
            } else if($this->isInNotLab($lab, $exam) || $this->hasExamCurrentDay($lab, $exam) || !$this->teacherEnough($lab, $exam)) {
                $res = false;
            }
        } else {
            if($this->isInNotLab($lab, $exam) || $this->hasExamCurrentDay($lab, $exam) || !$this->teacherEnough($lab, $exam)) {
                $res = false;
            }
        }
        if($res) {
            $rtv = array('color'=> 'green', 'message'=>'OK!!');
        } else {
            $rtv = array('color'=> 'red', 'message' => '不推荐!!');
        }

        echo(json_encode($rtv));
    }
}
