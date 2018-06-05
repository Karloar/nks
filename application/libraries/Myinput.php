<?php
/**
 * Created by PhpStorm.
 * User: sq
 * Date: 2017/5/20
 * Time: 15:43
 */

class Myinput
{
    //生成验证码，返回验证码对象
    public function getCaptcha($word_length =5)
    {
        //生成验证码
        $CI = & get_instance();
        $CI->load->helper('captcha');
        //验证码参数
        $vals = array(
            'img_path' => './load/images/captcha/',
            'img_url' => base_url('load/images/captcha/'),
            'font_path' => './load/images/Bold.ttf',
            'image_width' => '150',
            'img_height' => '30',
            'expiration' => 120,    //验证过期时间，单位s，默认2分钟
            'word_length'   => $word_length,
            'font_size' => 18,
            'colors'    => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(100, 150, 100),
                'grid' => array( mt_rand(157,255), mt_rand(157,255), mt_rand(157,255))
            )
        );
        $cap = create_captcha($vals);
        return $cap;
    }

    /**
     * @param $length 盐的长度
     * @return string 盐
     * function       随机生成盐
     */
    public function  createRandomStr($length = 10)
    {
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';//62个字符
        $strlen = 62;
        while($length > $strlen){
            $str .= $str;
            $strlen += 62;
        }
        $str = str_shuffle($str);
        return substr($str,0,$length);
    }
    /**
     * @param $inputname:form表单中input的name
     * @return string input的值
     * function : 接收并处理表单中的值
     */
    public function get_post($inputname)
    {
        $obj = "";
        if(isset($_POST[$inputname]))
        {
            $obj = htmlspecialchars(addslashes($_POST[$inputname]));
        }
        else if(isset($_GET[$inputname]))
        {
            $obj = htmlspecialchars(addslashes($_GET[$inputname]));
        }
        return $obj;
    }
	
	    /**
     * @param $keys : 表单中所有name的数组
     * @return array : 返回表单中的值，key-value
     */
    public function getBykeys($keys)
    {
        $arr = array();
        for($i=0;$i<count($keys);$i++)
        {
            $arr[$keys[$i]] = htmlspecialchars(addslashes($_POST[$keys[$i]]));
        }
        return $arr;
    }

    /**
     * @param $str : 需要处理的字符串
     * function : 字符串转义等安全处理
     */
    public function turn_char($str)
    {
        return htmlspecialchars(addslashes($str));
    }

    /**
     * @param $cou : 新闻总条数
     * @param $action : 跳转的页面
     * @param int $items_per_page : 每页显示的条数
     * function : 加载分页类，并设置参数
     */
    public function load_page($cou , $action  ,$items_per_page = 10)
    {
        $CI = & get_instance();
        $CI->load->library('pagination');
        $config['base_url'] = base_url($action);
        $config['total_rows'] = $cou;
        //每页显示条数20
        $config['per_page'] = $items_per_page;
        $config['prev_tag_open'] = '&nbsp&nbsp';
        $config['prev_tag_close'] = '&nbsp&nbsp';
        $config['next_tag_open'] = '&nbsp&nbsp';
        $config['next_tag_close'] = '&nbsp&nbsp';
        $config['num_tag_open'] = '&nbsp&nbsp';
        $config['num_tag_close'] = '&nbsp&nbsp';
        $config['num_links'] = 7;
        $CI->pagination->initialize($config);
    }

    /**
     * @param $page : 当前页
     * @param $total_num : 数据总条数
     * @param $per_page_num : 每页数据条数
     */
    public function check_page($page, $total_num, $per_page_num)
    {
        if($page == -1)
        {
            $page = 0;
        }
        else if($page == -2)    //尾页
        {
            $page = floor($total_num/$per_page_num);
        }
        else if($page >floor($total_num/$per_page_num))
        {
            $page = floor($total_num/$per_page_num);
        }
        return $page;
    }

    /**
     * @param $res : 某种操作后的结果，多数指对数据库的某种操作的返回值
     * @param $turn_page : 跳转的页面
     * @param string $m_1 : 若res = 1，弹出的信息
     * @param string $m_0 : 若res = 1 弹出的信息
     * function : 对于某种操作的返回值处理后续工作，弹窗，跳转。
     */
    public function handle_res($res, $turn_page ,$m_1="操作成功" , $m_0="服务器繁忙，请稍后重试")
    {
        $message = "";
        if($res)
        {
            $message = $m_1;
        }
        else
        {
            $message = $m_0;
        }
        echo "<script>alert('".$message."');window.location.href='".base_url($turn_page)."'</script>";
    }

    public function js($arr)
    {
        if (is_array($arr)) {
            foreach ($arr as $item) {
                echo "<script language='JavaScript' type='text/javascript' src='" . base_url('load/js/') . $item . "'></script>";
            }
        } else {
            echo "<script language='JavaScript' type='text/javascript' src='" . base_url('load/js/') . $arr . "'></script>";
        }
    }

    public function css($arr)
    {
        if (is_array($arr)) {
            foreach ($arr as $item) {
                echo "<link rel='stylesheet' type='text/css' href='" . base_url('load/css/') . $item . "' />";
            }
        } else {
            echo "<link rel='stylesheet' type='text/css' href='" . base_url('load/css/') . $arr . "' />";
        }
    }

    //字符串过长时，后边显示...
    public function cut_str($str , $len)
    {
        if(strlen($str) > $len)
        {
            $s = '';
            for ($i = 0 ; $i < $len ; $i++)
            {
                if(ord($str[$i]) > 127 )
                {
                    if(ord($str[$i])==194)
                    {
                        $s .= $str[$i].$str[++$i];
                    }
                    else
                    {
                        $s .= $str[$i].$str[++$i].$str[++$i];
                    }

                }
                else
                {
                    $s .= $str[$i];
                }
            }
            $s .= '.....';
        }
        else
        {
            $s = $str;
        }
        return $s;
    }

    //获取字符串中，第一个<img 的src
    public function getFirstImg($str)
    {
        $img = '<img src="';
        $img_src = "";
        for($i = 0; $i<strlen($str); $i++)
        {
            if($str[$i] == $img[0])
            {
                $ok = 1;
                $below = 1;
                for($j= $below; $j<strlen($img); $j++)
                {
                    if((($i+$j)>=strlen($str))||$str[$i+$j]!=$img[$j])
                    {
                        $ok = 0;
                        //break;
                    }
                }
                if($ok)
                {
                    //前边字符串匹配成功
                    $k= $i + strlen($img);
                    while($str[$k] != '"'&&$k<strlen($str))
                    {
                        $img_src .=$str[$k];
                        $k++;
                    }
                    break;
                }
            }
        }
        return $img_src;
    }

    //获取文章内的所有img
    public function getAllImg($str)
    {
        $img = '<img src="';
        $img_src = array();
        for($i = 0; $i<strlen($str); $i++)
        {
            if($str[$i] == $img[0])
            {
                $ok = 1;
                $below = 1;
                for($j= $below; $j<strlen($img); $j++)
                {
                    if((($i+$j)>=strlen($str))||$str[$i+$j]!=$img[$j])
                    {
                        $ok = 0;
                        //break;
                    }
                }
                if($ok)
                {
                    //前边字符串匹配成功
                    $k= $i + strlen($img);
                    $src = '';
                    while($str[$k] != '"'&&$k<strlen($str))
                    {
                        $src .=$str[$k];
                        $k++;
                    }
                    $img_src[] = $src;
                    $i += strlen($src);
                }
            }
        }
        return $img_src;
    }

    /**
     * @param $mess:发送邮件内容
     * @param $address 邮件地址
     * @param  $name : 用户名
     * function ： 给用户发送邮件
     */
      public function sendemail($mess, $address,$name)
    {
        $CI = & get_instance();
        $phpmailer = $CI->load->library('phpmailer');
        $mail = new phpmailer(true); //建立邮件发送类
        $mail->CharSet = "UTF-8";//设置信息的编码类型
        //$address = "921939874@qq.com";//收件人地址
        $mail->IsSMTP(); // 使用SMTP方式发送
        $mail->Host = "smtpdm.aliyun.com"; //使用163邮箱服务器
        $mail->SMTPAuth = true; // 启用SMTP验证功能
        $mail->Username = "postmaster@man.jlunlp.com"; //你的163服务器邮箱账号
        $mail->Password = "TpengEmail5557"; // 163邮箱密码
		$mail->SMTPSecure = "ssl";
        $mail->Port = 465;//邮箱服务器端口号
        $mail->From = "postmaster@man.jlunlp.com"; //邮件发送者email地址
        $mail->FromName = "吉林大学-NLP";//发件人名称
        $mail->AddAddress("$address", $name); //收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
        //$mail->AddAttachment("D:\abc.txt"); // 添加附件(注意：路径不能有中文)
        $mail->IsHTML(true);//是否使用HTML格式
        $mail->Subject = "找回密码"; //邮件标题
        $mail->Body = $mess; //邮件内容，上面设置HTML，则可以是HTML
        if (!$mail->Send()) {
            return 0;
        }
        else
        {
            return 1;
        }
    }
}