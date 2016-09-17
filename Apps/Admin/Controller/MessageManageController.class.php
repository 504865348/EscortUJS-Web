<?php
namespace Admin\Controller;
use Think\Controller;
class MessageManageController extends CommonController{
	public function messagelist(){
		$message=M('message');
		$messagelist=$message
			->join('exp_user on exp_message.user_id=exp_user.user_id')
			->select();
		$this->assign('messagelist',$messagelist);
		$this->display();
	}
}