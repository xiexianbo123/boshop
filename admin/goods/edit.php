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
<title>修改商品</title>
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
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：修改商品&nbsp;&nbsp;>&nbsp;&nbsp;修改商品</td>
  </tr>
  <tr>
    <td align="left" valign="top" id="addinfo">
    <a href="add.html" target="mainFrame" onFocus="this.blur()" class="add">修改商品</a>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <form action="action.php?a=update" method="post" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">商品类别:</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <select name="typeid" id="level">
<?php
//这里需要将网站的所有栏目都遍历出来(每一个栏目都可能成为父栏目)

$conn=mysql_connect(HOST,USER,PASS);
if(mysql_errno()){
  die('数据库连接失败'.mysql_error());
}
//连接库，设置字符集
mysql_select_db(DBNAME,$conn);
mysql_set_charset('utf8');

$sql = "select * from ".PREFIX."type";
$result = mysql_query($sql);
if($result && mysql_num_rows($result)>0){
  while($row = mysql_fetch_assoc($result)){
    $data[]=$row;
  }
}
//echo '<pre>';
//print_r($data);
//echo '<hr />';

//核心思想：根据pid找子类
//下面写函数，递归重新排序,依据PID
//先来和简单的，已知pid,然后找pid相等的数据
function dataSort($data,$pid,$level=0){
  $arr = array();  //这个不能放在foreach循环中,不然每次都会清0
  foreach($data as $value){
    if($value['pid'] == $pid){  //如果条件匹配，则将该数据放到一个新的数组当中
      $value['level']=$level;
      $arr[]=$value; //$arr为二维数组，$value为一维数组 
      $lsid = $value['id']; //取出pid匹配的数据的ID,万一他也有子类呢?拿他的id继续去匹配pid
      $arr=array_merge($arr,dataSort($data,$lsid,$level+1));   //这次匹配结果，合并下次匹配结果，函数返回的是二维数组或空数组，凭借(合并)二维数组
    }
  }
  return $arr;   //如果pid存在,返回一个二维数组，如果pid不存在返回空数组
}

//print_r(dataSort($data,5));
$dataList = dataSort($data,0);  //0为顶级分类，所有的其他分类都是依赖0下面

$typeid = $_GET['typeid'];
foreach($dataList as $v){
  $html=str_repeat('----',$v['level']);
  if($v['level']==0){

  }
  if($v['level']==0){
    echo "<option value='{$v['id']}' disabled />|{$html}{$v['name']}</option>";
  }elseif($v['id'] == $typeid){
    echo "<option value='{$v['id']}' selected />|{$html}{$v['name']}</option>";
  }else{
    echo "<option value='{$v['id']}'>|{$html}{$v['name']}</option>";
  }

}


//上面是获取商品分类
//下面是根据获取ID得到产品信息
$id = $_GET['id'];
$sqla="select * from ".PREFIX."goods where id={$id}";
//echo $sqla;
//die();
$resulta=mysql_query($sqla);

if($resulta && mysql_num_rows($resulta)>0){
  $rowa=mysql_fetch_assoc($resulta);  
}


mysql_free_result($resulta);

mysql_free_result($result);
mysql_close($conn);

?>
        </select>
        </td>
        </tr>
<input type="hidden" name="id" value="<?php echo $id ?>">
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">商品名称:</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="goods" value="<?php echo $rowa['goods']; ?>" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">生产厂家:</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="company" value="<?php echo $rowa['company']; ?>" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">单价:</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="price" value="<?php echo $rowa['price']; ?>" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">库存量:</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="store" value="<?php echo $rowa['store']; ?>" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">商品原图:</td>
        <input type="hidden" name="picname" value="<?php echo $rowa['picname']; ?>" />
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <img src="../../public/uploads/218_<?php echo $rowa['picname']; ?>">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">商品新图:</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="picname" value="" >
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">促销标签:</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="radio" name="tag" value="0" <?php echo ($rowa['tag']==0)?'checked':''; ?> >无&nbsp;&nbsp;
        <input type="radio" name="tag" value="1" <?php echo ($rowa['tag']==1)?'checked':''; ?> >新品&nbsp;&nbsp;
        <input type="radio" name="tag" value="2" <?php echo ($rowa['tag']==2)?'checked':''; ?> >热卖&nbsp;&nbsp;
        <input type="radio" name="tag" value="3" <?php echo ($rowa['tag']==3)?'checked':''; ?> >特价
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">状态:</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="radio" name="state" value='1' <?php echo ($rowa['state']==1)?'checked':''; ?> >新添加
        <input type="radio" name="state" value='2' <?php echo ($rowa['state']==2)?'checked':''; ?> >在售
        <input type="radio" name="state" value='3' <?php echo ($rowa['state']==3)?'checked':''; ?> >下架
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">简介:</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <textarea name="descr" cols="80" rows="10" class="text-word"><?php echo $rowa['descr']; ?></textarea>
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
</body>
</html>