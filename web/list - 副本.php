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
<?php
//遍历当前位置导航
//获取导航中全部的值为数组
$sql="select id,name from ".PREFIX."type";
$result=myQuery($sql);
//var_dump($result);
//形成新数组,下标为id,值为id对应的name
foreach($result as $value){
	$idList[$value['id']] = $value['name'];
}
//var_dump($idList);
//增加一个0

//获取ID,根据path+id遍历当前地址
$id = $_GET['id'];
$sqla="select * from ".PREFIX."type where id={$id}";
$resa=myQuery($sqla);

//将path和id拼接成新路径
$newPath=$resa[0]['path'];
$pathArr=explode(',',$newPath);
array_pop($pathArr);  //数组中最后一个空数组出栈
//var_dump($pathArr);die;


//for循环当前位置
for($i=1;$i<count($pathArr);$i++){
	$nav.='<a href="list.php?id='.$pathArr[$i].'" title="'.$idList[$pathArr[$i]].'">'.$idList[$pathArr[$i]].'</a>&nbsp;>&nbsp;';
}


?>
<a href="index.php" title="首页">首页</a>&nbsp;>&nbsp;<?php echo $nav; ?><span><?php echo $resa[0]['name']; ?></span>
</div>
<div class="hr-10"></div><div class="layout">
	<!-- 20140726-商品类别-start -->
	<div class="pro-cate-area">
		<!-- 20140726-商品类别-属性-start -->
		<div class="pro-cate-attr clearfix">
			<div class="p-title">分类：</div>
			<div class="p-default">
				<ul>
                    <li id="first-category" ><a href="list.php?.">全部</a></li>
					<!--<li class="selected"><a href="#">全部</a></li>-->
				</ul>
			</div>
			
			<!-- 二级虚拟分类 -->
			<div class="p-values">
				<!-- 一行的高度为30px,显示n行，p-expand的高度为nx30 -->
				<div class="p-expand">
					<ul class="clearfix">
<?php
//遍历导航
//如果传入的是父栏目怎样?如果传入的是子栏目又怎样?
//只考虑子栏目的情况，通过匹配path，查找同级
$sqlc="select * from ".PREFIX."type where path='{$newPath}'";
$resc=myQuery($sqlc);
//var_dump($resc);die();
foreach($resc as $value){
	if($value["id"] == $_GET['id']){
		echo '<li class="selected"><a href="list.php?id='.$value["id"].'">'.$value["name"].'</a></li>';
	}else{
		echo '<li ><a href="list.php?id='.$value["id"].'">'.$value["name"].'</a></li>';
	}
}
?>
<!--
	                    <li class="selected"><a href="#">荣耀</a></li>
	                    <li ><a href="#">畅玩</a></li>
	                    <li ><a href="#">华为 Mate/P系列</a></li>
	                    <li ><a href="#">G/Y系列</a></li>
	                    <li ><a href="#">运营商合约</a></li>
-->
					</ul>
				</div>
			</div>
			
		</div><!-- 20140726-商品类别-属性-end -->
		
			
			<div id="pro-cate-attr-100113" class="pro-cate-attr clearfix">
			    <div class="p-title">屏幕尺寸：</div>
			    <div class="p-default">
				    <ul>
					    <li id="pro-cate-attr-all" class="selected"><a href="#" onclick="ec.product.chooseAttrAllValue(100113)">全部</a></li>
				    </ul>
			    </div>
				
			    <div class="p-values">
					<div class="p-operate" style="display: none;">
					    <!-- 追加ClassName： more-expand more-drop -->
					    <a href="#" onclick="ec.product.more(this)" class="more more-expand">更多<s></s></a>
				    </div>
				    <div class="p-expand">
					    <ul class="clearfix">
						    <li id="pro-cate-attr-value-6.1英寸"><a href="#" onclick="ec.product.chooseAttrValue(100113,'6.1英寸')">6.1英寸</a></li>
						    <li id="pro-cate-attr-value-6.0英寸"><a href="#" onclick="ec.product.chooseAttrValue(100113,'6.0英寸')">6.0英寸</a></li>
						    <li id="pro-cate-attr-value-5.5英寸"><a href="#" onclick="ec.product.chooseAttrValue(100113,'5.5英寸')">5.5英寸</a></li>
						    <li id="pro-cate-attr-value-5.0英寸"><a href="#" onclick="ec.product.chooseAttrValue(100113,'5.0英寸')">5.0英寸</a></li>
						    <li id="pro-cate-attr-value-4.0英寸"><a href="#" onclick="ec.product.chooseAttrValue(100113,'4.0英寸')">4.0英寸</a></li>
					    </ul>
				    </div>
			    </div>
		    </div>
			
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
//遍历数据
$sqldd="select * from ".PREFIX."goods where typeid={$id} and state=2";
//echo $sql;die;
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
						<p class="p-name"><a target="_blank" href="article.php?id=<?php echo $value['id']; ?>" title=""><?php echo $value['goods']; ?> 移动4G智能手机（黑色）<span class="red"></span></a></p>
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
		                <?php
		                switch($value['tag']){
		                    case 0:
		                    $str='';
		                    break;
		                    case 1:
		                    $str='<i class="p-tag"><img src="./images/1382542518162.png"></i>';
		                    break;
		                    case 2:
		                    $str='<i class="p-tag"><img src="./images/1382542488099.png"></i>';
		                    break;
		                    case 3:
		                    $str='<i class="p-tag"><img src="./images/1384096319005.png"></i>';
		                    break;
		                }
		                echo $str;
		                ?>
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