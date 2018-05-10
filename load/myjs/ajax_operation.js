var httpReq = createAjaxObj();

function createAjaxObj(){
  var httprequest=false;
  if (window.XMLHttpRequest)
  { 
    httprequest=new XMLHttpRequest()
    if (httprequest.overrideMimeType)
      httprequest.overrideMimeType('text/xml')
   }
   else if (window.ActiveXObject)
   { 
     try {
       httprequest=new ActiveXObject("Msxml2.XMLHTTP");
     }
     catch (e){
       try{
          httprequest=new ActiveXObject("Microsoft.XMLHTTP");
       }
       catch (e){}
     }
   }
   return httprequest
}

function getURL(url)
{	
	document.forms[0].lastRequest.value = url;
	if(url.indexOf("?") < 0) url += "?";
	else url += "&";
	url += "random_token=" + Math.uuid();
	document.getElementById("_Spacework").src = url;
}

/* 刷新当前页面信息  2011-08-01 Davi*/
function refresh(){
	window.parent.getURL(window.parent.document.forms[0].lastRequest.value);
}
/* 跳转页  2011-08-01 Davis*/
function gotoPage(val) {

	url = "" + window.parent.document.forms[0].lastRequest.value;
	if(url.indexOf("?") < 0) url += "?";
	url += "&sqlString=" + encodeURI(encodeURI(document.forms[0].sqlString.value));
	url += "&sortStr=" + document.forms[0].sortStr.value;
	url += "&currentPage=" + val;
	window.parent.document.getElementById("_Spacework").src = url;
}

/* 更改排序方式  2011-08-01 Davis*/
function changeSort(val) {
	document.forms[0].sortStr.value = val;
	url = "" + window.parent.document.forms[0].lastRequest.value;
	if(url.indexOf("?") < 0) url += "?";
	url += "&sqlString=" + encodeURI(encodeURI(document.forms[0].sqlString.value));
	url += "&sortStr=" + val;
	window.parent.document.getElementById("_Spacework").src = url;
}

function gotoPagetest(val) {
  
     url = "" + window.location;
     
     if(url.indexOf("getAll")>0){
     if(url.indexOf("getAllf")>0){
      url = "ProjectAction_getAllsurvey.aspx"
     }
     else
      {url = ""+ window.location;
      var a = url.split('?');
      url =""+a[0];} 
     }
     else if(url.indexOf("survey")>0){
     	url = "ProjectAction_getAllsurvey.aspx"
     }
     else if(url.indexOf("add")>0){
       url = "ResearchAction_getAllr.aspx";
  }
     
	//url = "" + window.parent.document.forms[0].lastRequest.value;
	if(url.indexOf('?') < 0) url += "?";
   // url += "&sqlString=" + encodeURI(encodeURI(document.forms[0].sqlString.value));
   //url += "&sortStr=" + document.forms[0].sortStr.value;
     url += "&currentPage=" + val;
	    
    window.document.location=url;	
}


function searchServer(url, divName) {
	httpReq = createAjaxObj();
	if(url.indexOf("?") < 0) url += "?";
	else url += "&";
	url += "random_token=" + Math.uuid();
	httpReq.open("GET", url, false);
	httpReq.onreadystatechange = function(){reqCallback(divName)}; 
	httpReq.send(null);
}

function reqCallback(divName) {
	if (httpReq.readyState < 4 ) {
		document.getElementById(divName).innerHTML = "数据载入中...";
	}else if (httpReq.readyState == 4) {	
		document.getElementById(divName).innerHTML = httpReq.responseText;
	}
}

Math.uuid = (function() {
  // Private array of chars to use
  var CHARS = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.split(''); 

  return function (len, radix) {
    var chars = CHARS, uuid = [];
    radix = radix || chars.length;

    if (len) {
      // Compact form
      for (var i = 0; i < len; i++) uuid[i] = chars[0 | Math.random()*radix];
    } else {
      // rfc4122, version 4 form
      var r;

      // rfc4122 requires these characters
      uuid[8] = uuid[13] = uuid[18] = uuid[23] = '-';
      uuid[14] = '4';

      // Fill in random data.  At i==19 set the high bits of clock sequence as
      // per rfc4122, sec. 4.1.5
      for (var i = 0; i < 36; i++) {
        if (!uuid[i]) {
          r = 0 | Math.random()*16;
          uuid[i] = chars[(i == 19) ? (r & 0x3) | 0x8 : r];
        }
      }
    }

    return uuid.join('');
  };
})();