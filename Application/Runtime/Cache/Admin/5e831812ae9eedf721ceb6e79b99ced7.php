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
                <form class="form-horizontal" id="form" method="post" action="<?php echo U('update');?>">

                    <!-- PAGE CONTENT BEGINS -->

                    <input type="hidden" name="aid" value="<?php echo ($article["aid"]); ?>" id="aid"/>
                    <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right" for="form-field-0">
                            文章分类 </label>
                        <div class="col-sm-9">
                            <select id="sid" name="sid" class="col-xs-10 col-sm-5">
                                <option value="0">--分类--</option>
                                <?php echo ($categoryTree); ?>
                            </select>

                            <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle">选择所属分类。</span>
                                    </span>
                        </div>
                    </div>

                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right" for="form-field-1">
                            文章标题 </label>
                        <div class="col-sm-9">
                            <input type="text" name="title" id="title" placeholder="文章标题"
                                   class="col-xs-10 col-sm-5" value="<?php echo ($article['title']); ?>">
                            <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle">文章标题不能为空。</span>
                                    </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right" for="form-field-1">
                            SEO标题 </label>
                        <div class="col-sm-9">
                            <input type="text" name="seotitle" id="seotitle" placeholder="SEO标题"
                                   class="col-xs-10 col-sm-5" value="<?php echo ($article['seotitle']); ?>">
                            <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle">如果设置SEO标题，将会在IE标题栏显示SEO标题。</span>
                                    </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right" for="form-field-2">
                            关键词 </label>
                        <div class="col-sm-9">
                            <input type="text" name="keywords" id="keywords" placeholder="关键词"
                                   class="col-xs-10 col-sm-5" value="<?php echo ($article['keywords']); ?>">
                            <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle">文章关键词。</span>
                                    </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right" for="form-field-3">
                            文章摘要 </label>
                        <div class="col-sm-9">
                                <textarea name="description" id="description" placeholder="文章摘要"
                                          class="col-xs-10 col-sm-5"
                                          rows="5"><?php echo ($article['description']); ?></textarea>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle">文章摘要、描述。</span>
                            </span>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right" for="form-field-4">
                            缩略图 </label>
                        <div class="col-sm-9">
                            <div class="col-xs-10 col-sm-5">
                                
                            </div>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle">仅支持jpg、gif、png、bmp、jpeg，且小于1MB。</span>
                            </span>
                        </div>

                    </div>
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right" for="form-field-2">
                            文章内容 </label>
                        <div class="col-sm-9">
                            <div>
                                <script id="editor" type="text/plain" style="width:95%;height:400px;"></script>
                                <textarea id="content" style="visibility:hidden;"><?php echo ($article['content']); ?>   
                                </textarea>
                            </div>
                                <!--<textarea name="content" id="content"
                                          style="width:100%;height:400px;visibility:hidden;"><?php echo ($article['content']); ?></textarea>-->
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="col-xs-offset-4 col-xs-9">
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

                    <!-- PAGE CONTENT ENDS -->


                </form>
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

    <script charset="utf-8" src="/myapp/Public/kindeditor/kindeditor-min.js"></script>
    <script charset="utf-8" src="/myapp/Public/kindeditor/lang/zh_CN.js"></script>


    <!--ueditor-->
    <script type="text/javascript" charset="utf-8" src="/myapp/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/myapp/Public/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/myapp/Public/ueditor/lang/zh-cn/zh-cn.js"></script>

    <style type="text/css">
        div
        {
            width:100%;
        }
    </style>

    <script type="text/javascript">
        //实例化编辑器
        //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
        var ue = UE.getEditor('editor');
        var content = $('#content').text();
        ue.ready(function() {
            //设置编辑器的内容
            ue.setContent(content);
        });
        /*ue.ready(function() {
            //设置编辑器的内容
            ue.setContent('hello');
            //获取html内容，返回: <p>hello</p>
            var html = ue.getContent();
            //获取纯文本内容，返回: hello
            var txt = ue.getContentTxt();
        });*/
    </script>

    <script type="text/javascript">
        $(function () {
            /*$("#tabs").tabs();*/
            var editor = KindEditor.create('textarea[name="content"]', {
                uploadJson: '/myapp/Public/kindeditor/php/upload_json.php',
                fileManagerJson: '/myapp/Public/kindeditor/php/file_manager_json.php',
                allowFileManager: true,
                afterBlur: function () {
                    this.sync();
                }
            });
            $(".submit").click(function () {
                var sid = $("#sid").val();
                var title = $("#title").val();
                var content = ue.getContent();
                if (sid == 0) {
                    bootbox.dialog({
                        title: '友情提示：',
                        message: "文章分类必须选择。",
                        buttons: {
                            "success": {
                                "label": "确定",
                                "className": "btn-danger"
                            }
                        }
                    });
                    return;
                }
                if (title == '') {
                    bootbox.dialog({
                        title: '友情提示：',
                        message: "文章标题必须填写。",
                        buttons: {
                            "success": {
                                "label": "确定",
                                "className": "btn-danger"
                            }
                        }
                    });
                    return;
                }
                if (content == '') {
                    bootbox.dialog({
                        title: '友情提示：',
                        message: "文章内容需要填写。",
                        buttons: {
                            "success": {
                                "label": "确定",
                                "className": "btn-danger"
                            }
                        }
                    });
                    return;
                    return;
                }
                $("#form").submit();
            });
        });
    </script>
    
    </body>
</html>