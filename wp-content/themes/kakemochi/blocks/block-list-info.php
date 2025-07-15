<p class="a_txt">
	<span class="name">
		<?php block_field( 'name'); ?>
	</span>
	<?php block_field( 'answer'); ?>
</p>




<div class="block_list_info">
	<img class="icon" src="<?php block_field('img'); ?>" alt="<?php block_field('alt'); ?>"></p>
	<div class="txt_box">
		<p class="ttl"><?php block_field('title'); ?></p>
		<p class="txt"><?php block_field('text'); ?></p>
		<?php if (block_field('url')): ?>
		<p class="member_btn"><a href="<?php block_field('url'); ?>">お申し込みはこちら</a></p>
		<?php endif; ?>
	</div>
</div>