<?php
require('../public/common.php');

$arri=array('联通标准版套餐','移动标准版套餐','双4G版套餐','电信标准版套餐');
$arrj=array('黑色','白色','金色');

$id = $_GET['id'];

//每次打开页面，更新浏览量
$sqla="update ".PREFIX."goods set clicknum=clicknum+1 where id={$id}";
$resa=myQueryUpdate($sqla);
//echo $resa;die;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-cn" />
<title>【【华为荣耀3X Pro】华为 华为 荣耀3X Pro【报价 参数 功能 性能 图片 怎么样】】_华为商城</title>
<link rel="shortcut icon" href="images/favicon.ico" />
<link href="css/ec.core.min.css?20150213" rel="stylesheet" type="text/css">
<link href="css/main.min.css" rel="stylesheet" type="text/css">
<script src="./js/jquery.js"></script>
<script src="./js/bo.js"></script>
<script>
//用jquery选取
$(function(){
	var num=$('.pro-comment-item').length;
	var str='共&nbsp;'+num+'&nbsp;条评论';
	$('#prd-remark-jmptoremark').html(str);
})
</script>
</head>
<body class="wide">
<?php include('header.php'); ?>


<?php
//查询商品信息
$path='../public/uploads/';


$sql = "select * from ".PREFIX."goods where id={$id}";
$result = myQuery($sql); 
//var_dump($result);die();

?>

<div class="hr-10"></div>
<div class="g">
	<!--面包屑 -->
	<div class="breadcrumb-area fcn"><a href="#" title="首页">首页</a>&nbsp;>&nbsp;<span id="bread-pro-name">
		<?php echo $result[0]['company'].$result[0]['goods']; ?>
	</span></div>
</div>
<div class="hr-10"></div>
<div class="layout"> 
	<!--商品简介 -->
	<div class="pro-summary-area clearfix">
    	<div class="right-area">
        	<!--商品简介-属性 -->
        	<div class="pro-property-area clearfix">
                <div class="pro-meta-area">
                	<h1 id="pro-name"><?php echo $result[0]['company'].'&nbsp;&nbsp;'.$result[0]['goods']; ?></h1>
            	
                	<!-- 插入 商品简介-广告语-->
                	<div class="pro-slogan" id="skuPromWord">
							5.5英寸FHD全高清巨屏，移动+联通双3G，2GB RAM+16GB ROM，1300万+500万像素双摄像头，3000mAh大容量电池，真8核，长续航，飙机王！
					</div>			
                	<div class="hr-10"></div>
					<div class="line"></div>
                
                    <div class="pro-price">
							 <s id="pro-price-old"  class="hide"><label>华&nbsp;为&nbsp;&nbsp;价：</label>&yen;&nbsp; </s>
							 <span id="pro-price"><label>华&nbsp;为&nbsp;&nbsp;价：</label><b>&yen;&nbsp;<?php echo $result[0]['price']; ?></b></span>
                    </div>
                    
                    <!--chenzhongxian 促销和赠品合并-->
                    <!--商品简介-促销规则 -->
                    <div id="pro-promotions-area" class="pro-promotions-area hide">
                       <dl class="clearfix">
                            <dt>优惠信息：</dt>
                            <dd>
                                <ul id="pro-promotions-list">
                                
                                </ul>
                                <ul id="pro-gift-list" >
                                </ul> 
                            </dd>
                        </dl>
                    </div>
                    
                    <div class="pro-coding"><label>商品编码：</label><span id="pro-sku-code">10010112201</span></div>
                    <div class="pro-coding"><label>浏览次数：</label><span id="pro-sku-code">
					<?php echo $result[0]['clicknum']; ?>
                    </span></div>
                    <div class="pro-coding"><label>库&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;存：</label><span id="pro-sku-num">
					<?php echo $result[0]['store']; ?>
                    </span></div>
                    <div class="pro-coding"><label>被购买量：</label><span id="pro-sku-code"><?php echo $result[0]['num']; ?></span></div>
                    <div class="pro-evaluate"><label>商品评分：</label>
                    <span class="pro-star"><span class="starRating-area"><s id="prd-remark-scoreAverage" style="width:100%"></s></span></span>&nbsp;（<a id="prd-remark-jmptoremark" href="javascript:;" onclick="window.scrollTo(0,1280);">共&nbsp;0&nbsp;条评论</a>）</div>

			<div class="pro-freight"><label>运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费：</label>满&nbsp;100&nbsp;免运费</div>
			<div class="pro-service"><label>服&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务：</label>由华为商城负责发货，并提供售后服务</div>
				 	
		    <div class="hr-10"></div>
		    <div class="line"></div>
		    <div class="hr-15"></div>
					
                    <!--商品简介-SKU -->
					<div id="pro-skus" class="pro-sku-area">
					<dl class="clearfix pro-sku-text">
						<dt>选择制式：</dt>
						<dd>
