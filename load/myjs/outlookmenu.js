/**
左边菜单  2011-08-01 Davis
*/
var outlookbar=new outlook();
var outlooksmoothstat = 0;
function outlook()
{
	this.titlelist=new Array();
	this.itemlist=new Array();
	this.divstyle="style='height:100%;width:100%;overflow:auto' align=center";
	this.otherclass="border=0 cellspacing='0' cellpadding='0' style='height:100%;width:100%' valign=middle align=center ";
	this.addtitle=addtitle;
	this.additem=additem;
	this.starttitle=-1;
	this.show=show;
	this.showfront=showfront;
	this.getOutLine=getOutLine;
	this.opentitle=this.starttitle;
	this.reflesh=outreflesh;
	this.timedelay=50;
	this.inc=10;
	this.maincolor = "#336699";
}

function addtitle(intitle)
{
	outlookbar.itemlist[outlookbar.titlelist.length]=new Array();
	outlookbar.titlelist[outlookbar.titlelist.length]=new theitem(intitle,1,0);
	return(outlookbar.titlelist.length-1);
}

function theitem(intitle,instate,inkey)
{
	this.state=instate;
	this.otherclass=" nowrap ";
	this.key=inkey;
	this.title=intitle;
}

function getMenuHead(title, title_en, classname){
	var titlemsg = "<table width='150' border='0' cellspacing='0' cellpadding='0' background='/images/menu_bag.gif' ";
	titlemsg += "onMouseOut=this.style.backgroundImage='url(/images/menu_bag.gif)' onMouseOver=this.style.backgroundImage='url(/images/menu_hot.gif)'>";
	titlemsg += "<tr><td height='42' width='45' class='" + classname + "'>&nbsp;</td><td height='42'><table width='100%' border='0' cellspacing='0' cellpadding='0'>";
	titlemsg += "<tr><td class='l_menu_cn'>" + title + "</td></tr>";
	titlemsg += "<tr><td class='l_menu_en'>" + title_en + "</td></tr></table></td></tr></table>";
	return titlemsg;
}

function additem(intitle,parentid,inkey)
{
	if (parentid>=0 && parentid<=outlookbar.titlelist.length)
	{
		outlookbar.itemlist[parentid][outlookbar.itemlist[parentid].length]=new theitem(intitle,2,inkey);
		outlookbar.itemlist[parentid][outlookbar.itemlist[parentid].length-1].otherclass=" nowrap align=left style='height:5' ";
		return(outlookbar.itemlist[parentid].length-1);
	}
	else
	{
		additem=-1;
	}
}

function getMenuItem(title, commmand){
	var titlemsg = "";	
	if(title == "-"){
		titlemsg = "<table width='130' border='0' cellspacing='0' cellpadding='0'>";
		titlemsg += "<tr><td height='5'><table cellspacing=0 cellpadding=0 width='100%' border=0 style='border-top:1px dotted #034D72;'>";
		titlemsg += "<tbody><tr><td height=1></td></tr></tbody></table></td></tr></table>";
	} else {
		titlemsg = "<table title='" + title + "' onclick='javascript:" + commmand + ";' width='130' border='0' cellspacing='0' cellpadding='0' style='cursor:hand' ";
		titlemsg += "onMouseOut=this.style.backgroundImage='' onMouseOver=this.style.backgroundImage='url(/images/item_bag.gif)'";
		titlemsg += "><tr><td height='28' width='18' align='right'><img src='/images/icon_menu.gif'></td>";
		titlemsg += "<td class='l_menu_item'>" + title + "</td></tr></table>";
	}
	return titlemsg;
}

function locatefold(foldname)
{
	if (foldname=="")
	{
		foldname = outlookbar.titlelist[0].title;
	}
	for (var i=0;i<outlookbar.titlelist.length;i++)
	{
		if(foldname==outlookbar.titlelist[i].title)
		{
			outlookbar.starttitle=i;
			outlookbar.opentitle=i;
		}
	}
}

function show()
{
	var outline;
	outline="<div id=outLookBarDiv name=outLookBarDiv style='width=100%;height:100%'>"
	outline+=outlookbar.getOutLine();
	outline+="</div>"
	document.write(outline);
}

function showfront()
{
	var outline;
	outline="<div id=outLookBarDiv name=outLookBarDiv style='width=100%;height:400'>"
	outline+=outlookbar.getOutLine();
	outline+="</div>"
	document.write(outline);
	document.getElementById("outLookBarDiv").style.height=initbodysize[1];
}

