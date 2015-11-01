<?php
session_start();
function yzm($width=100,$height=40,$length=4,$type=3,$imageType='jpeg'){
	switch($type){
		case 1:
			$str=join('',array_rand(range(0,9),4));
			break;
		case 2:
			$str=join('',array_rand(array_flip(range(a,z)),4));
			break;
		case 3:
			$str='';
			for($i=0;$i<4;$i++){
				$sj=mt_rand(0,2);
				switch($sj){
					case 0:
						$char=mt_rand(0,9);
						break;
					case 1:
						$char=array_rand(array_flip(range('a','z')),1);
						break;
					case 2:
						$char=array_rand(array_flip(range('A','Z')),1);
						break;
				}
				$str.=$char;
			}
			break;
	}
	//echo $str;  不可以输出
	$_SESSION['yzm']=$str;

	$img=imagecreate($width,$height);
	imagefilledrectangle($img,0,0,$width,$height,qianys($img));
	//干扰元素,像素点
	for($i=0;$i<50;$i++){
		imagesetpixel($img,mt_rand(1,$width),mt_rand(1,$height),shenys($img));
	}
	//干扰元素，线段
	for($i=0;$i<4;$i++){
		imageline($img,mt_rand(1,$width),mt_rand(1,$height),mt_rand(1,$width),mt_rand(1,$height),shenys($img));
	}

	//写字
	for($i=0;$i<4;$i++){
		imagechar($img,5,mt_rand(25*$i,22*($i+1)),mt_rand(1,25),$str[$i],shenys($img));
	}

	//输出
	header('Content-Type:image/jpeg');
	imagejpeg($img);

	//关闭资源
	imagedestroy($img);
}

function qianys($zy){  //值越大，颜色越浅
	return imagecolorallocate($zy,mt_rand(150,255),mt_rand(150,255),mt_rand(150,255));
}
function shenys($zy){
	return imagecolorallocate($zy,mt_rand(0,150),mt_rand(0,150),mt_rand(0,150));
}
