<?php 

Class IndexAction extends Action {

	public function index()
	{
		$this -> display();

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

		//replace_phiz($data['content']);

		if($id = M('wish')->data($data)->add()){
			$data['id'] = $id;
			$data['content'] = replace_phiz($data['content']);
			$data['time'] = date('y-m-d H:i', $data['time']);
			$data['status'] = 1;
			$this->ajaxReturn($data, 'json');

		} else{
			$this->ajaxReturn(array('status' => 0), 'json');
			//echo json_encode(array('status' => 0));73929 
		}
		


		// $phiz = array(
		// 	'zhuangkuang' => '抓狂',
		// 	'baobao' => '宝宝',
		// 	'haixiu' => '害羞',
		// 	'ku' => '酷',
		// 	'xixi' => '嘻嘻',
		// 	'taikaixin' => '太开心',
		// 	'touxiao' =>'偷笑',
		// 	'qian' => '钱',
		// 	'huaxin' => '花心',
		// 	'jiyan' => '挤眼'

		// 	);

		//F方法保存读取数组，临时在本地
		// F('phiz', $phiz, './Data/');
		// $phiz = F('phiz', '', './Data/');

		//传统保存文件方法
		/*$phiz = include './data/phiz.php';
		/ $str = "<?php return ". var_export($phiz,true).'; ?>';
		// file_put_contents('./data/phiz.php', $str);
		/ p($data);*/
	}
}
 ?>