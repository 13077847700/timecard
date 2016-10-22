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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">菜单管理</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <div class="cf">
                  <a class="btn btn-info" href="<?php echo U('add');?>" value="">新增</a>
              </div>
                            
              <form id="form" method="post" action="<?php echo U('del');?>">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="center"><input class="check-all" type="checkbox" value=""></th>
                        <th>菜单名称</th>
                        <th>链接</th>
                        <th>ICON</th>
                        <th class="center">状态</th>
                        <th>排序</th>
                        <th class="center">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                            <td class="center">
                                <input class="ids" type="checkbox" name="ids[]" value="<?php echo ($val['id']); ?>">
                            </td>
                            <td><?php echo ($val['title']); ?></td>
                            <td><?php echo ($val['name']); ?></td>
                            <td><i class="<?php echo ($val["icon"]); ?>"></i></td>
                            <td class="center">
                                <?php if($val["islink"] == 1): ?>显示
                                    <?php else: ?>
                                    隐藏<?php endif; ?>
                            </td>
                            <td><?php echo ($val['o']); ?></td>
                            <td class="center"><a href="<?php echo U('edit');?>?id=<?php echo ($val['id']); ?>">修改</a>&nbsp;<a
                                    class="del" href="javascript:;" val="<?php echo U('del');?>?ids=<?php echo ($val['id']); ?>"
                                    title="删除">删除</a></td>
                        </tr>
                        <?php if(!empty($val["children"])): if(is_array($val["children"])): $i = 0; $__LIST__ = $val["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                                    <td class="center">
                                        <input class="ids" type="checkbox" name="ids[]"
                                               value="<?php echo ($v['id']); ?>">
                                    </td>
                                    <td>┗━<?php echo ($v['title']); ?></td>
                                    <td><?php echo ($v['name']); ?></td>
                                    <td><i class="<?php echo ($v["icon"]); ?>"></i></td>
                                    <td class="center">
                                        <?php if($v["islink"] == 1): ?>显示
                                            <?php else: ?>
                                            隐藏<?php endif; ?>
                                    </td>
                                    <td><?php echo ($v['o']); ?></td>
                                    <td class="center">
                                    	<a href="<?php echo U('edit');?>?id=<?php echo ($v['id']); ?>">修改</a>&nbsp;
                                        <a class="del" href="javascript:;"
                                            val="<?php echo U('del');?>?ids=<?php echo ($v['id']); ?>" title="删除">删除</a>
                                    </td>
                                </tr>
                                <?php if(!empty($v["children"])): if(is_array($v["children"])): $i = 0; $__LIST__ = $v["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><tr>
                                            <td class="center">
                                                <input class="ids" type="checkbox" name="ids[]"
                                                       value="<?php echo ($vv['id']); ?>">
                                            </td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;┗━<?php echo ($vv['title']); ?></td>
                                            <td><?php echo ($vv['name']); ?></td>
                                            <td><i class="<?php echo ($vv["icon"]); ?>"></i></td>
                                            <td class="center">
                                                <?php if($vv["islink"] == 1): ?>显示
                                                    <?php else: ?>
                                                    隐藏<?php endif; ?>
                                            </td>
                                            <td><?php echo ($vv['o']); ?></td>
                                            <td class="center"><a
                                                    href="<?php echo U('edit');?>?id=<?php echo ($vv['id']); ?>">修改</a>&nbsp;<a
                                                    class="del" href="javascript:;"
                                                    val="<?php echo U('del');?>?ids=<?php echo ($vv['id']); ?>" title="删除">删除</a>
                                            </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </form>
            <div class="cf">
                <input id="submit" class="btn btn-info" type="button" value="删除">
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
        $(function () {
            $(".check-all").click(function () {
                $(".ids").prop("checked", this.checked);
            });
            $(".ids").click(function () {
                var option = $(".ids");
                option.each(function (i) {
                    if (!this.checked) {
                        $(".check-all").prop("checked", false);
                        return false;
                    } else {
                        $(".check-all").prop("checked", true);
                    }
                });
            });
            $("#submit").click(function () {
                bootbox.confirm({
                    title: "系统提示",
                    message: "确定要删除所选？",
                    callback: function (result) {
                        if (result) {
                            $("#form").submit();
                        }
                    },
                    buttons: {
                        "cancel": {"label": "取消"},
                        "confirm": {
                            "label": "确定",
                            "className": "btn-danger"
                        }
                    }
                });
            });
            $(".del").click(function () {
                var url = $(this).attr('val');
                bootbox.confirm({
                    title: "系统提示",
                    message: "确定要删除?",
                    callback: function (result) {
                        if (result) {
                            window.location.href = url;
                        }
                    },
                    buttons: {
                        "cancel": {"label": "取消"},
                        "confirm": {
                            "label": "确定",
                            "className": "btn-danger"
                        }
                    }
                });
            });
        })
    </script>
    
    </body>
</html>