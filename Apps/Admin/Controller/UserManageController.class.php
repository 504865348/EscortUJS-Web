<?php
namespace Admin\Controller;
use Think\Controller;
class UserManageController extends CommonController{
	public function userlist(){
		$user = M("User");
		//分页
		$count = $user->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,30);// 实例化分页类
		$show   = $Page->show();
		$usershow = $user ->order('user_id desc')
						  -> limit($Page->firstRow.','.$Page->listRows)
						  -> select();
		$this->assign('page',$show);
		$this->assign('user',$usershow);
		$this->display();
	}
	
	public function useredit(){
		$message=$_GET['uid'];
		if(!$message){
			$this->error('请选中用户操作',U('Admin/Index/index'));
		}
		$user = M('user');
		$userinfo=$user->where("user_id=%d",$message)->find();
		if($userinfo['status']==0){
			$userdata['status']=1;
			$user->where("user_id=%d",$message)->save($userdata);
			$this->success('用户账号已解封',U('Admin/UserManage/userlist'),2);
		}else{
			$userdata['status']=0;
			$user->where("user_id=%d",$message)->save($userdata);
			$this->success('用户账号已查封',U('Admin/UserManage/userlist'),2);
		}
	}
}