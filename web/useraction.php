<?php
include('../public/common.php');

//处理用户注册，登录，退出
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
	die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');

$a=$_GET['a'];
switch($a){
	case 'update':
	$id=$_SESSION['user']['id'];

	//$pass=$_POST['pass'];
	$name=$_POST['name'];
	$sex=$_POST['sex'];
	$address=$_POST['address'];
	$code=$_POST['code'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$oldmypic=$_POST['oldmypic']; //原头像

	$file=$_FILES['mypic'];
	$path='../public/user/';
	//$mypic=$_SESSION['user']['username']; //将用户名作为，图片名，函数随即
	//判断用户是否上传图片
	//var_dump($_FILES);die;
	if(empty($file['name'])){
		$sql="update ".PREFIX."users set pass='{$pass}',name='{$name}',sex='{$sex}',address='{$address}',code='{$code}',phone='{$phone}',email='{$email}' where id='{$id}'";
		//echo $sql;die;
		$result=myQueryUpdate($sql);
		if($result){
			echo location_js('资料修改成功','ucenter.php');
		}else{;
			echo location_js('失败','ucenter.php');
		}
	}else{
		//删除原图,加入
		if(file_exists($path.$oldmypic)){
			unlink($path.$oldmypic);
		}

		$type=array('image/jpeg','image/png','image/gif');       //允许上传文件的MIME类型
		$size=1024000;   //允许上传的文件大小,手动指定约1M
		//上传新图片
		//echo $path;die;

		$res = uploadFile($file,$path,$type,$size);
		if(!$res['error']){
			echo '文件上传失败,错误原因'.$res['info'];
			die();
		}
		//缩放图片
		imageResize($res['info'],$path,160,160); 

		$sql="update ".PREFIX."users set pass='{$pass}',name='{$name}',sex='{$sex}',address='{$address}',code='{$code}',phone='{$phone}',email='{$email}',mypic='{$res['info']}' where id='{$id}'";
		//echo $sql;die;
		$result=myQueryUpdate($sql);
		if($result){
			echo location_js('资料修改成功','ucenter.php');
		}else{;
			echo location_js('失败','ucenter.php');
			unlink($path.$oldmypic);
		}

	}
	break;
	case 'logout':
	//用户退出
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setCookie(session_name(),'',time()-1,'/');
	}
	session_destroy();
	echo location_js('退出成功','./index.php');
	break;
	case 'dologin':
		//判断验证码
		if(strtolower($_POST['yzm']) != strtolower($_SESSION['yzm'])){
			echo location_js('验证码不正确！','./login.php');
			die();
		}
		$username = $_POST['username'];
		$pass=md5(trim($_POST['pass']));
		//组合sql
		$sql="select id,username from ".PREFIX."users where username='{$username}' and pass='{$pass}'";
		//echo $sql;die();
		$result=mysql_query($sql);
		if($result && mysql_num_rows($result)>0){
			$row=mysql_fetch_assoc($result);
			//判断该用户是否被禁止
			if($row['state']==2){
				echo location_js('您的账号已被禁用','请拨打客服电话110了解详情');
				die;
			}
			//将信息存放到session
			$user=array('id'=>$row['id'],'username'=>$row['username']);
			$_SESSION['user']=$user;
			echo location_js('您已登录成功,即将跳转至首页','./index.php');
		}else{
			echo location_js('您的用户名或密码错误','./login.php');
		}

	break;
	case 'doreg':
		if(strtolower($_POST['yzm']) != strtolower($_SESSION['yzm'])){
			echo location_js('验证码不正确！','./reg.php');
			die();
		}

		$username = $_POST['username'];
		$pass=$_POST['pass'];
		$repass=$_POST['repass'];
		if($pass != $repass){
			echo location_js('两次密码不一致！','./reg.php');
			die();
		}
		$pass=md5($pass);
		//准备sql语句
		$sql="insert into ".PREFIX."users(username,pass) values('{$username}','{$pass}')";
		$result = mysql_query($sql);
		if($result && mysql_insert_id($conn)>0){
			//将信息存放到session
			$user=array('id'=>mysql_insert_id($conn),'username'=>$username);
			$_SESSION['user']=$user;
			echo location_js('您已注册成功,即将跳转至首页','./index.php');
		}else{
			echo location_js('注册失败','./reg.php');
		}
	break;
}

mysql_close($conn);