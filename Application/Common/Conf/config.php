<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com>
// +----------------------------------------------------------------------

/**
 * 系统配置文件
 * 所有系统级别的配置
 */
return array(
	//'配置项'=>'配置值'
	
	'COOKIE_SALT' => 'guan', //设置cookie加密密钥
	
	/* 模块相关配置 */
	'DEFAULT_MOUDLE'  => 'Home',
	'MODULE_DENY_LIST'   => array('Common','User','Admin','Install'),
    //'MODULE_ALLOW_LIST'  => array('Home','Admin'),

    /* 系统数据加密设置 */
    'DATA_AUTH_KEY' => '?Ub1,C#Q)k>O!xYprW3"^`*92jh{T}q-R:ln;fmJ', //默认数据加密KEY

    /* 用户相关设置 */
    'USER_MAX_CACHE'     => 1000, //最大缓存用户数
    'USER_ADMINISTRATOR' => 1, //超级管理员用户ID

    /* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'            => 1, //URL模式
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符

    /* 全局过滤配置 */
    'DEFAULT_FILTER' => '', //全局过滤函数

    /* 数据库配置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'timecard', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '123456',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'think_', // 数据库表前缀
       
    //备份配置
    'DB_PATH_NAME' => 'db',        //备份目录名称,主要是为了创建备份目录
    'DB_PATH' => './db/',     //数据库备份路径必须以 / 结尾；
    'DB_PART' => '20971520',  //该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M
    'DB_COMPRESS' => '1',         //压缩备份文件需要PHP环境支持gzopen,gzwrite函数        0:不压缩 1:启用压缩
    'DB_LEVEL' => '9',         //压缩级别   1:普通   4:一般   9:最高

    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__ASSETS__' => __ROOT__ . '/Public/Assets',
        '__UPLOADS__' => __ROOT__ . '/Uploads',
    ),

    /*模板引擎普通标签开始标记*/
    'TMPL_L_DELIM'          =>  "<{",
    'TMPL_R_DELIM'          =>  "}>",

    /*上传文件配置*/
    'UPLOAD_CONFIG' =>array(
        'mimes'         =>  array(), //允许上传的文件MiMe类型
        'maxSize'       =>  0, //上传的文件大小限制 (0-不做限制)
        'exts'          =>  array(), //允许上传的文件后缀
        'autoSub'       =>  true, //自动子目录保存文件
        'subName'       =>  array('date', 'Ymd'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        'rootPath'      =>  './Uploads/', //保存根路径
        'savePath'      =>    'files/cache/', // 设置附件上传（子）目录
        'saveName'      =>  array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveExt'       =>  '', //文件保存后缀，空则使用原后缀
        'replace'       =>  false, //存在同名是否覆盖
        'hash'          =>  true, //是否生成hash编码
        'callback'      =>  false, //检测文件是否存在回调，如果存在返回文件信息数组
        'driver'        =>  '', // 文件上传驱动
        'driverConfig'  =>  array(), // 上传驱动配置
    ),
);