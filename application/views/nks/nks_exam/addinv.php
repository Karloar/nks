<?php
/**
 * Created by PhpStorm.
 * User: sq
 * Date: 2018/4/2
 * Time: 9:13
 */
?>
<script>
    function saveInvtemp() {
        var ex_invinum = $("#ex_invinum").val();
        var ex_invname = '';
        var ex_id = '<?= isset($obj->ex_id) ? $obj->ex_id: '' ?>';
        var tinv_id = '<?= isset($obj->ex_id) ? $obj->tinv_id: '' ?>';
        for(var i=1;i<=ex_invinum;i++) {
            var name = $("#ex_invname" + i).val();
            if(name.trim() != '') {
                ex_invname += name + ' ';
            }
        }
        ex_invname = ex_invname.trim();
        if(ex_invname == '') {
            alert('输入的监考教师为空！');
        } else {
            var mydata = {'ex_id': ex_id, 'ex_invinum': ex_invinum, 'ex_invname': ex_invname, 'tinv_id': tinv_id};
            mydata = JSON.stringify(mydata);
            var htmlobj = $.ajax({url:'<?php echo($url); ?>nksexam/saveInvtemp/', async:false, data: {'mydata':mydata}});
            // console.log(htmlobj.responseText);
            var rtv = eval("(" + htmlobj.responseText + ")");
            alert(rtv);
            window.location.href = '<?php echo($url); ?>' + 'nksexam/addinv/' + ex_id;
        }
    }
</script>
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
                        <input id="ex_invinum" name="ex_invinum"  class="mws-textinput" type="text" value="<?=isset($obj->ex_invinum)?$obj->ex_invinum:'';?>" readonly="readonly">
                    </div>
                </div>

                <?php
                for($i=1;$i<=$obj->ex_invinum;$i++) {
                    echo('<div class="mws-form-row">');
                    echo("<label>监考教师$i</label>");
                    echo('<div class="mws-form-item large">');
                    $value = isset($obj->ex_invname[$i-1]) ? $obj->ex_invname[$i-1]: '';
                    echo('<input name="ex_invname'.$i .'" id="ex_invname'.$i .'" class="mws-textinput" type="text" value="'.$value.'"  required="required">');
                    echo('</div>');
                    echo('</div>');
                }
                ?>



                <div class="mws-button-row">
                    <input type="submit" class="mws-button green" value="提交">
                    <?php
                    $user = $_SESSION['nks_user'];
                    if($user->us_admin == 1) {
                        echo('echo(<input type="button" class="mws-button blue" value="保存" onclick="saveInvtemp();">');
                    }
                    ?>
                    <input type="reset" class="mws-button gray" value="重置">
                </div>
            </div>
        </form>
    </div>
</div>