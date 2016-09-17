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
        <title>情侣代寄</title>
        <style>
        .select_one{
            width:100%;
            border:1px solid #44B549;
            -webkit-height:35px;
            -webkit-line-height:35px;
            height:35px;
        }
        .select_one option{
            width:100%;
            border-bottom:1px solid #eee;
            -webkit-height:35px;
            -webkit-line-height:35px;
            height:35px;
            line-height:35px;
            font-size:16px;
        }
        </style>
    </head>
    <body>
        <form action="/Home/Cend/lover_docend" method="post">
		<input type="button" onclick="javascript:history.back(-1);" value="&laquo;" class="back tcm" />
			<div class="center-block w11">
				<div class="input-group mt10 w12"><input type="text" placeholder="一方真实姓名" class="form-control" name="firstrealname" required /></div>
				<div class="input-group mt10 w12"><input type="text" placeholder="另一方真实姓名" class="form-control" name="secondrealname" required /></div>
				<div class="input-group mt10 w12">
                <input type="text" placeholder="手机号1" class="form-control" name="firstphone" required /></div>
                <div class="input-group mt10 w12">
                <input type="text" placeholder="手机号2" class="form-control" name="secondphone" required /></div>
                <div class="input-group mt10 w12">
                <div class="col-xs-6">
                    <select class="select_one" name="get_day">
                        <option value="">取件日期</option>
                        <option value="<?php echo ($today); ?>">今天</option>
                        <option value="<?php echo ($nextday); ?>">明天</option>
                        <option value="<?php echo ($afterday); ?>">后天</option>
                    </select>
                </div>
                <div class="col-xs-6">
                    <select class="select_one" name="get_time" placeholder="取件时间">
                        <option value="">取件时间</option>
                        <option value="12:30">上午12:30</option>
                        <option value="21:30">下午21:30</option>
                    </select>
                </div>
                </div>
                <div class="input-group mt10 w12"><textarea placeholder="一方的地址，请写好自己所在的区和楼栋，以便取件" rows="5" class="form-control" name="firstaddress"></textarea></div>
                <div class="input-group mt10 w12"><textarea placeholder="另一方的地址，请写好自己所在的区和楼栋，以便取件" rows="5" class="form-control" name="secondaddress"></textarea></div>
				<div class="input-group mt10 w12"><textarea placeholder="一方的寄件地址" rows="5" class="form-control" name="firsttoaddress"></textarea></div>
				<div class="input-group mt10 w12"><textarea placeholder="另一方的寄件地址" rows="5" class="form-control" name="secondtoaddress"></textarea></div>
			    <div class="input-group mt10 w12 mb20"><input type="submit" value="提交订单" class="btn w12 bcm tcw" /></div>
			</div>
        </form>
    </body>
</html>