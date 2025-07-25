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
<?php get_template_part('menu'); ?>
		<main id="<?php echo $post->post_name; ?>" class="lower">
			<article>
<?php 
$qa_q = explode("\n",get_field('qa_question'));
$qa_a = explode("\n",get_field('qa_answer'));
if($qa_q[0]&&$qa_a[0]):
foreach($qa_q as $key=>$val):
?>
<section class="universal_qa">
	<dl>
		<dt>
			<span class="icon"></span><?php echo $qa_q[$key]; ?>
		</dt>
		<dd>
			<span class="icon"></span><?php echo $qa_a[$key]; ?>
		</dd>
	</dl>
</section>
<?php endforeach; ?>
<?php endif; ?>

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

				<section id="textpage" class="area main_width_<?php echo $main_width; ?>">
				<div class="inner">


					<?php
					$args['post_type'] = 'exhibition-indonesia';
					$args['result_url'] = get_the_permalink();
					get_template_part('search',null,$args);
					?>

<?php 
					$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
					$s_query_args = array(
						'posts_per_page'=>-1,//実際のperpage指定は後述$posts_per_page
						'post_type'=>'exhibition-indonesia',
						'orderby'=>'meta_value',
						'meta_key'=>'exhibition_start_day',
						'order'=>'DESC',
						'paged'=>$paged,
						's'=>$_GET['order_keyword'],
						'meta_query'=>[
							[
							'key'=>'exhibition_start_day',
							'value'=>date('Ymd'),
							'compare'=>'>=',
							'inclusive'=>true,
							]
						]
					);
					$s_query = new WP_Query( $s_query_args );
					$s_query_posts = $s_query->get_posts();
					$s_max_num_pages = $s_query->max_num_pages;
					wp_reset_postdata();

					//取得した投稿のIDだけの配列
					foreach($s_query->posts as $val){
						$s_query_id[] = $val->ID;
					}

					$meta_query_args = array(
						'posts_per_page'=>-1,//実際のperpage指定は後述$posts_per_page
						'post_type'=>'exhibition-indonesia',
						'orderby'=>'meta_value',
						'meta_key'=>'exhibition_start_day',
						'order'=>'DESC',
						'paged'=>$paged,
						'meta_query'=>[
							'relation'=>'AND',
							[
								[
									'key'=>'exhibition_start_day',
									'value'=>date('Ymd'),
									'compare'=>'>=',
									'inclusive'=>true,
								]
							],
							[
								'relation'=>'OR',
								[
									'key'=>'exhibition_name_jp',
									'value' => $_GET['order_keyword'],
									'compare' => 'LIKE'
								],
								[
									'key'=>'exhibition_area',
									'value' => $_GET['order_keyword'],
									'compare' => 'LIKE'
								],
								[
									'key'=>'exhibition_place',
									'value' => $_GET['order_keyword'],
									'compare' => 'LIKE'
								],
								[
									'key'=>'exhibition_item',
									'value' => $_GET['order_keyword'],
									'compare' => 'LIKE'
								],
								[
									'key'=>'exhibition_author',
									'value' => $_GET['order_keyword'],
									'compare' => 'LIKE'
								],
								[
									'key'=>'exhibition_url',
									'value' => $_GET['order_keyword'],
									'compare' => 'LIKE'
								]
							]

						]
					);
					$meta_query = new WP_Query( $meta_query_args );
					$meta_query_posts = $meta_query->get_posts();
					$meta_max_num_pages = $meta_query->max_num_pages;

					//取得した投稿のIDだけの配列
					foreach($meta_query->posts as $val){
						$meta_query_id[] = $val->ID;
					}

					$s_query_id = $s_query_id?$s_query_id:[];
					$meta_query_id = $meta_query_id?$meta_query_id:[];

					$posts_arr_id = array_merge( $s_query_id, $meta_query_id );
					$posts_arr = array_merge( $meta_query_posts, $s_query_posts );

					$unique_posts = array_unique($posts_arr, SORT_REGULAR);
					$posts_per_page = 10; // 1ページあたりの表示数
					$total_posts = count($unique_posts);
					$max_num_pages = ceil($total_posts / $posts_per_page);
					
					// ページごとの記事データの取得
					$paged = get_query_var('paged') ? get_query_var('paged') : 1;
					$offset = ($paged - 1) * $posts_per_page;
					$current_page_posts = array_slice($unique_posts, $offset, $posts_per_page);


					foreach($current_page_posts as $post):setup_postdata($post);
					?>
					<article class="tenji_item">
						<h2 class="section_title">
							<?php the_title(); ?>
						</h2>
						<?php
						$args['post']=$post;
						get_template_part('exhibition_summary',null,$args);
						?>
						<?php if($post->post_content):?>
						<a class="exhibition_to_detail" href="<?php the_permalink(); ?>">詳細はこちら</a>
						<?php endif; ?>
					</article>
					<?php endforeach; ?>
					<?php 
					wp_reset_postdata();
					?>
				

				
				
				<h2>展示会・イベント出展支援</h2>
				<div class="tenji_contents">
	
						<!--1-->
						<div class="tenji_contents_box_wrap">
						<div class="tenji_contents_box tenji_contents_box01">
							<div class="tenji_contents_box_L tenji_contents_box_L01">
								<div class="tenji_contents_box_L_inner">
								<span class="tenji_contents_box_L_txt">立案・準備</span>
								</div>
							</div>
							<div class="tenji_contents_box_R">
								<p class="tenji_contents_box_ttl">展示会選定から商品の選定、価格設定などのアドバイスを行います。</p>
								<span class="tenji_contents_box_sv">サービス例</span>
								<p class="tenji_contents_box_txt">出展物および価格設定に関するアドバイス、会場、什器備品、ポスター・パンフレット類、現地スタッフ、価格リスト、アンケートなどの展示会手配</p>
								<dl class="tenji_contents_box_price">
									<dt><img src="https://tricruise.id/wp/wp-content/themes/kakemochi/img/overseas-expansion/exhibition-in-indonesia/price_plan.png" alt="料金プラン"></dt>
									<dd>
										<p class="tenji_contents_box_price_ttl">立案・準備のみ</p>
										<p class="tenji_contents_box_price_price">100,000<span>円（税抜）</span></p>
									</dd>
								</dl>
							</div>
							<div class="tenji_contents_box_img tenji_contents_box_img01"><img src="https://tricruise.id/wp/wp-content/themes/kakemochi/img/overseas-expansion/exhibition-in-indonesia/ev_img01.png" alt="イメージ"></div>
						</div>
						</div>
						<!--//1-->
						
						
						
						<!--2-->
						<div class="tenji_contents_box_wrap">
						<div class="tenji_contents_box tenji_contents_box02">
							<div class="tenji_contents_box_L tenji_contents_box_L02">
								<div class="tenji_contents_box_L_inner">
								<span class="tenji_contents_box_L_txt">展示会<br class="sp">開催</span>
								</div>
							</div>
							<div class="tenji_contents_box_R">
								<p class="tenji_contents_box_ttl">貴社の商品を弊社が代行してプレゼンテーション、商談代行します。</p>
								<span class="tenji_contents_box_sv">サービス例</span>
								<p class="tenji_contents_box_txt">全体運営管理、商談代行・支援、来訪者名刺・アンケート回収・集計など</p>
								<dl class="tenji_contents_box_price">
									<dt><img src="https://tricruise.id/wp/wp-content/themes/kakemochi/img/overseas-expansion/exhibition-in-indonesia/price_plan.png" alt="料金プラン"></dt>
									<dd>
										<p class="tenji_contents_box_price_ttl">立案・準備～展示会期間中のサポート</p>
										<p class="tenji_contents_box_price_price">300,000<span>円（税抜）</span></p>
									</dd>
								</dl>
							</div>
							<div class="tenji_contents_box_img tenji_contents_box_img02"><img src="https://tricruise.id/wp/wp-content/themes/kakemochi/img/overseas-expansion/exhibition-in-indonesia/ev_img02.png" alt="イメージ"></div>
						</div>
						</div>
						<!--//2-->
						
						
						<!--3-->
						<div class="tenji_contents_box_wrap">
						<div class="tenji_contents_box tenji_contents_box03">
							<div class="tenji_contents_box_L tenji_contents_box_L03">
								<div class="tenji_contents_box_L_inner">
								<span class="tenji_contents_box_L_txt">フォロー<br class="sp">営業<span class="small">(販路開拓)</span></span>
								</div>
							</div>
							<div class="tenji_contents_box_R">
								<p class="tenji_contents_box_ttl">継続的なビジネスにつなげるため、その後のフォロー営業も代行いたします。</p>
								<span class="tenji_contents_box_sv">サービス例</span>
								<p class="tenji_contents_box_txt">展示会で獲得したバイヤー（候補）等へのフォロー営業、バイヤーとの契約締結支援、成約後の貿易代行および顧客関係維持など</p>
								<dl class="tenji_contents_box_price">
									<dt><img src="https://tricruise.id/wp/wp-content/themes/kakemochi/img/overseas-expansion/exhibition-in-indonesia/price_plan.png" alt="料金プラン"></dt>
									<dd>
										<p class="tenji_contents_box_price_ttl">フルサポート</p>
										<p class="tenji_contents_box_price_price">500,000<span>円（税抜）</span></p>
									</dd>
								</dl>
							</div>
							<div class="tenji_contents_box_img tenji_contents_box_img03"><img src="https://tricruise.id/wp/wp-content/themes/kakemochi/img/overseas-expansion/exhibition-in-indonesia/ev_img03.png" alt="イメージ"></div>
						</div>
						</div>
						<!--//3-->

					</div><!-- /.tenji_contents -->

				</div><!-- /.tenji_contents -->

				<?php 
				$GLOBALS['wp_query']->max_num_pages = $max_num_pages;
				get_template_part('pager');
				 ?>

				<div class="exhibition_past_leading">
					過去に開催された展示会情報は<a href="<?php echo home_url(); ?>/exhibition-indonesia/?mode=list">こちら</a>
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
<?php get_footer(); ?>
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
