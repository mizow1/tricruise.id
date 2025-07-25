<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
<?php get_template_part('menu'); ?>
		<main class="lower detail<?php echo ' '.get_post_type( $post ); ?>">
			<div class="member_thanks_loading">
				<div>ページ読み込み中</div>
			</div>
		</main>
<?php get_footer(); ?>
		<div id="page_top">
			<span></span>
		</div>
		<!-- page_top end -->
	</div><!-- /#wrapper -->
<?php get_template_part('before_close_body'); ?>
<?php wp_footer(); ?>
</body>
</html>