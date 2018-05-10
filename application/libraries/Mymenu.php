<?php
/**
 * Created by PhpStorm.
 * User: sq
 * Date: 2017/5/20
 * Time: 9:46
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymenu
{
    public function getFirstMenu()
    {
        $CI =& get_instance();
        $CI->load->model('scu_menu');
        $res = $CI->scu_menu->getfirstMenu();
        return $res;
    }

    public function getSecondMenu($firstMenu)
    {
        $CI =& get_instance();
        $CI->load->model('scu_menu');
        $res = $CI->scu_menu->getsecondMenu($firstMenu);
        return $res;
    }



}