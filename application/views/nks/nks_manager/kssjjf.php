<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<html>
<head>
	<title>打印</title>
</head>
<style type="text/css">
	table{
		border-collapse: collapse;
	}
	tr {
		height: 30px;
	}
	td{
		border: 1px solid black;
		text-align:center;
		}


	#考场情况记录{
		width: 30px;
		height: 458px;
	}
	#学年{

		height: 30px;
		width: 590px;
		word-spacing: 30px;
	}


	#考试科目{
		height: 30px;
		width: 100px;
	}
	#考试科目填写{
		width: 232px;
	}
	#考核方式{
		width: 104px;
	}
	#开闭卷{
		width: 154px;
	}


	#学院{
		height: 90px;
		word-spacing: 30px;
	}
	#计算机科学与技术{
		width: 146px;
	}
	#专业{
	}
	#专业详细{
		width: 173px;
		text-align:left;
	}
	#年级{
		width: 60px;
	}
	#年级填写{
		width: 60px;
	}


	#班级{
		word-spacing: 30px;
	}

	#班级填写{
		width: 256px;
		text-align:right;
	}
	#应考人数{
		width: 114px;
	}
	#应考人数填写{
		width: 120px;
	}


	#考试时间{
		height: 60px;
	}
	#考试时间详细{
		width: 256px;
		text-align:right;
	}






	#阅卷情况记录{
		height: 210px;
		width: 30px;
	}
	#阅卷教师{
		height: 120px;
	}
	#题号{
		width: 52px;
		height: 40px;
	}
	
	



	#监考教师{
		text-align:right;
	}

	#班级填写下{
		text-align:right;
	}
	#份数{
		text-align:right;
	}
	#试卷复核人{
		text-align:right;
	}
	#课程负责人审核{
		text-align:right;
	}
