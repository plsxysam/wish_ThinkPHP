<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>index</title>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrapValidator.min.css"/>
	 
	<script type="text/javascript" src="__PUBLIC__/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
	 
	<script type="text/javascript" src="__PUBLIC__/js/bootstrapValidator.js"></script>

	<script type="text/javascript">	var verifyURL='<?php echo U("Admin/Login/verify",'','');?>';</script>
	<script type="text/javascript" src="__PUBLIC__/js/login.js"></script>
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
        <a href="<?php echo U('Admin/Index/logout');?>">logout</a>
		<form id="defaultForm" method="post" class="form-horizontal" action="">
		    <div class="form-group">
		        <label>Username</label>
		        <input type="text" class="form-control" name="username" placeholder="username"/>
		    </div>
		    <div class="form-group">
		        <label>password</label>
		        <input type="password" class="form-control" name="password" placeholder="password"/>
		    </div>
		    <div class="form-group">
		        <label>confirmPassword</label>
		        <input type="password" class="form-control" name="confirmPassword" placeholder="confirmPassword"/>
		    </div>
		    <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Sign up</button>
                                <button type="submit" class="btn btn-primary" name="signup2" value="Sign up 2">Sign up 2</button>
                                <button type="button" class="btn btn-info" id="validateBtn">Manual validate</button>
                                <button type="button" class="btn btn-info" id="resetBtn">Reset form</button>
                                <button type="button" class="btn btn-info" id="resetBtn"></button>
                            </div>
                        </div>
		</form>	
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
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    },
                    remote: {
                        url: 'remote.php',
                        message: 'The username is not available'
                    },
                    different: {
                        field: 'password',
                        message: 'The username and password cannot be the same as each other'
                    }
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
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
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