<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo C("WEB_SITE_TITLE");?>-后台管理</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!--<link rel="stylesheet" href="/timecard/Public/Resources/css/ace.css">-->
  
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/timecard/Public/Resources/css/bootstrap.min.css" media="screen">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/timecard/Public/Resources/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/timecard/Public/Resources/dist/css/skins/_all-skins.min.css">

  <!--分页样式-->
  <link rel="stylesheet" href="/timecard/Public/Resources/css/page.css">
  
  <!-- 日期样式 -->
  <link rel="stylesheet" href="/timecard/Public/Resources/plugins/datepicker/datepicker3.css">

  

  


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">


<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo" style="background-color:#3c8dbc;">
      
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu" style="float:none;">    
        <ul class="nav navbar-nav navbar-right">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu pull-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-right:50px;">
              <img src="/timecard/Public/Resources/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              
              	<span class="hidden-xs"><?php echo ($user["username"]); ?>&nbsp;&nbsp;<i class="fa fa-chevron-down"></i></span>
              
            </a>
            <ul class="dropdown-menu" style="width:200px;margin-right:50px;">
              <!-- Menu Footer-->
              <li class="user-footer" style="background-color:#fff;box-shadow: 0px 0px 10px rgba(0,0,0,0.5);">
                  <a href="<?php echo U('Member/edit');?>?uid=<?php echo ($uid); ?>" class="btn btn-flat" style="border:none;padding:10px;"><i class="fa fa-key"></i>修改密码</a>
                  <a href="<?php echo U('Logout/logout');?>" class="btn btn-flat" style="border:none;padding:10px;"><i class="fa fa-power-off"></i>安全退出</a>
    
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"> 
    <section class="sidebar" style="width:230px;"> 
        <ul class="sidebar-menu">    
             <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li  
                    <?php if(($v['id'] == $current['id']) OR ($v['id'] == $current['pid']) OR ($v['id'] == $current['ppid'])): ?>class="treeview active"
                        <?php else: ?>
                        class="treeview"<?php endif; ?>
                >
                    <a href="<?php echo U($v['name']);?>">
                    	<!--<i class="fa fa-circle-o"></i>-->
                        <i class="fa  <?php echo ($v["icon"]); ?>"></i> 
                        <span > <?php echo ($v["title"]); ?>  </span>
                        <?php if(!empty($v["children"])): ?><span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span><?php endif; ?>
                    </a>
                    
                    <?php if(!empty($v["children"])): ?><ul class="treeview-menu" style="margin-left:10px;">
                            <?php if(is_array($v["children"])): $i = 0; $__LIST__ = $v["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li
                                    <?php if(($vv['id'] == $current['id']) OR ($vv['id'] == $current['pid'])): ?>class="active"<?php endif; ?>
                                    >
                                    <a href="<?php echo U($vv['name']);?>">
                                    	<i class="<?php echo ($vv["icon"]); ?>"></i> 
                                        <?php echo ($vv["title"]); ?>
                                        <?php if(!empty($vv["children"])): ?><span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span><?php endif; ?>
                                    </a>
                                    
                                    <?php if(!empty($vv["children"])): ?><ul class="treeview-menu">
                                        	<?php if(is_array($vv["children"])): $i = 0; $__LIST__ = $vv["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?><li
                                                    <?php if(($vvv['id'] == $current['id'])): ?>class="active"<?php endif; ?>
                                                    >
                                                    <a href="<?php echo U($vvv['name']);?>">
                                                        <i class="<?php echo ($vvv["icon"]); ?>"></i> 
                                                        <?php echo ($vvv["title"]); ?>
                                                        <?php if(!empty($vvv["children"])): ?><span class="pull-right-container">
                                                                <i class="fa fa-angle-left pull-right"></i>
                                                            </span><?php endif; ?>
                                                    </a>
                                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul><?php endif; ?>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </section>
</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb" style="left:10px;font-size:16px;">
        <li><a href="<?php echo U('Index/index');?>"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li class="active">留言信息</li>
      </ol> 
    </section>
    <div class="clearfix" style="margin-top:40px;"></div>
    
    <!-- Main content -->
    <section class="content">
     <!-- /section:settings.box -->
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" id="form" name="form" action="<?php echo U('update');?>" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 用户组名 </label>
                        <div class="col-sm-9">
                            <input type="text" name="title" id="title" placeholder="用户组名"
                                   class="col-xs-10 col-sm-5" value="<?php echo ($group["title"]); ?>">
                            <input type="hidden" name="id" id="id" value="<?php echo ($group["id"]); ?>">
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle">用户组名称，不能为空。</span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-2"> 是否启用 </label>
                        <div class="control-label no-padding-left col-sm-2">
                            <label>
                                <input name="status" id="status"
                                <?php if($group['status'] == 1): ?>checked="checked"<?php endif; ?>
                                class="ace ace-switch ace-switch-2" type="checkbox" />
                                <span class="lbl"></span>
                            </label>
                        </div>
                        <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle">YES，启用；NO，禁用</span>
                                </span>
                    </div>
                    <div class="space-4"></div>
                    <?php if($group["id"] != 1): ?><div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1">
                                权限选择 </label>
                            <div class="col-sm-9">
                                <div class="col-sm-10">
                                    <?php if(is_array($rule)): $i = 0; $__LIST__ = $rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="row">
                                            <div class="widget-box">
                                                <div class="widget-header">
                                                    <h4 class="widget-title">
                                                        <label>
                                                            <input name="rules[]"
                                                                           class="ace ace-checkbox-2 father" <?php if(in_array($v['id'],$group['rules'])){echo 'checked="checked"';};?>
                                                                    type="checkbox" value="<?php echo ($v['id']); ?>"/>
                                                            <span class="lbl"> <?php echo ($v['title']); ?></span>
                                                        </label>
                                                    </h4>
                                                    <div class="widget-toolbar">
                                                        <?php if(!empty($v["children"])): ?><a href="#" data-action="collapse">
                                                                <i class="ace-icon fa fa-chevron-up"></i>
                                                            </a><?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php if(!empty($v["children"])): ?><div class="widget-body">
                                                        <div class="widget-main row">
                                                            <?php if(is_array($v["children"])): $i = 0; $__LIST__ = $v["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><label class="col-xs-2" style="width:200px;">
                                                                    <input name="rules[]"
                                                                           class="ace ace-checkbox-2 children" <?php if(in_array($vv['id'],$group['rules'])){echo 'checked="checked"';};?>
                                                                    type="checkbox" value="<?php echo ($vv['id']); ?>"/>
                                                                    <span class="lbl"> <?php echo ($vv['title']); ?></span>
                                                                </label>
                                                                <?php if(is_array($vv["children"])): $i = 0; $__LIST__ = $vv["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?><label class="col-xs-2" style="width:200px;">
                                                                        <input name="rules[]"
                                                                               class="ace ace-checkbox-2 children" <?php if(in_array($vvv['id'],$group['rules'])){echo 'checked="checked"';};?>
                                                                        type="checkbox" value="<?php echo ($vvv['id']); ?>"/>
                                                                        <span class="lbl"> <?php echo ($vvv['title']); ?></span>
                                                                    </label><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                                        </div>
                                                    </div><?php endif; ?>
                                            </div>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                        </div><?php endif; ?>

                    <div class="col-md-offset-2 col-md-9">
                        <button class="btn btn-info submit" type="button">
                            <i class="icon-ok bigger-110"></i>
                            提交
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="icon-undo bigger-110"></i>
                            重置
                        </button>
                    </div>
                </form>
                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
    <!-- /.content -->
  </div>



  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/timecard/Public/Resources/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="/timecard/Public/Resources/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/timecard/Public/Resources/dist/js/app.min.js"></script>
    
    <script src="/timecard/Public/Resources/js/bootbox.js"></script>
    
    <script type="text/javascript">
		$(".children").click(function () {
			$(this).parent().parent().parent().parent().find(".father").prop("checked", true);
		})
		$(".father").click(function () {
			if (this.checked) {
				$(this).parent().parent().parent().parent().find(".children").prop("checked", true);
			} else {
				$(this).parent().parent().parent().parent().find(".children").prop("checked", false);
			}
		})
		$(".submit").click(function () {
			var title = $("#title").val();
			if (title == '') {
				bootbox.dialog({
					message: "用户组名称不能为空。",
					buttons: {
						"success": {
							"label": "确定",
							"className": "btn-danger"
						}
					}
				});
				return;
			}
			$('#form').submit();
	
		})
	</script>
    
    </body>
</html>