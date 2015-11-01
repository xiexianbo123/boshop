
<DOCTYPE html>

<html>
	<head>
		<title>商品类别信息管理</title>
	</head>

	<body>
<?php
	//载入配置文件
      require('../../public/config.php');

      //连接数据库操作
      $link = @mysql_connect(HOST,USER,PASS) or die('数据库连接失败');

      mysql_select_db(DBNAME,$link);
      mysql_set_charset('utf8');

      switch($_GET['a']){ 
      	case 'insert':
      	//接收表单信息
      	$pid = $_POST['pid'];//父级id
      	$path = $_POST['path'];//路径信息
      	$name = $_POST['name'];//类别名称

      	//var_dump($_POST);
      	//组合sql语句
      	$sql = "insert into ".PREFIX."type values(null,'{$name}','{$pid}','{$path}')";

      	//echo $sql;
      	mysql_query($sql,$link);

      	//判断是否添加成功(根据自增id判断)
      	if(mysql_insert_id($link) > 0){ 
      		echo "<script>alert('添加分类成功!');window.location.href='./index.php';</script>";
      	}else{ 
      		echo "<script>alert('添加分类失败!');window.location.href='./index.php';</script>";
      	}

      	break;

            //处理添加类别信息
            case 'update':
            //var_dump($_POST);
            //取出两个目录（一个新选择的路径，一个原有路径）
            $newSql = "select path from ".PREFIX.'type where id='.$_POST['pid'];
            //echo $newSql;
            $selfSql = "select path,pid from ".PREFIX."type where id=".$_POST['id'];

            //发送sql语句并执行操作
            $result1 = mysql_query($newSql);
            $result2 = mysql_query($selfSql);

            $row1 = mysql_fetch_assoc($result1);
            $row2 = mysql_fetch_assoc($result2);

            //echo $row1['path'].'<br />';
            //echo $row2['path'];
            $newPath = $row1['path'];
            $selfPath = $row2['path'];
            //新插入的path路径
            if($_POST['pid'] == 0){ 
                  $_POST['pid'] = '0,';
            }else{ 
                  $_POST['path'] = $newPath.$_POST['pid'];
            }

            //var_dump($_POST);
            //不能将自己移动到自己的分类中
            if(in_array($row2['pid'],explode(",",$_POST['path']))){
                  echo "<script>alert('不能将".$_POST['name']."移动到自己或者自己的子分类中!');window.location.href='./index.php';</script>";
                  exit;
            }

            //移动分类以及移动分类同时去移动对应的子分类
            /*
                  1   0,      电脑
                  2   0,1,     笔记本
                  3   0,1,2,   联想
                  4   0,      服装
                  5   0,1,    男装
                  6   0,1,5,   西服
            */
            $sPath = $selfPath.$_POST['id'];
            //echo $sPath;
            //现有分类id
            $nPath = rtrim($_POST['path'],',').','.$_POST['id'];
            //echo $nPath;
            $path = $_POST['path'].',';
            //echo $path;
            //组合sql语句
            $sql = "update ".PREFIX."type set path='{$path}',pid={$_POST['pid']} where id=".$_POST['id'];
            //echo $sql;
            //更新主分类
            $res = mysql_query($sql);

            //更新对应下面的所有子分类
            $sql2 = "update ".PREFIX."type set path=replace(path,'{$sPath}','{$nPath}') where path like '{$sPath}%'";
            //echo $sql2;

            $res2 = mysql_query($sql2);

            if($res){ 
                  echo "<script>alert('修改分类成功!');window.location.href='./index.php';</script>";
            }else{ 
                  echo "<script>alert('添加分类失败!');window.location.href='./index.php';</script>";
            }
            break;

            //删除操作
            case 'delete':
            //查找当前要删除的分类下是否有子分类
            $sql = "select count(*) as total from ".PREFIX."type where pid=".$_GET['id'];
            $res = mysql_query($sql);
            $row = mysql_fetch_assoc($res);

            //echo $row['total'];
            $total = $row['total'];

            if($total > 0){ 
                  echo "<script>alert('请先删除子分类!');window.location.href='./index.php';</script>";
                  exit;
            }else{ 
                  $sql = "delete from ".PREFIX."type where id=".$_GET['id'];
                  //echo $sql;die;
                  $res = mysql_query($sql);
                  //判断执行结果
                  if($res){ 
                        echo "<script>alert('删除分类成功!');window.location.href='./index.php';</script>";
                  }else{ 
                        echo "<script>alert('修改分类失败!');window.location.href='./index.php';</script>";
                  }
            }


            break;
      }

?>


	</body>

</html>

