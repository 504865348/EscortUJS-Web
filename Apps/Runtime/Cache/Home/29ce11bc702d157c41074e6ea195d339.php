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
<title>粽有风情</title>
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
function detail_area() {   
    $("#school_area_detail").empty(); 
    $.ajax({
        type:"post",
        url:" /Home/Shop/areaValidate",
        data:{areaId:$(this).val()},
        success:function(msg){
			var listOne=eval(msg);
            for (i = 0; i < listOne.length; i++) {
                $("#school_area_detail").append("<option value="+listOne[i].school_area_detail_id+">"+listOne[i].school_area_detail_name+"</option>");
            }
        },
        error:function(){
            alert("failed.");
        }
    });
}
</script>
</head>
<body>
<form action="/Home/Shop/dosubmit" method="post">
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
		<div class="input-group mt10 w12"><input type="text" placeholder="真实姓名--个人中心完善资料以后可以自动填写" class="form-control" name="shop_realname" required value="<?php echo ($userInfo["user_realname"]); ?>"  /></div>
		<div class="input-group mt10 w12"><input type="text" placeholder="手机号" class="form-control" name="shop_phone" required value="<?php echo ($userInfo["user_phone"]); ?>"/></div>

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
		
		<div class="input-group mt10 w12"><input type="text" placeholder="宿舍号--您可以填入自己准确的宿舍号，以便送件到宿舍" class="form-control" name="shop_roomid" required/></div>
			
		
		<!--------------------------end server---------------------->
		
		
		<div class="input-group mt10 w12"><textarea placeholder="订单说明--请在这里写出您所要购买的粽子类型、数量和派送的时间，我们推荐您用“类型-数量”的格式，可写多种，并在最后注明时间" rows="5" class="form-control" name="shop_comment" id="shop_comment" required ></textarea></div>
		<div class="input-group mt10 w12 mb20"><input type="submit" value="提交订单" class="btn w12 bcm tcw" /></div>
	</div>
</form>
<script type="text/javascript">

$(document).ready(function(){
	<?php if(isset($userInfo['school_area_id'])): ?>var id=<?php echo ($userInfo["school_area_id"]); ?>;
	$("#school_area_detail").empty(); 
	$.ajax({
    type:"post",
    url:" /Home/Shop/areaValidate",
    data:{areaId:id},
    success:function(msg){
		var listOne=eval(msg);
        for (i = 0; i < listOne.length; i++) {
            $("#school_area_detail").append("<option value="+listOne[i].school_area_detail_id+">"+listOne[i].school_area_detail_name+"</option>");
        }
    },
    error:function(){
        alert("failed.");
    }
	});<?php endif; ?>
    $("#school_area_id").change(detail_area);
});
</script>
</body>
</html>