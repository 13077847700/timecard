<?php
 /**
 * 分类控制器
 * @package Admin\Controller
 * @author: 江南烟雨 <773157920@qq.com>
 */

namespace Admin\Controller;
use Vendor\Tree;

class CategoryController extends CommonController
{
	public function index()
	{
		$category = M('Category')->field('id, pid, name, o')->order('o asc')->select();
		$category = $this->getMenu($category);
		$this->assign('category', $category);
		$this->display();
	}

	/**
	 * 选择所选分类列表
	 *
	 * return 下拉列表，被选元素
	 */
	public $parentIdZreo = 0;
	public function add()
	{
		$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
		$category = M('Category')->field('id, pid, name')->order('o asc')->select();
		$tree = new Tree($category);
		$str = "<option value=\$id \$selected>\$spacer\$name</option>";  //生成树的形式
  		$categoryTree = $tree->get_tree($this->parentIdZreo, $str, $pid);		

		$this->assign('categoryTree', $categoryTree);	
		$this->display('form');
	}

	public function update($act = null)
	{
		if($act == 'order')
		{
			$id = I('post.id', 0, 'intval');
			if(!$id)
			{
				die(0);
			}
			$o = I('post.o', 0, 'intval');
			M('Category')->data(array('o'=>$o))->where(array('id'=>$id))->save();
			addlog('分类修改排序，ID：'. $id);
			die('1');
		}

		$id = I('post.id', false, 'intval');
		$data['pid'] = I('post.pid', 0, 'intval');
		$data['name'] = I('post.name');
		$data['seotitle'] = I('post.seotitle', '');
		$data['keywords'] = I('post.keywords', '');
		$data['description'] = I('post.description', '');
		//$data['content'] = I('post.content');
		$data['url'] = I('post.url');
		$data['cattemplate'] = I('post.cattemplate');
		$data['contemplate'] = I('post.contemplate');
		$data['o'] = I('post.o', 0, 'intval');

		if($data['name'] == '')
		{
			$this->error('分类名称不能为空');
		}
		if($id)
		{
			$row = M('Category')->data($data)->where(array('id'=>$id))->save();
			if($row)
			{
				addlog('文章分类修改，ID：' . $id . '，名称' . $data['name']);
				$this->success('分类修改成功');
			}
		}
		else
		{	
			$id = M('Category')->data($data)->add();
			if($id)
			{
				addlog('新增文章分类，ID：' . $id . '，名称：' . $data['name']);
				$this->success('新增分类成功', 'index');
			}
			else
			{	
				$this->error('新增分类失败');
			}
		}
	}

	public function edit()
	{
		$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
		$currentcategory = M('Category')->where('id=' . $id)->find();
		$this->assign('currentcategory', $currentcategory);
		$category = M('Category')->field('id, pid, name')->where('id!=' . $id)->order('o asc')->select();
		$categoryTree = getCategoryTree($category);
		$tree = new Tree($category);
		$str = "<option value=\$id \$selected>\$spacer\$name</option>";  //生成树的形式
		$categoryTree = $tree->get_tree($this->parentIdZreo, $str, $pid);		
		$this->assign('categoryTree', $categoryTree);
		$this->display('form');
	}

	public function del()
	{
		$id = isset($_GET['id']) ? intval($_GET['id']) : false;
		if($id)
		{
			$data['id'] = $id;
			$count = M('Category')->where(array('pid'=>$id))->count();
			if($count)
			{
				die('2');
			}
			else
			{
				M('Category')->where(array('id'=>$id))->delete();
				addlog('删除分类成功，ID：' . $id);
			}
			die('1');
		}
		else
		{
			die('0');
		}
	}

	public function bubble_sort($array)
	{	
		$count = count($array);
		if($count <= 0) return false;
		for($i = 0; $i < $count; $i++)
		{
			for($j = $count - 1; $j > $i; $j--)
			{
				if($array[$j] < $array[$j-1])
				{
					$tmp = $array[$j];
					$array[$j] = $array[$j-1];
					$array[$j-1] = $tmp;
				}
			}
		}	
		return $array;
	}

	public function bin_search($array, $low, $hight, $k)
	{
		if($low <= $hight)
		{
			$mid = intval(($low + $hight)/2);
			if($array[$mid] == $k)
			{
				return $mid;
			}
			else if($k < $array[$mid])
			{
				return $this->bin_search($array, $low, $mid - 1, $k);
			}
			else
			{
				return $this->bin_search($array, $mid+1, $hight, $k);
			}
		}
		return -1;
	}

	public function test()
	{
		$arr = [1,2,3,4,5,6,7,8,9,10];
		$found = $this->bin_search($arr, 1, 10, 10);
		dump($found);
	}
}