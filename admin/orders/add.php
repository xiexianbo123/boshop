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
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>添加订单</title>
</head>
<body>
<form action="action.php?a=add" method="post">
  <table>
    <tr>
      <td>会员ID:</td>
      <td><input type="text" name="uid" value=""></td>
    </tr>
    <tr>
      <td>联系人:</td>
      <td><input type="text" name="linkman" value=""></td>
    </tr>
    <tr>
      <td>地址:</td>
      <td><input type="text" name="address" value=""></td>
    </tr>
    <tr>
      <td>邮编:</td>
      <td><input type="text" name="code" value=""></td>
    </tr>
    <tr>
      <td>电话:</td>
      <td><input type="text" name="phone" value=""></td>
    </tr>
    <tr>
      <td>购买时间:</td>
      <td><input type="text" name="addtime" value=""></td>
    </tr>
    <tr>
      <td>总金额:</td>
      <td><input type="text" name="total" value=""></td>
    </tr>
    <tr>
      <td>状态:</td>
      <td><input type="radio" name="status" value="0">
        新订单
        <input type="radio" name="status" value="1">
        已发货
        <input type="radio" name="status" value="2">
        已收货
        <input type="radio" name="status" value="3">
        无效订单 </td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="提交">
        <input type="reset" value="重置"></td>
    </tr>
  </table>
</form>
</body>
</html>