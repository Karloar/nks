<?php
/**
 * Created by PhpStorm.
 * User: sq
 * Date: 2018/4/2
 * Time: 9:13
 */
?>

<div class="mws-panel grid_1"></div>

<div class="mws-panel grid_4">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-pencil"><?=isset($title)?$title:'Text'?></span>
    </div>
    <div class="mws-panel-body">
        <form class="mws-form" action="<?php echo($url . $form_ac); ?>" method="post">
            <div class="mws-form-inline">

                <div class="mws-form-row">
                    <label>职工号</label>
                    <div class="mws-form-item large">
                        <input name="us_number"  class="mws-textinput" type="text" value="<?=isset($obj->us_number)?$obj->us_number:'';?>" >
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>用户名</label>
                    <div class="mws-form-item large">
                        <input name="us_name"  class="mws-textinput" type="text" value="<?=isset($obj->us_name)?$obj->us_name:'';?>" >
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>密码</label>
                    <div class="mws-form-item large">
                        <input name="us_password"  class="mws-textinput" type="password" value="0000" >
                        <div style="color:red;">默认：0000</div>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>邮箱</label>
                    <div class="mws-form-item large">
                        <input name="us_email"  class="mws-textinput" type="text" value="<?=isset($obj->us_email)?$obj->us_email:'';?>" >
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>联系方式</label>
                    <div class="mws-form-item large">
                        <input name="us_phone"  class="mws-textinput" type="text" value="<?=isset($obj->us_phone)?$obj->us_phone:'';?>" >
                    </div>
                </div>

                <div class="mws-button-row">
                    <input type="submit" class="mws-button green" value="提交">
                    <input type="reset" class="mws-button gray" value="重置">
                </div>
            </div>
        </form>
    </div>
</div>