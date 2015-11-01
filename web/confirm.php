<?php
require('../public/common.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-cn">
<title>确认订单华为商城</title>
<link href="./css/shop/ec.core.min.css?20150213" rel="stylesheet" type="text/css">
<link href="./css/shop/main.min.css?20141216" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="./css/shop/style.css">
<script src="./js/jquery.js"></script>
<body class="wide order" screen_capture_injected="true">
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
        <li class="s-hw"><a href="" target="_blank">华为官网</a></li>
        <li class="s-honor"><a href="" target="_blank">华为荣耀</a></li>
        <li class="s-emui"><a href="" target="_blank">EMUI</a></li>
        <li class="s-appstore"><a href="" target="_blank">应用市场</a></li>
        <li class="s-cloud"><a href="" target="_blank">云服务</a></li>
        <li class="s-developer"><a href="" target="_blank">开发者联盟</a></li>
        <li class="s-club"><a href="" target="_blank">花粉俱乐部</a></li>
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
        <li class="s-promo"><a href="" rel="nofollow">V码(优购码)</a></li>
        <li class="s-hwep hide" id="preferential"></li>
        <li class="s-mobile"><a href="" target="_blank">手机版</a></li>
        <li class="s-sitemap">
          <div class="s-dropdown ">
            <div class="h"> <a href="">网站导航</a> <s></s> </div>
            <div class="b">
              <p><a href="">帮助中心</a></p>
              <p><a href="" target="_blank">PC软件</a></p>
              <p><a href="" target="_blank">数字音乐</a></p>
              <p><a href="" target="_blank">爱旅</a></p>
              <p><a href="" target="_blank">华为网盘</a></p>
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
      <div class="logo"><a href="./index.php" title="华为商城"><img src="./images/newLogo.png" alt=""></a></div>
    </div>
    <div class="fr"> 
      <!--步骤条-三步骤 -->
      <div class="progress-area progress-area-3"> 
        <!--我的购物车 -->
        <div id="progress-cart" class="progress-sc-area hide">我的购物车</div>
        <!--核对订单 -->
        <div id="progress-confirm" class="progress-co-area hide" style="display: block; ">填写核对订单信息</div>
        <!--成功提交订单 -->
        <div id="progress-submit" class="progress-sso-area hide">成功提交订单</div>
      </div>
    </div>
  </div>
</div>

<div class="layout order"> 
  <!--栏目 --> 
  
  <!--订单-表单 -->
  <div class="order-form-area"> 
    
    <!-- ************************【start 新的地址  edit by wangshaohua  】******************************************************************  --> 
    <!-- 20140813-订单-表单-地址-start -->
    <div class="order-address" id="order-address-mod">
      <h3 class="title">收货人信息<b>[<a id="addAddress" href="javascript:;" onclick="$('#s_address').show();">添加地址</a>]</b></h3>
<form action="shopaction.php?a=submit" method="post" onsubmit="return addres_s();">
<?php
$sql="select * from ".PREFIX."address where uid='{$_SESSION['user']['id']}'";
$result=myQuery($sql);
//var_dump($result);
if($result){
    foreach($result as $value){
?>
      <div class="order-address-list" id="order-address-list" style="margin-bottom:10px;">
        <ol>
        <li id="myAddress-20497283" style="" class="current">
          <div class="address-main">
          <span class="address-mark"><i></i>寄送至</span>
          <input type="radio" class="radio" name="myAddress" id="myAddress" data-district="6923" data-id="20497283" value="<?php echo $value['id']; ?>">
          <label class="address-info" for="input-myAddress20497283"><b><?php echo $value['linkman']; ?></b><span><?php echo $value['address']; ?></span><span>收货人：<?php echo $value['linkman']; ?></span><span>手机：<?php echo $value['phone']; ?></span><span>邮编：<?php echo ($value['code']==0)?'无':$value['code']; ?></span><span>电话：<?php echo ($value['mobile']==0)?'无':$value['mobile']; ?></span></label>
          </div>
          <div class="address-sub">
          <a href="addressaction.php?a=del&id=<?php echo $value['id']; ?>" onclick="return confirm('确定删除地址吗？')" class="address-del">删除</a>
          <a href="./confirm.php?editaddress=<?php echo $value['id']; ?>" class="address-edit"><span>修改</span></a></div>
        </li>
        </ol>
      </div>
<?php
    }
}else{
?>
      <!-- 20140813-订单-表单-地址-空数据-start -->
      <div class="order-address-empty" id="order-address-empty" style="display: block;">您还没有收货地址，马上&nbsp;<a id="creatAddress" href="javascript:;" onclick="$('#s_address').show();">添加</a>&nbsp;吧！</div>
<?php

}
?>

    
  </div>
  <div class="sc-area"> 
    <!--如果有自营商品，展示自营商品--> 
    <!--购物车 --> 
    <!--兼容秒杀订单-->
    <div class="dt-order-area"> 
      <!-- 20140630-自营商品订单-start -->
      <div class="order-pro-list" id="order-pro-list"> 
        <!--购物车-商品列表-20121016 start-->
        <div class="order-pro-list"> 
          <!--订单-商品-标题 -->
          <div class="order-pro-title-area">
            <div class="h">以下商品由&nbsp;&nbsp;<b>华为商城</b>&nbsp;&nbsp;选择合作快递配送</div>
            <div class="b">
              <table border="0" cellpadding="0" cellspacing="0">
                <thead>
                  <tr>
                    <th class="tr-pro">商品</th>
                    <th class="tr-price">单价（元）</th>
                    <th class="tr-quantity">数量</th>
                    <th class="tr-subtotal">小计（元）</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <!--订单-商品-标题 --> 
          <!--订单-商品-套餐--> 
          <!--订单-商品-套餐  End--> 
          
          <!--订单-商品-普通商品-->
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
          <div class="order-pro-area">
            <table border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td class="tr-pro"><ul class="pro-area-2">
                      <li> <a title="华为 HUAWEI Ascend P7-L09" target="_blank" href="" seed="item-name">华为&nbsp;<?php echo $value['goods']; ?>&nbsp;<?php echo $arri[$value['network']]; ?>&nbsp;&nbsp;16GB存储（<?php echo $arrj[$value['color']]; ?>）套餐版</a> </li>
                    </ul></td>
                  <!-- 预付订金商品的价格为空 -->
                  <td class="tr-price"><?php echo $value['price']; ?></td>
                  <td class="tr-quantity"><?php echo $value['num'] ?></td>
                  <td rowspan="1" class="tr-subtotal"><p><b>¥<?php echo $value['price']*$value['num']; ?></b></p></td>
                </tr>
              </tbody>
            </table>
          </div>
<?php endforeach; } ?>
          <!-- 预付订金 start--> 
          <!-- 预付订金 end--> 
          <!--订单-商品-普通商品 End--> 
        </div>
        <!--购物车-商品列表-20121016 end--> 
      </div>
      <!--购物车-自营商品列表结束 --> 

      
      <!--自营订单-赠品   -start-->
      <div id="order-gift-area" class="order-gift-area hide">
        <div id="premiumsList" class="hide"></div>
      </div>
      <!--自营订单-赠品-end--> 
      
    </div>
    
    <!--展示代销商品 start--> 
    <!-- 代销商品展示结束 --> 
    
    <!-- 提交订单start-->
    <div class="order-action-area tar"> 
      <!-- 20140630-订单-下单验证-start -->
      <div class="order-protect"> </div>
      <!-- 20140630-订单-下单验证-end --> 
      <span class="p-subtotal-price">应付总额：<b>¥<span class="vab" id="payableTotal"><?php echo $money; ?></span></b></span>
      <input type="submit" class="button-style-1 button-submit-order" value="提交订单" style="line-height:30px;" />
      </div>
    <!-- 提交订单end--> 
  </div>
