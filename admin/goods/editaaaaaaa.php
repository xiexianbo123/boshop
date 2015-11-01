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
<form action="action.php?a=update" method="post" enctype="multipart/form-data">
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

$sql = "select * from ".PREFIX."type";
$result = mysql_query($sql);
if($result && mysql_num_rows($result)>0){
	while($row = mysql_fetch_assoc($result)){
		$data[]=$row;
	}
}
//echo '<pre>';
//print_r($data);
//echo '<hr />';

//核心思想：根据pid找子类
//下面写函数，递归重新排序,依据PID
//先来和简单的，已知pid,然后找pid相等的数据
function dataSort($data,$pid,$level=0){
	$arr = array();  //这个不能放在foreach循环中,不然每次都会清0
	foreach($data as $value){
		if($value['pid'] == $pid){  //如果条件匹配，则将该数据放到一个新的数组当中
			$value['level']=$level;
			$arr[]=$value; //$arr为二维数组，$value为一维数组 
			$lsid = $value['id']; //取出pid匹配的数据的ID,万一他也有子类呢?拿他的id继续去匹配pid
			$arr=array_merge($arr,dataSort($data,$lsid,$level+1));   //这次匹配结果，合并下次匹配结果，函数返回的是二维数组或空数组，凭借(合并)二维数组
		}
	}
	return $arr;   //如果pid存在,返回一个二维数组，如果pid不存在返回空数组
}

//print_r(dataSort($data,5));
$dataList = dataSort($data,0);  //0为顶级分类，所有的其他分类都是依赖0下面

$typeid = $_GET['typeid'];
foreach($dataList as $v){
	$html=str_repeat('----',$v['level']);
	if($v['level']==0){

	}
	if($v['level']==0){
		echo "<option value='{$v['id']}' disabled />|{$html}{$v['name']}</option>";
	}elseif($v['id'] == $typeid){
		echo "<option value='{$v['id']}' selected />|{$html}{$v['name']}</option>";
	}else{
		echo "<option value='{$v['id']}'>|{$html}{$v['name']}</option>";
	}

}


//上面是获取商品分类
//下面是根据获取ID得到产品信息
$id = $_GET['id'];
$sqla="select * from ".PREFIX."goods where id={$id}";
//echo $sqla;
//die();
$resulta=mysql_query($sqla);

if($resulta && mysql_num_rows($resulta)>0){
	$rowa=mysql_fetch_assoc($resulta);  
}


mysql_free_result($resulta);

mysql_free_result($result);
mysql_close($conn);

?>
				</select>
			</td>
		</tr>
<input type="hidden" name="id" value="<?php echo $id ?>">
		<tr>
			<td>商品名称:</td>
			<td><input type="text" name="goods" value="<?php echo $rowa['goods']; ?>"></td>
		</tr>
		<tr>
			<td>生产厂家:</td>
			<td><input type="text" name="company" value="<?php echo $rowa['company']; ?>"></td>
		</tr>

		<tr>
			<td>单价:</td>
			<td><input type="text" name="price" value="<?php echo $rowa['price']; ?>"></td>
		</tr>
		<tr>
			<td>库存量:</td>
			<td><input type="text" name="store" value="<?php echo $rowa['store']; ?>"></td>
		</tr>
		<tr>
			<td>商品原图:</td>
			<input type="hidden" name="picname" value="<?php echo $rowa['picname']; ?>" />
			<td><img src="../../public/uploads/218_<?php echo $rowa['picname']; ?>"></td>
		</tr>
		<tr>
			<td>商品新图:</td>
			<td><input type="file" name="picname" value=""></td>
		</tr>
		<tr>
			<td>状态:</td>
			<td>
				<input type="radio" name="state" value='1' <?php echo ($rowa['state']==1)?'checked':''; ?> >新添加
				<input type="radio" name="state" value='2' <?php echo ($rowa['state']==2)?'checked':''; ?> >在售
				<input type="radio" name="state" value='3' <?php echo ($rowa['state']==3)?'checked':''; ?> >下架
			</td>
		</tr>
		<tr>
			<td>简介:</td>
			<td><textarea name="descr" cols="80" rows="10"><?php echo $rowa['descr']; ?></textarea></td>
		</tr>
		<tr align="center">
			<td colspan="2"><input type="submit" value="提交"> <input type="reset" value="重置"></td>
		</tr>
	</table>
</body>
</html>