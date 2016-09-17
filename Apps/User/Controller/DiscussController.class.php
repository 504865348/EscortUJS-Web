<?php

namespace User\Controller;
use Think\Controller;

class DiscussController extends CommonController{
	/**
	 * 显示留言列表
	 */
	function index(){
		$msg = M('Msg');
		$where = array (
			'msg_level'   => 0,
			'msg_deleted' => 0
		);
		$res = $msg->where($where)
				->join("exp_user on exp_msg.msg_uid=exp_user.user_id")
				->order('msg_time desc')
				->select();
		$this->assign('msg',$res);
		$this->display();
	}

	

	/**
	 * 添加消息编辑，处理消息添加
	 */
	function add(){
		if(empty($_POST)){
			$this->display();
		}else{
			//datas to add
			$data = array (
				'news_title'   => I('news_title'),
				'news_flag'    => I('news_flag'),
				'news_content' => I('editorValue'),
				'news_deleted' => 0,
				'news_desc'    => I('news_desc'),
				'news_time'    => time()
			);
			//condition for no repeating
			$where = array (
				'news_title'   => I('news_title'),
				'news_deleted' => 0
			);

			$news = M('News');
			if(!$news->where($where)->find()){
				if(!$news->add($data)){
					$this -> error('信息添加失败');
				}else{
					$this -> success('信息添加成功',U('Admin/news/index'));
				}
			}else{
				$this -> error('有此信息');
			}
		}
	}

	/**
	 * 消息删除，象征性删除
	 */
	function delete($ajax = 0 ){
		$where = array (
			'news_title'   => $_GET['title'],
			'news_deleted' => 0
		);
		$news = M('News');
		if($news->where($where)->find()){
			$news->news_deleted = 1;
			if($news->where($where)->save()){
				if($ajax){
					$ajaxmsg = array (
						'status' => 1,
						'msg' => '消息'.I('news_title').'已删除'
					);
					echo json_encode($ajaxmsg);
				}else{
					$this -> success("消息删除成功",U('Admin/News/index'));
				}
			}else{
				if($ajax){
					$ajaxmsg = array (
						'status' => 0,
						'msg' => '消息'.I('news_title').'删除失败'
					);
					echo json_encode($ajaxmsg);
				}else{
					$this -> error("消息删除失败");
				}
			}
		}else{
			if($ajax){
				$ajaxmsg = array (
					'status' => 0,
					'msg' => '没有消息 '.I('news_title')
				);
				echo json_encode($ajaxmsg);
			}else{
				$this->error("没有此信息");
			}
		}
	} 
}