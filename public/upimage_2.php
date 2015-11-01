<?php
//文件上传及缩放功能函数

header("Count-type:text/html;Charset=utf-8");

//1.初始化文件上传信息
$upfile = $_FILES['mypic'];//被上传文件的信息
$path = './uploads/';//上传文件路径

$type