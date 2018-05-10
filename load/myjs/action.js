/* 登录界面  2011-08-01 Davis*/
function onLogin(e){
	if(e.keyCode == 13)
	{
		frmOp.action="UserAction_login.aspx";
		frmOp.submit();
	}
	else
		return;
}

 function hotOn()
	{   document.getElementById("hott").style.color="#000000";
	    document.getElementById("neww").style.color="#000000";
	  // document.getElementById("hott").style.background="#ffffff";
	   var  a = document.getElementById("hott").parentNode;
	   a.style.background="#f5f5f5";
	  
	   var  b = document.getElementById("neww").parentNode;
	   b.style.background="#ededed";
	   
	   // document.getElementById("neww").style.background="#ededed";
	   //   document.getElementById("neww").style.width="111px";
	     
	    
		document.getElementById("hot").style.display = "";
		document.getElementById("new").style.display = "none";
     }
     
 function newOn()
	{   

	    document.getElementById("hott").style.color="#000000";
	    document.getElementById("neww").style.color="#000000";
	  // document.getElementById("hott").style.background="#ededed";
	  
	    var  a = document.getElementById("neww").parentNode;
	   a.style.background="#f5f5f5";
	   
	   var  b = document.getElementById("hott").parentNode;
	   b.style.background="#ededed";
		document.getElementById("hot").style.display = "none";
		document.getElementById("new").style.display = "";
	}

function onUserLoginSub(){
	frmOp.action="UserAction_userlogin.aspx";
	frmOp.submit();
}

function onfLogin(e){
	if(e.keyCode == 13)
	{
		frmOp.action="/UserAction_frontlogin.aspx";
		frmOp.submit();
	}
	else
		return;
}
function verifyyesOO()
{
   window.parent.getURL(encodeURI(encodeURI("UserAction_getAllverify.aspx?verify=1")));	
}
function verifynoOO()
{   
   window.parent.getURL(encodeURI(encodeURI("UserAction_getAllverify.aspx?verify=0")));
}

function onSearchfor(e){
   sqlString = "";
  if(frm.cname.value != "")
		if(sqlString == "")
			sqlString += "cname like '%25" + frm.cname.value +"%25'";
		else
			sqlString += " and cname like '%25" + frm.cname.value +"%25'"; 
	   frm.sqlString.value = sqlString;
	if(e.keyCode == 13)
	{
		frm.action="CourseAction_getFrontSearch.aspx";
		frm.submit();
	}
	else
		return;
}
function onLoginSub(){
	frmOp.action="UserAction_login.aspx";
	frmOp.submit();
}


function fonLoginSub(){
	frmOp.action="UserAction_frontlogin.aspx";
	frmOp.submit();
}

function commentDelete(inForm, keyName)
		{
			isSelect = false;
			for (var i = 0; i < inForm.elements.length; i++) {
			var e = inForm.elements[i];
			if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
				isSelect = true;
				break;
				}
			}
			if (!isSelect) {
				alert("没有选择要删除的评论信息,请返回重新选择");
				return;
		} 
			else
			{
				document.frmOp.action = "CommentAction_commentDel.aspx";
				if(confirm("确定删除选中的门户信息么?"))
				document.frmOp.submit();
			}
		}
		
		function commentSearch()
{  
	sqlString = "";
	if(frmOp.studyid.value != "")
		if(sqlString == "")
			sqlString += "classid='" + frmOp.studyid.value +"'";
		else
			sqlString += " and classid='" + frmOp.studyid.value +"'";
	if(frmOp.seltype.value == "0"){
	
		if(frmOp.name.value != "")
			if(sqlString == "")
				sqlString += "teachername like '%25" + frmOp.name.value +"%25'";
			else
				sqlString += " and teachername like '%25" + frmOp.name.value +"%25'";
	}
	
	if(frmOp.seltype.value == "1"){
	 
		if(frmOp.name.value != "")
			if(sqlString == "")
				sqlString += "mastername like '%25" + frmOp.name.value +"%25'";
			else
				sqlString += " and mastername like '%25" + frmOp.name.value +"%25'";
	}
	if(frmOp.seltype.value ==""){
	
		if(frmOp.name.value != "")
			alert("请选择类型!");
	}
	if(frmOp.time.value != "")
		if(sqlString == "")
			sqlString += "time like '%25" + frmOp.time.value +"%25'";
		else
			sqlString += " and time like '%25" + frmOp.time.value +"%25'";
	if(frmOp.detail.value != "")
		if(sqlString == "")
			sqlString += "detail like '%25" + frmOp.detail.value +"%25'";
		else
			sqlString += " and detail like '%25" + frmOp.detail.value +"%25'";
	if(frmOp.rischecked.value != "")
		if(sqlString == "")
			sqlString += "rischecked='" + frmOp.rischecked.value +"'";
		else
			sqlString += " and rischecked='" + frmOp.rischecked.value +"'";
	frmOp.sqlString.value = sqlString;
	frmOp.action='/CommentAction_getComment.aspx';
	frmOp.submit();
}
		

