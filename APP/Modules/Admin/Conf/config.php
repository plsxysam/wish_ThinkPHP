<?php 

	return array(

		//配置超级管理员用户名称 RBAC_ROLE_TABLE
		'RBAC_SUPERADMIN' => 'admin',
		'ADMIN_AUTH_KEY' => 'superadmin',	//超级管理员识别
		'USER_AUTH_ON' => true,				//是否开启验证
		'USER_AUTH_TYPE' => 1,				//验证类型(1.登录验证，2.时时验证)
		'USER_AUTH_KEY' => 'uid',			//用户认证识别号
		'NOT_AUTH_MODULE' => 'Index',			//无需认证的控制器，模块
		'NOT_AUTH_ACTION' => 'logout,addUserHandle',			//无需认证的方法
		'RBAC_ROLE_TABLE' => 'hd_role',		//角色表名称
		'RBAC_USER_TABLE' => 'hd_role_user',//角色与用户的中间表名称
		'RBAC_ACCESS_TABLE' => 'hd_access',	//权限表名称
		'RBAC_NODE_TABLE' => 'hd_node',		//节点表名称


		//public 目录设置到模板下
		 'TMPL_PARSE_STRING' => array(
		 				  
		 	'__PUBLIC__'=> __ROOT__ . '/' . APP_NAME . '/Modules/' . GROUP_NAME . '/Tpl/Public',
		 	),
		 'URL_HTML_SUFFIX' =>'',
		);
 ?>