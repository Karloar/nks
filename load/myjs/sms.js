    var InterValObj; //timer变量，控制时间  
    var count = 60; //间隔函数，1秒执行  
    var curCount;//当前剩余秒数  
    var code = ""; //验证码  
    var codeLength = 6;//验证码长度  
    var regphonenum = new RegExp("^((13[0-9])|(15[^4,\\D])|(18[0,5-9]))\\d{8}$");
    var regname=new RegExp("[a-zA-Z]+[a-zA-Z_0-9]{5,22}$");
    var regpwd=new RegExp("[a-zA-Z0-9]{6,16}$");
    var regnum=new RegExp("[0-9]{6,16}$");
    //判断是否为空
	function isNull(value){
		if((value=="")||(value==null)||(value==undefined)){
			return true;
		}else{
			return false;
		}
	}
    //判断是否包含空格
    function hasBalnk(value){
    	var arr = new Array();
    	arr = value.split(" ");
    	if(arr.legth!=1){
    		return true;
    	}else{
    		return false;
    	}
    }
    function sendMessage() {  
    //alert("aaa");
        curCount = count;  
        var phonenum = $("#phonenum").val();  
        var errorphone = $("#errorphone").text(); 
        //alert(errormobile); 
        if (!isNull(phonenum)) {
            if(errorphone == "√ 该手机号码可以注册" || errorphone == "√ 短信验证码已发到您的手机,请查收"){  
                // 产生验证码  
                for ( var i = 0; i < codeLength; i++) {  
                    code += parseInt(Math.random() * 9).toString();  
                }  
                // 设置button效果，开始计时  
                alert(code);
                $("#btnSendCode").attr("disabled", "true");  
                $("#btnSendCode").val("请在" + curCount + "秒内输入验证码");  
                InterValObj = window.setInterval(SetRemainTime, 1000); // 启动计时器，1秒执行一次  
                // 向后台发送处理数据  
                $.ajax({  
                    type: "POST", // 用POST方式传输  
                    dataType: "text", // 数据格式:JSON  
                    url: "RegisterAction_sms.aspx", // 目标地址  
                    data:{
                    	phonenum:phonenum,
                    	confirmcode:code
                    },  
                    error: function (XMLHttpRequest, textStatus, errorThrown) {   
                          
                    },  
                    success: function (data){   
                        data = parseInt(data, 10);  
                        if(data == 1){ 
                            $("#errorphone").html("<p class=\"red\">√ 短信验证码已发到您的手机,请查收</p>");  
                        }else if(data == 0){  
                            $("#errorphone").html("<p class=\"red\">× 短信验证码发送失败，请重新发送</p>");  
                        }else if(data == 2){  
                            $("#errorphone").html("<p class=\"red\">× 该手机号码今天发送验证码过多</p>");  
                        }  
                    }  
                });  
            }  
        }else{
            $("#errorphone").html("<p class=\"red\">× 手机号不能为空</p>");  
        }  
    }  
      
    //timer处理函数  
    function SetRemainTime() {  
        if (curCount == 0) {                  
            window.clearInterval(InterValObj);// 停止计时器  
            $("#btnSendCode").removeAttr("disabled");// 启用按钮  
            $("#btnSendCode").val("重新发送验证码");  
            code = ""; // 清除验证码。如果不清除，过时间后，输入收到的验证码依然有效  
        }else {  
            curCount--;  
            $("#btnSendCode").val("请在" + curCount + "秒内输入验证码");  
        }  
    }  
      
    $(document).ready(function() {  
        $("#confirmcode").blur(function() {  
            var confirmcode = $("#confirmcode").val();  
            var phonenum=$("#phonenum").val();
            return false;
        });  
    });  
    
    function checkName(value){
        if(!regname.test(value)||value==""){
			var _select = $("#errorname");
			_select.html("");
			_select.append("<p class=\"red\">"+"× 账号为5-22位的英文字符、数字、下划线组成,首位为字母"+"</p>");
            return false;
        }else{
        	$.ajax({
				 type: "POST",
				 dataType: "text",
			     url: '/RegisterAction_checkName.aspx?name='+ value,
			     success: function(data){
			        if(data=="cannotreg"){
			        	var _select = $("#errorname");
						_select.html("");
						_select.append("<p class=\"red\">"+"× 该用户账号已被注册"+"</p>");
			        }
			        if(data=="canreg"){
						var _select = $("#errorname");
						_select.html("");
						_select.append("<p class=\"red\">"+"√ 该用户账号可以注册"+"</p>");
					}	
			    }
			});
			//var errorname=$("#errorname").text();
			//if(errorname=="× 该用户账号已被注册"){
			//	return false;
			///}
			//if(errorname=="√ 该用户账号可以注册"){
			//	return true;
			//}
		}
 	}
 	
    function checkPhonenum(value){
        if(!regphonenum.test(value)||value==""){
			var _select = $("#errorphone");
			_select.html("");
			_select.append("<p class=\"red\">"+"× 手机号码不符合规范"+"</p>");
            return false;
        }else{
			var _select = $("#errorphone");
			_select.html("");
			_select.append("<p class=\"red\">"+"√ 该手机号码可以注册"+"</p>");
			return true;
		}
 	}
 	
	function checkPwd(value){
 		if(!regpwd.test(value)||isNull(value)){
        	var _select = $("#errorpwd");
			_select.html("");
			_select.append("<p class=\"red\">"+"× 密码位数在6-16位的英文字符、数字组成"+"</p>");
            return false;
        }else{
        	if(regnum.test(value)){
        		var _select = $("#errorpwd");
				_select.html("");
				_select.append("<p class=\"red\">"+"× 密码不能全为数字"+"</p>");
            	return false;
        	}else{
 				var _select = $("#errorpwd");
				_select.html("");
				_select.append("<p class=\"red\">"+"√ 密码格式正确"+"</p>");
            	return true;
            }
		}
 	}
 	var regconfirmcode=new RegExp(/[0-9]{6}$/);
 	function checkConfirmcode(value){
        if(!regconfirmcode.test(value)||value==""){
			var _select = $("#errorconfirmcode");
			_select.html("");
			_select.append("<p class=\"red\">"+"× 验证码错误!"+"</p>");
            return false;
        }else{
        	var _select = $("#errorconfirmcode");
			_select.html("");
			_select.append("<p class=\"red\">"+"√ 验证码格式正确!"+"</p>");
			return true;
		}
 	}
 	