<?php
//子命名空间
namespace Home\Controller;
use Think\Controller;
//use 命名空间\类
class ShopController extends Controller {
	//为用户取快递
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
		
		
		//读出快递区域信息
		$schoolArea=M('school_area');
		$schoolAreaDetail=M('school_area_detail');
		$schoolAreaList = $schoolArea ->where('status=1')-> select();
		$schoolAreaDetailList = $schoolAreaDetail ->where('status=1')-> select();
		$this -> assign('schoolAreaList',$schoolAreaList);
		$this -> assign('schoolAreaDetailList',$schoolAreaDetailList);
		
		$newsinfo = M('News')->where("news_title='dumplings'")->find();
		$this -> assign('news',$newsinfo);

		$this->display();
	}
	
	public function areaValidate(){
		$schoolArea =M('school_area');
		$schoolAreaDetail=M('school_area_detail');
		$where['exp_school_area.school_area_id']=$_POST['areaId'];
		$data=$schoolAreaDetail
		->where($where)
 		->join('exp_school_area on exp_school_area_detail.school_area_id=exp_school_area.school_area_id') 
		->select();
		$str= json_encode($data);
		echo $str;
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
		$shop = D('shop');
		if(!$shop->autoCheckToken()){
			return ;
		}

		//验证并添加订单
		$data = $shop->fetchTableShop();
		if($msg=$shop->shopDataValidate($data)){
			$msg = $shop->addShop($user_id,$data);
			if($msg){
				$this -> success("提交成功",U('Index/submitsuccess'),2);
			}else{
				$this -> error("订单提交失败");
			}	
		}else{
			$this -> error("订单提交失败，验证出错");
		}			
	}
	
	//用户登录成功页
	public function submitsuccess(){
		$this->display();
	}
}
