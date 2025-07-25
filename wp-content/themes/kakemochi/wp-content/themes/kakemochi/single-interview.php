<?php
$author_tmp = get_userdata($post->post_author);
$author_info = [
	'ID' => $author_tmp->ID,
	'name' => $author_tmp->display_name ? $author_tmp->display_name : $author_tmp->user_nicename,
	'img' => get_avatar($post->post_author) ?: null,
	'sei' => $author_tmp->first_name,
	'mei' => $author_tmp->last_name,
	'web' => $author_tmp->user_url,
	'description' => get_the_author_meta('description', $author_tmp->ID),
	'twitter' => get_field('twitter', 'user_' . $author_tmp->ID),
	'facebook' => get_field('facebook', 'user_' . $author_tmp->ID),
	'instagram' => get_field('instagram', 'user_' . $author_tmp->ID),
	'spotify' => get_field('spotify', 'user_' . $author_tmp->ID),
	'youtube' => get_field('youtube', 'user_' . $author_tmp->ID),
];

$icon = get_field('icon', 'user_' . $author_info['ID']);
if (isset($icon['sizes']['medium'])) {
	$author_info['img'] = '<img src="' . $icon['sizes']['medium'] . '">';
}

$full_content = get_the_content();
$full_count = mb_strlen(strip_tags($full_content));
$before_more = mb_strstr($full_content, 'more', true);
$before_more_count = $before_more ? mb_strlen(strip_tags($before_more)) : 0;
$remain_str_count = $full_count - $before_more_count;

get_header();
?>

