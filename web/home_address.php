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
        <h2><span>收货地址</span></h2>
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
<?php

  $sqldz="select * from ".PREFIX."address where uid={$_SESSION['user']['id']}";
  $resdz=myQuery($sqldz);
  //收货人
  $linkman=$resdz['0']['linkman'];
  $address=$resdz['0']['address'];
  $code=$resdz['0']['code'];
  $phone=$resdz['0']['phone'];
if($resdz){
  foreach($resdz as $value){
?>
      <div class="list-group-item">
          <div class="o-pro">
            <table cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                  <tr>
                    <td class="col-pro-img"><?php echo $value['linkman']; ?></td>
                    <td class="col-pro-info"><?php echo $value['address']; ?></td>
                    <td class="col-price"><?php echo $value['code']; ?></td>
                    <td class="col-quty"><?php echo $value['phone']; ?></td>
                    <td class="col-pay" rowspan="1"><?php echo $value['mobile']; ?></td>
                    <td class="col-operate" rowspan="1">
                    <p class="p-button"><a href="#" >修改</a></p>
                    <p class="p-link"><a onclick="return confirm('确定取消吗?');" href="#">删除</a></p>
                    </td>
                  </tr>
                  </tbody>
                </table>
          </div>
        </div>
<?php
  }
}

?>
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
              <li id="li-prdRemark"><a href="home_address.php" title="收货地址"><span>收货地址</span></a></li>
            </ol>
          </li>
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