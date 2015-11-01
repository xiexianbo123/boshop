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
      <div class="logo"><a href="" title="华为商城"><img src="./images/newLogo.png" alt=""></a></div>
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
      <h3 class="title">收货人信息<b>[<a id="addAddress" href="" onclick="$('#s_address').show();">添加地址</a>]</b></h3>
<?php if(empty($_SESSION['address'])):  ?>
      <!-- 20140813-订单-表单-地址-空数据-start -->
      <div class="order-address-empty" id="order-address-empty" style="display: block;">您还没有收货地址，马上&nbsp;<a id="creatAddress" href="" onclick="$('#s_address').show();">添加</a>&nbsp;吧！</div>
<?php else: ?>
      <div class="order-address-list" id="order-address-list" style="margin-bottom:10px;">
        <ol>
<li id="myAddress-20497283" style="" class="current"><div class="address-main"><span class="address-mark"><i></i>寄送至</span><input type="radio" checked class="radio" name="myAddress" id="input-myAddress20497283" data-district="6923" data-id="20497283" value="20497283"><label class="address-info" for="input-myAddress20497283"><b><?php echo $_SESSION['address']['linkman']; ?></b><span><?php echo $_SESSION['address']['address']; ?></span><span>收货人：<?php echo $_SESSION['address']['linkman']; ?></span><span>电话：<?php echo $_SESSION['address']['phone']; ?></span></label></div><div class="address-sub"><span class="default">默认地址</span><a href="javascript:;" onclick="alert('不可以删除，可以修改')" class="address-del">删除</a><a href="#edit" onclick="$('#s_address').show();" class="address-edit"><span>修改</span></a></div></li>
        </ol>
      </div>
