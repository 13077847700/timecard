<?php
 /**
 * 首页控制器
 * 显示首页，分配日志到首页
 * Class LoginController
 * @package Admin\Controller
 * @author: 江南烟雨 <773157920@qq.com>
 */

namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index()
    {
		$m = new \Think\Model();
		$p = isset($_GET['p']) ? intval($_GET['p']) : '1';
		$t = time() - 3600 * 24 *60;
		$log = M('Log');
		$log->where("time < $t")->delete();   //删除60天前的日志
		$pagesize = 25;  //每页数量
		$offset = $pagesize * ($p - 1);
		$count = $log->count();
		$list = $log->order('id desc')->limit($offset . ',' . $pagesize)->select();
		$page = new \Think\Page($count, $pagesize);
		$page = $page->show();
		$this->assign('list', $list);
		$this->assign('page', $page);
		
        $this->display();
    }
}