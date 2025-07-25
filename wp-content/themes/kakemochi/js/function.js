/* aタグのスクロール停止&スムーススクロール
----------------------------------------------------------------------*/
$(function () {
	$('a[href^=#]:not(.colorbox)').on('click', function () { // #で始まるアンカーをクリックした場合に処理
		var w = $(window).width();
		var x = 768;
		// var offs = 0;
		// if (w <= x) {
		// 	offs = 0;
		// }
		var offs = $('#header').height();//遷移先が固定ヘッダーの下に隠れないようにするための位置調整
		
		var speed = 400; // スクロールの速度
		var href = $(this).attr('href'); // アンカーの値取得
		var target = $(href == "#" || href == "" ? 'html' : href); // 移動先を取得
		console.log(166,position);
		var position = target.offset().top - offs; // 移動先を数値で取得
		$('body,html').animate({
			scrollTop: position
		}, speed, 'swing'); // スムーススクロール
		return false;
	});
});


/* ページトップ
----------------------------------------------------------------------*/
$(function () {
	var topBtn = $('#page_top');
	topBtn.hide();
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) { //スクロールが100に達したらボタン表示
			topBtn.fadeIn();
		} else {
			topBtn.fadeOut();
		}
	});
	topBtn.click(function () { //スクロールしてトップ
		$('body,html').animate({
			scrollTop: 0
		}, 300);
		return false;
	});
});


/* matchHeight
----------------------------------------------------------------------*/
$(window).on('load resize', function () {
	var w = $(window).width();
	var x = 768;
	if (w > x) {
		$('#index #service_area ul li .txt').matchHeight();
		$('#service #service02 ul li').matchHeight();
		$('#content_marketing #area05 ul li .cont').matchHeight();
		$('#secretary #area03 .list > li').matchHeight();
		$('#secretary #area04 .list>li ').matchHeight();
		$('#secretary #area04 .list_in').matchHeight();
		$('#secretary #area08 ul li .price_box').matchHeight();
		$('#white-paper-download .download_list li .ttl').matchHeight();
		$('.new_expat_list li .txt').matchHeight();
		$('.new_attraction_list li').matchHeight();
		$('.new_feature_list li .txt_box').matchHeight(); $('.new_slider_column li .txt').matchHeight();
		$('.new_interview_list li .txt_box .txt').matchHeight();
		$('.new_multiple_area04_ul li').matchHeight();
		$('.new_multiple_area04_ul li .ttl').matchHeight();
		$('.netad_sns_list li').matchHeight();
		$('#indonesian-market-research .indonesian-market-research_before_after li').matchHeight();
		$('.indonesian-market-research_online_feature .box_in .box04_cont ul li').matchHeight();
		$('.indonesian-market-research_price_list01 li .txt_box .cap').matchHeight();
		$('.indonesian-market-research_price_list01 li .txt_box ul').matchHeight();
		$('.index_new_tenji_list li .tenji_list_ttl').matchHeight();
		$('.access_com_list .txt').matchHeight();
		$('.company_links li .txt').matchHeight();
		$('.thanks_int_ttl').matchHeight();
		$('.thanks_int_txt').matchHeight();
		$('#secretary #area10 .new_faq_box dl dt p').matchHeight();
		$('#secretary #area10 .new_faq_box dl dd p').matchHeight();
		$('.voice_inner .company_name').matchHeight();//スライドタイトル
		$('.voice_inner .voice_txt_area').matchHeight();//スライドテキスト
		$('.download_list li .txt').matchHeight();
		$('.remarketing_list p.companyformation_list01_ttl').matchHeight();
		$('.remarketing_note_txt p').matchHeight();
		$('.entry-into-indonesia-package-plan_planlist div dl dd p').matchHeight();
		//$('.voice_inner .voice_logo').matchHeight();
		$('.index_renew_footer_list li .txt').matchHeight();
	} else if (w < x) {
		$('.voice_inner .company_name').matchHeight();
		$('.voice_inner .voice_txt_area').matchHeight();
	}
});

/* アコーディオン
----------------------------------------------------------------------*/
$(function () {
	$(".aco_box").hide();
	$(".aco_btn").click(function () {
		$(this).next().slideToggle();
		$(this).toggleClass('open');
	});
});


