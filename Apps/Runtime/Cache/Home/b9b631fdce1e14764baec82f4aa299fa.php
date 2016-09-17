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
        <title>信息发送成功</title>
		<style>
			.span_one{
				width:100%;
				text-align:center;
			}
			.span_one a{
				display:inline-block;
				padding:5px 10px;
				border:1px solid #44B549;
				font-size:16px;
				color:#44B549;
				text-decoration:none;
			}
		</style>
    </head>
    <body>
        <form action="" method="post">
			<input type="button" onclick="javascript:history.back(-1);" value="&laquo;" class="back tcm" />
			<div class="w11 center-block">
				<div class="input-group mt20 text-center w12">您的信息已送达(∩_∩)(∩_∩)，请等待手机联系</div>
				<p>我们会在“我的订单”页面下为您保留这个界面，以便您完成之后的操作。</p>
				<p>您可以<a href="/Home/Cend/group_cend/gid/<?php echo ($gid); ?>">填写自己的订单信息</a>,发送填写信息的页面链接给和您组团的同学，或发送下面的二维码。为了方便，您的同学不需要注册江大镖局的账户，还请各位代码大神手下留情。</p>
				</div>
				<img src="<?php echo (GROUPCEND_URL); echo ($gid); ?>.png" />
				<div class="input-group mt10 w12"><hr /></div>
				<div class="input-group mt10 span_one"><a href="/User/Index/index">进入个人中心</a></div>
			</div>
        </form>
    </body>
</html>