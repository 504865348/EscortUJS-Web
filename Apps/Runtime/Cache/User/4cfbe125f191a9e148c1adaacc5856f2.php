<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="" name="Keywords" />
        <meta content="" name="Description" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <base target="_blank" /> -->
        <link href="" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src=""></script>
        <title>登录页面</title>
    </head>
    <body>
        <form action="/User/Login/dologin" method="post">
            账　号：<input type="text" name="user_account"/><br />
            密　码：<input type="password" name="user_password" /><br />
            验证码：<input type="text" name="verify" /><br />
            <input type="submit" value="登录" />
            <a href="#">注册</a>
        </form>
    </body>
</html>