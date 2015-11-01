<?php
session_start();
header('Content-type:text/html;Charset:utf-8');

include('config.php');
include('base.func.php');


//数据库查询函数,极大的方便前台数据查询,这个语句适合select
//传一个sql语句，成功，返回一个数组,失败,返回false
function myQuery($sql){
	//初始化返回值
	$arr = false;

	$conn=mysql_connect(HOST,USER,PASS);
	if(mysql_errno()){
		return $arr;
	}
	//连接库，设置字符集
	mysql_select_db(DBNAME,$conn);
	mysql_set_charset('utf8');

	$sqla=$sql;
	$result=mysql_query($sqla);
	if($result && mysql_num_rows($result)>0){  //这个语句适合select
		while($row=mysql_fetch_assoc($result)){
			$aa[]=$row;
		}
		$arr=$aa;
		return $arr;
	}else{
		return $arr;
	}
}


//数据库插入函数，INSERT，插入成功返回insert产生的最新ID，插入失败返回false
function myQueryInsert($sql){
	//初始化返回值
	$arr = false;

	$conn=mysql_connect(HOST,USER,PASS);
	if(mysql_errno()){
		return $arr;
	}
	//连接库，设置字符集
	mysql_select_db(DBNAME,$conn);
	mysql_set_charset('utf8');

	$sqla=$sql;
	$result=mysql_query($sqla);
	if($result && mysql_insert_id($conn)>0){  //这个语句适合select
		$arr=mysql_insert_id($conn);
		return $arr;
	}else{
		return $arr;
	}
}


//数据库函数,UPDATE
function myQueryUpdate($sql){
	//初始化返回值
	$arr = false;

	$conn=mysql_connect(HOST,USER,PASS);
	if(mysql_errno()){
		return $arr;
	}
	//连接库，设置字符集
	mysql_select_db(DBNAME,$conn);
	mysql_set_charset('utf8');

	$sqla=$sql;
	$result=mysql_query($sqla);
	if($result && mysql_affected_rows($conn)){  //这个语句适合select
		$arr=true;
		return $arr;
	}else{
		return $arr;
	}
}


//数据库函数,DELETE
function myQueryDelete($sql){
	//初始化返回值
	$arr = false;

	$conn=mysql_connect(HOST,USER,PASS);
	if(mysql_errno()){
		return $arr;
	}
	//连接库，设置字符集
	mysql_select_db(DBNAME,$conn);
	mysql_set_charset('utf8');

	$sqla=$sql;
	$result=mysql_query($sqla);
	if($result && mysql_affected_rows($conn)){  //这个语句适合select
		$arr=true;
		return $arr;
	}else{
		return $arr;
	}
}




/*下面全部是为list.php页面服务*/
//默认存在分类数据信息
$sql110="select * from ".PREFIX."type";
$result110=myQuery($sql110);
//var_dump($result110);

//递归函数，根据传入的ID，查找下级，无限找,最后返回数组集合(三维数组)
function typeDate($data,$id){
	$arr=array();
	foreach($data as $value){
		if($value['pid']==$id){
			$arr[]=$value;
			//考虑子类下面还有子类的情况,递归
			$lsid=$value['id'];
			$arr=array_merge(typeDate($data,$lsid),$arr);
		}
	}
	return $arr;
}
//var_dump(typeDate($result110,1));

//兄弟栏目
function typeSibling($data,$id){
	$arr=array(
		'parent' => '',  //父ID
		'child' => ''   //子(数组),获取每个子类的ID和名称
		);
	foreach($data as $value){
		//找到ID相等的那条数据
		if($value['id'] == $id){
			$arr['parent']=$value['pid'];
			$lspid=$value['pid'];
		}
	}
	//利用pid找出所有同级数据
	foreach($data as $val){
		//$childArr=array();
		if($val['pid'] == $lspid){
			$childArr[]=$val;
			//var_dump($childArr);
		}
	}
	$arr['child']=$childArr;
	
	return $arr;
}
//var_dump(typeSibling($result110,15));

/*
	主要应用与列表页全部、子分类
	功能是，传入一个ID判断是父类，还是子类
	父类，则返回子类ID及名字 和自身ID，
	子类，则返回兄弟ID及父类ID
	$id 传入的ID

 */
function listId($id,$data){
	//初始化返回值信息
	$arr=array(
		'parent' => '',  //父ID
		'child' => ''   //子(数组),获取每个子类的ID和名称
		);
	//判断传入的是父类，还是子类
	$sql="select count(*) as total from ".PREFIX."type where pid={$id}";
	$result=myQuery($sql);
	if($result[0]['total'] == 0){
		//当传入值为子类目的情况
		$arr=typeSibling($data,$id);  //使用上面函数遍历子类

	}else{
		//当传入ID为父类的情况
		$arr['parent'] = $id;
		$arr['child'] = typeDate($data,$id);  //使用上面定义的递归函数
	}

	return $arr;
}

//var_dump(listId(15,$result110));
//

//list.php页面 数据遍历部分
//如果为子类，则ID为自己，如果为父类，则id为子类ID拼接的字符串
function listIdData($id,$data){
	//初始化返回值信息,返回一个ID或多个ID
	$str='';
	//判断传入的是父类，还是子类
	$sql="select count(*) as total from ".PREFIX."type where pid={$id}";
	$result=myQuery($sql);
	if($result[0]['total'] == 0){
		//当传入值为子类目的情况
		$str=$id;

	}else{
		//当传入ID为父类的情况
		$arr['parent'] = $id;
		$arr['child'] = typeDate($data,$id);  //使用上面定义的递归函数
		foreach($arr['child'] as $v){
			$str.=$v['id'].',';
		}
		$str=rtrim($str,',');
	}

	return $str;
}
//var_dump(listIdData(16,$result110));