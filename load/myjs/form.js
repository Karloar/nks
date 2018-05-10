var winwidth = 0, winheight = 0;
var divwidth = 0, divheight = 0;
var clientwidth = 0, clientheight = 0;
var pagewidth = 0, pageheight = 0;
var index = 10;
var hover = "#871d2f";
var ismove = false;

function createDiv(tit, href) {
	var bodySize = getBodySize();
	pagewidth = bodySize[0];
	pageheight= bodySize[1];
	winwidth = bodySize[2];
	winheight= bodySize[3];
	clientwidth = (window.innerWidth) ? window.innerWidth : (window.parent.document.documentElement && window.parent.document.documentElement.clientWidth) ? window.parent.document.documentElement.clientWidth : window.parent.document.body.offsetWidth;
	clientheight = (window.innerHeight) ? window.innerHeight : (window.parent.document.documentElement && window.parent.document.documentElement.clientHeight) ? window.parent.document.documentElement.clientHeight : window.parent.document.body.offsetHeight;
	var bgDiv = window.parent.document.getElementById("Div_ChildForm_Bg");
	if (bgDiv != null) {
			var bodySize = getBodySize();
			with (bgDiv.style) {
				width = bodySize[0];
				height = bodySize[1];
			}
		bgDiv.style.display = "block";
	} else {
		var bgDiv = window.parent.document.createElement("Div_ChildForm");
		bgDiv.id = "Div_ChildForm_Bg";
		window.parent.document.body.appendChild(bgDiv);
		var bodySize = getBodySize();
		with (bgDiv.style) {
			position = "absolute";
			top = "0px";
			left = "0px";
			width = bodySize[0];
			height = bodySize[1];
			background = "#8a1831";
			filter = "alpha(opacity=30);opacity:1.5";
			padding = "35%";
			bgDiv.innerHTML = "<font color='#034D72'><b>数据载入中，请稍候...</b></font>";
		}
	}
	var Div = window.parent.document.getElementById("Div_ChildForm");
	if (Div != null) {
		var shadow = window.parent.document.getElementById("shadow");
		var title = window.parent.document.getElementById("div_title");
		var url = window.parent.document.getElementById("Div_URL");
		var content = window.parent.document.getElementById("Div_Content");
		with (Div.style) {
			width = 100;
			height = 100;
			left = (clientwidth - 100) / 2;
			top = (clientheight - 100) / 2;
			display = "block";
		}
		title.innerHTML = tit;
		url.src = href;
		url.style.width = "100%";
		url.style.height = "100%";
		
		content.style.width = "100%";
		content.style.height = 100;
		
		var bodySize = getBodySize();
		if(divwidth == 0)
			divwidth = bodySize[0];
		if(divheight == 0)
			divheight = bodySize[1];
		//Div.style.left = (winwidth - (Div.style.width).substring(0,(Div.style.width).length - 2)) / 2 + "px";
		//Div.style.top = (winheight - (Div.style.height).substring(0,(Div.style.height).length - 2)) / 2 + "px";
		popChange(0);
		Divshadow();
	} else {
		index = index + 2;
		var id = "Div_ChildForm";
		var left = (clientwidth - 100) / 2;
		var top = (clientheight - 100) / 2;
		var zIndex = index;
		var title = tit;
		var url = href;
		var obj = null;
		bulid(id, left, top, zIndex, title, url);
	}
}

function popChange(i) {
	var login = window.parent.document.getElementById("Div_ChildForm");
	login.style.left = (document.body.scrollLeft+(winwidth - i * i *(login.style.width).substring(0,(login.style.width).length - 2) / 100) / 2) + "px";
	login.style.top = (document.body.scrollTop-30+(winheight - i * i *(login.style.height).substring(0,(login.style.height).length - 2) / 100) / 2) + "px";
	if (i < 10) {
		i++;
		setTimeout("popChange(" + i + ")", 10);
	}
	if(i == 10 && (((login.style.left).substring(0,(login.style.left).length - 2)+(login.style.width).substring(0,(login.style.width).length - 2)) * 1 > winwidth || 
					((login.style.top).substring(0,(login.style.top).length - 2)+(login.style.height).substring(0,(login.style.height).length - 2)) * 1 > winheight))
		setTimeout("popChange(" + 10 + ")", 10);
}

