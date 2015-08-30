<?php
// 本类由系统自动生成，仅供测试用途
// class IndexAction extends Action {
//     public function index(){
// 	$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
//     }


Class IndexAction extends Action
	{
		public function index()
		{
			$wish=M('wish')->select();
			$this->assign('wish',$wish);
			//$this->a = 1111;
			//$this->assign('a',11111)->display();
			$this->display();
		}
		public function handle ()
		{
			//var_dump(IS_POST);
			if(IS_POST)
			{
				p($_POST);
				$data = array(
					'username' => I('username','','htmlspecialchars'),
					'content' => I('content','','htmlspecialchars'),
					'time' => time()
					);
				p($data);
				
				//M('wish')->where(array('id' => array('gt',0)))->delete;

/* */
				//new Model('wish')
				if(M('wish')->data($data)->add())
				{
					$this -> success('发布成功',U('index'));
				}
				else
				{
					$this -> error('发不失败');
				}
				echo $id;
			}
			else _404('页面不存在',U('Index/index'));
			//halt('页面不存在');

			//p(I('post.'));
			//echo I('username','','htmlspecialchars');
		}


/*	Class IndexAction extends Action
	{
		public function index()
		{
			//p($_GET);die;
			//url 额外的 伪静态后缀 真假表示跳转    是否显示域名
			echo U('show',array('uid' => 1, 'username' => 'admin'),'',0,1);die;

			//{:U('')}
			//<a herf = '{:U('')}'></a>
			//<a herf = '__APP__/Index/show/uid/1'></a>				'URL_MODEL'=> 1  配置中用U方法  
			//<a herf = '__APP__?m=Index&a=show&uid=1'></a>			'URL_MODEL'=> 0  配置中用U方法
			$this->display();
		}
		public function show()
		{
			echo "llll<br>";
			echo THINK_VERSION;
			echo "<br>";
			//3.1.3中新增函数，自动从$_GET和$_POST中提取获得uid数值，
			//echo I('uid') + "<br>";
			p(I('get.'));
			//p(I('post.'));
		}
*/
	}
?>