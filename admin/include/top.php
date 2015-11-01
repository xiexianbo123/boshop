<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台页面头部</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<!-- 自定义js 控制头部导航-->
</head>
<body onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;" style="overflow-x:hidden;">
<!--禁止网页另存为-->
<noscript><iframe scr="*.htm"></iframe></noscript>
<!--禁止网页另存为-->
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="header">
  <tr>
    <td rowspan="2" align="left" valign="top" id="logo"><img src="images/main/logo.jpg" width="74" height="64"></td>
    <td align="left" valign="bottom">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="bottom" id="header-name">华为商城官网</td>
        <td align="right" valign="top" id="header-right">
        	<a href="../useraction.php?a=logout" target="topFrame" onFocus="this.blur()" class="admin-out">注销</a>
            <a href="./left.php" target="leftFrame" onFocus="this.blur()" class="admin-home">管理首页</a>
        	<a href="../../web/index.html" target="_blank" onFocus="this.blur()" class="admin-index">网站首页</a>       	
            <span>
<!-- 日历 -->
<SCRIPT type=text/javascript src="js/clock.js"></SCRIPT>
<SCRIPT type=text/javascript>showcal();</SCRIPT>
            </span>
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="bottom">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" id="header-admin">后台管理系统</td>
        <td align="left" valign="bottom" id="header-menu">
        <a href="./left.php" target="leftFrame" onFocus="this.blur()" onclick="show(1)" id="menuon">后台首页</a>
        <a href="./left_users.php" target="leftFrame" onFocus="this.blur()" onclick="show(3)">用户管理</a>
        <a href="./left_type.php" target="leftFrame" onFocus="this.blur()" onclick="show(5)">分类管理</a>
        <a href="./left_goods.php" target="leftFrame" onFocus="this.blur()" onclick="show(7)">商品管理</a>
        <a href="./left_orders.php" target="leftFrame" onFocus="this.blur()" onclick="show(9)">订单管理</a>
        <!--<a href="index.html" target="leftFrame" onFocus="this.blur()" onclick="show(11)">附件管理</a>
        <a href="./left_web.php" target="leftFrame" onFocus="this.blur()" onclick="show(13)">站点管理</a>-->
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<script src="./js/bo.js" type="text/javascript"></script>
</body>
</html>