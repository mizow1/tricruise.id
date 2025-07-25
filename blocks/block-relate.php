<?php 
//wordpress関数を使えるようにする
require_once( dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
?>
<?php
$post_url = block_field( 'url',false );//false指定で出力ではなく取得になる
$post_id = url_to_postid($post_url);
$post_info = get_post($post_id);

//記事サムネイル適用優先順位「サムネイル画像」→「メインビジュアル画像」→「アイキャッチ」→「メインビジュアル画像」のデフォルト画像→なし
$post_img_url = null;
if(get_post_type($post_id)=='page'){
	//デフォルトメインビジュアル画像
	$post_img_url = get_theme_file_uri().'/img/cross-border-e-commerce/visual_img.png';//メインビジュアル画像のデフォルト画像
	//指定メインビジュアル画像
	$no_img_main_visual_img = get_field('no_img_main_visual_img',$post_id);
	if(is_array($no_img_main_visual_img) && isset($no_img_main_visual_img['url'])){
		$post_img_url = $no_img_main_visual_img['url'];
	}
}
if(get_the_post_thumbnail_url($post_id,'thumbnail')){
	$post_img_url = get_the_post_thumbnail_url($post_id,'thumbnail');//アイキャッチ
}
$thumbnail_img = get_field('thumbnail_img',$post_id);
if(is_array($thumbnail_img) && isset($thumbnail_img['url'])){
	$post_img_url = $thumbnail_img['url'];//サムネイル画像
}
?>
<div class="other_article">

	<div class="box">
		<div class="other_article_inner">
			<?php if($post_img_url): ?>
			<p class="img">
				<img src="<?php echo $post_img_url;?>" alt="">
			</p>
			<?php endif; ?>
			<div class="txt_box">
				<p class="ttl"><a href="<?php the_permalink($post_id); ?>"><?php echo $post_info->post_title; ?></a></p>
				<p class="txt">
					<?php
					$meta_description = get_field('meta_description',$post_info->ID);
					if(!empty($meta_description)){
						echo $meta_description;
					}else{
						echo $post_info->post_excerpt;
					}
					?>
				</p>
				<p class="other_article_more"><a href="<?php the_permalink($post_id); ?>">続きを読む</a></p>
			</div>
		</div>
	</div>
</div>
