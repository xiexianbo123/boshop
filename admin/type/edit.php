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
<title>修改分类</title>
<link href="../include/css/css.css" type="text/css" rel="stylesheet" />
<link href="../include/css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="../include/images/main/favicon.ico" />
<style>
body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
#searchmain{ font-size:12px;}
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(../include/images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url(../include/images/main/add.jpg) no-repeat 0px 6px; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF}
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
.bggray{ background:#f9f9f9; font-size:14px; font-weight:bold; padding:10px 10px 10px 0; width:120px;}
.main-for{ padding:10px;}
.main-for input.text-word{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; padding:0 10px;}
.main-for select{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666;}
.main-for input.text-but{ width:100px; height:40px; line-height:30px; border: 1px solid #cdcdcd; background:#e6e6e6; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#969696; float:left; margin:0 10px 0 0; display:inline; cursor:pointer; font-size:14px; font-weight:bold;}
#addinfo a{ font-size:14px; font-weight:bold; background:url(../include/images/main/addinfoblack.jpg) no-repeat 0 1px; padding:0px 0 0px 20px; line-height:45px;}
#addinfo a:hover{ background:url(../include/images/main/addinfoblue.jpg) no-repeat 0 1px;}
</style>
</head>
<body>
<?php
//该字段4个参数，需要传3个进去
$name="根目录";
$path='0,';
$pid=0;
if(isset($_GET['name']) && isset($_GET['pid']) && isset($_GET['path'])){
  $name=$_GET['name'];
  $pid=$_GET['pid'];
  $path=$_GET['path'].$pid.',';
}

?>
<form action="action.php?a=update&pid=<?php echo $_GET['pid'] ?>" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
<input type="hidden" name="path" value="<?php echo $_GET['path']; ?>">
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：分类管理&nbsp;&nbsp;>&nbsp;&nbsp;修改分类</td>
  </tr>
  <tr>
    <td align="left" valign="top" id="addinfo">
    <a href="add.php" target="mainFrame" onFocus="this.blur()" class="add">新增分类</a>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <form method="post" action="">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">父级分类:</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
      <select name="pid">
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
$result=mysql_query($sql);
if($result && mysql_num_rows($result)){
  while($row = mysql_fetch_assoc($result)){
    $m=substr_count($row['path'],',' );
    $html=str_repeat('&nbsp',($m-1)*4);
    if($row['id']==$_GET['pid']){
      echo "<option value='{$row['id']}' selected >".$html.'|-'.$row['name']."</option>";
    }else{
      echo "<option value='{$row['id']}'>".$html.'|-'.$row['name']."</option>";
    }
  }
}else{
  echo "没有数据";
}

mysql_free_result($result);
mysql_close($conn);

?>
      </select>
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">分类名称:</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="name" value="<?php echo $_GET['name'] ?>">
        </td>
        </tr>

      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input name="" type="submit" value="提交" class="text-but">
        <input name="" type="reset" value="重置" class="text-but"></td>
        </tr>
    </table>
    </form>
    </td>
    </tr>
</table>
</form>
</body>
</html>