<body class="column_bg">
	<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
		<?php get_template_part('gnav'); ?>
		<main id="voice" class="lower inner1600 detail <?php echo get_post_type($post); ?>">
			<?php
			$categories = get_the_category();
			$category = !empty($categories) ? $categories[0]->slug : '';

			if ($post->post_type == 'notice') {
				$sidebar = 'member_entry_side_bar';
			} else {
				$post_meta = get_post_meta(get_the_ID());
				if (isset($post_meta['sidebar']) && is_array($post_meta['sidebar']) && !empty($post_meta['sidebar'][0])) {
					$sidebar = str_replace('.php', '', $post_meta['sidebar'][0]);
				} elseif (file_exists(get_template_directory() . '/parts/side_bar/' . $category . '.php')) {
					$sidebar = $category;
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

					$mv = get_the_post_thumbnail_url($post->ID, "full");
					if ($mv && get_field('main_visual_on_off') != 2 && $post->post_type != 'notice') :
					?>
						<p class="main_img"><img src="<?php echo $mv; ?>" alt=""></p>
					<?php endif; ?>
					<div class="bg">
						<div class="article">
							<?php if (get_post_type() == 'column') : ?>
								<?php get_template_part('column_banner'); ?>
							<?php endif; ?>

							<div class="column_related_top">
								<?php




								//関連記事
								if ($post->post_type == 'notice') {
									$column_related = 'member_entry_side_bar';
								} elseif (isset($post_meta['column_related']) && is_array($post_meta['column_related']) && !empty($post_meta['column_related'][0])) {
									$column_related = str_replace('.php', '', $post_meta['column_related'][0]);
								} elseif (file_exists(get_template_directory() . '/parts/column_related/' . $category . '.php')) {
									$column_related = $category;
								} else {
									$column_related = 'column_related';
								}
								$assign_column_related = get_file_path($column_related);
								if ($assign_column_related) {
									require($assign_column_related);
								}

								// $add = '';
								// if (file_exists(get_template_directory() . '/parts/main/7/' . $sidebar . '.php')) {
								// 	ob_start();
								// 	require_once(get_template_directory() . '/parts/main/7/' . $sidebar . '.php');
								// 	$add = ob_get_clean();
								// }
								?>
							</div>

							<p class="main_ttl"><?php the_title(); ?></p>
							<?php if (get_the_tags()) : ?>
								<p class="tag_ttl">関連タグ</p>
								<div class="tag_box">
									<?php
									$tags = get_the_tags();
									if ($tags) {
										foreach ($tags as $tag) {
											echo '<a href="' . get_tag_link($tag->term_id) . '">#' . $tag->name . '</a>';
										}
									}
									?>
								</div>
							<?php endif; ?>
							<div class="date_box">
								<div class="date_in">
									<dl>
										<dt>Publish</dt>
										<dd><?php the_time('Y/m/d'); ?></dd>
									</dl>
									<dl>
										<dt>Update</dt>
										<dd><?php the_modified_date('Y/m/d'); ?></dd>
									</dl>
									<dl>
										<dd class="r_time"><i class="fa fa-hourglass-half"></i><?php my_reading_time(); ?></dd>
									</dl>
								</div>
							</div>

							<?php if (get_post_type() == 'exhibition-indonesia') : ?>
								<?php
								$args['post'] = $post;
								get_template_part('exhibition_summary', null, $args);
								?>
							<?php endif; ?>

							<?php
							// 会員、インタビュー、コラム投稿のみ有効
							$request_uri = $_SERVER['REQUEST_URI'];
							if (
								strpos($request_uri, '/member/') !== false ||
								strpos($request_uri, '/interview/') !== false ||
								strpos($request_uri, '/column/') !== false
							):
							?>
								<div class="table-of-contents">
									<div class="table-of-contents-header">
										<div>Table of Contents</div>
										<div class="table-of-contents-toggle">CLOSE</div>
									</div>

									<?php
									//記事トップ目次
									echo gen_article_index();
									?>
								</div><!-- /.table-of-contents -->
							<?php endif; ?>


							<div class="article_box">
								<?php
								$content = get_the_content();
								$content = apply_filters('the_content', $content);
								$content = str_replace(']]>', ']]&gt;', $content);
								// $contens_add_cta = cta_before_h2_2($content);
								// $modified_content = insert_article_cta($contens_add_cta);
								// echo $modified_content;
								echo $content;
								?>
								<?php if (!is_user_logged_in() && ($post->post_type == 'member' || $post->post_type == 'video')) : ?>
									<div class="remain_str_count">
										Remaining: <?php echo $remain_str_count; ?> characters
									</div>
									<?php
									get_template_part('member_entry');
									get_template_part('member_login');
									?>
								<?php endif; ?>
								<?php if ((is_user_logged_in() || get_post_type() != 'member') && get_post_type() != 'notice') : ?>
									<?php
									if ($assign_column_related) {
										require($assign_column_related);
									} else {
										get_template_part('/parts/column_related/' . $category);
									}
									?>

									<?php
									//文末CTA
									if ((isset($post_meta['article_cta_suggest']) && is_array($post_meta['article_cta_suggest']) && !empty($post_meta['article_cta_suggest'][0]))) {
										$article_cta_suggest_path = get_file_path_article_foot($post_meta['article_cta_suggest'][0]);
										if ($article_cta_suggest_path) {
											require($article_cta_suggest_path);
										}
									}

									?>

									<?php // echo $add; ?>
								<?php endif; ?>
							</div>


							<?php if (($post->post_type == 'member' || $post->post_type == 'video') && get_field('member_profile_toggle') != 2) : ?>
								<div class="column_author_box">
									<div class="icon_box">
										<p class="ttl">
											<img src="<?php echo get_theme_file_uri(); ?>/img/common/author_ttl.png" alt="この記事を書いた人">
										</p>
										<p class="icon">
											<?php echo $author_info['img']; ?>
										</p>
										<p class="name"><?php echo $author_info['name']; ?></p>
									</div>
									<div class="txt_box">
										<?php if ($author_info['description']) : ?>
											<p class="txt"><?php echo $author_info['description']; ?></p>
										<?php endif; ?>
										<ul class="author_sns">
											<?php
											$sns_platforms = ['twitter', 'facebook', 'instagram', 'spotify', 'youtube'];
											foreach ($sns_platforms as $platform) :
												if ($author_info[$platform]) :
											?>
													<li><a href="<?php echo $author_info[$platform]; ?>" target="_blank" rel="noopener"><img src="<?php echo get_theme_file_uri(); ?>/img/common/author_sns_<?php echo substr($platform, 0, 2); ?>.png" alt=""></a></li>
											<?php
												endif;
											endforeach;
											?>
										</ul>
									</div>
								</div>
							<?php endif; ?>

							<?php
							if ((is_user_logged_in() || get_post_type() != 'member') && get_post_type() != 'notice') {
								get_template_part('qa');
								get_template_part('sns');
							}
							?>
						</div>
						<?php
						if ((is_user_logged_in() || get_post_type() != 'member') && get_post_type() != 'notice') {
							get_template_part('related');
						}
						?>
					</div>
				</div>
				<?php
				echo "<!--";
				var_dump('246ee', $sidebar);
				echo "-->";
				if (isset($post_meta['sidebar']) && is_array($post_meta['sidebar']) && !empty($post_meta['sidebar'][0])) {
					get_template_part('/parts/contact/' . $sidebar);
				} elseif (file_exists(get_template_directory() . '/parts/contact/' . $category . '.php')) {
					get_template_part('/parts/contact/' . $category);
				} else {
					get_template_part('/parts/contact/contact');
				}
				?>

				<?php get_template_part('about'); ?>
				<?php
				echo "<!--";
				var_dump('257ee', $sidebar);
				echo "-->";
				$args['sidebar'] = $sidebar;
				get_footer('', $args);
				?>
				<div id="page_top">
					<span></span>
				</div>
			</article>
		</main>
	</div>

	<div class="modal_index_wrap">
		<div class="modal_index">
			<div class="modal_index_content">
				<p><span class="ttl_under_line2">Table of Contents</span></p>
				<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
				<?php
				// モーダル目次
				echo gen_article_index();
				?>

				<div class="modal_index_ps">
				<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
				<?php
								//関連記事
								if ($post->post_type == 'notice') {
									$column_related = 'member_entry_side_bar';
								} elseif (isset($post_meta['column_related']) && is_array($post_meta['column_related']) && !empty($post_meta['column_related'][0])) {
									$column_related = str_replace('.php', '', $post_meta['column_related'][0]);
								} elseif (file_exists(get_template_directory() . '/parts/column_related/' . $category . '.php')) {
									$column_related = $category;
								} else {
									$column_related = 'column_related';
								}
								$assign_column_related = get_file_path($column_related);
								if ($assign_column_related) {
									require($assign_column_related);
								}

								?>
				</div>
			</div>
		</div>
	</div>
	<div class="modal_index_toggle">
	Contents
	</div>

	<?php get_template_part('before_close_body'); ?>
	<?php wp_footer(); ?>
</body>

</html>