</style>
<body>
	<div align="center">
        <h1>吉林大学试卷卷封</h1>
        <div>
            <table>
                <tr id="第一行">
                    <td id="考场情况记录" rowspan="9">  考</br>
                        场</br>
                        情</br>
                        况</br>
                        记</br>
                        录</br>
                    </td>
                    <td id="学年" colspan="22" >
                        <?php
                        $dt = explode('-', $obj->ex_date);
                        $year = intval($dt[0]);
                        $month = intval($dt[1]);
                        $begin = 0;
                        $end = 0;
                        $term = 0;
                        if($month >= 9 && $month <= 12) {
                            $begin =  $year;
                            $end = $year + 1;
                            $term = 1;
                        } else if($month >= 1 && $month <= 2) {
                            $end = $year;
                            $begin = $year - 1;
                            $term = 1;
                        } else if($month >= 3 && $month <= 8) {
                            $end = $year;
                            $begin = $year - 1;
                            $term = 2;
                        }
                        echo($begin . '——' . $end . '&nbsp;&nbsp;学年第&nbsp;' . $term . '&nbsp;学期');

                        ?>
                    </td>
                </tr>
                <tr id="第二行">
                    <td id="考试科目">考试科目</td>
                    <td id="考试科目填写" colspan="9"><?= isset($obj->ex_name) ? $obj->ex_name : '' ?></td>
                    <td id="考核方式" colspan="6">考核方式</td>
                    <td id="开闭卷" colspan="6"><?= $obj->ex_mode ? '闭卷(&nbsp; &nbsp;)&nbsp;&nbsp;开卷( &#10004 )' : '闭卷( &#10004 )&nbsp;&nbsp;开卷(&nbsp; &nbsp;)' ?></td>
                </tr>
                <tr id="第三行">
                    <td id="学院">学 院</td>
                    <td id="计算机科学与技术" colspan="4"><?= isset($obj->ac_name) ? $obj->ac_name : '' ?></td>
                    <td id="专业" colspan="3">专业</td>
                    <td id="专业详细" colspan="9">
                        <?php
                        foreach($major_arr as $row) {
                            echo('<div>');
                            echo("<div style='float:left;'>$row->mj_name</div>");
                            if($row->mj_id == $obj->mj_id) {
                                echo("<div style='float:right;'>( &#10004 )</div>");
                            } else {
                                echo("<div style='float:right;'>(&nbsp; &nbsp;&nbsp;&nbsp;)</div>");
                            }
                            echo('</div><br />');
                        }
                        ?>
                    </td>
                    <td id="年级" colspan="3">年级</td>
                    <td id="年级填写" colspan="2"><?= isset($obj->ex_grade) ? $obj->ex_grade : '' ?></td>
                </tr>
                <tr id="第四行">
                    <td id="班级" >班 级</td>
                    <td id="班级填写" colspan="11" style="text-align: center;">
                        <?php
                        if(isset($obj->class_id) && $obj->class_id != 0) {
                            echo($obj->class_name);
                        }
                        ?>
                    </td>
                    <td id="应考人数" colspan="5">应考人数</td>
                    <td id="应考人数填写" colspan="5"><?=  $obj->ex_stunum ?></td>
                </tr>
                <tr id="第五行">
                    <td id="考试时间">考试时间</td>
                    <td id="考试时间详细" colspan="11" style="text-align:center;">
                        <?php
                        $dt = explode('-', $obj->ex_date);
                        echo("$dt[0] 年 $dt[1] 月 $dt[2] 日<br />");
                        if(isset($obj->tm_id) && $obj->tm_id != 0) {
                            $t = explode('-', $obj->tm_time);
                            $begin_time = explode(':', $t[0]);
                            $end_time = explode(':', $t[1]);

                            echo('&nbsp;&nbsp;&nbsp;&nbsp' . $begin_time[0] . ' 时 ' . $begin_time[1] . '分—— '
                                . $end_time[0] . ' 时 ' . $end_time[1] . '分');
                        }
                        ?>
                    </td>
                    <td id="实考人数" colspan="5">实考人数</td>
                    <td id="实考人数填写" colspan="5"><?=  $obj->ex_stunum-$obj->ex_absence ?></td>
                </tr>
                <tr id="第六行">
                    <td id="考试地点">考试地点</td>
                    <td id="考试地点详细" colspan="11">
                        <?php
                        if(isset($obj->pl_id) && $obj->pl_id != 0) {
                            $p = explode('-', $obj->pl_place);
                            echo('前卫校区 &nbsp;' . $p[0]. ' 教学楼 ' . $p[1] . ' 教室');
                        }
                        ?>
                    </td>
                    <td id="缺考人数" colspan="5">缺考人数</td>
                    <td id="缺考人数详细" colspan="5"><?=  $obj->ex_absence ?></td>
                </tr>

                <tr id="第七行">
                    <td >缺考学生姓名</td>
                    <td colspan="21" width="490"> </td>
                </tr>
                <tr id="第八行">
                    <td height="120">考场</br>
                        </br>
                        情况</br>
                        </br>
                        记录
                    </td>
                    <td colspan="21"></td>
                </tr>
                <tr id="第九行">
                    <td>监考教师</td>
                    <td id="监考教师" colspan="21" style="text-align: center;">
                        <?php echo($obj->ex_invname); ?>
                    </td>
                </tr>
                <tr id="第10行">
                    <td id="阅卷情况记录" rowspan="6" width="100">  阅</br>
                        卷</br>
                        情</br>
                        况</br>
                        记</br>
                        录
                    </td>
                    <td id="阅卷教师" rowspan="2">阅</br>
                        卷</br>
                        教</br>
                        师</td>
                    <td id="题号" width="50px">题号</td>
                    <td id="一" width="40">一</td>
                    <td id="二" width="40">二</td>
                    <td id="三" colspan="3" width="40">三</td>
                    <td id="四" colspan="2" width="20">四</td>
                    <td id="五" colspan="2" width="40">五</td>
                    <td id="六" colspan="3" width="40">六</td>
                    <td id="七" width="40">七</td>
                    <td id="八" colspan="2" width="40">八</td>
                    <td id="九" colspan="2" width="40">九</td>
                    <td id="十" colspan="2" width="40">十</td>
                    <td id="空" width="40"></td>
                </tr>

                <tr id="第11行">
                    <td id="签名" height="80">  签</br>
                        名
                    </td>
                    <td></td>
                    <td></td>
                    <td colspan="3"></td>
                    <td colspan="2"></td>
                    <td colspan="2"></td>
                    <td colspan="3"></td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="2"></td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>

                <tr id="第12行">
                    <td colspan="2" height="40">装订</br>
                        (每班一册按学号)
                    </td>
                    <td colspan="4" width="112">班级</td>
                    <td id="班级填写下" colspan="7" width="111">班</td>
                    <td colspan="5" width="105">卷子数量</td>
                    <td id="份数" colspan="4" width="112">份</td>
                </tr>

                <tr id="第13行">
                    <td colspan="2" height="50">阅卷工作情况摘记</td>
                    <td colspan="20"></td>
                </tr>

                <tr id="第14行">
                    <td colspan="2" height="50">试卷复核人</td>
                    <td id="试卷复核人" colspan="20">（签名）</td>
                </tr>

                <tr id="第15行">
                    <td colspan="2" height="50">课程负责人审核</td>
                    <td id="课程负责人审核" colspan="20">（签名）</td>
                </tr>

            </table>
        </div>
    </div>
</body>
</html>