/* toggleスマホメニュー
----------------------------------------------------------------------*/
$(function () {
	var btn = $('#btn_nav');

	btn.on('click', function () {
		$('#btn_nav,#nav_sp nav').toggleClass('active');
	});
});

$(function () {
	var btn = $('#btn_side');

	btn.on('click', function () {
		$('#btn_side,#side_article_sp #side_nav').toggleClass('active');
	});
});



/* nav アコーディオン
-------------------------------------------------------------------
$(function(){
	$('.dropdwn li').hover(function(){
		$("ul:not(:animated)", this).slideDown();
	}, function(){
		$("ul.dropdwn_menu",this).slideUp();
	});
});---*/

/* voice side_left
----------------------------------------------------------------------*/
$(function () {
	if ($("#voice .side_left").length) {
		let sideLeft = $("#voice .side_left");
		let voice = $("#voice");
		let target = sideLeft.offset().top;
		let voiceWidthAtStart = voice.outerWidth(); // 初期状態の #voice の幅を保持

		$(window).on("scroll", function () {
			let currentPos = $(window).scrollTop();
			if (currentPos > target) {
				sideLeft.addClass('fixed');
				// #voice の左端の位置を取得し、.side_left の left プロパティに設定
				let voiceLeft = voice.offset().left;
				sideLeft.css('left', voiceLeft + 'px');
				// 初期状態の #voice の幅に基づいて .side_left の幅を計算して設定
				sideLeft.css('width', voiceWidthAtStart * 0.25 + 'px');
			} else {
				sideLeft.removeClass('fixed');
				sideLeft.css('left', ''); // fixed クラスが外れたら left をクリア
				sideLeft.css('width', ''); // fixed クラスが外れたら width をクリア (CSS の設定に戻す)
			}
		});

		// リサイズ時にも位置と幅を調整
		$(window).on('resize', function () {
			if (sideLeft.hasClass('fixed')) {
				let voiceLeft = voice.offset().left;
				sideLeft.css('left', voiceLeft + 'px');
				// リサイズ時に #voice の幅を再取得して .side_left の幅を再計算
				let currentVoiceWidth = voice.outerWidth();
				sideLeft.css('width', currentVoiceWidth * 0.25 + 'px');
			}
		});
	}
});


/* new_nav_pc
----------------------------------------------------------------------*/

$(function () {

	$('.new_nav_in li').hover(function () {
		$(this).find('.drp_icon').addClass('on');

	}, function () {
		$(this).find('.drp_icon').removeClass('on');
	});

});

$(function () {

	$('.new_nav_in li.new_nav_2nd_1').hover(function () {
		$(this).find('.new_nav_2nd').addClass('on_t');
		$('.new_nav_in li.new_nav_2nd_2').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_3').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_4').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_5').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_6').find('.new_nav_2nd').removeClass('on_t');
	});

	$('.new_nav_in li.new_nav_2nd_2').hover(function () {
		$(this).find('.new_nav_2nd').addClass('on_t');
		$('.new_nav_in li.new_nav_2nd_1').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_3').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_4').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_5').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_6').find('.new_nav_2nd').removeClass('on_t');
	});

	$('.new_nav_in li.new_nav_2nd_3').hover(function () {
		$(this).find('.new_nav_2nd').addClass('on_t');
		$('.new_nav_in li.new_nav_2nd_1').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_2').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_4').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_5').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_6').find('.new_nav_2nd').removeClass('on_t');
	});

	$('.new_nav_in li.new_nav_2nd_4').hover(function () {
		$(this).find('.new_nav_2nd').addClass('on_t');
		$('.new_nav_in li.new_nav_2nd_1').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_2').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_3').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_5').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_6').find('.new_nav_2nd').removeClass('on_t');
	});

	$('.new_nav_in li.new_nav_2nd_5').hover(function () {
		$(this).find('.new_nav_2nd').addClass('on_t');
		$('.new_nav_in li.new_nav_2nd_1').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_2').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_3').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_4').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_6').find('.new_nav_2nd').removeClass('on_t');
	});

	$('.new_nav_in li.new_nav_2nd_6').hover(function () {
		$(this).find('.new_nav_2nd').addClass('on_t');
		$('.new_nav_in li.new_nav_2nd_1').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_2').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_3').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_4').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_5').find('.new_nav_2nd').removeClass('on_t');
	});

	$('.new_nav_in li:nth-child(7)').hover(function () {
		$('.new_nav_in li.new_nav_2nd_1').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_2').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_3').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_4').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_5').find('.new_nav_2nd').removeClass('on_t');
		$('.new_nav_in li.new_nav_2nd_6').find('.new_nav_2nd').removeClass('on_t');
	});
});


