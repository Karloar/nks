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
                <th  title="考试地点">考试地点</th>
                <th title="操作">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach($result as $row) {
                echo('<tr>');
                $x = explode('-', $row->pl_place);
                $pl_building = $x[0];
                $pl_room = $x[1];
                echo('<td>' . $pl_building . '教学楼&nbsp;' . $pl_room . '教室</td>');
                $up_url = $url . 'nksplace/placeupdate/' . $row->pl_id;
                $del_url = $url . 'nksplace/placedelete/' . $row->pl_id;
                echo("<td><a href='$up_url' class='mws-button blue small'>修改</a>");
                echo("<a href='$del_url' class='mws-button red small'>删除</a></td>");
                echo("</tr>");
            }

            ?>
            </tbody>
        </table>
       <div class="actionBar">
           <a href="<?php echo($url); ?>nksplace/placeadd" class="mws-button green large">添加考试地点</a>
       </div>
    </div>
</div>

