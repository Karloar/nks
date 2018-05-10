<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/4
 * Time: 10:04
 */

class Nksmanager extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('myinput');
    }

    public function index()
    {
        $this->check_login();
        $user = $_SESSION['nks_user'];
        $data = array(
            'url'=> base_url(''),
            'baseurl'=> base_url('load/'),
            'title'=> 'Jlu-考试系统',
            'us_name'=>$user->us_name,
            'us_img'=>$user->us_img
        );
        if($user->us_admin == 2) {
            $this->load->view("nks/nks_global/admin_header_ks", $data);
        } else {
            $this->load->view("nks/nks_global/header_ks", $data);
        }
        $this->load->view("nks/nks_manager/index");
        $this->load->view("nks/nks_global/footer_man");
    }


    private function check_login() {
        $this->use_session();
        if(!isset($_SESSION['nks_user'])) {
            redirect('nksuser/login');
        }
        $this->check_session();
    }


    public function handle_res($res, $succeed_turn_page, $fail_turn_page ,$m_1="操作成功" , $m_0="服务器繁忙，请稍后重试") {
        if($res) {
            echo "<script>alert('".$m_1."');window.location.href='".base_url($succeed_turn_page)."'</script>";
        } else {
            echo "<script>alert('".$m_0."');window.location.href='".base_url($fail_turn_page)."'</script>";
        }
    }

    protected function info($message) {
        echo "<script>alert('".$message."');</script>";
    }

    protected function check_admin($admin) {
        $this->check_login();
        $user = $_SESSION['nks_user'];
        if($user->us_admin < $admin) {
            redirect('nksuser/logout');
        }
    }

    protected function use_session() {
        if(session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    protected function check_session() {
        if(isset($_SESSION['expiretime']) && $_SESSION['expiretime'] < time()) {
            unset($_SESSION['expiretime']);
            redirect('nksuser/logout');
        } else {
            $_SESSION['expiretime'] = time() + 3600;
        }
    }
}