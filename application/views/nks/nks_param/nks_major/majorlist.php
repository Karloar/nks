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
                <th  title="学院名称">学院名称</th>
                <th  title="专业名称">专业名称</th>
                <th title="操作">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($result as $row) {
                echo('<tr>');
                echo("<td>$row->ac_name</td>");
                echo("<td>$row->mj_name</td>");
                $up_url = $url . 'nksmajor/majorupdate/' . $row->mj_id;
                $del_url = $url . 'nksmajor/majordelete/' . $row->mj_id;
                echo("<td><a href='$up_url' class='mws-button blue small'>修改</a>");
                echo("<a href='$del_url' class='mws-button red small'>删除</a></td>");
                echo("</tr>");
            }

            ?>
            </tbody>
        </table>
       <div class="actionBar">
           <a href="<?php echo($url); ?>nksmajor/majoradd" class="mws-button green large">添加专业</a>
       </div>
    </div>
</div>

