<?php
/*
Template Name: 規約系テンプレート
*/
?>
<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
<?php get_template_part('menu'); ?>
		<main id="<?php echo $post->post_name; ?>" class="lower">
			<article>

<?php $mv = get_the_post_thumbnail_url($post->ID, "full"); ?>
<?php if($mv): ?>
<div id="visual01" class="area"<?php if(get_the_post_thumbnail_url($post->ID, "full")){echo ' style="background-image:url('.$mv.')"';} ?>>
	<div class="inner">
		<h1 class="ttl"><?php the_title(); ?></h1>
		<?php if(get_field('mv_text')): ?>
			<p class="visual_txt"><?php echo (get_field('mv_text')); ?></p>
		<?php endif; ?>
		<?php if(get_field('mv_btn_url')): ?>
			<a href="<?php echo get_field('mv_btn_url'); ?>" class="visual_btn_dl">
				<img src="<?php echo get_field('mv_btn_img')['url']; ?>" alt="<?php echo get_field('mv_btn_alt'); ?>">
			</a>
		<?php endif; ?>
	</div>
</div>
<!-- visual end -->		
<?php endif; ?>

<?php
if(get_field('bread_crumb_html')){
	echo get_field('bread_crumb_html');
}else{
	breadcrumb();
}
?>

				<section id="textpage" class="area"<?php if(get_field('main_width')>0){echo ' style="width:'.get_field('main_width').'%;margin:0 auto;"';} ?>>
					<div class="inner">
						<?php if(get_field('page_sub_title')): ?>
						<div class="textpage_section">
							<h2 class="text_p_ttl"><?php echo get_field('page_sub_title'); ?></h2>
						</div>
						<?php endif; ?>
						
						<?php if(get_field('index_on')=='表示する'): ?>
						<?php $matches = get_index(); ?>
						<?php $matches = get_index() ? get_index() : array(); ?>
						<?php if(count($matches) > 1): ?>
						<div class="text_page_index_box">
							<p class="text_page_index_ttl">目次</p>
							<ul class="text_page_index">
								<?php foreach($matches as $key => $val): ?>
								<li >
									<a href="#h3-<?php echo $key; ?>">
									<?php echo $val; ?>
									</a>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endif; ?>
						<?php endif; ?>

						<?php the_content(); ?>
					</div>
				</section>
				<!-- member01 end -->	
				
				<?php if(!is_category(60, 453,62)) : ?>
				<?php get_template_part('link_terms'); ?>
				<?php endif; ?>
				
			</article>
			<!-- article end -->
		</main>
		<!-- main end -->
<?php if($post->post_name != 'contact' && $post->post_name != 'sales'): ?>
<?php get_template_part('contact'); ?>
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