/* 门户管理  2011-08-01 Davis*/
function topicSearch()
{
	sqlString = "";
	if(frmOp.title.value != "")
		if(sqlString == "")
			sqlString += "title='" + frmOp.title.value +"'";
		else
			sqlString += " and title='" + frmOp.title.value +"'";
	if(frmOp.time.value != "")
		if(sqlString == "")
			sqlString += "time>='" + frmOp.time.value +"'";
		else
			sqlString += " and time>='" + frmOp.time.value +"'";
	frmOp.sqlString.value = sqlString;
	frmOp.action='/TopicAction_getAll.aspx';
	frmOp.submit();
}

function topicDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的门户信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "TopicAction_topicDel.aspx";
		if(confirm("确定删除选中的门户信息么?"))
			document.frmOp.submit();
	}
}



		function masterDelete(inForm, keyName)
{  
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的门户信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "MasterAction_masterDel.aspx";
		if(confirm("确定删除选中的门户信息么?"))
			document.frmOp.submit();
	}
}
/* 系统日志  2014-05-08 Davis*/
function logSearch()
{
	sqlString = "";
	if(frmOp.time.value != "")
		if(sqlString == "")
			sqlString += "time='" + frmOp.time.value +"'";
		else
			sqlString += " and time='" + frmOp.time.value +"'";
	if(frmOp.name.value != "")
		if(sqlString == "")
			sqlString += "name>='" + frmOp.name.value +"'";
		else
			sqlString += " and name>='" + frmOp.name.value +"'";
	if(frmOp.type.value != "")
		if(sqlString == "")
			sqlString += "type>='" + frmOp.type.value +"'";
		else
			sqlString += " and type>='" + frmOp.type.value +"'";
			
	frmOp.sqlString.value = sqlString;
	frmOp.action='/LogAction_getAll.aspx';
	frmOp.submit();
}
/* 专家职称管理  2011-08-01 Davis*/
function dutySearch()
{
	sqlString = "";
	if(frmOp.dutyname!=undefined &&frmOp.dutyname.value!=undefined && frmOp.dutyname.value != "")
		if(sqlString == "")
			sqlString += "dutyname like '%25" + frmOp.dutyname.value +"%25'";

		else
		sqlString += " and dutyname like '%25" + frmOp.dutyname.value +"%25'";
	
	frmOp.sqlString.value = sqlString;
	frmOp.action='/DutyAction_getAll.aspx';
	frmOp.submit();
}

function dutyDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的职称信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "DutyAction_dutyDel.aspx";
		if(confirm("确定删除选中的职称信息么?"))
			document.frmOp.submit();
	}
}
/* 专家地区管理  2011-08-01 Davis*/
function regionSearch()
{
	sqlString = "";
	if(frmOp.regionname!=undefined &&frmOp.regionname.value!=undefined && frmOp.regionname.value != "")
		if(sqlString == "")
			sqlString += "regionname like '%25" + frmOp.regionname.value +"%25'";

		else
		sqlString += " and regionname like '%25" + frmOp.regionname.value +"%25'";
	
	
	frmOp.sqlString.value = sqlString;
	frmOp.action='/RegionAction_getAll.aspx';
	frmOp.submit();
}

function regionDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的地区信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "RegionAction_regionDel.aspx";
		if(confirm("确定删除选中的地区信息么?"))
			document.frmOp.submit();
	}
}
/* 培训对象管理  2011-08-01 Davis*/
function targetSearch()
{
	sqlString = "";
	
		if(frmOp.target!=undefined &&frmOp.target.value!=undefined && frmOp.target.value != "")
		if(sqlString == "")
			sqlString += "target like '%25" + frmOp.target.value +"%25'";

		else
		sqlString += " and target like '%25" + frmOp.target.value +"%25'";
	
	frmOp.sqlString.value = sqlString;
	frmOp.action='/TargetAction_getAll.aspx';
	frmOp.submit();
}

function targetDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的培训对象信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "TargetAction_targetDel.aspx";
		if(confirm("确定删除选中的培训对象信息么?"))
			document.frmOp.submit();
	}
}
/* 门户管理  2014-08-02 Dongym*/
/* 门户管理 类别管理——查询——删除 2014-08-02 Dongym*/


function categorySearch()
{
	sqlString = "";
	if(frmOp.type.value != "")
		if(sqlString == "")
			sqlString += "type='" + frmOp.type.value +"'";
		else
			sqlString += " and type='" + frmOp.type.value +"'";
	if(frmOp.kind.value != "")
		if(sqlString == "")
			sqlString += "kind='" + frmOp.kind.value +"'";
		else
			sqlString += " and kind='" + frmOp.kind.value +"'";
	frmOp.sqlString.value = sqlString;
	frmOp.action='/CategoryAction_getAll.aspx';
	frmOp.submit();
}




function traincitySearch()
{
	sqlString = "";
	if(frmOp.cityname.value != "")
		if(sqlString == "")
			sqlString += "cityname='" + frmOp.cityname.value +"'";
		else
			sqlString += " and cityname='" + frmOp.cityname.value +"'";
	if(frmOp.hotel.value != "")
		if(sqlString == "")
			sqlString += "hotel='" + frmOp.hotel.value +"'";
		else
			sqlString += " and hotel='" + frmOp.hotel.value +"'";
	frmOp.sqlString.value = sqlString;
	frmOp.action='/TraincityAction_getAll.aspx';
	frmOp.submit();
}
function solutionSearch()
{
	sqlString = "";
	if(frmOp.name.value != "")
		if(sqlString == "")
			sqlString += "name='" + frmOp.name.value +"'";
		else
			sqlString += " and name='" + frmOp.name.value +"'";
	if(frmOp.time.value != "")
		if(sqlString == "")
			sqlString += "time like '%25"+ frmOp.time.value + "%25'";
		else
			sqlString += " and time like '%25" + frmOp.time.value + "%25'";
			
	frmOp.sqlString.value = sqlString;
	frmOp.action='/SolutionAction_getAll.aspx';
	frmOp.submit();
}
function traincityDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的培训城市,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "TraincityAction_traincityDel.aspx";
		if(confirm("确定删除选中的培训城市吗?"))
			document.frmOp.submit();
	}
}
function linksDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的友情链接,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "LinksAction_linksDel.aspx";
		if(confirm("确定删除选中的友情链接吗?"))
			document.frmOp.submit();
	}
}

function publicityDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的宣传图片信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "PublicityAction_publicityDel.aspx";
		if(confirm("确定删除选中的宣传图片信息吗?"))
			document.frmOp.submit();
	}
}

function categoryDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的类别信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "CategoryAction_categoryDel.aspx";
		if(confirm("确定删除选中的类别信息吗?"))
			document.frmOp.submit();
	}
}

function gatewayGDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的公告信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "GatewayGAction_gatewayDel.aspx";
		if(confirm("确定删除选中的公告信息么?"))
			document.frmOp.submit();
	}
}

function gatewayNDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的新闻信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "GatewayNAction_gatewayDel.aspx";
		if(confirm("确定删除选中的新闻信息么?"))
			document.frmOp.submit();
	}
}

function topicDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的门户信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "TopicAction_topicDel.aspx";
		if(confirm("确定删除选中的门户信息么?"))
			document.frmOp.submit();
	}
}
/* 图片管理-方案管理-删除  2014-05-08 Davis*/
function schemeDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的方案信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "SchemeAction_schemeDel.aspx";
		if(confirm("确定删除选中的方案信息么?"))
			document.frmOp.submit();
	}
}
/* 图片管理-案例管理-删除  2014-05-08 Davis*/
function caseDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的案例信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "CaseAction_caseDel.aspx";
		if(confirm("确定删除选中的案例信息么?"))
			document.frmOp.submit();
	}
}

/* 成功案例管理-案例管理-删除  2014-10-20 manlx*/
function scaseDelete(inForm, keyName)
{ 
   isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的案例信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "SuccesscaseAction_scaseDel.aspx";
		if(confirm("确定删除选中的案例信息么?"))
			document.frmOp.submit();
	}
	}
