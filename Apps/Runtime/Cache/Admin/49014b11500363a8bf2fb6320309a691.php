<?php if (!defined('THINK_PATH')) exit();?><table class="table table-bordered table-condensed table-striped">
	<tr>
		<td style="width:80px"><label><input type="checkbox" name="chk_all" id="selectAll" />全选</label></td>
		<td style="width:80px">订单编号</td>
<!-- 						<td>订单用户</td>
		<td>真实姓名</td>
		<td>收件人手机</td>
		<td>快递公司</td> 
		<td>服务类别</td>
		-->
		<td style="width:100px">收件地址</td>
		<td style="width:100px">订单内容</td>
		<td style="width:50px">订单备注</td>
		<td style="width:50px">订单时间</td>
		<td style="width:80px">查看</td>
		<td style="width:80px">修改状态</td>
	</tr>
	<?php if(is_array($orderlist)): $i = 0; $__LIST__ = $orderlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		<td style="width:80px"><input type="checkbox" name="chk_list" id="<?php echo ($vo["order_id"]); ?>" /></td>
		<td style="width:80px"><?php echo ($vo["order_id"]); ?></td>
		<!-- <td><?php echo ($vo["order_user_id"]); ?></td>
		<td><?php echo ($vo["order_realname"]); ?></td>
		<td><?php echo ($vo["order_phone"]); ?></td>
		<td><?php echo ($vo["order_expcompany_id"]); ?></td> 
		<td><?php echo ($vo["order_server_id"]); ?></td>						
		-->
		<td style="width:100px"><?php echo ($vo["school_area_name"]); echo ($vo["school_area_detail_name"]); echo ($vo["order_user_address"]); ?></td>
		<td style="width:100px"><?php echo ($vo["order_comment"]); ?></td>
		<td style="width:100px"><?php echo ($vo["order_remarks"]); ?></td>
		<td style="width:100px"><?php echo (date('y-m-d H:i:s',$vo["order_time"])); ?></td>
		<td style="width:80px"><a href="/Admin/orderManage/ordercontent/id/<?php echo ($vo["order_id"]); ?>">查看</a></td>
		<td style="width:80px"><a href="/Admin/orderManage/changestatus/oid/<?php echo ($vo["order_id"]); ?>">
		<?php if($vo["status_id"] == 1): ?>待取货
		<?php elseif($vo["status_id"] == 2): ?>
		待发货
		<?php elseif($vo["status_id"] == 3): ?>
		待接收
		<?php elseif($vo["status_id"] == 4): ?>
		已完成<?php endif; ?>
		</a></td>
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>