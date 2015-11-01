<?php
include('../public/common.php');

//处理后台用户登陆
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
	die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');

$a=$_GET['a'];
switch($a){
	case 'delete';
	$id = $_GET['id'];
	//echo $id;
	//die();
	$dsql="delete from ".PREFIX."users where id={$id}";
	//echo $dsql;
	//die();
	$result=mysql_query($dsql);
	if($result && mysql_affected_rows()){
		echo "<script>alert('删除成功!');window.location.href='./users/index.php';</script>";
	}else{
		echo "<script>alert('失败成功!');window.location.href='./users/index.php';</script>";
	}
	break;
	case 'update':
	$id = $_POST['id'];

	$name = $_POST['name'];
	//$pass = $_POST['pass'];
	$sex = $_POST['sex'];
	$address = $_POST['address'];
	$code = $_POST['code'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$state = $_POST['state'];

	$usql = "update ".PREFIX."users set name='{$name}',sex='{$sex}',address='{$address}',code='{$code}',phone='{$phone}',email='{$email}',state='{$state}' where id='{$id}'";
	//echo $usql;
	//die();

	$result=mysql_query($usql);

	if($result && mysql_affected_rows()){ 
		echo "<script>alert('修改会员信息成功!');window.location.href='./users/index.php';</script>";
	}else{ 
		echo "<script>alert('修改会员信息失败!');window.location.href='./users/index.php';</script>";
	}
	break;
	case 'doAdd':
	//var_dump($_POST);
	$name = $_POST['name'];
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];
	$sex = $_POST['sex'];
	$address = $_POST['address'];
	$code = $_POST['code'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$state = $_POST['state'];
	$addtime = time();

	//判断一下两次密码是否一致
	if($pass != $repass){ 
		echo "<script>alert('两次密码输入不一致!');window.location.href='./users/add.php';</script>";
		exit;
	}else{
		$pass=md5($pass);
		$asql = "INSERT INTO ".PREFIX."users(username,name,pass,sex,address,code,phone,email,state,addtime) VALUES('{$username}','{$name}','{$pass}','{$sex}',
			'{$address}','{$code}','{$phone}','{$email}','{$state}','{$addtime}')";

			mysql_query($asql);
			
			$m = mysql_insert_id($conn);
			if($m > 0){ 
				echo "<script>alert('添加会员成功!');window.location.href='./users/index.php';</script>";
			}else{ 
				echo "<script>alert('添加会员失败!');window.location.href='./users/add.php';</script>";
			}
	}



	break;
	case 'logout':
		//var_dump($_SESSION);die;
		//更新用户的登陆次数和最后登录时间
		$sql="update ".PREFIX."users set lasttime='{$_SESSION['newUserData']['lasttime']}',num='{$_SESSION['newUserData']['num']}' where id='{$_SESSION['adminuser']['id']}'";
		//echo $sql;die;
		$result=mysql_query($sql);

		//清空值
		$_SESSION=array();
		if(isset($_COOKIE[session_name()])){
			setCookie(session_name(),'',time()-1,'/');
		}
		session_destroy();
		echo '<script>alert("退出成功!");window.location.href="login.php";</script>';

	break;
	case 'dologin':

		if(strtolower($_POST['Captcha']) != strtolower($_SESSION['yzm'])){
			echo '<script>alert("验证码不正确!");window.location.href="login.php";</script>';
			die();
		}

		$username = $_POST['username'];
		$pass=md5($_POST['password']);
		//准备sql语句
		$sql="select id,username,pass,state,lasttime,num from shop_users where username='{$username}'";
		// echo $sql;die;
		//
		$result=mysql_query($sql);
		if($result){
			$arr=mysql_fetch_assoc($result);
			//判断是否是管理员
			if($arr['state'] != 0){
				header('location:login.php?error=2');
				die;
			}
			//var_dump($arr);
			//die();
			//判断一下密码是否正确
			
			if($pass == $arr['pass']){
				//密码一致则登录成功，写入session，跳转至首页
				$_SESSION['adminuser'] = $arr;

				//登陆成功后，需要记录用户的登录时间，且登陆次数+1，在用户退出的时候写入数据库
				//登录时间
				$timea=time();
				$num=$arr['num']+1;
				$newUserData=array('lasttime'=>$timea,'num'=>$num);
				
				$_SESSION['newUserData'] = $newUserData;

				header('location:index.php');
			}else{
				echo '<script>alert("密码错误!");window.location.href="login.php";</script>';
			}	
		


		}else{
			echo '<script>alert("用户名错误!");window.location.href="login.php";</script>';
		}
	break;
}

mysql_close($conn);