window.addEventListener('scroll',function(){
	if($(window).scrollTop() > 0){
		$('#header').css({
			'position':'fixed',
			'top':0,
			'left':0,
			'width':'100%',
			'background':'#fff',
			'zIndex':100,
		});
		var header_h = $('#header').height();
		$('#wrapper').css({
			'paddingTop':header_h
		});
		$('#new_nav_pc .new_nav_in .new_nav_box > li').css({
			'padding':'10px 0'
		});
		$('#new_nav_pc .on').addClass('nav_on');
		$('.side_left.fixed').css({
			'top':header_h
		});
		
	}else{
		$('#header').css({
			'position':'relative',
			'top':'auto',
			'left':'auto',
		});
		var header_h = $('#header').height();
		$('#wrapper').css({
			'paddingTop':0
		});
		$('#new_nav_pc .new_nav_in .new_nav_box > li').css({
			'padding':'30px 0'
		});
		$('#new_nav_pc .on').removeClass('nav_on');
	}
});

$(window).scroll(function () {
  if($(window).scrollTop() > 20) {
    $('#header').addClass('h_fixed');
  } else {
    $('#header').removeClass('h_fixed');
  }
});