function Divshadow() {
	var div = window.parent.document.getElementById("Div_DragForm");
	var win = div.parentNode;
	div.style.backgroundColor = hover;
	win.style.borderColor = hover;
	div.nextSibling.style.color = hover;
}

function bulid(id, left, top, zIndex, title, url) {
	var div = "" 
	+ "<div id=" 
	+ id + " " 
	+ "style='" 	
	+ "z-index:10;" 
	+ "width:100;" 
	+ "height:100;" 
	+ "left:" + left + ";" 
	+ "top:" + top + ";" 
	+ "color:#05568A;" 
	+ "position:absolute;" 
	+ "cursor:default;" 
	+ "border:2px solid " + hover + ";" + "' " 
	+ "onmousedown='getFocus(this)'>" 
	
	+ "<table id='Div_DragForm'" 
	+ "style='" 
	+ "height:24;"
	+ "cursor:move;" + "' " 
	+ "onmousedown='startDrag(this)' " 
	+ "onmouseup='stopDrag(this)' " 
	+ "onmousemove='drag(this)' border='0' cellspacing='0' cellpadding='0'" + "><tr><td>" 
	+ "<span id='div_title' style='font-weight:bold;padding-left:10px;color:#FFFF00;width:100%;'>" + title + "</span>" 
	+ "</td><td align='center' width='20'>"
	+ "<span style='width:12;color:white;border-width:0px;color:white;font-family:webdings;cursor:hand;' title='关闭' onclick='clsForm()'>r</span>"
	+ "</td></tr></table>"

	+ "<div id='Div_Content' style='" 
	+ "line-height:14px;" 
	+ "word-break:break-all;" 
	+ "'><iframe id='Div_URL' name='Div_URL' src='" + url 
	+ "' style='width:100%;height:100%' scrolling=auto FRAMEBORDER=0'></iframe></div>" 
	+ "</div>" 
	
	+ "</div>";
	window.parent.document.body.insertAdjacentHTML("beforeEnd", div);
	createDiv(title, url);
	Divshadow();
}

function getFocus(obj) {
	index = index + 2;
	var idx = index;
	obj.style.zIndex = idx;
}

function startDrag(obj) {
	obj.setCapture();
	var div = obj.parentNode;
	x0 = window.parent.event.clientX;
	y0 = window.parent.event.clientY;
	x1 = window.parent.parseInt(div.style.left);
	y1 = window.parent.parseInt(div.style.top);
	ismove = true;
}

function stopDrag(obj) {
	obj.releaseCapture();
	ismove = false;
}

function drag(obj) {
	var div = obj.parentNode;
	if (ismove) {
		div.style.left = x1 + window.parent.event.clientX - x0;
		div.style.top = y1 + window.parent.event.clientY - y0;
	}
}

//重新写alert信息   2011-08-01 Davis
//window.alert = myalert;
function myalert(msg){
	//createDiv("餐饮管理系统 - 系统提示", "alert.jsp?token=" + Math.uuid() + "&msg=" + msg);
	var url = encodeURI(encodeURI("BaseAction_alert.aspx?random_token=" + Math.uuid() + "&msg=" + msg));
	createDiv("社区服务 - 系统提示", url);
}
//重新写conifrm信息 2011-08-01 Davis
//window.confirm = myconfirm;
function myconfirm(msg, okscript){
	var url = encodeURI(encodeURI("BaseAction_confirm.aspx?okscript=" + okscript + "&random_token=" + Math.uuid() + "&msg=" + msg));
	createDiv("社区服务 - 系统提示", url);
}