<ol id="clearfix_tit">
<li class="tac pointer attr4202 attr4204 selected" data-attrname="制式" data-attrid="4202,4204"><div class="sku"> <a title="联通标准版套餐">联通标准版套餐</a><s></s></div></li>
<li class="tac pointer attr4206 attr4208" data-attrname="制式" data-attrid="4206,4208"><div class="sku"> <a title="移动标准版套餐">移动标准版套餐</a><s></s></div></li>
<li class="tac pointer attr4213 attr4215" data-attrname="制式" data-attrid="4213,4215,4217"><div class="sku"> <a title="双4G版套餐">双4G版套餐</a><s></s></div></li>
<li class="tac pointer attr4219 attr4221" data-attrname="制式" data-attrid="4219,4221"><div class="sku"> <a title="电信标准版套餐">电信标准版套餐</a><s></s></div></li>
</ol>
						</dd>
					</dl>
					<dl class="clearfix pro-sku-img">
						<dt>选择颜色：</dt>
						<dd>
						<ol id="clearfix_rir">
						<li class="tac pointer attr4203 attr4207 attr4214 attr4220 selected" data-attrname="颜色" data-attrid="4203,4207,4214,4220"><div class="sku"> <a title="黑色"><img src="./images/40_40_z.jpg" alt="黑色"></a><s></s>黑色</div></li>
						<li class="tac pointer attr4205 attr4209 attr4216 attr4222" data-attrname="颜色" data-attrid="4205,4209,4216,4222"><div class="sku"> <a title="白色"><img src="./images/40_40_1.jpg" alt="白色"></a><s></s>白色</div></li>
						<li class="tac pointer attr4218 attr4269" data-attrname="颜色" data-attrid="4218,4269"><div class="sku"> <a title="金色"><img src="./images/40_40_11.jpg" alt="金色"></a><s></s>金色</div></li>
						</ol>
						</dd>
					</dl>
					</div>
					 
					 
					<!-- 20140710-商品简介-延保-start -->
<!-- 20140710-商品简介-延保-end -->
					
<!--隐藏表单，存储商品信息一次ajax提交过去-->
<form>
<input type="hidden" name="id" id="goods_id" value="<?php echo $result[0]['id'] ?>">
<input type="hidden" name="goods" id="goods_goods" value="<?php echo $result[0]['goods'] ?>">
<input type="hidden" name="price" id="goods_price" value="<?php echo $result[0]['price'] ?>">
<input type="hidden" name="picname" id="goods_picname" value="<?php echo $result[0]['picname'] ?>">

                    <!-- 20131215-商品简介-购买数量-start -->
					<div id="pro-quantity-area"  class="pro-stock-area">
						<dl class="clearfix">
							<dt>购买数量：</dt>
							<dd>
							 <span class="stock-area">
							 <a href="javascript:shopDel();" class="icon-minus-2 vam" title="减"><span>-</span></a>
						     <input id="pro-quantity" type="text" name="num" class="vam text" value="1" autocomplete="off" onblur="shopInt();" />
   						     <a href="javascript:shopAdd();" class="icon-plus-2 vam" title="加"><span>+</span></a>
   						     </span>
							</dd>
						</dl>
					</div>
				<!-- 20131215-商品简介-购买数量-end -->
                    
					
                </div><!--end pro-meta-area-->
                


