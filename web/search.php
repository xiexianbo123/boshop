<?php
require('../public/common.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-cn" />
<title>华为智能手机【推荐 报价表 大全】_华为商城</title>
<link rel="shortcut icon" href="images/favicon.ico" />
<link href="css/ec.core.min.css?20150213" rel="stylesheet" type="text/css">

<link href="css/main.min.css" rel="stylesheet" type="text/css">
<script src="./js/jquery.js"></script>
<script>
//jquery处理表单提交
//先用笨方法测试，看数据是否可以传递过去
$(document).ready(function(){
	$(".channel-list #sub_goods").click(function(){
	var index = $(".channel-list #sub_goods").index(this);
	$id="#goods_id"+index;
	$goods="#goods_goods"+index;
	$price="#goods_price"+index;
	$picname="#goods_picname"+index;
	$num="#pro-quantity"+index;
	//alert($($aa).val());

	$.post('shopaction.php?a=add&b=article',
		{
			id:$($id).val(),
			goods:$($goods).val(),
			price:$($price).val(),
			picname:$($picname).val(),
			num:$($num).val()
		},
		function(data,textStatus){
			//alert(data.html);
			if(data.state ==1){
				alert('加入购物车成功!');
			}
		},
		'json');

	})

})


</script>
</head>

<body class="wide">
<?php include('header.php'); ?>


<div class="hr-10"></div>
<div class="g">
    <!--面包屑 -->

<div class="breadcrumb-area fcn">
<a href="index.php" title="首页">首页</a>&nbsp;>&nbsp;<span>商品搜索</span>
</div>
<div class="hr-10"></div>

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
if(empty($_GET['word'])){
	echo location_js('请输入搜索词','./index.php');
	die();
}
$word=$_GET['word'];
$where="where goods like '%{$word}%' and state=2";

//遍历数据
$sqldd="select * from ".PREFIX."goods {$where}";
//echo $sqldd;die;
$resultdd=myQuery($sqldd);
//图片路径
$path="../public/uploads/";
if($resultdd){
foreach($resultdd as $a=>$value):
?>
<!--隐藏表单传数据-->
<input type="hidden" id="goods_id<?php echo $a; ?>" value="<?php echo $value['id'] ?>">
<input type="hidden" id="goods_goods<?php echo $a; ?>" value="<?php echo $value['goods'] ?>">
<input type="hidden" id="goods_price<?php echo $a; ?>" value="<?php echo $value['price'] ?>">
<input type="hidden" id="goods_picname<?php echo $a; ?>" value="<?php echo $value['picname'] ?>">
<input type="hidden" id="pro-quantity<?php echo $a; ?>" type="text" class="vam text" value="1" autocomplete="off" />
            	<li>
					<div class="pro-panels">
						<p class="p-img"><a target="_blank" href="article.php?id=<?php echo $value['id']; ?>" title=""><img src="<?php echo $path.'218_'.$value['picname']; ?>"/></a></p>
						<p class="p-name"><a target="_blank" href="article.php?id=<?php echo $value['id']; ?>" title=""><?php echo reg_search($word,$value['goods']); ?> 移动4G智能手机（黑色）<span class="red"></span></a></p>
						<p class="p-price"><b>&yen;<?php echo $value['price']; ?></b></p>
<div class="p-button clearfix">
							<table colspan="0" border="0" rowspan="0">
								<tbody>
									<tr>
									<?php if(empty($_SESSION['user'])): ?>
										    <td onclick="nologin();"><a target="_blank" class="p-button-cart"><span>加入购物车</span></a></td>
									<?php else: ?>
											<td id="sub_goods"><a target="_blank" class="p-button-cart"><span>加入购物车</span></a></td>
									<?php endif; ?>
									<!--遍历输出商品评价数目-->
									<?php
										//初始化评论数
										$plNum=0;
										//获取商品id
										$goodsid=$value['id'];
										$sqlpl="select count(*) as total from ".PREFIX."comment where goodsid={$goodsid}";
										$resultpl=myQuery($sqlpl);
										$plNum=$resultpl[0]['total'];
										echo '<td><label class="p-button-score"><span>'.($plNum+3).'人评价</span></label></td>';
									?>
									</tr>
								</tbody>
							</table>
						</div>
						<s class="p-tag"><img src="images/1382542518162.png"/></s>
					</div>
				</li>
<?php endforeach; } ?>

			</ul>
		</div>
<script>
function nologin(){
	alert('逗B,先登录再购物!点‘确定’哥免费送你一程');
	window.location.href='./login.php';
}
</script>




		<!-- 20140727-商品列表-end -->
		<!-- 分页-start -->
		<div id="list-pager-75" class="pager">
		    <span class="hide">
			    <a href="#" title="荣耀 第1页">第1页</a>&nbsp;&nbsp;
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
<!--Hit 2015-07-08 21:18:50,1-->