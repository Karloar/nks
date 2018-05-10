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
                <th  title="职工号">职工号</th>
                <th  title="用户名">用户名</th>
                <th title="邮箱">邮箱</th>
                <th title="联系方式">联系方式</th>
                <th title="类型">类型</th>
                <th title="操作">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $style = array('普通用户', '教研室负责人', '管理员');

            foreach($result as $row) {
                echo('<tr>');
                echo("<td>$row->us_number</td>");
                echo("<td>$row->us_name</td>");
                echo("<td>$row->us_email</td>");
                echo("<td>$row->us_phone</td>");
                $s = $style[$row->us_admin];
                echo("<td>$s</td>");
                $up_url = $url . 'nksuser/userupdate/' . $row->us_id;
                $del_url = $url . 'nksuser/userdelete/' . $row->us_id;
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

