<?php
//リストにしたい記事ID(半角数字)を「,」区切りでここに書く
$post_ids = [11929,11931,11934];

// get_template_part('column_related',null,$args);


$args = [
	'post_type'=>['column','interview','member'],
	'include'=>$post_ids,
	'orderby'=>'post__in'
];
$relate_posts = get_posts($args);
$now_id = get_the_ID();
?>

<div class="column_related">
	<div class="box">
		<div class="ttl_box">
			<p class="ttl">Related Posts</p>
			<a href="<?php echo home_url(); ?>/contact/" class="btn_contact">Contact Us</a>			
		</div>

		<ul class="wp-block-my-gutenberg-list textpage_list01">
            <?php foreach($relate_posts as $related_post): ?>
                <li<?php if($related_post->ID == $now_id) echo ' class="on"'; ?>>
                    <?php if($related_post->ID != $now_id): ?>
                    <a href="<?php echo get_permalink($related_post->ID); ?>">
                    <?php endif; ?>
                        <?php echo get_the_title($related_post->ID); ?>
                    <?php if($related_post->ID != $now_id): ?>
                    </a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
</ul>
	</div>
</div>