<?php
/*
Template Name: トップページ
*/
?>

<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
<?php get_template_part('menu'); ?>
<?php 
if(get_the_post_thumbnail_url($post->ID, "full")){
	$mv = get_the_post_thumbnail_url($post->ID, "full");
	$mv_css =  ' style="background:url('.$mv.')"';
}
?>		
		
		<main id="index_new">
			<article>
				<section class="index_new_visual area">
					<div class="inner1000">
						<div class="txt_box">
							<p class="visual_ttl01 orange">福岡本社</p>
							<h2 class="visual_ttl02">インドネシアに特化<br>進出支援とマーケティング</h2>
							<p class="visual_txt">カケモチは、<br>
							日本語が話せるインドネシア人従業員と共に<br>
							日系企業様のインドネシア進出を支援している<br>
							多国籍企業です。</p>
						</div>
						<div class="online_visual">
							<p class="online_visual_img"><a href="<?php echo home_url(); ?>/member/free-seminar-on-expanding-into-indonesia/"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/semi_visual.png" alt="無料セミナー　初めてのインドネシア進出"></a></p>
						</div>
					</div>
				</section>
				<!-- index_new_visual -->
			  
				<section class="index_new_service_img area bg01">
					<div class="inner1000">
						<p class="img">
							<img src="<?php echo get_theme_file_uri(); ?>/img/index_new/service_img.png" alt="" class="pc">
							<img src="<?php echo get_theme_file_uri(); ?>/img/index_new/service_img_sp.png" alt="" class="sp">
						</p>
					</div>
				</section>
				<!-- index_new_service_img -->
			  
				<section class="index_new_service area">
					<div class="inner1000">
						<h3 class="new_ttl01">インドネシアへの<span class="orange">進出支援</span></h3>
						<ul class="new_service_list">
							<li>
								<div class="txt_box">
									<div class="txt_box_in">
										<h4 class="new_ttl02">インドネシア現地視察</h4>
										<p class="txt">インドネシア市場の有望性や成長性を多くの記事やテレビなどで見かけます。ところが、どんなに多くの情報を仕入れても、実際にインドネシアを訪れて現地の熱量を肌で感じないとわからない部分もたくさんあります。そういった現地視察をコーディネートさせていただきます。</p>
										<p class="new_btn01"><a href="<?php echo home_url(); ?>/overseas-expansion/inspection-tour-to-indonesia/">詳しく見る</a></p>
									</div>
								</div>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/service01.png" alt=""></p>
							</li>
							<li class="reverse bg01">
								<div class="txt_box">
									<div class="txt_box_in">
										<h4 class="new_ttl02">インドネシア市場調査</h4>
										<p class="txt">大手の調査会社にインドネシアの市場調査をしてもらうと、100ページ以上の分厚いレポートに対して100万円や150万円といった金額を請求されます。そういったレポートを読んだだけでは分からない、インドネシアの市場調査方法を弊社ではご提案しています。</p>
										<p class="new_btn01"><a href="<?php echo home_url(); ?>/overseas-expansion/indonesian-market-research/">詳しく見る</a></p>
									</div>
								</div>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/service02.png" alt=""></p>
							</li>
							<li>
								<div class="txt_box">
									<div class="txt_box_in">
										<h4 class="new_ttl02">インドネシア仮想進出</h4>
										<p class="txt">仮想の進出と聞くと、その言葉の意味どおりバーチャル進出なのかと勘違いされる方がいらっしゃいます。そうではなく、弊社では越境ECとWebのマーケティングを活用して、インドネシアに支社を立てる前に貴社商品のニーズを探ることをご提案しております。</p>
										<p class="new_btn01"><a href="<?php echo home_url(); ?>/overseas-expansion/expand-indonesia/">詳しく見る</a></p>
									</div>
								</div>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/service03.png" alt=""></p>
							</li>
							<li class="reverse bg01">
								<div class="txt_box">
									<div class="txt_box_in">
										<h4 class="new_ttl02">インドネシア越境EC</h4>
										<p class="txt">越境ECと聞くと、中国、韓国、台湾といった国々がまず頭に思い浮かぶ人が多いです。多くの人がまず最初に思い浮かべるということは、それだけ競争も激しいです。その競争を避けて、東南アジア最大の市場であるインドネシアへの越境ECを弊社ではご提案しております。</p>
										<p class="new_btn01"><a href="<?php echo home_url(); ?>/overseas-expansion/cross-border-e-commerce/">詳しく見る</a></p>
									</div>
								</div>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/service04.png" alt=""></p>
							</li>
							<li>
								<div class="txt_box">
									<div class="txt_box_in">
										<h4 class="new_ttl02">補助金や助成金申請</h4>
										<p class="txt">海外進出を実行するにあたり、補助金や助成金が獲得できるのであればそれを使う方が自社のリスクを軽減できます。とは言え補助金や助成金の申請は慣れていないと面倒な手続きですので、申請に関わる準備について弊社の方でトータルで支援させていただきます。</p>
										<p class="new_btn01"><a href="<?php echo home_url(); ?>/overseas-expansion/government-subsidy/">詳しく見る</a></p>
									</div>
								</div>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/service05.png" alt=""></p>
							</li>
							<li class="reverse bg01">
								<div class="txt_box">
									<div class="txt_box_in">
										<h4 class="new_ttl02">会社設立や登記申請</h4>
										<p class="txt">インドネシア進出にあたり実際に会社を設立するとなると、現地に赴いて様々な資料を準備する必要があります。インドネシアの法律や役所対応は日本と比較して複雑なところがあるため、効率的に会社設立や登記ができるようにサポートさせていただきます。</p>
										<p class="new_btn01"><a href="#">詳しく見る</a></p>
									</div>
								</div>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/service06.png" alt=""></p>
							</li>
						</ul>
					</div>
				</section>
				<!-- index_new_service -->
			  
				<section class="index_new_partner area">
					<div class="inner1000">
						<h3 class="new_ttl01">ビジネスパートナー</h3>
						<ul class="new_partner_list">
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/partner01.png" alt="MGL"></li>
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/partner02.png" alt="KEIKO AGENCY"></li>
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/partner03.png" alt="SAQLABO INDONESIA"></li>
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/partner04.png" alt="TOKYO BELLE"></li>
						</ul>
					</div>
				</section>
				<!-- index_new_partner -->
			  
				<section class="index_new_expat area">
					<div class="inner1000">
						<h3 class="new_ttl01">インドネシア<span class="orange">駐在員様支援</span></h3>
						<ul class="new_expat_list">
							<li>
								<p class="ttl"><span class="orange">●</span>オンライン秘書サービス</p>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/expat01.png" alt=""></p>
								<p class="txt">マネジメントの管掌範囲が広いインドネシア駐在員様向けのオンライン秘書サービスです。依頼も納品対応も全て日本語で対応できます。</p>
								<p class="new_btn01 center"><a href="<?php echo home_url(); ?>/service/online-secretary/">詳しく見る</a></p>
							</li>
							<li>
								<p class="ttl"><span class="orange">●</span>インドネシアの情報収集</p>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/expat02.png" alt=""></p>
								<p class="txt">インドネシアでビジネスを行う上で重要なトピックに厳選し、様々なニュースをお届けしています。まずはニュースレターの登録をお願いします。</p>
								<p class="new_btn01 center"><a href="<?php echo home_url(); ?>/expatriate/newsletter/">詳しく見る</a></p>
							</li>
							<li>
								<p class="ttl"><span class="orange">●</span>VISA申請サポート</p>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/expat03.png" alt=""></p>
								<p class="txt">駐在員様向けのビザ申請・取得代行を行っています。ビザ申請に加えて、現地の役所や警察署への届出など入国後の作業も代行しています。</p>
								<p class="new_btn01 center"><a href="#">詳しく見る</a></p>
							</li>
						</ul>
					</div>
				</section>
				<!-- index_new_expat -->
			  
				<section class="index_new_media area">
					<div class="inner1000">
						<h3 class="new_ttl01"><span class="orange">メディア紹介</span>実績</h3>
						<div class="media_press_box">
								<ul>
									<li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACCAQAAAADUZ8jyAAAAAnRSTlMAAHaTzTgAAAAcSURBVFjD7cEBDQAAAMKg909tDjegAAAAAIAPAxPOAAH82JXmAAAAAElFTkSuQmCC" alt="" data-src="<?php echo get_theme_file_uri(); ?>/img/index/media08.png" decoding="async" class="lazyload"><noscript><img src="<?php echo get_theme_file_uri(); ?>/img/index/media08.png" alt="" data-eio="l"></noscript></li>
									<li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACCAQAAAADUZ8jyAAAAAnRSTlMAAHaTzTgAAAAcSURBVFjD7cEBDQAAAMKg909tDjegAAAAAIAPAxPOAAH82JXmAAAAAElFTkSuQmCC" alt="" data-src="<?php echo get_theme_file_uri(); ?>/img/index/media07.png" decoding="async" class="lazyload"><noscript><img src="<?php echo get_theme_file_uri(); ?>/img/index/media07.png" alt="" data-eio="l"></noscript></li>
									<li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACCAQAAAADUZ8jyAAAAAnRSTlMAAHaTzTgAAAAcSURBVFjD7cEBDQAAAMKg909tDjegAAAAAIAPAxPOAAH82JXmAAAAAElFTkSuQmCC" alt="" data-src="<?php echo get_theme_file_uri(); ?>/img/index/media11.png" decoding="async" class="lazyload"><noscript><img src="<?php echo get_theme_file_uri(); ?>/img/index/media11.png" alt="" data-eio="l"></noscript></li>
									<li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACCAQAAAADUZ8jyAAAAAnRSTlMAAHaTzTgAAAAcSURBVFjD7cEBDQAAAMKg909tDjegAAAAAIAPAxPOAAH82JXmAAAAAElFTkSuQmCC" alt="" data-src="<?php echo get_theme_file_uri(); ?>/img/index/media09.png" decoding="async" class="lazyload"><noscript><img src="<?php echo get_theme_file_uri(); ?>/img/index/media09.png" alt="" data-eio="l"></noscript></li>
									<li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACCAQAAAADUZ8jyAAAAAnRSTlMAAHaTzTgAAAAcSURBVFjD7cEBDQAAAMKg909tDjegAAAAAIAPAxPOAAH82JXmAAAAAElFTkSuQmCC" alt="" data-src="<?php echo get_theme_file_uri(); ?>/img/index/media10.png" decoding="async" class="lazyload"><noscript><img src="<?php echo get_theme_file_uri(); ?>/img/index/media10.png" alt="" data-eio="l"></noscript></li>
									<li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACCAQAAAADUZ8jyAAAAAnRSTlMAAHaTzTgAAAAcSURBVFjD7cEBDQAAAMKg909tDjegAAAAAIAPAxPOAAH82JXmAAAAAElFTkSuQmCC" alt="" data-src="<?php echo get_theme_file_uri(); ?>/img/index/media12.png" decoding="async" class="lazyload"><noscript><img src="<?php echo get_theme_file_uri(); ?>/img/index/media12.png" alt="" data-eio="l"></noscript></li>
									
									<li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACCAQAAAADUZ8jyAAAAAnRSTlMAAHaTzTgAAAAcSURBVFjD7cEBDQAAAMKg909tDjegAAAAAIAPAxPOAAH82JXmAAAAAElFTkSuQmCC" alt="" data-src="<?php echo get_theme_file_uri(); ?>/img/index/media01.png" decoding="async" class="lazyload"><noscript><img src="<?php echo get_theme_file_uri(); ?>/img/index/media01.png" alt="" data-eio="l"></noscript></li>
									<li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACCAQAAAADUZ8jyAAAAAnRSTlMAAHaTzTgAAAAcSURBVFjD7cEBDQAAAMKg909tDjegAAAAAIAPAxPOAAH82JXmAAAAAElFTkSuQmCC" alt="" data-src="<?php echo get_theme_file_uri(); ?>/img/index/media02.png" decoding="async" class="lazyload"><noscript><img src="<?php echo get_theme_file_uri(); ?>/img/index/media02.png" alt="" data-eio="l"></noscript></li>
									<li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACCAQAAAADUZ8jyAAAAAnRSTlMAAHaTzTgAAAAcSURBVFjD7cEBDQAAAMKg909tDjegAAAAAIAPAxPOAAH82JXmAAAAAElFTkSuQmCC" alt="" data-src="<?php echo get_theme_file_uri(); ?>/img/index/media03.png" decoding="async" class="lazyload"><noscript><img src="<?php echo get_theme_file_uri(); ?>/img/index/media03.png" alt="" data-eio="l"></noscript></li>
									<li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACCAQAAAADUZ8jyAAAAAnRSTlMAAHaTzTgAAAAcSURBVFjD7cEBDQAAAMKg909tDjegAAAAAIAPAxPOAAH82JXmAAAAAElFTkSuQmCC" alt="" data-src="<?php echo get_theme_file_uri(); ?>/img/index/media04.png" decoding="async" class="lazyload"><noscript><img src="<?php echo get_theme_file_uri(); ?>/img/index/media04.png" alt="" data-eio="l"></noscript></li>
									<li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACCAQAAAADUZ8jyAAAAAnRSTlMAAHaTzTgAAAAcSURBVFjD7cEBDQAAAMKg909tDjegAAAAAIAPAxPOAAH82JXmAAAAAElFTkSuQmCC" alt="" data-src="<?php echo get_theme_file_uri(); ?>/img/index/media05.png" decoding="async" class="lazyload"><noscript><img src="<?php echo get_theme_file_uri(); ?>/img/index/media05.png" alt="" data-eio="l"></noscript></li>
									<li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACCAQAAAADUZ8jyAAAAAnRSTlMAAHaTzTgAAAAcSURBVFjD7cEBDQAAAMKg909tDjegAAAAAIAPAxPOAAH82JXmAAAAAElFTkSuQmCC" alt="" data-src="<?php echo get_theme_file_uri(); ?>/img/index/media06.png" decoding="async" class="lazyload"><noscript><img src="<?php echo get_theme_file_uri(); ?>/img/index/media06.png" alt="" data-eio="l"></noscript></li>
									
								</ul>
							</div>
						
					</div>
				</section>
				<!-- index_new_media -->
			  
				<section class="index_new_interview area bg02">
					<div class="inner1000">
						<h3 class="new_ttl01"><span class="orange">注目の企業様</span>へのインタビュー</h3>
						<ul class="new_interview_list new_interview_list_up">
							<li>
								<p class="img"><img src="https://tricruise.id/wp/wp-content/uploads/2022/10/tokobelle_visual.jpg" alt="TOKYO BELLE"></p>
								<div class="txt_box">
									<p class="ttl">TOKYO BELLE様</p>
									<p class="txt">なぜスラバヤで美容サロン？グロースから売却までを経験した、元金融ビジネスマンから見るインドネシアの美容業界</p>
									<p class="new_btn01 center"><a href="<?php echo home_url(); ?>/interview/tokyobelle/">続きを読む</a></p>
								</div>
							</li>
							<li>
								<p class="img"><img src="https://tricruise.id/wp/wp-content/uploads/2022/09/beautynesia_visual.jpg" alt="Beautynesia"></p>
								<div class="txt_box">
									<p class="ttl">Beautynesia様</p>
									<p class="txt">インドネシアの財閥グループに参画したBeautynesiaの強みとインフルエンサーマーケティングの秘訣</p>
									<p class="new_btn01 center"><a href="<?php echo home_url(); ?>/interview/beautynesia/">続きを読む</a></p>
								</div>
							</li>
							<li>
								<p class="img"><img src="https://tricruise.id/wp/wp-content/uploads/2022/09/main-visual-glico.jpg" alt="グリコ"></p>
								<div class="txt_box">
									<p class="ttl">グリコ様</p>
									<p class="txt">グリコはどのようにインドネシアのお菓子市場でマーケティングを実践してきたのか</p>
									<p class="new_btn01 center"><a href="<?php echo home_url(); ?>/interview/glico/">続きを読む</a></p>
								</div>
							</li>
							
						</ul>
						<!--<p class="new_btn01 center size_l"><a href="#">すべて見る</a></p>-->
					</div>
				</section>
				<!-- index_new_interview -->
			  
				<!--<section class="index_new_voice area">
					<div class="inner1000">
						<h3 class="new_ttl01">お客様の声</h3>
						<ul class="new_voice_list">
							<li>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/interview01.png" alt=""></p>
								<div class="txt_box">
									<p class="logo"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/voice01.png" alt=""></p>
									<p class="name">〇〇〇〇株式会社</p>
									<div class="sp hover_box_sp">
										<div class="txt_in">
											<p class="txt01">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
											<p class="txt02">課題／〇〇〇〇が短縮できない</p>
										</div>
										<p class="new_btn01 center"><a href="#">続きを読む</a></p>
									</div>
								</div>
								<div class="hover_box">
									<div class="txt_in">
										<p class="txt01">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
										<p class="txt02">課題／〇〇〇〇が短縮できない</p>
									</div>
									<p class="new_btn01 center"><a href="#">続きを読む</a></p>
								</div>
							</li>
							<li>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/interview02.png" alt=""></p>
								<div class="txt_box">
									<p class="logo"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/voice02.png" alt=""></p>
									<p class="name">〇〇〇〇株式会社〇〇〇〇株式会社〇〇〇〇株式会社</p>
									<div class="sp hover_box_sp">
										<div class="txt_in">
											<p class="txt01">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
											<p class="txt02">課題／〇〇〇〇が短縮できない</p>
										</div>
										<p class="new_btn01 center"><a href="#">続きを読む</a></p>
									</div>
								</div>
								<div class="hover_box">
									<div class="txt_in">
										<p class="txt01">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
										<p class="txt02">課題／〇〇〇〇が短縮できない</p>
									</div>
									<p class="new_btn01 center"><a href="#">続きを読む</a></p>
								</div>
							</li>
							<li>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/interview03.png" alt=""></p>
								<div class="txt_box">
									<p class="logo"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/voice03.png" alt=""></p>
									<p class="name">〇〇〇〇株式会社</p>
									<div class="sp hover_box_sp">
										<div class="txt_in">
											<p class="txt01">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
											<p class="txt02">課題／〇〇〇〇が短縮できない</p>
										</div>
										<p class="new_btn01 center"><a href="#">続きを読む</a></p>
									</div>
								</div>
								<div class="hover_box">
									<div class="txt_in">
										<p class="txt01">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
										<p class="txt02">課題／〇〇〇〇が短縮できない</p>
									</div>
									<p class="new_btn01 center"><a href="#">続きを読む</a></p>
								</div>
							</li>
							<li>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/interview01.png" alt=""></p>
								<div class="txt_box">
									<p class="logo"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/voice01.png" alt=""></p>
									<p class="name">〇〇〇〇株式会社</p>
									<div class="sp hover_box_sp">
										<div class="txt_in">
											<p class="txt01">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
											<p class="txt02">課題／〇〇〇〇が短縮できない</p>
										</div>
										<p class="new_btn01 center"><a href="#">続きを読む</a></p>
									</div>
								</div>
								<div class="hover_box">
									<div class="txt_in">
										<p class="txt01">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
										<p class="txt02">課題／〇〇〇〇が短縮できない</p>
									</div>
									<p class="new_btn01 center"><a href="#">続きを読む</a></p>
								</div>
							</li>
							<li>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/interview02.png" alt=""></p>
								<div class="txt_box">
									<p class="logo"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/voice02.png" alt=""></p>
									<p class="name">〇〇〇〇株式会社</p>
									<div class="sp hover_box_sp">
										<div class="txt_in">
											<p class="txt01">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
											<p class="txt02">課題／〇〇〇〇が短縮できない</p>
										</div>
										<p class="new_btn01 center"><a href="#">続きを読む</a></p>
									</div>
								</div>
								<div class="hover_box">
									<div class="txt_in">
										<p class="txt01">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
										<p class="txt02">課題／〇〇〇〇が短縮できない</p>
									</div>
									<p class="new_btn01 center"><a href="#">続きを読む</a></p>
								</div>
							</li>
							<li>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/interview03.png" alt=""></p>
								<div class="txt_box">
									<p class="logo"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/voice03.png" alt=""></p>
									<p class="name">〇〇〇〇株式会社</p>
									<div class="sp hover_box_sp">
										<div class="txt_in">
											<p class="txt01">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
											<p class="txt02">課題／〇〇〇〇が短縮できない</p>
										</div>
										<p class="new_btn01 center"><a href="#">続きを読む</a></p>
									</div>
								</div>
								<div class="hover_box">
									<div class="txt_in">
										<p class="txt01">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
										<p class="txt02">課題／〇〇〇〇が短縮できない</p>
									</div>
									<p class="new_btn01 center"><a href="#">続きを読む</a></p>
								</div>
							</li>
						</ul>
						<p class="new_btn01 center size_l"><a href="#">すべて見る</a></p>
					</div>
				</section>-->
				<!-- index_new_voice -->
			  
				<section class="index_new_attracting area">
					<div class="inner1000">
						<h3 class="new_ttl01">インドネシア<span class="orange">集客支援</span></h3>
						<p class="top_txt">インドネシア進出支援に加えて、インドネシア国内におけるWeb集客支援も行っています。多言語サイトの制作からはじまり、コンテンツマーケティング、SEO対策、Web広告運用、SNSアカウント運用など幅広くWebマーケティング施策を支援することができます。もちろん、SEO対策のみやWeb広告運用のみなど、個別のWebマーケティング施策だけも対応しています。まずはお気軽にご連絡をいただければと思います。</p>
						<ul class="new_attraction_list">
							<li>
								<p class="ttl">コンテンツマーケティング</p>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/attracting01.png" alt=""></p>
								<p class="txt">貴社のお客様（見込み客も含む）に対して、適切な情報を適切なタイミングで届けていくことで、貴社のファンになってもらうことを目的としています。そのための戦略の立案から実行支援までを総合的に行っています。</p>
							</li>
							<li>
								<p class="ttl">インフルエンサーマーケティング</p>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/attracting02.png" alt=""></p>
								<p class="txt">インフルエンサー（影響力を持つ人物）の影響力を活用したマーケティング手法は近年ますます重要度を増しています。ただ、貴社のブランドイメージと乖離するような人物を起用すると効果が薄いため、その選定からお手伝いをしています。</p>
							</li>
							<li>
								<p class="ttl">翻訳業務</p>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/attracting03.png" alt=""></p>
								<p class="txt">英語への翻訳はもちろんのこと、中国語、韓国語、ベトナム語、インドネシア語など複数の言語への翻訳が可能です。それぞれの国で日本語が得意なスタッフが働いており、活きた言葉に翻訳をしていきます。</p>
							</li>
							<li>
								<p class="ttl">広告運用</p>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/attracting04.png" alt=""></p>
								<p class="txt">Google広告はもちろん、Facebook広告やInstagram広告などのSNS広告まで幅広く貴社のサービスや製品をお客様にお届けする支援をしています。貴社の予算に合った広告出稿が可能ですので、一度ご相談をいただければと思います。</p>
							</li>
							<li>
								<p class="ttl">SNS運用</p>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/attracting05.png" alt=""></p>
								<p class="txt">近年、企業の公式SNS運用は非常に難度が高くなってきています。良かれと思って行ったSNS運用が逆に貴社のブランドを毀損する可能性もあります。炎上しないようなSNS運用をコンサルティングさせていただきます。</p>
							</li>
							<li>
								<p class="ttl">アクセス解析</p>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/attracting06.png" alt=""></p>
								<p class="txt">SEO対策や広告運用や各種SNS運用など、施策をやりっぱなしで終わりになっていないでしょうか。数字をもとにアクセス状況を分析し、施策の良し悪しを検討した上で次に活かすことが大事です。PDCAを回すお手伝いをしていきます。</p>
							</li>
						</ul>
					</div>
				</section>
				<!-- index_new_attracting -->
				
				<div id="contact_new_area">
					<section class="new_contact_box area">
						<div class="inner">
							<h4 class="contact_ttl">インドネシアの現地ECモールへ出店する越境ECに興味がある企業様へ</h4>
							<ul>
								<li>
									<p class="ttl_in orange">WEBからお問い合わせ</p>
									<a href="<?php echo home_url(); ?>/contact/" class="new_btn color01"><span>ご相談はいつでも無料</span></a>
									<p class="caution">24時間受付（2営業日以内に返信いたします）</p>
								</li>
								<li>
									<p class="ttl_in orange">すぐにでも日程調整を行いたい</p>
									<a href="<?php echo home_url(); ?>/zoom-meeting/#meeting" class="new_btn color02"><span>日程調整フォームへ</span></a>
									<p class="caution">代表の柳沢が説明いたします。</p>
								</li>
							</ul>
							<div class="box">
								<div class="tel">
									<p class="tel_txt">お電話でのお問い合わせ</p>
									<p class="tel_btn">
										<a href="tel:092-707-2032"><span class="icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE4AAABOAQAAAACm0R2wAAAAAnRSTlMAAHaTzTgAAAARSURBVCjPY2AYBaNgFFAfAAADWgABZCqdLAAAAABJRU5ErkJggg==" alt="" data-src="<?php echo get_theme_file_uri(); ?>/img/ownedmedia-to-expand-indonesia/contact_tel.png" decoding="async" class="lazyload"><noscript><img src="<?php echo get_theme_file_uri(); ?>/img/ownedmedia-to-expand-indonesia/contact_tel.png" alt="" data-eio="l"></noscript></span>092-707-2032</a>
									</p>
									<p class="time">（9:00〜19:00）</p>
								</div>	
								<a href="<?php echo home_url(); ?>/company/" class="intro orange">カケモチの自己紹介</a>
							</div>
						</div>
					</section>
				</div>
				<!--contact_new-->		
			  
				<section class="index_new_schedule area">
					<div class="inner1000">
						<h3 class="new_ttl01">インドネシア進出へ向けた<br class="sp"><span class="orange">二人三脚支援</span><span class="size_s">（壁打ちサービス）</span></h3>
						<p class="top_txt">多くの企業様にとって日本以外の国に進出するというのは、やはり大きな意思決定になるかと思います。インドネシア市場がどれほど有望だからといっても、おいそれと進出の意思決定をして、インドネシアに挑むのは難しいでしょう。時間をかけてインドネシア進出の可否を決めることが大事です。<br>
						当然ながら意思決定を行っていくにあたり、効率的に正しい情報を収集していく必要があり、またその情報を分析していく人間も必要です。弊社では、そういった企業様向けにインドネシア進出へ向けた情報収集、情報分析、それをもとにした意思決定を二人三脚で支援させていただくサービスも行っております。<br>
						まずは具体的な進出コンサルティングの各メニューをご相談いただく前に、この壁打ちサービスをご利用いただいて、インドネシア進出へ向けての意思決定を固めていくお手伝いができればと思っております。
						</p>
						<!-- Start of Meetings Embed Script -->
						<div class="meetings-iframe-container" data-src="https://meetings.hubspot.com/kakemochi-yanagisawa/corporate?embed=true"></div>
						<script type="text/javascript" src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script>
						<!-- End of Meetings Embed Script -->
					</div>
				</section>
				<!-- index_new_schedule -->
			  
				<section class="index_new_feature area bg01">
					<div class="inner1000">
						<h3 class="new_ttl01">カケモチの<span class="orange">インドネシア進出<br class="sp">コンサルティング</span>の特長</h3>
						<ul class="new_feature_list">
							<li>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/feature01.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">インドネシアに特化して<br>支援をしている</p>
									<p class="txt">競合他社と違い、インドネシアに特化してお客様の事業を支援しています。そうすることで、インドネシア国内における様々なマーケティング事例に触れる機会が増えるため、社内に蓄積されている知見やノウハウの質と量が競合他社のそれを大きく上回っているのが強みと言えます。</p>
								</div>
							</li>
							<li>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/feature02.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">越境ECやWebマーケティングに<br>強みがある</p>
									<p class="txt">弊社は越境ECやWebマーケティングなどの集客に強みがあります。SEO、Web広告、インフルエンサーマーケティング、SNSアカウント運用など、Webマーケティングの分野においてそれぞれ専門家が社内にいるので、その専門家の強みを活かしてお客様の集客に貢献するのが弊社の強みです。</p>
								</div>
							</li>
							<li>
								<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/feature03.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">インドネシア人スタッフは<br>全員日本語が話せる</p>
									<p class="txt">弊社のお客様の多くは、日系企業様です。よって、そのサポートをするインドネシア人も日本語が話せることで、お客様とスムーズなやり取りが実現できています。また、第二外国語としての日本語を習得しているインドネシア人は、真面目でコツコツ一生懸命頑張れる従業員が多いのも特徴です。</p>
								</div>
							</li>
						</ul>
					</div>
				</section>
				<!-- index_new_feature -->
			  
				<section class="index_new_newsletter area">
					<div class="inner1000">
						<div class="new_letter_box">
							<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/news_letter.png" alt=""></p>
							<div class="txt_box">
								<p class="ttl">インドネシアについての<br class="sp">お役立ちニュースレター</p>
								<p class="txt">カケモチはインドネシアへの進出支援や、インドネシア国内におけるWebマーケティング支援、あるいはインドネシア人向けコミュニティの運営をしていることから、インドネシアでビジネスを行うために重要なトピックに厳選してニュースをお届けすることができます。</p>
								<p class="new_btn01 right"><a href="<?php echo home_url(); ?>/expatriate/newsletter/">詳細はこちらから</a></p>
							</div>
						</div>
					</div>
				</section>
				<!-- index_new_newsletter -->
			  
				<section class="index_new_qa area bg01">
					<div class="inner1000">
						<h3 class="new_ttl01">よくあるご質問</h3>
						<dl>
							<dt>
								<span class="icon"></span><p>何から相談して良いか分からず、とりあえずいろいろ話を聞いてもらいたい</p>
							</dt>
							<dd>
								<span class="icon"></span><p>はい、もちろん大丈夫です。インドネシアに進出するにあたっては多くの時間とお金がかかります。適切な情報をインプットして正しく意思決定していただけるように弊社としてご支援していきます。</p>
							</dd>
						</dl>
						<dl>
							<dt>
								<span class="icon"></span><p>それぞれのサービスにどれくらいの費用がかかるのか知りたい</p>
							</dt>
							<dd>
								<span class="icon"></span><p>どのサービスも、お客様がどれくらいの対策を望まれるかで料金が多少変わってきます。まずは一度ご連絡をいただければと思います。</p>
							</dd>
						</dl>
						<dl>
							<dt>
								<span class="icon"></span><p>インドネシア人スタッフはいますか？</p>
							</dt>
							<dd>
								<span class="icon"></span><p>おります。弊社では社内公用語を日本語にして、インドネシア人スタッフの採用を行っています。よって、全員日本語が話せるインドネシア人のみです。</p>
							</dd>
						</dl>
						<dl>
							<dt>
								<span class="icon"></span><p>契約期間はどれくらいの長さになりますか（縛りはありますか）</p>
							</dt>
							<dd>
								<span class="icon"></span><p>初月解約可能です。弊社のサービスが合わなかったり、ご満足をいただけなかった場合は初月で契約を解除していただくこともできます。サービスに自信があるからこそのこの形でご提供しています。</p>
							</dd>
						</dl>
						<dl>
							<dt>
								<span class="icon"></span><p>訪問してもらえますか</p>
							</dt>
							<dd>
								<span class="icon"></span><p>基本的にはzoomやskypeなどのオンラインツールを使ってのお打ち合わせとさせていただいています。</p>
							</dd>
						</dl>
					</div>
				</section>
				<!-- index_new_qa -->
			  
				<?php get_template_part('news'); ?>
			  
				<?php get_template_part('news_column'); ?>
				<?php get_template_part('search'); ?>
			</article>
			<!-- article end -->
		</main>
		
<?php get_template_part('parts/contact/contact'); ?>
<?php get_template_part('about'); ?>
<?php get_footer(); ?>
		<div id="page_top">
			<span></span>
		</div>
		<!-- page_top end -->		
		
	</div>
	<!-- wrapper end -->
<?php get_template_part('before_close_body'); ?>
<?php wp_footer(); ?>
</body>
</html>
