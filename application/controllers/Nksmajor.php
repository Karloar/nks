<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/5
 * Time: 15:50
 */
require_once('Nksmanager.php');

class Nksmajor extends Nksmanager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function majorlist() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '专业列表',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $this->load->model('nks/nks_major');
        $data['result'] = $this->nks_major->getAllMajors();
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_major/majorlist");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function majoradd() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        if(isset($_POST['mj_name']) && $_POST['mj_name'] != '' && isset($_POST['ac_id']) && $_POST['ac_id'] != '') {
            $arr = $this->myinput->getBykeys(array('mj_name', 'ac_id'));
            $this->load->model('nks/nks_major');
            $res = $this->nks_major->insert($arr);
            $this->handle_res($res, 'nksmajor/majorlist', 'nksmajor/majoradd');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '添加专业信息',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksmajor/majoradd'
        );
        $this->load->model('nks/nks_academy');
        $data['result'] = $this->nks_academy->getAllAcademies();
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_major/majoradd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function majorupdate() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $mj_id = $this->uri->segment(3);
        $this->load->model('nks/nks_major');
        if(isset($_POST['mj_name']) && $_POST['mj_name'] != '' && isset($_POST['ac_id']) && $_POST['ac_id'] != '') {
            $arr = $this->myinput->getBykeys(array('mj_name', 'ac_id'));
            $this->load->model('nks/nks_major');
            $arr['mj_id'] = $mj_id;
            $res = $this->nks_major->update($arr);
            $this->handle_res($res, 'nksmajor/majorlist', 'nksmajor/update/' . $mj_id);
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '修改专业信息',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksmajor/majorupdate/' . $mj_id
        );
        $data['obj'] = $this->nks_major->getMajorById($mj_id);
        $this->load->model('nks/nks_academy');
        $data['result'] = $this->nks_academy->getAllAcademies();
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_major/majoradd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function majordelete() {
        $this->check_admin(2);
        $mj_id = $this->uri->segment(3);
        $this->load->model('nks/nks_major');
        $res = $this->nks_major->deleteMajorById($mj_id);
        $this->handle_res($res, 'nksmajor/majorlist', 'nksmajor/majorlist');

    }
}