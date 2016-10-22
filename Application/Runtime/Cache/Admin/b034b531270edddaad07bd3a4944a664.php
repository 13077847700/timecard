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
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" action="<?php echo U('update');?>" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 姓名 </label>
                    <div class="col-sm-3">
                        <input type="hidden" name="uid" value="<?php echo ($member['id']); ?>">
                        <input type="text" name="username" id="username" class="col-sm-12"
                               value="<?php echo ($member['username']); ?>">
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 员工号 </label>
                    <div class="col-sm-3">
                        <input type="text" name="employee_no" id="employee_no" class="col-sm-12"
                               value="<?php echo ($member['employee_no']); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 密码 </label>
                    <div class="col-sm-3">
                        <input type="password" name="password" id="password" class="col-sm-12"
                               value="">
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 用户组 </label>
                    <div class="col-sm-3">
                        <?php if($member['id'] == 1): if(is_array($usergroup)): $i = 0; $__LIST__ = $usergroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if($val['id'] == $member['group_id']): ?><input type="text" class="col-sm-12" value="<?php echo ($val['title']); ?>"
                                           readonly>
                                    <input type="hidden" name="group_id" id="group_id"
                                           class="col-sm-12" value="<?php echo ($member['group_id']); ?>"><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                            <?php else: ?>
                            <select id="group_id" name="group_id" class="col-sm-12" style="height:25px;">
                                <?php if(is_array($usergroup)): $i = 0; $__LIST__ = $usergroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val['id']); ?>"
                                    <?php if($val['id'] == $member['group_id']): ?>selected="selected"<?php endif; ?>
                                    ><?php echo ($val['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select><?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 现任部门 </label>
                    <div class="col-sm-3">
                        <select id="now_department_id" name="now_department_id" class="col-sm-12" style="height:25px;">
                            <?php if(is_array($department)): $i = 0; $__LIST__ = $department;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$now): $mod = ($i % 2 );++$i;?><option value="<?php echo ($now['id']); ?>"
                                <?php if($now['id'] == $member['now_department_id']): ?>selected="selected"<?php endif; ?>
                                ><?php echo ($now['dept_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 入职部门 </label>
                    <div class="col-sm-3">
                        <select id="in_department_id" name="in_department_id" class="col-sm-12" style="height:25px;">
                            <?php if(is_array($department)): $i = 0; $__LIST__ = $department;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?><option value="<?php echo ($in['id']); ?>"
                                <?php if($in['id'] == $member['in_department_id']): ?>selected="selected"<?php endif; ?>
                                ><?php echo ($in['dept_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 现任职位 </label>
                    <div class="col-sm-3">
                        <select id="now_position_id" name="now_position_id" class="col-sm-12" style="height:25px;">
                            <?php if(is_array($position)): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$now2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($now2['id']); ?>"
                                <?php if($now2['id'] == $member['now_position_id']): ?>selected="selected"<?php endif; ?>
                                ><?php echo ($now2['position']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 入职职位 </label>
                    <div class="col-sm-3">
                        <select id="in_position_id" name="in_position_id" class="col-sm-12" style="height:25px;">
                            <?php if(is_array($position)): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($in2['id']); ?>"
                                <?php if($in2['id'] == $member['in_position_id']): ?>selected="selected"<?php endif; ?>
                                ><?php echo ($in2['position']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 直属上级 </label>
                    <div class="col-sm-3">
                        <input type="text" name="superior" id="superior" class="col-sm-12"
                               value="<?php echo ($member['superior']); ?>">
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 办公地 </label>
                    <div class="col-sm-3">
                        <select id="workaddr" name="workaddr" class="col-sm-12" style="height:25px;">
                            <option value="0" selected="selected">深圳</option>
                            <option value="1">广州</option>
                            <option value="2">重庆</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 身份证号码 </label>
                    <div class="col-sm-3">
                        <input type="text" name="card_id" id="card_id" class="col-sm-12"
                               value="<?php echo ($member['card_id']); ?>">
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 工资卡号 </label>
                    <div class="col-sm-3">
                        <input type="text" name="pay_card" id="pay_card" class="col-sm-12"
                               value="<?php echo ($member['pay_card']); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 性别 </label>
                    <div class="col-sm-3">
                        <select id="sex" name="sex" class="col-sm-12" style="height:25px;">
                            <option value="0" <?php if($member['sex'] == 0 ): ?>selected="selected"<?php endif; ?> >男</option>
                            <option value="1" <?php if($member['sex'] == 1 ): ?>selected="selected"<?php endif; ?> >女</option>
                        </select>
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 生日 </label>
                    <div class="col-sm-3">
                        <input type="text" name="birthday" id="birthday" class="col-sm-12"
                               value="<?php echo (date('Y-m-d', $member['birthday'])); ?>" 
                                placeholder="请选择日期" style="border:1px solid #A9A9A9;" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 手机号码 </label>
                    <div class="col-sm-3">
                        <input type="text" name="phone" id="phone" class="col-sm-12"
                               value="<?php echo ($member['phone']); ?>">
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 星座 </label>
                    <div class="col-sm-3">
                        <input type="text" name="constellation" id="constellation" class="col-sm-12"
                               value="<?php echo ($member['constellation']); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 公司邮箱 </label>
                    <div class="col-sm-3">
                        <input type="text" name="company_email" id="company_email" class="col-sm-12"
                               value="<?php echo ($member['company_email']); ?>">
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 入职日期 </label>
                    <div class="col-sm-3">
                        <input type="text" name="join_date" id="join_date" placeholder="请选择日期" class="col-sm-12"
                               value="<?php echo (date('Y-m-d', $member['join_date'])); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 私人邮箱 </label>
                    <div class="col-sm-3">
                        <input type="text" name="person_email" id="person_email" class="col-sm-12"
                               value="<?php echo ($member['person_email']); ?>">
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 合同签署日期 </label>
                    <div class="col-sm-3">
                        <input type="text" name="sign_date" id="sign_date" placeholder="请选择日期" class="col-sm-12"
                               value="<?php echo (date('Y-m-d', $member['sign_date'])); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> QQ </label>
                    <div class="col-sm-3">
                        <input type="text" name="qq" id="qq" class="col-sm-12"
                               value="<?php echo ($member['qq']); ?>">
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 合同期满日期 </label>
                    <div class="col-sm-3">
                        <input type="text" name="full_time"  id="full_time" placeholder="请选择日期" class="col-sm-12"
                               value="<?php echo (date('Y-m-d', $member['full_time'])); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 学历 </label>
                    <div class="col-sm-3">
                        <select id="degree" name="degree" class="col-sm-12" style="height:25px;">
                            <option value="0">博士后</option>
                            <option value="1">博士</option>
                            <option value="2">硕士</option>
                            <option value="3" selected="selected">本科</option>
                            <option value="4">专科</option>
                            <option value="5">其他</option>
                        </select>
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 续签期满日期(1) </label>
                    <div class="col-sm-3">
                        <input type="text" name="continue1" id="continue1" placeholder="请选择日期" class="col-sm-12"
                               value="<?php echo (date('Y-m-d', $member['continue1'])); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 专业 </label>
                    <div class="col-sm-3">
                        <input type="text" name="major" id="major" class="col-sm-12"
                               value="<?php echo ($member['major']); ?>">
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 续签期满日期(2) </label>
                    <div class="col-sm-3">
                        <input type="text" name="continue2" id="continue2" placeholder="请选择日期" class="col-sm-12"
                               value="<?php echo (date('Y-m-d', $member['continue2'])); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 专业院校 </label>
                    <div class="col-sm-3">
                        <input type="text" name="school" id="school" class="col-sm-12"
                               value="<?php echo ($member['school']); ?>">
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 续签期满日期(3) </label>
                    <div class="col-sm-3">
                        <input type="text" name="continue3" id="continue3" placeholder="请选择日期" class="col-sm-12"
                               value="<?php echo (date('Y-m-d', $member['continue3'])); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 毕业时间 </label>
                    <div class="col-sm-3">
                        <input type="text" name="end_time" id="end_time" placeholder="请选择日期" class="col-sm-12"
                               value="<?php echo (date('Y-m-d', $member['end_time'])); ?>">
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 是否实习 </label>
                    <div class="col-sm-3">
                        <label class="radio-inline">
                          <input type="radio" name="is_internship" id="is_internship1" value="1" <?php if($member['is_internship'] == 1): ?>checked<?php endif; ?> > 是
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="is_internship" id="is_internship2" value="2" <?php if($member['is_internship'] == 2): ?>checked<?php endif; ?> > 否
                        </label>
                        <!--<input type="text" name="is_internship" id="is_internship" class="col-sm-12"
                               value="<?php echo ($currentmenu["title"]); ?>">-->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 家庭电话 </label>
                    <div class="col-sm-3">
                        <input type="text" name="home_tel" id="home_tel" class="col-sm-12"
                               value="<?php echo ($member['home_tel']); ?>">
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 是否转正 </label>
                    <div class="col-sm-3">
                        <label class="radio-inline">
                          <input type="radio" name="is_turn" id="is_turn1" value="1" <?php if($member['is_internship'] == 1): ?>checked<?php endif; ?> > 是
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="is_turn" id="is_turn2" value="2" <?php if($member['is_internship'] == 2): ?>checked<?php endif; ?> > 否
                        </label>
                        <!--<input type="text" name="is_turn" id="is_turn" class="col-sm-12"
                               value="<?php echo ($currentmenu["title"]); ?>">-->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 紧急联系人 </label>
                    <div class="col-sm-3">
                        <input type="text" name="urgent_contact" id="urgent_contact" class="col-sm-12"
                               value="<?php echo ($member['urgent_contact']); ?>">
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 试用期过半日期 </label>
                    <div class="col-sm-3">
                        <input type="text" name="probation_half" id="probation_half" placeholder="请选择日期" class="col-sm-12"
                               value="<?php echo (date('Y-m-d', $member['probation_half'])); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 紧急联系人电话 </label>
                    <div class="col-sm-3">
                        <input type="text" name="contact_tel" id="contact_tel" class="col-sm-12"
                               value="<?php echo ($member['contact_tel']); ?>">
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 试用期满日期 </label>
                    <div class="col-sm-3">
                        <input type="text" name="probation_full" id="probation_full" placeholder="请选择日期" class="col-sm-12"
                               value=" <?php if($member['probation_full'] != 0 ): echo (date('Y-m-d', $member['probation_full'])); endif; ?> ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 是否离职 </label>
                    <div class="col-sm-3">
                        <label class="radio-inline">
                          <input type="radio" name="is_leave" id="is_leave1" value="1" <?php if($member['is_internship'] == 1): ?>checked<?php endif; ?> > 是
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="is_leave" id="is_leave2" value="2" <?php if($member['is_internship'] == 2): ?>checked<?php endif; ?> > 否
                        </label>
                        <!--<input type="text" name="is_leave" id="is_leave" class="col-sm-12"
                               value="<?php echo ($currentmenu["title"]); ?>">-->
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 离职日期 </label>
                    <div class="col-sm-3">
                        <input type="text" name="leave_date" id="leave_date" placeholder="请选择日期" class="col-sm-12"
                               value=" <?php if($member['leave_date'] != 0 ): echo (date('Y-m-d', $member['leave_date'])); endif; ?> ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 家庭住址 </label>
                    <div class="col-sm-3">
                         <textarea name="home_addr" id="home_addr" placeholder="详细家庭住址" class="col-sm-12"
                                  rows="5"><?php echo ($member['home_addr']); ?></textarea>
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 户口地址 </label>
                    <div class="col-sm-3">
                        <textarea name="location" id="location" placeholder="户口住址" class="col-sm-12"
                                  rows="5"><?php echo ($member['location']); ?></textarea>
                    </div>
                </div>

                <div class="space-4"></div>
                <div class="col-md-offset-5 col-md-9">
                    <button class="btn btn-info" type="submit">
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
    <script src="/timecard/Public/Resources/js/jquery.min.js" charset="UTF-8"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="/timecard/Public/Resources/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/timecard/Public/Resources/dist/js/app.min.js"></script>
    
    <script src="/timecard/Public/Resources/js/bootbox.js"></script>

    <!-- 日期插件 -->
    <script src="/timecard/Public/Resources/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/timecard/Public/Resources/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js"></script>
    
    <script type="text/javascript">
        $(function () {
            $("#birthday").datepicker({
                language: "zh-CN",
                autoclose: true,//选中之后自动隐藏日期选择框
                clearBtn: true,//清除按钮
                todayBtn: false,//今日按钮
                format: "yyyy-mm-dd"//日期格式，详见 http://bootstrap-datepicker.readthedocs.org/en/release/options.html#format
            });
            $("#join_date").datepicker({
                language: "zh-CN",
                autoclose: true,//选中之后自动隐藏日期选择框
                clearBtn: true,//清除按钮
                todayBtn: false,//今日按钮
                format: "yyyy-mm-dd"//日期格式，详见 http://bootstrap-datepicker.readthedocs.org/en/release/options.html#format
            });
            $("#sign_date").datepicker({
                language: "zh-CN",
                autoclose: true,//选中之后自动隐藏日期选择框
                clearBtn: true,//清除按钮
                todayBtn: false,//今日按钮
                format: "yyyy-mm-dd"//日期格式，详见 http://bootstrap-datepicker.readthedocs.org/en/release/options.html#format
            });
            $("#full_time").datepicker({
                language: "zh-CN",
                autoclose: true,//选中之后自动隐藏日期选择框
                clearBtn: true,//清除按钮
                todayBtn: false,//今日按钮
                format: "yyyy-mm-dd"//日期格式，详见 http://bootstrap-datepicker.readthedocs.org/en/release/options.html#format
            });
            $("#continue1").datepicker({
                language: "zh-CN",
                autoclose: true,//选中之后自动隐藏日期选择框
                clearBtn: true,//清除按钮
                todayBtn: false,//今日按钮
                format: "yyyy-mm-dd"//日期格式，详见 http://bootstrap-datepicker.readthedocs.org/en/release/options.html#format
            });
            $("#continue2").datepicker({
                language: "zh-CN",
                autoclose: true,//选中之后自动隐藏日期选择框
                clearBtn: true,//清除按钮
                todayBtn: false,//今日按钮
                format: "yyyy-mm-dd"//日期格式，详见 http://bootstrap-datepicker.readthedocs.org/en/release/options.html#format
            });
            $("#continue3").datepicker({
                language: "zh-CN",
                autoclose: true,//选中之后自动隐藏日期选择框
                clearBtn: true,//清除按钮
                todayBtn: false,//今日按钮
                format: "yyyy-mm-dd"//日期格式，详见 http://bootstrap-datepicker.readthedocs.org/en/release/options.html#format
            });
            $("#end_time").datepicker({
                language: "zh-CN",
                autoclose: true,//选中之后自动隐藏日期选择框
                clearBtn: true,//清除按钮
                todayBtn: false,//今日按钮
                format: "yyyy-mm-dd"//日期格式，详见 http://bootstrap-datepicker.readthedocs.org/en/release/options.html#format
            });
            $("#probation_half").datepicker({
                language: "zh-CN",
                autoclose: true,//选中之后自动隐藏日期选择框
                clearBtn: true,//清除按钮
                todayBtn: false,//今日按钮
                format: "yyyy-mm-dd"//日期格式，详见 http://bootstrap-datepicker.readthedocs.org/en/release/options.html#format
            });
            $("#probation_full").datepicker({
                language: "zh-CN",
                autoclose: true,//选中之后自动隐藏日期选择框
                clearBtn: true,//清除按钮
                todayBtn: false,//今日按钮
                format: "yyyy-mm-dd"//日期格式，详见 http://bootstrap-datepicker.readthedocs.org/en/release/options.html#format
            });
            $("#leave_date").datepicker({
                language: "zh-CN",
                autoclose: true,//选中之后自动隐藏日期选择框
                clearBtn: true,//清除按钮
                todayBtn: false,//今日按钮
                format: "yyyy-mm-dd"//日期格式，详见 http://bootstrap-datepicker.readthedocs.org/en/release/options.html#format
            });
        });
    </script>

	<script type="text/javascript">

    </script>
    
    </body>
</html>