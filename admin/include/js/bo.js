var objArr = document.getElementById('header-menu').childNodes;
/*
for(a in objArr){
	document.write(a+' '+objArr[a]+'<br />');
}
*/
//选择标签都会默认多选一些text对象
function show(obj){
	for(i=0;i<objArr.length;i++){
		if(i == obj){
			objArr[i].id='menuon';	
		}else{
			objArr[i].id='';
		}
	}
}