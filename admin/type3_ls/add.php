
<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8" />
		<title>添加分类页面</title>
	</head>

	<body>	
	<center>
<?php   
	//处理pid和path信息
	$name = "根类别";
	$pid = 0;
	$path = "0,";

	//判断有没有参数传递
	if(isset($_GET['pid']) && isset($_GET['path'])){ 
		$name = $_GET['name'];
		$pid = $_GET['pid'];
		$path = $_GET['path'].$_GET['pid'].',';
		
	}	



?>
		<form action="./action.php?a=insert" method="post">
			<table width="280" border="1">
			<input type="hidden" name="pid" value="<?php echo $pid;?>" />
			<input type="hidden" name="path" value="<?php echo $path;?>" />
				<tr>
					<td>父类名称:</td>
					<td><?php  echo $name;  ?></td>
				</tr>
				<tr>
					<td>类别名称:</td>
					<td><input type="text" name="name" /></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="添加" />
						<input type="reset" value="重置" />
					</td>
				</tr>
			</table>
		</form>

	</center>

	</body>

</html>