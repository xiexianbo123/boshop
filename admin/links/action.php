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



//友情链接数据增删改处理中心
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
	die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');

$a = $_GET['a'];
switch($a){
	case 'delete';
	$id = $_GET['id'];
	$sql="delete from ".PREFIX."links where id=$id";
	//echo $sql;
	//die();
	$result = mysql_query($sql);
	if($result && mysql_affected_rows()){
		echo location_js('链接删除成功','./index.php');
	}else{
		echo location_js('链接删除失败','./index.php');
	}
	break;
	case 'update':
	$id = $_POST['id'];
	//$name = $_POST['name'];
	$url = $_POST['url'];
	$picname = $_POST['picname'];
	$explain = $_POST['explain'];
	//组合sql
	$sql = "update ".PREFIX."links set url='{$url}',picname='{$picname}',explaina='{$explain}' where id=$id";
	//echo $sql;
	//die();
	$result=mysql_query($sql);

	if($result && mysql_affected_rows()){
		echo location_js('修改链接成功','./index.php');
	}else{
		echo location_js('修改链接失败','./index.php');
	}
	break;
	case 'add':
	//获取信息
	$name = $_POST['name'];
	$url = $_POST['url'];
	$picname = $_POST['picname'];
	$explain = $_POST['explain'];
	//组合sql
	$sql="insert into ".PREFIX."links values(null,'{$name}','{$url}','{$picname}','{$explain}')";
	//echo $sql;
	//die();
	$result=mysql_query($sql);
	$m=mysql_insert_id(); //取得上一步insert产生的id
	if($result && $m>0){
		echo location_js('链接添加成功','./index.php');
	}else{
		echo location_js('链接插入失败','./add.php');
	}
	break;
}

mysql_close($conn);