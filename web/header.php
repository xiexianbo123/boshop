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
              <a href="ucenter.php" id="customer_name" rel="nofollow" timetype="timestamp" class="link-user"><?php echo  $_SESSION['user']['username'] ?></a>
               <em class="vip-state" id="vip-info">
                <!--<a class="link-noAct" href="#" id="vip-inActive" title="请完善个人信息，即刻享受会员特权">去激活</a>-->
                <a href="#" title="V0" id="vip-Active" ><i class="icon-vip-level-0"></i>&nbsp;</a>
              </em>
              <s></s>
            </div>
            <div class="b">
              <p><a href="ucenter.php" target="_blank" id="user-center">我的华为帐号</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="useraction.php?a=logout">退出</a></p>
            </div>
          </div>
        </li>
<?php endif; ?>

        <li class="s-promo"><a href="#" rel="nofollow">V码(优购码)</a></li>
        <li class="s-hwep hide" id="preferential"></li>
        <li class="s-mobile"><a href="#" target="_blank">手机版</a></li>
        <li class="s-sitemap">
          <div class="s-dropdown ">
            <div class="h">
              <a href="#">网站导航</a>
              <s></s>
            </div>
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

<div class="top-banner" id="top-banner-block"></div>
<header class="header">
  <div class="layout">
    <!-- 21030909-logo-start -->
    <div class="logo"><a href="./index.php" title="Vmall.com - 华为商城"><img src="images/newLogo.png" alt="Vmall.com - 华为商城"/></a></div><!-- 21030909-logo-start -->
    <!-- 20130909-搜索条-焦点为search-form增加className:hover -start -->
    <div class="searchBar">
      <!-- 页头热门搜索 -->
      <div class="searchBar-form" id="searchBar-area">
        <form method="get" action="search.php">          
          <input type="text" name="word" value="<?php echo empty($_GET['word']) ? '':$_GET['word']; ?>" class="text" maxlength="100" id="search-kw" /><input type="submit" class="button" value="搜索" />
        </form>
      </div>
      
        <div class="searchBar-key">
  <b>热门搜索：</b>
      
    <a href="#" target="_blank">荣耀7</a>
      
      
    <a href="#" target="_blank">华为P8</a>
      
      
    <a href="#" target="_blank">指纹识别</a>
      
      
    <a href="#" target="_blank">荣耀4C</a>
      
      
    <a href="#" target="_blank">HUAWEI</a>
      
      
      
</div>
      
    </div><!-- 20130909-搜索条-end -->
    <!-- 21030910-头部-工具栏-start -->
    <div class="header-toolbar">
      <!-- 21030910-头部-工具栏-焦点为header-toolbar-item增加ClassName:hover -->
      <div class="header-toolbar-item" id="header-toolbar-imall">
        <!-- 21030909-我的商城-start -->
        <div class="i-mall">
          <div class="h"><a href="./home.php" rel="nofollow" timeType="timestamp">我的商城</a>
          <i></i><s></s><u></u></div>
          <div class="b" id="header-toolbar-imall-content">
            <div class="i-mall-prompt" id="cart_unlogin_info">
              <?php if(empty($_SESSION['user'])): ?>
              <p>你好，请&nbsp;&nbsp;<script>document.write('<a href="./login.php"  rel="nofollow">登录</a>');</script> | <a href="./reg.php" rel="nofollow">注册</a></p>
              <?php else: ?>
              <p><a href="#"><?php echo $_SESSION['user']['username']; ?></a><em class="vip-state" id="vip-info">&nbsp;&nbsp;&nbsp;&nbsp;<a href="/member/point" title="VMALL V0会员" id="vip-Active"><i class="icon-vip-level-0"></i></a></em></p>
              <?php endif; ?>
            </div>
<?php if(!empty($_SESSION['user'])): ?>
            <div class="i-mall-uc " id="cart_login_info">
              <ul>
                <li><a href="./home.php" rel="nofollow" timeType="timestamp">我的订单</a></li>
                <li><a href="#" timeType="timestamp">待支付</a><span id="toolbar-orderWaitingHandleCount" class="hide">0</span></li>
                <li><a href="#" timeType="timestamp">待评论</a><span id="toolbar-notRemarkCount" class="hide">0</span></li>
                <li><a href="#" timeType="timestamp">优惠券</a><span id="toolbar-couponCount" class="hide">0</span></li>
                <li><a href="#" timeType="timestamp">站内信</a><span id="toolbar-newMsgCount" class="hide">0</span></li>
              </ul>
            </div>
