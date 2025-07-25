<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
		<main id="voice" class="lower detail<?php echo ' '.get_post_type( $post ); ?>">
<?php get_template_part('side_bar'); ?>
			<article id="contents">
				<div class="contents_box">
<?php
if(get_field('bread_crumb_html')){
	echo get_field('bread_crumb_html');
}else{
	breadcrumb();
}
?>

<?php 
if(get_the_post_thumbnail_url($post->ID, "full")){
	$mv = get_the_post_thumbnail_url($post->ID, "full");
}
?>

					<div class="bg bg_client">
						<div id="case_detail">
							<article>
								<div id="visual" class="area">
									<div class="inner">
										<h2 class="ttl"><?php the_title(); ?></h2>
										<p class="visual_txt"><?php echo get_field('company'); ?></p>
										<p class="logo"><img src="<?php echo get_field('logo')['url']; ?>" alt=""></p>
										<ul class="info">
											<li>業種　<?php echo get_field('business'); ?></li>
											<li>従業員数：<?php echo get_field('headcount'); ?></li>
											<li>課題：<?php echo get_field('task_short'); ?></li>
										</ul>
									</div>
								</div><!-- visual end -->		

								<section id="case_detail01" class="area">
									<div class="inner">
										<p class="top_txt"><?php echo get_field('intro'); ?></p>
										<p class="name"><span>ご担当者様</span><?php echo get_field('section'); ?>　<?php echo get_field('name'); ?> 様</p>
										<ul>
											<li>
												<div class="orange_ttl">
													<p class="icon"><img src="<?php echo get_field('logo'); ?>" alt=""></p>
													<p class="orange">導入前の課題</p>
												</div>
												<div class="right">
													<p class="ttl"><?php echo get_field('task_long_title'); ?></p>
													<p class="txt"><?php echo get_field('task_long_excerpt'); ?></p>
												</div>
											</li>
											<li>
												<div class="orange_ttl">
													<p class="icon"><img src="<?php echo get_field('reason_img'); ?>" alt=""></p>
													<p class="orange">選んだ理由</p>
												</div>
												<div class="right">
													<p class="ttl"><?php echo get_field('reason_title'); ?></p>
													<p class="txt"><?php echo get_field('reason_excerpt'); ?></p>
												</div>
											</li>
											<li>
												<div class="orange_ttl">
													<p class="icon"><img src="<?php echo get_field('result_img'); ?>" alt=""></p>
													<p class="orange">導入後の成果・効果</p>
												</div>
												<div class="right">
													<p class="ttl"><?php echo get_field('result_title'); ?></p>
													<p class="txt"><?php echo get_field('result_excerpt'); ?></p>
												</div>
											</li>
										</ul>
									</div>
								</section>
								<!-- case_detail01 end -->	

								<section id="case_detail02" class="area">
									<div class="inner">
										<ul>
											<li>
												<div class="orange_ttl">
													<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/common/icon_check.png" alt=""></p>
													<p class="orange">導入前の課題</p>
												</div>
												<h4 class="ttl"><?php echo get_field('task_long_title'); ?></h4>
												<p class="img"><img src="<?php echo get_field('task_long_img')['url']; ?>" alt=""></p>
												<p class="txt"><?php echo get_field('task_long_text'); ?></p>
											</li>
											<li>
												<div class="orange_ttl">
													<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/common/icon_check.png" alt=""></p>
													<p class="orange">選んだ理由</p>
												</div>
												<h4 class="ttl"><?php echo get_field('reason_title'); ?></h4>
												<p class="img"><img src="<?php echo get_field('reason_img')['url']; ?>" alt=""></p>
												<p class="txt"><?php echo get_field('reason_text'); ?></p>
											</li>
											<li>
												<div class="orange_ttl">
													<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/common/icon_check.png" alt=""></p>
													<p class="orange">導入後の成果・効果</p>
												</div>
												<h4 class="ttl"><?php echo get_field('result_title'); ?></h4>
												<p class="img"><img src="<?php echo get_field('result_img')['url']; ?>" alt=""></p>
												<p class="txt"><?php echo get_field('result_text'); ?></p>
											</li>
										</ul>
									</div>
								</section>
								<!-- case_detail02 end -->	
								
								<section id="case_detail03" class="area">
									<div class="inner">
										<h3 class="ttl01">ご担当者様のコメント</h3>
										<div class="box">
											<p class="img"><img src="<?php echo get_field('comment_img')['url']; ?>" alt=""></p>
											<div class="txt_box">
												<p class="ttl"><?php echo get_field('comment_title'); ?></p>
												<p class="name"><?php echo get_field('section'); ?>　<?php echo get_field('name'); ?> 様</p>
												<p class="txt"><?php echo get_field('comment_text'); ?></p>
											</div>
										</div>
<?php get_template_part('sns'); ?>
										<div class="download">
											<div class="ttl_box">
												<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/common/icon_free.png" alt="無料"></p>
												<p class="ttl">検討に役立つ導入事例集を<br class="sp">無料でご利用いただけます</p>
											</div>
											<a href="#" download><img src="<?php echo get_theme_file_uri(); ?>/img/common/btn_download02.png" alt="導入事例集を一括ダウンロード"></a>
										</div>
									</div>
								</section>
								<!-- case_detail02 end -->	

								<section id="common_case_area" class="area">
									<div class="inner">
										<p class="orange sub_ttl">その他の事例</p>
										<h3 class="ttl01">関連事例をご紹介します</h3>
										<ul class="case_list">
											<?php 
											$tag_slug_arr = [];
											foreach(get_the_tags() as $tag){
												$tag_slug_arr[] = $tag->slug;
											}
											$paged = get_query_var('paged') ? intval(get_query_var('paged')):1;
											$args = array(
												'posts_per_page'=>3,
												'post_type'=>'client',
												'orderby'=>'date',
												'order'=>'DESC',
												'paged'=>$paged,
												'tag_slug__in'=>$tag_slug_arr,
												'post__not_in'=>[$post->ID]
											);
											$posts_arr = new WP_Query($args);
											foreach($posts_arr->posts as $post):setup_postdata($post);

											?>
											<li>
												<a href="<?php echo the_permalink(); ?>">
													<div class="img_box">
														<p class="img"><img src="<?php echo get_field('task_long_img',$post->ID)['url']; ?>" alt=""></p>
														<p class="logo"><img src="<?php echo get_field('logo',$post->ID)['url']; ?>" alt=""></p>
													</div>
													<p class="ttl"><?php the_title(); ?></p>
													<p class="name"><?php echo get_field('company',$post->ID); ?></p>
													
													<dl>
														<dt>課題</dt>
														<dd><?php echo get_field('task_short',$post->ID); ?></dd>
													</dl>
												</a>
											</li>
											<?php endforeach; ?>
										</ul>
										<a href="<?php echo home_url().'/company/client/' ?>" class="btn_all">すべて見る</a>
									</div>
								</section>
								<!-- company02 end -->	
								


							</article>
						</div><!-- /.case_detail -->
				</div>
				<!-- bg end -->	
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