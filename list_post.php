<?php 
$post_type = $args['post_type'];
$paged = $_GET['paged']?$_GET['paged']:1;
$args = array(
	'post_type'=>$post_type,
	'posts_per_page'=>5
);
$posts_arr = new WP_Query($args);
?>


<section class="index_new_news area">
	<div class="inner1000">
		<div class="ttl_box">
			<h3 class="new_ttl_roboto roboto">お役立ちコラムの新着記事</h3>
		</div>
		<ul class="new_news_list">
			<?php
			$week_jp = ['日','月','火','水','木','金','土'];
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
			<li>
				<a href="<?php the_permalink(); ?>">
					<div class="img">
						<img src="<?php echo $thum_url; ?>">
					</div>
					<div class="txt">
						<dl>
							<dt><?php echo get_post_type_object($post->post_type)->label; ?></dt>
							<dd><dd><?php the_time('Y.n.j'); echo '（'.$week_jp[get_the_time('w')].'）'; ?></dd></dd>
						</dl>
						<div class="title"><?php the_title(); ?></div>
						<div class="excerpt"><?php echo get_field('meta_description'); ?></div>
					</div><!-- /.txt -->
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>


















<div class="list_post" style="display: none;">
	<ul>
	    <?php
		foreach($posts_arr->posts as $post):setup_postdata($post);
		?>
		<li>
			<?php 
			//サムネイル画像
			if(!empty(get_field('thumbnail_img')['url'])){
				$thum_url = '<img src="'.get_field('thumbnail_img')['url'].'">';
			}elseif(get_the_post_thumbnail($post->ID)){
				$thum_url = get_the_post_thumbnail_url($post->ID,'medium');
			}else{
				$thum_url = '<img src="'.get_theme_file_uri().'/img/common/noimg.png'.'">';
			}
			?>
			<p class="img">
				<a href="<?php the_permalink(); ?>">
					<?php echo $thum_url; ?>
				</a>
			</p>
			<div class="txt">
				<div class="post_type">
					<?php echo get_post_type_object($post->post_type)->label; ?>
				</div>
				<div class="title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
						</a>
					</div>
				<div class="excerpt"><?php the_excerpt(); ?></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>
</div><!-- /.list_post -->

