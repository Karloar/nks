/**搜索专用，全部重新修改*/
/*开始检索*/
function searchOK(){
	//重新构造查询语句
    var selectCon = frmOp.conditions.value;
    if(selectCon.length > 0){
    	if(selectCon.indexOf(" AND")==0) selectCon = selectCon.replace(" AND ", "");
    	else if(selectCon.indexOf(" OR")==0) selectCon = selectCon.replace(" OR ", "");
    }
    //将语句写入主页面，并刷新主页面
	window.parent.parent.document.frmOp.sqlString.value = selectCon;
	window.parent.parent.refreshCurr();
	window.parent.parent.clsForm();
}
/**添加新的条件*/
function searchAdd(){
	showMessage("");
	if(frmOp.fieldName.value == "") {
		showMessage("没有选择要添加的列！", 0);
		return;
	}
	if(isNotRightInput(frmOp.conStr)){
		showMessage("对应的条件为空，请重新输入!", 0);
		return;
	}
	var enCons = getCondition();
	if(enCons == ""){
		showMessage("此条件已存在，添加失败!", 0);
		return;
	}
	//将数据写进去	
	var cnCons = frmOp.conJoin.options[frmOp.conJoin.selectedIndex].text + " - " + frmOp.selectRow.value + " " + frmOp.conOpe.options[frmOp.conOpe.selectedIndex].text + " " + frmOp.conStr.value;
	var newRow = conditionTable.insertRow(); newRow.id = enCons;	
	var newTd1 = newRow.insertCell(); newTd1.height=24;
	newTd1.innerHTML = cnCons;
	var newTd2 = newRow.insertCell(); newTd2.align="center";
	newTd2.innerHTML = "<img src='/adminimages/icon_del.gif' onclick='delCurrRow()' style='cursor:hand' alt='点击删除'>"; //onclick=delCurrRow(\""+enCons+"\")
	frmOp.conditions.value = frmOp.conditions.value + enCons;
	
	showMessage("条件添加成功！", 1);
}
/**删除表格指定的行*/
function delCurrRow(){
	var currRow=event.srcElement.parentNode.parentNode;
	frmOp.conditions.value = frmOp.conditions.value.replace(currRow.id, "");
  	conditionTable.deleteRow(currRow.rowIndex);
  	showMessage("条件删除成功！", 1);
}
/**删除所有行及对应的SQL语句*/
function searchClear(){
	if(conditionTable.rows.length < 2){
		showMessage("条件为空，无法清空！", 0);
		return;
	}
	for(var i=conditionTable.rows.length;i>1;i--){
		conditionTable.deleteRow(i-1);
	}
	frmOp.conditions.value = "";
	showMessage("所有条件已清空！", 1);
}
/**构造SQL语句片断*/
function getCondition(){
	var enC = " " + frmOp.conJoin.value;
	if(frmOp.fieldType.value == "数字"){
		enC += " " + frmOp.fieldName.value + frmOp.conOpe.value + frmOp.conStr.value;
	}else{
		if(frmOp.conOpe.value == "LIKE"){
			enC += " " + frmOp.fieldName.value + " " + frmOp.conOpe.value + " '%" + frmOp.conStr.value + "%'";
		}else{
			enC += " " + frmOp.fieldName.value + " " + frmOp.conOpe.value + " '" + frmOp.conStr.value + "'";
		}
	}
	if(frmOp.conditions.value.indexOf(enC) == -1) return enC;
	return "";
}
/**更改要添加的列*/
function changeSearch(fieldName, fieldRealname, fieldType){
	frmOp.selectRow.value = "[列] "+fieldRealname;
	frmOp.fieldName.value = fieldName;
	frmOp.fieldType.value = fieldType;
	frmOp.conStr.value = "";
	var op_len = frmOp.conOpe.options.length;
	for(var i = op_len-1;i>=0;i--) eval("frmOp.conOpe.options[i]=null");
	//文本 数字 长文本 日期 日期时间 文本日期 convert(varchar(25),t_date,120)
	frmOp.conStr.onclick=function(){};
	frmOp.conStr.onchange = function(){};

	var option0;
	if(fieldType == "文本"){
		option0 = new Option("等于","=");	eval("frmOp.conOpe.options[0]=option0");
		option0 = new Option("包含","LIKE");	eval("frmOp.conOpe.options[1]=option0");
	}else if(fieldType == "数字"){
		frmOp.conStr.onchange = function(){inputOnlyDigit(frmOp.conStr)};
		option0 = new Option("等于","=");	eval("frmOp.conOpe.options[0]=option0");
		option0 = new Option("大于",">");	eval("frmOp.conOpe.options[1]=option0");
		option0 = new Option("不小于",">=");	eval("frmOp.conOpe.options[2]=option0");
		option0 = new Option("小于","<");	eval("frmOp.conOpe.options[3]=option0");
		option0 = new Option("不大于","<=");	eval("frmOp.conOpe.options[4]=option0");
	}else if(fieldType == "长文本"){
		option0 = new Option("包含","LIKE");	eval("frmOp.conOpe.options[0]=option0");
	}else if(fieldType == "日期"){
		option0 = new Option("在","LIKE");	eval("frmOp.conOpe.options[0]=option0");
		option0 = new Option("之前","<=");	eval("frmOp.conOpe.options[1]=option0");
		option0 = new Option("之后",">=");	eval("frmOp.conOpe.options[2]=option0");
		reset_selectDate();
	}else if(fieldType == "时间"){
		option0 = new Option("在","LIKE");	eval("frmOp.conOpe.options[0]=option0");
		option0 = new Option("之前","<=");	eval("frmOp.conOpe.options[1]=option0");
		option0 = new Option("之后",">=");	eval("frmOp.conOpe.options[2]=option0");
		reset_selectDateTime();
	}else if(fieldType == "文本日期"){
		option0 = new Option("在","LIKE");	eval("frmOp.conOpe.options[0]=option0");
		option0 = new Option("之前","<=");	eval("frmOp.conOpe.options[1]=option0");
		option0 = new Option("之后",">=");	eval("frmOp.conOpe.options[2]=option0");
		reset_selectDate();
	}else{
		option0 = new Option("包含","LIKE");	eval("frmOp.conOpe.options[0]=option0");
	}
	frmOp.conOpe.options[0].selected=true;
	
	showMessage("列"+fieldRealname+"选择成功！", 1);
}
/**校验为空输入是否合格-------------------------------------------------------*/
function isNotRightInput(elm) {
	/**首先看是否是空格*/
    var temp = "";
    var string="" + elm.value;
    var splitstring = string.split(" ");
    for(i = 0; i < splitstring.length; i++)
    temp += splitstring[i];
    if (temp == "" || temp == null) return true;
	/**特殊符号屏蔽*/
	var digits="<>'\""
    for(var i=0;i<elm.value.length;i++){
        temp=elm.value.substring(i,i+1)
        if (digits.indexOf(temp)!=-1) return true;
    }
    return false ;
}
/**特殊符号屏蔽---------------------------------------------------------------*/
function isNotRightInput1() {
	var elm = document.getElementById("condition");
	var digits="<>'\""
    for(var i=0;i<elm.value.length;i++){
        temp=elm.value.substring(i,i+1)
        if (digits.indexOf(temp)!=-1) return true;
    }
    return false ;
}
/**看是否输入的是否是数字-------------------------------------------------------*/
function inputOnlyDigit(elm) {
	var digits="1234567890";
    for(var i=0;i<elm.value.length;i++){
        temp=elm.value.substring(i,i+1);
		returnStr=elm.value.substring(0,i);
        if (digits.indexOf(temp)<0) elm.value = returnStr;
    }
}
/**以下为特殊设定所需要*/
/**-------年月日格式设定-------------------------------------------------------*/
function reset_selectDate(){
	frmOp.conStr.onclick=function(){WdatePicker();};
}
/**-------年月日时间格式设定-------------------------------------------------------*/
function reset_selectDateTime(){
	frmOp.conStr.onclick=function(){WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});};
}
/**显示错误的信息*/
function showMessage(msg, t){
	if(msg == "") document.getElementById("_Message").innerHTML="&nbsp;";
	else {
		if(t == 0) document.getElementById("_Message").style.color = "#FF0000";
		else  document.getElementById("_Message").style.color = "#034D72";
		document.getElementById("_Message").innerHTML=msg;
	}
}