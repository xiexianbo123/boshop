<!--BO FOOTER-->
<!--口号-20121025 -->

<div class="slogan">
  <ul>
    <li class="s1"><i></i>500强企业&nbsp;品质保证</li>
    <li class="s2"><i></i>7天退货&nbsp;15天换货</li>
    <li class="s3"><i></i>100元起免运费</li>
    <li class="s4"><i></i>448家维修网点&nbsp;全国联保</li>
  </ul>
</div>
<!--口号-end --> 

<!--服务-20121025 -->

<div class="service">
  <dl class="s1">
    <dt><i></i>帮助中心</dt>
    <dd>
      <ol>
        <li><a target="_blank" href="#">购物指南</a></li>
        <li><a target="_blank" href="#">配送方式</a></li>
        <li><a target="_blank" href="#">支付方式</a></li>
        <li><a target="_blank" href="#">常见问题</a></li>
      </ol>
    </dd>
  </dl>
  <dl class="s2">
    <dt><i></i>售后服务</dt>
    <dd>
      <ol>
        <li><a target="_blank" href="#">保修政策</a></li>
        <li><a target="_blank" href="#">退换货政策</a></li>
        <li><a target="_blank" href="#">退换货流程</a></li>
        <li><a target="_blank" href="#">手机寄修服务</a></li>
      </ol>
    </dd>
  </dl>
  <dl class="s3">
    <dt><i></i>技术支持</dt>
    <dd>
      <ol>
        <li><a target="_blank" href="#">售后网点</a></li>
        <li><a target="_blank" href="#">常见问题</a></li>
        <li><a target="_blank" href="#">产品手册</a></li>
        <li><a target="_blank" href="#">软件下载</a></li>
      </ol>
    </dd>
  </dl>
  <dl class="s4">
    <dt><i></i>关于商城</dt>
    <dd>
      <ol>
        <li><a target="_blank" href="#">公司介绍</a></li>
        <li><a target="_blank" href="#">华为商城简介</a></li>
        <li><a target="_blank" href="#">联系客服</a></li>
      </ol>
    </dd>
  </dl>
  <dl class="s5">
    <dt><i></i>关注我们</dt>
    <dd>
      <ol>
        <li><a class="sina" rel="nofollow" href="#" target="_blank">新浪微博</a></li>
        <li><a class="qq" rel="nofollow" href="#" target="_blank">腾讯微博</a></li>
        <li><a class="huafen" href="#" target="_blank">花粉社区</a></li>
        <li><a href="#" target="_blank">商城手机版</a></li>
      </ol>
    </dd>
  </dl>
</div>

<!--服务-end --> 

<!--确认对话框-->

<div id="ec_ui_confirm" class="popup-area popup-define-area hide">
  <div class="b">
    <p id="ec_ui_confirm_msg"></p>
    <div class="popup-button-area"><a id="ec_ui_confirm_yes" href="#" class="button-action-yes" title="是"><span>是</span></a><a id="ec_ui_confirm_no" href="#" class="button-action-no" title="否"><span>否</span></a></div>
  </div>
  <div class="f"><s class="icon-arrow-down"></s></div>
</div>

<!--提示对话框-->

<div id="ec_ui_tips" class="popup-area popup-define-area hide">
  <div class="b">
    <p id="ec_ui_tips_msg" class="tac"></p>
    <div class="popup-button-area tac"><a id="ec_ui_tips_yes" href="#" class="button-action-yes" title="确定"><span>确定</span></a></div>
  </div>
  <div class="f"><s class="icon-arrow-down"></s></div>
</div>

<!--在线客服-->

