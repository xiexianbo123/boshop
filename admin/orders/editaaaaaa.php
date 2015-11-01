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
	<title>修改订单</title>
</head>
<body>
<?php

//接收ID
$id = $_GET['id'];

//链接数据库
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
	die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');


$sql="select * from ".PREFIX."orders where id={$id}";

$result=mysql_query($sql);

if($result && mysql_num_rows($result)){
	$row = mysql_fetch_assoc($result);
}
mysql_free_result($result);
mysql_close($conn);

?>

<form action="action.php?a=update" method="post">
<input type="hidden" name="id" value="<?php echo $id ?>" />
	<table>
	<tr>
		<td>会员ID:</td>
		<td><input type="text" name="uid" value="<?php echo $row['uid'] ?>"></td>
	</tr>
	<tr>
		<td>联系人:</td>
		<td><input type="text" name="linkman" value="<?php echo $row['linkman'] ?>"></td>
	</tr>
	<tr>
		<td>地址:</td>
		<td><input type="text" name="address" value="<?php echo $row['address'] ?>"></td>
	</tr>
	<tr>
		<td>邮编:</td>
		<td><input type="text" name="code" value="<?php echo $row['code'] ?>"></td>
	</tr>
	<tr>
		<td>电话:</td>
		<td><input type="text" name="phone" value="<?php echo $row['phone'] ?>"></td>
	</tr>
	<tr>
		<td>总金额:</td>
		<td><input type="text" name="total" value="<?php echo $row['total'] ?>"></td>
	</tr>
	<tr>
		<td>状态:</td>
		<td>
			<input type="radio" name="status" value="0" <?php echo ($row['status']==0)?'checked':''; ?> />新订单
			<input type="radio" name="status" value="1" <?php echo ($row['status']==1)?'checked':''; ?> >已发货
			<!--<input type="radio" name="status" value="2" <?php echo ($row['status']==2)?'checked':''; ?> >已收货-->
			<input type="radio" name="status" value="3" <?php echo ($row['status']==3)?'checked':''; ?> >无效订单
		</td>
	</tr>
	<tr align="center">
		<td colspan="2"><input type="submit" value="提交"> <input type="reset" value="重置"></td>
	</tr>
	</table>
</form>
</body>
</html>