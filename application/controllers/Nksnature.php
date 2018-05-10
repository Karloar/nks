<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/5
 * Time: 19:53
 */
require_once('Nksmanager.php');

class Nksnature extends Nksmanager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function naturelist() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '课程性质列表',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $this->load->model('nks/nks_nature');
        $data['result'] = $this->nks_nature->getAllNatures();
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_nature/naturelist");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function natureadd() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        if(isset($_POST['nt_name']) && $_POST['nt_name'] != '') {
            $arr = $this->myinput->getBykeys(array('nt_name'));
            $this->load->model('nks/nks_nature');
            $res = $this->nks_nature->insert($arr);
            $this->handle_res($res, 'nksnature/naturelist', 'nksnature/natureadd');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '添加课程性质',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksnature/natureadd'
        );
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_nature/natureadd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function natureupdate() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $nt_id = $this->uri->segment(3);
        $this->load->model('nks/nks_nature');
        if(isset($_POST['nt_name']) && $_POST['nt_name'] != '') {
            $arr = $this->myinput->getBykeys(array('nt_name'));
            $arr['nt_id'] = $nt_id;
            $res = $this->nks_nature->update($arr);
            $this->handle_res($res, 'nksnature/naturelist', 'nksnature/natureupdate/' . $nt_id);
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '修改课程性质',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksnature/natureupdate/' . $nt_id
        );
        $data['obj'] = $this->nks_nature->getNatureById($nt_id);
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_nature/natureadd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function naturedelete() {
        $this->check_admin(2);
        $nt_id = $this->uri->segment(3);
        $this->load->model('nks/nks_nature');
        $res = $this->nks_nature->deleteNatureById($nt_id);

        $this->handle_res($res, 'nksnature/naturelist', 'nksnature/naturelist');

    }
}