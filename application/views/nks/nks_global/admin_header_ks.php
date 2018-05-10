<?php
/**
 * Created by PhpStorm.
 * User: sq
 * Date: 2018/4/2
 * Time: 9:06
 */
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
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>css/fluid.css"  media="screen" />

    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>css/mws.style.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>css/icons/16x16.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>css/icons/24x24.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>css/icons/32x32.css"  media="screen" />

    <!-- Demo and Plugin Stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>css/demo.css"  media="screen" />

    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>plugins/colorpicker/colorpicker.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>plugins/imgareaselect/css/imgareaselect-default.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>plugins/fullcalendar/fullcalendar.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>plugins/fullcalendar/fullcalendar.print.css"  media="print" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>plugins/chosen/chosen.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>plugins/prettyphoto/css/prettyPhoto.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>plugins/tipsy/tipsy.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>plugins/sourcerer/Sourcerer-1.2.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>plugins/jgrowl/jquery.jgrowl.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>plugins/spinner/ui.spinner.css"  media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>jui/css/jquery.ui.all.css"  media="screen" />

    <!-- Theme Stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>css/mws.theme.css"  media="screen" />

    <!-- JavaScript Plugins -->
    <script type="text/javascript" src="<?=$baseurl?>js/jquery-1.7.2.min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>js/jquery.mousewheel.min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>js/jquery.placeholder.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>js/jquery.fileinput.js" ></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script type="text/javascript" src="<?=$baseurl?>jui/js/jquery-ui.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>jui/js/jquery.ui.timepicker.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>jui/js/jquery.ui.touch-punch.min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/spinner/ui.spinner.min.js" ></script>

    <!-- Plugin Scripts -->
    <script type="text/javascript" src="<?=$baseurl?>plugins/imgareaselect/jquery.imgareaselect.min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/duallistbox/jquery.dualListBox-1.3.min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/jgrowl/jquery.jgrowl-min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/fullcalendar/fullcalendar.min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/datatables/jquery.dataTables.min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/chosen/chosen.jquery.min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/prettyphoto/js/jquery.prettyPhoto.min.js" ></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?=$baseurl?>plugins/flot/excanvas.min.js" ></script>
    <![endif]-->
    <script type="text/javascript" src="<?=$baseurl?>plugins/flot/jquery.flot.min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/flot/jquery.flot.pie.min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/flot/jquery.flot.stack.min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/flot/jquery.flot.resize.min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/colorpicker/colorpicker-min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/tipsy/jquery.tipsy-min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/sourcerer/Sourcerer-1.2-min.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/smartwizard/js/jquery.smartWizard-2.0.js" ></script>
    <script type="text/javascript" src="<?=$baseurl?>plugins/validate/jquery.validate-min.js" ></script>

    <!-- Core Script -->
    <script type="text/javascript" src="<?=$baseurl?>js/core/mws.js" ></script>

    <!-- Themer Script (Remove if not needed) -->
    <script type="text/javascript" src="<?=$baseurl?>js/core/themer.js" ></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script type="text/javascript" src="<?=$baseurl?>js/demo/demo.js" ></script>

    <title><?=isset($title)?$title:'Jlunlp'?></title>

</head>

<body>

<!-- Themer (Remove if not needed) -->
<div id="mws-themer">
    <div id="mws-themer-content">
        <div id="mws-themer-ribbon"></div>
        <div id="mws-themer-toggle"></div>
        <div id="mws-theme-presets-container" class="mws-themer-section">
            <label for="mws-theme-presets">Color Presets</label>
        </div>
        <div class="mws-themer-separator"></div>
        <div id="mws-theme-pattern-container" class="mws-themer-section">
            <label for="mws-theme-patterns">Background</label>
        </div>
        <div class="mws-themer-separator"></div>
        <div class="mws-themer-section">
            <ul>
                <li class="clearfix"><span>Base Color</span> <div id="mws-base-cp" class="mws-cp-trigger"></div></li>
                <li class="clearfix"><span>Highlight Color</span> <div id="mws-highlight-cp" class="mws-cp-trigger"></div></li>
                <li class="clearfix"><span>Text Color</span> <div id="mws-text-cp" class="mws-cp-trigger"></div></li>
                <li class="clearfix"><span>Text Glow Color</span> <div id="mws-textglow-cp" class="mws-cp-trigger"></div></li>
                <li class="clearfix"><span>Text Glow Opacity</span> <div id="mws-textglow-op"></div></li>
            </ul>
        </div>
        <div class="mws-themer-separator"></div>
        <div class="mws-themer-section">
            <button class="mws-button red small" id="mws-themer-getcss">Get CSS</button>
        </div>
    </div>
    <div id="mws-themer-css-dialog">
        <form class="mws-form">
            <div class="mws-form-row">
                <div class="mws-form-item">
                    <textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Themer End -->