function outreflesh()
{
	document.all("outLookBarDiv").innerHTML=outlookbar.getOutLine();
}

function getOutLine()
{
	outline="<table "+outlookbar.otherclass+">";
	for (i=0;i<(outlookbar.titlelist.length);i++)
	{
		outline+="<tr><td name=outlooktitle"+i+" id=outlooktitle"+i+" "; 
		if (i!=outlookbar.opentitle) 
			outline+=" nowrap align=center style='cursor:hand;height:20;' ";
		else
			outline+=" nowrap align=center style='cursor:hand;height:20;' ";
		outline+=outlookbar.titlelist[i].otherclass
		outline+=" onclick='switchoutlookBar("+i+")'>";
		outline+=outlookbar.titlelist[i].title+"</td></tr>";
		outline+="<tr><td name=outlookdiv"+i+" valign=top align=center id=outlookdiv"+i+" style='width:100%"
		if (i!=outlookbar.opentitle) 
			outline+=";display:none;height:0%;";
		else
			outline+=";display:;height:100%;";
		outline+="'><div name=outlookdivin"+i+" id=outlookdivin"+i+" style='overflow-y:scroll;white-space:nowrap;width:164;height:100%'>";
		for (j=0;j<outlookbar.itemlist[i].length;j++)
		{
			outline+=outlookbar.itemlist[i][j].title;
		}
		outline+="</div></td></tr>";
	}
	outline+="</table>";
	return outline;
}

function switchoutlookBar(number)
{
	var i = outlookbar.opentitle;
	outlookbar.opentitle=number;
	var id1,id2,id1b,id2b
	if (number!=i && outlooksmoothstat==0){
		if (number!=-1)
		{
			if (i==-1){
				id2="blankdiv";
				id2b="blankdiv";
			}
			else{
				id2="outlookdiv"+i;
				id2b="outlookdivin"+i;
			}
			id1="outlookdiv"+number
			id1b="outlookdivin"+number
			smoothout(id1,id2,id1b,id2b,0);
		}
		else
		{
			document.all("blankdiv").style.display="";
			document.all("blankdiv").sryle.height="100%";
			document.all("outlookdiv"+i).style.display="none";
			document.all("outlookdiv"+i).style.height="0%";
		}
	}
}

function smoothout(id1,id2,id1b,id2b,stat)
{
	if(stat==0){
		tempinnertext1=document.all(id1b).innerHTML;
		tempinnertext2=document.all(id2b).innerHTML;
		document.all(id1b).innerHTML="";
		document.all(id2b).innerHTML="";
		outlooksmoothstat=1;
		document.all(id1b).style.overflow="hidden";
		document.all(id2b).style.overflow="hidden";
		document.all(id1).style.height="0%";
		document.all(id1).style.display="";
		setTimeout("smoothout('"+id1+"','"+id2+"','"+id1b+"','"+id2b+"',"+outlookbar.inc+")",outlookbar.timedalay);
	}
	else
	{
		stat+=outlookbar.inc;
		if (stat>100)
			stat=100;
		document.all(id1).style.height=stat+"%";
		document.all(id2).style.height=(100-stat)+"%";
		if (stat<100) 
			setTimeout("smoothout('"+id1+"','"+id2+"','"+id1b+"','"+id2b+"',"+stat+")",outlookbar.timedalay);
		else
		{
			document.all(id1b).innerHTML=tempinnertext1;
			document.all(id2b).innerHTML=tempinnertext2;
			outlooksmoothstat=0;
			document.all(id1b).style.overflow="auto";
			document.all(id2).style.display="none";
		}
	}
}

function switchSysBarl(){ 
	var imgsrc; 
	imgsrc=document.all("_SystemBarCtrl").src; 
	if (imgsrc.indexOf("arrow_left")>1){ 
		document.all("_SystemBarCtrl").src="/images/arrow_right.gif"; 
		document.all("_SystemBarCtrl").title="显示系统菜单";
		parent.document.all("_left_menu").style.display="none";
	} 
	else{ 
		document.all("_SystemBarCtrl").src="/images/arrow_left.gif"; 
		document.all("_SystemBarCtrl").title="隐藏系统菜单"; 
		parent.document.all("_left_menu").style.display="";
	}
}
