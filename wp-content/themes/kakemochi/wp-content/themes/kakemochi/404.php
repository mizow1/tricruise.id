<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
<?php get_template_part('menu'); ?>
		<main id="preparation" class="lower">
			<article>
				<div class="breadcrumb area">
					<div class="inner">
						<ul>
							<li><a href="<?php echo home_url(); ?>">ホーム</a></li>
							<li>404 Error</li>
						</ul>
					</div>
				</div>
				<!-- breadcrumb end -->	
				<section id="textpage" class="area notfund">
					<div class="inner">
						<div class="textpage_section">
							<h3 class="text_p_ttl">404 Error</h3>
							<p class="txt">お探しのページがみつかりません。</p>
							<p class="notfund_img"><img src="<?php echo get_theme_file_uri(); ?>/img/404/404.png" alt="404 Error"></p>
							<p class="back_home"><a href="<?php echo home_url(); ?>">ホームへ戻る</a></p>
						</div>
					</div>
				</section>
				<!-- member01 end -->	
<?php get_template_part('link_company'); ?>				
				
			</article>
			<!-- article end -->
		</main>
		<!-- main end -->
<?php get_template_part('contact'); ?>
<?php get_template_part('about'); ?>
<?php 
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