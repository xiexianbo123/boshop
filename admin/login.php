<?php
include('../public/common.php');
//判断用户已经登录的情况，已经登录过了，你就不要过来溜达了
if(isset($_SESSION['adminuser']) && ($_SESSION['adminuser']['state'] == 0)){
    header('location:index.php');
}
?>
<html>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>登录(Login)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="./assets/css/reset.css">
        <link rel="stylesheet" href="./assets/css/supersized.css">
        <link rel="stylesheet" href="./assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="page-container">
            <h1>登录(Login)</h1>
            <form action="useraction.php?a=dologin" method="post">
                <input type="text" name="username" class="username" placeholder="请输入您的用户名！">
                <input type="password" name="password" class="password" placeholder="请输入您的用户密码！">
                <input type="Captcha" class="Captcha" name="Captcha" placeholder="请输入验证码！">
                <div style="padding-top:25px;padidng-left:0px;"><img src="./yzm.php" id="randomCodeImg" onclick="bobo();" /></div>
                <button type="submit" class="submit_button">登录</button>
                <div class="error"><span>+</span></div>
            </form>
        </div>
<script>              
var obj = window.document.getElementById('randomCodeImg');
function bobo(){
  obj.src='yzm.php?' + Math.round(Math.random()*1000);
}
</script>
        <!-- Javascript -->
        <script src="./assets/js/jquery-1.8.2.min.js" ></script>
        <script src="./assets/js/supersized.3.2.7.min.js" ></script>
        <script src="./assets/js/supersized-init.js" ></script>
        <script src="./assets/js/scripts.js" ></script>

    </body>

<?php

if(!empty($_GET['error'])){
    if($_GET['error']==2){
        echo "<script>alert('您不是管理员,无权限访问！')</script>";
    }
}

?>
</html>

