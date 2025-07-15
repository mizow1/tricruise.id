<?php

$paged = isset($_GET['paged']) ? $_GET['paged'] : 1;
$args = [
	'post_type'=>['interview'],
	'orderby'=>'rand',
	'paged'=>$paged,
	'posts_per_page'=>2,
	// 'post__not_in'=>[3217]
];
$related_posts = get_posts($args);
?>
<?php if($related_posts): ?>
						<div id="recommend">
							<p class="rec_ttl">おすすめのインタビュー記事</p>
							<ul>
								<?php if ($related_posts): ?>
								<?php foreach($related_posts as $related_post):setup_postdata($post); ?>
								<li>
									<?php if(get_post_meta($related_post->ID, 'opg_img',true)):?>
											<?php $opg_img = get_field('opg_img',$related_post);
													$opg_url = $opg_img['url'];
											?>
											<a href="<?php the_permalink($related_post->ID); ?>">                                                                                
													<p class="img">
															<img src="<?php echo $opg_url; ?>">
													</p>
											</a>
									<?php else:?>
											<?php if (get_the_post_thumbnail_url($related_post->ID)): ?>
											<a href="<?php the_permalink($related_post->ID); ?>">
													<p class="img"><img src="<?php echo get_the_post_thumbnail_url($related_post->ID); ?>" alt=""></p>
											</a>
											<?php endif; ?>
									<?php endif; ?>
										<p class="ttl"><?php echo get_the_title($related_post->ID); ?></p>
										<p class="txt">
											<?php
											if(get_field('meta_description')){
												echo get_field('meta_description',$related_post->ID);
											}else{
												echo get_the_excerpt($related_post->ID);
											}
											?>
										</p>
									</a>
									<!--<div class="date_box">
										<dl>
											<dt>公開日</dt>
											<dd>2021/07/07</dd>
										</dl>
									</div>-->
								</li>
								<?php
								endforeach;
								wp_reset_postdata();
								?>
								<?php endif; ?>
							</ul>
							<a href="<?php echo home_url(); ?>/interview/" class="btn_all">すべての記事を見る</a>
						</div>
						<!-- recommend end -->
<?php endif; ?>
