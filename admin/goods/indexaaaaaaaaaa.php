<?php
include('../../public/common.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理商品</title>
</head>
<body>
<table width="100%" border="1">
	<tr>
		<th>商品id</th>
		<th>所属类别</th>
		<th>商品名称</th>
		<th>单价</th>
		<th>商品图片</th>
		<th>状态</th>
		<th>库存量</th>
		<th>被购买数量</th>
		<th>点击次数</th>
		<th>添加时间</th>
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

$state=array(
	'1'=>'新添加',
	'2'=>'在售',
	'3'=>'下架',
	);

$sql = "select g.*,t.name from ".PREFIX."goods as g,".PREFIX."type as t where g.typeid=t.id";
//echo $sql;die();

$result = mysql_query($sql);
if($result && mysql_num_rows($result)>0){
	while($row = mysql_fetch_assoc($result)){
?>

	<tr align="center">
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['goods']; ?></td>
		<td><?php echo $row['price']; ?></td>
		<td><img src="../../public/uploads/64_<?php echo $row['picname']; ?>"></td>
		<td><?php echo $state[$row['state']]; ?></td>
		<td><?php echo $row['store']; ?></td>
		<td><?php echo $row['num']; ?></td>
		<td><?php echo $row['clicknum']; ?></td>
		<td><?php echo date('Y-m-d',$row['addtime']); ?></td>
		<td><a href="edit.php?id=<?php echo $row['id']; ?>&typeid=<?php echo $row['typeid'] ?>" >编辑</a>/<a href="action.php?a=delete&id=<?php echo $row['id']; ?>&picname=<?php echo $row['picname']; ?>">删除</a></td>
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