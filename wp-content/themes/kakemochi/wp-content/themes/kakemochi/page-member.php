<?php
/*
Template Name: TRICRUISE会員募集中
*/
?>
<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
		<main id="<?php echo $post->post_name; ?>" class="lower">

			<article>
<?php
if(get_field('bread_crumb_html')){
	echo get_field('bread_crumb_html');
}else{
	breadcrumb();
}
?>

				<div id="visual01" class="area">
					<div class="inner">
						<h1 class="ttl">定額制Webマーケティング顧問サービス</h1>
						<p class="visual_txt">訪日インバウンド関連の情報など<br class="sp">定期的に有益な情報を受けたり、<br class="pc">Web集客方法の壁打ち相手を求めているお客様向けのサービスです。</p>
						<a href="<?php echo home_url(); ?>/contact" class="visual_btn_member"><img src="<?php echo get_theme_file_uri(); ?>/img/member/btn_member_visual.png" alt="有料会員になる"></a>
					</div>
				</div>
				<!-- visual end -->		
				
				
				<section id="member01" class="area"<?php if(get_field('main_width')>0){echo ' style="width:'.get_field('main_width').'%;margin:0 auto;"';} ?>>
					<div class="inner">
                    	<h2 class="ttl01">TRICRUISE会員募集中</h2>
						<p class="top_txt">今すぐに訪日インバウンド支援や各種Webマーケティングのコンサルティングサービスが必要ではないけれど、定期的に有益な情報を受けたいお客様向けの会員制のサービスです。<br>情報収集だけではなく、Web集客の壁打ち相手を求めているお客様のニーズにもお応えします。</p>
						<div class="member_banner">
							<p class="ttl"><img src="<?php echo get_theme_file_uri(); ?>/img/member/service6_txt.png" alt="6つの有料会員向けサービス"></p>
							<div class="txt_box">
								<div class="price">
									<p class="price_txt">月額<span class="size_l">55,000</span>円<span class="tax">（税込）</span></p>
									<a href="<?php echo home_url(); ?>/contact"><img src="<?php echo get_theme_file_uri(); ?>/img/member/btn_member_paid.png" alt="有料会員になる"></a>
								</div>
								<p class="gray">ご解約はいつでも可能（翌月でも可）。<br class="sp">まずはお問い合わせください。</p>
							</div>
						</div>
						<ul>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/member/member01.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">Web集客のお役立ち情報（週2）</p>
									<p class="txt">訪日インバウンド関連の最新情報や知っておくと便利なWebマーケティング関連情報について週2回のニュースレターでお伝えしていきます。日々の業務で忙しい方にとって効率的に関連情報を収集できる方法として好評をいただいております。</p>
									<p class="member_btn"><a href="<?php echo home_url(); ?>/contact">お申し込みはこちら</a></p>
								</div>
							</li>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/member/member02.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">SEO対策の最新情報（月1）</p>
									<p class="txt">zoomやskypeなどのオンライン会議ツールを使用して、貴社のWebマーケティング上の課題を弊社にご相談いただけます。継続的にご相談をいただけるサービスではなく、初回入会時の1回のみ無料のサービスです（継続診断は別途ご相談ください ）。</p>
									<p class="member_btn"><a href="<?php echo home_url(); ?>/contact">お申し込みはこちら</a></p>
								</div>
							</li>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/member/member03.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">SEO対策のご相談（いつでも）</p>
									<p class="txt">「順位が下がってしまった」「もっとGoogleからの流入数を増やしたい」など、SEOについてのお悩みはいつでもご相談いただけます。本格的な分析業務は別途費用になってしまいますが、メールやチャットで気軽にご相談いただけるサービスです。</p>
									<p class="member_btn"><a href="<?php echo home_url(); ?>/contact">お申し込みはこちら</a></p>
								</div>
							</li>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/member/member04.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">アクセス解析の分析レポート（月1）</p>
									<p class="txt">最新のSEO動向をまとめたレポートを毎月お送りします。SEOの専門家向けのレポートではなく、SEO初心者向けに重要なニュースを選定し、それを分かりやすく解説しているレポートです。最新情報のキャッチアップにお役立てください。</p>
									<p class="member_btn"><a href="<?php echo home_url(); ?>/contact">お申し込みはこちら</a></p>
								</div>
							</li>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/member/member05.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">アクセス解析のご相談（いつでも）</p>
									<p class="txt">弊社からご送付したアクセス解析レポートを見たり、あるいはGoogle Analyticsのデータを見たりして、疑問に感じたことをいつでもご相談いただけます。本格的な分析業務は別途費用になってしまいますが、メールやチャットで気軽にご相談いただけます。</p>
									<p class="member_btn"><a href="<?php echo home_url(); ?>/contact">お申し込みはこちら</a></p>
								</div>
							</li>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/member/member06.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">サイト制作のご相談（いつでも）</p>
									<p class="txt">Webサイトの新規制作やリニューアルは頻繁に行わないので、制作会社に丸投げして失敗してしまう企業様が多いです。その際に、ご相談相手として弊社をご活用いただけます（実際に手を動かすディレクション業務は範囲外となります）。</p>
									<p class="member_btn"><a href="<?php echo home_url(); ?>/contact">お申し込みはこちら</a></p>
								</div>
							</li>
						</ul>
						<div class="member_banner">
							<p class="ttl"><img src="<?php echo get_theme_file_uri(); ?>/img/member/service6_txt.png" alt="6つの有料会員向けサービス"></p>
							<div class="txt_box">
								<div class="price">
									<p class="price_txt">月額<span class="size_l">55,000</span>円<span class="tax">（税込）</span></p>
									<a href="<?php echo home_url(); ?>/contact"><img src="<?php echo get_theme_file_uri(); ?>/img/member/btn_member_paid.png" alt="有料会員になる"></a>
								</div>
								<p class="gray">ご解約はいつでも可能（翌月でも可）。<br class="sp">まずはお問い合わせください。</p>
							</div>
						</div>
					</div>
				</section>
				<!-- member01 end -->	
				
			</article>
			<!-- article end -->
		</main>
		<!-- main end -->
<?php get_template_part('contact'); ?>
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