</div>
</form>
<div class="hr-45"></div>
<!-- 优惠活动列表 -->
<script>
function addres_s(){
  var state = false;
  var obj=document.getElementsByName('myAddress');
  //alert(obj[0].checked);
  for(var i=0;i<obj.length;i++){
    if(obj[i].checked){
      //sub_shop.submit();
      state = true;
      break;
    }
  }
  if(!state){
    alert('请选择收货地址');
    //obj[0].checked=true;
  }

  return state;

}
</script>


<?php include('./footer.php'); ?>



<!--下面是添加表单-->
<div id="s_address" style="display:none;">
<div style="z-index: 500; width: 700px; visibility: visible; position: fixed; top: 50%; left: 50%; margin-left:-350px;margin-top:-212px;" id="myAddress-new-box" class="ol_box_4">
  <div class="box-ct">
    <div class="box-header">
      <div class="box-tl"></div>
      <div class="box-tc">
        <div class="box-tc1"></div>
        <div class="box-tc2"><a href="javascript:;" onclick="$('#s_address').hide();" title="关闭" class="box-close"></a><span class="box-title">添加地址</span></div>
      </div>
      <div class="box-tr"></div>
    </div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
      <tbody>
        <tr>
          <td class="box-cl"></td>
          <td class="box-cc"><div class="box-content" style="height: auto; ">
              <div id="order-address-add-area">
                <form name="addressinfo" action="addressaction.php?a=add" method="post">
                  <input type="hidden" name="id" value="">
                  <input type="hidden" name="randomFlag" value="fadc3ff82b8adadef499a932480e35d9">
                  <div class="form-address-area">
                    <div class="form-edit-area">
                      <div class="form-edit-table">
                        <table cellspacing="0" cellpadding="0" border="0">
                          <tbody>
                            <tr>
                              <th><span class="required">*</span>
                                <label for="">收货人：</label></th>
                              <td><input type="text" class="text vam span-200" name="linkman" value="" validator="validator61437041086319">
                                <span class="vam" id="consignee-msg"></span></td>
                            </tr>
                            <tr>
                              <th class="vat" rowspan="2"><span class="required">*</span>
                                <label for="">收货地址：</label></th>
                            </tr>
                            <tr>
                              <td>
                                <textarea name="address" class="textarea span-500" validator="validator71437041086319" id="input_label_2" style="z-index: 1; "></textarea>
                              </td>
                            </tr>
                            <tr>
                              <th><label for="">邮编：</label></th>
                              <td><input type="text" name="code" class="text vam span-100 ime-disabled" value="" >
                                <span class="vam" id="zipCode-msg"></span></td>
                            </tr>
                            <tr>
                              <th><span class="required">*</span>
                                <label for="">手机号码：</label></th>
                              <td><div class="vam inline-block">
                                  <input type="text" class="text  span-100 ime-disabled" name="phone" value="">
                                </div>
                                &nbsp;&nbsp;
                                <label class="vam" for="">或固定电话：&nbsp;</label>
                                <div class="vam inline-block">
                                  <label style="position: absolute; cursor: text; float: left; z-index: 2; color: rgb(153, 153, 153); display: block; " class="text  span-150 ime-disabled" for="input_label_3"></label>
                                  <input type="text" name="mobile" value="" class="text  span-150 ime-disabled" id="input_label_3" style="z-index: 1; ">
                                </div>
                                <span class="vam" id="phone-msg"></span></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="box-button"><a class="box-ok" onclick="addressinfo.submit();"><span>确定</span></a><a class="box-cancel" href="javascript:;" onclick="$('#s_address').hide();"><span>取消</span></a></div>
                  <div class="box-form-tips"><span class=""></span></div>
                </form>
              </div>
            </div>
          <td class="box-cr"></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>

