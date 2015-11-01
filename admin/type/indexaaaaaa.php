<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理分类</title>
</head>
<body>
<table width="100%" border="1">
	<tr>
		<th>分类id</th>
		<th>分类名称</th>
		<th>父类PID</th>
		<th>PATH</th>
		<th>操作</th>
	</tr>
<?php
include('../../public/common.php');

//连接mysql
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
	die('数据库连接失败'.mysql_error());
}
//选择库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');


//遍历出数据
$sql="select * from ".PREFIX."type order by concat(path,id)";
$result=mysql_query($sql);
if($result && mysql_num_rows($result)){
	while($row = mysql_fetch_assoc($result)){
		$m=substr_count($row['path'],',')-1;
		$html=str_repeat("&nbsp;",$m*3);
?>

	<tr>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $html.'|-'.$row['name']; ?></td>
		<td><?php echo $row['pid']; ?></td>
		<td><?php echo $row['path']; ?></td>
		<td>
			<a href="add.php?name=<?php echo $row['name']; ?>&pid=<?php echo $row['id'] ?>&path=<?php echo $row['path'] ?> ">增加</a>
			<a href="edit.php?id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>&pid=<?php echo $row['pid'] ?>&path=<?php echo $row['path'] ?> ">修改</a>
			<a href="action.php?a=delete&id=<?php echo $row['id']; ?>&pid=<?php echo $row['pid'] ?>">删除</a>
		</td>
	</tr>

<?php

	}
}else{
	echo "没有数据";
}

mysql_free_result($result);
mysql_close($conn);

?>
</table>	
</body>
</html>