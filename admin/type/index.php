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
<title>分类管理</title>
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
    <td width="99%" align="left" valign="top">您的位置：分类管理</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">分类id</th>
        <th align="center" valign="middle" class="borderright">分类名称</th>
        <th align="center" valign="middle" class="borderright">父类PID</th>
        <th align="center" valign="middle" class="borderright">PATH</th>
        <th align="center" valign="middle">操作</th>
      </tr>
<?php

//连接mysql
$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
  die('数据库连接失败'.mysql_error());
}
//选择库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');


//遍历出数据
$sql="select * from ".PREFIX."type order by concat(path,id)";
//echo $sql;
//die();
$result=mysql_query($sql);
if($result && mysql_num_rows($result)){
  while($row = mysql_fetch_assoc($result)){
    $m=substr_count($row['path'],',');
    $html=str_repeat('&nbsp;',($m-1)*4);
?>

      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['id']; ?></td>
        <td align="" valign="middle" class="borderright borderbottom"><?php echo $html.'|-'.$row['name']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['pid']; ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo $row['path']; ?></td>
        <td align="center" valign="middle" class="borderbottom">
        <a href="add.php?name=<?php echo $row['name']; ?>&pid=<?php echo $row['id'] ?>&path=<?php echo $row['path'] ?>" target="mainFrame" onFocus="this.blur()" class="add">增加</a>
        <span class="gray">&nbsp;|&nbsp;</span>
        <a href="edit.php?id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>&pid=<?php echo $row['pid'] ?>&path=<?php echo $row['path'] ?>" target="mainFrame" onFocus="this.blur()" class="add">修改</a>
        <span class="gray">&nbsp;|&nbsp;</span>
        <a href="action.php?a=delete&id=<?php echo $row['id']; ?>" target="mainFrame" onFocus="this.blur()" class="add">删除</a>
        </td>
      </tr>


<?php

  }
}else{
  echo "没有数据";
}

mysql_free_result($result);
mysql_close($conn);

?>







    </table></td>
    </tr>

</table>
</body>
</html>