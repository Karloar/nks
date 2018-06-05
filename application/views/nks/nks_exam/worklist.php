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
                <th  title="教师姓名">教师姓名</th>
                <th  title="工作日">工作日</th>
                <th title="非工作日（晚上）">非工作日（晚上）</th>
                <th title="巡考">巡考</th>

            </tr>
            </thead>
            <tbody>
            <?php

            foreach($result as $row) {
                echo('<tr>');
                echo("<td>$row->name</td>");
                echo("<td>$row->weekday</td>");
                echo("<td>$row->weekend</td>");
                echo("<td>$row->xunkao</td>");
                echo("</tr>");
            }
            ?>


            </tbody>
        </table>
    </div>
</div>

