<?php if (!defined('THINK_PATH')) exit();?><style  id="printStyle">
	.print_a{
		display:block;
		width:98mm;
		height:98mm;
		margin:0 auto;
		border:3px solid #000;
		padding:1mm 1mm;
	}
	.w12{
		width:100%;
	}
	.mb5{
		margin-bottom:5px;
	}
	.mt5{
		margin-top:5px;	
	}
	.fwb{
		font-weight:bolder;
	}
	.pull-left{
	float:left;
	}
	.pull-right{
	float:right;
	}
	.clearfix{
	clear:both;
	} 
	@media print{
		display:block;
		width:96mm;
		height:96mm;
		margin:0 auto;
		border:4px solid #000;
		padding:1mm 1mm;
		}
		.noprint{
		 display:none;
		}
	}
</style>
<!--startprint-->
<?php if(($_GET['from']) == "ajax"): ?><body><?php endif; ?>
<div id="print">
	<div class="print_a">
		<div class="w12 mb5 mt5" style="border-bottom:2px solid #000;">
			<span class="pull-left"><span class="fwb">订单编号：</span><?php echo ($order["order_id"]); ?></span>
			<span class="pull-right"><span class="fwb">订单时间：</span><?php echo (date('Y-m-d',$order["order_time"])); ?></span>
			<div class="clearfix"></div>
		</div>
		<div class="w12 mb5 mt5" style="border-bottom:2px solid #000;">
			<span class="pull-left"><span class="fwb">用户姓名：</span><?php echo ($order["order_realname"]); ?></span>
			<span class="pull-right"><span class="fwb">用户电话：</span><?php echo ($order["order_phone"]); ?></span>
			<div class="clearfix"></div>
		</div>
		<div class="w12 mb5 mt5" style="border-bottom:2px solid #000;">
			<div><span class="fwb">订单内容：</span></div>
			<div style="Word-break: break-all;"><?php echo ($order["order_comment"]); ?></div>
		</div> 
		<div class="w12 mb5 mt5" style="border-bottom:2px solid #000;">
			<div><span class="fwb">用户地址：</span></div>
			<div style="Word-break: break-all;"><strong>【<?php echo ($order["school_area_name"]); ?>】【<?php echo ($order["school_area_detail_name"]); ?>】<?php if($order['order_room_id']!=''): ?>【<?php echo ($order["order_room_id"]); ?>】<?php endif; ?></strong><?php echo ($order["order_user_address"]); ?></div>
		</div>
		<div class="w12 mb5 mt5">
			<div style="text-align:center"><span>江大镖局——客官请<strong style="font-size: 20px;font-family:华文行楷">打赏^_^</strong></span></div>
			<h4></h4>
			<div class="row pl20">
				<div style="width:50%; float:left;">
				<!-- <img src="<?php echo (ORDERCODE_URL); echo ($order["order_id"]); ?>.png"> -->
				<img src="<?php echo (IMAGES_URL); ?>logo.jpg" style="width:30mm;height:30mm;" />
				</div>
				<div style="width:50%; float:right;">
				<img src="<?php echo (IMAGES_URL); ?>paycode.png" style="width:30mm;height:30mm;" />
				</div>
			</div>
		</div>
	<!-- <img src="/Admin/OrderManage/orderqrcode/id/<?php echo ($order["order_id"]); ?>"><br/> -->
	</div>
</div>
<!--endprint-->
<?php if(($_GET['from']) == "ajax"): ?></body><?php endif; ?>