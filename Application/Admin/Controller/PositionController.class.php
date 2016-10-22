<?php
namespace Admin\Controller;
use Vendor\Tree;

class PositionController extends CommonController
{
	public function index()
	{	
		$keyword = I('get.keyword', '', 'htmlentities');
		$where = '1 = 1 ';
		$prefix = C('DB_PREFIX');
		if($keyword)
		{
			$where .="and {$prefix}position.position like '%{$keyword}%'";
		}
		$m = M('Position');
		$list = $m->where($where)->select();
		//echo $m->getLastSql();die;
		$this->assign('list', $list);
		$this->display();
	}

	public function edit()
	{
		$id = I('get.id', '', 'intval');
		$position = M('Position')->where(array('id'=>$id))->find();
		if($position)
		{
			$this->assign('position', $position);
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
		$data['position'] = I('post.position');
		$data['remark'] = I('remark');
		if(!$data['position'])
		{
			$this->error('警告！部门名称必须！');
		}
		if($id)
		{
			M('Position')->data($data)->where(array('id'=>$id))->save();
			addlog('编辑职位，职位ID：' . $id);
			$this->success('恭喜，编辑职位成功！', U('index'));
		}
		else
		{
			$id = M('Position')->data($data)->add();
			if($id)
			{
				addlog('新增职位，职位ID:' . $id);
				$this->success('恭喜！职位新增成功', U('index'));
			}
			else
			{
				$this->error('职位新增失败');
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
			$row = M('Position')->where($map)->delete();
			if($row)
			{
				addlog('删除职位，职位ID:' . $ids);
				$this->success('职位删除成功');
			}
			else
			{
				$this->error('职位删除失败');
			}
		}
		else
		{
			$this->error('请选择要删除的职位');
		}
	}
}