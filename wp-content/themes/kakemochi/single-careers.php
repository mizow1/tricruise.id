<?php 
//画像未指定メインビジュアルの指定値
$bg = get_field('no_img_main_visual_bg') ? get_field('no_img_main_visual_bg'):'#3ea5b4';
$mv_txt_1 = get_field('no_img_main_visual_text_1') ? get_field('no_img_main_visual_text_1'):'インドネシアへの越境EC<br>を本気で検討しませんか？';
$mv_txt_2 = get_field('no_img_main_visual_text_2') ? get_field('no_img_main_visual_text_2'):'10万円からの現地ECモール出店支援';
$mv_txt_3 = get_field('no_img_main_visual_text_3') ? get_field('no_img_main_visual_text_3'):'国際物流<br>丸投げ可';
$mv_txt_4 = get_field('no_img_main_visual_text_4') ? get_field('no_img_main_visual_text_4'):'顧客対応<br>丸投げ可';
$mv_btn_caption = get_field('no_img_main_visual_btn_caption') ? get_field('no_img_main_visual_btn_caption'):'ご相談は無料';
$mv_btn_txt = get_field('no_img_main_visual_btn_txt') ? get_field('no_img_main_visual_btn_txt'):'お問い合わせはこちらから';
$mv_btn_url = get_field('no_img_main_visual_btn_url') ? get_field('no_img_main_visual_btn_url'):home_url().'/contact/';
$mv_img = get_field('no_img_main_visual_img')['url'] ? get_field('no_img_main_visual_img')['url']:get_theme_file_uri().'/img/cross-border-e-commerce/visual_img.png';
if(get_the_post_thumbnail_url()){
	$mv_img = get_the_post_thumbnail_url();
}elseif(get_field('no_img_main_visual_img')['url']){
	$mv_img = get_field('no_img_main_visual_img')['url'];
}else{
	$mv_img = get_theme_file_uri().'/img/cross-border-e-commerce/visual_img.png';
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
		<main id="<?php echo $post->post_name; ?>" class="lower<?php echo ' type_'.$post->post_type; ?>">
			<article>

<?php $mv = get_the_post_thumbnail_url($post->ID, "full"); ?>
<?php if(get_field('main_visual_on_off')!=2): ?>
<?php if($mv): ?>
	<div id="visual01" class="area"<?php if(get_the_post_thumbnail_url($post->ID, "full")){echo ' style="background-image:url('.$mv.')"';} ?>>
		<div class="inner">
			<h1 class="ttl"><?php the_title(); ?></h1>
			<?php if(get_field('mv_text')): ?>
				<p class="visual_txt"><?php echo (get_field('mv_text')); ?></p>
			<?php endif; ?>
		</div>
	</div>
	<!-- visual end -->		
<?php elseif('post' != get_post_type()): ?>
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
				<section id="textpage" class="area main_width_<?php echo $main_width; ?>">
					<article>
						<div id="careers">
							<div class="white">
								<div class="inner">
									<?php the_content(); ?>
								</div>
							</div>
							<div class="gray">
								<div class="inner">
									<h2 class="ttl01">募集要項</h2>
									<table>
										<?php 
										$field_group = acf_get_fields(2379);
										foreach($field_group as $val):
											if($val['label']=='定員'){
												$field_val = get_field($val['name']).'人';
											}else{
												$field_val = get_field($val['name']);
											}
											if(!empty(get_field($val['name']))&&$val['name']!='job_recruit_url'):
										 ?>
										<tr>
											<th><?php echo $val['label']; ?></th>
											<td><?php echo $field_val; ?></td>
										</tr>
										<?php endif; ?>
										<?php endforeach; ?>
									</table>
									 <a href="<?php echo get_field('job_recruit_url'); ?>" class="btn">
										<i class="fa-solid fa-envelope-open-text"></i> 応募する
									 </a>
								</div>
							</div>
							<div class="white">
								<div class="inner">
									<h2 class="ttl01">選考情報</h2>
									<table>
										<?php 
										$field_group = acf_get_fields(2448);
										foreach($field_group as $val):
										if(!empty(get_field($val['name']))&&$val['name']!='job_url'):
										?>
										<?php if($val['name']=='job_ flow'): ?>
										<tr>
											<th><?php echo $val['label']; ?></th>
											<td>
												<ul class="flow_entry">
													<?php $fieldData = explode("\n",get_post_meta($post->ID,$val['name'],true) );
													$i = 0;
													$tmp = $fieldData;
													foreach ($fieldData as $value){
													    if ( $value ){
													        echo '<li class="txt">' . $value . '</li>';
													    }
														if(next($tmp)){
													        echo '<li class="arrow">▼</li>';
														}											    
													    $i++;
													}?>
												</ul>											
											</td>									
										</tr>
										<?php elseif($val['name']!='job_select_url'): ?>
										<tr>
											<th><?php echo $val['label'] ?></th>
											<td><?php echo get_field($val['name']); ?> </td>
										</tr>
										<?php endif; ?>
										<?php endif; ?>
										<?php endforeach; ?>
									</table>					
									 <a href="<?php echo get_field('job_select_url'); ?>" class="btn">
										<i class="fa-solid fa-envelope-open-text"></i> 応募する
									 </a>
									 
									 <ul class="job_related_page">
									 	<?php for($i=1;$i<=4;$i++): ?>
										 	<?php if( get_field('job_related_page_id'.$i) ):?>
											 	<li class="item">
													<?php echo '<a href="'.get_permalink(get_field('job_related_page_id'.$i)).'">'; ?>
													<?php $o_img = wp_get_attachment_url(get_post_meta(get_field('job_related_page_id'.$i),'ogp_img',true));?>
													<p class="job_related_page_img">
													<?php echo '<img src="'.$o_img.'">'; ?>
													</p>
														<div class="job_related_page_txt_inner">
															<p class="job_related_page_ttl"><span class="orange">● </span><?php echo get_field('job_related_page_headline'.$i); ?></p> 
														 	<p class="txt"><?php echo get_field('job_related_page_text'.$i); ?></p>
														</div>
													</a>
											 	</li>
											<?php endif; ?>	
									 	<?php endfor; ?>
									 </ul>
									 
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

								<!-- visual end -->		

								
							</article>
						</div><!-- /.case_detail -->
				</div>




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