<!--商品简介-提交操作 -->
<div class="pro-fixed-action">
    <div id="pro-select-sku" class="pro-selected">您选择了<b><?php echo $result[0]['company'].'&nbsp;&nbsp;'.$result[0]['goods']; ?></b>&nbsp;&nbsp;<b>&nbsp;</b>&nbsp;&nbsp;<b>&nbsp;</b></div>
	<?php if(empty($_SESSION['user'])){ ?>
    <div onclick="nologin();" class="pro-action-area" style="visibility: visible; "><a href="javascript:"  class="button-add-cart button-style-1" title="加入购物车"><span>加入购物车</span></a></div>
	<?php
	}else{
		if($result[0]['store'] == 0){
			echo '<div class="pro-action-area" style="visibility: visible; "><a href="javascript:"  class="button-add-cart button-style-1" title="加入购物车"><span>库存不足</span></a></div>';
		}else{
			echo '<div id="pro-operation" class="pro-action-area" style="visibility: visible; "><a href="javascript:"  class="button-add-cart button-style-1" title="加入购物车"><span>加入购物车</span></a></div>';
		}
	};
	?>
</div>
</form>

<script>
function nologin(){
	alert('逗B,先登录再购物!点‘确定’哥免费送你一程');
	window.location.href='./login.php';
}
</script>

<script>
$(document).ready(function(){
//格式
var i=0;
//考虑到效率问题，还是存值到数据库去吧，哎！~~~
var arri=new Array('联通标准版套餐','移动标准版套餐','双4G版套餐','电信标准版套餐');
//颜色
var j=0;
var arrj=new Array('黑色','白色','金色');
	//选择格式，选择颜色
	$('#clearfix_tit > li').click(function(){
		$(this).addClass('selected');
		i=$(this).index();
		//alert('jkjkl');
		$('#clearfix_tit > li').eq(i).siblings('li').removeClass('selected');
		$('#pro-select-sku > b').eq(1).html(arri[i]);
	})

	$('#clearfix_rir > li').click(function(){
		$(this).addClass('selected');
		j=$(this).index();
		//alert(i);
		$('#clearfix_rir > li').eq(j).siblings('li').removeClass('selected');
		$('#pro-select-sku > b').eq(2).html(arrj[j]);
	})

//jquery处理表单提交
//先用笨方法测试，看数据是否可以传递过去
	//数据提交
	$('#pro-operation').click(function(){
		//alert($("#goods_goods").val());

		$.post('shopaction.php?a=add&b=article',
			{
				id:$("#goods_id").val(),
				goods:$("#goods_goods").val(),
				price:$("#goods_price").val(),
				picname:$("#goods_picname").val(),
				num:$("#pro-quantity").val(),
				network:i,
				color:j
			},
			function(data,textStatus){
				//alert(data.html);
				$("#cart-tips").show();
				$('#pro-add-success').html(data.html)
			},
			'json');

	})
})


</script>


<script>
//处理商品信息
var shopNum=document.getElementById('pro-quantity');
//获取库存总量
var proNum=document.getElementById('pro-sku-num');
//alert(parseInt(proNum.innerHTML));
function shopAdd(){
	if(shopNum.value<parseInt(proNum.innerHTML)){
		shopNum.value++;
	}
}
function shopDel(){
	if(shopNum.value >1){
		shopNum.value--;
	}
}

//判断用户手动输入的情况
function shopInt(){
	if(shopNum.value>parseInt(proNum.innerHTML)){
		shopNum.value=parseInt(proNum.innerHTML);
		alert('Sorry,购买量超过库存量');
	}
}
</script>

    
<!--弹出层-成功添加到购物车   style="display: block; "  开启  -->
<div id="cart-tips" class="pro-popup-area hide">
     <div class="h">
	<a href="javascript:;" onclick="$('#cart-tips').hide()" class="pro-popup-close" title="关闭"><span>关闭</span></a>
    </div>
    <div class="b">
		<div class="pro-add-success" id="pro-add-success">
		<!--尝试返回下面-->
		<!--
			<dl>
			<dt><s></s></dt>
				<dd>
					<p><?php echo $result[0]['company'].$result[0]['goods']; ?>（赠豪华配件套装）</p>
					<div class="pro-add-success-msg">成功加入购物车!</div>
					<div class="pro-add-success-total">购物车中共&nbsp;<b id="cart-total">8</b>&nbsp;件商品，金额合计&nbsp;<b id="cart-price">¥&nbsp;4398.00</b></div>
					<div class="pro-add-success-button"><a href="javascript:;" class="button-style-1 button-go-cart" title="去购物车结算" onclick="ec.product.gotoshoppingCart()">去结算</a><a class="button-style-4 button-walking" href="javascript:;" title="继续逛逛" onclick="$('#cart-tips').hide()">继续逛逛&nbsp;&gt;&gt;</a></div>									
				</dd>
			</dl>
		-->					
		</div>
    </div>
