<?php
/**
 * Created by PhpStorm.
 * User: sq
 * Date: 2018/1/9
 * Time: 22:12
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data = array(
            'baseurl' => base_url('load/'),
            'url' => base_url(''),
            'title'=> '吉林大学NLP-首页'
        );
        //获取首页五条最新的新闻
        $this->load->model('jlu_news');
        $obj_arr = $this->jlu_news->selectObj(0, 5,0, -1);
        $data['obj_arr'] = $obj_arr;

        $this->load->view("global/header",$data);
        $this->load->view("index/index");
        $this->load->view("global/footer");
    }


}