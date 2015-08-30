<?php 

Class IndexAction extends Action {

	public function index()
	{
		$this -> display();

	}

	//异步发布处理
	public function handle(){
		if(!IS_POST) halt('页面不存在');

		//IF(IS_POST)
		//$this->isAjax();
		//var_dump(IS_POST);


	}
}
 ?>