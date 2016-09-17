<?php if (!defined('THINK_PATH')) exit();?><!--startprint-->
<div id="print">
	<div class="print_a">
		<div class="w12 mb5 mt5" style="border-bottom:2px solid #000;">
			<span class="pull-left"><span class="fwb">订单编号：</span><?php echo ($order["order_id"]); ?></span>
			<span class="pull-right"><span class="fwb">订单时间：</span><?php echo (date('Y-m-d',$order["order_time"])); ?></span>
			<span class="clearfix"></span>
		</div>
		<div class="w12 mb5 mt5" style="border-bottom:2px solid #000;">
			<span class="pull-left"><span class="fwb">用户姓名：</span><?php echo ($order["order_realname"]); ?></span>
			<span class="pull-right"><span class="fwb">用户电话：</span><?php echo ($order["order_phone"]); ?></span>
			<span class="clearfix"></span>
		</div>
		<div class="w12 mb5 mt5" style="border-bottom:2px solid #000;">
			<div><span class="fwb">订单内容：</span></div>
			<div style="Word-break: break-all;"><?php echo ($order["order_comment"]); ?></div>
		</div> 
		<div class="w12 mb5 mt5" style="border-bottom:2px solid #000;">
			<div><span class="fwb">用户地址：</span></div>
			<div style="Word-break: break-all;"><strong>【<?php echo ($order["school_area_name"]); ?>】【<?php echo ($order["school_area_detail_name"]); ?>】</strong><?php echo ($order["order_user_address"]); ?></div>
		</div>
		<div class="w12 mb5 mt5">
			<div style="text-align:center"><span>江大镖局——让你的生活更美好</span></div>
			<h4></h4>
			<div class="row pl20">
				<div style="width:50%; float:left;">
				<!-- <img src="<?php echo (ORDERCODE_URL); echo ($order["order_id"]); ?>.png"> -->
				<img src="<?php echo (IMAGES_URL); ?>logo.jpg" style="width:40mm;height:40mm;" />
				</div>
				<div style="width:50%; float:left;">
				<img src="<?php echo (IMAGES_URL); ?>code.jpg" style="width:40mm;height:40mm;" />
				</div>
			</div>
		</div>
	<!-- <img src="/Admin/OrderManage/orderqrcode/id/<?php echo ($order["order_id"]); ?>"><br/> -->
	</div>
</div>
<!--endprint-->