<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品修改分类页面</title>
</head>
<body>
	<form action="./action.php?a=update" method="post">
		<table align="center" border="1">
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
			
			<tr>
				<td>请选择父分类</td>
				<td>
					<select name="pid">
<?php
		//商品类别信息显示
		//数据库取出数据形成option
		//载入配置文件
      require('../../public/config.php');
      //连接数据库操作
      $link = @mysql_connect(HOST,USER,PASS) or die('数据库连接失败');

      mysql_select_db(DBNAME,$link);
      mysql_set_charset('utf8');

      //定义sql语句并执行返回结果
      $sql = "select * from ".PREFIX."type order by concat(path,id)";
      $result = mysql_query($sql);
      //遍历结果集
      while($row = mysql_fetch_assoc($result)){ 
      		//处理类别名称
          	$m = substr_count($row['path'],',')-1;
         	$padding = str_repeat("&nbsp;",$m*3)."|-";	
         	echo "<option value='{$row['id']}'>".$padding.$row['name']."</option>";
      }

?>
					</select>
				</td>
			</tr>
			<tr>
				<td>修改名称:</td>
				<td><input type="text" name="name" value="<?php echo $_GET['name']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="修改" />
					<input type="reset" value="重置" />
				</td>
			</tr>
		</table>

	</form>
</body>
</html>