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
        <title>用户中心</title>
		<style>
		.div_one{
		display:block;
		position:relative;
		cursor: pointer;
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
			<a href="/Home/Index/index" class="mt10 w12 div_one pt5 pb5"><span class="glyphicon glyphicon-plus"></span><span class="a_one">下订单</span><span class="span_one">&gt;</span></a>
			<a href="/Home/Cend/index" class="mt10 w12 div_one pt5 pb5"><span class="glyphicon glyphicon-plus"></span><span class="a_one">毕业代寄</span><span class="span_one">&gt;</span></a>
			<a href="/User/Index/myinfo" class="mt10 w12 div_one pt5 pb5"><span class="glyphicon glyphicon-list"></span><span class="a_one">我的资料</span><span class="span_one">&gt;</span></a>
			<a href="/User/Order/my_order" class="mt10 w12 div_one pt5 pb5"><span class="glyphicon glyphicon-align-justify"></span><span class="a_one">我的订单</span><span class="span_one">&gt;</span></a>
			<a href="/User/Index/change_password" class="mt10 w12 div_one pt5 pb5"><span class="glyphicon glyphicon-edit"></span><span class="a_one">修改密码</span><span class="span_one">&gt;</span></a>
			<div class="panel panel-danger mt20" style="padding:1% 1%">
		  <div class="panel-heading">
		    <h3 class="panel-title">公告</h3>
		  </div>
		  <div class="panel-body">

			<div>
			<p>
    			<span style="font-family: 微软雅黑,Microsoft YaHei; font-size: 14px; color: rgb(127, 127, 127);">一、江大镖局粉丝群福利<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;江大镖局为了方便通知各区的小伙伴取快递以及反应问题每个区都建立了QQ分群.亲爱的镖粉们，为了方便你的生活请速速加一下哦。<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;江大镖局粉丝群&nbsp;：461857198<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;江大镖局A区分局：427284605<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;江大镖局B区分局：544453805<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;江大镖局C区分局：156638334<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;江大镖局E,F区分局：480852473<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</p>


			</div>
		   </div>
		</div>
			<div class="mt20 w12 mb20"><a href="/User/Login/logout" class="btn tcw w10 center-block" style="background-color:#F01400">退出登录</a>
			</div>
        </div>
		</form>

    </body>
</html>