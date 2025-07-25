<?php 
$args = array(
	'post_type'=>'post',
);
if(is_front_page()){
	$args_add = [
		'posts_per_page'   => 4,
	];
	
}else{
	$args_add = [
		'paged'=>$paged,
		'posts_per_page'   => 10,
	];
}
$args = array_merge($args,$args_add);
$posts_arr = new WP_Query($args);
?>
<?php if($posts_arr): ?>
				<section class="index_new_news area<?php if(!is_front_page()){echo ' news_list';} ?>">
					<div class="inner1000">
						<div class="ttl_box">
							<h3 class="new_ttl_roboto roboto">NEWS</h3>
							<!--<p class="new_btn01"><a href="#">お知らせ一覧</a></p>-->
						</div>
						<ul class="new_news_list">
                            <?php
foreach($posts_arr->posts as $post):setup_postdata($post);
$week_jp = ['日','月','火','水','木','金','土'];
?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<dl>
										<dt>News</dt>
										<dd><?php the_time('Y.n.j'); echo '（'.$week_jp[get_the_time('w')].'）'; ?></dd>
									</dl>
									<p class="txt"><?php the_title(); ?></p>
								</a>
							</li>
<?php
endforeach;
?>
							
						</ul>
					</div>
<!--<?php if(is_front_page()):?>
<p class="tenji_btns"><a href="<?php echo home_url(); ?>/news/">News List</a></p>
<?php endif; ?>-->
				</section>
				<!-- index_new_news -->
<?php 
if(!is_front_page()){
$GLOBALS['wp_query']->max_num_pages = $posts_arr->max_num_pages;
get_template_part('pager');
}
 ?>

<?php endif; ?>
