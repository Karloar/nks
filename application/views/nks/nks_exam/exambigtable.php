<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
    <title>打印考试列表</title>
<link rel=File-List href="exambigtable.files/filelist.xml">
<style id="新建 Microsoft Excel 工作表_17734_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.font517734
	{color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:等线;
	mso-generic-font-family:auto;
	mso-font-charset:134;}
.xl1517734
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:等线;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6317734
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:等线;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6417734
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:等线;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6517734
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:等线;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:"m\0022月\0022d\0022日\0022";
	text-align:left;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6617734
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:等线;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
ruby
	{ruby-align:left;}
rt
	{color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:等线;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-char-type:none;}
-->
</style>
</head>

<body>
<!--[if !excel]>　　<![endif]-->
<!--下列信息由 Microsoft Excel 的发布为网页向导生成。-->
<!--如果同一条目从 Excel 中重新发布，则所有位于 DIV 标记之间的信息均将被替换。-->
<!----------------------------->
<!--“从 EXCEL 发布网页”向导开始-->
<!----------------------------->

    <?php
    foreach($page as $p) {
        echo("<div id=\'新建 Microsoft Excel 工作表_17734\' align=center x:publishsource=\'Excel\'>");
        echo("<table border=0 cellpadding=0 cellspacing=0 width=1427 style='border-collapse:collapse;table-layout:fixed;width:1072pt'>");
        echo("<col width=178 style='mso-width-source:userset;mso-width-alt:5696;width:134pt'>");
        echo("<col width=72 style='width:54pt'>");
        echo("<col width=106 style='mso-width-source:userset;mso-width-alt:3392;width:80pt'>");
        echo("<col width=108 style='mso-width-source:userset;mso-width-alt:3456;width:81pt'>");
        echo("<col width=110 style='mso-width-source:userset;mso-width-alt:3520;width:83pt'>");
        echo("<col width=72 style='width:54pt'>");
        echo("<col width=180 style='mso-width-source:userset;mso-width-alt:5760;width:135pt'>");
        echo("<col width=91 style='mso-width-source:userset;mso-width-alt:2912;width:68pt'>");
        echo("<col width=87 style='mso-width-source:userset;mso-width-alt:2784;width:65pt'>");
        echo("<col width=99 style='mso-width-source:userset;mso-width-alt:3168;width:74pt'>");
        echo("<col width=106 style='mso-width-source:userset;mso-width-alt:3392;width:80pt'>");
        echo("<col width=108 style='mso-width-source:userset;mso-width-alt:3456;width:81pt'>");
        echo("<col width=110 style='mso-width-source:userset;mso-width-alt:3520;width:83pt'>");


        echo("<tr height=24 style='mso-height-source:userset;height:18.0pt'>");
        echo("<td height=24 class=xl6617734 width=178 style='height:18.0pt;width:134pt'><a name=\'RANGE!A1:M40\'>学院</a></td>");
        echo("<td class=xl6617734 width=72 style='border-left:none;width:54pt'>年级</td>");
        echo("<td class=xl6617734 width=106 style='border-left:none;width:80pt'>考试地点</td>");
        echo("<td class=xl6617734 width=108 style='border-left:none;width:81pt'>主考教师</td>");
        echo("<td class=xl6617734 width=110 style='border-left:none;width:83pt'>监考教师</td>");
        echo("<td class=xl6617734 width=72 style='border-left:none;width:54pt'>人数</td>");
        echo("<td class=xl6617734 width=180 style='border-left:none;width:135pt'>考试科目</td>");
        echo("<td class=xl6617734 width=91 style='border-left:none;width:68pt'>考试方式</td>");
        echo("<td class=xl6617734 width=87 style='border-left:none;width:65pt'>日期</td>");
        echo("<td class=xl6617734 width=99 style='border-left:none;width:74pt'>时间</td>");
        echo("<td class=xl6617734 width=106 style='border-left:none;width:80pt'>考试地点</td>");
        echo("<td class=xl6617734 width=108 style='border-left:none;width:81pt'>主考教师</td>");
        echo("<td class=xl6617734 width=110 style='border-left:none;width:83pt'>监考教师</td>");
        echo("</tr>");


        foreach($p as $row) {
            echo("<tr height=24 style='mso-height-source:userset;height:18.0pt'>");
            $invname = '';
            if($row->ex_invname != '') {
                $invname = explode(' ', $row->ex_invname)[0];
                $invname .= $row->ex_invinum . '人';
            }
            echo("<td height=24 class=xl6417734 style='height:18.0pt;border-top:none'>$row->ac_name</td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'>$row->ex_grade</td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'>$row->pl_place</td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'>$row->ex_maininv</td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'>$invname</td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'>$row->ex_stunum</td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'>$row->ex_name</td>");
            $ex_mode = array('闭卷', '开卷');
            $em = $ex_mode[$row->ex_mode];
            echo("<td class=xl6417734 style='border-top:none;border-left:none'>$em</td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'>$row->ex_date</td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'>$row->tm_time</td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'>$row->pl_place</td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'>$row->ex_maininv</td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'>$invname</td>");
            echo("</tr>");
        }
        for($i=0;$i<40-count($p);$i++) {
            echo("<tr height=24 style='mso-height-source:userset;height:18.0pt'>");
            echo("<td height=24 class=xl6417734 style='height:18.0pt;border-top:none'></td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'></td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'></td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'></td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'></td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'></td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'></td>");

            echo("<td class=xl6417734 style='border-top:none;border-left:none'></td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'></td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'></td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'></td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'></td>");
            echo("<td class=xl6417734 style='border-top:none;border-left:none'></td>");
            echo("</tr>");
        }

        echo("<![if supportMisalignedColumns]>");
        echo("<tr height=0 style='display:none'>");
        echo("<td width=178 style='width:134pt'></td>");
        echo("<td width=72 style='width:54pt'></td>");
        echo("<td width=106 style='width:80pt'></td>");
        echo("<td width=108 style='width:81pt'></td>");
        echo("<td width=110 style='width:83pt'></td>");
        echo("<td width=72 style='width:54pt'></td>");
        echo("<td width=180 style='width:135pt'></td>");
        echo("<td width=91 style='width:68pt'></td>");
        echo("<td width=87 style='width:65pt'></td>");
        echo("<td width=99 style='width:74pt'></td>");
        echo("<td width=106 style='width:80pt'></td>");
        echo("<td width=108 style='width:81pt'></td>");
        echo("<td width=110 style='width:83pt'></td>");
        echo("</tr>");
        echo("<![endif]>");
        echo("</table>");
        echo("</div>");
        if(count($p) == 40) {
            echo("<br /><br /><br />");
        }
    }
    ?>



<!----------------------------->
<!--“从 EXCEL 发布网页”向导结束-->
<!----------------------------->
</body>

</html>