$(function () {
	$("main").hover(function () {
		$('.new_nav_in li').find('.new_nav_2nd').removeClass('on_t');
	});

	$(".new_contact_box").hover(function () {
		$('.new_nav_in li').find('.new_nav_2nd').removeClass('on_t');
	});
	$("#contact_box").hover(function () {
		$('.new_nav_in li').find('.new_nav_2nd').removeClass('on_t');
	});
	$("#about").hover(function () {
		$('.new_nav_in li').find('.new_nav_2nd').removeClass('on_t');
	});
	$("#footer").hover(function () {
		$('.new_nav_in li').find('.new_nav_2nd').removeClass('on_t');
	});
});



/*$(function() {
	
$('.new_nav_in li').hover(function() {
document.querySelector('.new_nav_2nd').animate(
  [
	{ opacity: 0 },
	{ opacity: 1 }
  ],
  {
	duration: 300,
	fill: 'forwards'
  }
);
});
});*/

/*$(function() {
 
  $('.new_nav_in li').hover(function() {

	  $(this).find('.new_nav_2nd').stop().slideDown();
		$(this).find('.drp_icon').addClass('on');
  }, function() {
 
	$(this).find('.new_nav_2nd').stop().slideUp();
	$(this).find('.drp_icon').removeClass('on');

 
  });
 
});*/

/* slick
----------------------------------------------------------------------*/
$(function () {
	$('.new_interview_list').slick({
		infinite: true,
		fade: false,
		autoplay: true,
		autoplaySpeed: 3000,
		speed: 700,
		dots: false,
		arrows: true,
		pauseOnHover: false,
		pauseOnFocus: false,
		centerMode: false,
		centerPadding: '10%',
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
			}
		}, {
			breakpoint: 500,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		}]
	});
});

$(function () {
	$('.new_slider_column').slick({
		infinite: true,
		fade: false,
		autoplay: true,
		autoplaySpeed: 3000,
		speed: 700,
		dots: false,
		arrows: true,
		pauseOnHover: false,
		pauseOnFocus: false,
		centerMode: false,
		centerPadding: '10%',
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
			}
		}, {
			breakpoint: 500,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		}]
	});
});

$(function () {
	$('.download_list_slider').slick({
		infinite: true,
		fade: false,
		autoplay: true,
		autoplaySpeed: 3000,
		speed: 700,
		dots: false,
		arrows: true,
		pauseOnHover: false,
		pauseOnFocus: false,
		centerMode: false,
		centerPadding: '10%',
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
			}
		}, {
			breakpoint: 500,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		}]
	});
});

$(function () {
	$('.new_voice_list').slick({
		autoplay: true,
		autoplaySpeed: 0,
		speed: 7000,
		cssEase: "linear",
		slidesToShow: 5,
		//slidesToShow: 3,
		swipe: false,
		arrows: false,
		pauseOnFocus: true,
		pauseOnHover: true,
		responsive: [{
			breakpoint: 1500,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 2,
			}
		}, {
			breakpoint: 1100,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 2,
			}
		}, {
			breakpoint: 800,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
			}
		}, {
			breakpoint: 500,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		}]
	});
});

/* colorbox
----------------------------------------------------------------------*/
$(function () {
	$(".colorbox").colorbox({
		inline: true,
		maxWidth: "90%",
		maxHeight: "90%",
		opacity: 0.7
	});
});


document.addEventListener('DOMContentLoaded', function () {
	const categorySelects = document.querySelectorAll('.search_select');

	categorySelects.forEach(categorySelect => {

		// 初期表示時にプレースホルダーのクラスを付与
		if (!categorySelect.value) {
			categorySelect.classList.add('placeholder');
		}

		categorySelect.addEventListener('change', function () {
			if (!this.value) {
				this.classList.add('placeholder');
			} else {
				this.classList.remove('placeholder');
			}
		});
	});
});