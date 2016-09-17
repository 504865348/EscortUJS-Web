<?php 
namespace Admin\Controller;
use Think\Controller;
class BaseParameterController extends CommonController{

	//查询快递公司
	public function expCompany(){
		$expCompany=M('expcompany');
		$datalist=$expCompany->select();
		$this->assign('datalist',$datalist);
		$this->display();
	}
	
	//添加页面跳转
	public function expCompanyAdd(){
		$this->display();
	}
	
	//执行添加信息
	public function doAdd(){
		if(empty($_POST['expCompany_name'])){
			$this ->error('参数不能为空');
		}
		$expCompany=M('expcompany');
		//添加操作
		$datainfo['expcompany_name']=$_POST['expCompany_name'];
		$datainfo['register_time']=time();
		$msg=$expCompany->add($datainfo);
		if(!$msg){
			$this->error('添加失败');
		}
		$this->success('添加成功',U('Admin/BaseParameter/expCompany'));
	}
	
	//更改快递公司状态
	public function expCompanyDel(){
		if(empty($_GET['sid'])){
			$this ->error('参数不能为空');
			exit();
		}
		$expCompany=M('expcompany');
		$where['expcompany_id']=$_GET['sid'];
		$info=$expCompany->where($where)->find();
		if($info[status]==0){
			$datainfo['status']=1;
		}else{
			$datainfo['status']=0;
		}
		$msg=$expCompany->where($where)->save($datainfo);
		if(!$msg){
			$this->error('更改失败');
			exit();
		}
		$this->success('更改成功',U('Admin/BaseParameter/expCompany'));	
	}
	
	//更改快递公司信息
	public function expCompanyUpdate(){
		$expcompany=M('expcompany');
		$where['expcompany_id']=$_GET['eid'];
		$datainfo=$expcompany->where($where)->find();
		$this->assign('datainfo',$datainfo);
		$this->display();
	}
	
	//执行快递公司修改操作
	public function doExpCompanyUpdate(){
		if(empty($_POST['expcompany_name'])){
			$this->error('传入参数不能为空');
			exit();
		}
		$expcompany=M('expcompany');
		$where['expcompany_id']=$_POST['expcompany_id'];
		$data['expcompany_name']=$_POST['expcompany_name'];
		$msg=$expcompany->where($where)->save($data);
		if($msg){
			$this->error('提交失败');
			exit();
		}
		$this->success('提交成功',U('Admin/BaseParameter/serverlist'));
	
	}
	
	//快递服务列表
	public function serverlist(){
		$server=M('server');
		$datalist=$server->select();
		$this->assign('datalist',$datalist);
		$this->display();
	}
	//服务修改页展示
	public function serverUpdate(){
		$server=M('server');
		$where['server_id']=$_GET['sid'];
		$datainfo=$server->where($where)->find();
		$this->assign('datainfo',$datainfo);
		$this->display();
	}
	//服务修改页执行
	public function doUpdate(){
		if(empty($_POST['server_content'])){
			$this->error('传入参数不能为空');
		}
		$server=M('server');
		$where['server_id']=$_POST['server_id'];
		$data['server_content']=$_POST['server_content'];
		$data['server_text']=$_POST['server_text'];
		$msg=$server->where($where)->save($data);
		if(!$msg){
			$this->error('提交失败');
		}
		$this->success('提交成功',U('Admin/BaseParameter/serverlist'));
	}
	
	
	//添加服务展示页
	public function serverAdd(){
		$this->display();
	}
	
	//服务添加执行
	public function doServerAdd(){
		if(empty($_POST['server_content'])){
			$this->error('传入参数不能为空');
		}
		$server=M('server');
		$data['server_content']=$_POST['server_content'];
		$data['server_text']=$_POST['server_text'];
		$data['time']=time();
		$msg=$server->add($data);
		if($msg){
			$this->error('提交失败');
		}
		$this->success('添加成功',U('Admin/BaseParameter/serverlist'));
	}
	
