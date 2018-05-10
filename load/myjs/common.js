/* 公用函数  2011-08-01 Davis*/
var numDot = false;
var int = 0;
function getNum(num)
{
	for(var i=0; i<num.length; i++)
	{
		if(num.charAt(i)<'0'||num.charAt(i)>'9')
			num = getNum(num.substring(0,i) + num.substring(i+1,num.length));
	}
	return num;
}

function getFloat(num)
{
	for(var i=0; i<num.length; i++)
	{
		if(num.charAt(i)=='.'&&i!=0&&!numDot)
		{
			numDot=true;
			continue;
		}
		if(num.charAt(i)<'0'||num.charAt(i)>'9')
			num = getFloat(num.substring(0,i) + num.substring(i+1,num.length));
	}
	numDot=false;
	return num;
}

  function selectAll(inForm, keyName)
{  

	if(inForm.idall.checked)
	{
		for (var i = 0; i < inForm.elements.length; i++) {
			var e = inForm.elements[i];
			if ((e.type == "checkbox") && (e.name == keyName)) {
				e.checked = true;
			}
		}
	}
	else
	{
		for (var i = 0; i < inForm.elements.length; i++) {
			var e = inForm.elements[i];
			if ((e.type == "checkbox") && (e.name == keyName)) {
				e.checked = false;
			}
		}
	}
}
	

function iFrameHeight(){

	var ifm = document.getElementById("_Spacework");
	var subWeb = document.frames ? document.frames["_Spacework"].document : ifm.contentDocument;
	if(ifm != null && subWeb != null){
		ifm.height = subWeb.body.scrollHeight;
	}
}

function iFrameHeighta(){

    var ifm=  window.parent.document.getElementById("_Spacework");

	//var ifm = document.getElementById("_Spacework");
	var subWeb = window.parent.document.frames ? window.parent.document.frames["_Spacework"].document : ifm.contentDocument;

	if(ifm != null && subWeb != null){
	 //   alert(subWeb.body.scrollHeight);
		ifm.height = subWeb.body.scrollHeight;
	}
}

function getBodySize() {
	var xScroll, yScroll; 
    
    if (window.innerHeight && window.scrollMaxY) {    
        xScroll = document.body.scrollWidth; 
        yScroll = window.innerHeight + window.scrollMaxY; 
    } else if (document.body.scrollHeight > document.body.offsetHeight){ 
        xScroll = document.body.scrollWidth; 
        yScroll = document.body.scrollHeight; 
    } else { 
        xScroll = document.body.offsetWidth; 
        yScroll = document.body.offsetHeight; 
    } 
    
    var windowWidth, windowHeight; 
    if (self.innerHeight) {   
        windowWidth = self.innerWidth; 
        windowHeight = self.innerHeight; 
    } else if (document.documentElement && document.documentElement.clientHeight) { 
        windowWidth = document.documentElement.clientWidth; 
        windowHeight = document.documentElement.clientHeight; 
    } else if (document.body) { 
        windowWidth = document.body.clientWidth; 
        windowHeight = document.body.clientHeight; 
    }    
    
   
    if(yScroll < windowHeight){ 
        pageHeight = windowHeight; 
    } else {  
        pageHeight = yScroll; 
    } 
  
    if(xScroll < windowWidth){    
        pageWidth = windowWidth; 
    } else { 
        pageWidth = xScroll; 
    }
    
    var bodySize = new Array(pageWidth,pageHeight,windowWidth,windowHeight)  
	return bodySize;
}