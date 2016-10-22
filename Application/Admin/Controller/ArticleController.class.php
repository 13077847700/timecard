<?php
namespace Admin\Controller;
use Vendor\Tree;

class ArticleController extends CommonController
{
	/**
	 * 分类树分配到前台，按分类，按关键字，按时间筛选
	 */
	public function index($p = 1)
	{	
		$sid = isset($_GET['sid']) ? $_GET['sid'] : '';
		$keyword = isset($_GET['keyword']) ? htmlentities($_GET['keyword']) : '';
		$order = isset($_GET['order']) ? $_GET['order'] : 'desc';
		$where = '1 = 1 ';
		$prefix = C('DB_PREFIX');

		//获取栏目分类
		$category = M('Category')->field('id, pid, name')->order('o asc')->select();
		$tree = new Tree($category);
		$str = "<option value=\$id \$selected>\$spacer\$name</option>"; //生成的形式
		$category = $tree->get_tree(0, $str, $sid);    //$sid 有值被选中，没值不选中
		$this->assign('categoryTree', $category);

		if($sid)
		{
			$sids_array = get_category_sons($sid);
			$sids = implode(',', $sids_array);
			$where .="and {$prefix}article.sid in ($sids)";
		}
		if($keyword)
		{
			$where.="and {$prefix}article.title like '%{$keyword}%'";
		}

		//默认按照时间降序
		$orderby = "t desc";
		if($order == "asc")
		{
			$orderby = "t asc";
		}

		//分页
		$article = M('Article');
		$p = intval($p) > 0 ? $p : 1;
		$pagesize = 10;#每页数量
        $offset = $pagesize * ($p - 1);//计算记录偏移量
        $count = $article->where($where)->count();
		
		$list = $article->field("{$prefix}article.*, {$prefix}category.name")->where($where)->order($orderby)->join("{$prefix}category ON {$prefix}article.sid = {$prefix}category.id")->limit($offset . ',' . $pagesize)->select();
		//dump($list);die;
		$page = new \Think\Page($count, $pagesize);
        $page = $page->show();
		$this->assign('list', $list);
		$this->assign('page', $page);
		$this->display();
	}

	public function edit()
	{
		$aid = I('get.aid', '', 'intval');
		$article = M('Article')->where(array('aid'=>$aid))->find();
		if($article)
		{
			$category = M('Category')->field('id, pid, name')->order('o asc')->select();
			$tree = new Tree($category);
			$str = "<option value=\$id \$selected>\$spacer\$name</option>"; //生成的形式
			$category = $tree->get_tree(0, $str, $article['sid']);
			$this->assign('categoryTree', $category);
			$this->assign('article', $article);
		}
		else
		{
			$this->error('参数错误！');
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
		$category = M('Category')->field('id, pid, name')->order('o asc')->select();
		$tree = new Tree($category);
		$str = "<option value=\$id \$selected>\$spacer\$name</option>"; //生成的形式
		$category = $tree->get_tree(0, $str, 0);
		$this->assign('categoryTree', $category);
		$this->display('form');
	}

	public function update($aid = 0)
	{
		$aid = intval($aid);
		$data['sid'] = I('post.sid', '', intval);
		$data['title'] = I('post.title');
		$data['seotitle'] = I('post.seotitle');
		$data['keywords'] = I('post.keywords', '', 'strip_tags');
		$data['description'] = I('post.description', '', 'strip_tags');
		$data['content'] = I('post.editorValue');
		$data['t'] = time();
		if(!$data['sid'] or !$data['title'] or !$data['content'])
		{
			$this->error('警告！文章分类、文章标题及文章内容必须！');
		}
		if($aid)
		{
			M('article')->data($data)->where(array('aid'=>$aid))->save();
			addlog('编辑文章，AID：' . $aid);
			$this->success('恭喜，编辑文章成功！');
		}
		else
		{
			$aid = M('article')->data($data)->add();
			if($aid)
			{
				addlog('新增文章，AID:' . $aid);
				$this->success('恭喜！文章新增成功');
			}
			else
			{
				$this->error('文章新增失败');
			}
		}
	}

	public function del()
	{
		$aids = I('request.aids', '', 'intval');
		if($aids)
		{
			if(is_array($aids))
			{
				$aids = implode(',', $aids);
				$map['aid'] = array('in', $aids);
			}
			else
			{
				$map = 'aid=' . $aids;
			}
			$row = M('article')->where($map)->delete();
			if($row)
			{
				addlog('删除文章，AID:' . $aids);
				$this->success('文章删除成功');
			}
			else
			{
				$this->error('文章删除失败');
			}
		}
		else
		{
			$this->error('参数错误');
		}
	}
}