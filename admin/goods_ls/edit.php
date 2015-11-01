<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
		<center>
			<h2>商品修改页面</h2>
			<form action="action.php?a=update" method="post" enctype="multipart/form-data">
				<table width="600" border="0">
					<tr>
						<td align="right">商品类别:</td>
						<td>
					<select name="typeid">
<?php
			//载入配置文件
	      require('../../public/config.php');

	      //连接数据库操作
	      $link = @mysql_connect(HOST,USER,PASS) or die('数据库连接失败');

	      mysql_select_db(DBNAME,$link);
	      mysql_set_charset('utf8');

	      //2.定义sql
	      $sql = "select * from ".PREFIX."type order by concat(path,id)";

	      $result = mysql_query($sql);

	      //遍历结果集
	      while($row = mysql_fetch_assoc($result)){ 
	      		$m = substr_count($row['path'],',')-1;
	      		$padding = str_repeat("&nbsp;",$m*4)."|-";

	      		//判断是否是顶级分类
	      		$disabled = ($row['pid'] == 0) ? 'disabled' : '';
	      		echo "<option {$disabled} value='{$row['id']}'>";
	      		echo $padding.$row['name'];
	      		echo "</option>";

	      }

	      //获取商品信息
	      $gsql = "select * from ".PREFIX."goods where id=".$_GET['id'];
	      $result = mysql_query($gsql);

	      $goods = mysql_fetch_assoc($result);

	      	//释放资源
	      	mysql_free_result($result);
	      	mysql_close($link);
?>
					</select>

						</td>
					</tr>

				<tr>
					<td align="right">商品名称:</td>
					<input type="hidden" name="id" value="<?php echo $goods['id']; ?>" />
					<td><input type="text" name="goods" value="<?php echo $goods['goods']; ?>"></td>
				</tr>
				
					<td align="right">商品单价:</td>
					<td><input type="text" name="price" value="<?php echo $goods['price']; ?>"></td>
				</tr>
				<tr>
					<td align="right">商品库存:</td>
					<td><input type="text" name="store" value="<?php  echo $goods['store']; ?>"></td>
				</tr>
				<tr>
					<td align="right">商品图片:</td>
					<td>
						<input type="file" name="picname" />
						<input type="hidden" name="picname" value="<?php echo $goods['picname']; ?>" />
					</td>
				</tr>
				<tr>
					<td align="right">商品状态:</td>
					<td>
						<input type="radio" name="state" <?php echo ($goods['state']==0) ? "checked" : "";   ?>/>新商品
						<input type="radio" name="state" <?php echo ($goods['state']==1) ? "checked" : "";   ?>/>在售
						<input type="radio" name="state" <?php echo ($goods['state']==2) ? "checked" : "";   ?>/>已下架
					</td>
				</tr>
				<tr>
					<td colspan="2" align="middle">
						<img src="../../public/uploads/m_<?php echo $goods['picname']; ?>" />
					</td>
					
				</tr>
				<tr>
					<td align="right">商品简介:</td>
					<td>
						<textarea name="descr" cols="30" rows="5">
							<?php echo $goods['descr'];  ?>
						</textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="添加" />
						<input type="reset" value="重置" />
					</td>
				</tr>
				</table>
			</form>

		</center>

</body>
</html>