<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link rel=File-List href="工作簿1.files/filelist.xml">
<style id="工作簿1_1294_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.font51294
	{color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:等线;
	mso-generic-font-family:auto;
	mso-font-charset:134;}
.xl151294
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
	vertical-align:middle;
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
    <!--[if gte mso 9]><xml>
        <x:ExcelWorkbook>
            <x:ExcelWorksheets>
                <x:ExcelWorksheet>
                    <x:Name>工作表标题</x:Name>
                    <x:WorksheetOptions>
                        <x:Print>
                            <x:ValidPrinterInfo />
                        </x:Print>
                    </x:WorksheetOptions>
                </x:ExcelWorksheet>
            </x:ExcelWorksheets>
        </x:ExcelWorkbook>
    </xml>
    <![endif]-->
</head>

<body>
<!--[if !excel]>　　<![endif]-->
<!--下列信息由 Microsoft Excel 的发布为网页向导生成。-->
<!--如果同一条目从 Excel 中重新发布，则所有位于 DIV 标记之间的信息均将被替换。-->
<!----------------------------->
<!--“从 EXCEL 发布网页”向导开始-->
<!----------------------------->

<div id="工作簿1_1294" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=230 style='border-collapse:
 collapse;table-layout:fixed;width:173pt'>
 <col width=72 style='width:54pt'>
 <col width=86 style='mso-width-source:userset;mso-width-alt:2752;width:65pt'>
 <col width=72 style='width:54pt'>
 <tr height=19 style='height:14.25pt'>
  <td height=19 class=xl151294 width=72 style='height:14.25pt;width:54pt'><strong>教师姓名</strong></td>
  <td class=xl151294 width=86 style='width:65pt'><strong>工作日</strong></td>
  <td class=xl151294 width=72 style='width:54pt'><strong>非工作日（晚上）</strong></td>
 </tr>
    <?php
    foreach($work_arr as $row) {
        echo("<tr height=19 style='height:14.25pt'>");
        echo("<td height=19 class=xl151294 align=right style='height:14.25pt'>$row->name</td>");
        echo("<td class=xl151294 align=right>$row->weekday</td>");
        echo("<td class=xl151294 align=right>$row->weekend</td>");
        echo("</tr>");
    }
    ?>

 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=72 style='width:54pt'></td>
  <td width=86 style='width:65pt'></td>
  <td width=72 style='width:54pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--“从 EXCEL 发布网页”向导结束-->
<!----------------------------->
</body>

</html>
