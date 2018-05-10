<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/6
 * Time: 14:18
 */
require_once('Nksmanager.php');


class Nkslab extends Nksmanager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function lablist() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '教研室列表',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $this->load->model('nks/nks_lab');
        $per_page_num = 13;
        $firstResult = $this->uri->segment(3);
        if(!isset($firstResult) || $firstResult == '') {
            $firstResult = 0;
        }
        $total_num = count($this->nks_lab->getAllLabs());
        $this->myinput->load_page($total_num, 'nkslab/lablist', $per_page_num);
        $data['result'] = $this->nks_lab->getLabsByPage($firstResult, $per_page_num);

        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_lab/lablist");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function labadd() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $this->load->model('nks/nks_user');
        if(isset($_POST['lb_name']) && $_POST['lb_name'] != '' && isset($_POST['lb_num']) && $_POST['lb_num']
           && isset($_POST['us_id']) && $_POST['us_id']) {
            $arr = $this->myinput->getBykeys(array('lb_name', 'lb_num', 'us_id'));
            $this->load->model('nks/nks_lab');
            $res = $this->nks_lab->insert($arr);
            $us = $this->nks_user->getUserById($arr['us_id']);
            $us->us_admin = 1;
            $this->nks_user->update((array)$us);
            $this->handle_res($res, 'nkslab/lablist', 'nkslab/labadd', '操作成功', '用户已存在！');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '添加教研室',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nkslab/labadd'
        );
        $data['manager'] = $this->nks_user->getUsersByAdmin(0);
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_lab/labadd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function labupdate() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $lb_id = $this->uri->segment(3);
        $this->load->model('nks/nks_user');
        $this->load->model('nks/nks_lab');
        if(isset($_POST['lb_name']) && $_POST['lb_name'] != '' && isset($_POST['lb_num']) && $_POST['lb_num']
            && isset($_POST['us_id']) && $_POST['us_id']) {
            $arr = $this->myinput->getBykeys(array('lb_name', 'lb_num', 'us_id'));
            $arr['lb_id'] = $lb_id;
            $obj = $this->nks_lab->getLabById($lb_id);
            $us = $this->nks_user->getUserById($obj->us_id);
            $us->us_admin = 0;
            $res1 = $this->nks_user->update((array)$us);
            $res2 = $this->nks_lab->update($arr);
            $us = $this->nks_user->getUserById($arr['us_id']);
            $us->us_admin = 1;
            $res3 = $this->nks_user->update((array)$us);

            $this->handle_res($res1 && $res2 && $res3, 'nkslab/lablist', 'nkslab/update/' . $lb_id, '操作成功', '用户已存在！');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '修改教研室信息',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nkslab/labupdate/' . $lb_id
        );
        $data['manager'] = $this->nks_user->getUsersByAdmin(0);
        $data['obj'] = $this->nks_lab->getLabById($lb_id);
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_lab/labadd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function labdelete() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $lb_id = $this->uri->segment(3);
        $this->load->model('nks/nks_user');
        $this->load->model('nks/nks_lab');
        $obj = $this->nks_user->getUserById($this->nks_lab->getLabById($lb_id)->us_id);
        $obj->us_admin = 0;
        $res1 = $this->nks_user->update((array)$obj);
        $res = $this->nks_lab->deleteLabById($lb_id);


        $this->handle_res($res && $res1, 'nkslab/lablist', 'nkslab/lablist');

    }
}