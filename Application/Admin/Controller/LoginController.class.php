<?php
 /**
 * 登陆控制器
 * Class LoginController
 * @package Admin\Controller
 * @author: 江南烟雨 <773157920@qq.com>
 */
 namespace Admin\Controller;
 use Think\Controller;
 
 class LoginController extends CommonController
 {
	public function index()
	{
		$flag = $this->check_login();
		if($flag)
		{
			$this->error('你已经登陆，正在跳转主页',U("Index/index"));
		}
		$this->display();	
	} 
	
	public function dologin()
	{
		$user = $this->verifyInfo();
		$this->checkUser($user);	
	}
	
	
	//生成验证码
	public function code()
	{
		$config =    array(
			'fontSize'    =>    18,    // 验证码字体大小
			'length'      =>    4,     // 验证码位数
			// 设置验证码字符为纯数字
			'codeSet'     =>   '0123456789',
			'useNoise'    =>    true, // 关闭验证码杂点
			'imageW' => 144,
            'imageH' => 40,
		);
		$Verify = new \Think\Verify($config);
		$Verify->entry('login');
	}

    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    function check_verify($code, $id = '')
	{
        $verify = new \Think\Verify();
       	return $verify->check($code, $id);
        
    }
	
	 /**
	 * 验证登录信息
	 * @author: 江南烟雨 <773157920@qq.com>
	 */
	private function verifyInfo()
	{	
		$verify = isset($_POST['code']) ? trim($_POST['code']) : '';
		if(!$this->check_verify($verify,'login'))
		{
			$this->error('验证码错误!',U('Login/index'));	
		}
		$username = isset($_POST['user'])?trim($_POST['user']) : '';
		$password = isset($_POST['password'])?trim($_POST['password']) : '';
		if($username == '')
		{
			$this->error('用户名不能为空',U('Login/index'));
		}
		else if($password == '')
		{ 
			$this->error('密码不能为空',U('Login/index'))	;
		}	
		$password = password($password);
		$m = M('Member');
		$data['username'] = $username;
		$data['password'] = $password;
		$user = $m->field('id,username')->where($data)->find();
		return $user;
	}
	
	/**
	 * 检查用户
	 * @author: 江南烟雨 <773157920@qq.com>
	 */
	private function checkUser($user = array())
	{
		if($user)
		{
			$salt = C('COOKIE_SALT');   //读取COOKIE_SALT信息
			$ip = get_client_ip();       //获取客户端IP
			$ua = $_SERVER['HTTP_USER_AGENT']; //?
			session_start();
			session('uid',$user['id']);   //将用户id写入session,session('uid') == 1
			//加密cookie信息
			$auth = password($user['id'].$user['username'].$ip.$ua.$salt);
			$remember = isset($_POST['remember'])?trim($_POST['remember']) : 0;
			if($remember)
			{
				cookie('auth',$auth,3600 * 24 * 7);  //记住我  加密信息写入cookie 保存一周
			}
			else
			{
				cookie('auth',$auth);
			}
			addlog('登陆成功');
			$this->redirect('Index/index');
			//$url = U('Index/index');
			//header("Location: $url");
			exit(0);
		}
		else
		{
			addlog('登陆失败', $username);
			$this->error('登陆失败， 请重试！', U('Login/index'));
		}	
	}
	
 }