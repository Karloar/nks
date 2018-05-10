<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/5
 * Time: 19:53
 */
require_once('Nksmanager.php');

class Nkstime extends Nksmanager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function timelist() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '考试时间列表',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $this->load->model('nks/nks_time');
        $data['result'] = $this->nks_time->getAllTime();
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_time/timelist");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function timeadd() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        if(isset($_POST['tm_time']) && $_POST['tm_time'] != '') {
            $arr = $this->myinput->getBykeys(array('tm_time'));
            $this->load->model('nks/nks_time');
            if($this->nks_time->tm_time_exists($arr['tm_time'])) {
                $res = false;
            } else {
                $res = $this->nks_time->insert($arr);
            }
            $this->handle_res($res, 'nkstime/timelist', 'nkstime/timeadd');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '添加考试时间',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nkstime/timeadd'
        );
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_time/timeadd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function timeupdate() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $tm_id = $this->uri->segment(3);
        $this->load->model('nks/nks_time');
        if(isset($_POST['tm_time']) && $_POST['tm_time'] != '') {
            $arr = $this->myinput->getBykeys(array('tm_time'));
            $arr['tm_id'] = $tm_id;
            $res = $this->nks_time->update($arr);
            $this->handle_res($res, 'nkstime/timelist', 'nkstime/timeupdate/' . $tm_id);
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '修改考试时间',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nkstime/timeupdate/' . $tm_id
        );
        $data['obj'] = $this->nks_time->getTimeById($tm_id);
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_time/timeadd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function timedelete() {
        $this->check_admin(2);
        $tm_id = $this->uri->segment(3);
        $this->load->model('nks/nks_time');
        $res = $this->nks_time->deleteTimeById($tm_id);

        $this->handle_res($res, 'nkstime/timelist', 'nkstime/timelist');

    }
}