/* 申请方案管理-删除  2014-10-22 chenyc*/
function solutionDelete(inForm, keyName)
{ 
   isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的申请信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "SolutionAction_solutionDel.aspx";
		if(confirm("确定删除选中的申请信息么?"))
			document.frmOp.submit();
	}
	}
/* 图片管理-slider管理-删除  2014-05-08 Davis*/
		function sliderDelete(inForm, keyName)
{
 	 alert("delete");
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的slider信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "SliderAction_sliderDel.aspx";
		if(confirm("确定删除选中的slider信息么?"))
			document.frmOp.submit();
	}
}

function slidersDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的slider信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "SlidersAction_sliderDel.aspx";
		if(confirm("确定删除选中的slider信息么?"))
			document.frmOp.submit();
	}
}

function gatewayNSearch()
{
	sqlString = "";
	if(frmOp.title.value != "")
		if(sqlString == "")
			sqlString += "title='" + frmOp.title.value +"'";
		else
			sqlString += " and title='" + frmOp.title.value +"'";
	if(frmOp.time.value != "")
		if(sqlString == "")
			sqlString += "time>='" + frmOp.time.value +"'";
		else
			sqlString += " and time>='" + frmOp.time.value +"'";
	if(frmOp.kind.value != "")
		if(sqlString == "")
			sqlString += "kind='" + frmOp.kind.value +"'";
		else
			sqlString += " and kind='" + frmOp.kind.value +"'";
	
	frmOp.sqlString.value = sqlString;
	frmOp.action='/GatewayNAction_getAll.aspx';
	frmOp.submit();
}

function gatewayGSearch()
{
	sqlString = "";
	if(frmOp.title.value != "")
		if(sqlString == "")
			sqlString += "title='" + frmOp.title.value +"'";
		else
			sqlString += " and title='" + frmOp.title.value +"'";
	if(frmOp.time.value != "")
		if(sqlString == "")
			sqlString += "time>='" + frmOp.time.value +"'";
		else
			sqlString += " and time>='" + frmOp.time.value +"'";
	if(frmOp.kind.value != "")
		if(sqlString == "")
			sqlString += "kind='" + frmOp.kind.value +"'";
		else
			sqlString += " and kind='" + frmOp.kind.value +"'";
	
	frmOp.sqlString.value = sqlString;
	frmOp.action='/GatewayGAction_getAll.aspx';
	frmOp.submit();
}

function sliderSearch()
{
	sqlString = "";
	if(frmOp.url.value != "")
		if(sqlString == "")
			sqlString += "url='" + frmOp.url.value +"'";
		else
			sqlString += " and url='" + frmOp.url.value +"'";
	if(frmOp.time.value != "")
		if(sqlString == "")
			sqlString += "time>='" + frmOp.time.value +"'";
		else
			sqlString += " and time>='" + frmOp.time.value +"'";
	frmOp.sqlString.value = sqlString;
	frmOp.action='/SliderAction_getAll.aspx';
	frmOp.submit();
}

function slidersSearch()
{
	sqlString = "";
	if(frmOp.url.value != "")
		if(sqlString == "")
			sqlString += "url='" + frmOp.url.value +"'";
		else
			sqlString += " and url='" + frmOp.url.value +"'";
	if(frmOp.time.value != "")
		if(sqlString == "")
			sqlString += "time>='" + frmOp.time.value +"'";
		else
			sqlString += " and time>='" + frmOp.time.value +"'";
	frmOp.sqlString.value = sqlString;
	frmOp.action='/SlidersAction_getAll.aspx';
	frmOp.submit();
}


  function onLogina(e){

	 if(e.keyCode == 13)
	{
		frmOp.action="UserAction_frontlogin.aspx";
		frmOp.submit();
	}
	else
		return;
}

function masterDelete(inForm, keyName)
{
	isSelect = false;
	for (var i = 0; i < inForm.elements.length; i++) {
		var e = inForm.elements[i];
		if ((e.type == "checkbox") && (e.name == keyName) && e.checked) {
			isSelect = true;
			break;
		}
	}
	if (!isSelect) {
		alert("没有选择要删除的专家信息,请返回重新选择");
		return;
	} 
	else
	{
		document.frmOp.action = "MasterAction_masterDel.aspx";
		if(confirm("确定删除选中的专家信息吗?"))
			document.frmOp.submit();
	}
}	

