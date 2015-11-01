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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>友情链接</title>
</head>
<body>
	<table width="100%" border="1">
		<tr>
			<th>id</th>
			<th>站点名称</th>
			<th>站点url</th>
			<th>logo地址</th>
			<th>文字说明</th>
			<th>操作</th>
		</tr>
<?php
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
	die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');

$sql="select * from ".PREFIX."links";
$result=mysql_query($sql,$conn);

//mysql_num_rows() 取得结果集中行的数目，仅对select语句有效
if($result && mysql_num_rows($result)>0){
	//解析结果集
	while($row = mysql_fetch_assoc($result)){
?>

		<tr>
			<td><?php echo $row['id'] ?></td>
			<td><?php echo $row['name'] ?></td>
			<td><?php echo $row['url'] ?></td>
			<td><?php echo $row['picname'] ?></td>
			<td><?php echo $row['explaina'] ?></td>
			<td><a href="./edit.php?id=<?php echo $row['id']; ?>">编辑</a>/<a href="./action.php?a=delete&id=<?php echo $row['id'] ?>">删除</a></td>
		</tr>
<?php
	}
	
}

mysql_free_result($result);
mysql_close($conn);
?>
	</table>
</body>
</html>