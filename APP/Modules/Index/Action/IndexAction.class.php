<?php 

Class IndexAction extends Action {

	// 首页视图
	public function index()
	{
		$wish = M('wish')->select();
		$this -> assign('wish', $wish) -> display();
	}

	//异步发布处理
	public function handle(){
		if(!IS_POST) halt('页面不存在');
		//$username = I('username','','htmlspecialchars');
		$data = array(
			'username' => I('username'),
			'content' => I('content'),
			'time' => time()
			);

		if($id = M('wish')->data($data)->add()){
			$data['id'] = $id;
			$data['content'] = replace_phiz($data['content']);
			$data['time'] = date('y-m-d H:i', $data['time']);
			$data['status'] = 1;
			$this->ajaxReturn($data, 'json');

		} else{
			$this->ajaxReturn(array('status' => 0), 'json');
		}
		
	}
}
 ?>