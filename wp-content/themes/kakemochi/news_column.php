<?php 
$paged = isset($_GET['paged']) ? $_GET['paged'] : 1;
$args = [
	'post_type'=>['column','member','interview'],
	'order'=>'desc',
	'orderby'=>'date',
	'paged'=>$paged,
	'posts_per_page'=>20,
	'post__not_in'=>[3217]
];
$posts_arr = new WP_Query($args);
 ?>

				<section class="index_new_column area bg01">
					<div class="inner1000">
						<h3 class="new_ttl01">New Blogs</h3>
						<ul class="new_slider_column">
                            <?php
							foreach($posts_arr->posts as $post):setup_postdata($post);
							?>
							<li>
								<?php if(get_post_meta($post->ID, 'thumbnail_img',true)):?>
							        <?php $thum_img = get_field('thumbnail_img');
							                $thum_url = $thum_img['url'];
							                $thum_width = $thum_img['sizes']['thumbnail-width'];
							                $thum_height = $thum_img['sizes']['thumbnail-height'];
							        ?>
							        <p class="img">
							                <img src="<?php echo $thum_url; ?>" width="<?php echo $thum_width; ?>" height="<?php echo $thum_height; ?>">
							        </p>
								<?php else:?>
							        <p class="img"><?php echo get_the_post_thumbnail(get_the_ID(),'thumbnail') ?></p>
								<?php endif;?>
								<p class="txt"><?php the_title(); ?></p>
								<p class="new_btn01 center"><a href="<?php the_permalink(); ?>">Read more</a></p>
							</li>
							<?php endforeach; ?>
						</ul>
						<?php 
						$GLOBALS['wp_query']->max_num_pages = $posts_arr->max_num_pages;
						// get_template_part('pager');
						?>
					</div>
				</section>
				<!-- index_new_column -->