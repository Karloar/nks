function updateCaptcha()
{
	$.post(globalUrl+"user/getCaptcha",
        {
            'name':'getCaptcha'  
        },
        function (data,status) {
            document.getElementById("CaptchaImg").src=data;
            document.getElementById("CaptahcInput").value="";
        }
    );
	
}
