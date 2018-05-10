<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/5
 * Time: 15:19
 */
require_once('Nksmanager.php');

class Nksacademy extends Nksmanager{

    public function __construct()
    {
        parent::__construct();
    }

    public function academylist() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '学院列表',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $this->load->model('nks/nks_academy');
        $data['result'] = $this->nks_academy->getAllAcademies();
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_academy/academylist");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function academyadd() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        if(isset($_POST['ac_name']) && $_POST['ac_name'] != '') {
            $arr = $this->myinput->getBykeys(array('ac_name'));
            $this->load->model('nks/nks_academy');
            $res = $this->nks_academy->insert($arr);
            $this->handle_res($res, 'nksacademy/academylist', 'nksacademy/academyadd');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '添加学院信息',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksacademy/academyadd'
        );
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_academy/academyadd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function academyupdate() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $ac_id = $this->uri->segment(3);
        $this->load->model('nks/nks_academy');
        if(isset($_POST['ac_name']) && $_POST['ac_name'] != '') {
            $arr = $this->myinput->getBykeys(array('ac_name'));
            $arr['ac_id'] = $ac_id;
            $res = $this->nks_academy->update($arr);
            $this->handle_res($res, 'nksacademy/academylist', 'nksacademy/academyupdate/' . $ac_id);
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '修改学院信息',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksacademy/academyupdate/' . $ac_id
        );
        $data['obj'] = $this->nks_academy->getAcademyById($ac_id);
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_academy/academyadd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function academydelete() {
        $this->check_admin(2);
        $ac_id = $this->uri->segment(3);
        $this->load->model('nks/nks_academy');
        $res = $this->nks_academy->deleteAcademyById($ac_id);
        $this->handle_res($res, 'nksacademy/academylist', 'nksacademy/academylist/');

    }
}