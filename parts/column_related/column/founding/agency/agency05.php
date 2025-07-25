<?php
//リストにしたい記事ID(半角数字)を「,」区切りでここに書く
$post_ids = [10182,9775,9880,10128];

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
			<p class="ttl">関連記事</p>
			<a href="<?php echo home_url(); ?>/sales-services/bizdev/" class="btn_contact">低リスク・低コストでインドネシアで人材ビジネスを始めたい方はこちら</a>
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