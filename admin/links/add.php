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
	<form action="./action.php?a=add" method="post">
	<table width="320" border="0">
		<tr>
			<td>站点名称:</td>
			<td><input type="text" name="name" value="" /></td>
		</tr>
		<tr>
			<td>站点url:</td>
			<td><input type="text" name="url" value="" /></td>
		</tr>
		<tr>
			<td>logo地址:</td>
			<td><input type="text" name="picname" value=""> <!--<span onclick="window.open('http://m.baidu.com','bd','width=400,height=400')">上传</span>--></td>
		</tr>
		<tr>
			<td>文字说明:</td>
			<td><input type="text" name="explain" value="" /></td>
		</tr>
		<tr align="center">
			<td colspan="2"><input type="submit" value="提交" /> <input type="reset" value="重置"></td>
		</tr>
	</table>
	</form>
</body>
</html>