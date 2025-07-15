<?php
/*
Template Name: サービス一覧
*/
?>
<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
<?php 
if(get_the_post_thumbnail_url($post->ID, "full")){
	$mv = get_the_post_thumbnail_url($post->ID, "full");
	$mv_css =  ' style="background:url('.$mv.')"';
}
?>
		<main id="service" class="lower">
			<article>
				<div id="visual01" class="area">
					<div class="inner">
						<h1 class="ttl">お客様にご提供できる<br class="sp">サービス一覧</h1>
						<p class="visual_txt">訪日インバウンド対策や海外進出支援などの<br class="sp">分野横断的な対策はもちろん、<br>多言語サイト制作やSEO対策などの<br class="sp">個別分野での対策も可能です。</p>
						<a href="<?php echo home_url(); ?>/contact/" class="visual_btn_dl"><img src="<?php echo get_theme_file_uri(); ?>/img/common/btn_web.png" alt="無料でWeb集客のご相談"></a>
					</div>
				</div>
				<!-- visual end -->		

<?php
if(get_field('bread_crumb_html')){
	echo get_field('bread_crumb_html');
}else{
	breadcrumb();
}
?>



				<section id="service01" class="area"<?php if(get_field('main_width')>0){echo ' style="width:'.get_field('main_width').'%;margin:0 auto;"';} ?>>
					<div class="inner">
						<h2 class="ttl01">海外Web集客の支援</h2>
						<p class="top_txt">訪日インバウンドや海外進出など海外（特に東南アジア各国）ユーザーのWeb集客の支援を行っています。</p>
						<ul>
							<li>
								<a href="<?php echo home_url(); ?>">
									<div class="img_box">
										<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/service/service01.png" alt=""></p>
										<p class="ttl">訪日インバウンド対策</p>
									</div>
								</a>
								<p class="txt">海外から日本に旅行に来られるお客様に対して、どのようにアプローチをしたら良いのかを戦略的に考えていきます。単純に多言語サイトを作って終わり、サービスメニューを翻訳して終わりではなく、トータルで貴社の訪日インバウンド戦略を支援していきます。</p>
							</li>
							<li>
								<a href="<?php echo home_url(); ?>">
									<div class="img_box">
										<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/service/service02.png" alt=""></p>
										<p class="ttl">海外進出支援</p>
									</div>
								</a>
								<p class="txt">現在は主にインドネシアへの進出支援を行っています。世界第4位の人口大国にも関わらず、平均年齢は29歳と非常に高いポテンシャルを秘めた国として有名です。将来的にはインドネシアに限らず、東南アジア圏への進出を支援できるようになります。</p>
							</li>
							<li>
								<a href="<?php echo home_url(); ?>">
									<div class="img_box">
										<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/service/service03.png" alt=""></p>
										<p class="ttl">多言語サイト制作</p>
									</div>
								</a>
								<p class="txt">訪日インバウンド対策を行う場合、日本語以外への言語への翻訳は必須です。ただし、単純に翻訳作業を行うのではなく、SEO対策を踏まえた上で、多くのお客様の目に触れられることを意識したサイト制作をご提供しています。</p>
							</li>
							<li>
								<a href="<?php echo home_url(); ?>">
									<div class="img_box">
										<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/service/service04.png" alt=""></p>
										<p class="ttl">海外SEO対策</p>
									</div>
								</a>
								<p class="txt">GoogleやYahooなどで貴社サイトやコンテンツを上位表示させるためのお手伝いをします。そもそもどういったコンテンツ（キーワード）を作っていけば、御社の見込み客に情報が届くのか、その戦略部分から一緒に議論させていただきます。</p>
							</li>
						</ul>
					</div>
				</section>
				<!-- service01 end -->	
				
				<section id="service02" class="area">
					<div class="inner">
						<!--<h3 class="ttl01">国内Web集客の支援</h3>-->
						<p class="top_txt">個別のWebマーケティング施策についても支援をしております。</p>
						<ul>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/service/con_icon03.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">コンテンツマーケティング</p>
									<p class="txt">貴社のお客様（見込み客も含む）に対して、適切な情報を適切なタイミングで届けていくことで、貴社のファンになってもらうことを目的としています。そのための戦略の立案から実行支援までを総合的に行っています。</p>
								</div>
							</li>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/service/con_icon04.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">インフルエンサーマーケティング</p>
									<p class="txt">インフルエンサー（影響力を持つ人物）の影響力を活用したマーケティング手法は近年ますます重要度を増しています。ただ、貴社のブランドイメージと乖離するような人物を起用すると効果が薄いため、その選定からお手伝いをしています。</p>
								</div>
							</li>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/service/con_icon02.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">翻訳業務</p>
									<p class="txt">英語への翻訳はもちろんのこと、中国語、韓国語、ベトナム語、インドネシア語など複数の言語への翻訳が可能です。それぞれの国で日本語が得意なスタッフが働いており、活きた言葉に翻訳をしていきます。</p>
								</div>
							</li>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/service/con_icon06.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">広告運用</p>
									<p class="txt">Google広告はもちろん、Facebook広告やInstagram広告などのSNS広告まで幅広く貴社のサービスや製品をお客様にお届けする支援をしています。貴社の予算に合った広告出稿が可能ですので、一度ご相談をいただければと思います。</p>
								</div>
							</li>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/service/con_icon07.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">SNS運用</p>
									<p class="txt">近年、企業の公式SNS運用は非常に難度が高くなってきています。良かれと思って行ったSNS運用が逆に貴社のブランディングを毀損する可能性もあります。炎上しないようなSNS運用をコンサルティングさせていただきます。</p>
								</div>
							</li>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/service/con_icon08.png" alt=""></p>
								<div class="txt_box">
									<p class="ttl">アクセス解析</p>
									<p class="txt">SEO対策や広告運用や各種SNS運用など、施策をやりっぱなしで終わりになっていないでしょうか。数字をもとにアクセス状況を分析し、施策の良し悪しを検討した上で次に活かすことが大事です。PDCAを回すお手伝いをしていきます。</p>
								</div>
							</li>
						</ul>
						<div class="mid_contact">
							<p class="mid_txt">Webマーケティングを活用して集客を<br class="sp">改善したいお客様の<span class="orange">ご相談は無料</span>です</p>
							<a href="<?php echo home_url(); ?>/contact/" class="btn_mid_contact"><img src="<?php echo get_theme_file_uri(); ?>/img/common/btn_contact_free.png" alt="無料　お問い合わせ"></a>
						</div>
					</div>
				</section>
				<!-- service02 end -->	
				
				<!--<section id="common_case_area" class="area">
					<div class="inner">
						<h3 class="ttl01">飲食店やホテルなど<br class="sp">●●社以上をご支援しています</h3>
						<ul class="logo_box">
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/common/sample_logo01.png" alt=""></li>
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/common/sample_logo02.png" alt=""></li>
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/common/sample_logo02.png" alt=""></li>
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/common/sample_logo02.png" alt=""></li>
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/common/sample_logo02.png" alt=""></li>
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/common/sample_logo02.png" alt=""></li>
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/common/sample_logo02.png" alt=""></li>
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/common/sample_logo02.png" alt=""></li>
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/common/sample_logo02.png" alt=""></li>
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/common/sample_logo02.png" alt=""></li>
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/common/sample_logo02.png" alt=""></li>
							<li><img src="<?php echo get_theme_file_uri(); ?>/img/common/sample_logo02.png" alt=""></li>
						</ul>
						<ul class="case_list">
							<li>
								<a href="<?php echo home_url(); ?>/preparation/client01.html">
									<div class="img_box">
										<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/common/img_case.png" alt=""></p>
										<p class="logo"><img src="<?php echo get_theme_file_uri(); ?>/img/common/case_logo.png" alt="カケモチ"></p>
									</div>
									<p class="ttl">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
									<p class="name">〇〇〇〇株式会社</p>
									
									<dl>
										<dt>課題</dt>
										<dd>〇〇〇〇が短縮できない</dd>
									</dl>
								</a>
							</li>
							<li>
								<a href="<?php echo home_url(); ?>/preparation/client01.html">
									<div class="img_box">
										<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/common/img_case.png" alt=""></p>
										<p class="logo"><img src="<?php echo get_theme_file_uri(); ?>/img/common/case_logo.png" alt="カケモチ"></p>
									</div>
									<p class="ttl">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
									<p class="name">〇〇〇〇株式会社</p>
									
									<dl>
										<dt>課題</dt>
										<dd>〇〇〇〇が短縮できない</dd>
									</dl>
								</a>
							</li>
							<li>
								<a href="<?php echo home_url(); ?>/preparation/client01.html">
									<div class="img_box">
										<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/common/img_case.png" alt=""></p>
										<p class="logo"><img src="<?php echo get_theme_file_uri(); ?>/img/common/case_logo.png" alt="カケモチ"></p>
									</div>
									<p class="ttl">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
									<p class="name">〇〇〇〇株式会社</p>
									
									<dl>
										<dt>課題</dt>
										<dd>〇〇〇〇が短縮できない</dd>
									</dl>
								</a>
							</li>
						</ul>
						<a href="<?php echo home_url(); ?>/preparation/" class="btn_all">すべて見る</a>
					</div>
				</section>-->
				<!-- common_case_area end -->
				
				<section id="service03" class="area">
					<div class="inner">
						<h3 class="ttl01">お客様の声</h3>
						<ul>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/service/voice_icon.png" alt=""></p>
								<p class="txt">訪日インバウンド支援を他の会社に依頼した時は、多言語サイトを制作して終わりという感じでした。ただ、カケモチさんの場合は全体的な戦略のところから一緒に考えてもらい、その中で多言語サイトがどういう位置づけになるのかを改めて共有してもらえたのは良かったです。部分最適ではなく、全体最適の重要性を感じました（カケモチプラン）。</p>
							</li>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/service/voice_icon.png" alt=""></p>
								<p class="txt">以前から注目していたインドネシアという巨大なマーケットに対して、自社サービスを何とか認知させたいと思っていました。ただ、Webマーケティングの分野に詳しく、かつ、インドネシアのマーケットにも詳しい企業に巡り合うことができないなか、そこを得意とするカケモチさんに出会えて支援いただけたことは助かりました（カケモチプラン）。</p>
							</li>
							<li>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/service/voice_icon.png" alt=""></p>
								<p class="txt">SEOについては右も左も分からない状態でしたが、対策の重要性については以前から認識していました。専門家として弊社のスタッフと二人三脚で伴走してもらえる会社をずっと探しているなかでカケモチさんを知りました。毎月丁寧なレポーティングやご提案をしてもらえるので非常に心強いパートナーだと感じています（コンサルティングプラン）。</p>
							</li>
						</ul>
					</div>
				</section>
				<!-- service03 end -->	
				
				<section id="service04" class="area">
					<div class="inner">
						<h3 class="ttl01">よくあるご質問</h3>
						<dl>
							<dt>
								<span></span><p>何から相談して良いか分からず、とりあえずいろいろ話を聞いてもらいたい</p>
							</dt>
							<dd>
								<span></span><p>はい、もちろん大丈夫です。訪日インバウンドにしろ海外進出にしろ、やらなくてはいけないことは多々あります。<br>すぐのご依頼というお話ではなくても、とりあえずご相談いただければと思います。</p>
							</dd>
						</dl>
						<dl>
							<dt>
								<span></span><p>それぞれどれくらいの費用がかかるのか知りたい</p>
							</dt>
							<dd>
								<span></span><p>どのサービスも、お客様がどれくらいの対策を望まれるかで料金が多少変わってきます。まずは一度ご連絡をいただければと思います。</p>
							</dd>
						</dl>
						<dl>
							<dt>
								<span></span><p>どのようなフローで進んでいきますか</p>
							</dt>
							<dd>
								<span></span><p>まずは御社の現状についてヒアリングをさせていただくところから始まります。「SEO対策をしてほしい」とのご希望があっても、優先して取り組むべき課題が別のところにある可能性もあります。そういった点について深掘りさせていただきます。</p>
							</dd>
						</dl>
						<dl>
							<dt>
								<span></span><p>契約期間はどれくらいの長さになりますか（縛りはありますか）</p>
							</dt>
							<dd>
								<span></span><p>初月解約可能です。弊社のサービスが合わなかったり、ご満足をいただけなかった場合は初月で契約を解除していただくこともできます。サービスに自信があるからこそのこの形でご提供しています。</p>
							</dd>
						</dl>
						<dl>
							<dt>
								<span></span><p>訪問してもらえますか</p>
							</dt>
							<dd>
								<span></span><p>基本的にはzoomやskypeなどのオンラインツールを使ってのお打ち合わせとさせていただいています。</p>
							</dd>
						</dl>
					</div>
				</section>
				<!-- service04 end -->	


			</article>
			<!-- article end -->
		</main>
		<!-- main end -->
<?php get_template_part('contact'); ?>
<?php get_template_part('about'); ?>
<?php 
$args['sidebar']=$sidebar;
get_footer('',$args);
?>

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