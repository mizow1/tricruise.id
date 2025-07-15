<?php
/*
Template Name: インタビュー記事一覧
*/
?>
<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
		<main id="voice" class="lower">
<?php 
$sidebar = 'member_entry_side_bar';
get_template_part('parts/side_bar/'.$sidebar);
 ?>

			<article id="contents">
				<div class="contents_box">
					<p class="top_link"><a href="<?php echo home_url(); ?>/contact/">インタビューを実施中。<br class="sp">ご協力いただける方はこちら。</a></p>
<?php 
if(get_field('bread_crumb_html')){
	echo get_field('bread_crumb_html');
}else{
	breadcrumb();
}
$args['post_type'] = 'column';
get_template_part('search',null,$args);

 ?>
					<!-- search_box end -->	
					<div class="bg">
						<ul class="voice_list">
<?php 
$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
$args = array(
	'posts_per_page'=>4,
	'post_type'=>'notice',
	'orderby'=>'date',
	'order'=>'DESC',
	'paged'=>$paged
);
$posts_arr = new WP_Query($args);
foreach($posts_arr->posts as $post):setup_postdata($post);
 ?>
							<li>
								<div class="box">
<?php 
//サムネイル画像
if(!empty(get_field('thumbnail_img')['url'])){
	$thum_url = '<img src="'.get_field('thumbnail_img')['url'].'">';
}elseif(get_the_post_thumbnail($post->ID)){
	$thum_url = get_the_post_thumbnail($post->ID,'medium');
}else{
	$thum_url = '<img src="'.get_theme_file_uri().'/img/common/noimg.png'.'">';
}
 ?>
									<p class="img">
										<a href="<?php the_permalink(); ?>">
											<?php echo $thum_url; ?>
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