	//更改快递服务状态
	public function serverStatus(){
		$account=$_SESSION['account'];
		$this->assign('account',$account);
		if(empty($_GET['sid'])){
			$this ->error('参数不能为空');
			exit();
		}
		$server=M('server');
		$where['server_id']=$_GET['sid'];
		//修改操作
		//$info表示查询出来的一条信息，$list表示查询出来的一列信息
		$info=$server->where($where)->find();
		if($info[status]==0){
			$datainfo['status']=1;
		}else{
			$datainfo['status']=0;
		}
		$msg=$server->where($where)->save($datainfo);
		if(!$msg){
			$this->error('修改失败');
			exit();
		}				
		$this->success('修改成功',U('Admin/BaseParameter/serverlist'));	
	}
	
	
/***************************************小区域地址配置**********************/
	//添加校区域地址；函数用于展示添加页面
	public function schoolAreaAdd(){
		$this->display();
	}

	//执行小区域添加
	public function doSchoolAreaAdd(){
		if(empty($_POST['school_area_name'])){
			$this->error('传入参数不能为空');
			exit();
		}
		$schoolArea=M('school_area');
		$data['school_area_name']=$_POST['school_area_name'];
		$data['register_time']=time();
		$msg=$schoolArea->add($data);
		if(!$msg){
			$this->error('提交失败');
			exit();
		}
		$this->success('添加成功',U('Admin/BaseParameter/addressConfigAdd'));
	}
	
	//查询所有地址信息
	public function addressConfig(){
		$schoolArea=M('school_area');
		$schoolAreaDetail=M('school_area_detail');
		$datalist=$schoolAreaDetail
		->field('exp_school_area_detail.school_area_detail_id,exp_school_area_detail.school_area_detail_name,exp_school_area_detail.status,exp_school_area.school_area_id,exp_school_area.school_area_name')
		-> join('exp_school_area on exp_school_area_detail.school_area_id=exp_school_area.school_area_id')
		->select();
		//如果查询出来有相同的字段怎么办,傻逼field
		//var_dump($datalist);
		$this->assign('datalist',$datalist);
		$this->display();
	}
	
	//展示添加地址页面
	public function addressConfigAdd(){
		$schoolArea=M('school_area');
		$schoolAreaDetail=M('school_area_detail');
		$datalist=$schoolArea->select();
		$this->assign('datalist',$datalist);
		$this->display();
	}

	//执行地址配置添加
	public function doAddressConfigAdd(){
		if(empty($_POST['school_area_id'])){
			$this->error('传入参数不能为空');
		}
		$schoolAreaDetail=M('school_area_detail');
		$data['school_area_id']=$_POST['school_area_id'];
		$data['school_area_detail_name']=$_POST['school_area_detail_name'];
		$data['register_time']=time();
		$msg=$schoolAreaDetail->add($data);
		if($msg){
			$this->error('提交失败');
			exit();
		}
		$this->success('添加成功',U('Admin/BaseParameter/addressConfig'));
	}
	
	public function doAddressConfigUpdate(){
		if(!empty($_POST['school_area_id'])){
			$this->error('传入参数不能为空');
		}
		$schoolAreaDetail=M('school_area_detail');
		$data['school_area_id']=$_POST['school_area_id'];
		$data['school_area_detail_name']=$_POST['school_area_detail_name'];
		$where['school_area_detail_id']=$_POST['school_area_detail_id'];
		$msg=$schoolAreaDetail->where($where)->save($data);
		if(!$msg){
			$this->error('提交失败');
		}
		$this->success('添加成功',U('Admin/BaseParameter/addressConfig'));	
	}
	
	//更改学校区域地址状态
	public function schoolAreaDetailUpdate(){
		if(empty($_GET['uid'])){
			$this ->error('参数不能为空');
		}
		$schoolAreaDetail=M('school_area_detail');
		$schoolArea=M('school_area');
		$datalist=$schoolArea->select();
		$this->assign('datalist',$datalist);
		$where['school_area_detail_id']=$_GET['uid'];
		$info=$schoolAreaDetail->where($where)->find();
		$this->assign('info',$info);
		$this->display();	
	}
	
	//更改学校区域地址状态
	public function schoolAreaDetailStatus(){
		if(empty($_GET['sid'])){
			$this ->error('参数不能为空');
		}
		$schoolAreaDetail=M('school_area_detail');
		$where['school_area_detail_id']=$_GET['sid'];
		$info=$schoolAreaDetail->where($where)->find();
		$datainfo["status"] = $info["status"]?0:1;
		$msg=$schoolAreaDetail->where($where)->save($datainfo);
		if(!$msg){
			$this->error('更改失败');
		}
		$this->success('更改成功',U('Admin/BaseParameter/addressConfig'));	
	}		
}