<?php 
$post_type = 'notice';
$paged = $_GET['paged']?$_GET['paged']:1;
$args = array(
	'post_type'=>$post_type,
	'posts_per_page'=>5
);
$posts_arr = new WP_Query($args);

?>

<div class="list_post">
<?php 
foreach($posts_arr->posts as $post):setup_postdata($post);

//サムネイル画像
if(!empty(get_field('thumbnail_img')['url'])){
	$thum_url = get_field('thumbnail_img')['url'];
}elseif(get_the_post_thumbnail($post->ID)){
	$thum_url = get_the_post_thumbnail_url($post->ID,'medium');
}else{
	$thum_url = get_theme_file_uri().'/img/common/noimg.png';
}
?>

	<div class="mypage_btncontents">
		<div class="mypage_btncontents_img">
			<a href="<?php the_permalink(); ?>"><img decoding="async" src="<?php echo $thum_url; ?>" alt="" data-eio="l"></noscript></a>
		</div>
		<div class="mypage_btncontents_txt">
			<p class="mypage_btncontents_day"><?php the_time('Y年n月j日 H:i'); ?></p>
			<p class="mypage_btncontents_ttl"><?php the_title(); ?></p>
			<p class="mypage_btncontents_txt">
				<?php the_excerpt();?>
			</p>
			<p class="mypage_btncontents_btn"><a href="<?php the_permalink(); ?>">詳細はこちら</a></p>
		</div>
	</div>
	<?php endforeach; ?>
</div><!-- /.list_post -->
