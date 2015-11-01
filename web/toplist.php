<?php
require('../public/common.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-cn" />
<title>华为手机【报价 价格 大全 怎么样】_华为商城</title>
<link rel="shortcut icon" href="images/favicon.ico" />
<link href="css/ec.core.min.css?20150213" rel="stylesheet" type="text/css">
<link href="css/main.min.css" rel="stylesheet" type="text/css">
</head>
<body class="wide">
<?php include('header.php'); ?>


<div class="hr-10"></div>
<div class="g">
    <!--面包屑 -->

<div class="breadcrumb-area fcn"><a href="#" title="首页">首页</a>&nbsp;>&nbsp;<span>手机</span></div>

<div class="hr-10"></div><div class="layout">
	<!-- 20140726-商品类别-start -->
	<div class="pro-cate-area">
		<!-- 20140726-商品类别-属性-start -->
		<div class="pro-cate-attr clearfix">
			<div class="p-title">分类：</div>
			<div class="p-default">
				<ul>
                    <li id="first-category" class="selected"><a href="toplist.php?id=<?php echo $_GET['id']; ?>">全部</a></li>
					<!--<li class="selected"><a href="#">全部</a></li>-->
				</ul>
			</div>
			
			<!-- 二级虚拟分类 -->
			<div class="p-values">
				<div class="p-operate" style="display: none;">
					<!-- 追加ClassName： more-expand more-drop -->
					<a href="#" onclick="ec.product.more(this)" class="more more-expand">更多<s></s></a>
				</div>
				<!-- 一行的高度为30px,显示n行，p-expand的高度为nx30 -->
				<div class="p-expand">
					<ul class="clearfix">
<?php
//遍历分类
//php遍历数据,这里是顶级分类，要将子类栏目都遍历过来;
//id值，get传参只接受顶级栏目ID
$id = $_GET['id'];
$sqla="select id,name from ".PREFIX."type where pid='{$id}'";
$resulta=myQuery($sqla);
//将数组中的id值，拼接为字符串
for($i=0;$i<count($resulta);$i++){
	echo "<li ><a href='list.php?pid={$id}&id={$resulta[$i]['id']}'>{$resulta[$i]['name']}</a></li>";

	$idStr.=$resulta[$i]['id'].',';
}
$idStr=rtrim($idStr,','); //子ID集合，例如2,3,4,5

?>
<!--
	                    <li ><a href="#">荣耀</a></li>
	                    <li ><a href="#">畅玩</a></li>
	                    <li ><a href="#">华为 Mate/P系列</a></li>
	                    <li ><a href="#">G/Y系列</a></li>
	                    <li ><a href="#">运营商合约</a></li>
	                    -->

					</ul>
				</div>
			</div>
			
		</div><!-- 20140726-商品类别-属性-end -->
		
		<!-- 20140726-商品类别-属性-start -->
        <!-- 20140726-商品类别-属性-end -->		
		
		<!-- 20140726-商品类别-排序-start -->
		<div class="pro-cate-sort clearfix">
			<div class="p-title">排序：</div>
			<div class="p-default">
				<ul>
					<li id="sort-default"><a href="#" onclick="ec.product.sort('default')">默认</a></li>
				</ul>
			</div>
			<div class="p-values">
				<div class="p-expand">					
					<ul class="clearfix">
					    <!-- 升序选择（从低到高）： sort-asc selected   降序选择（从高到低）： sort-desc selected -->
						<li id="sort-price"><a href="#" class="sort-price" onclick="ec.product.sort('price')">价格<s></s></a></li>
						<li id="sort-remarkNumber"><a href="#" class="sort-eval" onclick="ec.product.sort('remarkNumber')">评价数<s></s></a></li>
						<li id="sort-registterTime"><a href="#" class="sort-added" onclick="ec.product.sort('registterTime')">上架时间<s></s></a></li>
					</ul>
				</div>
			</div>
		</div><!-- 20140726-商品类别-排序-end -->
		
		<form id="listForm" method="post">
		

		</form>
		
	</div><!-- 20140726-商品类别-end -->

	<div class="hr-20"></div>
</div>				

<!--到货通知弹出框-->
<textarea id="product-arrival-html" class="hide">
	<div class="arrival-remind-area">
		<ul class="clearfix">
			<li id="arrival-email">
				<p class="a-title">邮件通知</p>
				<p id="account-email" class="a-txt">xxxxxxxxxxxxxxxxxxxx@huawei.com</p>
				<s></s>
			</li>
			<li id="arrival-mobile">
				<p class="a-title">短信通知</p>
				<p id="account-mobile" class="a-txt">185&nbsp;6644&nbsp;5856</p>
				<s></s>
			</li>		
		</ul>
	</div>
	<div class="box-custom-button">
		<input type="submit" class="box-ok box-button-style-1" value="提交"/>
	</div>
	<div id="arrival-error" class="box-form-tips hide">
		<span class="icon-error">输入有误</span>
	</div>
</textarea>



	<!-- 20140726-频道-列表-start -->
    <div class="channel-list">
        <!-- 20140727-商品列表-start -->
		<div class="pro-list clearfix">
			<ul>
<?php



$sql="select * from ".PREFIX."goods where typeid in('{$idStr}')";
//echo $sql;die;
$result=myQuery($sql);
//图片路径
$path="../public/uploads/";
if($result){
foreach($result as $a=>$value):
?>
            	<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="article.php?id=<?php echo $value['id']; ?>" title=""><img src="<?php echo $path.'218_'.$value['picname']; ?>"/></a></p>
						<p class="p-name"><a target="_blank" href="article.php?id=<?php echo $value['id']; ?>" title=""><?php echo $value['goods']; ?> 移动4G智能手机（黑色）<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;<?php echo $value['price']; ?></b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										<td><a href="#" onclick="" class="p-button-an"><span>到货通知</span></a></td>
										<td><label class="p-button-score"><span>30人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<s class="p-tag"><img src="images/1382542518162.png"/></s>
					</div>
				</li>
<?php endforeach; } ?>





<!--
            	<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 HUAWEI Y635 移动4G智能手机（黑色）"><img src="images/428_428_11.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 HUAWEI Y635 移动4G智能手机（黑色）">Y635 移动4G智能手机（黑色）<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;799</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										<td><a href="#" onclick="ec.product.arrival(3627)" class="p-button-an"><span>到货通知</span></a></td>
										<td><label class="p-button-score"><span>30人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<s class="p-tag"><img src="images/1382542518162.png"/></s>
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 荣耀3X Pro 双卡双待 真八核 移动/联通双3G版 TD-SCDMA/WCDMA/GSM（白色）"><img src="images/428_428_11.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 荣耀3X Pro 双卡双待 真八核 移动/联通双3G版 TD-SCDMA/WCDMA/GSM（白色）">荣耀3X Pro 移动/联通双3G版（白色）<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;1498</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										<td><a href="#" onclick="ec.product.arrival(1860)" class="p-button-an"><span>到货通知</span></a></td>
										<td><label class="p-button-score"><span>2325人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 荣耀7 双卡双待双通 移动4G版 16GB存储（冰河银）"><img src="images/428_428_1.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 荣耀7 双卡双待双通 移动4G版 16GB存储（冰河银）">荣耀7 移动4G版（冰河银）<span class="red">开售时间：7月14日10:08</span></a></p>
						<p class="p-price"><b>&yen;1999</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										<td><a href="#" onclick="ec.product.arrival(4407)" class="p-button-an"><span>到货通知</span></a></td>
										<td><label class="p-button-score"><span>0人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<s class="p-tag"><img src="images/1382593860805.png"/></s>
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="【北京移动老用户专享】华为 HUAWEI P8 双卡双待 移动4G标配版 16GB存储（皓月银）"><img src="images/428_428_1.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="【北京移动老用户专享】华为 HUAWEI P8 双卡双待 移动4G标配版 16GB存储（皓月银）">【北京移动老用户专享】华为 P8 双卡双待 移动4G标配版（皓月银）<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;2888</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										    <td><a target="_blank" href="#" class="p-button-cart"><span>加入购物车</span></a></td>
										<td><label class="p-button-score"><span>0人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 HUAWEI P8max 双卡双待 移动/联通双4G版 64GB存储（日晖金）"><img src="images/428_428_1.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 HUAWEI P8max 双卡双待 移动/联通双4G版 64GB存储（日晖金）">华为 P8max 移动/联通双4G版（日晖金）<span class="red">7月10日10:08准点开售</span></a></p>
						<p class="p-price"><b>&yen;3788</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										<td><a href="#" onclick="ec.product.arrival(4328)" class="p-button-an"><span>到货通知</span></a></td>
										<td><label class="p-button-score"><span>114人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<s class="p-tag"><img src="images/1382593860805.png"/></s>
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="【北京移动老用户专享】华为 HUAWEI Mate7 指纹识别 八核 双卡双待双通 标配移动定制版（月光银）"><img src="images/428_428_1.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="【北京移动老用户专享】华为 HUAWEI Mate7 指纹识别 八核 双卡双待双通 标配移动定制版（月光银）">【北京移动老用户专享】华为 Mate7 标配版（月光银）<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;2999</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										    <td><a target="_blank" href="#" class="p-button-cart"><span>加入购物车</span></a></td>
										<td><label class="p-button-score"><span>0人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 HUAWEI C8818 电信4G智能手机（黑色）"><img src="images/428_428_zzz.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 HUAWEI C8818 电信4G智能手机（黑色）">华为 C8818 电信4G智能手机（黑色）<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;999</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										    <td><a href="#" id="add-cat-4290" onclick="ec.product.addCart(4290, '华为 C8818 电信4G智能手机')" class="p-button-cart"><span>加入购物车</span></a></td>
										<td><label class="p-button-score"><span>1人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 荣耀畅玩4C 双卡双待 移动/联通双4G版智能手机（白色）套餐版"><img src="images/428_428_11.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 荣耀畅玩4C 双卡双待 移动/联通双4G版智能手机（白色）套餐版">荣耀畅玩4C 双卡双待 移动/联通双4G版（白色）套餐版<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;1199</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										    <td><a href="#" id="add-cat-4294" onclick="ec.product.addCart(4294, '荣耀畅玩4C  套餐版')" class="p-button-cart"><span>加入购物车</span></a></td>
										<td><label class="p-button-score"><span>310人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<s class="p-tag"><img src="images/1382542518162.png"/></s>
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 HUAWEI P8 双卡双待 电信4G标配版 16GB存储（烟云灰）套餐版"><img src="images/428_428_1.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 HUAWEI P8 双卡双待 电信4G标配版 16GB存储（烟云灰）套餐版">华为 P8 双卡双待 电信4G标配版（烟云灰）<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;3002</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										    <td><a href="#" id="add-cat-4033" onclick="ec.product.addCart(4033, '华为P8标配套餐版')" class="p-button-cart"><span>加入购物车</span></a></td>
										<td><label class="p-button-score"><span>66人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 荣耀畅玩4 双卡双待 移动4G智能手机（定制版 前黑后金）"><img src="images/428_428_1.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 荣耀畅玩4 双卡双待 移动4G智能手机（定制版 前黑后金）">荣耀畅玩4 移动4G版（定制版 前黑后金）<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;699</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										    <td><a href="#" id="add-cat-4207" onclick="ec.product.addCart(4207, '荣耀畅玩4 前黑后金')" class="p-button-cart"><span>加入购物车</span></a></td>
										<td><label class="p-button-score"><span>86人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<s class="p-tag"><img src="images/1421650822918.png"/></s>
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 荣耀6 移动4G TD-LTE/TD-SCDMA/GSM（16GB存储）（黑色）套餐版"><img src="images/428_428_07.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 荣耀6 移动4G TD-LTE/TD-SCDMA/GSM（16GB存储）（黑色）套餐版">荣耀6 移动4G版 16GB存储（黑色）套餐版<span class="red">赠送豪华配件套装</span></a></p>
						<p class="p-price"><b>&yen;1699</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										    <td><a href="#" id="add-cat-2342" onclick="ec.product.addCart(2342, '荣耀6套餐版')" class="p-button-cart"><span>加入购物车</span></a></td>
										<td><label class="p-button-score"><span>4140人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<s class="p-tag"><img src="images/1382542488099.png"/></s>
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="【北京移动老用户专享】华为 荣耀6 八核 移动4G TD-LTE/TD-SCDMA/GSM（16GB存储）（黑色）"><img src="images/428_428_07.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="【北京移动老用户专享】华为 荣耀6 八核 移动4G TD-LTE/TD-SCDMA/GSM（16GB存储）（黑色）">【北京移动老用户专享】荣耀6 八核 移动4G版 16GB存储（黑色）<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;1499</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										    <td><a target="_blank" href="#" class="p-button-cart"><span>加入购物车</span></a></td>
										<td><label class="p-button-score"><span>8人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="【北京移动老用户专享】华为 荣耀X2 标准版 双卡双待双通 移动/联通双4G  16GB ROM（月光银）"><img src="images/428_428_01.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="【北京移动老用户专享】华为 荣耀X2 标准版 双卡双待双通 移动/联通双4G  16GB ROM（月光银）">【北京移动老用户专享】荣耀X2 标准版 双卡双待双通（月光银）<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;1999</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										    <td><a target="_blank" href="#" class="p-button-cart"><span>加入购物车</span></a></td>
										<td><label class="p-button-score"><span>2人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="【北京移动老用户专享】华为 荣耀6 Plus 标准版 双卡双待双通 移动4G 16GB存储（黑色）"><img src="images/428_428_1.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="【北京移动老用户专享】华为 荣耀6 Plus 标准版 双卡双待双通 移动4G 16GB存储（黑色）">【北京移动老用户专享】荣耀6 Plus 移动标准版（黑色）<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;1999</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										    <td><a target="_blank" href="#" class="p-button-cart"><span>加入购物车</span></a></td>
										<td><label class="p-button-score"><span>7人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 HUAWEI P8 青春版 双卡双待 移动/联通双4G版（黑色）"><img src="images/428_428_1.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 HUAWEI P8 青春版 双卡双待 移动/联通双4G版（黑色）">华为 P8 青春版 双卡双待 移动/联通双4G版（黑色）<span class="red">7月10日10:08准点开售（周五）</span></a></p>
						<p class="p-price"><b>&yen;1588</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										<td><a href="#" onclick="ec.product.arrival(3875)" class="p-button-an"><span>到货通知</span></a></td>
										<td><label class="p-button-score"><span>508人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<s class="p-tag"><img src="images/1382593860805.png"/></s>
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 HUAWEI P8 双卡双待 移动/联通双4G标配版 16GB存储（皓月银）"><img src="images/428_428_1.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 HUAWEI P8 双卡双待 移动/联通双4G标配版 16GB存储（皓月银）">华为 P8 双卡双待 移动/联通双4G标配版（皓月银）<span class="red">7月10日10:08准点开售（周五）</span></a></p>
						<p class="p-price"><b>&yen;2888</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										<td><a href="#" onclick="ec.product.arrival(3852)" class="p-button-an"><span>到货通知</span></a></td>
										<td><label class="p-button-score"><span>1394人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<s class="p-tag"><img src="images/1382542488099.png"/></s>
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 荣耀畅玩4C 双卡双待 移动4G版智能手机（白色）"><img src="images/428_428_11.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 荣耀畅玩4C 双卡双待 移动4G版智能手机（白色）">荣耀畅玩4C 双卡双待 移动4G版（白色）<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;799</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										<td><a href="#" onclick="ec.product.arrival(3781)" class="p-button-an"><span>到货通知</span></a></td>
										<td><label class="p-button-score"><span>5978人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<s class="p-tag"><img src="images/1382593860805.png"/></s>
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 HUAWEI P8 双卡双待 移动/联通双4G高配版 64GB存储（流光金）"><img src="images/428_428_1.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 HUAWEI P8 双卡双待 移动/联通双4G高配版 64GB存储（流光金）">华为 P8 双卡双待 移动/联通双4G高配版（流光金）<span class="red">7月10日10:08准点开售（周五）</span></a></p>
						<p class="p-price"><b>&yen;3588</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										<td><a href="#" onclick="ec.product.arrival(3664)" class="p-button-an"><span>到货通知</span></a></td>
										<td><label class="p-button-score"><span>1919人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<s class="p-tag"><img src="images/1382593860805.png"/></s>
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 荣耀6 Plus 标准版 双卡双待双通 移动4G 16GB存储（白色）套餐版"><img src="images/428_428_1.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 荣耀6 Plus 标准版 双卡双待双通 移动4G 16GB存储（白色）套餐版">荣耀6 Plus 移动标准版（白色）套餐版<span class="red">限量赠送豪华配件套装</span></a></p>
						<p class="p-price"><b>&yen;2299</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										    <td><a href="#" id="add-cat-3397" onclick="ec.product.addCart(3397, '荣耀6 Plus 套餐版（赠豪华配件套装）')" class="p-button-cart"><span>加入购物车</span></a></td>
										<td><label class="p-button-score"><span>4564人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<s class="p-tag"><img src="images/1382542488099.png"/></s>
					</div>
				</li>
				<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="#" title="华为 荣耀6 Plus 标准版 双卡双待双通 移动4G 16GB存储（白色）"><img src="images/428_428_1.jpg"/></a></p>
						<p class="p-name"><a target="_blank" href="#" title="华为 荣耀6 Plus 标准版 双卡双待双通 移动4G 16GB存储（白色）">荣耀6 Plus 移动标准版（白色）<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;1999</b></p>
						<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
										<td><a href="#" onclick="ec.product.arrival(2949)" class="p-button-an"><span>到货通知</span></a></td>
										<td><label class="p-button-score"><span>26752人评价</span></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<s class="p-tag"><img src="images/1382542488099.png"/></s>
					</div>
				</li>
-->
			</ul>
		</div>
		<!-- 20140727-商品列表-end -->
		<!-- 分页-start -->
		<div id="list-pager-36" class="pager">
		    <span class="hide">
			    <a href="#" title="手机 第1页">第1页</a>&nbsp;&nbsp;
			    <a href="#" title="手机 第2页">第2页</a>&nbsp;&nbsp;
		    </span>
	    </div>
    </div><!-- 20140726-频道-列表-end -->
<!--弹出层-成功添加到购物车 -->
<textarea id="cart-tips" class="hide">
<div class="pro-add-success" style="margin:-14px -30px 0;">
	<dl>
		<dt><s></s></dt>
		<dd>
			<div id="cart-briefName" class="pro-add-success-name">华为 Ascend P1 U9200 3G手机（晶钻黑）WCDMA</div>
			<div class="pro-add-success-msg">成功加入购物车!</div>
			<div class="pro-add-success-total">购物车中共&nbsp;<b id="cart-total">0</b>&nbsp;件商品，金额合计&nbsp;<b  id="cart-price">¥&nbsp;2699</b></div>
			<div class="pro-add-success-button"><a href="#" class="box-ok button-style-1 button-go-cart" title="去购物车结算">去结算</a><a class="box-cancel button-style-4 button-walking" href="#" title="继续逛逛">继续逛逛&nbsp;>></a></div>
		</dd>
	</dl>
</div>
</textarea>
<!-- 20131218-商品简介-弹出层-成功添加到购物车-end -->

<!--弹出层-添加到购物车失败 -->
<textarea id="popup-tips" class="hide">
    <!-- 20131230-商品简介-弹出层-添加到购物车失败-start -->
	<div class="pro-add-error" style="margin-top:-40px;">
		<i></i>
		<div id="popup-tips-msg" class="pro-add-error-msg">非常抱歉！该商品不能单独销售！</div>
		<div class="pro-add-error-button"><a href="#"  title="知道了" class="box-cancel button-style-4 button-par-define">知道了</a></div>
	</div>
</textarea>
<!-- 20131230-商品简介-弹出层-添加到购物车失败-end -->


                        

<form action="#" id="gotourl" method="get"></form>
<div class="hr-40"></div>


<?php include('footer.php'); ?>
</body>
</html>
<!--Hit 2015-07-08 21:05:32,1-->