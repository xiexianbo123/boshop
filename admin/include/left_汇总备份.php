<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航menu</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/sdmenu.js"></script>
<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
</script>
<style type=text/css>
html{ SCROLLBAR-FACE-COLOR: #538ec6; SCROLLBAR-HIGHLIGHT-COLOR: #dce5f0; SCROLLBAR-SHADOW-COLOR: #2c6daa; SCROLLBAR-3DLIGHT-COLOR: #dce5f0; SCROLLBAR-ARROW-COLOR: #2c6daa;  SCROLLBAR-TRACK-COLOR: #dce5f0;  SCROLLBAR-DARKSHADOW-COLOR: #dce5f0; overflow-x:hidden;}
body{overflow-x:hidden; background:url(images/main/leftbg.jpg) left top repeat-y #f2f0f5; width:194px;}
</style>
</head>
<body onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;">
<div id="left-top">
	<div><img src="images/main/member.gif" width="44" height="44" /></div>
<?php
//管理员调用数值
$state=array('管理员','普通会员','禁用');
?>
    <span>用户：<?php echo $_SESSION['adminuser']['username'] ?><br>角色：<?php echo $state[$_SESSION['adminuser']['state']] ?></span>
</div>
    <div style="float: left" id="my_menu" class="sdmenu">
      <div class="collapsed">
        <span>用户管理</span>
        <a href="../users/index.php" target="mainFrame" onFocus="this.blur()">浏览用户</a>
        <a href="../users/add.php" target="mainFrame" onFocus="this.blur()">添加用户</a>
      </div>

      <div>
        <span>商品分类</span>
        <a href="../type/index.php" target="mainFrame" onFocus="this.blur()">分类管理</a>
        <a href="../type/add.php" target="mainFrame" onFocus="this.blur()">添加分类</a>
      </div>

      <div>
        <span>商品管理</span>
        <a href="../goods/index.php" target="mainFrame" onFocus="this.blur()">商品管理</a>
        <a href="../goods/add.php" target="mainFrame" onFocus="this.blur()">添加商品</a>
      </div>

      <div>
        <span>订单管理</span>
        <a href="../orders/index.php" target="mainFrame" onFocus="this.blur()">订单管理</a>
        <a href="../orders/add.php" target="mainFrame" onFocus="this.blur()">添加订单</a>
      </div>

      <div>
        <span>友情链接</span>
        <a href="../links/index.php" target="mainFrame" onFocus="this.blur()">友链管理</a>
        <a href="../links/add.php" target="mainFrame" onFocus="this.blur()">添加链接</a>
      </div>



    </div>
</body>
</html>