<?php 

class RbacAction extends CommonAction{

	//用户列表
	public function index(){

	}

	//角色列表
	public function role(){
		$this->role = M('role')->select();
		$this->display();
	}

	//节点列表
	public function node(){

	}

	//添加用户
	public function addUser(){

	}

	//添加角色
	public function addRole(){
		$this->display();
	}

	//添加角色表单处理
	public function addRoleHandle(){
		if(M('role')->add($_POST)){
			$this->success('添加成功',U('Admin/Rbac/role'));
		} else {
			$this->error('添加失败', U('Admin/Rbac/addRole'));
		}
	}

	//添加节点
	public function addNode(){
		
	}
}
 ?>