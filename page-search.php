<?php
/*
Template Name: 検索結果
*/
$parent_category = get_category_by_slug('for-column');
$parent_id = $parent_category ? $parent_category->term_id : 0;
$args = array(
	'exclude' => '58,1',
	'parent' => $parent_id, // コラム用カテゴリーのみ対象
);

$categories = get_categories($args);

?>
<?php get_header(); ?>

<body>
	<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
		<?php get_template_part('gnav'); ?>
		<?php get_template_part('menu'); ?>
		<main id="voice" class="lower">
			<?php
			//サイドバーの任意指定があれば
			// if(get_post_meta(get_the_ID())['sidebar'][0]){
			$post_meta = get_post_meta(get_the_ID());
			if ($post_meta && isset($post_meta['sidebar'][0])) {
				$sidebar = str_replace('.php', '', get_post_meta(get_the_ID())['sidebar'][0]);
			} else {
				// カテゴリーに応じたサイドバーがあれば
				$category = '';
				$queried_object = get_queried_object();
				if ($queried_object instanceof WP_Post) {
					$post_categories = get_the_category($queried_object->ID);
					if (!empty($post_categories)) {
						$category = $post_categories[0]->slug;
					}
				}
				if (file_exists(get_template_directory() . '/parts/side_bar/' . $category . '.php')) {
					$sidebar = $category;
					// どちらもなければデフォルトサイドバー
				} else {
					$sidebar = 'side_bar';
				}
			}
			get_template_part('parts/side_bar/' . $sidebar);
			?>

			<article id="contents">
				<div class="contents_box">

					<?php
					if (get_field('bread_crumb_html')) {
						echo get_field('bread_crumb_html');
					} else {
						breadcrumb();
					}
					?>

					<div id="case" class="search_box_02">
						<article>
							<section id="case01" class="area">
								<form action="<?php echo home_url(); ?>/search_result/#case" method="get">
									<div class="inner">
										<div class="box">
											<dl>
												<dt>カテゴリー</dt>
												<dd>

													<select name="order_category[]" class="search_select">
														<option value="">カテゴリーを選択</option>
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
											<dl>
												<dt>キーワード</dt>
												<dd>
													<input type="text" name="order_keyword" value="<?php echo isset($_GET['order_keyword']) ? esc_attr($_GET['order_keyword']) : ''; ?>">
												</dd>
											</dl>
										</div>
										<?php wp_nonce_field('search_nonce', 'nonce'); ?>
										<input type="submit" name="submit" value="絞り込んで検索する" class="btn_search">
									</div>
								</form>
							</section>
							<!-- case01 end -->
							<?php if (isset($_GET['order_keyword']) || isset($_GET['order_category'])): ?>
								<section id="common_case_area" class="area">
									<div class="inner">
										<?php
										$paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
										$search_keyword = isset($_GET['order_keyword']) ? sanitize_text_field($_GET['order_keyword']) : '';
										$search_category_names = isset($_GET['order_category']) ? array_map('sanitize_text_field', $_GET['order_category']) : [];

										$tax_query = array();
										if (!empty(array_filter($search_category_names))) {
											$tax_query[] = array(
												'taxonomy' => 'category',
												'field'    => 'name',
												'terms'    => $search_category_names,
											);
										}

										$keyword_query = array();
										if (!empty($search_keyword)) {
											$keyword_query['s'] = $search_keyword;
										}

										$args_query = array(
											'posts_per_page' => 15,
											'post_type' => 'any',
											'orderby' => 'date',
											'order' => 'DESC',
											'paged' => $paged,
										);

										if (!empty($tax_query)) {
											$args_query['tax_query'] = $tax_query;
										}

										if (!empty($keyword_query)) {
											$args_query = array_merge($args_query, $keyword_query);
										}

										$posts_arr = new WP_Query($args_query);

										if ($posts_arr->have_posts()):
										?>
											<div class="bg">
												<ul class="voice_list">
													<?php foreach ($posts_arr->posts as $post): setup_postdata($post); ?>
														<li>
															<div class="box">
																<?php
																//サムネイル画像
																if (!empty(get_field('thumbnail_img')['url'])) {
																	$thum_url = get_field('thumbnail_img')['url'];
																} elseif (get_the_post_thumbnail($post->ID)) {
																	$thum_url = get_the_post_thumbnail_url($post->ID, 'medium');
																} else {
																	$thum_url = get_theme_file_uri() . '/img/common/noimg.png';
																}
																?>
																<p class="img">
																	<a href="<?php the_permalink(); ?>">
																		<img src="<?php echo $thum_url; ?>">
																	</a>
																</p>
																<div class="txt_box">
																	<p class="ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
																	<?php if (get_the_tags($post->ID)): ?>
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
															<div class="com">
																<p class="txt"><?php the_excerpt(); ?></p>
																<a href="<?php the_permalink(); ?>" class="more">続きを読む</a>
															</div>
														</li>
													<?php endforeach; ?>
												</ul>
												<?php
												$GLOBALS['wp_query']->max_num_pages = $posts_arr->max_num_pages;
												get_template_part('pager');
												?>
											</div>
										<?php else: ?>
											<div class="not_found">条件に一致する記事はありません。</div>
										<?php endif; ?>
										<?php wp_reset_postdata(); ?>
									</div>
								</section>
								<!-- common_case_area end -->

							<?php endif; ?>
						</article>
						<!-- article end -->
					</div><!-- case end -->

				</div>
				<!-- /.contents_box -->

				<?php get_template_part('contact'); ?>
				<?php get_template_part('about'); ?>
				<?php
				$args['sidebar'] = $sidebar;
				get_footer('', $args);
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