<?php endif; ?>

      <!-- 20140813-订单-表单-地址-空数据-end -->
      <input name="orderDistrict" id="order-district" type="hidden">
    </div>
    <!-- 20140813-订单-表单-地址-end --> 
    <!--  *******************************【end 新的地址 】************************************************************  --> 
    
    
    <!--     新的发票信息     【start】      --><!--modify by l00222000 增加支持电子发票 20150320--> 
    <!--如果无代销商品且配置启用电子发票-->
    <div class="order-invoice">
      <h3 class="title">发票信息<em>（请谨慎选择发票抬头，订单出库后不能修改）</em></h3>
      <div class="order-invoice-list" id="order-invoice-area">
        <ul>
          <li>
            <div class="invoice-main">
              <input type="radio" class="radio" checked="" name="invoiceType" id="i1">
              <label for="i1">纸质发票</label>
            </div>
            <div class="invoice-item" id="paperInvoice">
              <ul>
                <li>
                  <input type="radio" name="titleType" id="titleType-per" class="radio" value="1" checked="" seed="Invoice_1">
                  <label for="titleType-per">个人</label>
                </li>
                <li>
                  <input type="radio" name="titleType" id="titleType-com" class="radio" value="2">
                  <label for="titleType-com">单位</label>
                  <label>
                    <input type="text" style="width:21%;" id="invoiceTitle-com" placeholder="输入单位名称，勿填无关信息，系统自动开票" class="text vam" seed="Invoice_content" disabled="">
                    <span id="companyError"></span></label>
                </li>
                <input type="hidden" id="selfAllSkuIds" value="1744,3395">
                <input type="hidden" id="huaweiTerminalName" name="huaweiTerminalName" value="华为终端有限公司">
              </ul>
            </div>
          </li>
          <li>
            <div class="invoice-main">
              <input type="radio" class="radio" name="invoiceType" id="i2">
              <label for="i2">电子发票<em>（方便、便捷，不必担心发票丢失，签收后下载打印即可）</em></label>
            </div>
            <div class="invoice-item hide" id="elecInvoice">
              <ul>
                <li>
                  <input type="radio" class="radio" name="titleType" id="e-single" value="50">
                  <label for="e-single">个人</label>
                  <p class="invoice-sub-tip">电子发票目前仅对个人用户开具，不可用于单位报销</p>
                  <dl class="invoice-sub-answer">
                    <dt>什么是电子发票?</dt>
                    <dd>· 开具的电子发票均为真实有效的合法发票，与传统纸质发票具有同等法律效力，可作为用户保修的有效凭据。</dd>
                    <dd>· 在用户确认收货，订单完成后开具电子发票。</dd>
                    <dd>· 您在订单详情可下载您的电子发票。<a href="" target="_blank" title="什么是电子发票">什么是电子发票？</a></dd>
                  </dl>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      <p class="tips"><em>注意：</em>如果商品由第三方卖家销售，发票内容由其卖家决定，发票由卖家开具并寄出</p>
    </div>
    <!--    新的发票信息【End】            --><!--modify by l00222000 增加支持电子发票 20150320-->
    
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
      <!-- 20140627-商品结算-start -->
      <div class="order-pro-total clearfix">
        <div class="fl"> 
          <!--优惠券使用参数-->
          <form id="order-normal-form" autocomplete="off" method="post">
            <input name="couSkuIds" type="hidden" value="1744">
            <input name="couSkuIds" type="hidden" value="3395">
          </form>
          
          <!--20140627-订单-表单-使用优惠-start -->
          <div class="order-coupon">
            <div class="order-coupon-area">
              <input id="order-coupon-check" type="checkbox" class="checkbox vam" seed="preferential">
              <label class="vam">使用优惠券</label>
              <em>（<a href="javascript:;" target="_blank" title="了解华为商城优惠券规则">了解优惠券使用规则</a>）</em> <span id="coupon-info" class="vam hide"> <span id="coupon-info-desc"></span>
              <input id="input-couponCode" type="hidden" data-weight="">
              </span> </div>

          </div>
          <!--20140627-订单-表单-使用优惠-end --> 
          <!-- 20140628-订单-表单-花瓣-start -->
          <div class="order-huaban">
            <div class="order-huaban-area">
              <input type="checkbox" class="checkbox vam" id="huaban-checkbox" onclick="ec.order.huaban.toggle(this)" autocomplete="off">
              <label class="vam">使用花瓣</label>
              <em>（<a target="_blank" href="" title="了解花瓣使用规则">使用规则</a>）</em> <em>（<a href="" target="_blank" title="花瓣详情">花瓣详情</a>）</em> <span class="vam hide" id="huaban-deduction-1">¥&nbsp;<b>-0</b>&nbsp;元</span> </div>

            <div class="order-huaban-detail-area hide" id="huaban-confirm">
              <p> 已使用<b id="huaban-input-num">0</b>个花瓣，实体减额为 <b id="huaban-deduction-2">0</b>元<em>[<a href="" title="修改" onclick="ec.order.huaban.edit()">修改</a>]</em> </p>
            </div>
          </div>
          <!--  20140628-订单-表单-花瓣-end --> 
        </div>
        <div class="fr"> 
          <!-- 20140630-订单-金额-start -->
          <div class="order-cost-area">
            <table border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td class="tal">商品总金额：</td>
                  <td class="tar">&nbsp;¥&nbsp; <em id="order-cost-area" ><?php echo $money; ?></em></td>
                </tr>
                <tr>
                  <td class="tal">运费：</td>
                  <td class="tar">&nbsp;¥&nbsp; <em id="order-deliveryCharge">0.00</em></td>
                </tr>
                <tr>
                  <td class="tal">使用优惠券：</td>
                  <td class="tar">-&nbsp;¥&nbsp; <em><span id="order-couponDiscount">0.00</span> </em></td>
                </tr>
                <tr>
                  <td class="tal">使用花瓣：</td>
                  <td class="tar">-&nbsp;¥&nbsp; <em><span id="oreder-huaban-num">0.00</span> </em></td>
                </tr>
                <tr>
                  <td class="tal">商家活动： </td>
                  <td class="tar">-&nbsp;¥&nbsp;<em>200.00</em></td>
                </tr>
              </tbody>
            </table>
            <p class="order-cost-total"> <span class="p-subtotal-price"> 应付金额：<b class="total">¥</b><b class="total" id="order-price"><?php echo $money; ?></b></span> </p>
          </div>
          <!-- 20140630-订单-金额-end --> 
        </div>
      </div>
      <!-- 20140627-商品结算-end --> 
      
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
      <span class="p-subtotal-price">应付总额：<b>¥<span class="vab" id="payableTotal"><?php echo $money; ?></span></b></span> <a href="shopaction.php?a=submit" class="button-style-1 button-submit-order" title="提交订单" seed="checkout-submit"><span>提交订单</span></a> </div>
    <!-- 提交订单end--> 
  </div>
</div>
<div class="hr-45"></div>
<!-- 优惠活动列表 -->


