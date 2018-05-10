function getCurrentTime(){
	var myDate = new Date(); //获取今天日期
	myDate.setDate(myDate.getDate()+1);
	var dateArray = []; 
	var dateTemp; 
	var flag = 1; 
	$("#pdate").append("<option value='"+""+"'>"+"请选择"+"</option>");
	for (var i = 0; i < 7; i++) {
		if(((myDate.getMonth()+1)<10)&&(myDate.getDate()<10)){
			dateTemp = myDate.getFullYear()+"-0"+(myDate.getMonth()+1)+"-0"+myDate.getDate();
		}
		if(((myDate.getMonth()+1)<10)&&(myDate.getDate()>=10)){
			dateTemp = myDate.getFullYear()+"-0"+(myDate.getMonth()+1)+"-"+myDate.getDate();
		}
		if(((myDate.getMonth()+1)>=10)&&(myDate.getDate()<10)){
			dateTemp = myDate.getFullYear()+"-"+(myDate.getMonth()+1)+"-0"+myDate.getDate();
		}
		if(((myDate.getMonth()+1)>=10)&&(myDate.getDate()>=10)){
			dateTemp = myDate.getFullYear()+"-"+(myDate.getMonth()+1)+"-"+myDate.getDate();
		}
	    //dateTemp = myDate.getFullYear()+"-"+(myDate.getMonth()+1)+"-"+myDate.getDate();
	    dateArray.push(dateTemp);
	    myDate.setDate(myDate.getDate() + flag);
	    //alert(dateArray[i]);
	    $("#pdate").append("<option value='"+dateArray[i]+"'>"+dateArray[i]+"</option>");
	}
}
