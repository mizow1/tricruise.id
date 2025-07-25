<?php
/*
Template Name: コラム記事一覧
*/
?>
<?php get_header(); ?>
<body class="column_bg">
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
		<main id="voice" class="lower inner1600">
<?php 
//サイドバーの任意指定があれば
if(get_post_meta(get_the_ID())['sidebar'][0]){
	$sidebar = str_replace('.php','',get_post_meta(get_the_ID())['sidebar'][0]);
}else{
	//カテゴリーに応じたサイドバーがあれば
	if(file_exists(get_template_directory().'/parts/side_bar/'.$category.'.php')){
		$sidebar = $category;
	//どちらもなければデフォルトサイドバー
	}else{
		$sidebar = 'side_bar';
	}
}
get_template_part('parts/side_bar/'.$sidebar);
 ?>

			<article id="contents">
				<div class="contents_box">
					
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
	'posts_per_page'=>10,
	'post_type'=>'column',
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
	$thum_url = get_field('thumbnail_img')['url'];
}elseif(get_the_post_thumbnail($post->ID)){
	$thum_url = get_the_post_thumbnail_url($post->ID,'medium');
}else{
	$thum_url = get_theme_file_uri().'/img/common/noimg.png';
}
 ?>
									<p class="img">
										<a href="<?php the_permalink(); ?>">
											<img src="<?php echo $thum_url; ?>">
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
												<dt>Publish</dt>
												<dd><?php the_time('Y/m/d'); ?></dd>
											</dl>
											<dl>
												<dt>Update</dt>
												<dd><?php the_modified_date('Y/m/d'); ?></dd>
											</dl>
										</div>
									</div>
								</div>
								<div class="com">
									<p class="txt"><?php the_excerpt(); ?></p>
									<a href="<?php the_permalink(); ?>" class="more">Read More</a>
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