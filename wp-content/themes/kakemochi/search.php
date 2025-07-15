<?php
$post_type = $args['post_type'];
$now_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// $result_url = !empty($args['url'])?$args['url']:$now_url;
$result_url = !empty($args['result_url']) ? $args['result_url'] : home_url() . '/search_result/'; //常に検索結果ページ専用URLへ移動

$parent_category = get_category_by_slug('for-column');
$parent_id = $parent_category ? $parent_category->term_id : 0;
$args = array(
	'exclude' => '58,1',
	'parent' => $parent_id, // コラム用カテゴリーのみ対象
);
$categories = get_categories($args);


$order_keyword = !empty($_GET['order_keyword']) ? $_GET['order_keyword'] : '';
$order_category = [];
if (!empty($_GET['order_category'])) {
	//カテゴリー名からカテゴリー番号取得するための配列
	foreach ($categories as $val) {
		$category_name_to_id[$val->name] = $val->term_id;
	}
	foreach ($_GET['order_category'] as $val) {
		if (!empty($val)) { // 空でないか確認
			$order_category[] = $category_name_to_id[$val];
		}
	}
	$order_category = implode(',', $order_category);
}

?>

<div id="case" class="search_box_02">
	<div class="notice">
	Category:optional / keyword mandatory
	</div>
	<article>

		<section id="case01" class="area">
			<form action="<?php echo $result_url; ?>#case">
				<div class="inner">
					<div class="box">
						<?php if ($post_type != 'exhibition-indonesia'): ?>
							<dl>
								<dt>Category</dt>
								<dd>
									<select name="order_category[]" class="search_select">
										<option value="">Category</option>
										<?php foreach ($categories as $category): ?>
											
											<option value="<?php echo $category->name; ?>" <?php if (array_key_exists('order_category', $_GET)) {
																								if (in_array($category->name, $_GET['order_category'], true)) {
																									echo ' selected';
																								}
																							} ?>><?php echo $category->name; ?></option>
										<?php endforeach; ?>
									</select>
								</dd>
							</dl>
						<?php endif; ?>
						<dl>
							<dt>keyword</dt>
							<dd>
								<input type="text" name="order_keyword" value="<?php echo $order_keyword; ?>" placeholder="Keyword">
							</dd>
						</dl>
					</div>
					<?php wp_nonce_field('search_nonce', 'nonce'); ?>

					<input type="submit" name="submit" value="Search" class="btn_search">
				</div>
			</form>
		</section>
		<!-- case01 end -->




		<?php
		//2024/1/21用途不明＆コラム検索結果で不要なコンテンツとして出現するため一旦無効化
		if (1==2):
		// if (!empty($_GET['nonce']) && $post_type != 'exhibition-indonesia'):
		?>
			<section id="common_case_area" class="area">
				<div class="inner">
					<?php
					$paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
					if (!array_key_exists('order_category', $_GET)) {
						$_GET['order_category'] = '';
					}
					$args = array(
						'posts_per_page' => 15,
						'post_type' => 'any',
						'cat' => $order_category,
						's' => $order_keyword,
						'orderby' => 'date',
						'order' => 'DESC',
						'paged' => $paged,
						// 'tag_slug__and'=>$_GET['order_category']
					);
					$posts_arr = new WP_Query($args);
					if ($posts_arr->posts):
					?>
						<div class="bg">
							<ul class="voice_list">
								<?php
								foreach ($posts_arr->posts as $post): setup_postdata($post);
								?>
									<li>
										<div class="box">
											<?php if (get_post_meta($post->ID, 'thumbnail_img', true)): ?>
												<?php $thum_img = get_field('thumbnail_img');
												$thum_url = $thum_img['url'];
												?>
												<p class="img">
													<a href="<?php the_permalink(); ?>">
														<img src="<?php echo $thum_url; ?>">
													</a>
												</p>
											<?php else: ?>
												<p class="img">
													<a href="<?php the_permalink(); ?>">
														<?php if (get_the_post_thumbnail($post->ID)) {
															the_post_thumbnail('medium');
														} else {
															echo '<img src="' . get_theme_file_uri() . '/img/common/noimg.png' . '">';
														} ?>
													</a>
												</p>
											<?php endif; ?>
											<div class="txt_box">
												<p class="ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
												<?php if (get_the_tags()): ?>
													<div class="tag_box">
														<?php
														$tags = get_the_tags($post->ID);
														if ($tags) {
															foreach ($tags as $tag) {
																echo '<a href="' . get_tag_link($tag->term_id) . '">#' . $tag->name . '</a>';
															}
														}
														?>
													</div>
												<?php endif; ?>
												<div class="date_box">
													<dl>
														<dt>公開</dt>
														<dd><?php the_time('Y/m/d'); ?></dd>
													</dl>
													<dl>
														<dt>更新</dt>
														<dd><?php the_modified_date('Y/m/d'); ?></dd>
													</dl>
												</div>
											</div>
										</div>
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
		<?php endif; //nonce 
		?>

	</article>
	<!-- article end -->
</div><!-- case end -->