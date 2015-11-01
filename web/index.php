<?php
require('../public/common.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-cn" />
<title>华为商城官网-提供华为手机(华为P8、荣耀7、荣耀6Plus、Mate7、荣耀畅玩4C、荣耀畅玩4X、荣耀X2等)、平板电脑、移动终端等产品的预约和购买</title>
<link rel="shortcut icon" href="images/favicon.ico" />
<link href="css/ec.core.min.css?20150213" rel="stylesheet" type="text/css">
<link href="css/index.min.css?20141025" rel="stylesheet" type="text/css">
<script src="./js/jquery.js"></script>
</head>
<body class="wide">
<?php include('header.php'); ?>



<!-- 20130904-热门板-start -->

<div class="hot-board"> 
  
  <!--ads start-->
  
  <div class="ec-slider" id="index_slider">
    <ul class="ec-slider-list">
      <li class="ec-slider-item" style="background-color:#f6f6f6;">
        <div class="ec-slider-item-img"><a href="#" target="_blank"><img src="images/20150707110551865.jpg" /></a></div>
      </li>
      <li class="ec-slider-item" style="background-color:#f6f6f6;">
        <div class="ec-slider-item-img"><a href="#" target="_blank"><img src="images/2015070717193638.jpg" /></a></div>
      </li>
      <li class="ec-slider-item" style="background-color:#f6f6f6;">
        <div class="ec-slider-item-img"><a href="#" target="_blank"><img src="images/20150706142122738.jpg" /></a></div>
      </li>
      <li class="ec-slider-item" style="background-color:#f6f6f6;">
        <div class="ec-slider-item-img"><a href="#" target="_blank"><img src="images/2015051309233031.jpg" /></a></div>
      </li>
    </ul>
    &gt;
    <ul>
    </ul>
    &gt;
    <ul>
    </ul>
  </div>
  
  <!--ads end--> 
  
</div>
<!-- 20130904-热门板-end -->

<div class="hr-20"></div>
<div class="layout">

</div>

<div class="layout"> 
  
  <!-- 20130903-ad-1000*160-start -->
  
  <div class="banner"> 
    
    <!-- 20130903-ad-图片轮换-start -->
    <div class="banner-slideshow">
      <div id="m-banner" class="ec-slider">
        <ul class="ec-slider-list">
          <li class="ec-slider-item">
            <div class="ec-slider-item-img"><a href="#" target="_blank"><img src="images/20150706100540726.jpg" /></a></div>
          </li>
          <li class="ec-slider-item">
            <div class="ec-slider-item-img"><a href="#" target="_blank"><img src="images/20150706141555212.jpg" /></a></div>
          </li>
          <li class="ec-slider-item">
            <div class="ec-slider-item-img"><a href="#" target="_blank"><img src="images/20150706180427953.jpg" /></a></div>
          </li>
          <li class="ec-slider-item">
            <div class="ec-slider-item-img"><a href="#" target="_blank"><img src="images/20150615104541764.jpg" /></a></div>
          </li>
          <li class="ec-slider-item">
            <div class="ec-slider-item-img"><a href="#" target="_blank"><img src="images/20150416145325298.jpg" /></a></div>
          </li>
          <li class="ec-slider-item">
            <div class="ec-slider-item-img"><a href="#" target="_blank"><img src="images/2015061610062634.jpg" /></a></div>
          </li>
          <li class="ec-slider-item">
            <div class="ec-slider-item-img"><a href="#" target="_blank"><img src="images/20150420142751797.jpg" /></a></div>
          </li>
        </ul>
      </div>
</div>
  </div>
  <!-- 20130903-ad-1000*160-end --> 
  
</div>
<div class="hr-20"></div>
<div class="layout"> 
  
  <!-- 20130904-频道-楼层-start -->
  
  <div class="channel-floor">
    <div class="h">
      <h2><a href="" title="手机" target="_blank">手机</a></h2>
      <em class="channel-subtitle">华为精品手机</em>
      <ul class="channel-nav">
        <li><a href="#" target="_blank">荣耀</a></li>
        <li><a href="#" target="_blank">畅玩</a></li>
        <li><a href="#" target="_blank">华为 Mate/P系列</a></li>
        <li><a href="#" target="_blank">G/Y系列</a></li>
        <li><a href="#" target="_blank">运营商合约</a></li>
      </ul>
    </div>
    <div class="b">
      <ul class="channel-pro-list">
<!--
        <li id="channel-pro-1-1" class="channel-pro-item channel-pro-rec-item">
          <div class="channel-pro-panels">
            <div class="pro-info">
              <div class="p-img"><a href="#" title="华为 荣耀6 Plus 标准版 双卡双待双通 移动4G 16GB存储（白色）" target="_blank" rel="nofollow"> <img data-lazy-src="images/1435654377677.png" alt="" /> </a></div>
              <div class="p-name"><a href="#" title="华为 荣耀6 Plus 标准版 双卡双待双通 移动4G 16GB存储（白色）" target="_blank"> 荣耀6 Plus </a></div>
              <div class="p-shining">
                <div class="p-slogan">双眼看世界</div>
                <div class="p-promotions"></div>
              </div>
              <div class="p-price"><em>&yen;</em><span>1999</span></div>
              <div class="p-button"><a href="#" target="_blank" class="channel-button" title="立即抢购">立即抢购</a></div>
              <i class="p-tag"><img data-lazy-src="images/1382542488099.png"/></i> </div>
          </div>
        </li>
-->
<?php
//php遍历数据,手机栏目
$sql="select * from ".PREFIX."goods where typeid in(2) limit 0,12";
$result=myQuery($sql);
//var_dump($result);die();
//图片路径
$path="../public/uploads/";
foreach($result as $a=>$value){
$b=$a+4;
?>

<li id="channel-pro-1-<?php echo $b ?>" class="channel-pro-item">
            <div class="channel-pro-panels">
              <div class="pro-info">
                <div class="p-img"><a href="article.php?id=<?php echo $value['id']; ?>" title="华为 荣耀6 移动4G TD-LTE/TD-SCDMA/GSM（16GB存储）（黑色）套餐版" target="_blank" rel="nofollow">
                  <img width="222" alt="" src="<?php echo $path.'218_'.$value['picname']; ?>">
                </a></div>
                <div class="p-name">
                <a href="/product/1352.html#2342,75" title="华为 荣耀6 移动4G TD-LTE/TD-SCDMA/GSM（16GB存储）（黑色）套餐版" target="_blank">
                <?php echo $value['goods']; ?>
                  <span class="p-slogan">赠送豪华配件套装</span>
                </a></div>
                <div class="p-price"><em>¥</em><span><?php echo (int)$value['price']; ?></span></div>
                <?php
                switch($value['tag']){
                    case 0:
                    $str='';
                    break;
                    case 1:
                    $str='<i class="p-tag"><img src="./images/1382542518162.png"></i>';
                    break;
                    case 2:
                    $str='<i class="p-tag"><img src="./images/1382542488099.png"></i>';
                    break;
                    case 3:
                    $str='<i class="p-tag"><img src="./images/1384096319005.png"></i>';
                    break;
                }
                echo $str;
                ?>
              </div>
            </div>
          </li>
<?php } ?>
      </ul>
    </div>
  </div>
  <!-- 20130904-频道-楼层-end --> 
  
</div>
<div class="hr-20"></div>
<div class="layout"> 
  
  <!-- 20130904-频道-楼层-start -->
  
  <div class="channel-floor">
    <div class="h">
      <h2><a href="" title="手机" target="_blank">手机</a></h2>
      <em class="channel-subtitle">华为精品手机</em>
      <ul class="channel-nav">
        <li><a href="#" target="_blank">荣耀</a></li>
        <li><a href="#" target="_blank">畅玩</a></li>
        <li><a href="#" target="_blank">华为 Mate/P系列</a></li>
        <li><a href="#" target="_blank">G/Y系列</a></li>
        <li><a href="#" target="_blank">运营商合约</a></li>
      </ul>
    </div>
    <div class="b">
      <ul class="channel-pro-list">

<?php
//php遍历数据,手机栏目
$sqlw="select * from ".PREFIX."goods where typeid in(3,4,5) limit 0,8";
$resultw=myQuery($sqlw);
//var_dump($result);die();
//图片路径
$path="../public/uploads/";
foreach($resultw as $k=>$val){
$h=$k+4;
?>

<li id="channel-pro-1-<?php echo $h ?>" class="channel-pro-item">
            <div class="channel-pro-panels">
              <div class="pro-info">
                <div class="p-img"><a href="article.php?id=<?php echo $val['id']; ?>" title="华为 荣耀6 移动4G TD-LTE/TD-SCDMA/GSM（16GB存储）（黑色）套餐版" target="_blank" rel="nofollow">
                  <img width="222" alt="" src="<?php echo $path.'218_'.$val['picname']; ?>">
                </a></div>
                <div class="p-name">
                <a href="/product/1352.html#2342,75" title="华为 荣耀6 移动4G TD-LTE/TD-SCDMA/GSM（16GB存储）（黑色）套餐版" target="_blank">
                <?php echo $val['goods']; ?>
                  <span class="p-slogan">赠送豪华配件套装</span>
                </a></div>
                <div class="p-price"><em>¥</em><span><?php echo (int)$val['price']; ?></span></div>
                <?php
                switch($val['tag']){
                    case 0:
                    $str='';
                    break;
                    case 1:
                    $str='<i class="p-tag"><img src="./images/1382542518162.png"></i>';
                    break;
                    case 2:
                    $str='<i class="p-tag"><img src="./images/1382542488099.png"></i>';
                    break;
                    case 3:
                    $str='<i class="p-tag"><img src="./images/1384096319005.png"></i>';
                    break;
                }
                echo $str;
                ?>
              </div>
            </div>
          </li>
<?php } ?>


      </ul>
    </div>
  </div>
  <!-- 20130904-频道-楼层-end --> 

  <div class="hr-20"></div>
  
  <!-- 20130903-ad-762*132-start -->
  <div class="ad fl"><a target="_blank" href="#"><img src="images/20140825101353417.jpg" title="M1" style="float:none;" /></a></div>
  <!-- 20130903-ad-762*132-end --> 
  
</div>
<div class="hr-40"></div>




<!-- 20130902-关注-end -->

<textarea id="top-banner" class="hide">

	<!-- 顶部banner -->

	<div class="top-banner-max hide" id="top-banner-max">

		<div class="top-banner-img">

			<p><a title="荣耀7" target="_blank" href="#"><img src="images/20150707110552519.jpg" /></a></p>

			<a title="折叠" href="#" class="button-top-banner-min" id="top-banner-max-toggle">-</a>

		</div>

	</div>

	<div class="top-banner-min hide" id="top-banner-min">

		<div class="top-banner-img">

			<p><a title="荣耀7" target="_blank" href="#"><img src="images/2015070711055272.jpg" title="荣耀7" /></a><br /></p>

			<a title="展开" href="#" class="button-top-banner-max hide" id="top-banner-min-toggle">+</a>

			<a class="button-top-banner-close" href="#" title="关闭" id="top-banner-min-close" onclick="javascript:$('#top-banner-block').hide();">关闭</a>

		</div>

	</div>

	<!-- 顶部banner end -->

</textarea>


<?php include('footer.php'); ?>
</body>
</html>
<!--Hit 2015-07-08 18:39:50,1-->