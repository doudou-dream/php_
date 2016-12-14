$(document).ready(function() {

//文本框
	$('input[type=text]').focus(function() {
		
		    var obj=$(this);
var store = obj.val();
		if (store == this.defaultValue) {
			obj.val("");
		}
	}).blur(function() {
		var obj = $(this);
		var stre = obj.val();
		if (stre.length <=0 ) {
			obj.val(this.defaultValue);
		}
	});

	//菜单div
	var div1 = document.getElementsByClassName('imgShow');
	var div2 = document.getElementsByClassName('divDisplay');
	var timer = null;
	var i=0;
	for(i=0;i<div1.length;i++){
			name(div1[i],div2[i]);
		}
	function name(div1,div2) {
		div1.onmouseover = function () {
			clearTimeout(timer);
			div2.style.display = 'block';
		}
		div1.onmouseout = function () {
			timer = setTimeout(function(){div2.style.display = 'none'}, 100);
		}
		div2.onmouseover = function(){
			clearTimeout(timer);
		}
		div2.onmouseout = function(){
			timer = setTimeout(function(){div2.style.display = 'none'}, 100);
		}	
	}

	//标题
	$('.pUserTitle a').mouseover(function() {
		this.style.color='red';
		// alert('red')
	}).mouseout(function() {
		this.style.color='#000';
	});

	//菜单内部a
	$('.divDisplay p a').mouseover(function() {
		this.style.color='#000';
		// alert('red')
	}).mouseout(function() {
		this.style.color='#FFFFFF';
	});
	
});