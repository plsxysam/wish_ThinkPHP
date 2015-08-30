<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>login</title>
	
	<!-- <link rel="stylesheet" type="text/css" href="__PUBLIC__/js/jquery-1.7.2.min.js"> -->
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/libs/css/bootstrap.min.css"> 

	<style type="text/css">
		body{
			padding-top: 40px;
			padding-bottom: 40px;
			background-color:  #ccc;
		}
		.form-signin{
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}
	</style>
</head>
<body>

	<div class="container">
		<form class = "form-signin" action="__PUBLIC__/login.php" role="form">
			<h2>请输入登录信息</h2>
			<input id = "username" type = "input" name = "username" value = "" class = "form-control" placeholder ="用户名" required autoforus>
			<input id = "password" type ="password" name = "password" value = "" class = "form-control" placeholder="密码" required>

			<label class = "checkbox">
				<input type = "checkbox" value = "remember-me">记住登录
			</label>
			
			<input class = "glyphicon glyphicon-oj-sign btn btn-lg btn-primary btn-block" type = "submit" value = "登录">
		</form>
	</div>
</body>
	<!--[if lt IE 9]>
	引入js
	<![endif]-->
</html>