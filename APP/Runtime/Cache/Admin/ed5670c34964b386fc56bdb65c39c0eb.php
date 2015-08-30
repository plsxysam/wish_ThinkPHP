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
        .col-lg-4,.col-lg-2,.col-lg-8{height:55px;
        background:#099;
        border-right: 1px solid #cccccc;
        color: #ffffff;
        text-align: center;
        line-height: 55px;
        }
    </style>
</head>
<body>
	<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
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
    	<table>
    		<div class = "row">
    			<div class="col-lg-2">ID</div>
    			<div class="col-lg-2">角色名称</div>
    			<div class="col-lg-4">角色描述</div>
    			<div class="col-lg-2">角色开启状态</div>
    			<div class="col-lg-2">操作</div>
    		</div>
    		<?php if(is_array($role)): foreach($role as $key=>$v): ?><div class = "row">
	    			<div class="col-lg-2"><?php echo ($v["id"]); ?></div>
	    			<div class="col-lg-2"><?php echo ($v["name"]); ?></div>
	    			<div class="col-lg-4"><?php echo ($v["remark"]); ?></div>
	    			<div class="col-lg-2">
                        <?php if($v["status"]): ?>开启<?php else: ?>关闭<?php endif; ?>
                    </div>
	    			<div class="col-lg-2"><a href="<?php echo U('Admin/Rbac/access', array('rid' => $v["id"]));?>">配置权限</a></div>
	    		</div><?php endforeach; endif; ?>
    		<div class = "row">
    			<div class="col-lg-4 col-lg-offset-4"><?php echo ($page); ?></div>
    		</div>
    	</table>

    </div>

</body>
</html>