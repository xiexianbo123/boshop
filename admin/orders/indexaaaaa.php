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
	<title>订单查询</title>
</head>
<body>
<table width="100%" border="1">
<tr>
	<th>id</th>
	<th>会员</th>
	<th>联系人</th>
	<th>地址</th>
	<th>邮编</th>
	<th>电话</th>
	<th>购买时间</th>
	<th>总金额</th>
	<th>状态</th>
	<th>用户订单号</th>
	<th>操作</th>
</tr>
<?php
$status=array('新订单','已发货','已收货','无效订单');

//链接数据库
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
	die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');

$sql="select o.*,u.username from ".PREFIX."orders as o,".PREFIX."users as u where o.uid=u.id order by id desc";
//echo $sql;die;

$result=mysql_query($sql);

if($result && mysql_num_rows($result)){
	while($row = mysql_fetch_assoc($result)){
?>

<tr>
	<td><?php echo $row['id'] ?></td>
	<td><?php echo $row['username'] ?></td>
	<td><?php echo $row['linkman'] ?></td>
	<td><?php echo $row['address'] ?></td>
	<td><?php echo $row['code'] ?></td>
	<td><?php echo $row['phone'] ?></td>
	<td><?php echo date('Y-m-d H:i:s',$row['addtime']) ?></td>
	<td><?php echo $row['total'] ?></td>
	<td><?php echo $status[$row['status']]; ?></td>
	<td><?php echo $row['userorder'] ?></td>
	<td><a href="edit.php?id=<?php echo $row['id'] ?>">编辑</a>/<a href="action.php?a=delete&id=<?php echo $row['id'] ?>">删除</a></th>
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