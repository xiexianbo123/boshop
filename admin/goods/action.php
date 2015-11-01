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

//商品处理中心


//处理后台用户登陆
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
	die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');

//下面都需要用到的
$path='../../public/uploads/';

$a=$_GET['a'];
switch($a){
	case 'delete';
	//删除，除了删除数据，还要删除图片
	$id = $_GET['id'];
	$picname = $_GET['picname'];
	if(file_exists($path.'64_'.$picname) && file_exists($path.'218_'.$picname) && file_exists($path.'428_'.$picname) && file_exists($path.$picname)){
		unlink($path.'64_'.$picname);
		unlink($path.'218_'.$picname);
		unlink($path.'428_'.$picname);
		unlink($path.$picname);
	}

	$sql = "delete from ".PREFIX."goods where id={$id}";
	$result = mysql_query($sql);
	if($result && mysql_affected_rows()){
		echo location_js('删除成功','./index.php');
	}else{
		echo location_js('删除失败','./index.php');
		die();
	}

	break;
	case 'update';
	//更新商品，如果用户上传了新图，那么我们要替换新图，删除原图
	//如果用户没有上传图片，我们只用修改数据
	//接收数据
	$id = $_POST['id'];

	$typeid = $_POST['typeid'];
	$goods = $_POST['goods'];
	$company = $_POST['company'];
	$price = $_POST['price'];
	$store = $_POST['store'];
	$state = $_POST['state'];
	$tag = $_POST['tag'];
	$descr = $_POST['descr'];

	$file = $_FILES['picname'];

	$picname = $_POST['picname'];//商品原图,用户删除

	//图片处理目录
	$path='../../public/uploads/';

	//判断用户是否上传了图片,为空，则未上传图片,不为空，则上传图片
	if(empty($file['name'])){
		$sql="update ".PREFIX."goods set typeid='{$typeid}',goods='{$goods}',company='{$company}',price='{$price}',store='{$store}',state='{$state}',tag='{$tag}',descr='{$descr}' where id='{$id}'";
		//echo $sql;die();
		$result = mysql_query($sql);
		if($result && mysql_affected_rows()){
			echo location_js('商品修改成功!','./index.php');
		}else{
			echo location_js('商品修改失败!','./index.php');
			die();
		}
	}else{
		//如果用户上传了图片,删除原图，上传新图，插入信息
		//删除原图
		if(file_exists($path.'64_'.$picname) && file_exists($path.'218_'.$picname) && file_exists($path.'428_'.$picname) && file_exists($path.$picname)){
			unlink($path.'64_'.$picname);
			unlink($path.'218_'.$picname);
			unlink($path.'428_'.$picname);
			unlink($path.$picname);
		}

		$type=array('image/jpeg','image/png','image/gif');       //允许上传文件的MIME类型
		$size=1024000;   //允许上传的文件大小,手动指定约1M
		//上传新图片
		$res = uploadFile($file,$path,$type,$size);
		if(!$res['error']){
			echo '文件上传失败,错误原因'.$res['info'];
			die();
		}
		//缩放图片
		imageResize($res['info'],$path,64,64,'64_'); //缩放图片为64宽高的尺寸，文件名以64_开头
		imageResize($res['info'],$path,218,218,'218_');
		imageResize($res['info'],$path,428,428,'428_');

		///数据插入数据库
		$sql="update ".PREFIX."goods set typeid='{$typeid}',goods='{$goods}',company='{$company}',price='{$price}',picname='{$res['info']}',store='{$store}',state='{$state}',tag='{$tag}',descr='{$descr}' where id='{$id}'";
		//echo $sql;die();
		$result = mysql_query($sql);
		if($result && mysql_affected_rows()){
			echo location_js('商品修改成功!','./index.php');
		}else{
			echo location_js('商品修改失败!','./index.php');
			//如果图片上传了，但是数据库写入失败呢?我们任然要删除上传的图
			unlink($path.'64_'.$res['info']);
			unlink($path.'218_'.$res['info']);
			unlink($path.'428_'.$res['info']);
			unlink($path.$res['info']);
			die();
		}

	}
	break;
	case 'delete';
	$id=$_GET['id'];
	$sql="delete from ".PREFIX."goods where id={$id}";
	$result = mysql_query($sql);
	if($result && mysql_affected_rows()){
		echo location_js('商品删除成功','./index.php');
	}else{
		echo location_js('商品删除失败','./index.php');
		die();
	}
	break;
	case 'add':
	//图片上传
	$file=$_FILES['picname'];  //需要上传的文件
	//var_dump($file);
	//使用封装函数上传图片，并且获取到图片名
	$path='../../public/uploads/';   //上传的目录
	$type=array('image/jpeg','image/png','image/gif');       //允许上传文件的MIME类型
	$size=1024000;   //允许上传的文件大小,手动指定约1M
	$res=uploadFile($file,$path,$type,$size);
	if(!$res['error']){
		echo location_js("文件上传失败，原因:{$res['info']}",'add.php');
		die();
	}
	//ok,文件上传成功，这里可以执行缩放了
	imageResize($res['info'],$path,64,64,'64_'); //缩放图片为64宽高的尺寸，文件名以64_开头
	imageResize($res['info'],$path,218,218,'218_');
	imageResize($res['info'],$path,428,428,'428_');
	//ok,图片上传成功

	//获取数据
	$typeid=$_POST['typeid'];
	$goods = $_POST['goods'];
	$company = $_POST['company'];
	$descr = $_POST['descr'];
	$price = $_POST['price'];
	$picname = $file;
	$store = $_POST['store'];
	$addtime = time();
	$tag = $_POST['tag'];
	//组合sql语句
	$sql="insert into ".PREFIX."goods(typeid,goods,company,descr,price,picname,store,addtime,tag) values('{$typeid}','{$goods}','{$company}','{$descr}','{$price}','{$res['info']}','{$store}','{$addtime}','{$tag}')";
	//echo $sql;
	//die();
	$result = mysql_query($sql);
	//echo mysql_insert_id($conn);
	if($result && mysql_insert_id($conn)>0){
		echo location_js('商品添加成功','./index.php');
	}
	break;
}