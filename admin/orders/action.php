<?php
include('../../public/common.php');
//如果没登陆则返回
if(empty($_SESSION['adminuser'])){
  header('location:../login.php');
  die;
}
//如果登陆的非管理员，则返回
if($_SESSION['adminuser']['state'] != 0){
  header('location:../login.php');
  die;
}



//链接数据库
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
	die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');

$a = $_GET['a'];
switch($a){
	case 'update';
	$id=$_POST['id'];

	//$uid=$_POST['uid'];
	$linkman= $_POST['linkman'];
	$address = $_POST['address'];
	$code = $_POST['code'];
	$phone = $_POST['phone'];
	//$addtime=time();
	//$total = $_POST['total'];
	$status = $_POST['status'];
	//组合sql语句
	$sql = "update ".PREFIX."orders set linkman='{$address}',code='{$code}',phone='{$phone}',status='{$status}' where id='{$id}'";
	$result=mysql_query($sql);
	if($result && mysql_affected_rows()){
		echo location_js('订单修改成功','./index.php');	
	}else{
		echo location_js('订单修改失败','./index.php');	
		die();
	}
	break;
	case 'delete':
	/*
	$id = $_GET['id'];
	$sql="delete from ".PREFIX."orders where id={$id}";
	$result=mysql_query($sql);
	if($result && mysql_affected_rows()){
		echo location_js('删除成功','./index.php');
	}else{
		echo location_js('删除失败','./index.php');
		die();
	}
	*/
	//订单不可以删除，只能修改为无效订单
	$id = $_GET['id'];
	$sql="update ".PREFIX."orders set status=3 where id='{$id}'";
	//echo $sql;die;
	$result=myQueryUpdate($sql);
	if($result){
		echo location_js('修改为无效订单成功！','./index.php');
	}else{
		echo '删除失败';
	}
	break;
	case 'add':
	//获取数据
	$uid=$_POST['uid'];
	$linkman= $_POST['linkman'];
	$address = $_POST['address'];
	$code = $_POST['code'];
	$phone = $_POST['phone'];
	$addtime=time();
	$total = $_POST['total'];
	$status = $_POST['status'];
	//组合sql
	$sql="insert into ".PREFIX."orders(uid,linkman,address,code,phone,addtime,total,status) values('{$uid}','{$linkman}','{$address}','{$code}','{$phone}','{$addtime}','{$total}','{$status}')";
	//echo $sql;
	//die();
	$result=mysql_query($sql);
	if($result && mysql_insert_id()>0){
		echo location_js('数据插入成功','./index.php');
	}else{
		echo location_js('数据插入失败!','./add.php');
		die();
	}

	break;
}