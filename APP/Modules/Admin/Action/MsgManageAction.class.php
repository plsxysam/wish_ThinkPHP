<?php 
	
Class MsgManageAction extends CommonAction{

	public function index(){
		import('ORG.Util.Page');

		//select count(*) from hd_wish;
		$count = M('wish')->count();
		$page = new Page($count, 5);
		$limit = $page->firstRow.','. $page->listRows;


		$wish = M('wish')->order('time DESC')->limit($limit)->select();
		$this->wish = $wish;
		$this->page = $page->show();
		$this->display();
	}

	public function delete(){
		$id = I('id','','intval');

		// M('wish')->where(array('id'=>$id))->delete();
		if(M('wish')->delete($id)){
			$this->success('删除成功', U('Admin/MsgManage/index'));
		} else {
			$this->error('删除失败');
		}
	}
}
 ?>