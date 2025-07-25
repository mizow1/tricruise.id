<?php
/*
Template Name: お客様の声記事一覧
*/
?>
<?php get_header(); ?>
<?php get_template_part('after_open_body'); ?>
<body>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
		<main id="voice" class="lower">
<?php get_template_part('side_bar'); ?>
			<article id="contents">
				<div class="contents_box">
<?php
if(get_field('bread_crumb_html')){
	echo get_field('bread_crumb_html');
}else{
	breadcrumb();
}
?>

				

					<div id="case">
			<article>
				<div id="visual01" class="area">
					<div class="inner">
						<h1 class="ttl">お客様の声を紹介</h1>
						<p class="visual_txt">訪日インバウンド支援や海外進出支援などで<br>弊社が支援させていただいたお客様の事例一覧です。</p>
						<a href="#" class="visual_btn_dl"><img src="<?php get_theme_file_uri(); ?>/img/common/btn_download_lower.png" alt="会社案内ダウンロード"></a>
					</div>
				</div>
				<!-- visual end -->		
				
				
				<section id="case01" class="area">
					<form action="<?php the_permalink(); ?>">
					<div class="inner">
						<div class="box">
							<dl>
								<dt>対策分野</dt>
								<dd>
									<label><input name="client_tag[]" type="checkbox" class="check_i" value="訪日インバウンド支援"<?php if(array_key_exists('client_tag',$_GET)){if(in_array('訪日インバウンド支援',$_GET['client_tag'],true)){echo ' checked';}} ?>> 訪日インバウンド支援</label>
									<label><input name="client_tag[]" type="checkbox" class="check_i" value="海外進出支援"<?php if(array_key_exists('client_tag',$_GET)){if(in_array('海外進出支援',$_GET['client_tag'],true)){echo ' checked';}} ?>> 海外進出支援</label>
									<label><input name="client_tag[]" type="checkbox" class="check_i" value="オウンドメディア運用支援"<?php if(array_key_exists('client_tag',$_GET)){if(in_array('オウンドメディア運用支援',$_GET['client_tag'],true)){echo ' checked';}} ?>> オウンドメディア運用支援</label>
									<label><input name="client_tag[]" type="checkbox" class="check_i" value="プロモーション支援"<?php if(array_key_exists('client_tag',$_GET)){if(in_array('プロモーション支援',$_GET['client_tag'],true)){echo ' checked';}} ?>> プロモーション支援</label>
								</dd>
							</dl>
							<dl>
								<dt>コンサルティングサービス</dt>
								<dd>
									<label><input name="client_tag[]" type="checkbox" class="check_i" value="多言語サイト製作"<?php if(array_key_exists('client_tag',$_GET)){if(in_array('多言語サイト製作',$_GET['client_tag'],true)){echo ' checked';}} ?>> 多言語サイト製作</label>
									<label><input name="client_tag[]" type="checkbox" class="check_i" value="翻訳業務"<?php if(array_key_exists('client_tag',$_GET)){if(in_array('翻訳業務',$_GET['client_tag'],true)){echo ' checked';}} ?>> 翻訳業務</label>
									<label><input name="client_tag[]" type="checkbox" class="check_i" value="コンテンツマーケティング"<?php if(array_key_exists('client_tag',$_GET)){if(in_array('コンテンツマーケティング',$_GET['client_tag'],true)){echo ' checked';}} ?>> コンテンツマーケティング</label>
									<label><input name="client_tag[]" type="checkbox" class="check_i" value="アクセス解析"<?php if(array_key_exists('client_tag',$_GET)){if(in_array('アクセス解析',$_GET['client_tag'],true)){echo ' checked';}} ?>> アクセス解析</label>
									<label><input name="client_tag[]" type="checkbox" class="check_i" value="SEO対策"<?php if(array_key_exists('client_tag',$_GET)){if(in_array('SEO対策',$_GET['client_tag'],true)){echo ' checked';}} ?>> SEO対策</label><br class="pc">
									<label><input name="client_tag[]" type="checkbox" class="check_i" value="広告運用"<?php if(array_key_exists('client_tag',$_GET)){if(in_array('広告運用',$_GET['client_tag'],true)){echo ' checked';}} ?>> 広告運用</label>
									<label><input name="client_tag[]" type="checkbox" class="check_i" value="SNS運用"<?php if(array_key_exists('client_tag',$_GET)){if(in_array('SNS運用',$_GET['client_tag'],true)){echo ' checked';}} ?>> SNS運用</label>
									<label><input name="client_tag[]" type="checkbox" class="check_i" value="インフルエンサーマーケティング"<?php if(array_key_exists('client_tag',$_GET)){if(in_array('インフルエンサーマーケティング',$_GET['client_tag'],true)){echo ' checked';}} ?>> インフルエンサーマーケティング</label>
								</dd>
							</dl>
							<dl>
								<dt>業界</dt>
								<dd>
									<label><input name="client_tag[]" type="checkbox" class="check_i" value="飲食業界"<?php if(array_key_exists('client_tag',$_GET)){if(in_array('飲食業界',$_GET['client_tag'],true)){echo ' checked';}} ?>> 飲食業界</label>
									<label><input name="client_tag[]" type="checkbox" class="check_i" value="ホテル業界"<?php if(array_key_exists('client_tag',$_GET)){if(in_array('ホテル業界',$_GET['client_tag'],true)){echo ' checked';}} ?>> ホテル業界</label>
								</dd>
							</dl>
						</div>
						<?php wp_nonce_field('search_nonce', 'nonce'); ?>

						<input type="submit" name="submit" value="絞り込んで検索する" class="btn_search">
					</div>
				</form>
				</section>
				<!-- case01 end -->	
				
				<section id="common_case_area" class="area">
					<div class="inner">
<?php 
$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
if(!array_key_exists('client_tag',$_GET)){
	$_GET['client_tag'] = '';
}
$args = array(
	'posts_per_page'=>15,
	'post_type'=>'client',
	'orderby'=>'date',
	'order'=>'DESC',
	'paged'=>$paged,
	'tag_slug__and'=>$_GET['client_tag']
);
$posts_arr = new WP_Query($args);
if($posts_arr->posts):
 ?>
						<ul class="case_list">
<?php 
foreach($posts_arr->posts as $post):setup_postdata($post);
 ?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<div class="img_box">
										<p class="img"><img src="<?php echo get_field('task_long_img')['url']; ?>" alt=""></p>
										<p class="logo"><img src="<?php echo get_field('logo')['url']; ?>" alt="<?php echo get_field('company'); ?>"></p>
									</div>
									<p class="ttl"><?php the_title(); ?></p>
									<p class="name"><?php echo get_field('company'); ?></p>
									
									<dl>
										<dt>課題</dt>
										<dd><?php echo get_field('task_short'); ?></dd>
									</dl>
								</a>
							</li>
<?php endforeach; ?>
						</ul>
<?php else: ?>
	<div class="not_found">条件に一致する記事はありません。</div>
<?php endif; ?>
<?php 
$GLOBALS['wp_query']->max_num_pages = $posts_arr->max_num_pages;
get_template_part('pager');
?>
<?php wp_reset_query(); ?>
					</div>
				</section>
				<!-- common_case_area end -->	
				
                
			</article>
			<!-- article end -->
		</div><!-- case end -->


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