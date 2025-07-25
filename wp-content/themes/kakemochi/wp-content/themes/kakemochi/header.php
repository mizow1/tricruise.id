<?php 
$ogp_url = get_field('ogp_img')?get_field('ogp_img')['url']:get_theme_file_uri().'/img/ogp.jpg';

//会員登録後に元のページに戻るための記録（ログイン、登録ページ、member-thanks以外の投稿と固定ページが対象）
if((is_page()||is_singular(['member','interview','column','post','video']))&&!is_page([2360])&&!is_page([2362])&&!is_single('member-thanks')){
	unset($_SESSION['from_page']);
	$_SESSION['from_page'] = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$_SESSION['from_page'] = $_SESSION['from_page'].'#more-'.$post->ID;//続きを読む箇所からスタートさせるページ内リンク
}

//member_login専用
if(is_page('member_login')&&is_user_logged_in()){
	wp_safe_redirect(home_url().'/member_entry/');
}

//member-thanks専用
$redirect_url = !empty($_SESSION['from_page']) ? $_SESSION['from_page'] : home_url();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<script src="https://cdn-blocks.karte.io/f59edc9e0316b0a01ecd5513eb764541/builder.js"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="keywords" content="">
	<?php if(is_single('member-thanks')): ?>
	<meta http-equiv="refresh" content="1; url=<?php echo $redirect_url; ?>">
	<?php endif; ?>
	<?php if(get_field('meta_description')): ?>
	<meta name="description" content="<?php echo get_field('meta_description') ?>">
	<?php endif; ?>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap" rel="stylesheet">
	<!-- webfont end -->
	<link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/css/base.css">
	<link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/css/global_nav.css">
	<!-- css end -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="<?php echo get_theme_file_uri(); ?>/js/function.js"></script>
	<script src="<?php echo get_theme_file_uri(); ?>/js/matchHeight/matchHeight.js"></script>
	<script src="<?php echo get_theme_file_uri(); ?>/js/clipboard.min.js"></script>
	<script src="https://kit.fontawesome.com/0f54251b17.js" crossorigin="anonymous"></script>
	<script src="<?php echo get_theme_file_uri(); ?>/js/pageIndex.js"></script>
	<script src="<?php echo get_theme_file_uri(); ?>/js/header.js"></script>
	<script src="<?php echo get_theme_file_uri(); ?>/js/footer.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo get_theme_file_uri(); ?>/js/colorbox/colorbox.css">
	<script src="<?php echo get_theme_file_uri(); ?>/js/colorbox/colorbox.min.js"></script>
	<!-- colorbox end -->
	<!-- js end -->
    <link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/js/slick/slick.css">
	<script src="<?php echo get_theme_file_uri(); ?>/js/slick/slick.min.js"></script>
	<?php if($post->post_name=='member_entry'): ?>
	<script src="<?php echo get_theme_file_uri(); ?>/js/side_bar.js"></script>
	<?php endif; ?>
	<script src="<?php echo get_theme_file_uri(); ?>/js/slick.op.js"></script>
	<meta property="og:title" content="<?php if(!is_front_page()){echo wp_title();}else{echo bloginfo('name');} ?>">
	<meta property="og:type" content="website">
	<meta property="og:description" content="<?php if(get_field('meta_description')){echo get_field('meta_description');} ?>">
	<meta property="og:url" content="<?php echo the_permalink(); ?>">
	<meta property="og:image" content="<?php echo $ogp_url ?>">
	<meta property="og:site_name" content="<?php echo bloginfo('name'); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta property="twitter:title" content="<?php if(!is_front_page()){echo wp_title();}else{echo bloginfo('name');} ?>">
	<meta property="twitter:description" content="<?php if(get_field('meta_description')){echo get_field('meta_description');} ?>">
	<meta property="twitter:image" content="<?php echo $ogp_url ?>">

	<!-- ogp end -->
<?php wp_head(); ?>
<?php get_template_part('before_close_head'); ?>
	<?php if(get_post_meta($post->ID, 'thumbnail_img',true)):?>
        <?php $thum_img = get_field('thumbnail_img');
                $thumbnail_image = $thum_img['url'];?>
	<?php else:?>
        <?php if (is_single() && has_post_thumbnail($post->ID)) {
            $thumbnail_id = get_post_thumbnail_id($post->ID);
            $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
            $thumbnail_image = $image[0];
          } else {
            $thumbnail_image = get_template_directory_uri().'/img/thumbnail.png';
          }
        ?>
<?php endif;?>
<meta name="thumbnail" content="<?php echo $thumbnail_image; ?>">
</head>