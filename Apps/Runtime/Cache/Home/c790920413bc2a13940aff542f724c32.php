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
        <title>留言板</title>
    </head>
    <body>
        <form action="/Home/Message/domessage" method="post">
		<input type="button" onclick="javascript:history.back(-1);" value="&laquo;" class="back tcm" />
		<div class="w11 center-block">
			<div class="input-group mt10 w12"><textarea placeholder="用户留言——感谢您的回馈" rows="5" class="form-control" name="content" required ></textarea></div>
			<div class="input-group mt10 w12 mb20"><input type="submit" value="提交订单" class="btn w12 bcm tcw" /></div>
		</div>
		</form>
    </body>
</html>