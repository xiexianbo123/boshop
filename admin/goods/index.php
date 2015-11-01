<?php
include('../../public/common.php');
//如果没登陆则返回
if(empty($_SESSION['adminuser'])){
  header('location:../login.php');
  die;
}
//如果登陆的非管理员，则返回
if($_SESSION['adminuser']['state'] != 0){
  header('location:../login.php');
  die;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品管理</title>
<link href="../include/css/css.css" type="text/css" rel="stylesheet" />
<link href="../include/css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="../include/images/main/favicon.ico" />
<style>
body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
#searchmain{ font-size:12px;}
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(../include/images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url(../include/images/main/add.jpg) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
#search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
#main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
#main-tab th{ font-size:12px; background:url(../include/images/main/list_bg.jpg) repeat-x; height:32px; line-height:32px;}
#main-tab td{ font-size:12px; line-height:40px;}
#main-tab td a{ font-size:12px; color:#548fc9;}
#main-tab td a:hover{color:#565656; text-decoration:underline;}
.bordertop{ border-top:1px solid #ebebeb}
.borderright{ border-right:1px solid #ebebeb}
.borderbottom{ border-bottom:1px solid #ebebeb}
.borderleft{ border-left:1px solid #ebebeb}
.gray{ color:#dbdbdb;}
td.fenye{ padding:10px 0 0 0; text-align:right;}
.bggray{ background:#f9f9f9}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：商品管理</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="get" action="search.php">
	         <span>查找商品：</span>
	         <input type="text" name="wd" value="" class="text-word">
	         <input type="submit" value="查询" class="text-but">
	         </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="add.php" target="mainFrame" onFocus="this.blur()" class="add">新增商品</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">商品id</th>
        <th align="center" valign="middle" class="borderright">所属类别</th>
        <th align="center" valign="middle" class="borderright">商品名称</th>
        <th align="center" valign="middle" class="borderright">单价</th>
        <th align="center" valign="middle" class="borderright">商品图片</th>
        <th align="center" valign="middle" class="borderright">状态</th>
        <th align="center" valign="middle" class="borderright">库存量</th>
        <th align="center" valign="middle" class="borderright">购买量</th>
        <th align="center" valign="middle" class="borderright">点击数</th>
        <th align="center" valign="middle" class="borderright">标签</th>
        <th align="center" valign="middle" class="borderright">添加时间</th>
        <th align="center" valign="middle">操作</th>
      </tr>
<?php
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
  die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');

$tag=array(
  '0'=>'无',
  '1'=>'新品',
  '2'=>'热卖',
  '3'=>'特价',
);

$state=array(
  '1'=>'新添加',
  '2'=>'在售',
  '3'=>'下架',
  );

//分页
//总条数
$sqla='select count(*) from '.PREFIX.'goods';
$result1=mysql_query($sqla);
$count=mysql_result($result1,0,0);

//设置$page的值
$page=isset($_GET['page'])? $_GET['page'] : 1;

//每页显示5条
$num=10;

//总页数
$zpage=ceil($count/$num);

$limit='limit '.($page-1)*$num.','.$num;

$sql = "select g.*,t.name from ".PREFIX."goods as g,".PREFIX."type as t where g.typeid=t.id order by g.id desc {$limit}";
//echo $sql;die();

$result = mysql_query($sql);
if($result && mysql_num_rows($result)>0){
  while($row = mysql_fetch_assoc($result)){
?>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['id']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['name']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['goods']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['price']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><img src="../../public/uploads/64_<?php echo $row['picname']; ?>"></td>
        <td align="center" valign="middle" class="borderright borderbottom"><font color="red"><?php echo $state[$row['state']]; ?></font></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['store']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['num']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['clicknum']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $tag[$row['tag']]; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo date('Y-m-d',$row['addtime']); ?></td>
        <td align="center" valign="middle" class="borderbottom"><a href="edit.php?id=<?php echo $row['id']; ?>&typeid=<?php echo $row['typeid'] ?>" target="mainFrame" onFocus="this.blur()" class="add">修改</a><span class="gray">&nbsp;|&nbsp;</span><a href="action.php?a=delete&id=<?php echo $row['id']; ?>&picname=<?php echo $row['picname']; ?>" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
      </tr>
<?php

  }
}
mysql_free_result($result1);
mysql_free_result($result);
mysql_close($conn);

?>
    </table></td>
    </tr>
  <tr>
    <td align="left" valign="top" class="fenye">共 <font color="red"><?php echo $count; ?></font> 条数据 <?php echo $page; ?>/<?php echo $zpage; ?> 页&nbsp;&nbsp;<a href="./index.php?page=1" target="mainFrame" onFocus="this.blur()">首页</a>&nbsp;&nbsp;<a href="./index.php?page=<?php echo ($page-1)<1?'1':($page-1) ?>" target="mainFrame" onFocus="this.blur()">上一页</a>&nbsp;&nbsp;<a href="./index.php?page=<?php echo ($page+1)>$zpage?$zpage:($page+1); ?>" target="mainFrame" onFocus="this.blur()">下一页</a>&nbsp;&nbsp;<a href="./index.php?page=<?php echo $zpage ?>" target="mainFrame" onFocus="this.blur()">尾页</a></td>
  </tr>
</table>
</body>
</html>