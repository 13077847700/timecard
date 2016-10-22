<?php 
namespace Admin\Controller;

class LogoutController extends CommonController
{
	//退出登陆
	public function logout()
	{
		cookie('auth', null);
		session('uid', null);
		$this->redirect('Login/index');	
	}	
}