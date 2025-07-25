window.addEventListener('load',function(){
	footer_form();
});

$(window).on('resize', function() {
	footer_form();
});

function footer_form(){
	if($('.side_left').is(':visible')||$('#nav_sp').is(':visible')){
		$('footer .footer_new_l').slideUp();
		$('.footer_new_r').css({
			'width':'100%',
			'maxWidth':'940px',
			'margin':'0 auto'
		});
	}else{
			$('footer .footer_new_l').slideDown();
			$('.footer_new_r').css({
				'width':'65%'
			});
	}

}