<?php 
	
	//后台登陆控制器
	Class LoginAction extends Action{

		//后台登陆视图
		public function index(){
			

			//var_dump(C('SESSION_AUTO_START'));

			$this->display();
		}

		public function login(){
			if (!IS_POST) halt('页面不存在');
			if (I('code','','md5') != session('verify')) {
				$this->error('验证码错误');
			}
			$username = I('username');
			$pwd = I('password', '','md5');

			$user = M('user')->where(array('username' => $username))->find();
			if (!$user || $user['password'] != $pwd) {
				$this->error('账号或密码错误');
			}

			if ($user['lock']) $this->error('用户被锁定');

			$data = array(
				'id' => $user['id'],
				'logintime' => time(),
				'loginip' => get_client_ip(),
				);
			M('user')->save($data);

			session(C('USER_AUTH_KEY'), $user['id']);
			session('username', $user['username']);
			session('logintime', date('Y-m-d H:i:s', $user['logintime']));
			session('loginip', $user['loginip']);

			//超级管理员识别
			if ($user['username'] == C('RBAC_SUPERADMIN')) {
				session(C('ADMIN_AUTH_KEY'), true);
			}
			//读取用户权限
			import('ORG.Util.RBAC');
			RBAC::saveAccessList();

			// select node.id,node.name from

			// 	hd_role as role,
			// 	hd_role_user as user,
			// 	hd_access as access ,
			// 	hd_node as node 

			// 	where   user.user_id='2' and 
			// 			user.role_id=role.id and 
			// 			( access.role_id=role.id or (access.role_id=role.pid and role.pid!=0 ) ) and 
			// 			role.status=1 and 
			// 			access.node_id=node.id and 
			// 			node.level=2 and 
			// 			node.pid=1 and 
			// 			node.status=1 

			// die;

			$this->redirect('Admin/Index/index');
		} 
		//验证码
		public function verify (){
			import('ORG.Util.Image');
			Image::buildImageVerify(4, 1, 'png');
		}       
 
	}
 ?>