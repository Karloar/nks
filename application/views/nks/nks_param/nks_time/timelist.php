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
                <th  title="考试时间">考试时间</th>
                <th title="操作">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach($result as $row) {
                echo('<tr>');
                echo("<td>$row->tm_time</td>");
                $up_url = $url . 'nkstime/timeupdate/' . $row->tm_id;
                $del_url = $url . 'nkstime/timedelete/' . $row->tm_id;
                echo("<td><a href='$up_url' class='mws-button blue small'>修改</a>");
                echo("<a href='$del_url' class='mws-button red small'>删除</a></td>");
                echo("</tr>");
            }

            ?>
            </tbody>
        </table>
       <div class="actionBar">
           <a href="<?php echo($url); ?>nkstime/timeadd" class="mws-button green large">添加考试时间</a>
       </div>
    </div>
</div>

