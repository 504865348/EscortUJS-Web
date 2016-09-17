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
        <title>我的订单</title>
		<style>
			.div_one{
			background:#fff;
				padding:5px 10px;
				margin:5px 0;
				border-bottom:1px solid #eee;
			}
			.title_one{
				color:#44B549;
				margin-bottom:5px;
			}
			.title_one h5{
				display:inline-block;
				margin-left:10px;
			}
			.div_two{
				position:relative;
				padding:2px 5px;
				border-bottom:1px solid #eee;
				
			}
			.span_one{
				display:inline-block;
			}
			.span_two{
				display:inline-block;
				position:absolute;
				right:0;
				color:#44B549;
			}
		</style>
    </head>
    <body style="background:#eee;">
        <form action="" method="post">
			<input type="button" onclick="javascript:history.back(-1);" value="&laquo;" class="back tcm" />
			<!--循环读出订单，用户收到的快递-->
			<div class="title_one"><span class="glyphicon glyphicon-th-list"></span><h5>我收到的快递<h5></div>
			<?php if(is_array($orderlist)): $i = 0; $__LIST__ = $orderlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="w12 center-block div_one">
					<div class="w12 div_two">
						<span class="span_one"><?php echo (date('Y-m-d h:i:s',$vo["order_time"])); ?></span><!--订单提交时间-->
						<span class="span_two"><?php echo ($vo["status_name"]); ?></span><!--订单状态-->
					</div>
					<div class=" div_two mt10 mb10">
						<span class="span_one">
						订单编号：&nbsp;&nbsp;<span class="tcm"><?php echo ($vo["order_id"]); ?></span>
						</span>
						<span class="span_two"><a href="/User/Order/delete/id/<?php echo ($vo["order_id"]); ?>/pnum/<?php echo ($vo["order_phone"]); ?>" style="color:red;">取消订单</a>
						</span>					
					</div>
					<div class="div_three mt10 mb10">
					<?php echo ($vo["order_comment"]); ?>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<!--寄出快递-->
			<div class="title_one"><span class="glyphicon glyphicon-th-list"></span><h5>我寄出的快递</h5></div>
			<?php if(is_array($cendlist)): $i = 0; $__LIST__ = $cendlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="w12 center-block div_one">
					<div class="w12 div_two">
						<span class="span_one"><?php echo (date('Y-m-d H:i:s',$vo["register_time"])); ?></span><!--订单提交时间-->
						<span class="span_two"><?php echo ($vo["status_name"]); ?></span><!--订单状态-->
					</div>
					<div class=" div_two mt10 mb10">
						<span class="span_one">
						订单编号：&nbsp;&nbsp;<span class="tcm"><?php echo ($vo["cend_id"]); ?></span>
						</span>
						<span class="span_two"><a href="/User/Order/cend_delete/id/<?php echo ($vo["cend_id"]); ?>/pnum/<?php echo ($vo["phone"]); ?>" style="color:red;">取消订单</a>
						</span>					
					</div>
					<div class="div_three mt10 mb10">
					<?php echo ($vo["address"]); ?>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<!--情侣代寄-->
			<div class="title_one"><span class="glyphicon glyphicon-th-list"></span><h5>情侣代寄</h5></div>
			<?php if(is_array($lcendlist)): $i = 0; $__LIST__ = $lcendlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="w12 center-block div_one">
					<div class="w12 div_two">
						<span class="span_one"><?php echo (date('Y-m-d H:i:s',$vo["lcend_time"])); ?></span><!--订单提交时间-->
						<!-- <span class="span_two"><?php echo ($vo["status_name"]); ?></span> --><!--订单状态-->
					</div>
					<div class=" div_two mt10 mb10">
						<span class="span_one">
						订单编号：&nbsp;&nbsp;<span class="tcm"><?php echo ($vo["lcend_id"]); ?></span>
						</span>
						<!-- <span class="span_two"><a href="/User/Order/lcend_delete/id/<?php echo ($vo["cend_id"]); ?>/pnum/<?php echo ($vo["phone"]); ?>" style="color:red;">取消订单</a>
						</span>	 -->				
					</div>
					<div class="div_three mt10 mb10">
					<?php echo ($vo["lcend_firstaddress"]); ?><br/>
					<?php echo ($vo["lcend_secondaddress"]); ?>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<!--组团代寄-->
			<div class="title_one"><span class="glyphicon glyphicon-th-list"></span><h5>组团代寄</h5></div>
			<?php if(is_array($glists)): $i = 0; $__LIST__ = $glists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="w12 center-block div_one">
					<div class="w12 div_two">
						<span class="span_one"><?php echo (date('Y-m-d H:i:s',$vo["glist_time"])); ?></span><!--订单提交时间-->
						<!-- <span class="span_two"><?php echo ($vo["status_name"]); ?></span> --><!--订单状态-->
					</div>
					<div class=" div_two mt10 mb10">
						<span class="span_one">
						订单编号：&nbsp;&nbsp;<span class="tcm"><?php echo ($vo["glist_id"]); ?></span>
						</span>
						<!-- <span class="span_two"><a href="/User/Order/lcend_delete/id/<?php echo ($vo["cend_id"]); ?>/pnum/<?php echo ($vo["phone"]); ?>" style="color:red;">取消订单</a>
						</span>	 -->				
					</div>
					<div class=" div_two mt10 mb10">
						<span class="span_one">
						订单链接：&nbsp;&nbsp;<span class="tcm"><a href="/Home/Cend/apply_success/gid/<?php echo ($vo["glist_id"]); ?>">链接地址</a></span>
						</span>
						<!-- <span class="span_two"><a href="/User/Order/lcend_delete/id/<?php echo ($vo["cend_id"]); ?>/pnum/<?php echo ($vo["phone"]); ?>" style="color:red;">取消订单</a>
						</span>	 -->				
					</div>
					<div class="div_three mt10 mb10">
					<?php echo ($vo["glist_count"]); ?>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<div class="title_one"><span class="glyphicon glyphicon-th-list"></span><h5>购买的东西<h5></div>
			<?php if(is_array($shoplist)): $i = 0; $__LIST__ = $shoplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="w12 center-block div_one">
					<div class="w12 div_two">
						<span class="span_one"><?php echo (date('Y-m-d h:i:s',$vo["shop_time"])); ?></span><!--订单提交时间-->
						<span class="span_two"><?php echo ($vo["status_name"]); ?></span><!--订单状态-->
					</div>
					<div class=" div_two mt10 mb10">
						<span class="span_one">
						订单编号：&nbsp;&nbsp;<span class="tcm"><?php echo ($vo["shop_id"]); ?></span>
						</span>
						<!-- <span class="span_two"><a href="/User/Order/delete/id/<?php echo ($vo["order_id"]); ?>/pnum/<?php echo ($vo["order_phone"]); ?>" style="color:red;">取消订单</a> -->
						</span>					
					</div>
					<div class="div_three mt10 mb10">
					<?php echo ($vo["shop_comment"]); ?>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
        </form>
    </body>
</html>