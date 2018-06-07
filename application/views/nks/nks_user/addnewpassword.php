<script>
    function ac_change() {
        var ac_id = $("#ac_id").val();
        var htmlobj = $.ajax({url:'<?php echo($url) ?>nksexam/academychange/' + ac_id, async:false});
        var major = $("#mj_id");
        major.empty();
        var majors = eval(htmlobj.responseText);
        major.append("<option value='0'></option>");
        for(var i in majors) {
            major.append("<option value='"+majors[i]['mj_id']+"'>"+majors[i]['mj_name']+"</option>");
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
                    <label>新密码</label>
                    <div class="mws-form-item large">
                        <input name="new_password" required="required" class="mws-textinput" type="password" />
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>确认新密码</label>
                    <div class="mws-form-item large">
                        <input name="re_newpassword" required="required" class="mws-textinput" type="password" />
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