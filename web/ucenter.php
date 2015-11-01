<?php
require('../public/common.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-store">
<title>用户中心</title>
<link href="./css/user/zh-cn_css.css" rel="stylesheet" type="text/css">
<link href="./css/user/hwDialog.css" rel="stylesheet" type="text/css">

</head>
<body screen_capture_injected="true">
<div class="floatBoxBg" id="fb15051"></div>
<div class="floatBox" id="15051">
  <div class="title" id="t15051">
    <h4></h4>
    <span class="closeDialog" id="c15051">X</span></div>
  <div class="content" style="height: 470px; "></div>
</div>
<div class="floatBoxBg" id="fb1826"></div>
<div class="floatBox" id="1826">
  <div class="title" id="t1826">
    <h4></h4>
    <span class="closeDialog" id="c1826">X</span></div>
  <div class="content" style="height: 270px; "></div>
</div>
<div class="floatBoxBg" id="fb59223"></div>
<div class="floatBox" id="59223">
  <div class="title" id="t59223">
    <h4></h4>
    <span class="closeDialog" id="c59223">X</span></div>
  <div class="content" style="height: 270px; "></div>
</div>
<div class="floatBoxBg" id="fb30733"></div>
<div class="floatBox" id="30733">
  <div class="title" id="t30733">
    <h4></h4>
    <span class="closeDialog" id="c30733">X</span></div>
  <div class="content" style="height: 270px; "></div>
</div>
<div class="floatBoxBg" id="fb18292"></div>
<div class="floatBox" id="18292">
  <div class="title" id="t18292">
    <h4></h4>
    <span class="closeDialog" id="c18292">X</span></div>
  <div class="content" style="height: 80px; "></div>
</div>
<div class="floatBoxBg" id="fb91433"></div>
<div class="floatBox" id="91433">
  <div class="title" id="t91433">
    <h4></h4>
    <span class="closeDialog" id="c91433">X</span></div>
  <div class="content" style="height: 70px; "></div>
</div>
<div class="floatBoxBg" id="fb56024"></div>
<div class="floatBox" id="56024">
  <div class="title" id="t56024">
    <h4></h4>
    <span class="closeDialog" id="c56024">X</span></div>
  <div class="content" style="height: 70px; "></div>
</div>
<div class="uc"> 
  <!-- 头部  -->
  <div class="uc_head">
    <div class="uc_head_middle">
      <div class="uc_head_middle_left">我的华为帐号</div>
      <div class="uc_head_middle_right"><a class="logout_c" href="#"><?php echo  $_SESSION['user']['username'] ?></a> | <a class="logout_c" href="useraction.php?a=logout">退出</a></div>
    </div>
  </div>
  <?php
$path='../public/user/';

$sql="select * from ".PREFIX."users where id={$_SESSION['user']['id']}";
$result=myQuery($sql);
//echo $sql;die;
?>
  <div class="uc_body">
    <div class="uc_body_form">
      <dl>
        <dd class="dd_left" style="text-align: center; position: relative;"> <img alt="头像" id="headPic" src="<?php echo $path.$result['0']['mypic']; ?>">
          <div id="uploadHead">上传头像</div>
        </dd>
        <dd>
          <form action="useraction.php?a=update" method="post" enctype="multipart/form-data">
          <table style="width:700px;">
            <tbody>
              <tr>
                <td class="cl_left">华为帐号：</td>
                <td><div class="dv_cell_left"><?php echo $result['0']['username']; ?></div></td>
              </tr>
              <tr>
                <td class="cl_left">真实姓名：</td>
                <td><div class="dv_cell_left"><input type="text" name="name" value="<?php echo $result['0']['name']; ?>"></div></td>
              </tr>
              <tr>
                <td class="cl_left">上传头像：</td>
                <td><div class="dv_cell_left"><input type="file" name="mypic" value=""></div></td>
                <input type='hidden' name="oldmypic" value='$result['0']['mypic']'>
              </tr>
              <tr>
                <td class="cl_left">性别：</td>
                <td>
                  <input type="radio" name="sex" id="gd_mile" style="margin-left:10px;" value="1" <?php echo ($result['0']['sex']==1)?'checked':''; ?> >
                  <label for="gd_mile">男</label>
                  <input type="radio" name="sex" id="gd_femile" style="margin-left:10px;" value="0" <?php echo ($result['0']['sex']==0)?'checked':''; ?> >
                  <label for="gd_femile">女</label></td>
              </tr>
              <tr>
                <td class="cl_left">地址：</td>
                <td><div class="dv_cell_left"><input type="text" name="address" value="<?php echo $result['0']['address']; ?>"></div></td>
              </tr>
              <tr>
                <td class="cl_left">邮编：</td>
                <td><div class="dv_cell_left"><input type="text" name="code" value="<?php echo $result['0']['code']; ?>"></div></td>
              </tr>
              <tr>
                <td class="cl_left">电话：</td>
                <td><div class="dv_cell_left"><input type="text" name="phone" value="<?php echo $result['0']['phone']; ?>"></div></td>
              </tr>
              <tr>
                <td class="cl_left">Email：</td>
                <td><div class="dv_cell_left"><input type="text" name="email" value="<?php echo $result['0']['email']; ?>"></div></td>
              </tr>
              <tr>
                <td colspan="2" align="left">
                <input type="submit" value="保存" class="btn_midefy">
                <input type="reset" value="取消" class="btn_midefy" style="margin-left:20px;">
                  </td>
              </tr>
            </tbody>
          </table>
          </form>
        </dd>
      </dl>
      <div class="clearboth"></div>
      <div class="rediractPerBusniss">
        <h3>可用服务</h3>
        <div> <a href="./index.php">华为官网</a> <a href="./index.php">华为荣耀</a> <a href="./index.php">华为商城</a> <a href="#">应用市场</a> <a href="#">花粉俱乐部</a> <a href="#">华为云服务</a> <a href="#">开发者联盟</a> <a href="#">华为网盘</a> </div>
      </div>
    </div>
  </div>
  <div style="display:none;">
    <div id="dialog_show" style="display:none;"></div>
    <div id="dialog_content" style="display:none;"> <b style="margin:20px 80px;display:block;color:green;" id="dialog_content_state"></b> </div>
    <div id="dialog_show1" style="display:none;"></div>
    <div id="dialog_content1" style="display:none;"> <b style="margin:20px 80px;display:block;color:green;" id="dialog_content_state1"></b> </div>
    <div id="mail_dialog_show" style="display:none;"></div>
    <div id="mail_dialog_content" style="display:none;"></div>
    <div id="mobile_dialog_show" style="display:none;"></div>
    <div id="secMobile_dialog_show" style="display:none;"></div>
    <div id="upload_dialog_show" style="display:none;"></div>
    <div id="confirm_agree_dialog_show" style="display:none;"></div>
    <div id="confirm_agree_dialog_content" style="display:none;">
      <div class="confirm_agree_table">
        <table>
          <tbody>
            <tr>
              <td><span>用户须知：</span>
                <p> 华为商城、花粉俱乐部、应用市场、Cloud+、华为网盘、华为开发者联盟等华为云服务及第3方集成华为帐号的游戏，将需要使用新的华为帐号登录，原帐号不可再使用。 </p></td>
            </tr>
            <tr>
              <td valign="middle"><input type="checkbox" id="agreeChange" onclick="isCheckAgree(this)" checked="checked">
                <label for="agreeChange">我同意</label></td>
            </tr>
            <tr>
              <td align="center"><input type="button" value="取消" class="btn_midefy_cancel" onclick="toCancelChangeAccount()">
                <input type="button" name="btn_name" value="同意" class="btn_midefy" onclick="toAgreeChangeAccount()"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_bottom"> <a target="blank" href="#">《华为帐号服务条款、华为隐私政策》</a> <br>
      Copyright&nbsp;©&nbsp;2011-2013&nbsp;&nbsp;华为软件技术有限公司&nbsp;&nbsp;版权所有&nbsp;&nbsp;保留一切权利&nbsp;&nbsp;苏B2-20070200号&nbsp;|&nbsp;苏ICP备09062682号-9 </div>
  </div>
</div>
</body>
</html>