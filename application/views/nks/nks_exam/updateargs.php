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
                    <label>开始日期</label>
                    <div class="mws-form-item large">
                        <input name="begin_date" required="required" class="mws-textinput" type="date" />
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>结束日期</label>
                    <div class="mws-form-item large">
                        <input name="end_date" required="required" class="mws-textinput" type="date" />
                    </div>
                </div>
                <?php
                    echo('<div class="mws-form-row">');
                    echo('<label>监考教师所属研究室</label>');
                    echo('<div class="mws-form-item large">');
                    echo('<select name="lb_id" class="chzn-select" id="lb_id" required="required">');
                    echo('<option value=""></option>');
                    foreach($lab_arr as $row) {
                        echo("<option value='$row->lb_id'>$row->lb_name</option>");
                    }
                    echo('</select>');
                    echo('</div>');
                    echo('</div>');
                ?>
                <div class="mws-button-row">
                    <input type="submit" class="mws-button green" value="提交">
                    <input type="reset" class="mws-button gray" value="重置">
                </div>

            </div>
        </form>
    </div>
</div>