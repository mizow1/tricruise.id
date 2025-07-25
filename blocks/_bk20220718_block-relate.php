<?php 
//wordpress関数を使えるようにする
require_once( dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
?>
<?php
$post_url = block_field( 'url',false );//false指定で出力ではなく取得になる
$post_id = url_to_postid($post_url);
$post_info = get_post($post_id);
$mv_img = get_field('no_img_main_visual_img',$post_id)['url'] ? get_field('no_img_main_visual_img',$post_id)['url']:get_theme_file_uri().'/img/cross-border-e-commerce/visual_img.png';

?>
<div class="other_article">
	<div class="ttl_box">
		<p class="icon"><img src="<?php echo get_template_directory_uri(); ?>/img/voice/icon_article.png" alt=""></p>
		<p class="ttl">あわせて読みたい</p>
	</div>
	<div class="box">
		<a href="<?php the_permalink($post_id); ?>">
			<p class="img">
			<?php 
			$mv = get_the_post_thumbnail_url($post_id,'thumbnail');
			if($mv){
				$post_img_url = get_the_post_thumbnail_url($post_id,'thumbnail');
			}elseif($mv_img){
				$post_img_url = $mv_img;
			}else{
				$post_img_url = get_theme_file_uri().'/img/common/noimg.png';
			}
			 ?>
			<img src="<?php echo $post_img_url;?>" alt="">
			</p>
			<div class="txt_box">
				<p class="ttl"><?php echo $post_info->post_title; ?></p>
				<p class="txt">
					<?php
					if(get_field('meta_description',$post_info->ID)){
						echo get_field('meta_description',$post_info->ID);
					}else{
						echo $post_info->post_excerpt;
					}
					?>
				</p>
			</div>
		</a>
	</div>
</div>
