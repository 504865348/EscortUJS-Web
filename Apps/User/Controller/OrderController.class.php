<?php
namespace User\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function test(){
        echo preg_match('/^[\\\w]{6,}$/','\wwwwwwwww');
        echo '\\wwwwwwwww';
    }
    public function my_order(){
		$user = D('user');
		$order = M('Order');
		$status = M('status');
		$cend = M('cend');
		$cend_status = M('cend_status');
		
		if(cookie('user_phone') == "" || cookie('user_phone') == NULL){
            $this -> error('请登录',U('Login/login'));
        }
        $userid = $user->getID(cookie('user_phone'));
        //根据登录名查询订单,两个表之间内联查询
        $where=array();
        $where['user_phone'] = cookie('user_phone');
        $where['order_deleted']=0;
        $orderlist=$order
        ->where($where)
        ->join('exp_user on exp_order.order_user_id = exp_user.user_id')
        ->join('exp_status on exp_order.order_status_id = exp_status.status_id')
        ->order('order_id desc')
        -> select();

        //直接代寄
        $this -> assign('orderlist',$orderlist);
        $where=array('user_phone'=>cookie('user_phone'));
        $where['delete']=0;
        $cendlist=$cend
        ->where($where)
        ->join('exp_user on exp_cend.user_id=exp_user.user_id')
        ->join('exp_cend_status on exp_cend.status_id=exp_cend_status.status_id')
        ->order('cend_id desc')
        ->select();
        $this->assign('cendlist',$cendlist);
        $glist = M('Glist');

        //组团代寄
        $where=array();
        $where['glist_userid'] = $userid;
        $where['glist_deleted']=0;
        $glists=$glist
        ->where($where)
        ->join('exp_user on exp_glist.glist_userid=exp_user.user_id')
        ->order('glist_id desc')
        ->select();
        $this->assign('glists',$glists);

        //情侣代寄
        $where=array();
        $where['lcend_userid'] = $userid;
        $where['lcend_delete']=0;
        $lcend = M('Lcend');
        $lcendlist=$lcend
        ->where($where)
        ->join('exp_user on exp_lcend.lcend_userid=exp_user.user_id')
        ->order('lcend_id desc')
        ->select();

        //购物
        $where=array();
        $where['shop_userid'] = $userid;
        $where['shop_deleted']=0;
        $shop = M('shop');
        $shoplist=$shop
        ->where($where)
        ->join('exp_user on exp_shop.shop_userid=exp_user.user_id')
        ->order('shop_id desc')
        ->select();

        $this->assign('shoplist',$shoplist);
        $this->display();
        
    }

    //订单删除
    public function delete(){
    	if(!isset($_GET['id'])){
    		$this->error('非法操作',U('Index/index'));
    	}
    	if(!isset($_GET['pnum'])){
    		$this->error('非法操作，请登录',U('Index/index'));
    	}
    	$order=M('Order');
    	$where['order_phone']=$_GET['pnum'];
    	$where['order_id']=$_GET['id'];
    	$res=$order->where($where)->find();
    	if(!$res){
    		$this->error('无此记录',U('Index/index'));
    	}
    	$data['order_deleted']=1;
    	$res=$order->where($where)->save($data);
    	if($res){
    		$this->success('订单删除成功',U('Order/my_order'));
    	}else{
    		$this->success('订单删除失败',U('Order/my_order'));
    	}
    }

    public function cend_delete(){
    	if(!isset($_GET['id'])){
    		$this->error('非法操作',U('Index/index'));
    	}
    	if(!isset($_GET['pnum'])){
    		$this->error('非法操作，请登录',U('Index/index'));
    	}
    	$cend=M('Cend');
    	$where['phone']=$_GET['pnum'];
    	$where['cend_id']=$_GET['id'];
    	$res=$cend->where($where)->find();
    	if(!$res){
    		$this->error('无此记录',U('Index/index'));
    	}
    	$data['delete']=1;
    	$res=$cend->where($where)->save($data);
    	if($res){
    		$this->success('订单删除成功',U('Order/my_order'));
    	}else{
    		$this->success('订单删除失败',U('Order/my_order'));
    	}
    }
}