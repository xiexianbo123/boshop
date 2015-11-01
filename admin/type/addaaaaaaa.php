<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加分类</title>
</head>
<body>
<?php
//该字段4个参数，需要传3个进去
$name="根目录";
$path='0,';
$pid=0;
if(isset($_GET['name']) && isset($_GET['pid']) && isset($_GET['path'])){
	$name=$_GET['name'];
	$pid=$_GET['pid'];
	$path=$_GET['path'].$pid.',';
}

?>
<form action="action.php?a=add" method="post">
<input type="hidden" name="path" value="<?php echo $path; ?>">
<input type="hidden" name="pid" value="<?php echo $pid; ?>">
<table width="300" border="0">
	<tr>
		<td>父级分类:</td>
		<td><?php echo $name; ?></td>
	</tr>
	<tr>
		<td>分类名称:</td>
		<td><input type="text" name="name" value=""></td>
	</tr>
	<tr align="center">
		<td colspan="2"><input type="submit" value="提交"> <input type="reset" value="重置" ></td>
	</tr>
</table>
</form>	
</body>
</html>