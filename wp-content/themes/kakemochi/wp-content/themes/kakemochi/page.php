<?php 
//画像未指定メインビジュアルの指定値
$bg = get_field('no_img_main_visual_bg') ? get_field('no_img_main_visual_bg'):'#ee7800';
$mv_txt_1 = get_field('no_img_main_visual_text_1') ? get_field('no_img_main_visual_text_1'):'インドネシアへの越境EC<br>を本気で検討しませんか？';
$mv_txt_2 = get_field('no_img_main_visual_text_2') ? get_field('no_img_main_visual_text_2'):'10万円からの現地ECモール出店支援';
$mv_txt_3 = get_field('no_img_main_visual_text_3') ? get_field('no_img_main_visual_text_3'):'国際物流<br>丸投げ可';
$mv_txt_4 = get_field('no_img_main_visual_text_4') ? get_field('no_img_main_visual_text_4'):'顧客対応<br>丸投げ可';
$mv_btn_caption = get_field('no_img_main_visual_btn_caption') ? get_field('no_img_main_visual_btn_caption'):'ご相談は無料';
$mv_btn_txt = get_field('no_img_main_visual_btn_txt') ? get_field('no_img_main_visual_btn_txt'):'お問い合わせはこちらから';
$mv_btn_url = get_field('no_img_main_visual_btn_url') ? get_field('no_img_main_visual_btn_url'):'/contact/';
$default_img_path = '/wp-content/themes/kakemochi/img/cross-border-e-commerce/visual_img.png';
$mv_img = $default_img_path;
$no_img_main_visual_img = get_field('no_img_main_visual_img');
if(is_array($no_img_main_visual_img) && isset($no_img_main_visual_img['url'])) {
    $mv_img = $no_img_main_visual_img['url'];
}
if(get_the_post_thumbnail_url()){
	$mv_img = get_the_post_thumbnail_url();
}elseif(is_array($no_img_main_visual_img) && isset($no_img_main_visual_img['url'])){
	$mv_img = $no_img_main_visual_img['url'];
}else{
	// 相対パスを使用
	$mv_img = $default_img_path;
}
$main_width = get_field('main_width')>0 ? str_replace('%','',get_field('main_width')) : 100;

//メインビジュアルニュース
$main_news_tmp1 = get_field('main_visual_news');
if($main_news_tmp1){
	$main_news_tmp2 = explode("\n",$main_news_tmp1);
	foreach($main_news_tmp2 as $val){
		$main_news[] = explode(',',$val);
	}
}

 ?>
<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
		<main id="<?php echo $post->post_name; ?>" class="lower">
			<article>
<?php if(!is_page('member_edit')): ?>
<?php $mv = get_the_post_thumbnail_url($post->ID, "full"); ?>
<?php if($mv&&get_field('main_visual_on_off')!=2): ?>
	<div id="visual01" class="area"<?php if(get_the_post_thumbnail_url($post->ID, "full")){echo ' style="background-image:url('.$mv.')"';} ?>>
	</div>
	<!-- visual end -->		
<?php elseif('post' != get_post_type() && !is_page('member_login')&&get_field('main_visual_on_off')!=2): ?>
	<div id="visual" class="area default_main_visual" style="background: <?php echo $bg; ?>;">
		<div class="inner">
			<div class="txt_box">
				<h1 class="ttl">
					<?php echo $mv_txt_1 ?>
				</h1>
				<p class="visual_txt">
					<?php echo $mv_txt_2 ?>
				</p>
				<ul>
					<li><?php echo $mv_txt_3 ?></li>
					<li><?php echo $mv_txt_4 ?></li>
				</ul>
				<div class="btn_ttl">
					<div class="prefix">＼</div>
					<div class="btn_ttl_contents">
						<?php echo $mv_btn_caption; ?>
					</div>
					<div class="suffix">／</div>
				</div>
				<div class="visual_btn_dl">
					<a href="<?php echo $mv_btn_url ?>">
						<i class="fa-solid fa-hand-point-right font_awesome"></i>
						<span><?php echo $mv_btn_txt ?></span>
					</a>
				</div>
			</div>
			<div class="img_box">
				<p class="img">
					<img src="<?php echo $mv_img ?>" alt="" class="pc"><img src="<?php echo $mv_img ?>" alt="" class="sp">
				</p>
				<?php if($main_news): ?>
				<div class="visual_news_box">
					<ul>
						<?php foreach($main_news as $val): ?>
							<li><?php echo $val[0]; ?>　<a href="<?php echo $val[2]; ?>"><?php echo $val[1]; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div><!-- /.visual_news_box -->
				<?php endif; ?>
			</div><!-- /.img_box -->
		</div>
	</div>
	<!-- visual end -->	
<?php endif; ?>
<?php endif; ?>

<?php
if(get_field('bread_crumb_html')){
	echo get_field('bread_crumb_html');
}else{
	breadcrumb();
}
?>
<?php
//進出支援、集客支援配下のページはお客様の声を表示
$url = get_the_permalink();
if (strpos($url, 'overseas-expansion') !== false || strpos($url, 'digital-marketing') !== false || strpos($url, '/lp/') !== false) {
	get_template_part('parts/client_summary');
}
echo "<!--";var_dump('105ee');echo "-->";
?>

				<section id="textpage" class="area main_width_<?php echo $main_width; ?>">
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
				
			</article>
			<!-- article end -->
		</main>
		<!-- main end -->
<?php if($post->post_name != 'contact' && $post->post_name != 'sales'): ?>
<?php get_template_part('parts/contact/contact'); ?>
<?php get_template_part('about'); ?>
<?php endif; ?>
<?php 
$sidebar = ''; // $sidebar変数を初期化
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