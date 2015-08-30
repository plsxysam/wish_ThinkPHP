<?php 
	
	//后台登陆控制器
	Class LoginAction extends Action{

		//后台登陆视图
		public function index(){
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
				'loginip' => get_clien_ip,
				);
			
			session('uid', $user['id']);
			session('username', $user['username']);
			session('logintime', date('Y-m-d H:i:s', $user['logintime']));
			session('loginip', $user['loginip']);
			
			M('user')->save($data);
			$this->redirect('Admin/Index/index');
		} 
		//验证码
		public function verify (){
			import('ORG.Util.Image');
			Image::buildImageVerify(4, 1, 'png');
		}       
 
	}
 ?>