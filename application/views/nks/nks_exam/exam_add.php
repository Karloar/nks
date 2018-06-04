<script>
    function ac_change() {
        var ac_id = $("#ac_id").val();
        var htmlobj = $.ajax({url:'<?php echo($url); ?>nksexam/academychange/' + ac_id, async:false});
        var major = $("#mj_id");
        major.empty();
        var majors = eval("(" + htmlobj.responseText + ")");
        console.log(major);
        major.append("<option value='0'></option>");
        for(var i in majors) {
            major.append("<option value='"+majors[i]['mj_id']+"'>"+majors[i]['mj_name']+"</option>");
        }
        major.trigger('liszt:updated');
    }

    function exlab_change() {
        var ex_lab = $("#ex_lab").val();
        var exlab_message = $("#exlab_message");
        var ex_invinum = $("#ex_invinum").val();
        var ex_date = $("#ex_date").val();
        if(ex_lab != 0 && ex_invinum && ex_date) {
            var ex_not_lab = $("#ex_not_lab").val();
            var ex_id = '<?= isset($obj->ex_id) ? $obj->ex_id: '' ?>';
            var mydata = {'ex_lab': ex_lab, 'ex_date': ex_date, 'ex_not_lab': ex_not_lab, 'ex_id': ex_id, 'ex_invinum':ex_invinum};
            mydata = JSON.stringify(mydata);
            var htmlobj = $.ajax({url:'<?php echo($url); ?>nksexam/exlab_change/', async:false, data: {'mydata':mydata}});
            exlab_message.empty();
            // exlab_message.html(htmlobj.responseText);
            var rtv = eval("(" + htmlobj.responseText + ")");
            exlab_message.css({'color': rtv['color']});
            exlab_message.html(rtv['message']);
        } else {
            exlab_message.empty();
        }
    }

    function place_change() {
        var pl_id = $("#pl_id").val();
        var pl_message = $("#pl_message");
        var ex_date = $("#ex_date").val();
        var tm_id = $("#tm_id").val();
        if(ex_date && tm_id) {
            var ex_id = '<?= isset($obj->ex_id) ? $obj->ex_id: '' ?>';
            var mydata = {'ex_date': ex_date, 'ex_id': ex_id, 'pl_id': pl_id, 'tm_id': tm_id};
            mydata = JSON.stringify(mydata);
            var htmlobj = $.ajax({url:'<?php echo($url); ?>nksexam/place_change/', async:false, data: {'mydata':mydata}});
            pl_message.empty();
            // exlab_message.html(htmlobj.responseText);
            var rtv = eval("(" + htmlobj.responseText + ")");
            pl_message.css({'color': rtv['color']});
            pl_message.html(rtv['message']);
        } else {
            pl_message.empty();
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
                    <label>考试科目</label>
                    <div class="mws-form-item large">
                        <input name="ex_name" required class="mws-textinput" type="text" value="<?=isset($obj->ex_name)?$obj->ex_name:'';?>" >
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>年级</label>
                    <div class="mws-form-item large">
                        <input name="ex_grade" required class="mws-textinput" type="text" value="<?=isset($obj->ex_grade)?$obj->ex_grade:'';?>" >
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>课程性质</label>
                    <div class="mws-form-item large">
                        <ul class="mws-form-list">
                            <?php
                            foreach($nature_arr as $row)
                            {
                                $na = "<li>";
                                $na .= "<input id='na_".$row->nt_id."' type='radio' name='nt_id' value='".$row->nt_id."' ";
                                if(isset($obj->nt_id)&&$obj->nt_id==$row->nt_id)
                                {
                                    $na .= " checked ";
                                } elseif(!isset($obj->nt_id) && strcmp('必修课', $row->nt_name) == 0) {
                                    $na .= " checked ";
                                }
                                $na .= "/><label for='na_".$row->nt_id."'>".$row->nt_name."</label></li>";
                                echo $na;
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>考核方式</label>
                    <div class="mws-form-item large">
                        <ul class="mws-form-list">
                            <?php
                            $mode_arr = array('闭卷','开卷');
                            for($i=0;$i<count($mode_arr);$i++)
                            {
                                $na = "<li>";
                                $na .= "<input id='mo_".$i."' type='radio' name='ex_mode' value='".$i."' ";
                                if(isset($obj->ex_mode)&&$obj->ex_mode== $i)
                                {
                                    $na .= " checked ";
                                } elseif(!isset($obj->ex_mode) && $i == 0) {
                                    $na .= " checked ";
                                }
                                $na .= "/><label for='mo_".$i."'>".$mode_arr[$i]."</label></li>";
                                echo $na;
                            }
                            ?>
                        </ul>
                    </div>
                </div>



                <div class="mws-form-row">
                    <label>考试日期</label>
                    <div class="mws-form-item large">
                        <input name="ex_date" id="ex_date" required class="mws-textinput" type="date" value="<?=isset($obj->ex_date)?$obj->ex_date:'';?>" >
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>考试时间</label>
                    <div class="mws-form-item large">
                        <select name="tm_id" class="chzn-select" id="tm_id">
                            <?php
                            echo("<option value='0'></option>");
                            foreach($time_arr as $row) {
                                if(isset($obj->tm_id) && $obj->tm_id == $row->tm_id) {
                                    echo("<option value='$row->tm_id' selected>$row->tm_time</option>");
                                } else {
                                    echo("<option value='$row->tm_id'>$row->tm_time</option>");
                                }
                            }
                            if(isset($showExLab) && $showExLab && isset($obj->tm_id) && (is_null($obj->tm_id) || $obj->tm_id == 0 || $obj->tm_id == '')) {
                                echo("<option value='0' selected>其它</option>");
                            } else {
                                echo("<option value='0'>其它</option>");
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>学院</label>
                    <div class="mws-form-item large">
                        <select name="ac_id" id="ac_id" onchange="ac_change();" class="chzn-select">
                            <?php
                            foreach($academy_arr as $row) {
                                if(isset($obj->ac_id) && $obj->ac_id == $row->ac_id) {
                                    echo("<option value='$row->ac_id' selected>$row->ac_name</option>");
                                } else {
                                    echo("<option value='$row->ac_id'>$row->ac_name</option>");
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>考试专业</label>
                    <div class="mws-form-item large">
                        <select name="mj_id" id="mj_id" class="chzn-select">
                            <?php
                            echo("<option value='0'></option>");

                            foreach($major_arr as $row) {
                                if(isset($obj->mj_id) && $obj->mj_id == $row->mj_id) {
                                    echo("<option value='$row->mj_id' selected>$row->mj_name</option>");
                                } else {
                                    echo("<option value='$row->mj_id'>$row->mj_name</option>");
                                }
                            }
                            if(isset($showExLab) && $showExLab && isset($obj->mj_id) && (is_null($obj->mj_id) || $obj->mj_id == 0 || $obj->mj_id == '')) {
                                echo("<option value='0' selected>其它</option>");
                            } else {
                                echo("<option value='0'>其它</option>");
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>班级</label>
                    <div class="mws-form-item large">
                        <select name="class_id" class="chzn-select">
                            <?php
                            echo("<option value='0'></option>");
                            foreach($class_arr as $row) {
                                if(isset($obj->class_id) && $obj->class_id == $row->class_id) {
                                    echo("<option value='$row->class_id' selected>$row->class_name</option>");
                                } else {
                                    echo("<option value='$row->class_id'>$row->class_name</option>");
                                }
                            }
                            if(isset($showExLab) && $showExLab && isset($obj->class_id) && (is_null($obj->class_id) || $obj->class_id == 0 || $obj->class_id == '')) {
                                echo("<option value='0' selected>其它</option>");
                            } else {
                                echo("<option value='0'>其它</option>");
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>考试地点</label>
                    <div class="mws-form-item large">
                        <select name="pl_id" class="chzn-select" id="pl_id" >
                            <?php
                            echo("<option value='0'></option>");
                            foreach($place_arr as $row) {
                                if(isset($obj->pl_id) && $obj->pl_id == $row->pl_id) {
                                    echo("<option value='$row->pl_id' selected>$row->pl_place</option>");
                                } else {
                                    echo("<option value='$row->pl_id'>$row->pl_place</option>");
                                }
                            }
                            if(isset($showExLab) && $showExLab && isset($obj->pl_id) && (is_null($obj->pl_id) || $obj->pl_id == 0 || $obj->pl_id == '')) {
                                echo("<option value='0' selected>其它</option>");
                            } else {
                                echo("<option value='0'>其它</option>");
                            }
                            ?>
                        </select>
                        <div style="color:red;" id="pl_message"></div>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>不监考研究室</label>
                    <div class="mws-form-item large">
                        <select multiple="multiple" class="chzn-select" name="ex_not_lab[]" id="ex_not_lab">
                            <?php
                            foreach($lab_arr as $row) {
                                if(isset($obj->ex_not_lab) && $obj->ex_not_lab != '' && in_array($row->lb_id, explode('-', $obj->ex_not_lab))) {
                                    echo("<option value='$row->lb_id' selected>$row->lb_name</option>");
                                } else {
                                    echo("<option value='$row->lb_id'>$row->lb_name</option>");
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>监考人数</label>
                    <div class="mws-form-item large">
                        <select name="ex_invinum" id="ex_invinum" class="chzn-select" required>
                            <option value=""></option>
                            <?php
                            for($i=0;$i<=5;$i++) {
                                if(isset($obj->ex_invinum) && $i == $obj->ex_invinum) {
                                    echo("<option value='$i' selected='selected'>$i</option>");
                                } else {
                                    echo("<option value='$i'>$i</option>");
                                }
                            }
                            ?>
                        </select>
                        <div style="color:red;">必选</div>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>学生人数</label>
                    <div class="mws-form-item large">
                        <input name="ex_stunum" class="mws-textinput" value="<?=isset($obj->ex_stunum) && $obj->ex_stunum != 0?$obj->ex_stunum:'';?>" type="number">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>请假学生人数</label>
                    <div class="mws-form-item large">
                        <input name="ex_absence" class="mws-textinput" value="<?=isset($obj->ex_absence) && $obj->ex_absence?$obj->ex_absence:'';?>" type="number">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>主考教师</label>
                    <div class="mws-form-item large">
                        <input name="ex_maininv" class="mws-textinput" value="<?=isset($obj->ex_maininv)?htmlspecialchars_decode(stripslashes($obj->ex_maininv)):'';?>" type="text">
                        <div style="color:red;">多个以空格分隔</div>
                    </div>
                </div>

                <?php
                if(isset($showExLab) && $showExLab) {
                    echo('<div class="mws-form-row">');
                    echo('<label>监考教师所属研究室</label>');
                    echo('<div class="mws-form-item large">');
                    echo('<select name="ex_lab" class="chzn-select" id="ex_lab" onchange="exlab_change();">');
                    foreach($lab_arr as $row) {
                        if($obj->ex_lab == $row->lb_id) {
                            echo("<option value='$row->lb_id' selected>$row->lb_name</option>");
                        } else {
                            echo("<option value='$row->lb_id'>$row->lb_name</option>");
                        }
                    }
                    if((is_null($obj->ex_lab) || $obj->ex_lab == 0 || $obj->ex_lab == '')) {
                        echo("<option value='0' selected></option>");
                    } else {
                        echo("<option value='0'>其它</option>");
                    }
                    echo('</select>');
                    echo('<div style="color:red;" id="exlab_message"></div>');
                    echo('</div>');
                    echo('</div>');
                    if(isset($obj->ex_lab) && !(is_null($obj->ex_lab) || $obj->ex_lab == 0 || $obj->ex_lab == '')) {
                        for($i=1;$i<=$obj->ex_invinum;$i++) {
                            echo('<div class="mws-form-row" id="ex_invname">');
                            echo("<label>监考教师$i</label>");
                            echo('<div class="mws-form-item large">');
                            $value = isset($obj->ex_invname[$i-1]) ? $obj->ex_invname[$i-1]: '';
                            echo('<input name="ex_invname'.$i .'"  class="mws-textinput" type="text" value="'.$value.'" >');
                            echo('</div>');
                            echo('</div>');
                        }
                    }


                }

                ?>

                <div class="mws-form-row">
                    <label>巡考人姓名</label>
                    <div class="mws-form-item large">
                        <input name="ex_xunkao" class="mws-textinput" value="<?=isset($obj->ex_xunkao)?htmlspecialchars_decode(stripslashes($obj->ex_xunkao)):'';?>" type="text">
                        <div style="color:red;">多个以空格分隔</div>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>备注信息</label>
                    <div class="mws-form-item large">
                        <input name="ex_note" class="mws-textinput" value="<?=isset($obj->ex_note)?htmlspecialchars_decode(stripslashes($obj->ex_note)):'';?>" type="text">
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