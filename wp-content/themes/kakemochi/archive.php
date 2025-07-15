<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
		<main id="voice" class="lower">
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
$tags = single_tag_title('',false);
$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
$args = array(
	'tag_slug__in'=>$tags,
	'posts_per_page'=>4,
	'post_type'=>['interview','column','client'],
	'orderby'=>'date',
	'order'=>'DESC',
	'paged'=>$paged
);
$posts_arr = new WP_Query($args);
 ?>
					<div class="bg">
						<h2 class="tag_result">「<?php single_tag_title() ?>」を含む記事：<?php echo $posts_arr->found_posts; ?>件</h2>
						
						<ul class="voice_list">

<?php 
foreach($posts_arr->posts as $post):setup_postdata($post);
 ?>
							<li>
								<div class="box">
									<p class="img">
										<a href="<?php the_permalink(); ?>">
											<?php if(get_the_post_thumbnail($post->ID)){the_post_thumbnail('medium');}else{echo '<img src="'.get_theme_file_uri().'/img/common/noimg.png'.'">';} ?>
										</a>
									</p>
									<div class="txt_box">
										<p class="ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
										<?php if(get_the_tags()): ?>
										<div class="tag_box">
											<?php 
												$tags = get_the_tags($post->ID);
												if($tags){
													foreach($tags as $tag){
														echo '<a href="'.get_tag_link($tag->term_id).'">#'.$tag->name.'</a>';
													}
												}
											 ?>
										</div>
										<?php endif; ?>
										<div class="date_box">
											<dl>
												<dt>公開日</dt>
												<dd><?php the_time('Y/m/d'); ?></dd>
											</dl>
											<dl>
												<dt>更新日</dt>
												<dd><?php the_modified_date('Y/m/d'); ?></dd>
											</dl>
										</div>
									</div>
								</div>
								<div class="com">
									<p class="txt"><?php the_excerpt(); ?></p>
									<a href="<?php the_permalink(); ?>" class="more">続きを読む</a>
								</div>
							</li>
<?php endforeach; ?>
						</ul>
						<!-- voice_list end -->	

<?php 
$GLOBALS['wp_query']->max_num_pages = $posts_arr->max_num_pages;
get_template_part('pager');
?>
<?php wp_reset_query(); ?>
					</div><!-- bg end -->	
				</div>
				<!-- /.contents_box -->

<?php get_template_part('contact'); ?>
<?php get_template_part('about'); ?>
<?php 
$args['sidebar']=$sidebar;
get_footer('',$args);
?>

			</article>
			<!-- article end -->
		</main>
		<!-- main end -->

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