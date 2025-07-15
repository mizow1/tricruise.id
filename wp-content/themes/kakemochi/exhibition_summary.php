<?php 
$post = $args['post'];
$a = [
	'exhibition_name_jp',
	'exhibition_start_day',
	'exhibition_end_day',
	'exhibition_area',
	'exhibition_place',
	'exhibition_item',
	'exhibition_author',
	'exhibition_url'
];

foreach($a as $val){
	${$val} = get_field($val,get_the_ID($post->ID))?get_field($val,get_the_ID($post->ID)):null;
}

?>
<table class="exhibition_summary">
<?php if(!empty($exhibition_name_jp)): ?>
	<tr>
	<th>展示会名</th>
	<td><?php echo $exhibition_name_jp; ?></td>
	</tr>
<?php endif; ?>
<?php if(!empty($exhibition_start_day)||!empty($exhibition_end_day)): ?>
	<tr>
	<th>開催日</th>
	<td><?php echo $exhibition_start_day; ?>～<?php echo $exhibition_end_day; ?></td>
	</tr>
<?php endif; ?>
<?php if(!empty($exhibition_area)): ?>
	<tr>
	<th>開催地</th>
	<td><?php echo $exhibition_area; ?></td>
	</tr>
<?php endif; ?>
<?php if(!empty($exhibition_place)): ?>
	<tr>
	<th>会場</th>
	<td><?php echo $exhibition_place; ?></td>
	</tr>
<?php endif; ?>
<?php if(!empty($exhibition_item)): ?>
	<tr>
	<th>出展対象品目</th>
	<td><?php echo $exhibition_item; ?></td>
	</tr>
<?php endif; ?>
<?php if(!empty($exhibition_author)): ?>
	<tr>
	<th>展示会主催者</th>
	<td><?php echo $exhibition_author; ?></td>
	</tr>
<?php endif; ?>
<?php if(!empty($exhibition_url)): ?>
	<tr>
	<th>公式サイト</th>
	<td>
		<a href="<?php echo $exhibition_url; ?>" target="_blank">
			<?php echo $exhibition_url; ?>
		</a>
	</td>
	</tr>
<?php endif; ?>
</table>

