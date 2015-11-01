<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" >
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-store" />
	
<title>登录_华为帐号</title>

<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" /> 

<link href="css/ec.core.css" rel="stylesheet" type="text/css"> 
<link href="css/zh-cn_account.css?20150604" rel="stylesheet" type="text/css"> 

</head>
<body class="login">

<!-- 头部  --> 

<div class="customer-header">
	<div class="g">
		 <table cellpadding="0" cellspacing="0">
                <tr>
                    <td><img src="./images/logo2.png" /></td>
                    <td style="padding-left:5px;"><img src="./images/split1.png" /></td>
                    <td>
	                    <span>
	                    	<!-- edit Logo font -->
								<a href="index.php">华为商城</a> 
							<!-- end edit -->
	                    </span>
                    </td>
                </tr>
            </table>
    </div>
</div>
	<div class="g">
		<iframe class="advise" src="" allowtransparency=true frameborder="0" scrolling="no" style="height:0px;position: absolute;width: 550px;top: 10px;left: 60px;overflow: hidden;border: 0px"></iframe>
		<!--登录 -->
		<div class="login-area" >
			<div class="h">
				<h3 class="login-area-marginTop"><span>欢迎登录华为帐号</span></h3>
			</div>
			<div class="b">
				<form action="useraction.php?a=dologin" method="post" name="myform"  autocomplete="off" class="login-form-marginTop">
					<div class="form-edit-area">
						<table border="0" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td><input type="text" autocomplete="off"  class="text vam" id="login_userName" name="username" maxlength="50" tabindex="1" value="" /></td>
								</tr>
								<tr>
									<td><input id="login_password" type="password" autocomplete="off"  class="text vam" name="pass" maxlength="32" tabindex="2" /></td>
								</tr>
								<tr>
									<td>
										<table>
											<tr>
												<td>							
													<input type="text" autocomplete="off"  class="verify vam" id="randomCode" name="yzm"  maxlength="4" tabindex="3" />&nbsp;&nbsp;
												</td>
												<td>
													<img class="vam pointer" id="randomCodeImg" width="100" src="yzm.php" alt="验证码" onclick="bobo();"/>
													&nbsp;&nbsp;
												</td>
												<td>
													<img class="vam pointer" onclick="bobo();" src='./images/chg_image.png' />
												</td>
												<td >
														<span class="vam" style="margin:0px;" id="randomCodeError"></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<input type="checkbox" class="checkbox vam" id="remember_name" name="remember_name" tabindex="4" /><label class="vam" for="remember_name">记住用户名</label>&nbsp;&nbsp;&nbsp;&nbsp;
										<a class="forgot vam" href="#" onclick="gotoresetpwd()" title="忘记密码？ ">忘记密码？ </a>
									</td>
								</tr>
								<tr>
									<td>
										<div style="margin-bottom:0px;"><span class="vam error" id="login_msg"  style="margin-bottom:5px;display:block"></span></div>
										<input type="submit" class="button-login" id="btnLogin" value="登录" tabindex="5" />&nbsp;&nbsp;
										<input type="submit" id="loginSubmitForm" style="display:none;">
										<img class="load" src='./images/loading3.gif?' />
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					
				</form>
				<!-- edit third fastlogin -->
				 <span style=color:#666; class=thirdAccountSpan>使用合作网站帐号登录：</span>
	        <span class='alipayLogin' title="支付宝" onclick='thirdAccountBind(this)'><a href="#" toUrl='/alipay/alipay_auth_authorize.jsp'><s></s></a></span>
	    
				<!-- end edit -->
				
				<p>
					没有华为帐号？ &nbsp;&nbsp;<a href="./reg.php" title="免费注册">免费注册</a>
				</p>
                <p style="margin-top:0px; padding-top:0xp;color:#929292;border-top: none">
                
                	
                	华为帐号可登录华为商城、花粉俱乐部、 应用市场、Cloud+、华为网盘、华为开发者联盟等华为云服务。
                	
                	
                </p>
				
			</div>
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


	<div id="layer">
		<div class="mc"></div>
	</div>
<script src="./js/bo.js"></script>
</body>
</html>