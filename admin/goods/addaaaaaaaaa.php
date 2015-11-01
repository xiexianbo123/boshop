<?php
include('../../public/common.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加商品</title>
</head>
<body>
<form action="action.php?a=add" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>商品类别:</td>
			<td>
				<select name="typeid">
<?php
//这里需要将网站的所有栏目都遍历出来(每一个栏目都可能成为父栏目)

$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
	die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');

$sql = "select * from ".PREFIX."type order by concat(path,id)";
//echo $sql;die();
$result=mysql_query($sql);
if($result && mysql_num_rows($result)){
	while($row = mysql_fetch_assoc($result)){
		$m=substr_count($row['path'],',')-1;
		$html=str_repeat('&nbsp;',$m*4).'|-';
		//筛选，顶级目录不可以发布商品
		$disabled=($row['pid']==0)?'disabled':'';
		echo "<option value='{$row['id']}' $disabled >{$html}{$row['name']}</option>";
	}
}




mysql_free_result($result);
mysql_close($conn);

?>
				</select>
			</td>
		</tr>
		<tr>
			<td>商品名称:</td>
			<td><input type="text" name="goods" value=""></td>
		</tr>
		<tr>
			<td>生产厂家:</td>
			<td><input type="text" name="company" value=""></td>
		</tr>
		<tr>
			<td>单价:</td>
			<td><input type="text" name="price" value=""></td>
		</tr>
		<tr>
			<td>商品图片:</td>
			<td><input type="file" name="picname" value=""></td>
		</tr>
		<tr>
			<td>库存量:</td>
			<td><input type="text" name="store" value=""></td>
		</tr>
		<tr>
			<td>简介:</td>
			<td><textarea name="descr" cols="80" rows="10"></textarea></td>
		</tr>
		<tr align="center">
			<td colspan="2"><input type="submit" value="提交"> <input type="reset" value="重置"></td>
		</tr>
	</table>
</body>
</html>