</div>
<!-- 弹出层-成功添加到购物车end -->


<!-- Baidu Button BEGIN -->
<div class="pro-bdShare-area">
	<div id="bdshare" class="bdShare bdshare_t bds_tools get-codes-bdshare" data="{'url':'http://www.vmall.com/product/1116.html'}">
	</div>
</div>
<form action="#" id="gotourl" method="get"></form>

<!-- Baidu Button END -->            </div>
        </div>
        
        <div class="left-area">
        	<!--商品简介-图片画廊 -->
        	<div class="pro-gallery-area">
            	<div class="pro-gallery-img">
					<a id="product-img" href='' class = 'cloud-zoom'  rel="adjustX: 10, adjustY:0, zoomWidth:400 , zoomHeight:400">
						<img src="<?php echo $path.'428_'.$result[0]['picname']; ?>" />
					</a>
				</div>
                <div class="pro-gallery-nav">
                	<a href="#" class="pro-gallery-back" onclick="ec.product.imgSlider.prev()"></a>
                	<div class="pro-gallery-thumbs">
                        <ul id="pro-gallerys">
	                        <li class="current">
	                            <a href="#"><img width="64" src="<?php echo $path.'64_'.$result[0]['picname']; ?>" /></a>
	                        </li>
	                        <!--
							<li>
                        		<a href="#"><img src="images/55_55_1400549343717.jpg"  alt="华为 荣耀3X Pro 双卡双待 真八核"/></a>
							</li>
							<li>
                        		<a href="#"><img src="images/55_55_1400572713225.jpg"  alt="华为 荣耀3X Pro 双卡双待 真八核"/></a>
							</li>
							-->
                        </ul>
                    </div>
                    <a href="#" class="pro-gallery-forward" onclick="ec.product.imgSlider.next()"></a>
                </div>
            </div>
        </div>
        
    </div>
</div>


<div id="group-area" class="layout hide">
<div class="hr-20"></div>
	    <!--商品详情-优惠套装 -->
	    <div id="tab-bundle" class="pro-suit-area">
		<div class="h">
		    <h3>优惠套装</h3>
		    <div class="h-tab" id="bundle-tab">
		    </div>
		</div>
		<div class="b clearfix">
		    <div class="pro-main">
			<!--tab切换以pro-suit-parts-list作为模块进行切换- pro-suit-parts-list的style属性 overflow-x: scroll当子集li的N数大于5时出现-->

		    </div>
			<div class="pro-sub">
				<div class="pro-suit-cost-area">
		    	</div>
		    </div>
		</div>
	    </div>
	    <div id="tab-split" class="hr-20 hide"></div>
	    <!--商品详情-优惠套装 end -->

	    <!--商品详情-搭配推荐 -->
		<div id="tab-comb" class="pro-recommend-area">
		  <div class="h">
            <h3>搭配推荐</h3>
			<div class="h-tab">
            </div>
        </div>
		<div class="b clearfix">
		    <div class="pro-main" id="comb-pro-area">
		    </div>
		    <div class="pro-sub">
				<div class="pro-suit-cost-area">
		            <p>已搭配：<em id="comb-count">0</em>&nbsp;件</p>
			    	<p><b>组合价：&yen;<span id="comb-price"></span></b></p>
			    	<p class="pro-suit-cost-button"><a href="#" class="button-add-cart-2 button-style-1" title="加入购物车" onclick="ec.product.buyComb();return false;"><span>加入购物车</span></a></p>
				</div>
			</div>
		<div class="f"></div>
	    </div>
	    <!--商品详情-搭配推荐 end -->
</div>
</div>


<div class="hr-20"></div>
<div class="layout">
	<div class="fr u-3-4">
	<!-- 20131220-商品详情-start -->
		<div class="pro-detail-area clearfix">
		<div class="tool-fixed-holder"></div>
		<div id="pro-tab-all" class="pro-detail-tool">
			
		<!--商品详情-书签 --> 
        <div id="pro-tab-area" class="pro-detail-tab clearfix">
        	<div class="pro-detail-tab-nav">
            <ul>
                <li id="pro-tab-feature" class="current"><a href="javascript:;" title="商品详情"><span>商品详情</span></a></li>
                <li id="pro-tab-evaluate"><a href="javascript:;" title="用户评价"><span id="prd-remark-span-tab-evaluate">用户评价<em>（0）</em></span></a></li>
              
            </ul>
            </div>
            
            <div  class="pro-detail-tab-button"><a id="tab-addcart-button" href="#" class="button-style-1 button-add-cart-3" onclick="ec.product.buyComb();return false;">加入购物车</a><a href="#" id="tab-notice-button" class="button-style-2 button-notice-arrival-2"  onclick="ec.product.arrival();return false;">到货通知</a></div>
        </div>
        </div>

        <!--商品详情-->
        <div class="pro-detail-area">
            <!--产品特征 -->