<?php
if(isset($_GET['editaddress'])){
  $sqlt="select * from ".PREFIX."address where id=6";
  $rest=myQuery($sqlt);
  //var_dump($rest);die;
?>

<!--下面是修改菜单，根据URL是否有edit标识进行判断-->
<div id="edit_address">
<div style="z-index: 500; width: 700px; visibility: visible; position: fixed; top: 50%; left: 50%; margin-left:-350px;margin-top:-212px;" id="myAddress-new-box" class="ol_box_4">
  <div class="box-ct">
    <div class="box-header">
      <div class="box-tl"></div>
      <div class="box-tc">
        <div class="box-tc1"></div>
        <div class="box-tc2"><a href="javascript:;" onclick="$('#edit_address').hide();" title="关闭" class="box-close"></a><span class="box-title">修改地址</span></div>
      </div>
      <div class="box-tr"></div>
    </div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
      <tbody>
        <tr>
          <td class="box-cl"></td>
          <td class="box-cc"><div class="box-content" style="height: auto; ">
              <div id="order-address-add-area">
                <form name="addressinfo2" action="addressaction.php?a=update" method="post">
                  <input type="hidden" name="id" value="<?php echo $_GET['editaddress']; ?>">
                  <div class="form-address-area">
                    <div class="form-edit-area">
                      <div class="form-edit-table">
                        <table cellspacing="0" cellpadding="0" border="0">
                          <tbody>
                            <tr>
                              <th><span class="required">*</span>
                                <label for="">收货人：</label></th>
                              <td><input type="text" class="text vam span-200" name="linkman" value="<?php echo $rest[0]['linkman']; ?>" validator="validator61437041086319">
                                <span class="vam" id="consignee-msg"></span></td>
                            </tr>
                            <tr>
                              <th class="vat" rowspan="2"><span class="required">*</span>
                                <label for="">收货地址：</label></th>
                            </tr>
                            <tr>
                              <td>
                                <textarea name="address" class="textarea span-500" validator="validator71437041086319" id="input_label_2" style="z-index: 1; "><?php echo $rest[0]['address']; ?></textarea>
                              </td>
                            </tr>
                            <tr>
                              <th><label for="">邮编：</label></th>
                              <td><input type="text" name="code" class="text vam span-100 ime-disabled" value="<?php echo $rest[0]['code']; ?>" >
                                <span class="vam" id="zipCode-msg"></span></td>
                            </tr>
                            <tr>
                              <th><span class="required">*</span>
                                <label for="">手机号码：</label></th>
                              <td><div class="vam inline-block">
                                  <input type="text" class="text  span-100 ime-disabled" name="phone" value="<?php echo $rest[0]['phone']; ?>">
                                </div>
                                &nbsp;&nbsp;
                                <label class="vam" for="">或固定电话：&nbsp;</label>
                                <div class="vam inline-block">
                                  <label style="position: absolute; cursor: text; float: left; z-index: 2; color: rgb(153, 153, 153); display: block; " class="text  span-150 ime-disabled" for="input_label_3"></label>
                                  <input type="text" name="mobile" value="<?php echo $rest[0]['mobile']; ?>" class="text  span-150 ime-disabled" id="input_label_3" style="z-index: 1; ">
                                </div>
                                <span class="vam" id="phone-msg"></span></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="box-button"><a class="box-ok" onclick="addressinfo2.submit();"><span>确定</span></a><a class="box-cancel" href="javascript:;" onclick="$('#edit_address').hide();"><span>取消</span></a></div>
                  <div class="box-form-tips"><span class=""></span></div>
                </form>
              </div>
            </div>
          <td class="box-cr"></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
<?php
}
?>
</body>
</html>