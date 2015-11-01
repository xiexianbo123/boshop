<?php
require('../../public/common.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>订单详情</title>
</head>
<body>
	<table width="100%" border="1">
	<tr>
		<th>id</th>
		<th>订单ID号</th>
		<th>商品ID号</th>
		<th>商品名称</th>
		<th>单价</th>
		<th>数量</th>
		<th>用户订单号</th>
	</tr>	
<?php
//遍历输出订单详情
$sql="select * from ".PREFIX."detail order by id desc";
$result = myQuery($sql);
foreach($result as $value){
?>

	<tr>
		<td><?php echo $value['id']; ?></td>
		<td><?php echo $value['orderid']; ?></td>
		<td><?php echo $value['goodsid']; ?></td>
		<td><?php echo $value['name']; ?></td>
		<td><?php echo $value['price']; ?></td>
		<td><?php echo $value['num']; ?></td>
		<td><?php echo $value['userorder']; ?></td>
	</tr>	

<?php
}


?>
	</table>
</body>
</html>