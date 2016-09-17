<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="快递" name="Keywords" />
<meta content="用户注册" name="Description" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <base target="_blank" /> -->
<link href="<?php echo (BOOT_URL); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet" />
 <link href="<?php echo (CSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo (BOOT_URL); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo (BOOT_URL); ?>js/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo (JS_URL); ?>sms.js"></script>
<style>
	.span{
		text-align:center;
		font-size:14px;
		color:#eee;
	}
	div.span > a{
		color:#44B549;
	}
	.info1{
		font-size:14px;
		color:red;
		padding-left:10px;
	}
</style>
<title>用户注册</title>
<script type="text/javascript">

function validate(field) {
	var user_phone = document.getElementById("user_phone").value;
	var phoneNumReg = /(^[0-9]{3,4}\-[0-9]{7}$)|(^[0-9]{7}$)|(^[0-9]{3,4}[0-9]{7}$)|(^0{0,1}13[0-9]{9}$)/;
	if (!phoneNumReg.test(user_phone)) {
		document.getElementById("spanuser_phone").innerHTML = "<font color='red'>× 请输入有效的手机号码</font>";
		return false;
	} 
	if($.trim(field.value).length != 0 ){
		$.get("/User/Register/regValidate/pnum/"+user_phone,function(msg){
			if($.trim(msg) != ""){
				$("#spanuser_phone").html("<font color='red'>"+msg+"</font>");
			}else{
				$("#spanuser_phone").html("<font color='green'>√ 手机号码可以注册</font>");
			}
		});
	}
}

function checkpassword(){
	var password = document.getElementById("user_password").value;
	if (password.length < 6 || password.length > 30) {  
		document.getElementById("spanpassword").innerHTML = "<font color='red'>× 密码长度不能小于6位，大于30位</font>";  
		return false;  
	}else {  
		document.getElementById("spanpassword").innerHTML = "<font color='green'>√ 密码合格</font>";  
		return true;  
	}  
}
	
function checkpasswordb(){
	var password = document.getElementById("user_password").value;
	var repassword = document.getElementById("user_enpassword").value;
	if (repassword==null || repassword == "" || password != repassword) {  
    	document.getElementById("spanpasswordb").innerHTML = "<font color='red'>× 两次密码输入必须一致</font>";  
    	return false;  
    }else{
		document.getElementById("spanpasswordb").innerHTML = "<font color='green'>√ 再次输入密码合格</font>";
		return true;
	}
}

</script>

</head>
<body>

<form action="/User/Register/register" method="post"  name="loginform" id="loginform">
	<input type="button" onclick="javascript:history.back(-1);" value="&laquo;" class="back tcm" />
	<div class="w9 center-block">
		<div class="input-group mt10">
			<span class="input-group-addon bcm">手 机 号&nbsp;：</span>
			<input type="text" class="form-control" name="user_phone" id="user_phone" required onblur="validate(this)" />
		</div>
		<span id="spanuser_phone"></span>
		<div class=" mt10">
			<div class="input-group w7" style="display:inline-block;float:left;">
				<input type="text" class="form-control w12" required name="passcode" id="passcode" onblur="checkpasscode()" />
			</div>
			<div class="input-group w4" style="display:inline-block;float:left;margin-left:8%;">
				<input type="button" class="btn bcm tcw w12" value="点击获取验证码" id="btnSendCode" name="btnSendCode" onclick="sendMessage()"/>
			</div>
			<div class="clearfix"></div>
			<span class="spancode"></span>
		</div>
	
		<div class="input-group mt10"><span class="input-group-addon bcm">密　　码：</span>
		<input type="password" class="form-control" name="user_password" id="user_password" required onblur="checkpassword()" /></div>
		<span id="spanpassword"></span>
	
		<div class="input-group mt10"><span class="input-group-addon bcm">确认密码：</span>
		<input type="password" class="form-control" name="user_enpassword" id="user_enpassword" required onblur="checkpasswordb()" /></div>
		<span id="spanpasswordb"></span>
	
		<div class="input-group mt10 w12"><input type="submit" value="注　册" class="btn w12 bcm tcw" name="reg"/></div>
		<div class="input-group mt10 w12 span"><a href="#">注册即视为同意巨和快递协议</a></div>
	</div>	
</form>

</body>
</html>