<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/4
 * Time: 10:11
 */

class Nksuser extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('mymenu','form_validation','myinput'));
    }


    public function register()
    {
        $message = '';
        $cap_solt = 'PZHw8*%*';
        $ok = 0;//flag ,是否验证成功
        if(isset($_POST['us_number'])&&$_POST['us_number']!=''&&isset($_POST['us_password'])&&$_POST['us_password']!=''
            &&isset($_POST['us_password_again'])&&$_POST['us_password_again']!=''&&isset($_POST['us_email'])&&$_POST['us_email']!=''
            &&isset($_POST['captcha'])&&$_POST['captcha']!='')
        {
            $ok = 1;
            $captcha = strtolower($_POST['captcha']);
            //判断验证码是否有效
            if(!isset($_COOKIE['code'])||$_COOKIE['code']=='')
            {
                $ok = 0;
                $message = "验证码无效";
            }
            //验证码是否正确
            if($ok&&md5($cap_solt.$captcha) != $_COOKIE['code'])
            {
                $ok = 0;
                $message = '验证码错误！';
            }
            $psw = $_POST['us_password'];
            $pswagain = $_POST['us_password_again'];
            //两次密码是否相同
            if($ok && $psw != $pswagain)
            {
                $ok = 0;
                $message = '两次密码不同';
            }
            //验证邮箱是否有效
            $email = $this->myinput->get_post('us_email');
            if($ok)
            {
                $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
                if(!preg_match( $pattern, $email))
                {
                    $ok = 0;
                    $message = "邮箱无效";
                }
            }
            $us_number = $this->myinput->get_post('us_number');
            //用户名是否已经存在
            $this->load->model('nks/nks_user');


            if($ok&&$this->nks_user->us_number_exists($us_number))
            {
                $ok = 0;
                $message = '用户名已存在，请直接登录';
            }

            //可以将信息插入数据库
            if($ok)
            {
                $solt = $this->myinput->createRandomStr();
                $newpsw = hash_pbkdf2("sha256",$psw,$solt,1000,20);
                $us_arr = array(
                    'us_number'=>$us_number,
                    'us_password'=>$newpsw,
                    'us_email'=>$email,
                    'us_admin'=>0,//默认为普通用户
                    'us_name'=>$this->myinput->get_post('us_name'),
                    'us_phone' => $this->myinput->get_post('us_phone'),
                    'us_solt' => $solt
                );

                $res = $this->nks_user->insert($us_arr);
                if(!$res)
                {
                    $ok = 0;
                }
            }
        }
        if($ok)
        {
            echo "<script>alert('注册成功！');window.location.href='".base_url('nksuser/login')."'</script>";
        }
        echo "<script>globalUrl='".base_url('')."';Url='".base_url('load/')."'</script>";
        $this->myinput->js("user/captcha.js");
        $data = array(
            'url'=>base_url(''),
            'baseurl'=>base_url('load/'),
            'title'=>'登录',
        );
        if($message != '')
        {
            $data['message'] = $message;
        }
        $cap = $this->myinput->getCaptcha();
        //验证码存入cookie方式为加盐MD5
        setcookie('code',md5($cap_solt.strtolower($cap['word'])),time()+300);
        //echo $cap['word']."<br>";
        /************************************************/
        //为了测试方便验证码自动填充
        $data['cap_word'] =  $cap['word'];
        /************************************************/

        $data['cap_imgname'] = $cap['filename'];
        $data['us_number'] = isset($_POST['us_number']) ? $_POST['us_number'] : '';
        $data['us_name'] = isset($_POST['us_name']) ? $_POST['us_name'] : '';
        $data['us_email'] = isset($_POST['us_email']) ? $_POST['us_email'] : '';
        $data['us_phone'] = isset($_POST['us_phone']) ? $_POST['us_phone'] : '';

        $this->load->view('nks/nks_user/register',$data);
    }

    public function login()
    {
        //echo  hash_pbkdf2("sha256","111111","cShJvXKUuH",1000,20);
        //exit;
        $message = '';
        $cap_solt = 'PZHw8*%*';
        $ok = 0;//flag ,是否验证成功
        if(isset($_POST['us_number'])&&$_POST['us_number']!=''&&isset($_POST['us_password'])&&$_POST['us_password']!=''&&
            isset($_POST['captcha'])&&$_POST['captcha']!='')
        {
            $ok = 1;
            $captcha = strtolower($_POST['captcha']);
            //判断验证码是否有效
            if(!isset($_COOKIE['code'])||$_COOKIE['code']=='')
            {
                $ok = 0;
                $message = "验证码无效";
            }
            //验证码是否正确
            if($ok&&md5($cap_solt.$captcha) != $_COOKIE['code'])
            {
                $ok = 0;
                $message = '验证码错误！';
            }
            if($ok)
            {
                $us_number = $this->myinput->get_post('us_number');
                $us_password = $this->myinput->get_post('us_password');
                $this->load->model('nks/nks_user');

                if($this->nks_user->us_number_exists($us_number)) {
                    $res = $this->nks_user->getUserByNumber($us_number);
                } else {
                    $res = null;
                }

                if($res && hash_pbkdf2("sha256",$us_password, $res->us_solt,1000,20) == $res->us_password) {
                    $this->use_session();
                    $this->check_session();
                    $_SESSION['nks_user'] = $res;
                    redirect('nksmanager/index');
                }
                else
                {
                    $message = "用户名或密码错误";
                }
            }
        }
        echo "<script>globalUrl='".base_url('')."';Url='".base_url('load/')."'</script>";
        $this->myinput->js("user/captcha.js");
        $data = array(
            'url'=>base_url(''),
            'baseurl'=>base_url('load/'),
            'title'=>'登录',
            'us_number'=>isset($_POST['us_number'])?$this->myinput->get_post('us_number'):'',
            'us_password'=>isset($_POST['us_password'])?$this->myinput->get_post('us_password'):'',
        );
        if($message != '')
        {
            $data['message'] = $message;
        }
        $cap = $this->myinput->getCaptcha();
        setcookie('code',md5($cap_solt.strtolower($cap['word'])),time()+300);
        //echo $cap['word']."<br>";

        /************************************************/
        //为了测试方便验证码自动填充
        $data['cap_word'] =  $cap['word'];
        /************************************************/

        $data['cap_imgname'] = $cap['filename'];
        $this->load->view('nks/nks_user/login',$data);
    }

    public function userlist() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '用户列表',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
        );
        $this->load->model('nks/nks_user');
        $per_page_num = 13;
        $firstResult = $this->uri->segment(3);
        if(!isset($firstResult) || $firstResult == '') {
            $firstResult = 0;
        }
        $total_num = count($this->nks_user->getAllUsers());
        $this->myinput->load_page($total_num, 'nksuser/userlist', $per_page_num);
        $data['result'] = $this->nks_user->getUsersbyPage($firstResult, $per_page_num);

        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_user/userlist");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function useradd() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        if(isset($_POST['us_number']) && $_POST['us_number'] != '' && isset($_POST['us_password']) && $_POST['us_password']) {
            $arr = $this->myinput->getBykeys(array('us_number', 'us_name', 'us_password', 'us_email', 'us_phone'));
            $this->load->model('nks/nks_user');
            if($this->nks_user->us_number_exists($arr['us_number'])) {
                $res = false;
            } else {
                $arr['us_solt'] = $this->myinput->createRandomStr();
                $arr['us_password'] = hash_pbkdf2("sha256",$arr['us_password'],$arr['us_solt'],1000,20);
                $res = $this->nks_user->insert($arr);
            }
            $this->handle_res($res, 'nksuser/userlist', 'nksuser/useradd', '操作成功', '用户已存在！');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '添加用户',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksuser/useradd'
        );
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_user/useradd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function userupdate() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $us_id = $this->uri->segment(3);
        $this->load->model('nks/nks_user');
        if(isset($_POST['us_number']) && $_POST['us_number'] != '' && isset($_POST['us_password']) && $_POST['us_password']) {
            $arr = $this->myinput->getBykeys(array('us_number', 'us_name', 'us_password', 'us_email', 'us_phone'));
            $this->load->model('nks/nks_user');
            if($this->nks_user->us_number_exists($arr['us_number'])) {
                $nks_user = $this->nks_user->getUserByNumber($arr['us_number']);
                if($us_id != $nks_user->us_id) {
                    $res = false;
                } else {
                    $arr['us_solt'] = $this->nks_user->getUserById($us_id)->us_solt;
                    $arr['us_password'] = hash_pbkdf2("sha256",$arr['us_password'],$arr['us_solt'],1000,20);
                    $arr['us_id'] = $us_id;
                    $res = $this->nks_user->update($arr);
                }
            } else {
                $arr['us_solt'] = $this->nks_user->getUserById($us_id)->us_solt;
                $arr['us_password'] = hash_pbkdf2("sha256",$arr['us_password'],$arr['us_solt'],1000,20);
                $arr['us_id'] = $us_id;
                $res = $this->nks_user->update($arr);
            }
            $this->handle_res($res, 'nksuser/userlist', 'nksuser/userupdate/' . $us_id, '操作成功', '用户已存在！');
        }
        $data = array(
            'url' => base_url(''),
            'baseurl' => base_url('load/'),
            'title' => '修改用户信息',
            'us_name' => $user->us_name,
            'us_img' => $user->us_img,
            'form_ac' => 'nksuser/userupdate/' . $us_id
        );
        $data['obj'] = $this->nks_user->getUserById($us_id);
        $this->load->view("nks/nks_global/admin_header_ks", $data);
        $this->load->view("nks/nks_user/useradd");
        $this->load->view("nks/nks_global/footer_man");
    }

    public function userdelete() {
        $this->check_admin(2);
        $user = $_SESSION['nks_user'];
        $us_id = $this->uri->segment(3);
        if($user->us_id == $us_id) {
            $res = false;
        } else {
            $this->load->model('nks/nks_user');
            $us = $this->nks_user->getUserById($us_id);
            if($us->us_admin == 1) {
                $this->handle_res(false, 'nksuser/userlist', 'nksuser/userlist', '操作成功', '先将该用户变成普通用户！！！');
            } else {
                $res = $this->nks_user->deleteUserById($us_id);
            }
        }

        $this->handle_res($res, 'nksuser/userlist', 'nksuser/userlist', '操作成功', '禁止删除自身！');

    }

    private function check_login() {
        $this->use_session();
        if(!isset($_SESSION['nks_user'])) {
            redirect('nksuser/login');
        }
        $this->check_session();
    }

    private function check_admin($admin) {
        $this->check_login();
        $user = $_SESSION['nks_user'];
        if($user->us_admin < $admin) {
            redirect('nksuser/logout');
        }
    }


    public function handle_res($res, $succeed_turn_page, $fail_turn_page ,$m_1="操作成功" , $m_0="服务器繁忙，请稍后重试") {
        if($res) {
            echo "<script>alert('".$m_1."');window.location.href='".base_url($succeed_turn_page)."'</script>";
        } else {
            echo "<script>alert('".$m_0."');window.location.href='".base_url($fail_turn_page)."'</script>";
        }
    }


    public function logout() {
        $this->use_session();
        session_destroy();
        redirect('nksuser/login');
    }

    private function use_session() {
        if(session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    private function check_session() {
        if(isset($_SESSION['expiretime']) && $_SESSION['expiretime'] < time()) {
            unset($_SESSION['expiretime']);
            redirect('nksuser/logout');
        } else {
            $_SESSION['expiretime'] = time() + 3600;
        }
    }
}