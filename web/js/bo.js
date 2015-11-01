//下面为验证码动态加载样式
var obj = window.document.getElementById('randomCodeImg');
function bobo(){
  obj.src='yzm.php?' + Math.round(Math.random()*1000);
}
