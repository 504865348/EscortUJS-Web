<?php
namespace User\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
		$user_phone = cookie('user_phone');
		if($user_phone){
			$this->display();
		}else{
			$this->error('请登录',U('User/Login/login'));
		}
    }
	public function myinfo(){
		$user = M('User');
		$schoolArea=M('school_area');
		$schoolAreaDetail=M('school_area_detail');
		$where['user_phone']=cookie('user_phone');
		$status['status']=1;
		$res = $user->where($where)->find();		
		$schoolAreaList = $schoolArea ->where($status)-> select();
		$schoolAreaDetailList = $schoolAreaDetail ->where($status)->select();
		$this -> assign('schoolAreaList',$schoolAreaList);
		$this -> assign('schoolAreaDetailList',$schoolAreaDetailList);
		if($res>0){
			$this->assign('info',$res);
			$this->display();
		}else{
			$this->error('请登录',U('User/Login/login'));
		}
	}
	public function edit_my_info(){
		if(!empty($_POST)){
			$user=M('User');
			$where['user_phone']=cookie('user_phone');
			$data['user_realname']=I('user_realname');
			$data['user_address']=I('user_address');
			$data['school_area_id']=I('school_area_id');
			$data['school_area_detail_id']=I('school_area_detail_id');
			$data['user_regtime']=time();
			$res = $user->where($where)->save($data);
			if($res>0){
				$this->success('修改成功',U('User/Index/index'),3);
			}else{
				$this->error('修改失败');
			}
		}else{
			$schoolArea=M('school_area');
			$schoolAreaDetail=M('school_area_detail');
			$user=M('User');
			$where['user_phone']=cookie('user_phone');
			$res = $user->where($where)->find();
			$userinfo['user_realname'] = $res['user_realname'];
			$userinfo['user_address'] = $res['user_address'];
			$schoolAreaList = $schoolArea ->where('status=1')-> select();
			$schoolAreaDetailList = $schoolAreaDetail ->where('status=1')-> select();
			$this -> assign('schoolAreaList',$schoolAreaList);
			$this -> assign('schoolAreaDetailList',$schoolAreaDetailList);
			$this->assign('userinfo',$res);
			$this->display();
		}
	}
	public function change_password(){
		if(empty($_POST)){
			$this->display();
			return ;
		}
		$user_phone = cookie('user_phone');
		if($user_phone=="" && $user_phone==NULL){
			$this ->error('请登录',U('Login/login'));
			return ;
		}
		
		$old_password = I('old_password');
		$new_password = I('new_password');
		$repassword = I('repassword');

		$user = M('user');
		$where['user_phone'] = $user_phone;
		$userdata = $user ->where($where) -> select();
		$table_password = $userdata[0]['user_password'];
		if(md5($old_password)==$table_password){
			if($new_password==$repassword){
				$data['user_password'] = md5($new_password);
				$user -> where($where)-> save($data);
				$_SESSION['user_phone']=NULL;
				$this->success('修改密码成功',U(Login/login),2);
			}
			else{
				$this -> error("新密码两次输入不同");
			}
		}
		else{
			$this -> error("旧密码输入错误");
		}
	}
}