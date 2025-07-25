window.addEventListener('load',function(){
	var device = device_judge();
});

window.addEventListener('resize',function(){
	var device = device_judge();
});

function device_judge(){
	var window_width = $(window).width();
	if(window_width > 768){
		var main_width = $('#textpage').attr('w_order'); 
		$('#textpage').css({
			'width':main_width+'%',
			'margin':'0 auto',
		});
	}else{
		$('#textpage').css({
			'width':'auto',
		});
	}

}
