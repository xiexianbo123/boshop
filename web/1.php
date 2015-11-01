<?php
header('Content-Type:text/html;Charset=utf-8');
$username=$_POST['username'];
$age=$_POST['age'];
$addres=$_POST['addres'];

//返回html数据格式
//echo '姓名:'.$username.'年龄:'.$age.'地址:'.$addres;

//返回json数据格式
//{"username":"$username","age":"$age","addres".$addres}; //json数据格式
//$str="{\"username\":\"{$username}\",\"age\":\"{$age}\",\"addres\":\"{$addres}\"}";
//echo $str;
$arr=array('username'=>$username,'age'=>$age,'addres'=>$addres);
echo json_encode($arr);

//重点:php json_encode可以对PHP变量直接进行json编码(一般变量为数组)
/*
$arr = array ('a'=>'大家好','b'=>2,'c'=>3,'d'=>4,'e'=>5);
echo json_encode($arr);
 */

