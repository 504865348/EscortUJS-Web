<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>用户登录</title>

    <link href="<?php echo (BOOT_URL); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo (CSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo (BOOT_URL); ?>js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo (BOOT_URL); ?>js/bootstrap.js"></script>
    <!-- Custom styles for this template -->
    

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <![endif]-->
    <script type="text/javascript">
      function ajaxSubmit(){
        $.post('/System/Login/index',$('#loginForm').serialize(),function(msg,err){
          if(msg.status){
            window.parent.location.href="/System/Index/index";
            var index = parent.layer.getFrameIndex(window.name);
            parent.layer.close(index);
          }else{
            alert('登录失败');
          }
        },'json');
      }
    </script>
  </head>

  <body style="background:#eee;">

    <div class="container">

      <form id="loginForm" class="form-signin" method="post">
        <h2 class="form-signin-heading text-center">管理员登录</h2>
        <label for="inputEmail" class="sr-only">用户名</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="用户名" name="sys_account" required autofocus>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="密码" name="sys_password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me">记住我
          </label>
        </div>
        <a class="btn btn-lg bcm btn-block" type="submit" href="javascript:ajaxSubmit()">登录</a>
      </form>

    </div> <!-- /container -->
  </body>
</html>