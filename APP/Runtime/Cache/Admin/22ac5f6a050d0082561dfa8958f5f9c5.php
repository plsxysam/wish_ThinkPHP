<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrapValidator.min.css"/>
	 
	<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
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
    </style>
    <script type="text/javascript">
        $(function () {
            
            $('input[level=1]').click(function(){
                var inputs = $(this).parents('.ll').find('input');
                $(this).attr('checked') ? inputs.attr('checked', 'checked') : inputs.removeAttr('checked');
            });

            $('input[level=2]').click(function(){
                var inputs = $(this).parents('.ll2').find('input');
                $(this).attr('checked') ? inputs.attr('checked', 'checked') : inputs.removeAttr('checked');
            });

        });
    </script>
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
    			<div class="col-lg-8 col-lg-offset-2">
                    <div class="page-header">
                        <h2><a href="<?php echo U('Admin/Rbac/role');?>">返回</a></h2>
                    </div>
                </div>
    		</div>
            <form method="post" class="form-horizontal" action="<?php echo U('Admin/Rbac/setAccess');?> ">
        		<?php if(is_array($node)): foreach($node as $key=>$app): ?><div class = "ll">
            			<div class = "row">
        	    			<div class="col-lg-4 col-lg-offset-2"><?php echo ($app["title"]); ?><input type="checkbox" name='access[]' level='1' value='<?php echo ($app["id"]); ?>_1' <?php if($app["access"]): ?>checked='checked'<?php endif; ?> /></div>

        	    		</div>
                        <?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><div class = "ll2">
                            <div class = "row">
                                <div class="col-lg-4 col-lg-offset-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($action["title"]); ?><input type="checkbox" name='access[]' level='2' value='<?php echo ($action["id"]); ?>_2'  <?php if($action["access"]): ?>checked='checked'<?php endif; ?> /></div>
                            </div>
                            <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><div class = "row">
                                    <div class="col-lg-4 col-lg-offset-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($method["title"]); ?><input type="checkbox" name='access[]' level='3' value='<?php echo ($method["id"]); ?>_3'  <?php if($method["access"]): ?>checked='checked'<?php endif; ?> /></div>
                                </div><?php endforeach; endif; ?></div><?php endforeach; endif; ?>
                    </div><?php endforeach; endif; ?>

                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <input type="hidden" name='rid' value='<?php echo ($rid); ?>' />
                            <button type="submit" class="btn btn-info">提交</button>
                        </div>
                    </div>
            </form>
    		<div class = "row">
    			<div class="col-lg-4 col-lg-offset-4"><?php echo ($page); ?></div>
    		</div>
    	</table>

    </div>

</body>
</html>