<?php
require('../public/common.php');

$a=$_GET['a'];
switch($a){
	case 'update':
	$id = $_POST['id'];

	$linkman = $_POST['linkman'];
	$address = $_POST['address'];
	$code = empty($_POST['code']) ? '0' : $_POST['code'];
	$phone =$_POST['phone'];
	$mobile = empty($_POST['mobile']) ? '0' :$_POST['mobile'];

	//组合sql
	$sql="update ".PREFIX."address set linkman='{$linkman}',address='{$address}',code='{$code}',phone='{$phone}',mobile='{$mobile}' where id='{$id}'";
	//echo $sql;die;
	$result = myQueryUpdate($sql);
	if($result){
		header('location:./confirm.php');
	}else{
		echo '修改失败';
	}
	break;
	case 'del':
	$id = $_GET['id'];
	$sql = "delete from ".PREFIX."address where id={$id}";
	//echo $sql;die;
	$result = myQueryDelete($sql);
	if($result){
		header('location:./confirm.php');
	}
	break;
	case 'add':
	$uid = $_SESSION['user']['id'];
	$linkman = $_POST['linkman'];
	$address = $_POST['address'];
	$code = empty($_POST['code']) ? '0' : $_POST['code'];
	$phone =$_POST['phone'];
	$mobile = empty($_POST['mobile']) ? '0' :$_POST['mobile'];
	//组合sql
	$sql="insert into ".PREFIX."address values(null,'{$uid}','{$linkman}','{$address}','{$code}','{$phone}','{$mobile}')";
	//echo $sql;die;
	$result=myQueryInsert($sql);
	header('location:./confirm.php');
	break;
}