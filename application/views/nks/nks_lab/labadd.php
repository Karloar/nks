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
                    <label>教研室名称</label>
                    <div class="mws-form-item large">
                        <input name="lb_name"  class="mws-textinput" type="text" value="<?=isset($obj->lb_name)?$obj->lb_name:'';?>"  required="required">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>教研室负责人</label>
                    <div class="mws-form-item large">
                        <select name="us_id" required="required">
                            <option value="0"></option>
                            <?php

                            echo("<option value='$obj->us_id' selected>$obj->us_name</option>");
                            foreach($manager as $m) {
                                echo("<option value='$m->us_id'>$m->us_name</option>");
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>教研室人数</label>
                    <div class="mws-form-item large">
                        <input name="lb_num" class="mws-textinput" value="<?=isset($obj->lb_num)?$obj->lb_num:'';?>" type="number" required="required">
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