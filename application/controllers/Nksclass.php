<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/5
 * Time: 19:53
 */
require_once('Nksmanager.php');

class Nksclass extends Nksmanager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function classlist() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '班级列表',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $this->load->model('nks/nks_class');
        $data['result'] = $this->nks_class->getAllClasses();
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_class/classlist");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function classadd() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        if(isset($_POST['class_name']) && $_POST['class_name'] != '') {
            $arr = $this->myinput->getBykeys(array('class_name'));
            $this->load->model('nks/nks_class');
            $res = $this->nks_class->insert($arr);
            $this->handle_res($res, 'nksclass/classlist', 'nksclass/classadd');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '添加班级信息',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksclass/classadd'
        );
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_class/classadd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function classupdate() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $class_id = $this->uri->segment(3);
        $this->load->model('nks/nks_class');
        if(isset($_POST['class_name']) && $_POST['class_name'] != '') {
            $arr = $this->myinput->getBykeys(array('class_name'));
            $arr['class_id'] = $class_id;
            $res = $this->nks_class->update($arr);
            $this->handle_res($res, 'nksclass/classlist', 'nksclass/classupdate/' . $class_id);
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '修改班级信息',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksclass/classupdate/' . $class_id
        );
        $data['obj'] = $this->nks_class->getClassById($class_id);
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_class/classadd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function classdelete() {
        $this->check_admin(2);
        $class_id = $this->uri->segment(3);
        $this->load->model('nks/nks_class');
        $res = $this->nks_class->deleteClassById($class_id);

        $this->handle_res($res, 'nksclass/classlist', 'nksclass/classlist');

    }
}