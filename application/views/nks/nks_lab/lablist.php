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
                <th  title="教研室名称">教研室名称</th>
                <th  title="教研室人数">教研室人数</th>
                <th title="负责人">负责人</th>
                <th title="操作">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach($result as $row) {
                echo('<tr>');
                echo("<td>$row->lb_name</td>");
                echo("<td>$row->lb_num</td>");
                echo("<td>$row->us_name</td>");

                $up_url = $url . 'nkslab/labupdate/' . $row->lb_id;
                $del_url = $url . 'nkslab/labdelete/' . $row->lb_id;
                echo("<td><a href='$up_url' class='mws-button blue small'>修改</a>");
                echo("<a href='$del_url' class='mws-button red small'>删除</a></td>");
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