<div id="pro-tab-feature-content" class="pro-detail-tab-area pro-feature-area">
<div>
<div id="pro-tab-feature-content-1860" class="hide">
<p><img src="images/20140916111509622.jpg" style="float:none;" title="3X-pro卖点图_01.jpg" /></p><p><img src="images/20140916111509811.jpg" style="float:none;" title="3X-pro卖点图_02.jpg" /></p><p><img src="images/2014091611151023.jpg" style="float:none;" title="3X-pro卖点图_03.jpg" /></p><p><img src="images/20140916111510289.jpg" style="float:none;" title="3X-pro卖点图_04.jpg" /></p><p><img src="images/20140916111510425.jpg" style="float:none;" title="3X-pro卖点图_05.jpg" /></p><p><img src="images/20140916111510614.jpg" style="float:none;" title="3X-pro卖点图_06.jpg" /></p><p><img src="images/20140916111510748.jpg" style="float:none;" title="3X-pro卖点图_07.jpg" /></p><p><img src="images/20140916111510927.jpg" style="float:none;" title="3X-pro卖点图_08.jpg" /></p><p><img src="images/20140916111511158.jpg" style="float:none;" title="3X-pro卖点图_09.jpg" /></p><p><img src="images/20140916111511362.jpg" style="float:none;" title="3X-pro卖点图_10.jpg" /></p><p><img src="images/20140916111511549.jpg" style="float:none;" title="3X-pro卖点图_11.jpg" /></p><p><img src="images/20140916111511680.jpg" style="float:none;" title="3X-pro卖点图_12.jpg" /></p><p><a target="_blank" href="#"><img src="images/20140916111431403.jpg" title="vmall_超大5.14.jpg" /></a><br /></p><p><br /></p>
</div>
</div>
<div class="hr-20"></div>
<div class="pro-disclaimer-area">
<!--原格式输出-->
<pre>
<?php echo $result[0]['descr']; ?>
</pre>

