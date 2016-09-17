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
        
<script type="text/javascript" src="<?php echo (JS_URL); ?>echarts.min.js"></script>
<script type="text/javascript" src="<?php echo (LAYDATE_URL); ?>"></script>

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
                
    <h3 class="mt20 mb20 w112 text-center">目前注册总人数:&nbsp;&nbsp;<span style="color:red;font-size:36px;"><?php echo ($usernum); ?></span></h3>
    <hr />
    <div class="row">
    	<div id="user" class="col-sm-6" style="height:400px;"></div>
    	<div id="order" class="col-sm-6" style="height:400px;"></div>
    </div>
    <div class="row mb20">
    	<div id="server" class="col-sm-6" style="height:400px;"></div>
    	<div id="cend" class="col-sm-6" style="height:400px;"></div>
    </div>

            </div>
        </div><!--end row-->
        <div class="foot">
            <div class="w12 text-center">提供技术支持&copy;<a href="http://vastsum.com" target="_blank">镇江巨和网络科技有限公司</a></div>
        </div>
        <!--底部js块-->
        
<script type="text/javascript">
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('user'));

// 指定图表的配置项和数据
var option = {
	tooltip: {},
	 grid: {
    left: '3%',
    right: '4%',
    bottom: '3%',
    containLabel: true
	},
	 toolbox: {
		feature: {
			saveAsImage: {}
		}
	},
	legend: {
		data:['注册用户']
	},
	xAxis: {
		data: ['七日','六日','五日','四日','三日','二日','一日']
	},
	yAxis: {},
	series: [{
		name: '注册用户',
		type: 'bar',
		data: [<?php echo ($userdata["6"]); ?>,<?php echo ($userdata["5"]); ?>, <?php echo ($userdata["4"]); ?>,<?php echo ($userdata["3"]); ?>,<?php echo ($userdata["2"]); ?>,<?php echo ($userdata["1"]); ?>,<?php echo ($userdata["0"]); ?>]
	}]
};
// 使用刚指定的配置项和数据显示图表。
myChart.setOption(option);
</script>

<script type="text/javascript">
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('order'));
//加载显示
//myChart.showLoading();
// 指定图表的配置项和数据
var option = {
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['取快递订单']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : ['七日','六日','五日','大前天','前天','昨天','今天']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'取快递订单',
            type:'line',
            stack: '总量',
            data:[<?php echo ($data["6"]); ?>,<?php echo ($data["5"]); ?>,<?php echo ($data["4"]); ?>,<?php echo ($data["3"]); ?>,<?php echo ($data["2"]); ?>,<?php echo ($data["1"]); ?>,<?php echo ($data["0"]); ?>]
        }
     
    ]
};
// 使用刚指定的配置项和数据显示图表。
myChart.setOption(option);
</script>

<script type="text/javascript">
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('server'));
//加载显示
//myChart.showLoading();
// 指定图表的配置项和数据
var option = {
	title : {
		text: '服务类型',
		subtext: '当前数据',
		x:'center'
	},
	toolbox: {
		feature: {
			saveAsImage: {}
		}
	},
	tooltip : {
		trigger: 'item',
		formatter: "{a} <br/>{b} : {c} ({d}%)"
	},
	legend: {
		orient: 'vertical',
		left: 'left',
		data: ['<?php echo ($serverdata[0][server_content]); ?>','<?php echo ($serverdata[1][server_content]); ?>','<?php echo ($serverdata[2][server_content]); ?>']
	},
	series : [
		{
			name: '访问来源',
			type: 'pie',
			radius : '55%',
			center: ['50%', '60%'],
			data:[
				{value:<?php echo ($serverdata[0][num]); ?>, name:'<?php echo ($serverdata[0][server_content]); ?>'},
				{value:<?php echo ($serverdata[1][num]); ?>, name:'<?php echo ($serverdata[1][server_content]); ?>'},
				{value:<?php echo ($serverdata[2][num]); ?>, name:'<?php echo ($serverdata[2][server_content]); ?>'}
			],
			itemStyle: {
				emphasis: {
					shadowBlur: 10,
					shadowOffsetX: 0,
					shadowColor: 'rgba(0, 0, 0, 0.5)'
				}
			}
		}
	]
};
// 使用刚指定的配置项和数据显示图表。
myChart.setOption(option);
</script>

<script type="text/javascript">
	// 基于准备好的dom，初始化echarts实例
	var myChart = echarts.init(document.getElementById('cend'));
	//加载显示
	//myChart.showLoading();
	// 指定图表的配置项和数据
	var option = {
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['送快递订单']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : ['七日','六日','五日','大前天','前天','昨天','今天']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'送快递订单',
            type:'line',
            stack: '总量',
            data:[<?php echo ($cenddata["6"]); ?>,<?php echo ($cenddata["5"]); ?>,<?php echo ($cenddata["4"]); ?>,<?php echo ($cenddata["3"]); ?>,<?php echo ($cenddata["2"]); ?>,<?php echo ($cenddata["1"]); ?>,<?php echo ($cenddata["0"]); ?>]
        }
     
    ]
};
// 使用刚指定的配置项和数据显示图表。
myChart.setOption(option);
</script>

    </body>
    
</html>