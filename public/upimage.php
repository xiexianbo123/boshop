<?php

//文件上传及缩放功能函数

header('Content-Type:text/html;Charset=UTF-8');

//1.初始化文件上传信息

$upfile = $_FILES['mypic'];//被上传文件的信息
$path = './uploads/';//上传文件路径
$typeList = array('image/gif','image/png','image/jpeg');//允许上传的文件MIME类型
$maxSize = 1024000;//允许上传的文件大小

//文件上传功能函数
function uploadFile($upfile,$path,$typeList,$maxSize=0){ 

	//1.初始化上传文件信息
	$path = rtrim($path,'/').'/';//处理文件上传目录
	$res = array("error"=>false,'info'=>"");//处理返回值信息

	//2.判断错误
	if($upfile['error'] > 0){ 
		switch($upfile['error']){ 
			case 1:$info = "上传文件超过了php.ini的最大限制";break;
			case 2:$info = "上传文件超过了表单MAX_FILE_SIZE的限制";break;
			case 3:$info = "只有部分文件被上传";break;
			case 4:$info = "没有文件被上传";break;
			case 6:$info = "找不到临时目录";break;
			case 7:$info = "上传写入失败";break;
			default:$info = "未知错误";break;
		}
		$res['info'] = $info;
		return $res;
	}

	//3.判断上传文件类型
	if(count($typeList) > 0){ 
		if(!in_array($upfile['type'],$typeList)){ 
			$res['info'] = "文件类型错误";
			return $res;
		}
	}

	//4.判断上传文件大小
	if($maxSize > 0){ 
		if($upfile['size'] > $maxSize){ 
			$res['info'] = "上传文件大小超过了限制大小!";
			return $res;
		}
	}

	//5.随机文件名称

	//获取上传文件的后缀
	$ext = pathinfo($upfile['name'],PATHINFO_EXTENSION);
	//获取随机文件名
	do{
		//生成随机名
		$newName = date("YmdHis").rand(100,999).".".$ext;
	}while(file_exists($path.$newName));//判断生成文件是否存在


	//6.进行文件上传操作

	if(is_uploaded_file($upfile['tmp_name'])){ 

		//判断是否存在上传文件路径下文件夹
		if(!file_exists($path)){ 
			//创建上传文件夹
			if(!mkdir($path,0755)){ 
				$res['info'] = '创建上传文件夹失败!';
				return $res;
			}
		}
		//上传文件操作
		if(move_uploaded_file($upfile['tmp_name'],$path.$newName)){ 
			$res['error'] = true;
			$res['info'] = $newName;
		}else{ 
			$res['info'] = "上传文件失败,移动上传文件失败!";
			return $res;
		}
	}else{ 
		$res['info'] = "上传文件失败，非上传文件!";
		return $res;
	}
	return $res;
}

//文件缩放功能
/*
	$picname  缩放文件名
	$path     缩放文件路径
	$maxWidth 缩放文件宽度
	$maxHeight缩放文件高度
	$pre      缩放文件后缀(默认为's_')


*/

function imageResize($picname,$path,$maxWidth,$maxHeight,$pre="s_"){ 

	//处理存放缩放文件路径
	$path = rtrim($path,'/').'/';

	//1.处理被缩放的图片
	$info = getimagesize($path.$picname);

	//获取图片宽高值
	$width = $info[0];
	$height = $info[1];

	//2.判断并创建画布资源
	switch($info[2]){ 
		case 1:
		$srcim = imagecreatefromgif($path.$picname);
		break;
		case 2:
		$srcim = imagecreatefromjpeg($path.$picname);
		break;
		case 3:
		$srcim = imagecreatefrompng($path.$picname);
		break;
		default:
		return false;
		break;
	}

	//3.计算缩放图片尺寸
	if($maxWidth/$width < $maxHeight/$height){ 
		$w = $maxWidth;
		$h = ($maxWidth/$width)*$height;
	}else{ 
		$w = ($maxHeight/$height)*$width;
		$h = $maxHeight;
	}

	//创建画布
	$dstim = imagecreatetruecolor($w,$h);
	//图片缩放操作
	imagecopyresampled($dstim,$srcim,0,0,0,0,$w,$h,$width,$height);
	//6.图片另存为
	switch($info[2]){ 
		case 1: //gif
		imagegif($dstim,$path.$pre.$picname);
		break;
		case 2://jpeg
		imagejpeg($dstim,$path.$pre.$picname);
		break;
		case 3:
		imagepng($dstim,$path.$pre.$picname);
		break;
	}

	//7.释放资源
	imagedestroy($dstim);
	imagedestroy($srcim);
	//返回执行结果
	return true;
}