<?php endif; ?>

          </div>
        </div><!-- 21030909-我的商城-end -->
      </div>
      <div class="header-toolbar-item" id="header-toolbar-minicart">
        <!-- 21030909-迷你购物车-start -->
<?php if(empty($_SESSION['user'])): ?>
        <div class="minicart">
          <div class="h" id="header-toolbar-minicart-h"><a href="shop.php" onclick="alert('您的购物车是空的，赶紧选购吧！');return false;" rel="nofollow" timeType="timestamp">我的购物车<span><em id="header-cart-total">0</em><b></b></span></a><i></i><s></s><u></u></div>
          <div class="b" id="header-toolbar-minicart-content">
            <div class="minicart-pro-empty" id="minicart-pro-empty">
              <span class="icon-minicart">您的购物车是空的，赶紧选购吧！</span>
            </div>
<?php else: ?>
        <div class="minicart">
          <div class="h" id="header-toolbar-minicart-h"><a href="shop.php" rel="nofollow" timeType="timestamp">我的购物车<span><em id="header-cart-total">0</em><b></b></span></a><i></i><s></s><u></u></div>
          <div class="b" id="header-toolbar-minicart-content">
<?php endif; ?> 
          </div>
        </div><!-- 21030909-迷你购物车-end -->
      </div>
<script>
//购物车加载
$(document).ready(function(){
    //页面打开的时候就加载一次
    $.post('shopaction.php?a=top','',
      function(data,textStatus){
        //alert(data.html);
        //$("#cart-tips").show();
        //$('#pro-add-success').html(data.html)
        $('#header-toolbar-minicart-content').html(data.html);
        $('#header-cart-total').html(data.num);
      },
      'json');

    //鼠标放上去的时候可以刷新购物车
  $('#header-toolbar-minicart-h').mouseover(function(){
    
    //alert('aa');

    $.post('shopaction.php?a=top','',
      function(data,textStatus){
        //alert(data.html);
        //$("#cart-tips").show();
        //$('#pro-add-success').html(data.html)
        $('#header-toolbar-minicart-content').html(data.html);
        $('#header-cart-total').html(data.num);
      },
      'json');

  })
})
</script>
    </div><!-- 21030910-头部-工具栏-start -->
    <!-- 20140910-头部-二维码-start -->
    <div class="header-qrcode">
      <div class="ec-slider" id="ec-erweima">
        <ul class="ec-slider-list">
          <li class="ec-slider-item">
            <p><a href="#" target="blank" title="扫码下载客户端"><img src="images/qrcode_vmall_app01.png" alt="华为商城官方客户端"/></a></p>
            <p><a href="#" target="blank"><span>扫码下载客户端</span></a></p>
          </li>
        </ul>
      </div>
    </div><!-- 20140910-头部-二维码-end -->
  </div>      
</header><!-- 21030909-头部-end -->


