<?php
namespace Admin\Controller;
use Think\Controller;
class OrderManageController extends CommonController{
	//初始化订单
	public function orderlist(){
		$order = M('order');
		$where['order_deleted']=0;
		//实现分页
		$count = $order->where($where)->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,30);// 实例化分页类
		$show   = $Page->show();
		if(isset($_POST['chk_all']))unset($_POST['chk_all']);
		if(isset($_POST)){
			$this->assign("selectedList",$_POST);
		}
		$this -> assign('where',$where);
		$this -> assign('Page',$Page);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();	
	}

	//送快递一系列操作
	public function lcendlist(){
		$lcend = M('Lcend');
		//分页
		$count      = $lcend->count();
		$Page       = new \Think\Page($count,30);
		$show       = $Page->show();
		$lcendlist = $lcend ->order('lcend_id desc')
							->limit($Page->firstRow.','.$Page->listRows)
							-> select();
		$this -> assign('lcendlist',$lcendlist);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}

	//组团代寄
	public function glist(){
		$glist = M('Glist');
		//分页
		$count      = $glist->count();
		$Page       = new \Think\Page($count,30);
		$show       = $Page->show();
		$glists = $glist->order('glist_id desc')
						->limit($Page->firstRow.','.$Page->listRows)
						-> select();
		$this -> assign('glists',$glists);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}

	//组团代寄详情
	public function group(){
		$id = I('get.id');
		$glist = M('Glist');
		$gcend = M('Gcend');
		$where['glist_id'] = $id;
		$gids = $glist->where($where)->getField('glist_gids');
		$ones = explode('|',$gids);
		$i=0;
		$lists = array();
		foreach($ones as $value){
			if($value!=''){
				$lists[$i++] = $gcend->find($value);
			}
		}
		$this->assign("lists",$lists);
		$this->display();
	}

	//失效订单
	public function defunctlist(){
		$order = M('order');
		$where['order_deleted']=1;
		//实现分页
		$count = $order->where($where)->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,30);// 实例化分页类 
		$show   = $Page->show();
		$this -> assign('where',$where);
		$this -> assign('Page',$Page);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}

	//查看订单内容
	public function ordercontent(){
		if(!isset($_GET['id'])){
			$this->error('没有订单号');
		}
		$this->assign('order_id',$_GET['id']);
		$this->display();
	}

	//改变状态
	public function changestatus(){
		if(!isset($_GET['oid'])){
			$this->error('请选取订单',U('Admin/OrderManage/orderlist'),2);
		}
		$order = M('Order');
		$orderdata['order_id'] = $_GET['oid'];
		//查询出订单状态，按照步骤更改状态信息
		$orderinfo=$order->where($orderdata)->find();
		switch($orderinfo['order_status_id']){
			case 1:
			$where['order_status_id'] = 2;
			break;
			case 2:
			$where['order_status_id'] = 3;
			break;
			case 3:
			$where['order_status_id'] = 4;
			break;
			case 4:
			//$this->success('订单已完成',U('Admin/OrderManage/orderlist'),2);
			break;
		}
		$ans = $order->where($orderdata)->save($where);
		if($ans>0){
			$this->success('状态修改成功',U('Admin/OrderManage/orderlist'),2);
		}else{
			$this->error('订单已完成',U('Admin/OrderManage/orderlist'),2);
		}	
	} 

	//送快递一系列操作
	public function cendlist(){
		$cend = M('cend');
		//分页
		$count      = $cend->count();
		$Page       = new \Think\Page($count,30);
		$show       = $Page->show();
		$cendlist = $cend ->order('cend_id desc')
		-> join('exp_cend_status on exp_cend.status_id=exp_cend_status.status_id')
		->limit($Page->firstRow.','.$Page->listRows)
		-> select();
		$this -> assign('cendlist',$cendlist);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}
	//改变状态
	public function change_cend_status(){
		if(!isset($_GET['cid'])){
			$this->error('请选取订单',U('Admin/OrderManage/cendlist'),2);
		}
		$cend = M('cend');
		$cenddata['cend_id'] = $_GET['cid'];
		//查询出订单状态，按照步骤更改状态信息
		$cendinfo=$cend->where($cenddata)->find();
		switch($cendinfo['status_id']){
			case 1:
			$where['status_id'] = 2;
			break;
			case 2:
			$where['status_id'] = 3;
			break;
			case 3:
			//$where['status_id'] = 4;
			break;
		}
		$ans = $cend->where($cenddata)->save($where);
		if($ans>0){
			$this->success('状态修改成功',U('Admin/OrderManage/cendlist'),2);
		}else{
			$this->error('订单已完成',U('Admin/OrderManage/cendlist'),2);
		}
	}
		
}