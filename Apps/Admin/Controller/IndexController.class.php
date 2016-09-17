<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends CommonController {
	
    public function index(){
    	//	tag('stop_server');
		$order = M('order');
		for($i=0;$i<7;$i++){
			$data[$i]=$order->where("DATE_SUB(curdate(),INTERVAL {$i} DAY) = date(FROM_UNIXTIME(order_time))")->count();
		}
		$this->assign('data',$data);
		$user = M('user');
		$usernum = $user -> count(user_id);
		for($i=0;$i<7;$i++){
			$userdata[$i]=$user->where("DATE_SUB(curdate(),INTERVAL {$i} DAY)= date(FROM_UNIXTIME(user_regtime))")->count();
		}
		$this->assign('usernum',$usernum);
		$this->assign('userdata',$userdata);
		$serverdata=$order
					->field('server_content,count(order_id) as num')
					->join('exp_server on exp_server.server_id=exp_order.order_server_id')
					->group('order_server_id')
					->select();
		$this->assign('serverdata',$serverdata);
		$cend = M('cend');
		for($i=0;$i<7;$i++){
			$cenddata[$i]=$cend->where("DATE_SUB(curdate(),INTERVAL {$i} DAY) = date(FROM_UNIXTIME(register_time))")->count();
		}
		$this->assign('cenddata',$cenddata);
		$this->display();
    }
	
	//订单查询
	public function search(){
		//查询宿舍区
		$order = M('order');
		$expcompany = M('Expcompany');
		$expCompanyList=$expcompany->select();
		$this->assign('expCompanyList',$expCompanyList);
		//实现分页
		$where['order_deleted']=0;
		if(isset($_GET['expcompany'])&&$_GET['expcompany']!=0){
			$where['order_expcompany_id']=$_GET['expcompany'];		
			$this->assign('temp_id',$_GET['expcompany']);
		}
		$count  = $order->where($where)->count();
		$Page   = new \Think\Page($count,30);
		$show   = $Page->show();
		$this->assign('page',$show);
		$ordernum = $order->where($where)->count("order_id");
		$this -> assign('ordernum',$ordernum);					
		$this -> assign('where',$where);
		$this->assign('Page',$Page);
		$this->display();						
	}
}