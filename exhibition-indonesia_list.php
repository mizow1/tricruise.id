<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
<?php get_template_part('menu'); ?>
		<main id="voice" class="lower">
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

?>

					
						<ul class="exhibition-indonesia_list">
<?php 
$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
$args = array(
	'posts_per_page'=>10,
	'post_type'=>'exhibition-indonesia',
	'orderby'=>'meta_value',
    'meta_key'=>'exhibition_start_day',
	'order'=>'DESC',
	'paged'=>$paged,
    'meta_query'=>[
        [
        'key'=>'exhibition_start_day',
        'value'=>date('Ymd'),
        'compare'=>'<',
        'inclusive'=>true,
        ]
    ]

);
$posts_arr = new WP_Query($args);

foreach($posts_arr->posts as $post):setup_postdata($post); 
?>
<article>
    <h2 class="section_title">
        <?php the_title(); ?>
    </h2>
    <?php 
    $args['post']=$post;
    get_template_part('exhibition_summary',null,$args);
    ?>
	<?php if($post->post_content):?>
    <a class="exhibition_to_detail" href="<?php the_permalink(); ?>">詳細はこちら</a>
	<?php endif; ?>
</article>

<?php endforeach;?>
<?php 

$GLOBALS['wp_query']->max_num_pages = $posts_arr->max_num_pages;
get_template_part('pager');
?>

</ul>
<!-- exhibition-indonesia_list end -->	

<?php wp_reset_query(); ?>
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