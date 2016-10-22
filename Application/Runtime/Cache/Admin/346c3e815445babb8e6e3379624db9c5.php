<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo C("WEB_SITE_TITLE");?>-后台管理</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!--<link rel="stylesheet" href="/myapp/Public/Resources/css/ace.css">-->
  
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/myapp/Public/Resources/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/myapp/Public/Resources/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/myapp/Public/Resources/dist/css/skins/_all-skins.min.css">

  <!--分页样式-->
  <link rel="stylesheet" href="/myapp/Public/Resources/css/page.css">
  
 
  


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
              <img src="/myapp/Public/Resources/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              
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
                <form id="export-form" method="post" action="<?php echo U('export');?>">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="48"><input class="check-all" checked="chedked" type="checkbox" value="">
                            </th>
                            <th width="100">表名</th>
                            <th width="100">数据量</th>
                            <th width="100">数据大小</th>
                            <th width="100">创建时间</th>
                            <th width="100">备份状态</th>
                            <th width="100">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table): $mod = ($i % 2 );++$i;?><tr>
                                <td class="num">
                                    <input class="ids" checked="chedked" type="checkbox" name="tables[]"
                                           value="<?php echo ($table["name"]); ?>">
                                </td>
                                <td><?php echo ($table["name"]); ?></td>
                                <td><?php echo ($table["rows"]); ?></td>
                                <td><?php echo (format_bytes($table["data_length"])); ?></td>
                                <td><?php echo ($table["create_time"]); ?></td>
                                <td class="info">未备份</td>
                                <td class="action">
                                    <a class="ajax-get no-refresh"
                                       href="<?php echo U('Database/optimize?tables='.$table['name']);?>">优化表</a>&nbsp;
                                    <a class="ajax-get no-refresh"
                                       href="<?php echo U('Database/repair?tables='.$table['name']);?>">修复表</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="cf">
                        <a id="export" class="btn btn-info" href="javascript:;" autocomplete="off">立即备份</a>
                        <a id="optimize" class="btn btn-info" href="<?php echo U('Database/optimize');?>">优化表</a>
                        <a id="repair" class="btn btn-info" href="<?php echo U('Database/repair');?>">修复表</a>
                        <a class="btn btn-info" href="<?php echo U('Database/recovery');?>">数据还原</a>
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
    <script src="/myapp/Public/Resources/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="/myapp/Public/Resources/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/myapp/Public/Resources/dist/js/app.min.js"></script>
    
    <script src="/myapp/Public/Resources/js/bootbox.js"></script>
    
    <script type="text/javascript">
        (function ($) {
            //全选的实现
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
            var $form = $("#export-form"), $export = $("#export"), tables
            $optimize = $("#optimize"), $repair = $("#repair");

            $optimize.add($repair).click(function () {
                $.post(this.href, $form.serialize(), function (data) {
                    if (data.status) {
                        bootbox.dialog({
                            message: data.info,
                            buttons: {
                                "success": {
                                    "label": "确定",
                                    "className": "btn-sm btn-primary"
                                }
                            }
                        });
                    } else {
                        bootbox.dialog({
                            message: data.info,
                            buttons: {
                                "success": {
                                    "label": "确定",
                                    "className": "btn-danger"
                                }
                            }
                        });
                    }
                    setTimeout(function () {
                        $('#top-alert').find('button').click();
                        $(this).removeClass('disabled').prop('disabled', false);
                    }, 1500);
                }, "json");
                return false;
            });

            $export.click(function () {
                $export.parent().children().addClass("disabled");
                $export.html("正在发送备份请求...");
                $.post(
                        $form.attr("action"),
                        $form.serialize(),
                        function (data) {
                            if (data.status) {
                                tables = data.tables;
                                $export.html(data.info + "开始备份，请不要关闭本页面！");
                                backup(data.tab);
                                window.onbeforeunload = function () {
                                    return "正在备份数据库，请不要关闭！"
                                }
                            } else {
                                alert(data.info, 'alert-error');
                                $export.parent().children().removeClass("disabled");
                                $export.html("立即备份");
                                setTimeout(function () {
                                    $('#top-alert').find('button').click();
                                    $(that).removeClass('disabled').prop('disabled', false);
                                }, 1500);
                            }
                        },
                        "json"
                );
                return false;
            });

            function backup(tab, status) {
                status && showmsg(tab.id, "开始备份...(0%)");
                $.get($form.attr("action"), tab, function (data) {
                    if (data.status) {
                        showmsg(tab.id, data.info);

                        if (!$.isPlainObject(data.tab)) {
                            $export.parent().children().removeClass("disabled");
                            $export.html("备份完成，点击重新备份");
                            window.onbeforeunload = function () {
                                return null
                            }
                            return;
                        }
                        backup(data.tab, tab.id != data.tab.id);
                    } else {
                        alert(data.info, 'alert-error');
                        $export.parent().children().removeClass("disabled");
                        $export.html("立即备份");
                        setTimeout(function () {
                            $('#top-alert').find('button').click();
                            $(that).removeClass('disabled').prop('disabled', false);
                        }, 1500);
                    }
                }, "json");

            }

            function showmsg(id, msg) {
                $form.find("input[value=" + tables[id] + "]").closest("tr").find(".info").html(msg);
            }
        })(jQuery);
    </script>
    
    </body>
</html>