</div>
</div>
<!--规格参数 -->
<div id="pro-tab-parameter-content" class="pro-detail-tab-area pro-parameter-area hide"><div>正在加载中...</div></div>
<!--包装清单 -->
<div id="pro-tab-package-content" class="pro-detail-tab-area pro-package-area hide">
<div id="pro-tab-package-content-1860">
<p>手机 x 1，电池 x 1，充电器 x 1，USB线 x 1，快速指南 x 1，售后服务手册 x 1<br /></p>
</div>
</div>
<!--售后服务 -->
<div id="pro-tab-service-content" class="pro-detail-tab-area pro-service-area hide">
<div id="pro-tab-service-content-1860" class="hide">
<p>本产品全国联保，享受三包服务，质保期为：一年质保<br />如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7天内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！<br />售后服务电话：400-830-8300<br /><span>华为消费者BG官网： <a href="#">http://consumer.huawei.com/cn/</a></span><br /></p>
</div>
</div>
<div id="pro-tab-software-content" class="pro-detail-tab-area pro-software-area hide">
<iframe id="pro_software_iframe" name="pro_software_iframe" width="100%" height="300" frameborder="0" src="about:blank" data-src="http://app.hicloud.com/vmall/applist.action?divid=pro_software_iframe&itemid=100101122" scrolling="no"></iframe>
</div>	  

            <!--用户评价 -->
			<div id="pro-tab-evaluate-content" class="pro-detail-tab-area pro-evaluate-area  hide" style="display: block; ">
                <!--用户评分 -->
                <div class="pro-score-area clearfix">
                	<div class="pro-score-average">
						<span><b id="pro-evaluate-avgSorce">93</b>%</span>
						<em>好评度</em>
					</div>
					
					
					<div class="pro-score-percent">
						<dl>
							<dt>好评<em id="pro-score-percent-high">(93%)</em></dt>
							<dd><s id="pro-score-draw-high" style="width:93%"></s></dd>
						</dl>
						<dl>
							<dt>中评<em id="pro-score-percent-mid">(3%)</em></dt>
							<dd><s id="pro-score-draw-mid" style="width:3%"></s></dd>
						</dl>
						<dl>
							<dt>差评<em id="pro-score-percent-low">(4%)</em></dt>
							<dd><s id="pro-score-draw-low" style="width:4%"></s></dd>
						</dl>
					</div>
					
                  <div id="pro-score-impress" class="pro-score-impress"><dl><dt>买家印象：</dt><dd>支持国货<em>(23984)</em></dd><dd>性价比高<em>(23054)</em></dd><dd>外观时尚<em>(18825)</em></dd></dl></div>
                  
                   <div class="pro-score-button"><a href="/member/order/" class="button-style-4 button-comment">发表评价</a></div>
                </div>
                
                <!-- 20131220-商品详情-用户评论-书签-start -->
				<div class="pro-evaluate-tab clearfix">
					<div class="pro-evaluate-tab-nav">
						<ul id="pro-evaluate-click-type">
							<li id="pro-evaluate-click-all" class="current"><a href="javascript:;"><span>全部评价<em id="pro-evaluate-number-all">(50051)</em></span></a></li>
							<li id="pro-evaluate-click-high"><a href="javascript:;"><span>好评<em id="pro-evaluate-number-high">(46918)</em></span></a></li>
							<li id="pro-evaluate-click-mid"><a href="javascript:;"><span>中评<em id="pro-evaluate-number-mid">(1189)</em></span></a></li>
							<li id="pro-evaluate-click-low"><a href="javascript:;"><span>差评<em id="pro-evaluate-number-low">(1944)</em></span></a></li>
						</ul>
					</div>
					
					<!--分页 -->
                <div class="pro-evaluate-page">
					<!-- 20131220-分页-start -->
					<div id="pro-msg-pagerup" class="pager" style=""><ul><li class="pgNext link first first-empty">|&lt;</li><li class="pgNext link pre pre-empty">&lt;</li><span class="qpages"><li class="page-number link pgCurrent">1</li><li class="page-number link">2</li><li class="page-number link">3</li><li class="page-number link">4</li><li class="page-number link">5</li><li class="text">...</li><li class="page-number link page-number-last">5006</li></span><li class="pgNext link next">&gt;</li><li class="pgNext link last">&gt;|</li><li class="text quickPager"><span class="fl">第</span><div id="chatpage"><input id="quickPager" class="pagenum fl" value="1" style="width:20px;"><a id="enter" class="enter fl" href="javascript:void(0)"></a></div><span class="fl">&nbsp;/5006&nbsp;页</span></li></ul></div><!-- 20131220-分页-end -->
				</div>
					
				</div><!-- 20131220-商品详情-用户评价-书签-end -->
				
                <!--用户留言 -->
                <!-- 20131222-商品详情-用户评价-start -->
<div id="pro-msg-list" class="pro-comment-list" style="">
<?php

$ping=array('1'=>'差评','3'=>'中评','5'=>'好评');

