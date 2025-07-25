<?php
/*
Template Name: ニュース記事一覧
*/
?>
<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
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
					<p class="top_link"><a href="<?php echo home_url(); ?>/contact/">インドネシア進出・越境EC支援中。<br class="sp">ご相談は無料です。</a></p>
<?php
if(get_field('bread_crumb_html')){
	echo get_field('bread_crumb_html');
}else{
	breadcrumb();
}
// $args['post_type'] = 'post';
// get_template_part('search',null,$args);

?>

					<!-- search_box end -->	
					<div class="bg">

<?php 
get_template_part('news');
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