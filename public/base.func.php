<?php
include 'yzm.func.php';
include 'upimage.php';

//下面为自定义函数

//定义一个函数reg_search() 搜索结果,关键词替换标红
/*
	@param string $wd   查找的目标值;
	@param string $str  执行替换的字符串;
	return string $char    替换后的字符串
 */
function reg_search($wd,$str){
	$wd=strtolower($wd);
	$str=strtolower($str);
	$char=str_replace($wd,"<font color='red'>{$wd}</font>",$str);
	return $char;
}

//"<script>alert('删除成功!');window.location.href='./users/index.php';</script>"
//定义一个函数，控制跳转，提示成功等
function location_js($str,$url){
	return "<script>alert('{$str}');window.location.href='{$url}';</script>";
}
