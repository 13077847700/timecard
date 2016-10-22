<?php
 /**
 * 用户控制器
 * @package Admin\Controller
 * @author: 江南烟雨 <773157920@qq.com>
 */
 
namespace Admin\Controller;

class MemberController extends CommonController
{
	public function index()
	{
		$p = isset($_GET['p']) ? intval($_GET['p']) : '1';
		$field = isset($_GET['field']) ? $_GET['field'] : '';
		$keyword = isset($_GET['keyword']) ? htmlentities($_GET['keyword']) : '';
		$order = isset($_GET['order']) ? $_GET['order'] : 'DESC';
		$where = '';
		
		$prefix = C('DB_PREFIX');
		if($order == 'asc')
		{
			$order = "{$prefix}member.create_time asc";
		}
		else if($order == 'desc')
		     {
			  	$order = "{$prefix}member.create_time desc";	
			 }
			 else
			 {
			  	$order = "{$prefix}member.id asc";		 
			 }
		
		if($keyword != '')
		{
			if($field == 'user')
			{
				$where = "{$prefix}member.username LIKE	'%$keyword%'";	
			}	
		}
		
		$user = M('Member');
		$pagesize = 10;  //每页数量
		$offset = $pagesize * ($p - 1);  //计算记录偏移量
		$count = $user->count();
		
		$list = $user->field("{$prefix}member.*, {$prefix}auth_group.id as gid, {$prefix}auth_group.title")->order($order)->join("__AUTH_GROUP_ACCESS__ ON {$prefix}member.id = {$prefix}auth_group_access.uid")->join("{$prefix}auth_group ON {$prefix}auth_group.id = {$prefix}auth_group_access.group_id")->where($where)->select();
		//echo $user->getLastSql();die;
		$page = new \Think\Page($count, $pagesize);
		$page = $page->show();
		$this->assign('list', $list);
		//dump($list);die;
		$this->assign('uid', $_SESSION['uid']);
		$this->assign('page', $page);
		$group = M('Auth_group')->field('id, title')->select();
		$this->assign('group', $group);
		
		$this->display();
	}
	
	public function del()
	{
		$uids = isset($_REQUEST['uids']) ? $_REQUEST['uids'] : false;
		//uid为1的禁止删除
		if($uids == 1 or !$uids)
		{
			$this->error('这是超级管理员，不能删除');	
		}
		if(is_array($uids))
		{
			foreach($uids as $k=>$v)
			{
				if($v == 1)
				{
					unset($uids[$k]);	
				}	
				$uids[k] = intval($v);
			}
			if(!uids)
			{
				$this->error('参数错误');
				$uids = implode(',', $uids);
			}
		}
		
		$where['id'] = array('in', $uids);
		$row = M('Member')->where($where)->delete();
		if($row)
		{
			$map['uid'] = array('in', $uids);
			M('Auth_group_access')->where($map)->delete();
			addlog('删除会员UID：' . $uid);
			$this->success('用户删除成功');		
		}
		else
		{
			$this->error('用户删除失败');	
		}
	}
	
	public function edit()
	{	
		$uid = isset($_GET['uid']) ? intval($_GET['uid']) : false;
		if($uid)
		{
			$prefix = C('DB_PREFIX');
			$user = M('Member');
			$member = $user->field("{$prefix}member.*, {$prefix}auth_group_access.group_id")->join("{$prefix}auth_group_access ON {$prefix}member.id={$prefix}auth_group_access.uid")->where("{$prefix}member.id=$uid")->find();
			//echo $user->getLastSql();die;
			//dump($member);die;
		}
		else
		{
			$this->error('参数错误！');	
		}
		
		$usergroup = M('Auth_group')->field('id, title')->select();
		$this->assign('usergroup', $usergroup);  //用户组id和组名
		
		$this->assign('member', $member);  //用户全部字段，用户组id
		$this->display('form');	
	}
	
	public function update($ajax = '')
	{
		if($ajax == 'yes')
		{
			$uid = I('get.uid', 0, 'intval');
			$gid = I('get.gid', 0, 'intval');
			M('Auth_group_access')->data(array('group_id'=>$gid))->where("uid='$uid'")->save();
			die('1');	
		}
		
		$uid = isset($_POST['uid']) ? intval($_POST['uid']) : false;
		dump($uid);die;
		$user = isset($_POST['user']) ? htmlspecialchars($_POST['user'], ENT_QUOTES) : '';
		$group_id = isset($_POST['group_id']) ? intval($_POST['group_id']) : 0;
		if(!$group_id)
		{
			$this->error('请选择用户组');	
		}
		$password = isset($_POST[password]) ? trim($_POST['password']) : false;

		$data['username'] = $user;
		if($password)
		{
			
			$data['password'] = password($password);	
		}
		/*$head = I('post.head', '', 'strip_tags');
		$data['sex'] = isset($_POST['sex']) ? intval($_POST[sex]) : 0;
		$data['head'] = $head ? $head : '';
		$data['birthday'] = isset($_POST['birthday']) ? strtotime($_POST['birthday']) : 0;
		$data['phone'] = isset($_POST['phone']) ? trim($_POST['phone']) : '';
		$data['qq'] = isset($_POST['qq']) ? trim($_POST['qq']) : '';*/
		$data['email'] = isset($_POST['email']) ? trim($_POST['email']) : '';
		
		$data['create_time'] = time();
		if(!$uid)
		{
			if($user == '')
			{
				$this->error('用户名称不能为空');	
			}	
			if(!$password)
			{
				$this->error('用户密码不能为空');	
			}
			/*if(M('Member')->where("username='$user'")->count())
			{
				$this->error('用户名已被占用');
			}*/
			//dump($data);die;
			$uid = M('Member')->data($data)->add();
			M('Auth_group_access')->data(array('group_id'=>$group_id, 'uid'=>$uid))->add();
			addlog('新增会员，会员UID：' . $uid);
		}
		else
		{	
			M('auth_group_access')->data(array('group_id' => $group_id))->where("uid=$uid")->save();
			addlog('编辑会员信息，会员UID：' . $uid);
			M('Member')->data($data)->where("id=$uid")->save();	
		}
		$this->success('操作成功');	 
	}
	
	 /**
	 * 用户组中文名称分配到form页面
	 * @author: 江南烟雨 <773157920@qq.com>
	 */
	public function add()
	{
		$usergroup = M('Auth_group')->field('id, title')->select();
		$this->assign('usergroup', $usergroup);
		$this->display('form');
	}
}