<?php
/**
 * Created by PhpStorm.
 * User: sq
 * Date: 2018/4/2
 * Time: 16:57
 */
?>


<style>
    A{
        text-decoration: none;
    }
    th,td{
        text-align:center;
    }
</style>

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1"><?=isset($title)?$title:'信息列表';?></span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-table">
            <thead>
            <tr>
                <th  title="考试科目">考试科目</th>
                <th  title="年级">年级</th>
                <th title="考试班级">考试班级</th>
                <th title="考试日期">考试日期</th>
                <th title="考试时间">考试时间</th>
                <th title="监考人数">监考人数</th>
                <th title="监考老师所属研究室">监考教师所属研究室</th>
                <th title="操作">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach($result as $row) {
                echo('<tr>');
                echo("<td>$row->ex_name</td>");
                echo("<td>$row->ex_grade</td>");
                if($row->class_id == 0) {
                    echo("<td>其它</td>");
                } else {
                    echo("<td>$row->class_name</td>");
                }
                echo("<td>$row->ex_date</td>");
                echo("<td>$row->tm_time</td>");
                echo("<td>$row->ex_invinum</td>");
                echo("<td>$row->lb_name</td>");

                $up_url = $url . 'nksexam/examupdate/' . $row->ex_id;
                $del_url = $url . 'nksexam/examdelete/' . $row->ex_id;
                $detail = $url . 'nksexam/showdetail/' . $row->ex_id;
                echo("<td>");
                echo("<a href='$detail' class='mws-button black small'>详细</a>");
                echo("<a href='$up_url' class='mws-button blue small'>修改</a>");
                echo("<a href='$del_url' class='mws-button red small'>删除</a>");
                echo("</td>");
                echo("</tr>");
            }
            ?>


            </tbody>
        </table>
        <?php
        echo "<div style='text-align: center;font-size: 20px;'>";
        echo $this->pagination->create_links();
        echo "</div>";
        ?>
    </div>
</div>

