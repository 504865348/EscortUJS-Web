<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="" name="Keywords" />
<meta content="" name="Description" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo (BOOT_URL); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="<?php echo (CSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo (BOOT_URL); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo (BOOT_URL); ?>js/bootstrap.js"></script>
<title>登录页面</title>
<style>
.span{
position:relative;	
}
.span1{
display:inline-block;
position:absolute;
left:0;
color:#999;
}
.span2{
display:inline-block;
position:absolute;
right:0;
color:#44B549;
}
</style>

</head>

<body>

<form action="/User/Login/login" method="post">
<input type="button" onclick="javascript:history.back(-1);" value="&laquo;" class="back tcm" />
<div class="w11 center-block">
    <div class="input-group mt10"><span class="input-group-addon bcm">手机号：</span><input type="text" name="user_phone" class="form-control"/></div>
    <div class="input-group mt10"><span class="input-group-addon bcm">密　码：</span><input type="password" name="user_password" class="form-control" /></div>
    <div class="input-group mt10 w12"><input type="submit" value="登　录" class="btn w12 bcm tcw" /></div>
	<div class="input-group mt10 span w12">
		<a href="/User/register/forgetpassword" class="span1">忘记密码？</a>
		<a href="/User/Register/register" class="span2">注册账号</a>
	</div>
</div>
</form>

</body>

</html>