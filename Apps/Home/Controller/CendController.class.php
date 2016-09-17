<?php
namespace Home\Controller;
use Think\Controller;

class CendController extends Controller{
	//主界面，提供进入不同服务的接口
	public function index(){
		$this->display();
	}

	public function lover_desc(){
		$type="lover_cend";
		$where['news_title'] = $type;
		$where['news_deleted'] = 0;
		$info = M("News")->where($where)->find();
		$this->assign("info",$info);
		$this->display();
	}

	public function group_desc(){
		$type="group_cend";
		$where['news_title'] = $type;
		$where['news_deleted'] = 0;
		$info = M("News")->where($where)->find();
		$this->assign("info",$info);
		$this->display();
	}

	public function direct_desc(){
		$type="direct_cend";
		$where['news_title'] = $type;
		$where['news_deleted'] = 0;
		$info = M("News")->where($where)->find();
		$this->assign("info",$info);
		$this->display();
	}
	//为用户寄快递
	public function cend_express(){
		$today=date("Y-m-d",time());
		$nextday=date("Y-m-d",strtotime($today)+24*60*60);
		$afterday=date("Y-m-d",strtotime($nextday)+24*60*60);
		$this->assign('today',$today);
		$this->assign('nextday',$nextday);
		$this->assign('afterday',$afterday);
		$this->display();
	}
	//快递信息提交
	public function docend(){
		$user_phone = cookie('user_phone');
		if($user_phone){
			$cend = D('Cend');
			$user = D('User');
			$user_id = $user->getID($user_phone);
			$res=$cend->add_sheet($user_id,I('post.'));
			if($res){
				$this -> success('提交成功',U('Cend/cend_success'),2);
			}
			else{
				$this -> error('发送失败');
			}
		}
		else{
			$this -> error('请登录',U('/User/Login/login'));
		}
	}
	//申请组团
	public function apply_group(){
		if(empty($_POST)){
			$this -> display();
			exit();
		}
		$user_phone = cookie('user_phone');
		if($user_phone){
			$glist = D('Glist');
			$user = D('User');
			$user_id = $user->getID($user_phone);
			$res=$glist->add_apply($user_id,I('post.'));
			if($res){
				$this -> success('提交成功',U('/Home/Cend/apply_success/gid/'.$res),2);
			}else{
				$this -> error('发送失败');
			}
		}else{
			$this -> error('请登录',U('/User/Login/login'));
		}
	}
	public function apply_success(){
		$gid = I('get.gid');
		$this->assign('gid',$gid);
		$path = "Apps/Public/images/group_cend/";
        $fileName = $path.$gid.'.png';
		if(!is_file($fileName)){
			Vendor('phpqrcode.phpqrcode');
			$str="http://".$_SERVER['HTTP_HOST']."/Home/Cend/group_cend/gid/".$gid;
	        $level = 'L';
	        $size = 5;
	        \QRcode::png($str, $fileName, $level, $size);
    	}
		$this->display();
	}
	//组团代寄
	public function group_cend(){
		$today=date("Y-m-d",time());
		$nextday=date("Y-m-d",strtotime($today)+24*60*60);
		$afterday=date("Y-m-d",strtotime($nextday)+24*60*60);
		$this->assign('today',$today);
		$this->assign('nextday',$nextday);
		$this->assign('afterday',$afterday);
		$gid = I('get.gid');
		$this->assign('gid',$gid);
		$glist = D('Glist');
		$phone = $glist -> getphone($gid);
		$this->assign('phone',$phone);
		$this -> display();
	}
	//处理组团代寄
	public function group_docend(){
		$gcend = D('Gcend');
		$res = $gcend->add_sheet(I('post.'));
		if($res){
			$glist = D('Glist');
			$gid = I('post.gid');
			$where = array ('glist_id' => I('post.gid'));
			$data=array();
			$data['glist_gids'] = $glist->getgids($gid) . "|{$res}";
			$res1 = $glist->where($where)->save($data);
			if($res1){
				$this -> success('提交成功',U('Cend/cend_success'),2);
			}else{
				$this -> error('发送失败');
			}
		}else{
			$this -> error('人数已满');
		}
	}
	//情侣代寄
	public function lover_cend(){
		$today=date("Y-m-d",time());
		$nextday=date("Y-m-d",strtotime($today)+24*60*60);
		$afterday=date("Y-m-d",strtotime($nextday)+24*60*60);
		$this->assign('today',$today);
		$this->assign('nextday',$nextday);
		$this->assign('afterday',$afterday);
		$this -> display();
	}
	public function lover_docend(){
		$user_phone = cookie('user_phone');
		if($user_phone){
			$lcend = D('Lcend');
			$user = D('User');
			$user_id = $user->getID($user_phone);
			$res=$lcend->add_sheet($user_id,I('post.'));
			if($res){
				$this -> success('提交成功',U('Cend/cend_success'),2);
			}
			else{
				$this -> error('发送失败');
			}
		}else{
			$this -> error('请登录',U('/User/Login/login'));
		}
	}
}
