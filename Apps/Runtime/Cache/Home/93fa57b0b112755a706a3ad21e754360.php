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
        <title>快递订单</title>
    </head>
<body>
<hr/>
<div class="panel panel-primary mt20" style="padding:1% 1%">
  <div class="panel-heading">
    <h3 class="panel-title">直接代寄</h3>
  </div>
  <div class="panel-body">
    <?php echo (htmlspecialchars_decode($info["news_content"])); ?>
  </div>
</div>
    <p align="center"><a href="/Home/Cend/cend_express" class="btn btn-primary" role="button">下单</a> <a href="/Home/Cend/index" class="btn btn-default" role="button">返回首页</a></p>	
</body>
</html>