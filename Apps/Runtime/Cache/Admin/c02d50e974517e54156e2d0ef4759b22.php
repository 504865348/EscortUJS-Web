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
        <script type="text/javascript" src="<?php echo (JS_URL); ?>common.js"></script>
        <!--标题-->
        <title>送货订单管理</title>	
        <!--头部额外内容-->
        
<style>
.table tr td,
.table tr th{
	text-align:center;
}
</style>

    </head>
    <body>
        <div class="head">
            <!--模版表达式的定义规则为：模块@主题/控制器/操作 -->
            <div class="row">
	<div class="col-md-10">快递到家后台管理</div>
	<div class="col-md-1"><?php echo ($account); ?></div>
	<div class="col-md-1"><a href="/Admin/Login/logout" style="color:#fff;">退出登录</a></div>
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
		<li><a href="/Admin/OrderManage/lcendlist" target="_self">情侣代寄</a></li>
		<li><a href="/Admin/OrderManage/glist" target="_self">组团代寄申请</a></li>
		<li><a href="/Admin/OrderManage/defunctlist" target="_self">失效订单</a></li>
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
		<li><a href="/Admin/News/index" target="_self">消息设置</a></li>
	</ul>
	</ul>
</div>

            </div>
            <div class="article col-md-10">
            <!--内容块-->
                
	<table class="table table-bordered table-condensed table-striped">
	<tr>
		<th width=60>订单编号</th>
		<th width=60>用户姓名</th>
		<th width=100>手机号码</th>
		<th width=200>送货地址1</th>
		<th width=200>送货地址2</th>
		<th width=200>寄件人地址1</th> 
		<th width=200>寄件人地址2</th> 
		<th width=150>取单时间</th>
		<th width=150>时间</th>
	</tr>
	<?php if(is_array($lcendlist)): $i = 0; $__LIST__ = $lcendlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		<td><?php echo ($vo["lcend_id"]); ?></td>
		<td><?php echo ($vo["lcend_firstrealname"]); ?>|<?php echo ($vo["lcend_secondrealname"]); ?></td>
		<td><?php echo ($vo["lcend_firstphone"]); ?>|<?php echo ($vo["lcend_secondphone"]); ?></td>
		<td><?php echo ($vo["lcend_firsttoaddress"]); ?></td>
		<td><?php echo ($vo["lcend_secondtoaddress"]); ?></td>
		<td><?php echo ($vo["lcend_firstaddress"]); ?></td>
		<td><?php echo ($vo["lcend_secondaddress"]); ?></td>
		<td><?php echo (date('Y-m-d H:i:s',$vo["lcend_gtime"])); ?></td>
		<td><?php echo (date('Y-m-d H:i:s',$vo["lcend_time"])); ?></td>
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<?php echo ($page); ?><!--分页-->

            </div>
        </div><!--end row-->
        <div class="foot">
            <div class="w12 text-center">提供技术支持&copy;<a href="http://vastsum.com" target="_blank">镇江巨和网络科技有限公司</a></div>
        </div>
        <!--底部js块-->
        
    </body>
    
</html>