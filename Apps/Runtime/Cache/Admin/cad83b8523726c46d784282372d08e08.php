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
        <title>后台管理</title>	
        <!--头部额外内容-->
        
<script type="text/javascript" src="<?php echo (JS_URL); ?>LodopFuncs.js"></script>
<script type="text/javascript">
	var LODOP; //声明为全局变量  
	function Preview1() {	
		LODOP=getLodop();  //JS过程获得控件对象：
		LODOP.PRINT_INIT("打印控件功能演示_Lodop功能_表单一");
		LODOP.SET_PRINT_PAGESIZE(0,1000,1000,"A4");
		//添加打印样式
		var strBodyStyle="<style>"+document.getElementById("printStyle").innerHTML+"</style>";
		//alert(strBodyStyle);
		//设置打印主体内容
		var HTMLContent=strBodyStyle+"<body>"+document.getElementById("print").innerHTML+"</body>";
		LODOP.ADD_PRINT_HTM("1mm","1mm","100%","100%",HTMLContent);
		//LODOP.ADD_PRINT_RECT("2px","2px","99mm","99mm",0,3);
		LODOP.SET_PRINT_MODE("POS_BASEON_PAPER",true);//该语句可使输出以纸张边缘为基点
		LODOP.PREVIEW();//打印预览		
	};
</script>


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
                
<?php echo W('Order/orderContent',array('order_id'=>$order_id));?>
<a href="javascript:Preview1()" class="btn bcm w2 center-block mt20">打印</a>

            </div>
        </div><!--end row-->
        <div class="foot">
            <div class="w12 text-center">提供技术支持&copy;<a href="http://vastsum.com" target="_blank">镇江巨和网络科技有限公司</a></div>
        </div>
        <!--底部js块-->
        
    </body>
    
</html>