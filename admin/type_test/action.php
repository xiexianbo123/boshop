<?php
require('../../public/common.php');
//如果没有登录则返回
if(empty($_SESSION['adminuser'])){
	header('location:../login.php');
	die;
}
//如果登陆的非管理员，则返回
if($_SESSION['adminuser']['state'] !=0 ){
	header('location:../login.php');
	die;
}

//链接mysql
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
	die('数据库链接失败'.mysql_error());
}
//选择库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');

$a=$_GET['a'];
switch($a){
	case 'delete':
	$id=$_GET['id'];
	//判断是否有子类 如果有,那么他的ID等于子类的pid
	$sql="select count(*) as total from ".PREFIX."type where pid={$id}";
	$res=mysql_query($sql);
	$total=mysql_result($res,0,0);
	if($total>0){
		echo location_js('请先删除子类目','./index.php');
		die();
	}
	$sqla="delete from ".PREFIX."type where id={$id}";
	$resulta=mysql_query($sqla);
	if($resulta && mysql_affected_rows()){
		echo location_js('删除成功','./index.php');
	}else{
		echo location_js('删除失败','./index.php');
		die();
	}
	break;
	case 'update':
	//查找目标path
	$newSql="select path from".PREFIX."type where id=".$_POST['pid'];
	$result1=mysql_query($newSql);
	$newPath=$newPath.$_POST['pid'].',';

	//先搞定分类，在搞定子分类
	$sqla="update ".PREFIX."type set name='{$_POST['name']}',pid={$_POST['pid']},path='".$newPath."' where id={$_POST['id']}";
	//echo $sqla.'<br />';
	$resa=mysql_query($sqla);

	//子分类path
	$childPath=$newPath.$_POST['id'];//可以不需要
	//子分类path共性,匹配path
	$likePath=$_POST['path'].$_POST['id'];
	$sqlb="update ".PREFIX."type set path=replace(path,{$_GET['pid']},{$_POST['pid']}) where path like '{$likePath}%'";
	//echo $sqlb;
	$resb=mysql_query($sqlb);

	if($resa){
		echo '分类修改成功';
	}else{
		echo '分类修改失败';
	}

	if($resb){
		echo '子分类跟随成功';
	}else{
		echo '子分类跟随失败';
	}

	break;
	case 'add':
	//接收数据
	$name=$_POST['name'];
	$pid=$_POST['pid'];
	$path = $_POST['path'];
	//组合sql
	$sql="insert into ".PREFIX."type values(null,'{$name}','{$pid}','{$path}')";
	//echo $sql;die();
	$result=mysql_query($sql);
	if($result && mysql_insert_id()){
		echo location_js('添加成功','./index.php');
	}else{
		echo location_js('添加失败','./index.php');
	}

	break;
}
mysql_close($conn);