<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-store" />
<link rel="shortcut icon" href="https://hwid1.vmall.com/oauth2/up/rss_20/../common/images/default/favicon.ico" type="image/x-icon" />
<link href="css/ec.core.css" rel="stylesheet" type="text/css">
<link href="css/zh-cn_account.css?20150604" rel="stylesheet" type="text/css">
<title>注册_电子邮箱</title>
<style type="text/css">
.li_bg_on {
	background-color: red;
}
.li_bg {
	background: #fff;
}
</style>
</head>

<body class="reg">
<!-- 头部  -->

<div class="customer-header">
  <div class="g">
    <table cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="images/logo2.png?20150604" /></td>
        <td style="padding-left:5px;"><img src="images/split1.png?20150604" /></td>
        <td><span> 
          <!-- edit Logo font --> 
          <a href="index.php">华为商城</a>  
          <!-- end edit --> 
          </span></td>
      </tr>
    </table>
  </div>
</div>
<div class="g"> 
  <!--注册 -->
  <div class="tab_div"> <a class="on_tab" href="#"> 手机号码注册 </a> <a class="tab_first_left" href="#"> 电子邮箱注册 </a> </div>
  <div class="reg-area reg-apply-area">
    <div class="h" >
      <h3><span>注册华为帐号</span></h3>
    </div>
    <div class="b" >
      <form action="useraction.php?a=doreg" method="post" >
        <!--表单 -->
        <div class="form-edit-area">
          <table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <th>账号：</th>
                <td><input type="text" class="text vam ime-disabled" name="username" id="username" maxlength="50" tabindex="1">
                  <span id="msg_email"></span></td>
              </tr>
              <tr>
                <th>密码：</th>
                <td><div>
                    <input type="password" autocomplete="off"  class="text vam" name="pass" maxlength="32" tabindex="2"/>
                    <span id="msg_password"></span></div>
              <tr>
                <th>确认密码：</th>
                <td><input type="password" autocomplete="off"  class="text vam"  name="repass" maxlength="32" tabindex="3" />
                  <span id="msg_checkPassword"></span></td>
              </tr>
              <tr>
                <th>验证码：</th>
                <td><table>
                    <tr>
                      <td><input type="text" autocomplete="off"  class="verify vam" id="randomCode" name="yzm" maxlength="4" tabindex="4" />
                        &nbsp;&nbsp; </td>
                      <td><img class="vam pointer" id="randomCodeImg" src="yzm.php" alt="验证码" onclick="bobo();"/>&nbsp;&nbsp; <img class="vam pointer" onclick="bobo();" src='images/chg_image.png?20150604' /></td>
                      <td><span id="msg_randomCode"></span></td>
                    </tr>
                  </table>
                  </td>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td><input type="submit" class="button-reg" id="btnSubmit"  value="立即注册" tabindex="6" />
                  &nbsp;&nbsp;<span id="register_msg" class="vam error"></span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </form>
    </div>
    <div class="f tar"> <span class="vam">已有华为帐号</span>&nbsp;&nbsp;&nbsp;<a href="./login.php" class="button-login-2 vam" title="登录">登录</a> </div>
    <div class="cloud"></div>
  </div>
</div>
<div class="hr-60"></div>
<!-- 底部  -->

<div class="customer-footer">
  <div class="g"> 
    <!--授权  -->
    <div class="warrant-area">
      <p style="text-align: center;height-line:20px;height:20px; "><a style="text-decoration: underline;" target="blank" href="#" title="《华为帐号服务条款、华为隐私政策》">《华为帐号服务条款、华为隐私政策》</a></p>
      <p style="text-align: center;height-line:20px;height:20px; ">Copyright&nbsp;&copy;&nbsp;2011-2013&nbsp;&nbsp;华为软件技术有限公司&nbsp;&nbsp;版权所有&nbsp;&nbsp;保留一切权利&nbsp;&nbsp;苏B2-20070200号&nbsp;|&nbsp;苏ICP备09062682号-9</p>
    </div>
  </div>
</div>

<!--注册协议-->
<textarea id="agreement_content" class="hide">
    	<div style="height:100%">
    		<iframe id="frameAgreement" style="height:100%" frameborder="0" width="100%" marginwidth="0px"  src='agreements/zh-cn_accountAgreement.jsp?backButtonFlag=no'></iframe>
    	</div>
	</textarea>
<script src="./js/bo.js"></script>
</body>
</html>
