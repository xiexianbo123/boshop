<?php
require('../public/common.php');

$arri=array('联通标准版套餐','移动标准版套餐','双4G版套餐','电信标准版套餐');
$arrj=array('黑色','白色','金色');

$a=$_GET['a'];
switch($a){
	case 'sh':
	$id = $_GET['id'];
	$sql = "update ".PREFIX."orders set status=2 where id={$id}";
	$result = myQueryUpdate($sql);
	if($result){
		echo location_js('收货完成','./home.php');
	}else{
		echo location_js('失败','./home.php');
	}
	break;
	case 'qx':
	//取消订单
	$id = $_GET['id'];
	$sql = "update ".PREFIX."orders set status=3 where id={$id}";
	//echo $sql;die;
	$result = myQueryUpdate($sql);
	if($result){
		echo location_js('取消订单成功','./home.php');
	}else{
		echo location_js('失败','./home.php');
	}
	break;
	case 'submit':
	
	//var_dump($_POST);die;
	//获取收货地址id,遍历数据
	$Addressid = $_POST['myAddress'];
	$sqldz="select * from ".PREFIX."address where id={$Addressid}";
	$resdz=myQuery($sqldz);
	//收货人
	$linkman=$resdz['0']['linkman'];
	$address=$resdz['0']['address'];
	$code=$resdz['0']['code'];
	$phone=$resdz['0']['phone'];
	

	//foreach遍历购物车
	if(!empty($_SESSION['shoplist'])){
		foreach($_SESSION['shoplist'] as $key=>$value){
			//总金额
			$money+=$value['price']*$value['num'];

			//用户确认提交订单，需要减少对应商品的库存，增加被购买量
			$sqlkc="update ".PREFIX."goods set store=store-{$value['num']},num=num+{$value['num']} where id={$key}";
			$resultkc=myQueryUpdate($sqlkc);
		}
	}

	//生成唯一订单编号
	/*
	$userOrder='201507160002';
	$sqla="select * from ".PREFIX."orders where userorder={$userOrder}";
	$resulta=myQuery($sqla);

	if($resulta){
		echo '存在';
	}else{
		echo '不存在';
	}

	die();
	*/
	do{
		$userOrder=date('Ymd').rand(1000,9999); //拼接一个12位订单
		//$userOrder='201507160001';
		$sqla="select * from ".PREFIX."orders where userorder={$userOrder}";
		$resulta=myQuery($sqla);
	}while($resulta);  //存在，为真，为真则继续随机

	//整理订单数据
	//会员id号
	$id=$_SESSION['user']['id'];

	//购买时间
	$addtime=time();
	//总金额
	$total=$money;
	//状态:新订单
	$status=0;


	//组合sql,提交订单,插入订单表
	$sql="insert into ".PREFIX."orders values(null,'{$id}','{$linkman}','{$address}','{$code}','{$phone}','{$addtime}','{$total}','{$status}','{$userOrder}')";
	//echo $sql;die;

	$result=myQueryInsert($sql); //插入成功，返回INSERT产生的ID


	//遍历购物车，组合sql
	foreach($_SESSION['shoplist'] as $key=>$value){
		$str.="(null,'{$result}','{$value['id']}','{$value['goods']}','{$value['price']}','{$value['num']}','{$userOrder}','{$value['picname']}','{$value['network']}','{$value['color']}'),";
	}
	//echo $str;die();
	$str=rtrim($str,',');

	//组合sql，插入订单详情表订单有多少个表?插入多条数据
	$sqla="insert into ".PREFIX."detail values".$str;
	//echo $sqla;die;
	$resaa=myQueryInsert($sqla);


	if($resaa>0){
		//已经成功获取到了用户的订单
		//销毁SESSION订单信息
		unset($_SESSION['shoplist']);
		header('location:./confirm2.php');
	}


	

	break;

	case 'update':
	$k = $_GET['key'];
	if($_GET['type'] == 'jia'){
		$_SESSION['shoplist'][$k]['num']++;
		header('location:./shop.php');
	}
	if($_GET['type'] == 'jian'){
		if($_SESSION['shoplist'][$k]['num']>1){
			$_SESSION['shoplist'][$k]['num']--;
			header('location:./shop.php');
		}else{
			header('location:./shop.php');
		}
	}
	break;
	case 'del':
	$k = $_GET['key'];
	unset($_SESSION['shoplist'][$k]);
	header('location:./shop.php');
	break;
	case 'add':
	//获取值,将所有值放到一个数组里，然后通过传入session
	//作为下标,购物车(session)万一存在该商品，可以累加
	$id = $_POST['id'];
	//作为数组
	$shop['id'] = $_POST['id'];
	$shop['goods'] = $_POST['goods'];
	$shop['price'] = $_POST['price'];
	$shop['picname'] = $_POST['picname'];
	$shop['num'] = $_POST['num'];
	$shop['network'] = $_POST['network'];  //网络格式
	$shop['color'] = $_POST['color'];  //产品颜色
	//如果原商品存在，则加数量，如果不存在，则添加
	if(isset($_SESSION['shoplist'][$id])){
		$_SESSION['shoplist'][$id]['num']+=$shop['num'];
		//格式拼接(这里暂时不能改，涉及问题较多，如果用户买两个手机，第一个红色，第二个黑色)
		//颜色拼接
		
	}else{
		$_SESSION['shoplist'][$id] = $shop;
	}
	//var_dump($_SESSION);

	//返回信息给ajax
	
	//购物车中商品总数,和所有商品总价
	foreach($_SESSION['shoplist'] as $key=>$value){
		//总价
		$money+=$value['price']*$value['num'];
		//总数目
		$allNum+=$value['num'];
	}
	//echo '总价'.$money.'<br />';
	//echo '总量'.$allNum.'<br />';
	
	//根据b状态返回信息
	if($_GET['b']=='article'){
	$str=<<<EOT
<dl><dt><s></s></dt><dd><p>华为 {$_POST['goods']} {$arri[$_POST['network']]} {$arrj[$_POST['color']]}（赠豪华配件套装）</p><div class="pro-add-success-msg">成功加入购物车!</div><div class="pro-add-success-total">购物车中共&nbsp;<b id="cart-total">$allNum</b>&nbsp;件商品，金额合计&nbsp;<b id="cart-price">¥&nbsp;$money</b></div><div class="pro-add-success-button"><a href="shop.php" class="button-style-1 button-go-cart" title="去购物车结算">去结算</a><a class="button-style-4 button-walking" href="javascript:;" title="继续逛逛" onclick="$('#cart-tips').hide()">继续逛逛&nbsp;&gt;&gt;</a></div></dd></dl>
EOT;
	$arr=array('state'=>'1','html'=>$str);
	echo json_encode($arr);
	}
	
	break;

	case 'top':
	//购物车中商品总数,和所有商品总价
	if(empty($_SESSION['shoplist'])){
		$money=0;
		$allNum=0;
	}else{
		foreach($_SESSION['shoplist'] as $key=>$value){
			//总价
			$money+=$value['price']*$value['num'];
			//总数目
			$allNum+=$value['num'];
		}
	}
	//预留给头部微型购物车
	$str2=<<<HTMLA
<div class="minicart-pro-settleup" id="minicart-pro-settleup"><p>共<em id="micro-cart-total">{$allNum}</em>件商品，金额合计<b id="micro-cart-totalPrice">&yen;&nbsp;{$money}</b></p><a class="button-minicart-settleup" href="./shop.php">去结算</a></div>
HTMLA;
	$arr2=array('state'=>'1','html'=>$str2,'num'=>$allNum);
	echo json_encode($arr2);
	break;
}


