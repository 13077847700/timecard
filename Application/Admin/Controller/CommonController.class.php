<?php
/**
* 功能说明： 后台公用控制器
*
*/

namespace Admin\Controller;
use Common\Controller\BaseController;
use Think\Auth;
  
 /**
 * 后台控制器集成的基类，集成后台通用基础类，避免重复冗余
 * Class CommonController
 * @package Admin\Controller
 * @author: 江南烟雨 <773157920@qq.com>
 */
class CommonController extends BaseController
{
	 public $USER;
	 
	 public function _initialize()
	 {
		C(setting());
		if(!C("COOKIE_SALT"))
		{
			$this->error('请配置COOKIE_SALT信息');	
		} 
		if(in_array(CONTROLLER_NAME,array("Login")))
		{
			return true;	
		}
		//检测是否登陆
		$flag = $this->check_login();
		if(!$flag)
		{	
			$this->redirect('Login/index');
			exit(0);
		}
		//$m = M();
		$prefix = C('DB_PREFIX');
		$m = M('auth_group');
		$UID = $this->USER['id'];
		$userinfo = $m->join("{$prefix}auth_group_access on {$prefix}auth_group.id={$prefix}auth_group_access.group_id")->where(array("{$prefix}auth_group_access.uid"=>$UID))->select();
		//echo $m->getLastSql();die;
		//$userinfo = $m->query("SELECT * FROM {$prefix}auth_group g left join {$prefix}auth_group_access a on g.id=a.group_id where a.uid=$UID");
		//dump($userinfo);die;
		$Auth = new Auth();
		$allow_controller_name = array('Upload'); //放行控制器名称
		$allow_action_name = array('logout', 'edit');  //放行函数名称
		if($userinfo[0]['group_id'] != C('USER_ADMINISTRATOR') && !$Auth->check(CONTROLLER_NAME . '/' . ACTION_NAME,$UID) && !in_array(CONTROLLER_NAME,$allow_controller_name) && !in_array(ACTION_NAME,$allow_action_name))
		{
			$this->error('没有权限访问本页面');	
		}

		$user = member(intval($UID));
		$this->assign('user', $user);  //用户名分配到后台页面(导航栏)
		$this->assign('uid', $_SESSION['uid']);  //分配登陆的uid
		
		$current_action_name = ACTION_NAME == 'edit' ? "index" : ACTION_NAME;
        $current = $m->query("SELECT s.id,s.title,s.name,s.tips,s.pid,p.pid as ppid,p.title as ptitle FROM {$prefix}auth_rule s left join {$prefix}auth_rule p on p.id=s.pid where s.name='" . CONTROLLER_NAME . '/' . $current_action_name . "'");
		//左外联接，同一个表，取了别名s和p，条件p.id=s.pid where s.name=''
        //  adddasf name=a/b;
        //  "adddasf name='" . a . '/' . b . "'"
		//pid  判断是否有二级菜单 不为0=>有
		//ppid 判断是否有三级菜单
		//dump($current);die;
		$this->assign('current',$current[0]);
		
		$menu_access_id = $userinfo[0]['rules'];
		
		if($userinfo[0]['group_id'] != C('USER_ADMINISTRATOR'))
		{
			$menu_where = "AND id in ($menu_access_id)";	
		}
		else
		{
			$menu_where = '';	
		}
		$menu = M('Auth_rule')->field('id,title,pid,name,icon')->where("islink=1 $menu_where ")->order('o ASC')->select();
		$menu = $this->getMenu($menu);
		//dump($menu);die;
		$this->assign('menu',$menu);	
 	}
	
	
	/**
     * 描述：拼装数组，把不是顶级菜单的数组整合到相对应的顶级菜单中去
     * @param $items  二维数组
     * @param mixed $menuTree
     * @param $id
	 * @param $pid  父id
	 * @param $son
	 * @return array 整合了家谱的数组
     * @author: 江南烟雨 <773157920@qq.com>
     */ 
	protected function getMenu($items, $id = 'id', $pid = 'pid', $son = 'children')
	{
		$tree = array();
		$tmpMap = array();
		foreach($items as $item)
		{
			$tmpMap[$item[$id]] = $item;
		} 
		foreach($items as $item)
		{
			//判断pid是否为0，不为0时将数组拼装到children后面
			if(isset($tmpMap[$item[$pid]]))
			{
				$tmpMap[$item[$pid]][$son][] = &$tmpMap[$item[$id]];	
			}	
			//当pid为0时，将子孙合并的数组拼到一个新数组
			else
			{
				$tree[] = &$tmpMap[$item[$id]];
			}
		}
		return $tree;
	}
	 
	public function check_login()
	{
		session_start();
		$flag = false;
		$salt = C("COOKIE_SALT");
		$ip = get_client_ip();
		$ua = $_SERVER['HTTP_USER_AGENT'];
		$auth = cookie('auth');
		$uid = session('uid');
		if($uid)
		{
			$user = M('member') -> where(array('id' => $uid)) -> find();
			if($user)
			{
				if($auth == password($uid.$user['username'].$ip.$ua.$salt))
				{
					$flag = true;
					$this->USER = $user;
				}
			} 
		}
		return $flag;
	}
}