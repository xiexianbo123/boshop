<?php
require('../public/common.php');

$a=$_GET['a'];
switch($a){
	case 'del':
	$id=$_GET['id'];
	$sql="delete from ".PREFIX."comment where id={$id}";
	$result=myQueryDelete($sql);
	if($result){
		echo location_js('删除成功','./showcomment.php');
	}else{
		echo '失败';
	}
	break;
	case 'add':
	//var_dump($_POST);
	//获取数据条数；
	$num=count($_POST)/6;
	//遍历拼接，组合sql
	for($i=0;$i<$num;$i++){
		//拼接变量名
		$orderid='orderid'.$i;
		$goodsid='goodsid'.$i;
		$name='name'.$i;
		$price='price'.$i;
		$score='score'.$i;
		$content='content'.$i;
		$addtime=time();
		$str.="(null,'{$_SESSION['user']['id']}','{$_POST[$orderid]}','{$_POST[$goodsid]}','{$_POST[$name]}','{$_POST[$price]}','{$_POST[$content]}','{$_POST[$score]}','{$addtime}'),";
	}
	//清除右边的逗号
	$str=rtrim($str,',');
	
	//sql插入多条数据
	$sql="insert into ".PREFIX."comment values".$str;
	//echo $sql; die;
	$result=myQueryInsert($sql);
	//var_dump($result);
	if($result){
		echo location_js('评论成功','./showcomment.php');
	}else{
		echo '失败';
	}
	break;
}