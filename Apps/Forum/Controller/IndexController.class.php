<?php
namespace Forum\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
    	$post = M('Post');
    	$where['post_deleted']=0;
    	$count = $post->where($where)->count();
    	$postids = $post->where($where)->getField('post_id',true);
    	dump($postids);
    	exit();
		$Page = new \Think\Page($count,30);
		$show   = $Page->show();
		$this -> assign('where',$where);
		$this -> assign('postids',$postids);
		$this->assign('page',$show);
		$this->display();
    }
}