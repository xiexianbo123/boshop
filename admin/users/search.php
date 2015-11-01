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
<title>搜索加分页</title>
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
    <td width="99%" align="left" valign="top">您的位置：搜索用户</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form name="fm1" method="get" action="search.php">
	         <span>查找用户：</span>
	         <input type="text" name="wd" value="<?php echo $_GET['wd'] ?>" class="text-word">
	         <input name="" type="button" value="查询" class="text-but" onclick="fm1.submit();">
	         </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="./add.php" target="mainFrame" onFocus="this.blur()" class="add">新增管理员</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">id</th>
        <th align="center" valign="middle" class="borderright">账号</th>
        <th align="center" valign="middle" class="borderright">真实姓名</th>
        <th align="center" valign="middle" class="borderright">性别</th>
        <th align="center" valign="middle" class="borderright">地址</th>
        <th align="center" valign="middle" class="borderright">邮编</th>
        <th align="center" valign="middle" class="borderright">电话</th>
        <th align="center" valign="middle" class="borderright">Email</th>
        <th align="center" valign="middle" class="borderright">状态</th>
        <th align="center" valign="middle" class="borderright">注册时间</th>
        <th align="center" valign="middle">操作</th>
      </tr>
<?php
//处理后台用户登陆
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
  die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');

//根据search.php文件拓展分页搜索
//1.查询出所有数据
//2.分页

$wd = $_GET['wd'];  //下一页进来的时候，必须要带上wd，不然下一页就出不来信息了
if(empty($wd)){
    //echo "请输入查询内容";
    echo "<script>alert('请输入查询的内容!');window.location.href='./index.php';</script>";
    die();
}
//设置where like语句
$where="where username like '%{$wd}%' or name like '%{$wd}%'";

/*
第一页 0 5 
第二页 5 5
第三页 10 5
 */
//搜索结果 总条数
$sqla="select count(*) from ".PREFIX."users {$where}";
//echo $sqla;
//die();
$result1=mysql_query($sqla);
$count=mysql_result($result1,0,0);   //定位取值,这里也可以用mysql_fetch_assoc 关联数组,mysql_fetch_row 索引数组
//echo $count;
//die();

//设置$page的值
$page=isset($_GET['page'])? $_GET['page'] : 1;

//每页显示5条
$num=5;

//总页数
$zpage=ceil($count/$num);

$limit='limit '.($page-1)*$num.','.$num;

$sql="select * from ".PREFIX."users {$where} order by id {$limit}";  //asc 升序 desc降序
//echo $sql;
//die();

$result=mysql_query($sql);
//var_dump($result);
//die();
if($result && mysql_num_rows($result)>0){   //mysql_num_rows()结果集中的数据条数
  while($row = mysql_fetch_assoc($result)){
?>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['id']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php
         //echo $row['username']; 
         //这里需要用正则来标红查询结果
         echo reg_search($wd,$row['username']);
        ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo reg_search($wd,$row['name']); ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo ($row['sex'] == false)?'男':'女'; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['address']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['code']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['phone']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['email']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php
          //echo $row['state'];
          switch($row['state']){
            case 0:
              echo '管理员';
              break;
            case 1:
              echo '普通会员';
              break;
            case 2:
              echo '<font color="red">禁用</font>';
              break;
          }
        ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo date('Y-m-d',$row['addtime']); ?></td>
        <td align="center" valign="middle" class="borderbottom"><a href="./edit.php?id=<?php echo $row['id'] ?>" target="mainFrame" onFocus="this.blur()" class="add">编辑</a><span class="gray">&nbsp;|&nbsp;</span><a href="../useraction.php?a=delete&id=<?php echo $row['id'] ?>" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
      </tr>
<?php

  }
}

mysql_free_result($result);
mysql_free_result($result1);
mysql_close($conn);
?>
    </table></td>
    </tr>
  <tr>
    <td align="left" valign="top" class="fenye">共 <font color="red"><?php echo $count; ?></font> 条数据 <?php echo $page; ?>/<?php echo $zpage; ?> 页&nbsp;&nbsp;<a href="./search.php?wd=<?php echo $wd; ?>&page=1" target="mainFrame" onFocus="this.blur()">首页</a>&nbsp;&nbsp;<a href="./search.php?wd=<?php echo $wd; ?>&page=<?php echo ($page-1)<1?'1':($page-1) ?>" target="mainFrame" onFocus="this.blur()">上一页</a>&nbsp;&nbsp;<a href="./search.php?wd=<?php echo $wd; ?>&page=<?php echo ($page+1)>$zpage?$zpage:($page+1); ?>" target="mainFrame" onFocus="this.blur()">下一页</a>&nbsp;&nbsp;<a href="./search.php?wd=<?php echo $wd; ?>&page=<?php echo $zpage ?>" target="mainFrame" onFocus="this.blur()">尾页</a></td>
  </tr>
</table>
</body>
</html>