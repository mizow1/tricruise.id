window.addEventListener('load', function() {
	if($('.main_img').length){
		main_img_fit();
		$(window).resize(function(){
			main_img_fit();
		});
	}
})
function main_img_fit(){
		if($('.main_img img').height()<470){
			$('.main_img').css({
				'height':'auto'
			});
		}else{
			$('.main_img').css({
				'height':'470px'
			});
			let offset = ($('.main_img').height()-$('.main_img img').height())/2;
			$('.main_img img').css({
				'marginTop':offset
			});
		}
}