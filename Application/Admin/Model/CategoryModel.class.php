<?php
namespace Admin\Model;
use Vendor\Tree;

class CategoryModel extends Model
{
	public function getCategoryTree($array)
	{
		$tree = new Tree($array);
		$str = "<option value=\$id \$selected>\$spacer\$name</option>";  //生成树的形式
		$categoryTree = $tree->get_tree(0, $str, $pid);
	}	
}