<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/timecard/Public/Resources/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/timecard/Public/Resources/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/timecard/Public/Resources/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="background-color:#eeeeee;border-radius:5px;box-shadow: 0px 0px 10px rgba(0,0,0,0.5);">
    <p class="login-box-msg" style="font-size:30px;">登陆</p>

    <form action="<?php echo U('dologin');?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="user" class="form-control" placeholder="请输入用户名" style="height:40px;">
        <span class="glyphicon glyphicon-envelope form-control-feedback" style="top:5px;"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="请输入密码" style="height:40px;">
        <span class="glyphicon glyphicon-lock form-control-feedback" style="top:5px;"></span>
      </div>
      <div class="row">
        <div class="col-xs-5">
        	<input type="text" name="code" id="code" class="form-control" placeholder="请输入验证码" style="height:40px;"> 
        </div>
        <div class="col-xs-5 col-xs-offset-1">
        	<img src="<?php echo U('Admin/Login/code');?>" title="点击刷新" onclick="this.src=this.src+'?'+Math.random()" >
        </div>
      </div>
      	
      <div class="row" style="margin-top:20px;">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> 记住密码
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">提交登陆</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="/timecard/Public/Resources/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/timecard/Public/Resources/Resources/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/timecard/Public/Resources/plugins/iCheck/icheck.min.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>