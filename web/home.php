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
        <h2><span>我的订单</span></h2>
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
    <!-- 20141222-我的订单-订单类别-start -->
    <div style="margin-top:10px;">
    </div>
    <!-- 20141222-我的订单-订单类别-end --> 
    <!-- 20141222-我的订单-列表-start -->
    <div class="myOrder-record" id="myOrders-list-content"> 

      <div class="list-group-title">
        <table border="0" cellpadding="0" cellspacing="0">
          <thead>
            <tr>
              <th class="col-pro">商品</th>
              <th class="col-price">单价/元</th>
              <th class="col-quty">数量</th>
              <th class="col-pay">实付款/元</th>
              <th class="col-operate">订单状态及操作</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="list-group" id="list-group">
<?php

$arri=array('联通标准版套餐','移动标准版套餐','双4G版套餐','电信标准版套餐');
$arrj=array('黑色','白色','金色');

//遍历商品信息
$path='../public/uploads/';
$sql = "select id,addtime,userorder,total,status from ".PREFIX."orders where uid={$_SESSION['user']['id']} order by id desc";
$result=myQuery($sql);
//var_dump($result);die;

foreach($result as $value){
?>
<div class="list-group-item">
          <div class="o-info">
              <div class="col-info">
                <span class="o-date"><?php echo date('Y-m-d H:i:s',$value['addtime']) ?></span>
                <span class="o-no">订单号：<a href="#" title="1260264708"><?php echo $value['userorder']; ?></a></span>
              </div>
              <div class="col-state">
                  状态
              </div>
          </div>
          <div class="o-pro">
            <table border="0" cellpadding="0" cellspacing="0">
                  <tbody>
                <!-- 组合套餐列表 -->
                <!-- 普通商品列表 -->
                <?php
                $sqla="select * from ".PREFIX."detail where orderid={$value['id']} order by id desc";
                //echo $sqla;die;
                
                $resulta=myQuery($sqla);
                $tiao=count($resulta);
                $i=0; //定时器
                foreach($resulta as $v){
                $i++;
                ?>
                  <tr>
                    <td class="col-pro-img"><p class="p-img"> <a title="" href="article.php?id=<?php echo $v['goodsid']; ?>" target="_blank"> <img width="100" src="<?php echo $path.'218_'.$v['picname']; ?>"> </a> </p></td>
                    <td class="col-pro-info"><p class="p-name"> <a title="" target="_blank" href="article.php?id=<?php echo $v['goodsid']; ?>">华为 <?php echo $v['name']; ?> <?php echo $arri[$v['network']]; ?>（<?php echo $arrj[$v['color']] ?>）</a> </p></td>
                    <td class="col-price"><em>¥</em><span><?php echo $v['price']; ?></span></td>
                    <td class="col-quty"><?php echo $v['num']; ?></td>
                    <?php if($i==1){  ?>
                    <td rowspan="<?php echo $tiao; ?>" class="col-pay"><p><em>¥</em><span> <?php echo $value['total']; ?> </span></p></td>
                    <td rowspan="<?php echo $tiao; ?>" class="col-operate">

                    <?php
                    switch($value['status']){
                        case 0:  //新订单
                          echo '<p class="p-link"><a href="javascript:;">等待发货</a></p>';
                          echo '<p class="p-link"><a href="shopaction.php?a=qx&id='.$value['id'].'" onclick="return confirm('."'确定取消吗?'".');">取消订单</a></p>';
                        break;
                        case 1:  //已发货
                          echo '<p class="p-button"><a class="button-operate-pay" href="shopaction.php?a=sh&id='.$value['id'].'"><span>确认收货</span></a></p>';
                          echo '<p class="p-link"><a href="shopaction.php?a=qx&id='.$value['id'].'" onclick="return confirm('."'确定取消吗?'".');">取消订单</a></p>';
                        break;
                        case 2:  //已收货
                          echo '<p class="p-link"><a href="javascript:;">已收货</a></p>';
                          echo '<p class="p-link"><a href="addcomment.php?orderid='.$v['orderid'].'">评价一下</a></p>';
                        break;
                        case 3:
                          echo '<p class="p-link"><a href="javascript:;">已取消</a></p>';
                        break;
                    }
                    ?>
                    <!--
                    <p class="p-link"><a href="#" onclick="return confirm('确定删除吗?')">等待发货</a></p>
                    
                    <p class="p-button"><a class="button-operate-pay" href="javascript:;" target="_blank"><span>确认收货</span></a></p>

                    <p class="p-link"><a href="#">取消订单</a></p>
                    -->
                    </td>
                    <?php } ?>
                  </tr>
                                      
                <?php } ?>                 
                                              
                <!-- 普通商品列表 end -->
                  </tbody>
                </table>
          </div>
        </div>
<?php } ?>
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