<?php 
/**
 * Template Name: PDF
 */

 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="keywords" content="">
	<?php if(get_field('meta_description')): ?>
	<meta name="description" content="<?php echo get_field('meta_description') ?>">
	<?php endif; ?>
	<link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/css/base.css">
	<link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/css/style.css">
	<!-- css end -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="<?php echo get_theme_file_uri(); ?>/js/pdf.js"></script>
	<!-- js end -->
	<meta property="og:title" content="<?php if(!is_front_page()){echo wp_title();}else{echo bloginfo('name');} ?>">
	<meta property="og:type" content="website">
	<meta property="og:description" content="<?php if(get_field('meta_description')){echo get_field('meta_description');} ?>">
	<meta property="og:url" content="<?php echo the_permalink(); ?>">
	<meta property="og:image" content="<?php echo get_theme_file_uri(); ?>/img/ogp.jpg">
	<meta property="og:site_name" content="<?php echo bloginfo('name'); ?>">
	<!-- ogp end -->
<?php wp_head(); ?>
<?php get_template_part('before_close_head'); ?>
</head>
<body>
<?php get_template_part('after_open_body'); ?>
	<iframe<?php if(get_field('main_width')>0){echo ' style="display:block;width:'.get_field('main_width').'%;margin:0 auto;"';} ?>  class="pdf_window" src="<?php echo get_field('file'); ?>"></iframe>
	<a download href="<?php echo get_field('file'); ?>" class="pdf_download">
		PDFのダウンロードはこちら
	</a>
<?php 
$args['sidebar']=$sidebar;
get_footer('',$args);
?>

<?php get_template_part('before_close_body'); ?>
<?php wp_footer(); ?>
</body>
</html>