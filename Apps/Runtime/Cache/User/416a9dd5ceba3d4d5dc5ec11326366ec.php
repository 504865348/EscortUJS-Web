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
    <form action="/User/Index/edit_my_info" method="post">
		<input type="button" onclick="javascript:history.back(-1);" value="&laquo;" class="back tcm" />
		<div class="w11 center-block">
			<div class="input-group mt10 w12 pt5 pb5"><span class="input-group-addon bcm">姓　　名：</span><input type="text" class="form-control" name="user_realname" value="<?php echo ($userinfo["user_realname"]); ?>" required /></div>
				<div class=" mt10 w12 row">
					<div class="col-xs-6">
						<select class="select_one" name="school_area_id" value="">
							<?php if(is_array($schoolAreaList)): $i = 0; $__LIST__ = $schoolAreaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["school_area_id"]); ?>"
							<?php if($userinfo["school_area_id"] == $vo['school_area_id']): ?>selected="selected"<?php endif; ?>
							><?php echo ($vo["school_area_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
					<div class="col-xs-6">
						<select class="select_one" name="school_area_detail_id" value="<?php echo ($userinfo["school_area_id"]); ?>">
							<?php if(is_array($schoolAreaDetailList)): $i = 0; $__LIST__ = $schoolAreaDetailList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["school_area_detail_id"]); ?>"
							<?php if($userinfo["school_area_detail_id"] == $vo['school_area_detail_id']): ?>selected="selected"<?php endif; ?>
							><?php echo ($vo["school_area_detail_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
				</div>
			<div class="mt10 w12 pt5 pb5">详细收货地址：</div>
			<div class="mt10 w12 pt5 pb5">
			<textarea placeholder="用户详细地址——地址越详细，送货越准确" name="user_address" rows="5" class="form-control"><?php echo ($userinfo["user_address"]); ?></textarea></div>
			<div class="mt10 w12">
			<input type="submit" class="btn w10 tcw center-block" style="background:#F01400" value="保存修改"/>
			</div>
		</div>
    </form>
</body>
</html>