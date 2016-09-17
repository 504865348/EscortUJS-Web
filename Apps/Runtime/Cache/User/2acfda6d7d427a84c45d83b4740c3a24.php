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
        <title>我的资料</title>
		<style>
		.div_one{
		display:block;
		position:relative;
		border-bottom:1px solid #eee;
		}
		.div_one span:first-child{
		color:#44B549;
		}
		.a_one{
			display:inline-block;
			margin-left:20px;
			color:#999;
			text-decoration:none;
		}
		.span_one{
		display:inline-block;
		position:absolute;
		right:1%;
		color:#44B549;
		}
		</style>
    </head>
    <body>
        <form action="" method="post">
			<input type="button" onclick="javascript:history.back(-1);" value="&laquo;" class="back tcm" />
			<div class="w11 center-block">
				<div class="mt10 w12 div_one pt5 pb5">真实姓名：<span><?php echo ($info["user_realname"]); ?></span></div>
				<div class="mt10 w12 div_one pt5 pb5">手&nbsp;机&nbsp;号：<span><?php echo ($info["user_phone"]); ?></span></div>
				<div class="mt10 w12 div_one pt5 pb5">收货地址：</div>
				<div class="mt10 w12 pt5 pb5" style="border-top:1px solid #eee;border-bottom:1px solid #eee;color:#bbb;"><?php echo ($info["user_address"]); ?></div>
				<div class="mt10 w12"><a href="/User/Index/edit_my_info" class="btn w10 tcw center-block" style="background:#F01400">修改资料</a></div>
			</div>
        </form>
    </body>
</html>