<!-- Header -->
<div id="mws-header" class="clearfix">

    <!-- Logo Container -->
    <div id="mws-logo-container">

        <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        <div id="mws-logo-wrap">
            <img src="<?=$baseurl?>images/mws-logo.png"  alt="mws admin" />
        </div>
    </div>

    <!-- User Tools (notifications, logout, profile, change password) -->
    <div id="mws-user-tools" class="clearfix">
        <!-- User Information and functions section -->
        <div id="mws-user-info" class="mws-inset">
            <!-- Username and Functions -->
            <div id="mws-user-functions">
                <div id="mws-username" style="font-size:25px">
                    Hello, <?=isset($us_name)?$us_name:'管理员';?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Main Wrapper -->
<div id="mws-wrapper">

    <!-- Necessary markup, do not remove -->
    <div id="mws-sidebar-stitch"></div>
    <div id="mws-sidebar-bg"></div>

    <!-- Sidebar Wrapper -->
    <div id="mws-sidebar">

        <!-- Searchbox -->
        <div id="mws-searchbox" class="mws-inset" style="text-align:center;">
            <img src="<?=$baseurl?>images/userimg/<?=isset($us_img)?$us_img:'user_img.png'?>"  alt="mws admin" />
        </div>

        <!-- Main Navigation -->
        <div id="mws-navigation">
            <ul>
                <li>
                    <a href="<?=$baseurl?>#" class="mws-i-24 i-admin-user">个人中心</a>
                    <ul class="closed">
                        <li><a href="<?=$url?>nksmanager/index">修改个人信息</a></li>
                        <li><a href="<?=$url?>nksmanager/index">修改头像</a></li>
                        <li><a href="<?=$url?>nksmanager/index">修改密码</a></li>
                        <li><a href="<?=$url?>nksuser/logout" >注销</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?=$baseurl?>#" class="mws-i-24 i-users">用户管理</a>
                    <ul class="closed">
                        <li><a href="<?=$url?>nksuser/userlist">用户列表</a></li>
                        <li><a href="<?=$url?>nksuser/useradd">添加用户</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?=$baseurl?>#" class="mws-i-24 i-balloons">考试模块</a>
                    <ul class="closed">
                        <li><a href="<?=$url?>nksexam/examlist">全部考试列表</a></li>
                        <li><a href="<?=$url?>nksexam/examlistinv">已录入监考教师</a></li>
                        <li><a href="<?=$url?>nksexam/examlistnotinv">未录入监考教师</a></li>
                        <li><a href="<?=$url?>nksexam/examadd">添加考试</a></li>

                    </ul>
                </li>
                <li>
                    <a href="<?=$baseurl?>#" class="mws-i-24 i-home-2">教研室管理</a>
                    <ul class="closed">
                        <li><a href="<?=$url?>nkslab/lablist">教研室列表</a></li>
                        <li><a href="<?=$url?>nkslab/labadd">添加教研室</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?=$baseurl?>#" class="mws-i-24 i-cog-3">参数管理</a>
                    <ul class="closed">
                        <li><a href="<?=$url?>nksacademy/academylist">学院管理</a></li>
                        <li><a href="<?=$url?>nksmajor/majorlist">专业管理</a></li>
                        <li><a href="<?=$url?>nksclass/classlist">班级管理</a></li>
                        <li><a href="<?=$url?>nkstime/timelist">考试时间管理</a></li>
                        <li><a href="<?=$url?>nksplace/placelist">考试地点管理</a></li>
                        <li><a href="<?=$url?>nksnature/naturelist">课程性质管理</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>

    <!-- Main Container Start -->
    <div id="mws-container" class="clearfix">

        <!-- Inner Container Start -->
        <div class="container">
