<?php 
	namespace Home\Controller;
	use Think\Controller;
	class MessageController extends Controller{
		public function index(){
			$this->display();
		}
		
		//执行提交的留言信息
		public function domessage(){
			$user_phone=cookie('user_phone');
			if(!$user_phone){
				$this->error('请登录',U('User/Login/login'),2);
			}
			else{
				//先查询出用户
				$user=M('user');
				$userdata=$user->where('user_phone',$user_phone)->find();
				$messagedata['user_id']=$userdata['user_id'];
				$messagedata['content']=I('content');
				$messagedata['subtime']=time();
				if($messagedata['content']){
					$message=M('message');
					$msg=$message->add($messagedata);
					if($msg){
						$this->success('留言成功',U('User/Index/index'),2);
					}
					else{
						$this->error('提交失败,未知错误');
					}
				}
				else{
					$this->error('提交的信息为空');
				}
			}
		}//end domessage()
	}