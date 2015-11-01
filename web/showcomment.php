<?php
require('../public/common.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-cn">
<title>我的订单_个人中心_华为商城</title>

<link href="./css/ec.core.min2.css" rel="stylesheet" type="text/css">
<link href="./css/main.min2.css" rel="stylesheet" type="text/css">
</head>

<body class="wide" screen_capture_injected="true">
<?php include('header.php'); ?>

<div class="hr-10"></div>
<div class="g"> 
  <!--面包屑 -->
  <div class="breadcrumb-area"><a href="#" title="首页">首页</a>&nbsp;&nbsp;\&nbsp;&nbsp;<em id="personCenter"><a href="#" title="我的商城">我的商城</a></em><em id="pathPoint">&nbsp;&nbsp;\&nbsp;&nbsp;</em><span id="pathTitle">我的订单</span></div>
</div>
<div class="hr-10"></div>
<div class="g">
  <div class="fr u-4-5"><!-- 20141212-栏目-start -->
    <div class="section-header">
      <div class="fl">
        <h2><span>我的评价</span></h2>
      </div>
      <div class="fr">
        <div class="ec-tab" id="ec-tab">
          <ul>
            <li class="current"><a href="#" onclick="ec.member.orderList.seltime(this,0);"><span>最近三月内订单</span></a></li>
            <li><a href="#" onclick="ec.member.orderList.seltime(this,1);"><span>三个月前订单<em id="count-seltime-1" style="display: none; ">0</em></span></a></li>
          </ul>
          <div class="ec-tab-arrow" style="left: 0px; width: 136px; "></div>
        </div>
      </div>
    </div>
    <!-- 20141212-栏目-end --> 

    <!-- 20141222-我的订单-列表-start -->
    <div class="myOrder-record" id="myOrders-list-content"> 

      <div class="list-group" id="list-group">

<?php
$ping=array('1'=>'差评','3'=>'中评','5'=>'好评');

//遍历评论
$sqlpl="select c.*,d.userorder,d.picname from ".PREFIX."comment as c,".PREFIX."detail as d where c.uid='{$_SESSION['user']['id']}' and c.goodsid=d.goodsid and c.orderid=d.orderid order by c.id";
//echo $sqlpl;die;
$respl=myQuery($sqlpl);
if($respl){
foreach($respl as $val):
?>
        <div class="list-group-item">
          <div class="o-info">
              <div class="col-info">
                <span class="o-date"><?php echo date('Y-m-d H:i:s',$val['addtime']); ?></span>
                <span class="o-no">订单号：<a title="1260264708" href="#"><?php echo $val['userorder']; ?></a></span>
              </div>
              <div class="col-state">
                  状态
              </div>
          </div>
          <div class="o-pro">
            <table cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                    <tr>
                    <td class="col-pro-img"><p class="p-img"> <a target="_blank" href="article.php?id=<?php echo $val['goodsid']; ?>" title=""> <img width="100" src="../public/uploads/218_<?php echo $val['picname']; ?>"> </a> </p></td>
                    <td class="col-pro-info"><p class="p-name"> <a href="article.php?id=<?php echo $val['goodsid']; ?>" target="_blank" title=""><?php echo $val['content']; ?></a> </p></td>
                    <td class="col-price"><?php echo $val['score']; ?>分</td>
                    <td class="col-quty"><?php echo $ping[$val['score']]; ?></td>
                    <td class="col-pay"><p><em>¥</em><span> <?php echo $val['price']; ?> </span></p></td>
                    <td class="col-operate"><p class="p-link"><a href="commentaction.php?a=del&id=<?php echo $val['id']; ?>" onclick="return confirm('确定删除吗?')">删除</a></p></td>
                    </tr>
                  </tbody>
                </table>
          </div>
        </div>
<?php endforeach; } ?>


      </div>

      <div class="list-group-page">
        <div class="pager" id="list-pager"></div>
      </div>
    </div>
    <!-- 20141222-我的订单-列表-end -->
    <input type="hidden" id="colid" value="0">
    <input type="hidden" id="checkid" value="all">
    <form action="#" method="get" id="gotoUrl">
    </form>
  </div>
  <div class="fl u-1-5"> 
    
    <!--左边菜单 -->
    <div class="mc-menu-area">
      <div class="h"><a href="#" class="button-go-mc" title="我的商城"><span>我的商城</span></a></div>
      <div class="b">
        <ul>
          <li>
            <h3> <span>订单中心</span> </h3>
            <ol>
              <li id="li-order" class="current"><a href="home.php" title="我的订单"><span>我的订单</span></a></li>
              <li id="li-prdRemark"><a href="showcomment.php" title="我的评价"><span>我的评价</span></a></li>
              <!--<li id="li-prdRemark"><a href="home_address.php" title="收货地址"><span>收货地址</span></a></li>-->
            </ol>
          </li>
          <!--
          <li>
            <h3> <span>个人中心</span> </h3>
            <ol>
              <li id="li-myAppointment"><a href="#" title="我的预约"><span>我的预约</span></a></li>
              <li id="li-notification"><a href="#" title="到货通知"><span>到货通知</span></a></li>
              <li id="li-point"><a href="#" title="等级与特权"><span>等级与特权</span></a></li>
              <li id="li-balance"><a href="#" title="账户余额"><span>账户余额</span></a></li>
              <li id="li-petal"><a href="#" title="我的花瓣"><span>我的花瓣</span></a></li>
              <li id="li-coupon"><a href="#" title="我的优惠劵"><span>我的优惠劵</span></a></li>
              <li id="li-enterprise" class="hide"></li>
              <li id="li-myAddress"><a href="#" title="收货地址管理"><span>收货地址管理</span></a></li>
              <!--  
                    <li id="li-zp"><a href="#" title="专票资质"><span>专票资质</span></a></li>
                	
            </ol>
          </li>
          -->
          <!--
          <li>
            <h3> <span>社区中心</span> </h3>
            <ol>
              <li id="li-prdRemark"><a href="#" title="商品评价"><span>商品评价</span></a></li>
              <li id="li-msg"><a href="#" title="站内信"><span>站内信</span></a></li>
            </ol>
          </li>
          -->
        </ul>
      </div>
      <div class="f"></div>
    </div>
  </div>
</div>
<div class="hr-80"></div>

<?php include('footer.php'); ?>
</body>
</html>