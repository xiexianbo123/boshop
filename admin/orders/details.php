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
<title>订单详情</title>
<link href="../include/css/css.css" type="text/css" rel="stylesheet" />
<link href="../include/css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="images/main/favicon.ico" />
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
    <td width="99%" align="left" valign="top">您的位置：订单详情</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="get" action="detail_search.php">
	         <span>订单号：</span>
	         <input type="text" name="wd" value="" class="text-word">
	         <input name="" type="submit" value="查询" class="text-but">
	         </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">id</th>
        <th align="center" valign="middle" class="borderright">订单ID号</th>
        <th align="center" valign="middle" class="borderright">商品ID号</th>
        <th align="center" valign="middle" class="borderright">商品名称</th>
        <th align="center" valign="middle" class="borderright">单价</th>
        <th align="center" valign="middle" class="borderright">数量</th>
        <th align="center" valign="middle">用户订单号</th>
      </tr>
<?php
//分页
//总条数
$sqlmax="select count(*) as total from ".PREFIX."detail";
$resmax = myQuery($sqlmax);
$count = $resmax[0]['total'];
//echo $count;die;

//每页显示5条
$row=5;
//总页数
$countPage=ceil($count/$row);
//当前页数
$page=empty($_GET['page'])?'1':$_GET['page'];
//偏移量
$py=($page-1)*5;

$limit="limit $py,$row";

//遍历输出订单详情
$sql="select * from ".PREFIX."detail order by id desc {$limit}";
$result = myQuery($sql);
foreach($result as $value){
?>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $value['id']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $value['orderid']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $value['goodsid']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $value['name']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $value['price']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $value['num']; ?></td>
        <td align="center" valign="middle" class="borderbottom"><a href="index_search.php?wd=<?php echo $value['userorder']; ?>"><?php echo $value['userorder']; ?></a></td>
      </tr>

<?php
}


?>

    </table></td>
    </tr>
  <tr>
    <td align="left" valign="top" class="fenye"><?php echo $count; ?> 条数据 <?php echo $page ?>/<?php echo $countPage; ?> 页&nbsp;&nbsp;<a href="./details.php?page=1" target="mainFrame" onFocus="this.blur()">首页</a>&nbsp;&nbsp;<a href="./details.php?page=<?php echo  ($page-1)<1 ? '1' : $page-1; ?>" target="mainFrame" onFocus="this.blur()">上一页</a>&nbsp;&nbsp;<a href="./details.php?page=<?php echo ($page+1)>$countPage ? $countPage : $page+1; ?>" target="mainFrame" onFocus="this.blur()">下一页</a>&nbsp;&nbsp;<a href="./details.php?page=<?php echo $countPage; ?>" target="mainFrame" onFocus="this.blur()">尾页</a></td>
  </tr>
</table>
</body>
</html>