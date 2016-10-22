<?php
 /**
 * 考勤系统
 * @package Admin\Controller
 * @author: 江南烟雨 <773157920@qq.com>
 */
namespace Admin\Controller;

class EmployeeController extends CommonController
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
		
		$list = $user->field("{$prefix}member.*, {$prefix}auth_group.id as gid, {$prefix}auth_group.title, {$prefix}department.dept_name, {$prefix}position.position")->order($order)->join("__AUTH_GROUP_ACCESS__ ON {$prefix}member.id = {$prefix}auth_group_access.uid")->join("{$prefix}auth_group ON {$prefix}auth_group.id = {$prefix}auth_group_access.group_id")->join("{$prefix}department ON {$prefix}member.now_department_id = {$prefix}department.id")->join("{$prefix}position ON {$prefix}member.now_position_id = {$prefix}position.id")->where($where)->select();
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
			$member = $user->field("{$prefix}member.*, {$prefix}auth_group_access.group_id, {$prefix}department.dept_name")->join("{$prefix}auth_group_access ON {$prefix}member.id={$prefix}auth_group_access.uid")->join("{$prefix}department ON {$prefix}member.now_department_id={$prefix}department.id")->where("{$prefix}member.id=$uid")->find();
			//echo $user->getLastSql();die;
			//dump($member);die;
		}
		else
		{
			$this->error('参数错误！');	
		}
		
		$usergroup = M('Auth_group')->field('id, title')->select();
		$department = M('Department')->field('id, dept_name')->select();
		$position = M('Position')->field('id, position')->select();
		$this->assign('usergroup', $usergroup);  //用户组id和组名
		$this->assign('department', $department);  //部门名称
		$this->assign('position', $position);   //部门职位
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
		$user = isset($_POST['username']) ? htmlspecialchars($_POST['username'], ENT_QUOTES) : '';
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
		$data['employee_no'] = I('post.employee_no');
		$data['now_department_id'] = I('post.now_department_id');
		$data['in_department_id'] = I('post.in_department_id');
		$data['now_position_id'] = I('post.now_position_id');
		$data['in_position_id'] = I('post.in_position_id');
		$data['superior'] = I('post.superior');
		$data['work_addr'] = I('post.work_addr');
		$data['card_id'] = I('post.card_id');
		$data['pay_card'] = I('post.pay_card');
		$data['sex'] = I('post.sex');
		$data['birthday'] = I('post.birthday', '' ,'strtotime');
		$data['phone'] = I('post.phone');
		$data['constellation'] = I('post.constellation');
		$data['company_email'] = I('post.company_email');
		$data['person_email'] = I('post.person_email');
		$data['qq'] = I('post.qq');
		$data['degree'] = I('post.degree');
		$data['major'] = I('post.major');
		$data['school'] = I('post.school');
		$data['end_time'] = I('post.end_time', '', 'strtotime');
		$data['home_tel'] = I('post.home_tel');
		$data['home_addr'] = I('post.home_addr');
		$data['location'] = I('post.location');
		$data['join_date'] = I('post.join_date', '', 'strtotime');
		$data['sign_date'] = I('post.sign_date', '', 'strtotime');
		$data['full_time'] = I('post.full_time', '', 'strtotime');
		$data['continue1'] = I('post.continue1', '', 'strtotime');
		$data['continue2'] = I('post.continue2', '', 'strtotime');
		$data['continue3'] = I('post.continue3', '', 'strtotime');
		$data['probation_half'] = I('post.probation_half', '', 'strtotime');
		$data['probation_full'] = I('post.probation_full', '', 'strtotime');
		$data['is_internship'] = I('post.is_internship');
		$data['is_turn'] = I('post.is_turn');
		$data['urgent_contact'] = I('post.urgent_contact');
		$data['contact_tel'] = I('post.contact_tel');
		$data['is_leave'] = I('post.is_leave', '');
		$data['leave_date'] = I('post.leave_date', '', 'strtotime');

  		/*$head = I('post.head', '', 'strip_tags');
		$data['sex'] = isset($_POST['sex']) ? intval($_POST[sex]) : 0;
		$data['head'] = $head ? $head : '';
		$data['birthday'] = isset($_POST['birthday']) ? strtotime($_POST['birthday']) : 0;
		$data['phone'] = isset($_POST['phone']) ? trim($_POST['phone']) : '';
		$data['qq'] = isset($_POST['qq']) ? trim($_POST['qq']) : '';
		$data['email'] = isset($_POST['email']) ? trim($_POST['email']) : '';*/
		
		$data['create_time'] = time();
		if(!$data['now_department_id'])
		{
			$this->error('请选择部门');
		}
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
			if(M('Member')->where("username='$user'")->count())
			{
				$this->error('用户名已被占用');
			}
			//dump($data);die;
			$uid = M('Member')->data($data)->add();
			M('Auth_group_access')->data(array('group_id'=>$group_id, 'uid'=>$uid))->add();
			addlog('新增员工，员工号：' . $data['employee_no']);
		}
		else
		{	
			M('auth_group_access')->data(array('group_id' => $group_id))->where("uid=$uid")->save();
			addlog('编辑员工信息，员工号：' . $data['employee_no']);
			M('Member')->data($data)->where("id=$uid")->save();	
		}
		$this->success('操作成功', U('index'));	 
	}
	
	 /**
	 * 用户组中文名称分配到form页面
	 * @author: 江南烟雨 <773157920@qq.com>
	 */
	public function add()
	{
		$usergroup = M('Auth_group')->field('id, title')->select();
		$department = M('Department')->field('id, dept_name')->select();
		$position = M('Position')->field('id, position')->select();
		$this->assign('usergroup', $usergroup);
		$this->assign('department', $department);
		$this->assign('position', $position);
		$this->display('form');
	}
}
