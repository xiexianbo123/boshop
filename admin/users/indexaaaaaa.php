<?php
include('../../public/common.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>遍历用户</title>
</head>
<body>
<table width="99%" border="1">
<?php
//处理后台用户登陆
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
	die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');

$sql="select * from ".PREFIX."users";
$result=mysql_query($sql);
if($result && mysql_affected_rows()){
	while($arr=mysql_fetch_assoc($result)){
		echo '<tr>';
		echo '<td>'.$arr['id'].'</td>';
		echo '<td>'.$arr['username'].'</td>';
		echo '<td>'.$arr['name'].'</td>';
		echo '<td>'.$arr['pass'].'</td>';
		echo '<td>'.$arr['sex'].'</td>';
		echo '<td>'.$arr['address'].'</td>';
		echo '<td>'.$arr['code'].'</td>';
		echo '<td>'.$arr['phone'].'</td>';
		echo '<td>'.$arr['email'].'</td>';
		echo '<td>'.$arr['state'].'</td>';
		echo '<td>'.$arr['addtime'].'</td>';
		echo '</tr>';
	}
}

mysql_free_result($result);
mysql_close($conn);
?>
</table>
</body>
</html>