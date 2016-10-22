<?php
namespace Common\Controller;
use Think\Controller;
/**
 * 前后台集成的公共类
 * 功能说明：管理后台模块公共控制器，用于储存公共数据。
 */
 class BaseController extends Controller
 {
	/**
	 * 处理通用的初始化
	 */ 
	 public function _initialize()
	 {
		 C(setting());
	 }
 }