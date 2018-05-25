<script>

</script>
<div class="mws-panel grid_1"></div>

<div class="mws-panel grid_4">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-pencil"><?=isset($title)?$title:'Text'?></span>
    </div>
    <div class="mws-panel-body">
        <form class="mws-form" action="" method="post">
            <div class="mws-form-inline">

                <div class="mws-form-row">
                    <label>考试科目</label>
                    <div class="mws-form-item large">
                        <input name="ex_name"  class="mws-textinput" type="text" value="<?=isset($obj->ex_name)?$obj->ex_name:'';?>"  readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>年级</label>
                    <div class="mws-form-item large">
                        <input name="ex_grade" required class="mws-textinput" type="text" value="<?=isset($obj->ex_grade)?$obj->ex_grade:'';?>" readonly="readonly" >
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>课程性质</label>
                    <div class="mws-form-item large">
                        <ul class="mws-form-list">
                            <input name="nt_id" required class="mws-textinput" type="text" value="<?=isset($obj->nt_name)?$obj->nt_name:'其它';?>" readonly="readonly">
                        </ul>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>考核方式</label>
                    <div class="mws-form-item large">
                        <ul class="mws-form-list">
                            <?php
                            $mode_arr = array('闭卷','开卷');
                            ?>
                            <input name="ex_mode" required class="mws-textinput" type="text" value="<?=isset($obj->ex_mode)?$mode_arr[$obj->ex_mode]:$mode_arr[0];?>" readonly="readonly">
                        </ul>
                    </div>
                </div>



                <div class="mws-form-row">
                    <label>考试日期</label>
                    <div class="mws-form-item large">
                        <input name="ex_date" class="mws-textinput" type="date" value="<?=isset($obj->ex_date)?$obj->ex_date:'';?>"  readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>考试时间</label>
                    <div class="mws-form-item large">
                        <input name="tm_id" class="mws-textinput" value="<?=isset($obj->tm_time)?$obj->tm_time:'其它';?>"  readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>学院</label>
                    <div class="mws-form-item large">
                        <input name="ac_id" class="mws-textinput" value="<?=isset($obj->ac_name)?$obj->ac_name:'其它';?>"  readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>考试专业</label>
                    <div class="mws-form-item large">
                        <input name="mj_id" class="mws-textinput"  value="<?=isset($obj->mj_name)?$obj->mj_name:'其它';?>"  readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>班级</label>
                    <div class="mws-form-item large">
                        <input name="class_id" class="mws-textinput"  value="<?=isset($obj->class_name)?$obj->class_name:'其它';?>"  readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>考试地点</label>
                    <div class="mws-form-item large">
                        <input name="pl_id" class="mws-textinput" value="<?=isset($obj->pl_place)?$obj->pl_place:'其它';?>"  readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>学生人数</label>
                    <div class="mws-form-item large">
                        <input name="ex_stunum" class="mws-textinput" value="<?=isset($obj->ex_stunum) && $obj->ex_stunum!=0?$obj->ex_stunum:'';?>" type="number" readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>请假学生人数</label>
                    <div class="mws-form-item large">
                        <input name="ex_absence" class="mws-textinput" value="<?=isset($obj->ex_absence) && $obj->ex_absence?$obj->ex_absence:'';?>" type="number" readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>主考教师</label>
                    <div class="mws-form-item large">
                        <input name="ex_maininv" class="mws-textinput" value="<?=isset($obj->ex_maininv)?htmlspecialchars_decode(stripslashes($obj->ex_maininv)):'';?>" type="text" readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>监考人数</label>
                    <div class="mws-form-item large">
                        <input name="ex_invinum" class="mws-textinput" value="<?=isset($obj->ex_invinum)?$obj->ex_invinum:''?>" type="number" readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>不监考教研室</label>
                    <div class="mws-form-item large">
                        <?php
                        $ex_not_lab = '';
                        if(isset($obj->ex_not_lab) && $obj->ex_not_lab != '') {
                            foreach(explode('-', $obj->ex_not_lab) as $r) {
                                foreach($lab_arr as $lab) {
                                    if($lab->lb_id == $r) {
                                        $ex_not_lab .= $lab->lb_name . '<br />';
                                    }
                                }
                            }
                        }
                        $ex_not_lab = trim($ex_not_lab);
                        if($ex_not_lab == '') {
                            $ex_not_lab = '<br />';
                        }
                        ?>
                        <div class="mws-textinput"><?php echo($ex_not_lab); ?></div>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>监考教师所属实验室</label>
                    <div class="mws-form-item large">
                        <input name="ex_lab" class="mws-textinput" value="<?=isset($obj->lb_name)?$obj->lb_name:''?>" readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>监考教师</label>
                    <div class="mws-form-item large">
                        <input name="ex_invname" class="mws-textinput" value="<?=isset($obj->ex_invname)?$obj->ex_invname:''?>" readonly="readonly">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label>巡考人姓名</label>
                    <div class="mws-form-item large">
                        <input name="ex_xunkao" class="mws-textinput" value="<?=isset($obj->ex_xunkao)?htmlspecialchars_decode(stripslashes($obj->ex_xunkao)):'';?>" type="text" readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>备注信息</label>
                    <div class="mws-form-item large">
                        <input name="ex_note" class="mws-textinput" value="<?=isset($obj->ex_note)?htmlspecialchars_decode(stripslashes($obj->ex_note)):'';?>" type="text" readonly="readonly">
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>