<textarea id="micro-cart-tpl" class="hide">
<!--#macro microCartList data-->
  
  <!--#list data.bundlerList as b-->
    <!--#if (b.skuList && b.skuList.length > 0) -->
    <!--#var lst = b.skuList[0];-->
    <!--#var skuId='#'+lst.skuId;-->
    <li class="minicart-pro-item">
      <div class="pro-info">
        <div class="p-img"><a href="#" title="" target="_blank"><img src="http://res.vmall.com/pimages/{#lst.photoPath}78_78_{#lst.photoName}" alt="{#lst.prdSkuName}" /></a></div>
        <div class="p-name"><a href="#" title="{#lst.prdSkuName}" target="_blank">{#lst.prdSkuName}&nbsp;<span class="p-slogan">{#lst.skuPromWord}</span><span class="p-promotions hide"></span></a></div>
        <div class="p-status">
          <div class="p-price"><b>&yen;&nbsp;{#parseFloat(lst.skuPrice).toFixed(2)}</b><em>x</em><span>{#b.quantity*lst.quantity}</span></div>
          <div class="p-tags">
            <span class="p-mini-tag-suit">套装</span>
            <span class="p-mini-tag-sale">惠</span>
            <!--#if (lst.giftList && lst.giftList.length > 0)--><span class="p-mini-tag-gift">赠</span><!--/#if-->
            <!--#if (lst.extendList && lst.extendList.length > 0)--><span class="p-mini-tag-extend">延保</span><!--/#if-->
          </div>
        </div>
        <a href="#" class="icon-minicart-del" title="删除" onclick="ec.minicart.del(this , {#b.bundleId}, {#b.productType})">删除</a>
      </div>
    </li>
    <!--/#if-->
  <!--/#list-->
  <!--#list data.productList as lst-->
  <!--#var skuId='#'+lst.skuId;-->
  <li class="minicart-pro-item">
    <div class="pro-info">
      <div class="p-img"><a href="#" title="" target="_blank"><img src="http://res.vmall.com/pimages/{#lst.photoPath}78_78_{#lst.photoName}" alt="{#lst.prdSkuName}" /></a></div>
      <div class="p-name"><a href="#" title="{#lst.prdSkuName}" target="_blank">{#lst.prdSkuName}&nbsp;<span class="p-slogan">{#lst.skuPromWord}</span><span class="p-promotions hide"></span></a></div>
      <div class="p-status">
        <div class="p-price"><b>&yen;&nbsp;{#parseFloat(lst.skuPrice).toFixed(2)}</b><em>x</em><span>{#lst.quantity}</span></div>
        <div class="p-tags">
          <!--#if (lst.campaignInfoList && lst.campaignInfoList.length > 0)--><span class="p-mini-tag-sale">惠</span><!--/#if-->
          <!--#if (lst.giftList && lst.giftList.length > 0)--><span class="p-mini-tag-gift">赠</span><!--/#if-->
          <!--#if (lst.extendList && lst.extendList.length > 0)--><span class="p-mini-tag-extend">延保</span><!--/#if-->
        </div>
      </div>
      <a href="#" class="icon-minicart-del" title="删除" onclick="ec.minicart.del(this , {#lst.skuId}, {#lst.productType})">删除</a>
    </div>
  </li>
  <!--/#list-->
<!--/#macro-->
</textarea>

<textarea class="hide" id="ec-binding-phone">
  <div id="ec-binding-phone-1" class="ec-binding-phone-box hide">
    <!-- 20141011-绑定安全手机号提示-start -->
    <div class="safetyPhone-prompt-area">
      <div class="h">
        <i></i>
      </div>
      <div class="b">
        <p>尊敬的用户，为了您在商城正常购物、保护您的权益，请您<em>绑定一个安全手机号</em>以享受华为商城的所有服务！</p>
      </div>
    </div>
    <div class="box-custom-button">
      <a class="box-button-style-2" href="#" onclick="ec.binding.showOk()" target="_blank" id="ec-binding-phone-url-1"><span>立即绑定</span></a></a>
    </div>
    <!-- 20141011-绑定安全手机号提示-end -->
  </div>
  <div id="ec-binding-phone-2" class="ec-binding-phone-box hide">
    <!-- 20141424-绑定安全手机号提示-start -->
    <div class="safetyPhone-prompt-area">
      <div class="h">
        <i></i>
      </div>
      <div class="b">
        <p>请您在新打开的页面中完成绑定安全手机号操作。</p>
        <p>完成绑定后请根据您的情况点击下面的按钮。</p>
      </div>
    </div>
    <div class="box-custom-button">
      <a class="box-button-style-2" href="#" onclick="ec.binding.resetShow()"><span>绑定成功</span></a><a class="box-change box-button-style-2" href="#" target="_blank" id="ec-binding-phone-url-2"><span>重新绑定</span></a>
    </div>
    <!-- 20141424-绑定安全手机号提示-end -->
  </div>
  <div id="ec-binding-phone-3" class="ec-binding-phone-box hide">
    <!-- 20141424-安全手机号绑定提示失败-start -->
    <div class="box-prompt-error-area">
      <div class="h">
        <i></i>
      </div>
      <div class="b">
        <p class="tal f12">对不起，您未成功绑定安全手机号。</p>
        <p class="tal f12 black">为了您在商城正常购物、保护您的权益，请您绑定一个安全手机号码以享受华为商城的所有服务。</p>
      </div>
    </div>
    <div class="box-custom-button">
      <a href="#" class="box-button-style-2" target="_blank" onclick="ec.binding.showOk()" id="ec-binding-phone-url-3" ><span>立即绑定</span></a>
    </div>
    <!-- 20141424-安全手机号绑定提示失败-end -->
  </div>
</textarea>
<!-- 导航 -->
<!--BO HEADER-->

<div class="naver-main">
  <div class="layout"> 
    
    <!-- 20140823-分类-start -->
<?php
//当前页面URL
$url=$_SERVER['REQUEST_URI'];
//var_dump($url);die;
if(strpos($url,'index.php')): ?>
    <div class="category category-index" id="category-block"> 
<?php else: ?>
    <div class="category" id="category-block"> 
<?php endif; ?>
      
      <!-- 20140822-分类-start -->
      
      <div class="h">
        <h2>全部商品</h2>
        <i class="icon-category"></i> </div>
      <div class="b">
        <ol class="category-list">
<?php
//遍历导航
$sql="select * from ".PREFIX."type order by concat(path,id)";
$result=myQuery($sql);
//var_dump($result);die;

foreach($result as $value){
  if($value['pid'] == 0){
    echo '<li class="category-item "><div class="category-info"><h3> <a href="list.php?id='.$value['id'].'" target="_blank"><span>'.$value['name'].' </span></a></h3>';
    $aaid=$value['id'];
    //定条，限制只能为3条,0,1,2
    $i=0;
    foreach($result as $v){
      if($i<3 && $v['pid'] == $aaid){
        echo '<a href="list.php?id='.$v['id'].'" target="_blank"><span>'.$v['name'].'</span></a>';
        $i++;
      }
    }

    echo '</div><div class="category-panels"><ul class="subcate-list">';
    foreach($result as $val){
      if($val['pid'] == $aaid){
        //echo '<a href="list.php?id='.$val['id'].'" target="_blank"><span>'.$val['name'].'</span></a>';
        echo '<li class="subcate-item"> <a href="list.php?id='.$val['id'].'" target="_blank"> <span>'.$val['name'].' </span> </a> </li>';
      }
    }
    echo '</ul></div></li>';
  }
}


?>
     
          <!-- 鼠标悬停增加ClassName： hover -->
<!--
          <li class="category-item ">
            <div class="category-info">
              <h3> <a href="toplist.php?id=2" target="_blank"><span>手机 </span></a></h3>
              <a href="list.php?id=2" target="_blank"><span>荣耀 </span></a> <a href="#" target="_blank"><span>畅玩 </span></a> <a href="#" target="_blank"><span>华为 Mate/P系列 </span></a> </div>
            <div class="category-panels">
              <ul class="subcate-list">
                <li class="subcate-item"> <a href="#" target="_blank"> <span>荣耀 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>畅玩 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>华为 Mate/P系列 </span> </a> </li>
                <li class="subcate-item"> <a href="#" > <span>G/Y系列 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>运营商合约 </span> </a> </li>
              </ul>
              <dl class="category-banner">
                <dt>推荐商品</dt>
                <dd><a href="#" target="_blank"><span>荣耀6联通合约 </span></a></dd>
                  <dd><a href="#" target="_blank"><span>荣耀3C畅玩套餐版 </span></a></dd>
              </dl>
            </div>
            <i class="icon-cate-arrow"></i> </li>
          <li class="category-item odd">
            <div class="category-info">
              <h3> <a href="#" target="_blank"><span>平板 & 穿戴 </span></a></h3>
              <a href="#" target="_blank"><span>平板电脑 </span></a> <a href="#" target="_blank"><span>手环 </span></a> </div>
            <div class="category-panels">
              <ul class="subcate-list">
                <li class="subcate-item"> <a href="#" target="_blank"> <span>平板电脑 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>手环 </span> </a> </li>
              </ul>
              <dl class="category-banner">
                <dt>推荐商品</dt>
                <dd><a href="#" target="_blank"><span>荣耀平板 </span></a></dd>
                <dd><a href="#" target="_blank"><span>10.1英寸平板 </span></a></dd>
                <dd><a href="#" target="_blank"><span>荣耀智能手环 </span></a></dd>
                <dd><a href="#" target="_blank"><span>荣耀畅玩手环 </span></a></dd>
              </dl>
            </div>
            <i class="icon-cate-arrow"></i> </li>
          <li class="category-item ">
            <div class="category-info">
              <h3> <a href="#" target="_blank"><span>智能家居 </span></a></h3>
              <a href="#" target="_blank"><span>电力猫 </span></a> <a href="#" target="_blank"><span>路由器 </span></a> <a href="#" target="_blank"><span>电视盒子 </span></a> </div>
            <div class="category-panels">
              <ul class="subcate-list">
                <li class="subcate-item"> <a href="#" target="_blank"> <span>电力猫 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>路由器 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>电视盒子 </span> </a> </li>
              </ul>
              <dl class="category-banner">
                <dt>推荐商品</dt>
                <dd><a href="#" target="_blank"><span>荣耀路由 </span></a></dd>
                <dd><a href="#" target="_blank"><span>荣耀盒子 </span></a></dd>
                <dd><a href="#" target="_blank"><span>荣耀电力猫 </span></a></dd>
                <dd><a href="#" ><span>酷开荣耀智能电视 </span></a></dd>
              </dl>
            </div>
            <i class="icon-cate-arrow"></i> </li>
          <li class="category-item odd">
            <div class="category-info">
              <h3> <a href="#" target="_blank"><span>必备配件 </span></a></h3>
              <a href="#" target="_blank"><span>保护壳 </span></a> <a href="#" target="_blank"><span>保护套 </span></a> <a href="#" target="_blank"><span>贴膜 </span></a> </div>
            <div class="category-panels">
              <ul class="subcate-list">
                <li class="subcate-item"> <a href="#" target="_blank"> <span>保护壳 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>保护套 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>贴膜 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>蓝牙耳机 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>入耳式耳机 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>头戴耳机 </span> </a> </li>
              </ul>
              <dl class="category-banner">
                <dt>推荐商品</dt>
                <dd><a href="#" target="_blank"><span>华为 降噪耳机套装 </span></a></dd>
                <dd><a href="#" target="_blank"><span>Mate7 翻盖保护套 </span></a></dd>
                <dd><a href="#" target="_blank"><span>耐翔 蜂巢 蓝牙耳机 </span></a></dd>
              </dl>
            </div>
            <i class="icon-cate-arrow"></i> </li>
          <li class="category-item ">
            <div class="category-info">
              <h3> <a href="#" target="_blank"><span>基础配件 </span></a></h3>
              <a href="#" target="_blank"><span>蓝牙音箱 </span></a> <a href="#" target="_blank"><span>移动电源 </span></a> <a href="#" target="_blank"><span>电池/充电器 </span></a> </div>
            <div class="category-panels">
              <ul class="subcate-list">
                <li class="subcate-item"> <a href="#" target="_blank"> <span>蓝牙音箱 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>移动电源 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>电池/充电器 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>卡托/线材 </span> </a> </li>
              </ul>
              <dl class="category-banner">
                <dt>推荐商品</dt>
                <dd><a href="#" target="_blank"><span>华为 NFC蓝牙音箱 </span></a></dd>
                <dd><a href="#" target="_blank"><span>4800mAH 移动电源 </span></a></dd>
                <dd><a href="#" target="_blank"><span>MATE7 充电底座 </span></a></dd>
              </dl>
            </div>
            <i class="icon-cate-arrow"></i> </li>
          <li class="category-item odd">
            <div class="category-info">
              <h3> <a href="#" target="_blank"><span>潮流配件 </span></a></h3>
              <a href="#" target="_blank"><span>支架/钥匙扣 </span></a> <a href="#" target="_blank"><span>智能配件 </span></a> </div>
            <div class="category-panels">
              <ul class="subcate-list">
                <li class="subcate-item"> <a href="#" target="_blank"> <span>支架/钥匙扣 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>智能配件 </span> </a> </li>
              </ul>
              <dl class="category-banner">
                <dt>推荐商品</dt>
                <dd><a href="#" target="_blank"><span>RyFit 体质分析仪 </span></a></dd>
              </dl>
            </div>
            <i class="icon-cate-arrow"></i> </li>
          <li class="category-item ">
            <div class="category-info">
              <h3> <a href="#" target="_blank"><span>应用市场 </span></a></h3>
              <a href="#" target="_blank"><span>手机游戏 </span></a> <a href="#" target="_blank"><span>手机应用 </span></a> </div>
            <div class="category-panels">
              <ul class="subcate-list">
                <li class="subcate-item"> <a href="#" target="_blank"> <span>手机游戏 </span> </a> </li>
                <li class="subcate-item"> <a href="#" target="_blank"> <span>手机应用 </span> </a> </li>
              </ul>
            </div>
            <i class="icon-cate-arrow"></i> </li>
-->
        </ol>
      </div>
    </div>
    
    <!-- 20140822-分类-end --> 
    
    <!-- 20140823-分类-end --> 
    
    <!-- 20130909-导航-start -->
    
    <nav class="naver">
      <ul id="naver-list">
        <li id="index"><a href="./index.php" class="current" ><span>首 页 </span></a> </li>
        <li id="honor7"><a href="./article.php?id=3"  target="_blank"><span>荣耀7 <s><img src="images/new.png" alt="new" /></s> </span></a> </li>
        <li id="nav-honor"><a href="./list.php?id=2"  target="_blank"><span>荣耀家族 </span></a> </li>
        <li id="cherry"><a href="./article.php?id=13"  target="_blank"><span>荣耀畅玩4C <s><img src="images/hot.png" alt="hot" /></s> </span></a> </li>
        <li id="P8"><a href="./article.php?id=15"  target="_blank"><span>华为 P8 </span></a> </li>
        <li id="honor6plus"><a href="./article.php?id=2"  target="_blank"><span>荣耀6 Plus </span></a> </li>
        <li id="Mate 7"><a href="./article.php?id=16"  target="_blank"><span>华为 Mate7 </span></a> </li>
      </ul>

    </nav>
    <!-- 20130909-导航-end --> 
    
  </div>
</div>
</div>