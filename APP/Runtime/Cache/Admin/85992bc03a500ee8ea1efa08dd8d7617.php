<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>login</title>
	
	<!-- <link rel="stylesheet" type="text/css" href=""> -->
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrapValidator.min.css"/>
	 
	<script type="text/javascript" src="__PUBLIC__/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
	 
	<script type="text/javascript" src="__PUBLIC__/js/bootstrapValidator.js"></script>

	<script type="text/javascript">	var verifyURL='<?php echo U("Admin/Login/verify",'','');?>';</script>
	<script type="text/javascript" src="__PUBLIC__/js/login.js"></script>

	
	<style type="text/css">
		body{
            padding-top: 50px;
            padding-bottom: 40px;
            background-color:  #ccc;
        }
        nav{
            padding-right:6px;
            padding-left:6px;
            margin: 0 auto;
        }
		.form-signin{
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class = "navbar-brand">Freescale</a>
          <!-- <a class="navbar-brand" href="#">首页</a>
          <a class="navbar-brand" href="#">测试</a>
          <a class="navbar-brand" href="#">开发</a> -->
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <div class = "navbar-right">
                <ul class="nav navbar-nav">
                        <li><a href="#">首页</a> </li>
                        <li><a href="#">测试</a> </li>
                        <li><a href="#">开发</a> </li>
                        <li><a href="#">help</a> </li>
                </ul>

              <form class="navbar-form navbar-right" role="form">
                <div class="form-group">
                  <input type="text" placeholder="Name" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
                <a class="btn btn-success" href="<?php echo U('Admin/Index/logout');?>">logout</a>
                
              </form>
            </div>
            
        </div><!--/.navbar-collapse -->

      </div>
    </nav>

	<div class="container">
		<div class = "row">
			<section>
				<div class="col-lg-8 col-lg-offset-2">
					<div class="page-header">
                        <h2>请输入登录信息</h2>
                    </div>
				</div>

				<form id="defaultForm" method="post" class="form-horizontal" action="<?php echo U('Admin/Login/login');?>">
					<div class="form-group">
						<label class="col-lg-3 control-label">Username</label>
						<div class="col-lg-5">
                            <input id = "username" type = "text" name = "username" class = "form-control" placeholder ="用户名" >
                        </div>
					</div>
					<div class="form-group">
                            <label class="col-lg-3 control-label">Password</label>
                            <div class="col-lg-5">
                                <input type ="password" name = "password" class = "form-control" placeholder="密码" >
                            </div>
                    </div>
                    <div class="form-group">
                    	<label class="col-lg-3 control-label">code</label>
                    	<div class="col-lg-5">
                            <input type = "code" name="code" class ="form-control" placeholder="请输入验证码">
                            <img id="code" src="<?php echo U('Admin/Login/verify');?>">
						<a href="javascript:void(change_code(this));">看不清</a>
                        </div>
					</div>
					<div class="form-group col-lg-9 col-lg-offset-3">
						<label class = "checkbox">
							<input type = "checkbox" value = "remember-me">记住登录
						</label>
					</div>
					<div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <button type="submit" class="btn btn-primary" name="signup" value="Sign up">登录</button>
                            <button type="button" class="btn btn-info" id="validateBtn">Manual validate</button>
                            <button type="button" class="btn btn-info" id="resetBtn">Reset form</button>
                        </div>
                    </div>
				</form>
			</section>
		</div>
	</div>
</body>
	<script type="text/javascript">

	$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                    // ,
                    // different: {
                    //     field: 'password',
                    //     message: 'The username and password cannot be the same as each other'
                    // }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }
                    // ,
                    // different: {
                    //     field: 'username',
                    //     message: 'The password cannot be the same as username'
                    // }
                }
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
	</script>
</html>