//遍历评论
$sqlpl="select c.*,u.username,u.mypic from ".PREFIX."comment as c,".PREFIX."users as u where c.goodsid='{$_GET['id']}' and c.uid=u.id order by c.id desc;";
$respl=myQuery($sqlpl);
if($respl){
foreach($respl as $val):
?>

  <div class="pro-comment-item clearfix">
    <div class="pro-comment-user">
      <p class="pro-comment-user-img"><img src="<?php echo empty($val['mypic']) ? '../public/user/defaultface_user_small.png' : '../public/user/s_'.$val['mypic'];    ?>" alt="13926*****"></p>
      <p class="pro-comment-user-name"><?php echo $val['username']; ?>*****</p>
      <s class="pro-comment-user-tag"><i class="icon-vip-level-2"></i></s></div>
    <div class="pro-user-comment-main">
      <div class="pro-user-comment">
        <div class="h clearfix">
          <div class="pro-user-comment-score"><span class="pro-star"><span class="starRating-area"><s style="width:<?php echo $val['score']*20; ?>%"></s></span></span><em><b><?php echo $val['score'];  ?>&nbsp;分</b>&nbsp;&nbsp;<?php echo $ping[$val['score']]; ?></em></div>
          <div class="pro-user-comment-impress">
            <ul>
              <li>性价比高</li>
            </ul>
          </div>
          <div class="pro-user-comment-time"><?php echo date('Y-m-d H:i:s',$val['addtime']); ?></div>
        </div>
        <div class="b"><?php echo $val['content']; ?></div>
      </div>
      <div class="arrow"></div>
    </div>
  </div>
<?php endforeach; } ?>

  <div class="pro-comment-item clearfix">
    <div class="pro-comment-user">
      <p class="pro-comment-user-img"><img src="../public/user/defaultface_user_small.png" alt="violayue66"></p>
      <p class="pro-comment-user-name">violayue66</p>
      <s class="pro-comment-user-tag"><i class="icon-vip-level-2"></i></s></div>
    <div class="pro-user-comment-main">
      <div class="pro-user-comment">
        <div class="h clearfix">
          <div class="pro-user-comment-score"><span class="pro-star"><span class="starRating-area"><s style="width:100%"></s></span></span><em><b>5&nbsp;分</b>&nbsp;&nbsp;好评</em></div>
          <div class="pro-user-comment-impress">
            <ul>
              <li>支持国货</li>
            </ul>
          </div>
          <div class="pro-user-comment-time">2015-07-21 13:29:37</div>
        </div>
        <div class="b">整体不错，物有所值。如果配个智能保护套的话接听电话都不用打开前盖。续航也ok，如果只打电话发短信3天一充都没问题。但是，最大的问题是拍照，差到不行，植物园里的花朵，拍完回家发现只有花朵轮廓，没有花瓣；白天房间里窗户旁拍照，拍出来一片黑，而且自动闪光也不闪，强加闪光出来还是一片黑。成像效果远不如用了3年的旧手机，还不如06年买的卡片机，理论像素再高有什么用，感觉一般用用的程度也够不上。</div>
      </div>
      <div class="arrow"></div>
    </div>
  </div>
  <div class="pro-comment-item clearfix">
    <div class="pro-comment-user">
      <p class="pro-comment-user-img"><img src="../public/user/defaultface_user_small.png" alt="BigWade"></p>
      <p class="pro-comment-user-name">BigWade</p>
      <s class="pro-comment-user-tag"><i class="icon-vip-level-4"></i></s></div>
    <div class="pro-user-comment-main">
      <div class="pro-user-comment">
        <div class="h clearfix">
          <div class="pro-user-comment-score"><span class="pro-star"><span class="starRating-area"><s style="width:100%"></s></span></span><em><b>5&nbsp;分</b>&nbsp;&nbsp;好评</em></div>
          <div class="pro-user-comment-impress">
            <ul>
              <li>性价比高</li>
            </ul>
          </div>
          <div class="pro-user-comment-time">2015-07-21 13:24:42</div>
        </div>
        <div class="b">真心好看，非常非常喜欢！！！！</div>
      </div>
      <div class="arrow"></div>
    </div>
  </div>
  <div class="pro-comment-item clearfix">
    <div class="pro-comment-user">
      <p class="pro-comment-user-img"><img src="../public/user/defaultface_user_small.png" alt="Naojine"></p>
      <p class="pro-comment-user-name">Naojine</p>
      <s class="pro-comment-user-tag"><i class="icon-vip-level-3"></i></s></div>
    <div class="pro-user-comment-main">
      <div class="pro-user-comment">
        <div class="h clearfix">
          <div class="pro-user-comment-score"><span class="pro-star"><span class="starRating-area"><s style="width:100%"></s></span></span><em><b>5&nbsp;分</b>&nbsp;&nbsp;好评</em></div>
          <div class="pro-user-comment-impress">
            <ul>
              <li>性价比高</li>
              <li>外观时尚</li>
              <li>支持国货</li>
            </ul>
          </div>
          <div class="pro-user-comment-time">2015-07-21 13:04:31</div>
        </div>
        <div class="b">荣耀系列产品很不好快递也很快</div>
      </div>
      <div class="arrow"></div>
    </div>
  </div>
