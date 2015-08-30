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
		$field = array('id', 'name', 'title', 'pid');
		$node = M('node')->field($field)->order('sort')->select();
		$this->node = node_merge($node);
		$this->display();
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
			$this->error('添加失败');//, U('Admin/Rbac/addRole')
		}
	}

	//添加节点
	public function addNode(){
		$this->pid = I('pid', 0, 'intval');
		$this->level = I('level', 1, 'intval');

		switch($this->level){
			case 1 :
				$this->type = '应用';
				break;
			case 2 :
				$this->type = '控制器';
				break;
			case 3 :
				$this->type = '动作方法';
				break;
		}

		$this->display();
	}

	//添加节点表单处理
	public function addNodeHandle(){
		if(M('node')->add($_POST)){
			$this->success('添加成功',U('Admin/Rbac/node'));
		} else {
			$this->error('添加失败');//, U('Admin/Rbac/addNode')
		}
	}

	//配置权限
	public function access() {
		$rid = I('rid', 0,'intval');

		$node = M('node')->order('sort')->select();
		$this->node = node_merge($node);
		$this->rid = $rid;
		$this->display();
	}

	//修改权限
	public function setAccess(){
		$db = M('access');
		$rid = I('rid', 0, 'intval');

		//清空原权限
		$db->where(array('role_id' => $rid))->delete();
		$data = array();
		//生成新权限
		foreach ($_POST['access'] as $v ) {
			$tmp = explode('_', $v);
			$data[] = array(
				'role_id' => $rid,
				'node_id' => $tmp[0],
				'level' => $tmp[1]
				);
		}

		//插入新权限
		if($db->addAll($data)){
			$this->success('修改成功',U('Admin/Rbac/role'));
		} else {
			$this->error('修改失败');
		}



	}

}
 ?>