<?php
/*
Template Name: メインビジュアルの下にお客様の声、最下部にパンくず
*/

$main_width = get_field('main_width')>0 ? str_replace('%','',get_field('main_width')) : 100;
?>
<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper" class="template_page_2">
<?php get_template_part('gnav'); ?>
		<main id="<?php echo $post->post_name; ?>" class="lower">
			<article>

				<section id="textpage" class="main_width_<?php echo $main_width; ?>">
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
									<a href="#h4-<?php echo $key; ?>">
									<?php echo $val; ?>
									</a>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endif; ?>
						<?php endif; ?>

<?php if(strpos(get_the_content(),'wp-block-read-more')) :
global $more; $more = 0;
the_content(''); ?>
<?php $more = 1;
the_content('', true );
else : the_content();
endif; ?>
					<?php get_template_part('qa'); ?>
					</div>
				</section>
				<!-- member01 end -->	
				
				<?php if(get_field('company_nav') == 'オン'): ?>
				<?php get_template_part('link_company'); ?>
				<?php endif; ?>
				

<?php
if(get_field('bread_crumb_html')){
echo get_field('bread_crumb_html');
}else{
breadcrumb();
}
?>

			</article>
			<!-- article end -->
		</main>
		<!-- main end -->
<?php if($post->post_name != 'contact' && $post->post_name != 'sales'): ?>
<?php get_template_part('parts/contact/contact'); ?>
<?php get_template_part('about'); ?>
<?php endif; ?>
<?php 
$sidebar = isset($sidebar) ? $sidebar : '';
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