</div>
				<!-- 20131222-商品详情-用户评价-end -->
				
               
                <!--分页 -->
                <div class="pro-evaluate-page">
					<!-- 20131220-分页-start -->
					<div id="pro-msg-pager" class="pager" style=""><ul><li class="pgNext link first first-empty">|&lt;</li><li class="pgNext link pre pre-empty">&lt;</li><span class="qpages"><li class="page-number link pgCurrent">1</li><li class="page-number link">2</li><li class="page-number link">3</li><li class="page-number link">4</li><li class="page-number link">5</li><li class="text">...</li><li class="page-number link page-number-last">5006</li></span><li class="pgNext link next">&gt;</li><li class="pgNext link last">&gt;|</li><li class="text quickPager"><span class="fl">第</span><div id="chatpage"><input id="quickPager" class="pagenum fl" value="1" style="width:20px;"><a id="enter" class="enter fl" href="javascript:void(0)"></a></div><span class="fl">&nbsp;/5006&nbsp;页</span></li></ul></div><!-- 20131220-分页-end -->
					 	<div class="hr-15"></div>
					</div>
            	</div>
        	</div>
    	</div>

    </div>
    <div class="fl u-1-4">
    <!--购买该商品的用户还购买了 start-->
    <!--购买该商品的用户还购买了 end-->
<div class="hot-area">
	<div class="h">
		<h3><span>热销榜单</span></h3>
	</div>
	<div class="b">
		<!--商品列表 -->
		<div class="pro-list">
		<ul>
<!--根据浏览量遍历商品-->
<?php
$sqlk="select * from ".PREFIX."goods order by clicknum desc limit 0,5";
$resk=myQuery($sqlk);
$jsq=1; //计时器
foreach($resk as $v):
?>
			<li>
			<div>
			    <p class="p-img"><a href="article.php?id=<?php echo $v['id']; ?>" ><img width="56" src="<?php echo $path.'64_'.$v['picname']; ?>" alt=""/></a><s class="s<?php echo $jsq; ?>"></s></p>
			    <p class="p-name"><a href="article.php?id=<?php echo $v['id']; ?>" title=""><?php echo $v['goods']; ?> 八核 移动4G版 16GB存储（白色）</a></p>
			    <p class="p-price"><b>&yen;<?php echo $v['price']; ?></b></p>
			</div>
		    </li>
<?php  $jsq++;  endforeach; ?>



		</ul>
	    </div>
	</div>
</div>
        <div id="pro-seg-hot" class="hr-20"></div>
<!-- 最近浏览过的商品  -->
<div id="product-history-area" class="rl-area hide">
    <div class="h">
        <h3 class="fl"><span>最近浏览过的商品</span></h3>
        <span class="fr"><a class="icon-clear" href="#" onclick="ec.product.history.clear(function(){$('#product-history-area').hide();});">清空</a></span>
    </div>
    <div class="b">
        <!--商品列表  -->
        <div class="pro-list">
            <ul id="product-history-list"></ul>
        </div>
    </div>
</div>    </div>
</div>

<div class="hr-60"></div>

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


<!-- 20150331-咨询提交成功提示-start -->
<textarea id="product-counsel-html" class="hide">
    <div class="box-prompt-success-area">
		<div class="h">
		<i></i>
		</div>
		<div class="b">
			<p>咨询提交成功，请耐心等待客服人员的答复。</p>
			<p id="counsel-success-msg">回复将发送到您的安全邮箱，您还未绑定，请先绑定安全邮箱。</p>
		</div>
	</div>
	<div id="counsel-bind-email" class="box-custom-button">
	    <a href="#" class="box-change box-button-style-2" target="_blank" onclick="ec.product.secEmailOper()"><span>去绑定</span></a>
	</div>
</textarea>  	

<textarea id="product-attention-html" class="hide">
<!-- 20130423-表单-关注-start -->
<div class="form-interest-area">
	<div class="form-edit-area">
		<form method="post" onsubmit="return false;">
		<table border="0" cellpadding="0" cellspacing="0">
			<tbody><tr>
				<th>邮箱地址</th>
				<td><input class="text vam span-300" maxlength="50" name="email" value="" type="text"></td>
			</tr>
			<tr>
				<th>手机号码</th>
				<td><input class="text vam span-300" maxlength="12" name="mobile" value="" type="text"></td>
			</tr>
		</tbody></table>
		</form>
	</div>
	<div class="form-edit-action"><input class="button-action-submit-2 box-ok" value="" type="submit"></div>
</div><!-- 20130423-表单-关注-end -->
</textarea>                    


<?php include('footer.php'); ?>

</body>
</html>