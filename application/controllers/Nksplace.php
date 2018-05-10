<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/5
 * Time: 19:53
 */
require_once('Nksmanager.php');

class Nksplace extends Nksmanager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function placelist() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '考试地点列表',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $this->load->model('nks/nks_place');
        $data['result'] = $this->nks_place->getAllPlaces();
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_place/placelist");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function placeadd() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        if(isset($_POST['pl_building']) && $_POST['pl_building'] != '' && isset($_POST['pl_room']) && $_POST['pl_room'] != '') {
            $arr = $this->myinput->getBykeys(array('pl_room', 'pl_building'));
            $pl_building = $arr['pl_building'];
            $pl_room = $arr['pl_room'];
            unset($arr['pl_building']);
            unset($arr['pl_room']);
            $arr['pl_place'] = $pl_building . '-' . $pl_room;
            $this->load->model('nks/nks_place');
            $res = $this->nks_place->insert($arr);
            $this->handle_res($res, 'nksplace/placelist', 'nksplace/placeadd');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '添加考试地点',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksplace/placeadd'
        );
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_place/placeadd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function placeupdate() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $pl_id = $this->uri->segment(3);
        $this->load->model('nks/nks_place');
        if(isset($_POST['pl_building']) && $_POST['pl_building'] != '' && isset($_POST['pl_room']) && $_POST['pl_room'] != '') {
            $arr = $this->myinput->getBykeys(array('pl_room', 'pl_building'));
            $pl_building = $arr['pl_building'];
            $pl_room = $arr['pl_room'];
            unset($arr['pl_building']);
            unset($arr['pl_room']);
            $arr['pl_place'] = $pl_building . '-' . $pl_room;
            $arr['pl_id'] = $pl_id;
            $res = $this->nks_place->update($arr);
            $this->handle_res($res, 'nksplace/placelist', 'nksplace/placeupdate/' . $pl_id);
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '修改考试地点',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksplace/placeupdate/' . $pl_id
        );
        $res = $this->nks_place->getPlaceById($pl_id);
        $x = explode('-', $res->pl_place);
        $obj['pl_building'] = $x[0];
        $obj['pl_room'] = $x[1];
        $data['obj'] = $obj;
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_param/nks_place/placeadd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function placedelete() {
        $this->check_admin(2);
        $pl_id = $this->uri->segment(3);
        $this->load->model('nks/nks_place');
        $res = $this->nks_place->deletePlaceById($pl_id);

        $this->handle_res($res, 'nksplace/placelist', 'nksplace/placelist');

    }
}