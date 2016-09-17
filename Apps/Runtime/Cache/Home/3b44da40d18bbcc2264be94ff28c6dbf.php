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
        <title>寄快递</title>
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
        <form action="/Home/Cend/apply_group" method="post">
		<input type="button" onclick="javascript:history.back(-1);" value="&laquo;" class="back tcm" />
            <div class="center-block w11">
                <div class="input-group mt10 w12">
                <input type="text" placeholder="手机号，请申请组团的学长或学姐填写自己的手机号，便于联系" class="form-control" name="phone" required /></div>
                <div class="input-group mt10 w12">
                <select class="select_one" name="count">
                    <option value="">选择组团人数</option>
                    <option value="3">3人</option>
                    <option value="4">4人</option>
                    <option value="5">5人</option>
                </select>
                </div>
            <div class="input-group mt10 w12 mb20"><input type="submit" value="提交申请" class="btn w12 bcm tcw" /></div>
            </div>
        </form>
    </body>
</html>