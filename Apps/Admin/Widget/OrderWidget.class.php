<?php
	namespace Admin\Widget;
	use Think\Controller;
	class OrderWidget extends Controller{
		//订单内容
		public function orderContent($order_id){
			$order = M('order');
			$ordercontent = $order
			-> join('exp_school_area on exp_order.school_area_id=exp_school_area.school_area_id')
			-> join('exp_school_area_detail on exp_order.school_area_detail_id=exp_school_area_detail.school_area_detail_id')					
			-> join('exp_status on exp_order.order_status_id=exp_status.status_id')
			-> join('exp_user on exp_order.order_user_id=exp_user.user_id')
			-> find($order_id);
			if(!empty($ordercontent)){
				$data['order_status_id']=4;
				$where['order_id']=$order_id;
				$order->where($where)->save($data);
				$this -> assign('order',$ordercontent);
				$this -> display('Widget:orderContent');
			}
		}
		public function orderTable($where,$Page){
			$order=M('Order');
			$orderlist = $order 
			->order('order_id desc')
			->where($where)
			-> join('exp_school_area on exp_order.school_area_id=exp_school_area.school_area_id')
			-> join('exp_school_area_detail on exp_order.school_area_detail_id=exp_school_area_detail.school_area_detail_id')
			-> join('exp_status on exp_order.order_status_id=exp_status.status_id')
			-> limit($Page->firstRow.','.$Page->listRows)
			->select();
			$this->assign('orderlist',$orderlist);
			$this->display('Widget:orderTable');
		}
	}
