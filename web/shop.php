<?php
require('../public/common.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-cn">
<title>购物车华为商城</title>
<link href="./css/shop/ec.core.min.css?20150213" rel="stylesheet" type="text/css">
<link href="./css/shop/main.min.css?20141216" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="./css/shop/style.css">
</head>

<body class="wide sc" screen_capture_injected="true">
<!-- 20130605-qq-彩贝-start -->
<div class="qq-caibei-bar hide" id="caibeiMsg">
  <div class="layout">
    <div class="qq-caibei-bar-tips" id="HeadShow"></div>
    <div class="qq-caibei-bar-userInfo" id="ShowMsg"></div>
  </div>
</div>
<!-- 20130605-qq-彩贝-end -->

<div class="shortcut">
  <div class="layout">
    <div class="s-sub">
      <ul>
        <li class="s-hw"><a href="#" target="_blank">华为官网</a></li>
        <li class="s-honor"><a href="#" target="_blank">华为荣耀</a></li>
        <li class="s-emui"><a href="#" target="_blank">EMUI</a></li>
        <li class="s-appstore"><a href="#" target="_blank">应用市场</a></li>
        <li class="s-cloud"><a href="#" target="_blank">云服务</a></li>
        <li class="s-developer"><a href="#" target="_blank">开发者联盟</a></li>
        <li class="s-club"><a href="#" target="_blank">花粉俱乐部</a></li>
      </ul>
    </div>
    <div class="s-main">
      <ul>
<?php if(empty($_SESSION['user'])): ?>
          <li class="s-login" id="unlogin_status">
            <a href="./login.php" rel="nofollow">登录</a>
            &nbsp;&nbsp;&nbsp;<a href="./reg.php" rel="nofollow">注册</a></li>
<?php else: ?>
<li class="s-user hide" id="login_status" style="display: list-item; ">
          <!--
            ie6下鼠标悬停追加ClassName： hover
            示例：[ s-dropdown hover ]
          -->
          <div class="s-dropdown">
            <div class="h">
              <a href="#" id="customer_name" rel="nofollow" timetype="timestamp" class="link-user"><?php echo  $_SESSION['user']['username'] ?></a>
               <em class="vip-state" id="vip-info">
                <!--<a class="link-noAct" href="#" id="vip-inActive" title="请完善个人信息，即刻享受会员特权">去激活</a>-->
                <a href="#" title="V0" id="vip-Active" ><i class="icon-vip-level-0"></i>&nbsp;</a>
              </em>
              <s></s>
            </div>
            <div class="b">
              <p><a href="#" target="_blank" id="user-center">我的华为帐号</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="useraction.php?a=logout">退出</a></p>
            </div>
          </div>
        </li>
<?php endif; ?>
        <li class="s-promo"><a href="#" rel="nofollow">V码(优购码)</a></li>
        <li class="s-hwep hide" id="preferential"></li>
        <li class="s-mobile"><a href="#" target="_blank">手机版</a></li>
        <li class="s-sitemap">
          <div class="s-dropdown">
            <div class="h"> <a href="#">网站导航</a> <s></s> </div>
            <div class="b">
              <p><a href="#">帮助中心</a></p>
              <p><a href="#" target="_blank">PC软件</a></p>
              <p><a href="#" target="_blank">数字音乐</a></p>
              <p><a href="#" target="_blank">爱旅</a></p>
              <p><a href="#" target="_blank">华为网盘</a></p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<!--头部 -->
<div class="order-header">
  <div class="g">
    <div class="fl">
      <div class="logo"><a href="./index.php" title="华为商城"><img src="images/newLogo.png" alt=""></a></div>
    </div>
    <div class="fr"> 
      <!--步骤条-三步骤 -->
      <div class="progress-area progress-area-3"> 
        <!--我的购物车 -->
        <div id="progress-cart" class="progress-sc-area hide" style="display: block; ">我的购物车</div>
        <!--核对订单 -->
        <div id="progress-confirm" class="progress-co-area hide">填写核对订单信息</div>
        <!--成功提交订单 -->
        <div id="progress-submit" class="progress-sso-area hide">成功提交订单</div>
      </div>
    </div>
  </div>
</div>

<div class="layout"> 
  <!-- 20131223-购物车-start -->
  <div class="sc-list"> 
    <!-- 20131223-购物车-商品列表-start -->
    <div class="sc-pro-list"> 
      
      <!-- 20131223-订单-商品-标题-start -->
      <div class="sc-pro-title-area">
        <div class="h">
          <table border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
                <th class="tr-check"> <input id="checkAll-top" type="checkbox" class="vam" autocomplete="off">
                </th>
                <th class="tr-pro">商品</th>
                <th class="tr-price">单价<em>（元）</em></th>
                <th class="tr-quantity">数量</th>
                <th class="tr-subtotal">小计<em>（元）</em></th>
                <th class="tr-operate">操作</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- 20131223-订单-商品-标题-end -->
      <form id="cart-form" autocomplete="off" method="get">
        <input type="hidden" name="state" value="1">
        <span id="cart-list"><!--product-list start-->

<?php
//foreach遍历购物车
$path='../public/uploads/';
$arri=array('联通标准版套餐','移动标准版套餐','双4G版套餐','电信标准版套餐');
$arrj=array('黑色','白色','金色');
if(!empty($_SESSION['shoplist'])){
foreach($_SESSION['shoplist'] as $key=>$value):
//总金额
$money+=$value['price']*$value['num'];
?>
        <div class="sc-pro-area selected" id="order-pro-3395">
          <table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr class="sc-pro-item">
                <td rowspan="4" class="tr-check"><input id="box-3395" class="checkbox" type="checkbox" name="skuIds" onclick="ec.shoppingCart.check(this);" value="3395" data-type="1" checked=""></td>
                <td class="tr-pro"><div class="pro-area clearfix">
                    <p class="p-img"><a title="" target="_blank" href="#" seed="cart-item-name"><img width="63" alt="" src="<?php echo $path.'64_'.$value['picname']; ?>"></a></p>
                    <p class="p-name"><a title="" target="_blank" href="#" seed="cart-item-name">华为&nbsp;<?php echo $value['goods']; ?>&nbsp;<?php echo $arri[$value['network']]; ?>&nbsp;&nbsp;16GB存储（<?php echo $arrj[$value['color']]; ?>）套餐版</a></p>
                    <p class="p-sku"><em>颜色：<?php echo $arrj[$value['color']]; ?></em></p>
                    <p class="understock-3395 hide"></p>
                  </div></td>
                <td class="tr-price"><span>¥<?php echo $value['price']; ?></span></td>
                <td class="tr-quantity" rowspan="4"><div class="sc-stock-area">
                    <div class="stock-area">
                      <a href="shopaction.php?a=update&type=jian&key=<?php echo $key; ?>" class="icon-minus-3 vam" title="减"><span>-</span></a>
                      <input id="quantity-3395" type="text" class="shop-quantity textbox vam" value="<?php echo $value['num'] ?>" data-skuid="3395" data-type="1" seed="cart-item-num">
                      <a href="shopaction.php?a=update&type=jia&key=<?php echo $key; ?>" class="icon-plus-3 vam" title="加"><span>+</span></a></div>
                    <p class="normalLimitstock-3395 hide"></p>
                  </div></td>
                <td rowspan="4" class="tr-subtotal"><b>¥<?php echo $value['price']*$value['num']; ?></b></td>
                <td rowspan="4" class="tr-operate"><a href="shopaction.php?a=del&key=<?php echo $key; ?>" class="icon-sc-del" title="删除" onclick="return confirm('您确认要删除该商品吗？');" seed="cart-item-del">删除</a></td>
              </tr>
            </tbody>
          </table>
        </div>
<?php endforeach; } ?>


        <!--product-list end--></span>
      </form>
    </div>
    <div class="hr-20"></div>
    <div id="cart-total-area" class="sc-total-area clearfix">
      <div class="sc-total-control">
        <input id="checkAll-buttom" type="checkbox" name="" class="vam" autocomplete="off" checked="">
        <label class="vam" for="checkAll-buttom">全选</label>
        <a class="vam" href="#" seed="cart-all-del">删除选中商品</a></div>
      <div class="sc-total-price">
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <th>总计金额：</th>
              <td id="sc-cartInfo-totalOriginalPrice">¥<?php echo $money; ?></td>
            </tr>
            <tr>
              <th>共节省：</th>
              <td id="sc-cartInfo-minusPrice">¥0.00</td>
            </tr>
            <tr>
              <th><em>合计(不含运费)：<em></em></em></th>
              <td><b id="sc-cartInfo-totalPrice">¥<?php echo $money; ?></b></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="hr-25"></div>
    <div class="sc-action-area clearfix">
      <a class="button-style-4 button-go-shopping-3" href="./index.php">继续购物</a>
      <a class="button-style-1 button-go-checkout-2" href="confirm.php" id="jiesuan" seed="cart-pay">去结算</a>
      <div class="sc-action-tips hide" id="sc-action-tips">
        <div class="tips-style-1 tips-area"><i></i>
          <div class="tips-text">
            <p id="tips-text-p">购物车中有库存不足商品，请处理后结算</p>
          </div>
          <s></s></div>
      </div>
    </div>
    <!--购物车-商品列表 end -->
<!--
<script>
$(function(){
  $('#jiesuan').click(function(){

    //alert('kjlj');

    $.get('shopaction.php?a=submit','',
      function(data,state){
        alert(data);
      })

    })


  })
</script>
-->
    <!--购物车-空数据 -->
    <div id="cart-empty-msg" class="sc-empty-area hide"> 亲，您购物车里还没有物品哦，快去逛逛吧！ </div>
    <!-- 购物车列表 End--> 
  </div>
  <div class="hr-35"></div>
  <!--商品删除记录-20121011 -->
  <div id="pro-recover-area" class="pro-delete-area hide" style="display: none; ">
    <div class="h clearfix">
      <h3>已删除商品</h3>
      <table border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <th class="tr-pro">商品</th>
            <th class="tr-quantity">数量</th>
            <th class="tr-subtotal">小计<em>（元）</em></th>
            <th class="tr-operate">操作</th>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="b">
      <div class="pro-delete-item">
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody id="pro-recover-tb">
          </tbody>
        </table>
      </div>
    </div>
    <div id="pro-delete-shop-start" class="f button-pro-delete-expand hide"><a href="#">更多已删除商品<i></i><s></s><b></b></a></div>
    <div id="pro-delete-shop-end" class="f button-pro-delete-shrink hide"><a href="#">收起已删除商品<i></i><s></s><b></b></a></div>
  </div>
  <!--删除记录结束 -->
  <div class="hr-25"></div>
  <!--热门推荐-20121011 -->
  <div id="pro-recommend-area" class="pro-scroller-area hide">
    <div class="h">
      <h3>您可能感兴趣的商品</h3>
    </div>
    <div class="b"> 
      <!--左边滚动按钮className：pro-scroller-back 不可点击className：pro-scroller-back-disabled ；右边滚动按钮className：pro-scroller-forward 不可点击className：pro-scroller-forward-disabled --> 
      <a id="cart-img-prev" class="pro-scroller-back-disabled" href="#" onclick="ec.cart.slider.prev(this)"></a>
      <div class="pro-list"> 
        <!--ul的宽度等于li宽度*N -->
        <ul style="width:1158px;" id="pro-recommend-list">
        </ul>
      </div>
      <a id="cart-img-next" class="pro-scroller-forward" href="#" onclick="ec.cart.slider.next(this)"></a> </div>
  </div>
  <!--热门推荐结束 --> 
  
  <!-- 购物车主体 End　--> 
</div>


<?php include('./footer.php'); ?>
</body>
</html>