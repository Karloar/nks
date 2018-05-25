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
                    <label>监考人数</label>
                    <div class="mws-form-item large">
                        <input name="ex_invinum"  class="mws-textinput" type="text" value="<?=isset($obj->ex_invinum)?$obj->ex_invinum:'';?>" readonly="readonly">
                    </div>
                </div>

                <?php
                for($i=1;$i<=$obj->ex_invinum;$i++) {
                    echo('<div class="mws-form-row">');
                    echo("<label>监考教师$i</label>");
                    echo('<div class="mws-form-item large">');
                    $value = isset($obj->ex_invname[$i-1]) ? $obj->ex_invname[$i-1]: '';
                    echo('<input name="ex_invname'.$i .'"  class="mws-textinput" type="text" value="'.$value.'"  required="required">');
                    echo('</div>');
                    echo('</div>');
                }
                ?>



                <div class="mws-button-row">
                    <input type="submit" class="mws-button green" value="提交">
                    <input type="reset" class="mws-button gray" value="重置">
                </div>
            </div>
        </form>
    </div>
</div>