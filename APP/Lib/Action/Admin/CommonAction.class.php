<?php
	//
	class CommonAction extends Action {
		//改类中会自动运行
		public function _initialize(){
			if(!isset($_SESSION['uid']) || !isset($_SESSION['username'])){
				$this->redirect('Admin/Login/index');
			}
		}

}
?>