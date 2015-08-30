<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
            background:url("https://ss2.bdstatic.com/lfoZeXSm1A5BphGlnYG/skin/125.jpg?2");
            /*定位背景图像*/
            background-position:center 0;
            background-repeat:no-repeat;
            background-attachment:fixed;
            /*规定背景图像的尺寸,cover把背景图像扩展至足够大，以使背景图像完全覆盖背景区域。*/
            background-size:cover;
            -webkit-background-size:cover;
            -o-background-size:cover;
        }
	</style>
</head>
<body>

    <div class="container content">     
        <div class="row" style="margin-top:80px;">
            
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                
                <form class="reg-page form-horizontal"  id="defaultForm" method="post"action="<?php echo U('Admin/Login/login');?>">
                    <div class="reg-header">            
                        <h2>登录系统</h2><!--  -->
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-1 margin-bottom-20">
                            <input id = "username" type = "text" name = "username" class = "form-control" placeholder ="用户名" >
                        </div>
                    </div>                   
                    <div class="form-group">
                        <div class=" col-lg-10 col-lg-offset-1 margin-bottom-20">
                            <input type ="password" name = "password" class = "form-control" placeholder="密码" ></div>
                        
                    </div>                    

                    <div class="row">
                        <div class="col-md-7 checkbox">
                            <label style="color: #000;margin-left:40px;"><input type="checkbox" >remember me</label>                        
                        </div>
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-success" style="width:80px;">Login</button>                    
                        </div>
                    </div>
                </form>

            </div>
        </div><!--/row-->
    </div><!--/container-->   

<style type="text/css">
.reg-page {
    color: #000;
    padding: 30px; 
    background:url("__PUBLIC__/pic/FFFFFFF.png");
    box-shadow: 0 0 3px #eee;
}

/*Reg Header*/
.reg-header {
    color: #000;
    text-align: center;
    margin-bottom: 35px;
    border-bottom: solid 1px #eee;
}

.reg-header h2 {
    font-size: 24px;
    margin-bottom: 15px;
}

/*Reg Forms*/
.reg-page label {
    color: #777;
}
.margin-bottom-20 {
    margin-bottom: 20px;
}
</style>




      
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

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
	</script>
</html>