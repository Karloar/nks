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
                if($row->ex_invinum == 0 && $row->ex_lab == 0) {
                    echo("<td>无</td>");
                } else {
                    echo("<td>$row->lb_name</td>");
                }

                $print_cover = $url . 'nksexam/printcover/' . $row->ex_id;
                $detail = $url . 'nksexam/showdetail/' . $row->ex_id;
                $print_notice = $url . 'nksexam/printnotice/' . $row->ex_id;

                echo('<td>');
                echo("<a href='$detail' class='mws-button blue small'>详细</a>");
                echo("<a href='$print_notice' class='mws-button orange small'>通知单</a>");

                echo("<a href='$print_cover' class='mws-button green small'>卷封</a></td>");
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
        <div class="actionBar">
            <a href="<?php echo($url); ?>nksexam/printExamBigTable" class="mws-button blue large">打印考试大表</a>
            <a href="<?php echo($url); ?>nksexam/exportExcel" class="mws-button black large">导出大表Excel</a>
            <a href="<?php echo($url); ?>nksexam/printAllNotice" class="mws-button orange large">打印通知单</a>
            <a href="<?php echo($url); ?>nksexam/printAllCovers" class="mws-button green large">打印全部卷封</a>

        </div>
    </div>
</div>

