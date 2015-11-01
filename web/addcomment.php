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
        <h2><span>商品评价</span></h2>
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

    <div class="myOrder-record" id="myOrders-list-content"> 


      <div class="list-group" id="list-group">

<form action="commentaction.php?a=add" method="post">
<?php
$arri=array('联通标准版套餐','移动标准版套餐','双4G版套餐','电信标准版套餐');
$arrj=array('黑色','白色','金色');
$path='../public/uploads/';

//遍历订单，输出商品评价
$orderid=$_GET['orderid'];
//echo $orderid;die();
//根据订单ID遍历详细商品信息
$sql="select * from ".PREFIX."detail where orderid={$orderid}";
//echo $sql;die();
$result=myQuery($sql);
//var_dump($result);die;
//计数器
$i=0;
if($result){
foreach($result as $a=>$v):
?>
<!--这里放隐藏表单部分-->
<!--订单ID-->
<input type="hidden" name="orderid<?php echo $a; ?>" value="<?php echo $v['orderid']; ?>">
<!--商品ID-->
<input type="hidden" name="goodsid<?php echo $a; ?>" value="<?php echo $v['goodsid']; ?>">
<input type="hidden" name="name<?php echo $a; ?>" value="<?php echo $v['name']; ?>">
<input type="hidden" name="price<?php echo $a; ?>" value="<?php echo $v['price']; ?>">

<table width="100%" style="margin:10px;">
  <tr>
    <td rowspan="2" align="center"><img width="200" src="<?php echo $path.'218_'.$v['picname']; ?>"><p><?php echo $v['name']; ?> (<?php echo $arrj[$v['color']]; ?>)</p></td>
    <td style="line-height:30px;"><input type="radio" name="score<?php echo $a; ?>" checked value="5"> 好评&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="score<?php echo $a; ?>" value="3"> 中评&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="score<?php echo $a; ?>" value="1"> 差评</td>
  </tr>
  <tr>
    <td><textarea name="content<?php echo $a; ?>" rows="9" cols="100"></textarea></td>
  </tr>
</table>

<?php endforeach; } ?>

<div id="myOrder-control-bottom" class="myOrder-control" style="text-align:center;">
        <input type="submit" class="button-operate-merge-pay" value="提交评论">
</div>
</form>
<script>
//表单验证有问题
function funsub(){
  var state = false;
  for(var i=0;i<<?php echo count($result); ?>;i++){
    
    var obj='score'+i;
    var aaa=document.getElementsByName('obj');
    for(var j=0;j<aaa.length;j++){
      if(aaa[j].checked){
        state = true;
        break;
      }
    }
  }
  if(!state){
    alert('请选择');
  }
  return state;
}
</script>

      </div>

      <div class="list-group-page">
        <div class="pager" id="list-pager"></div>
      </div>
    </div>
    <!-- 20141222-我的订单-列表-end -->
    <input type="hidden" id="colid" value="0">
    <input type="hidden" id="checkid" value="all">
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