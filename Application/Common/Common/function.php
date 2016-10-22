<?php
/**
 * 功能说明： 模块公共文件
 */
 
 /**
  * 函数：网站配置获取函数
  * @param  string $k      可选，配置名称
  * @return array          用户数据
  */
function setting($k = 'all')
{
   $cache = S($k);
   //如果缓存不为空直接返回
   if(null != $cache)
   {
	    return $cache;   
   }  
   $data = '';
   $setting = M('Setting');
   //判断是否查询全部设置项
   if($k == 'all')
   {
	    $setting = $setting -> field('k,v') -> select();
		foreach($setting as $v)
		{
			$config[$v['k']] = $v['v'];	
		}
		$data = $config;
   }
   else
   {
        $result = $setting -> where("k = '{$k}'") -> find();
		$data = $result['v'];
   }
   
   //建立缓存
   if($data)
   {
	   S($k,$data);
   }
   return $data;
}
  
/**
* 加密函数
* @param string            密码
* @return string           加密后的密码
*/
function password($password)
{
	return md5('H' . $password . 'G'); 
}

/**
 * 函数：格式化字节大小
 * @param  number $size 字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 */
function format_bytes($size, $delimiter = '')
{
  $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
  for($i = 0; $size >= 1024 && $i < 5; $i++)
  {
    $size /= 1024;
  }
  return round($size, 2) . $delimiter . $units[$i];
}


/**
 * 获取自己和子孙节点的id($sid)
 *
 * @param    $sid    当前节点
 * @param    array  The array
 *
 * @return   array  自己和子孙节点id
 */
function get_category_sons($sid, &$array=[])
{
	$categorys = M('Category')->where(array('pid'=>$sid))->select();
	//dump($categorys);die;
	$array = array_merge($array, array($sid));
	foreach($categorys as $category)
	{
		get_category_sons($category['id'], $array);
	}
	$data = $array;
	unset($array);
	return $data;
}


