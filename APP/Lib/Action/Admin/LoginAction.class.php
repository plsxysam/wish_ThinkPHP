<?php 
	
	//后台登陆控制器
	Class LoginAction extends Action{

		//后台登陆视图
		public function index(){
			$this->display();
		}

		public function verify (){
			import('ORG.Util.Image');
			Image::buildImageVerify(4, 5, 'png');
		}          
	}
 ?>