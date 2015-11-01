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
<title>订单查询</title>
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
    <td width="99%" align="left" valign="top">您的位置：订单查询</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="get" action="index_search.php">
	         <span>查询订单：</span>
	         <input type="text" name="wd" value="<?php echo $_GET['wd'] ?>" class="text-word">
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
        <th align="center" valign="middle" class="borderright">会员</th>
        <th align="center" valign="middle" class="borderright">联系人</th>
        <th align="center" valign="middle" class="borderright">地址</th>
        <th align="center" valign="middle" class="borderright">邮编</th>
        <th align="center" valign="middle" class="borderright">电话</th>
        <th align="center" valign="middle" class="borderright">购买时间</th>
        <th align="center" valign="middle" class="borderright">总金额</th>
        <th align="center" valign="middle" class="borderright">状态</th>
        <th align="center" valign="middle" class="borderright">用户订单号</th>
        <th align="center" valign="middle">操作</th>
      </tr>
<?php
$status=array('新订单','已发货','已收货','无效订单');

//链接数据库
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
  die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');


$wd = $_GET['wd'];  //下一页进来的时候，必须要带上wd，不然下一页就出不来信息了
//echo $wd;die;
if(empty($wd)){
    //echo "请输入查询内容";
    echo "<script>alert('请输入查询的内容!');window.location.href='./index.php';</script>";
    die();
}
//设置where like语句
$where="where linkman like '%{$wd}%' or userorder like '%{$wd}%'";


//分页
//总条数
$sqlmax="select count(*) as total from ".PREFIX."orders {$where}";
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

$where2="where o.uid=u.id and (o.linkman like '%{$wd}%' or o.userorder like '%{$wd}%')";

$limit="limit $py,$row";

$sql="select o.*,u.username from ".PREFIX."orders as o,".PREFIX."users as u {$where2} order by o.id desc {$limit}";
//echo $sql;die;

$result=mysql_query($sql);

if($result && mysql_num_rows($result)){
  while($row = mysql_fetch_assoc($result)){
?>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['id'] ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['username'] ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo reg_search($wd,$row['linkman']); ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['address'] ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['code'] ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['phone'] ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo date('Y-m-d H:i:s',$row['addtime']) ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['total'] ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $status[$row['status']]; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo reg_search($wd,$row['userorder']); ?></td>
        <td align="center" valign="middle" class="borderbottom"><a href="edit.php?id=<?php echo $row['id'] ?>" target="mainFrame" onFocus="this.blur()" class="add">编辑</a><span class="gray">&nbsp;|&nbsp;</span><a href="action.php?a=delete&id=<?php echo $row['id'] ?>" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
      </tr>
<?php
  }
}
mysql_free_result($result);
mysql_close($conn);
?>


    </table></td>
    </tr>
  <tr>
    <td align="left" valign="top" class="fenye"><?php echo $count; ?> 条数据 <?php echo $page ?>/<?php echo $countPage; ?> 页&nbsp;&nbsp;<a href="./index_search.php?wd=<?php echo $wd; ?>&page=1" target="mainFrame" onFocus="this.blur()">首页</a>&nbsp;&nbsp;<a href="./index_search.php?wd=<?php echo $wd; ?>&page=<?php echo  ($page-1)<1 ? '1' : $page-1; ?>" target="mainFrame" onFocus="this.blur()">上一页</a>&nbsp;&nbsp;<a href="./index_search.php?wd=<?php echo $wd; ?>&page=<?php echo ($page+1)>$countPage ? $countPage : $page+1; ?>" target="mainFrame" onFocus="this.blur()">下一页</a>&nbsp;&nbsp;<a href="./index_search.php?wd=<?php echo $wd; ?>&page=<?php echo $countPage; ?>" target="mainFrame" onFocus="this.blur()">尾页</a></td>
  </tr>
</table>
</body>
</html>