<div class="hungBar" id="tools-nav"> <a title="返回顶部" class="hungBar-top" href="javascript:window.scrollTo(0,0);" id="hungBar-top">返回顶部</a> <a id="tools-nav-survery" title="意见反馈" class="hungBar-feedback hide" href="#" onclick="ec.survery.open();">意见反馈</a> <a id="tools-nav-service-qq" title="QQ客服" class="hungBar-olcs-qq hide" href="#" target="_blank">QQ客服</a> <a id="tools-nav-service-robotim" href="#" title="在线客服" class="hungBar-olcs-web hide" target="_blank">在线客服</a> 
  
  <!--意见反馈box-->
  
  <div id="survery-box" class="form-feedback-area hide">
    <div class="h"> <a class="form-feedback-close" title="关闭" onclick="ec.survery.close();return false;" href="#"></a> </div>
    <div class="b">
      <div class="form-edit-area">
        <form onsubmit="return ec.survery.submit(this);" autocomplete="off">
          <div class="form-edit-table">
            <table cellspacing="0" cellpadding="0" border="0">
              <tbody>
                <tr>
                  <td><b>疑问类型：</b></td>
                </tr>
                <tr>
                  <td><select id="type" name="type">
                      <option>请选择疑问类型</option>
                      <option>服务类-发货</option>
                      <option>服务类-客服</option>
                      <option>服务类-售后</option>
                      <option>商品类-咨询</option>
                      <option>商品类-建议</option>
                      <option>商品类-质量</option>
                      <option>商品类-缺货</option>
                      <option>网站问题-不可用</option>
                      <option>网站问题-支付问题</option>
                      <option>网站问题-体验改进</option>
                      <option>网站问题-其他建议</option>
                      <option>活动类-帮助缺失或无效</option>
                      <option>活动类-活动设计优化建议</option>
                      <option>赞扬</option>
                    </select></td>
                </tr>
                <tr>
                  <td><b>您的问题或建议：</b><span id="errMsg"></span></td>
                </tr>
                <tr>
                  <td><textarea class="textarea" type="textarea" name="content" id="surveryContent"></textarea></td>
                </tr>
                <tr>
                  <td>您的联系方式：</td>
                </tr>
                <tr>
                  <td><input type="text" class="text" name="contact" id="surveryContact"></td>
                </tr>
                <tr>
                  <td><div class="fl">
                      <input type="text" name="code" id="surveryVerify" class="verify vam" maxlength="4">
                      &nbsp;&nbsp;<img id="surveryVerifyImg" onclick="ec.survery.reloadCode()" class="vam" alt="验证码">&nbsp;&nbsp;&nbsp;&nbsp;<span class="vam"><a onclick="ec.survery.reloadCode();" href="#" class="u">看不清，换一张</a></span></div>
                    <div class="fr">
                      <input type="submit" value="" class="button-action-submit-3">
                    </div></td>
                </tr>
              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="globleParameter" class="hide" context="" stylePath="" scriptPath="" imagePath="http://res.vmall.com/20150605/images" mediaPath="http://res.vmall.com/pimages/" ></div>

<!--底部 -->

<footer class="footer"> 
  
  <!-- 20130902-底部-友情链接-start -->
  
  <div class="footer-otherLink">
    <p>热门<a href="#" target="_blank">华为手机</a>：<span style="line-height:1.5;">| <a href="#" target="_blank">荣耀7</a> | <a href="#" target="_blank">华为P8</a> | <a href="#" target="_blank">荣耀畅玩4C</a> | <a href="#" target="_blank">荣耀X2</a> | <a href="#" target="_blank">荣耀6 Plus</a> | <a href="#" target="_blank" textvalue="Ascend Mate 7">Ascend Mate7</a> | <a href="#" target="_blank">荣耀6</a> | <a href="#" target="_blank">荣耀畅玩4X</a> | <a href="#" target="_blank">华为GX1</a> | <a href="#" target="_blank">华为P7</a> | <a href="#" target="_blank">华为G7</a> |  <a href="#" target="_blank">荣耀3C畅玩版</a> | <a href="#" target="_blank">荣耀3X Pro</a> | <a href="#" target="_blank">麦芒C199</a> | <a href="#" target="_blank">荣耀X1</a> | </span></p><p><br /></p>
  </div>
  <div class="footer-warrant-area">
    <p>Copyright © 2011-2015  华为软件技术有限公司  版权所有  保留一切权利  苏B2-20130048号 | 苏ICP备09062682号-9 </p>
    <p><a target="_blank" href="#">网络文化经营许可证苏网文[2012]0401-019号</a></p>
    <p class="footer-warrant-img"> <a href="#" rel="nofollow" target="_blank"><img title="经营性网站" alt="经营性网站" src="images/certificate_01_112_40.png" /></a> <a title="诚信网站" href="#" rel="nofollow" target="_blank"><img alt="诚信网站" src="images/certificate_02_112_40.png" /></a> <a title="诚信网站" href="#" rel="nofollow" target="_blank"><img alt="诚信网站" src="images/certificate_03_112_40.png" /></a></p>
  </div>
  <!--授权结束 --><
</footer>