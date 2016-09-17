var InterValObj; //timer变量，控制时间  
var count = 120; //间隔函数，1秒执行  
var curCount;//当前剩余秒数  
var code = ""; //验证码  
var codeLength = 6;//验证码长度  
  
function sendMessage() { 
    curCount = count;  
    var user_phone = $("#user_phone").val();  
    var spanuser_phone = $("#spanuser_phone").text();  
    if (user_phone == "") { 
        $("#spanuser_phone").html("<font color='red'>× 手机号码不能为空</font>");
    }
    if(spanuser_phone == "√ 手机号码可以注册" || spanuser_phone == "√ 短信验证码已发到您的手机,请查收"){  
        // 产生验证码  
        for ( var i = 0; i < codeLength; i++) {  
            code += parseInt(Math.random() * 9).toString();  
        }  
        // 设置button效果，开始计时  
        $("#btnSendCode").attr("disabled", "true");  
        $("#btnSendCode").val("请在" + curCount + "秒内输入验证码");  
        InterValObj = window.setInterval(SetRemainTime, 1000); // 启动计时器，1秒执行一次
        $.ajax({  
            type     :  "POST",  
            dataType :  "TEXT",  
            url      :  "cendMessage",   
            data     :  "user_phone=" + user_phone +"&code=" + code,  
            success  :  function (data){
                data = parseInt(data, 10);  
                if(data == 0){
                    $("#spanuser_phone").html("<font color='green'>√ 短信验证码已发到您的手机,请查收</font>");  
                }else if(data == 1){  
                    $("#spanuser_phone").html("<font color='red'>× 短信验证码发送失败，请重新发送</font>");  
                }
            }  
        });  
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
  
function checkpasscode() {  
    var passcode = $("#passcode").val();  
    // 向后台发送处理数据
    $.ajax({  
        url      :  "checkSms",   
        data     :  "passcode="+passcode ,   
        type     :  "POST",   
        dataType :  "text",   
        success  :  function(data) {  
            data = parseInt(data, 10);  
            if (data == 1) {  
                $("#spancode").html("<font color='green'>√ 短信验证码正确</font>");  
            } else if(data == 0) {  
                $("#spancode").html("<font color='red'>× 短信验证码错误</font>");  
            }
        }
    });
}
