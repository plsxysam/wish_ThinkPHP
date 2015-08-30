<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
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
        /*.col-lg-4,.col-lg-2,.col-lg-8{height:55px;
        background:#099;
        border-right: 1px solid #cccccc;
        color: #ffffff;
        text-align: center;
        line-height: 55px;
        }*/
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
                        <li><a href="<?php echo U('../');?>">首页</a> </li>
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
                            <h2>添加<?php echo ($type); ?></h2>
                        </div>
                     </div>
                <form id="defaultForm" method="post" class="form-horizontal" action="<?php echo U('Admin/Rbac/addNodeHandle');?>">
                    <div class="form-group">
                        <label class="col-lg-3 control-label"><?php echo ($type); ?>名称：</label>
                        <div class="col-lg-5">
                            <input type = "text" name = "name" class = "form-control" placeholder ="角色名称" >
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-lg-3 control-label"><?php echo ($type); ?>描述：</label>
                            <div class="col-lg-5">
                                <input type ="text" name = "title" class = "form-control" placeholder="角色描述" >
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">是否开启：</label>
                        <div class="col-lg-5">
                            <input type="radio" name="status" value='1' checked='checked'/>&nbsp;开启&nbsp;
                            <input type="radio" name="status" value='0'/>&nbsp;关闭&nbsp;
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-lg-3 control-label">排序：</label>
                            <div class="col-lg-5">
                                <input type ="text" name = "sort" class ="form-control" value='1'>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <input type='hidden' name='pid' value='<?php echo ($pid); ?>'/>
                            <input type='hidden' name='level' value='<?php echo ($level); ?>'>
                            <button type="submit" class="btn btn-info">提交</button>
                        </div>
                    </div>
                </form>
            </section>
    </div>

</body>
</html>