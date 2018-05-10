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
                    <label>教学楼</label>
                    <div class="mws-form-item large">
                        <input name="pl_building"  class="mws-textinput" type="text" value="<?=isset($obj['pl_building'])?$obj['pl_building']:'';?>" >
                        <div style="color:red;">(eg: 逸夫，萃文，计算机，不要带“楼”字)</div>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>教室</label>
                    <div class="mws-form-item large">
                        <input name="pl_room"  class="mws-textinput" type="text" value="<?=isset($obj['pl_room'])?$obj['pl_room']:'';?>" >
                        <div style="color:red;">(eg: 105，15阶)</div>
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