<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="" name="Keywords" />
<meta content="" name="Description" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo (BOOT_URL); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="<?php echo (CSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo (BOOT_URL); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo (BOOT_URL); ?>js/bootstrap.js"></script>
<title>快递订单</title>
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

<script type="text/javascript">

function appendArea(area_id){
	$("#school_area_detail").empty(); 
	if(!appendArea.cache)	appendArea.cache = {};
	if(appendArea.cache[area_id] != null) {
		$("#school_area_detail").append(appendArea.cache[area_id]);
		return 0;
	}
	var area_info = "";
	$.getJSON("/Home/Index/areaValidate?areaId="+area_id,function(msg,status){
		$.each(msg,function(i){
			var id = msg[i].school_area_detail_id;
			var name = msg[i].school_area_detail_name;
			area_info += "<option value="+id+">"+name+"</option>";
		});
		$("#school_area_detail").append(area_info);
		appendArea.cache[area_id] = area_info;
	});
	
}

$(document).ready(function(){
	<?php if(isset($userInfo['school_area_id'])): ?>var id=<?php echo ($userInfo["school_area_id"]); ?>;
	appendArea(id);<?php endif; ?>
    $("#school_area_id").change(function() {   
		appendArea($(this).val());
	});
});
</script>

</head>

<body>

<form id="order" action="/Home/Index/dosubmit" method="post">
<input type="button" onclick="javascript:history.back(-1);" value="&laquo;" class="back tcm" />
<div class="panel panel-info mt20" style="padding:1% 1%">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo ($news["news_flag"]); ?></h3>
  </div>
  <div class="panel-body">
	<?php echo (htmlspecialchars_decode($news["news_content"])); ?>
  </div>
</div>
<div class="w11 center-block">
	<div class="input-group mt10 w12"><input type="text" placeholder="真实姓名--个人中心完善资料以后可以自动填写" class="form-control" name="order_realname" required value="<?php echo ($userInfo["user_realname"]); ?>"  /></div>
	<div class="input-group mt10 w12"><input type="text" placeholder="手机号" class="form-control" name="order_phone" required value="<?php echo ($userInfo["user_phone"]); ?>"/></div>
	<div class="input-group mt10 w12">
		<select class="select_one" name="order_expcompany_id">
			<?php if(is_array($expcompany)): $i = 0; $__LIST__ = $expcompany;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["expcompany_id"]); ?>"><?php echo ($vo["expcompany_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
	</div>
	
	<div class="input-group mt10 w12"><input type="text" placeholder="取货码" class="form-control" name="order_express_id" required/></div>

	<!-- 实现挑选地址   -->
	<div class="mt10 w12 row">
		<div class="col-xs-6">
			<select class="select_one" id="school_area_id" name="school_area_id">
				<option value="">请选择</option>	
				<?php if(is_array($schoolAreaList)): $i = 0; $__LIST__ = $schoolAreaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["school_area_id"]); ?>"
					<?php if($userInfo["school_area_id"] == $vo['school_area_id']): ?>selected="selected"<?php endif; ?>
					><?php echo ($vo["school_area_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
		<div class="col-xs-6">
		<select id="school_area_detail" class="select_one" name="school_area_detail_id">
			<option value="">请选择</option>				
		</select>
		</div>
	</div>
	
	<div class="input-group mt10 w12"><input type="text" placeholder="宿舍号--您可以填入自己准确的宿舍号，以便送件到宿舍" class="form-control" name="order_room_id" required/></div>

	<!--实现服务类别功能-->
	<div class="input-group mt10 w12">
		<select class="select_one"  id="selectServer" name="order_server_id" onchange="validate(this)">
			<?php if(is_array($server)): $i = 0; $__LIST__ = $server;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["server_id"]); ?>"><?php echo ($vo["server_content"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
		
		<div id="select_content"></div>
		<div class="mt5">
			<ul class="list-group">
				<?php if(is_array($server)): $i = 0; $__LIST__ = $server;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item list-group-item-success"><?php echo ($vo["server_content"]); ?>：<?php echo ($vo["server_text"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
	<!--------------------------end server---------------------->
	
	
	<div class="input-group mt10 w12"><textarea placeholder="详细快递信息——如果是快递公司发的短信，直接把短信黏贴到这里。信息必须包含：具体快递公司地址和编号,（中国邮政只选择带有编号的短信，不是带有密码的！）如有备注，请在后面填写" rows="5" class="form-control" name="order_comment" id="order_comment" onblur="alls()" required ></textarea></div>
	<div class="input-group mt10 w12 mb20"><input type="submit" value="提交订单" class="btn w12 bcm tcw" /></div>
</div>
</form>



</body>

</html>