<!-- 【新地址改造：添加地址修改地址    确认，删除  start】   -->
<div class="ol_box_4" style="width: 690px; display: none; " id="addAddressBox">
  <div class="box-ct">
    <div class="box-header">
      <div class="box-tl"></div>
      <div class="box-tc">
        <div class="box-tc1"></div>
        <div class="box-tc2"><a class="box-close" style="right:-20px;" title="关闭" onclick="return false;" href=""></a><span class="box-title">添加地址</span></div>
      </div>
      <div class="box-tr"></div>
    </div>
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
      <tbody>
        <tr>
          <td class="box-cl"></td>
          <td class="box-cc"><div> 
              <!-- 20140815-表单-地址-start -->
              <form action="" id="order-address-add-form" name="order-address-add-form">
                <div class="form-address-area">
                  <div class="form-edit-area">
                    <div class="form-edit-table">
                      <table border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                          <!--
													 <tr>
														<th>&nbsp;</th>

														<td><a href="" title="您现在可以直接调用支付宝帐户的收货地址"><img class="vam" alt="" src="/btn14.png"/></a></td>
													</tr> -->
                          <tr>
                            <th><span class="required">*</span>
                              <label for="">收货人：</label></th>
                            <td><input type="text" name="consignee" class="text vam span-200">
                              <span id="consigneeError"> </span></td>
                          </tr>
                          <tr>
                            <th rowspan="2" class="vat"><span class="required">*</span>
                              <label for="">收货地址：</label></th>
                            <td name="myAddress-add-region" id="myAddress-add-region"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td><textarea class="textarea span-500" placeholder="详细地址" name="address" seed="adress-detail"></textarea>
                              <span id="addressDetailError"></span></td>
                          </tr>
                          <tr>
                            <th><label for="">邮编：</label></th>
                            <td><input type="text" name="zipCode" class="text vam span-100 ime-disabled">
                              <span id="zipCodeError"></span></td>
                          </tr>
                          <tr>
                            <th><span class="required">*</span>
                              <label for="">手机号码：</label></th>
                            <td><div class="vam inline-block">
                                <input type="text" name="mobile" class="text span-100 ime-disabled">
                              </div>
                              &nbsp;&nbsp;
                              <label for="" class="vam">或固定电话：&nbsp;</label>
                              <div class="vam inline-block">
                                <input name="phone" type="text" class="text  span-150 ime-disabled" placeholder="区号-主机-分机号">
                              </div>
                              <span id="phone-msg"> </span></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="box-button"> <a href="" class="box-ok"><span>确定</span></a> <a href="" class="box-cancel"><span>取消</span></a> </div>
                <div> <span id="validateAddressMsg"></span> </div>
                <input type="hidden" name="randomFlag" id="randomFlag" value="fadc3ff82b8adadef499a932480e35d9">
                <input type="hidden" name="id" id="address-edit-id">
              </form>
              
              <!-- 20140815-表单-地址-end --> 
            </div></td>
          <td class="box-cr"></td>
        </tr>
      </tbody>
    </table>
    <div class="box-bottom">
      <div class="box-bl"></div>
      <div class="box-bc"></div>
      <div class="box-br"></div>
    </div>
  </div>
</div>
<div class="ol_box_4" id="delAddressBox" style="display: none; ">
  <div class="box-ct">
    <div class="box-header" style="width:400px">
      <div class="box-tl"></div>
      <div class="box-tc" style="width:400px">
        <div class="box-tc1"></div>
        <div class="box-tc2"><a class="box-close" title="关闭" onclick="return false;" href=""></a><span class="box-title"></span></div>
      </div>
      <div class="box-tr"></div>
    </div>
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
      <tbody>
        <tr>
          <td class="box-cl"></td>
          <td class="box-cc"><div class="box-content"> 
              <!-- 20140815-删除地址tips-start -->
              <div class="box-confirm-area">
                <p>您确定要删除此地址吗？</p>
              </div>
              <div class="box-button"> <a href="" class="box-ok"><span>确定</span></a> <a href="" class="box-cancel"><span>取消</span></a> </div>
              <!-- 20140815-删除地址tips-end --> 
            </div></td>
          <td class="box-cr"></td>
        </tr>
      </tbody>
    </table>
    <div class="box-bottom">
      <div class="box-bl"></div>
      <div class="box-bc"></div>
      <div class="box-br"></div>
    </div>
  </div>
</div>
<!-- 【新地址改造：添加地址修改地址   确认，删除   END】     -->

<?php include('./footer.php'); ?>
<?php if(empty($_SESSION['address'])):  ?>
<div id="s_address">
<?php else: ?>
<div id="s_address" style="display:none;">
<?php endif; ?>
<img style="display: block; " src="http://dmp-collector.huawei.com/Mapping.do?bfd_nid=dmp_huawei&amp;channel=huafans&amp;cid=fansClub&amp;is_img=1&amp;hicloud_id=990b0f071d3a9a6f&amp;uid=14113491">
<div id="AutocompleteContainter_87150" style="position: absolute; top: 0px; left: 0px; z-index: 9999; ">
  <div class="autocomplete-w1">
    <div class="autocomplete" id="Autocomplete_87150" style="display: none; max-height: 400px; width: 0px; "></div>
  </div>
</div>
<div class="ol_box_mask" style="z-index: 500; visibility: visible; width: 1284px; height: 1598px; "></div>
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
                <form name="addressinfo" action="shopaction.php?a=address" method="post">
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
                              <td><label style="position: absolute; cursor: text; float: left; z-index: 2; color: rgb(153, 153, 153); display: block; " class="textarea span-500" for="input_label_2"></label>
                                <textarea name="address" class="textarea span-500" validator="validator71437041086319" id="input_label_2" style="z-index: 1; "></textarea>
                                <span class="vat" id="address-msg"></span></td>
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
                                  <label style="position: absolute; cursor: text; float: left; z-index: 2; color: rgb(153, 153, 153); display: block; " class="text  span-150 ime-disabled" for="input_label_3">区号-主机-分机号(无效)</label>
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
</body>
</html>