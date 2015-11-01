<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品信息操作</title>
</head>
<body>
	<center>
		<h2>商品信息操作</h2>
<?php
		
			//载入配置文件
	      require('../../public/config.php');
	      require('../../public/functions.php');


	      //连接数据库操作
	      $link = @mysql_connect(HOST,USER,PASS) or die('数据库连接失败');

	      mysql_select_db(DBNAME,$link);
	      mysql_set_charset('utf8');
	      $path = "../../public/uploads/";

	      $list = array('image/jpeg','image/png','image/gif','image/jpg');

	      //判断动作参数a
	      $a = $_GET['a'];
	      switch($a){ 
	      	case 'insert':

	      	//执行文件上传
	      	$res = uploadFile($_FILES['name'],$path,$list,1024000);

	      	//判断文件上传执行是否成功
	      	if(!$res['error']){ 
	      		//上传失败
	      		die('图片上传失败!原因:'.$res['info']);
	      	}

	      	//获取上传图片信息
	      	$picname = $res['info'];

			$arr = getimagesize($path.$picname);
			
			//文件缩放
			imageResize($picname,$path,70,70,'s_');
			imageResize($picname,$path,170,170,'m_');
			imageResize($picname,$path,350,350,'');

			//执行数据库插入数据操作

			//接收表单信息
			$typeid = $_POST['typeid'];
			$goods = $_POST['goods'];
			$company = $_POST['company'];
			$price = $_POST['price'];
			$store = $_POST['store'];
			$descr = $_POST['descr'];
			$state = 1;//状态
			$num = 0;//销售量
			$clicknum = 0;//点击量
			$addtime = time();//添加时间

			//组合sql语句
			$sql = "insert into ".PREFIX."goods values(null,'{$typeid}','{$goods}','{$company}','{$descr}','{$price}','{$picname}','{$state}','{$store}','{$num}','{$clicknum}','{$addtime}')";

			//echo $sql;

			mysql_query($sql);

			//判断
			if(mysql_insert_id($link) > 0){ 
      		echo "<script>alert('添加商品成功!');window.location.href='./index.php';</script>";
			}else{ 
				
				//删除垃圾图片 
				unlink($path."s_".$picname);
				unlink($path."m_".$picname);
				unlink($path.$picname);

      		echo "<script>alert('添加商品失败!');window.location.href='./index.php';</script>";
			}
	      	break;
	      	//执行修改操作
	      	case 'update':
	      	//接收表单信息
			$typeid = $_POST['typeid'];
			$goods = $_POST['goods'];
			$price = $_POST['price'];
			$store = $_POST['store'];
			$descr = $_POST['descr'];
			$state = $_POST['state'];
			$id = $_POST['id'];

			//处理文件上传
			$path = "../../public/uploads/";

			//查询数据库是否已经存在该图片
			$getsql = "select picname from ".PREFIX."goods where id=".$id;

			$getres = mysql_query($getsql);

			$picnames = mysql_fetch_assoc($getres);
			//判断用户是否进行了新的文件上传操作
			if(empty($_FILES['picname']['name'])){ 
				//更新数据库
				$usql = "update ".PREFIX."goods set goods='{$goods}',typeid='{$typeid}',price='{$price}',store='{$store}',descr='{$descr}',state='{$state}' where id=".$id;
				//echo $usql;
				$ures = mysql_query($usql);

				//判断
				if($ures){ 
					echo "<script>alert('修改成功!');window.location.href='./index.php';</script>";
				}else{ 
					echo "<script>alert('修改失败!');window.location.href='./index.php';</script>";
				}
			}else{ 
				//用户上传了新文件
				//1.删除旧文件
				if(file_exists($path.$_POST['picname']) && file_exists($path.'s_'.$_POST['picname']) && file_exists($path.'m_'.$_POST['picname'])){ 

					//删除旧文件操作
					unlink($path.$_POST['picname']);
					unlink($path.'s_'.$_POST['picname']);
					unlink($path.'m_'.$_POST['picname']);

					//执行文件上传
		      	$res = uploadFile($_FILES['picname'],$path,$list,1024000);

		      	//判断文件上传执行是否成功
		      	if(!$res['error']){ 
		      		//上传失败
		      		die('图片上传失败!原因:'.$res['info']);
		      	}

		      	//获取上传图片信息
		      	$picname = $res['info'];

				$arr = getimagesize($path.$picname);
				
				//文件缩放
				imageResize($picname,$path,70,70,'s_');
				imageResize($picname,$path,170,170,'m_');
				imageResize($picname,$path,350,350,'');

				}else{ 
					echo "<script>alert('修改失败!');window.location.href='./index.php';</script>";
				}
				$usql = "update ".PREFIX."goods set goods='{$goods}',typeid='{$typeid}',price='{$price}',store='{$store}',descr='{$descr}',state='{$state}',picname='{$picname}' where id=".$id;
				
				$ures = mysql_query($usql);

				//判断
				if($ures){ 
					echo "<script>alert('修改成功!');window.location.href='./index.php';</script>";
				}else{ 
					echo "<script>alert('修改失败!');window.location.href='./index.php';</script>";
				}

			}
	      	break;
	      }

?>
	</center>
</body>
</html>

