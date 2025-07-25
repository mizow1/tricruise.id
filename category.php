<?php 
if($_GET['a']){
	echo "<!--";var_dump('category-3ee');echo "-->"; 
ini_set('display_errors',1);
}
 ?>
<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
<?php get_template_part('menu'); ?>
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
if($_GET['a']){
	ini_set('display_errors',1);
	echo "<!--";var_dump('category-20ee');echo "-->"; 
}

 ?>
<?php 
$category_detail = get_queried_object();

// $paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
$paged = $_GET['page']>0?$_GET['page']:1;
$per_page = 4;
$start_post_count = ($paged-1)*$per_page;
$end_post_count = $start_post_count+$per_page; 


$args = array(
	'category_name'=>$category_detail->slug,
	'posts_per_page'=>-1,
	'post_type'=>['interview','column','client'],
	'orderby'=>'date',
	'order'=>'DESC',
	// 'paged'=>$paged
);
$posts_arr = new WP_Query($args);
 ?>
					<div class="bg">
						<h2 class="tag_result">「<?php echo $category_detail->name; ?>」カテゴリーの記事：<?php echo $posts_arr->found_posts; ?>件</h2>
						
						<ul class="voice_list">

<?php 
for($i=$start_post_count;$i<$end_post_count;$i++):
	$post = $posts_arr->posts[$i];
	if(!empty($post)):
 ?>
							<li>
								<div class="box">
									<p class="img">
										<a href="<?php echo get_permalink($post->ID); ?>">
											<?php if(get_the_post_thumbnail($post->ID)){echo get_the_post_thumbnail($post->ID,'medium');}else{echo '<img src="'.get_theme_file_uri().'/img/common/noimg.png'.'">';} ?>
										</a>
									</p>
									<div class="txt_box">
										<p class="ttl"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></p>
										<?php if(get_the_tags($post->ID)): ?>
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
												<dd><?php echo get_the_time('Y/m/d',$post->ID); ?></dd>
											</dl>
											<dl>
												<dt>更新日</dt>
												<dd><?php echo get_the_modified_date('Y/m/d',$post->ID); ?></dd>
											</dl>
										</div>
									</div>
								</div>
								<div class="com">
									<p class="txt"><?php the_excerpt(); ?></p>
									<a href="<?php the_permalink(); ?>" class="more">続きを読む</a>
								</div>
							</li>
<?php 
endif;
endfor;
?>
						</ul>
						<!-- voice_list end -->	

<?php 
// $GLOBALS['wp_query']->max_num_pages = $posts_arr->max_num_pages;
$args['total_count'] = $posts_arr->found_posts;
$args['start_count'] = $start_post_count;
$args['end_count'] = $end_post_count;
$args['per_page'] = $per_page;
$now_url = empty($_SERVER['HTTPS']) ? 'http://' : 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$args['now_url'] = explode('?',$now_url)[0];
$args['paged'] = $paged;
get_template_part('pager_category',null,$args);
?>
<?php wp_reset_query(); ?>
					</div><!-- bg end -->	
				</div>
				<!-- /.contents_box -->

<?php get_template_part('contact'); ?>
<?php get_template_part('about'); ?>
<?php get_footer(); ?>
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