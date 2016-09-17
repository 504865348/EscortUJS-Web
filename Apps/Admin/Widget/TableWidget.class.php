<?php
	//命名空间，位于Admin/Widget目录下
	namespace Admin\Widget;
	//引入父类
	use Think\Controller;
	class TableWidget extends Controller{
		//订单表格
		public function order($orderlist){
			//$data=1;
			//dump($orderlist);
			$this->assign('orderlist',$orderlist);
			$this->display('Widget:order');
		}
	}
?>