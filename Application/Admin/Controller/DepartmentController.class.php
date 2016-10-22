<?php
namespace Admin\Controller;
use Vendor\Tree;

class DepartmentController extends CommonController
{
	public function index()
	{	
		$keyword = I('get.keyword', '', 'htmlentities');
		$where = '1 = 1 ';
		$prefix = C('DB_PREFIX');
		if($keyword)
		{
			$where .="and {$prefix}department.dept_name like '%{$keyword}%'";
		}
		$m = M('Department');
		$list = $m->where($where)->select();
		//echo $m->getLastSql();die;
		$this->assign('list', $list);
		$this->display();
	}

	public function edit()
	{
		$id = I('get.id', '', 'intval');
		$department = M('Department')->where(array('id'=>$id))->find();
		if($department)
		{
			$this->assign('department', $department);
		}		
		$this->display('form');
	}

	
	/**
	 * 选择所选分类列表
	 *
	 * return 下拉列表，被选元素
	 */
	public function add()
	{
		$this->display('form');
	}

	public function update($id = 0)
	{
		$id = intval($id);
		$data['dept_name'] = I('post.dept_name');
		$data['remark'] = I('remark');
		if(!$data['dept_name'])
		{
			$this->error('警告！部门名称必须！');
		}
		if($id)
		{
			M('Department')->data($data)->where(array('id'=>$id))->save();
			addlog('编辑部门，部门ID：' . $id);
			$this->success('恭喜，编辑部门成功!', U('index'));
		}
		else
		{
			$id = M('Department')->data($data)->add();
			if($id)
			{
				addlog('新增部门，部门ID:' . $id);
				$this->success('恭喜！部门新增成功', U('index'));
			}
			else
			{
				$this->error('部门新增失败');
			}
		}
	}

	public function del()
	{
		$ids = I('request.ids', '', 'intval');
		if($ids)
		{
			if(is_array($ids))
			{
				$ids = implode(',', $ids);
				$map['id'] = array('in', $ids);
			}
			else
			{
				$map = 'id=' . $ids;
			}
			$row = M('Department')->where($map)->delete();
			if($row)
			{
				addlog('删除部门，部门ID:' . $ids);
				$this->success('部门删除成功');
			}
			else
			{
				$this->error('部门删除失败');
			}
		}
		else
		{
			$this->error('请选择要删除的部门');
		}
	}
}