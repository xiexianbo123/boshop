<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改分类</title>
</head>
<body>
<form action="action.php?a=update&pid=<?php echo $_GET['pid'] ?>" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
<input type="hidden" name="path" value="<?php echo $_GET['path']; ?>">
<table width="300" border="0">
	<tr>
		<td>父级分类</td>
		<td>
			<select name="pid">
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
		$m=substr_count($row['path'],',' );
		$html=str_repeat('&nbsp',($m-1)*4);
		if($row['id']==$_GET['pid']){
			echo "<option value='{$row['id']}' selected >".$html.'|-'.$row['name']."</option>";
		}else{
			echo "<option value='{$row['id']}'>".$html.'|-'.$row['name']."</option>";
		}
	}
}else{
	echo "没有数据";
}

mysql_free_result($result);
mysql_close($conn);

?>
			</select>
		</td>
	</tr>
	<tr>
		<td>分类名称:</td>
		<td><input type="text" name="name" value="<?php echo $_GET['name'] ?>"></td>
	</tr>
	<tr align="center">
		<td colspan="2"><input type="submit" value="提交"> <input type="reset" value="重置" ></td>
	</tr>
</table>	
</body>
</form>
</html>