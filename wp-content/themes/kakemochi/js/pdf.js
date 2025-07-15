window.addEventListener('load',function(){
	var w_height = $(window).height();
	var pdf_height = w_height*0.8;
	$('.pdf_window').css({
		'height':pdf_height
	});
});