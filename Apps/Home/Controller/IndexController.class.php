<?php

namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
	public function _initialize(){
		\Think\Hook::add('stop_server','Home\\Behaviors\\StopBehavior');
	}

    public function index(){
		//tag('stop_server');
		$cookieUserPhone = cookie('user_phone');
		if($cookieUserPhone){
			$_SESSION['user_phone']=$cookieUserPhone;
			$sessionUserName=$_SESSION['user_phone'];
			$this->assign('sessionUserName',$sessionUserName);
		}
		
		//从数据库读出用户信息
		$user=M('user');
		$where['user_phone']=$sessionUserName;
		$userInfo=$user->where($where)->find();
		$this->assign('userInfo',$userInfo);
		
		
		//select从数据库读数据,读出快递公司
		$expcompany = M('expcompany');
		$expCompamyData = $expcompany->where('status=1')->select();
		$this->assign('expcompany',$expCompamyData);
		
		//读出快递区域信息
		$schoolArea=M('school_area');
		$schoolAreaDetail=M('school_area_detail');
		$schoolAreaList = $schoolArea ->where('status=1')-> select();
		$schoolAreaDetailList = $schoolAreaDetail ->where('status=1')-> select();
		$this -> assign('schoolAreaList',$schoolAreaList);
		$this -> assign('schoolAreaDetailList',$schoolAreaDetailList);
		
		//读出服务类型
		$server =M('Server');
		$serverData = $server ->where('status=1')-> select();
		$this -> assign('server',$serverData);
		
		$newsinfo = M('News')->where("news_title='announcement'")->find();
		$this -> assign('news',$newsinfo);

		$this->display();
	}
	
	public function areaValidate(){
		$schoolArea =M('school_area');
		$schoolAreaDetail=M('school_area_detail');
		$where['exp_school_area.school_area_id']=$_GET['areaId'];
		$data=$schoolAreaDetail
		->where($where)
 		->join('exp_school_area on exp_school_area_detail.school_area_id=exp_school_area.school_area_id') 
		->select();
		echo json_encode($data);
	}
	
	public function dosubmit(){
		//XXX:关于被查封用户的post请求不在这里处理

		//检验用户是否登录
		if(!($user_phone=cookie('user_phone'))){
			$this->error("请登录",U('User/Login/login'));
			return ;
		}
		
		//获取登录用户的id
		$user = M('user');
		$where['user_phone']=$user_phone;
		$user_id = $user ->field('user_id') -> where($where) -> find();
		
		//用令牌防止重复提交
		$order = D('order');
		if(!$order->autoCheckToken()){
			return ;
		}

		//验证并添加订单
		$data = $order->fetchTableOrder();
		if($msg=$order->orderDataValidate($data)){
			$msg = $order->addOrder($user_id,$data);
			if($msg){
				$this -> success("提交成功",U('Index/submitsuccess'),2);
			}else{
				$this -> error("订单提交失败");
			}	
		}else{
			$this -> error("订单提交失败，验证出错");
		}		
	}
	
	public function orderValidate(){
		$order = D("Order");
		$data = $order->fetchTableOrder();
		$msg = $order->orderDataValidate($data);
		$validateRes = array(
			'msg'        => $msg,
			'resetData'  => $data,
			'status'     => $msg['status']
		);
		unset($validateRes['msg']['status']);
		echo json_encode($validateRes);
	}

	//用户登录成功页
	public function submitsuccess(){
		$this->display();
	}
}
