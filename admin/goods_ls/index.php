<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<script>
	function doDel(id){ 
		if(confirm('确定删除吗?')){ 
			window.location.href='action.php?a=del&id='+id;
		}
	}

</script>
</head>
<body>
	<center>
		<h2>商品浏览页面</h2>
		<table width="100%" border="1">
			<tr>
				<th>商品id</th>
				<th>商品名称</th>
				<th>商品类别</th>
				<th>商品图片</th>
				<th>单价</th>
				<th>库存量</th>
				<th>销售量</th>
				<th>点击量</th>
				<th>状态</th>
				<th>添加时间</th>
				<th>操作</th>
			</tr>
<?php
		  //载入配置文件
	      require('../../public/config.php');

	      //设置状态值
	      $state = array(0=>'新商品',1=>'在售',2=>'已下架');

	      //连接数据库操作
	      $link = @mysql_connect(HOST,USER,PASS) or die('数据库连接失败');

	      mysql_select_db(DBNAME,$link);
	      mysql_set_charset('utf8');

	      //组合sql语句
	      $sql = "select g.*,t.name as typename from ".PREFIX."goods as g,".PREFIX."type as t where g.typeid=t.id order by g.addtime desc";
	      //echo $sql;
	      //发送sql语句并返回查询结果集
	      $result = mysql_query($sql,$link);

	      //判断
	      if($result && mysql_num_rows($result) > 0){ 
	      		//遍历结果集并输出
	      		while($row = mysql_fetch_assoc($result)){ 
	      			echo "<tr>";
	      			echo "<td>{$row['id']}</td>";
	      			echo "<td>{$row['goods']}</td>";
	      			echo "<td>{$row['typename']}</td>";
	      			echo "<td><img src='../../public/uploads/s_{$row['picname']}'/></td>";
	      			echo "<td>{$row['price']}</td>";
	      			echo "<td>{$row['store']}</td>";
	      			echo "<td>{$row['num']}</td>";
	      			echo "<td>{$row['clicknum']}</td>";
	      			echo "<td>{$state[$row['state']]}</td>";
	      			echo "<td>".date("Y-m-d",$row['addtime'])."</td>";
	      			echo "<td><a href='javascript:doDel({$row['id']})'>删除</a> | <a href='edit.php?id={$row['id']}'>修改</a></td>";

	      			echo "</tr>";
	      		}
	      }




?>
		</table>

	</center>
</body>
</html>