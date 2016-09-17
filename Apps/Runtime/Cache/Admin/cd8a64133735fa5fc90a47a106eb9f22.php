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
        <script type="text/javascript" src="<?php echo (JS_URL); ?>LodopFuncs.js"></script>
        <!--第一个块-->
        <title>后台管理</title>	
        <!--第二个块-->
        
	<script type="text/javascript" src="<?php echo (JS_URL); ?>LodopFuncs.js"></script>
	<script type="text/javascript">
	 function pp(){ 
	    $.ajaxSetup({async : false});
	    for(var i=1;i<=3;i++){
	    	console.log(i);
	    	$.get("/Admin/Print/tt/id/"+i+"/from/ajax",function(data){
	    	LODOP=getLodop();  //JS过程获得控件对象
			LODOP.PRINT_INIT("订单"+i.toString());
			LODOP.SET_PRINT_PAGESIZE(0,1000,1000,"A4");
			//添加打印样式
			//alert(data);
			//设置打印主体内容
			LODOP.ADD_PRINT_HTM("1mm","1mm","100%","100%",data);
			//LODOP.ADD_PRINT_RECT("2px","2px","99mm","99mm",0,3);
			LODOP.SET_PRINT_MODE("POS_BASEON_PAPER",true);//该语句可使输出以纸张边缘为基点
			LODOP.PRINT();//打印预览	
	   		});
		}
	}
	</script>

    </head>
    <body>
        <form action="" method="post">
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
	</ul>
	</ul>
</div>

                </div>
                <div class="article col-md-10">
                <!--第三个块-->
                    
	<a href="javascript:pp()" class="btn bcm w2 center-block mt20">打印</a>

                </div>
            </div><!--end row-->
            
            <div class="foot">
                <div class="w12 text-center">提供技术支持&copy;<a href="http://vastsum.com" target="_blank">镇江巨和网络科技有限公司</a></div>
            </div>
        </form>
        

    </body>
    <!--第四个块-->
    
</html>