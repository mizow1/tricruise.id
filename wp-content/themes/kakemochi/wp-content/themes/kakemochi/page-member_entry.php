<?php 
/*
Template Name: 会員登録
*/

 ?>
<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
		<main id="<?php echo $post->post_name; ?>" class="lower">

			<?php get_template_part('parts/side_bar/member_entry_side_bar'); ?>
			<article id="contents">

<?php
if(get_field('bread_crumb_html')){
	echo get_field('bread_crumb_html');
}else{
	breadcrumb();
}
?>

				<section id="textpage" class="area main_width_<?php echo $main_width; ?>">
					<div class="inner">
						<?php if(get_field('page_sub_title')): ?>
						<div class="textpage_section">
							<h2 class="text_p_ttl"><?php echo get_field('page_sub_title'); ?></h2>
						</div>
						<?php endif; ?>

						<?php
						if(strpos(get_the_content(),'wp-block-read-more')) :
						global $more;
						$more = 0;
						$member_edit_content = get_the_content('');
						$more = 1;
						the_content('', true );
						else : $member_edit_content = get_the_content();
						endif;
						?>


						<?php if(is_user_logged_in()): ?>
						<div class="my_page_recommend">
							<?php if(get_field('my_page_recommend_title')): ?>
							<div class="list_post">
								<?php 
								//サムネイル画像
								if(!empty(get_field('thumbnail_img')['url'])){
									$thum_url = get_field('thumbnail_img')['url'];
								}elseif(get_the_post_thumbnail($post->ID)){
									$thum_url = get_the_post_thumbnail_url($post->ID,'medium');
								}else{
									$thum_url = get_theme_file_uri().'/img/common/noimg.png';
								}
								?>
								<div class="mypage_btncontents">
									<div class="mypage_btncontents_img">
										<a href="<?php echo get_field('my_page_recommend_url'); ?>"><img decoding="async" src="<?php echo get_field('my_page_recommend_img')['url']; ?>" alt="" data-eio="l"></noscript></a>
									</div>
									<div class="mypage_btncontents_txt">
										<p class="mypage_btncontents_ttl"><?php echo get_field('my_page_recommend_title'); ?></p>
										<p class="mypage_btncontents_txt"><?php echo get_field('my_page_recommend_caption'); ?></p>
										<p class="mypage_btncontents_btn"><a href="<?php echo get_field('my_page_recommend_url'); ?>">詳細はこちら</a></p>
									</div>
								</div>
							</div><!-- /.list_post -->
							<?php endif; ?>

							<div class="banner_kabeuchi">
								<a href="https://faq.tricruise.id/client">
									<img src="<?php echo get_theme_file_uri(); ?>/img/member_entry/banner_okyakusama_980x150_720.jpg">
								</a>
							</div>
						</div><!-- /.my_page_recommend -->

						<div class="member_entry_notice">
							<h2 class="section_title">お知らせ</h2>
							<?php
							$args['post_type'] = 'notice';
							get_template_part('list_notice',null,$args);
							?>
						</div><!-- /.member_entry_notice -->

						<div class="member_entry_news">
							<?php
							$args['post_type'] = ['member','column','interview'];
							get_template_part('list_post',null,$args);
							?>
						</div><!-- /.member_entry_notice -->

						<div class="banner">
							<a href="<?php echo home_url(); ?>/member/free-seminar-on-expanding-into-indonesia/">
								<img src="<?php echo get_theme_file_uri(); ?>/img/member_entry/onlinse_seminar.jpg">
							</a>
						</div>


<div class="schedule">
<!-- Start of Meetings Embed Script -->
<h2 class="section_title">お打ち合わせをご希望の場合は下記よりお願いします</h2>
    <div class="meetings-iframe-container" data-src="https://meetings.hubspot.com/kakemochi-yanagisawa/client?embed=true"></div>
    <script type="text/javascript" src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script>
<!-- End of Meetings Embed Script -->
    </div><!-- /.schedule -->
  

<div class="tempdisplnone" style="display: none;">
						<h2 class="knowledge_base_title">よくあるご質問はこちら</h2>
						<div class="knowledge_base">
							<div class="inner">
								<a href="" class="item">
									<span class="title">マーケティングツール</span>
									<div class="img">
										<img src="<?php echo get_theme_file_uri(); ?>/img/member_entry/marketing-starter.svg">
									</div>
								</a>
								<a href="" class="item">
									<span class="title">ウェブサイトページ</span>
									<div class="img">
										<img src="<?php echo get_theme_file_uri(); ?>/img/member_entry/content-strategy.svg">
									</div>
								</a>
								<a href="" class="item">
									<span class="title">セールスツール</span>
									<div class="img">
										<img src="<?php echo get_theme_file_uri(); ?>/img/member_entry/sales-enterprise.svg">
									</div>
								</a>
								<a href="" class="item">
									<span class="title">サービスツール</span>
									<div class="img">
										<img src="<?php echo get_theme_file_uri(); ?>/img/member_entry/service-free.svg">
									</div>
								</a>
								<a href="" class="item">
									<span class="title">チャットと自動化</span>
									<div class="img">
										<img src="<?php echo get_theme_file_uri(); ?>/img/member_entry/robot.svg">
									</div>
								</a>
								<a href="" class="item">
									<span class="title">レポート</span>
									<div class="img">
										<img src="<?php echo get_theme_file_uri(); ?>/img/member_entry/success-quota-met.svg">
									</div>
								</a>
							</div><!-- /.inner -->
						</div><!-- /.knowledge_base -->
</div><!-- /.tempdisplnone -->

						<div class="member_entry_contact_sp sp">
							<!--お問い合わせ-->
							<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/shell.js"></script>

							<!--お問い合わせ-->
							<p class="column_side_sub_ttl">お問い合わせはコチラ</p>
							<script>
							  hbspt.forms.create({
								region: "na1",
								portalId: "20720568",
								formId: "0c79f6c1-e1ac-44e7-a8fe-e0dfec7607f9"
							});
							</script>
						</div>
						<?php endif; ?>

						<div class="member_info">
						<?php echo do_shortcode($member_edit_content); ?>

						<?php if(!is_user_logged_in()): ?>
						<div class="member_entry_done">
							<div class="member_entry_done">
								<i class="fa-solid fa-arrow-down"></i>登録済みの方はこちら
							</div>
							<?php get_template_part('member_login'); ?>
						</div>
						<?php endif; ?>
						</div><!-- /.member_info -->
					</div>
				</section>
				<!-- member01 end -->	
				
				<?php if(get_field('company_nav') == 'オン'): ?>
				<?php get_template_part('link_company'); ?>
				<?php endif; ?>
				
			</article>
			<!-- article end -->
		</main>
		<!-- main end -->
<?php if($post->post_name != 'contact' && $post->post_name != 'sales'): ?>
<?php get_template_part('parts/contact/contact'); ?>
<?php get_template_part('about'); ?>
<?php endif; ?>
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
