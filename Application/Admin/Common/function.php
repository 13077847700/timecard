<?php

/**
 * 增加日志
 * @param $log
 * @param bool $name
 */
 
function addlog($log, $name = false)
{
	$m = M('Log');
	if(!$name)
	{
		session_start();
	 	$uid = session('uid');
		if($uid)
		{
			$user = M('Member') -> field('username') -> where(array('id' => $uid)) -> find();	
			$data['username'] = $user['username'];   //$data数据添加到Log表
		} 
		else
		{
			$data['username'] = '';	
		}
	}
	else
	{
		$data['username'] = $name;
	}
	$data['time'] = time();
	$data['ip'] =  $_SERVER["REMOTE_ADDR"];
	$data['log'] = $log;
	$m->data($data)->add();
}

/**
 * 获取用户信息
 */
function member($uid, $field = false)
{
	$member = M('Member');
	if($field)
	{
		return $member->field($field)->where(array('id'=>$uid))->find();	
	}
	else
	{
		return $member->where(array('id'=>$uid))->find();	
	}
}