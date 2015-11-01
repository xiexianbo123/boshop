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
	<title>增加友链</title>
</head>
<body>
	<form action="./action.php?a=update" method="post">
	<table width="320" border="0">
<?php
$id=$_GET['id'];

$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
	die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');

$sql="select * from ".PREFIX."links where id={$id}";
//echo $sql;
//die();
$result=mysql_query($sql);
if($result && mysql_num_rows($result)){
	//只有一条数据
	$row = mysql_fetch_assoc($result);
}

mysql_free_result($result);
mysql_close($conn);

?>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<tr>
			<td>站点名称:</td>
			<td><?php echo $row['name'] ?></td>
		</tr>
		<tr>
			<td>站点url:</td>
			<td><input type="text" name="url" value="<?php echo $row['url']; ?>" /></td>
		</tr>
		<tr>
			<td>logo地址:</td>
			<td><input type="text" name="picname" value="<?php echo $row['picname'] ?>" /></td>
		</tr>
		<tr>
			<td>文字说明:</td>
			<td><input type="text" name="explain" value="<?php echo $row['explaina']; ?>" /></td>
		</tr>
		<tr align="center">
			<td colspan="2"><input type="submit" value="提交" /> <input type="reset" value="重置"></td>
		</tr>
	</table>
	</form>
</body>
</html>