<?php
/**
 * Created by PhpStorm.
 * User: sq
 * Date: 2017/5/20
 * Time: 9:18
 */

if(isset($message))
{
    echo "<script>alert('".$message."')</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Apple iOS and Android stuff (do not remove) -->
    <meta name="apple-mobile-web-app-capable" content="no" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />

    <!-- Required Stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>css/reset.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>css/text.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>css/fonts/ptsans/stylesheet.css"  media="screen" />

    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>css/core/form.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>css/core/login.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>css/core/button.css"  media="screen" />

    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>css/mws.theme.css"  media="screen" />

    <!-- JavaScript Plugins -->
    <script type="text/javascript" src="<?=$baseurl?>js/jquery-1.7.2.min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>js/jquery.placeholder.js" ></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script type="text/javascript" src="<?=$baseurl?>jui/js/jquery-ui-effecs.min.js" ></script>

    <!-- Plugin Scripts -->
    <script type="text/javascript" src="<?=$baseurl?>plugins/validate/jquery.validate-min.js" ></script>

    <!-- Login Script -->
    <script type="text/javascript" src="<?=$baseurl?>js/core/login.js" ></script>

    <title>Login</title>

</head>

<body>

<div id="mws-login-wrapper">
    <div id="mws-login">
        <h1>登录</h1>
        <div class="mws-login-lock"><img src="<?=$baseurl?>css/icons/24/locked-2.png"  alt="" /></div>
        <div id="mws-login-form">
            <form class="mws-form" action="" method="post">
                <?php echo form_open('nksuser/login')?>
                <div class="mws-form-row">
                    <div class="mws-form-item large">
                        <input type="text" name="us_number" class="mws-login-username mws-textinput required" placeholder="用户名" value="<?php echo($us_number); ?>"  />
                    </div>
                </div>
                <div class="mws-form-row">
                    <div class="mws-form-item large">
                        <input type="password" name="us_password" class="mws-login-password mws-textinput required" placeholder="密码" />
                    </div>
                </div>
                <div class="mws-form-row">
                    <div class="mws-form-item large">
                        <?php
                        echo "<a href='JavaScript:updateCaptcha()' style='text-decoration: none'><img id='CaptchaImg' src='".$baseurl.'images/captcha/'.$cap_imgname."' style='width:150px;height30px;border:0px'></a>"."<a href='".$url."user/findpass' style='padding-left:20px;color:#ffffff;text-decoration:none' href=''>忘记密码？</a>";
                        ?>
                    </div>
                </div>
                <div class="mws-form-row">
                    <div class="mws-form-item large">
                        <input id="CaptahcInput" type="text" name="captcha" value="<?= isset($cap_word)? $cap_word: '' ?>" class="mws-login-password mws-textinput required" placeholder="验证码" />
                    </div>
                </div>
                <div class="mws-form-row mws-inset">
                    <ul class="mws-form-list inline">
                        <li><input type="checkbox" /> <label>Remember me</label></li>
                    </ul>
                </div>
                <div class="mws-form-row">
                    <input type="submit" value="登录" class="mws-button green mws-login-button" />
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
