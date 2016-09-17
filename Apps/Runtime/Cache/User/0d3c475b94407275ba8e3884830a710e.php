<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="" name="Keywords" />
<meta content="" name="Description" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <base target="_blank" /> -->
<link href="<?php echo (BOOT_URL); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="<?php echo (CSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo (BOOT_URL); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo (BOOT_URL); ?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>sms1.js"></script>
<title>忘记密码</title>

</head>

<body>

<form action="" method="post">
<input type="button" onclick="javascript:history.back(-1);" value="&laquo;" class="back tcm" />
<div class="w9 center-block">
	<div class="input-group mt10"><span class="input-group-addon bcm">手 机 号&nbsp;：</span><input type="text" required class="form-control" name="user_phone" id="user_phone"/></div>
	<div class=" mt10">
		<div class="input-group w7" style="display:inline-block;float:left;">
			<input type="text" name="passcode" class="form-control w12" />
		</div>
		<div class="input-group w4" style="display:inline-block;float:left;margin-left:8%;">
			<input type="button" class="btn bcm tcw w12" value="点击获取验证码" id="btnSendCode" name="btnSendCode" onclick="sendMessage()"/>
		</div>
		<div class="clearfix"></div>
		</div>
	<div class="input-group mt10"><span class="input-group-addon bcm">密　　码：</span><input type="password" class="form-control" name="user_password" /></div>
	<div class="input-group mt10"><span class="input-group-addon bcm">确认密码：</span><input type="password" class="form-control" name="user_enpassword" /></div>
	<div class="input-group mt10 w12"><input type="submit" value="确认重置" class="btn w12 bcm tcw"/></div>
</div>
</form>

</body>

</html>