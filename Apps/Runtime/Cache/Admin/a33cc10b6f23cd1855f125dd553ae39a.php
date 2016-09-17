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
		<script type="text/javascript" src="<?php echo (JS_URL); ?>echarts.min.js"></script>
		<script type="text/javascript" src="<?php echo (LAYDATE_URL); ?>"></script>	
        <title>数据分析</title>
    </head>
    <body>
        <form action="" method="post">
			<div class="head">
				<!--模版表达式的定义规则为：模块@主题/控制器/操作 -->
				<div class="row">
	<div class="col-md-10">快递到家后台管理</div>
	<div class="col-md-1"><?php echo ($account); ?></div>
	<div class="col-md-1"><a href="/Admin/Index/logout" style="color:#fff;">退出登录</a></div>
</div>
			</div>
			<div class="row">
				<div class="navside col-md-2">
					<div class="w12">
	<a href="#homePage" data-toggle="collapse">首页</a>
	<ul id="homePage" class="collapse in">
		<li><a href="/Admin/Index/index" target="_self">后台首页</a></li>
		<li><a href="/Admin/Index/search" target="_self">数据分析</a></li>
	</ul>
	
	<a href="#userManage" data-toggle="collapse">用户管理</a>
	<ul id="userManage" class="collapse in">
		<li><a href="/Admin/UserManage/userlist" target="_self">用户列表</a></li>
	</ul>

	<a href="#orderManage" class="nav-header" data-toggle="collapse">订单管理</a>
	<ul id="orderManage" class="collapse in">
		<li><a href="/Admin/OrderManage/orderlist" target="_self">取货订单</a></li>
		<li><a href="/Admin/OrderManage/cendlist" target="_self">送货订单</a></li>
	</ul>
	
	<a href="#messageManage" class="nav-header" data-toggle="collapse">留言管理</a>
	<ul id="messageManage" class="collapse in">
		<li><a href="/Admin/MessageManage/messagelist" target="_self">用户留言</a></li>
	</ul>
	
	<a href="#baseParameter" class="nav-header" data-toggle="collapse">基本参数</a>
	<ul id="baseParameter" class="collapse in">
		<li><a href="/Admin/BaseParameter/expCompany" target="_self">快递公司</a></li>
		<li><a href="/Admin/BaseParameter/serverlist" target="_self">服务类型</a></li>
		<li><a href="/Admin/BaseParameter/addressConfig" target="_self">地址配置</a></li>
	</ul>
	</ul>
</div>

				</div>
				<div class="article col-md-10">
					<h3 class="text-center">取货订单查询总数：&nbsp;&nbsp;<span style="color:red;font-size:36px;"><?php echo ($ordernum); ?></span></h3>
					<div class="row">
							<div class="col-md-2">开始日：<input class="laydate-icon" type="text" id="start" name="start" style="width:200px;height:35px; margin-right:10px;" /></div>
							<div class="col-md-2">结束日：<input class="laydate-icon" type="text" id="end"name="end" style="width:200px;height:35px;" /></div>
							<div class="col-md-2">
								<select class="form-control "  id="selectSchoolArea" name="school_area_id"">
									<?php if(is_array($datalist)): $i = 0; $__LIST__ = $datalist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["school_area_id"]); ?>" class="col-md-6 form-control"><?php echo ($vo["school_area_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
							<input type="text" name="kk" /><br/>
							<div class="col-md-2">
								<select class="form-control "  id="selectSchoolAreaDetail" name="school_area_detail_id"">
									<?php if(is_array($schoolAreaDetailList)): $i = 0; $__LIST__ = $schoolAreaDetailList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["school_area_detail_id"]); ?>" class="col-md-6 form-control"><?php echo ($vo["school_area_detail_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
							<div class="col-md-2"><button class="btn bcm w12" name="search">查询</div>
					</div>
					
					<hr style=" height:2px;border:none;border-top:2px dotted #185598;" />
					<div class="row mt10">
						<div class="col-md-12">
							<?php echo W('Table/order'),array($orderlist);?> 
						<!-- <div><a href="javascript:Print1()" class="btn bcm w2 center-block mt20">打印</a></div> -->
							<?php echo ($page); ?><!--分页-->
						</div>
					</div>
				</div>
			</div><!--end row-->
			
			<div class="foot">
				<div class="w12 text-center">提供技术支持&copy;<a href="http://vastsum.com" target="_blank">镇江巨和网络科技有限公司</a></div>
			</div>
        </form>
		<script>
		!function(){
			laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
			laydate({elem: '#start'});//绑定元素
			//layer.now(timestamp, format);
		}();
		var start = {
			elem: '#start',
			format: 'YYYY/MM/DD hh:mm:ss',
			min: laydate.now(), //设定最小日期为当前日期
			max: '2099-06-16 23:59:59', //最大日期
			istime: true,
			istoday: false,
			choose: function(datas){
				 end.min = datas; //开始日选好后，重置结束日的最小日期
				 end.start = datas //将结束日的初始值设定为开始日
			}
		};
		var end = {
			elem: '#end',
			format: 'YYYY/MM/DD hh:mm:ss',
			min: laydate.now(),
			max: '2099-06-16 23:59:59',
			istime: true,
			istoday: true,
			choose: function(datas){
				start.max = datas; //结束日选好后，重置开始日的最大日期
			}
		};
		laydate(start);
		laydate(end);
		</script>
    </body>
</html>