<?php 

	return array(

		//配置超级管理员用户名称
		'RBAC_SUPPERADMIN' => 'admin',


		//public 目录设置到模板下
		 'TMPL_PARSE_STRING' => array(
		 				  
		 	'__PUBLIC__'=> __ROOT__ . '/' . APP_NAME . '/Modules/' . GROUP_NAME . '/Tpl/Public',
		 	),
		 'URL_HTML_SUFFIX' =>'',
		);
 ?>