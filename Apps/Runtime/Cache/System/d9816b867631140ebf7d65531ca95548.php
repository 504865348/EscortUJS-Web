<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/Apps/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/Apps/Public/bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/Apps/Public/bootstrap/js/bootstrap.min.js"></script>

    <!-- layer -->
	<script src="/Public/layer/layer.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
    	function loginLayer(){
    		index=layer.open({
    			type: 2,
			  	area: ['700px', '530px'],
			  	fix: false, //不固定
			  	maxmin: true,
			  	content: '/System/Login/login',
			  	end:function(){
			  		parent
			  	}
    		});

    	}
    </script>
  </head>
  <body>
   	<div class="jumbotron" style="padding:5% 10%">
	  <h1>系统管理</h1>
	  <p>欢迎来到江大镖局系统管理，在这里，你可以使用修改公告通知、开启或关闭系统等功能。准备好了吗？</p>
	  <p><a class="btn btn-primary btn-lg" href="javascript:void(0)" onclick="javascript:loginLayer();return false;" role="button">登录</a></p>
	</div>
  </body>
</html>