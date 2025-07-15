<?php
$thumbnail_id = get_post_thumbnail_id($post);
$imageobject = wp_get_attachment_image_src($thumbnail_id, 'full');
?>

<?php if (is_home() || is_front_page()) : ?>
	<script type="application/ld+json">
		{
			"@context": "https://schema.org/",
			"@type": "WebSite",
			"name": "<?php echo bloginfo('name') ?>",
			"alternateName": "カケモチ",
			"url": "<?php echo home_url() ?>"
		}
	</script>
<?php endif; ?>

<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "BlogPosting",
		"mainEntityOfPage": {
			"@type": "WebPage",
			"@id": "<?php the_permalink(); ?>"
		},
		"headline": "<?php the_title(); ?>",
		"image": [
			"<?php echo $imageobject[0]; ?>"
		],
		"datePublished": "<?php echo get_date_from_gmt(get_post_time('c', true), 'c'); ?>",
		"dateModified": "<?php echo get_date_from_gmt(get_post_modified_time('c', true), 'c'); ?>",
		<?php if (get_post_type() == 'member'): ?>
			<?php
			$author_tmp = get_userdata($post->post_author); //get_the_author_metaで取得できないため
			$author_info['ID'] = $author_tmp->ID;
			$author_info['name'] = $author_tmp->display_name ? $author_tmp->display_name : $author_tmp->user_nicename;
			$author_info['job_title'] = get_field('job_title', 'user_' . $author_info['ID']);
			?> "author": {
				"@type": "Person",
				"name": "<?php echo $author_info['name']; ?>",
				"url": "<?php echo home_url(); ?>",
				"sameAs": "https://twitter.com/kakemochi2021",
				"jobTitle": "<?php echo $author_info['job_title']; ?>"
			},
		<?php endif; ?> "publisher": {
			"@type": "Organization",
			"name": "カケモチ株式会社",
			"logo": {
				"@type": "ImageObject",
				"url": "<?php echo get_theme_file_uri() . '/img/common/header_logo.png'; ?>"
			}
		},
		"description": "<?php echo get_the_excerpt(); ?>"
	}
</script>
<?php
$qa_q_cf = get_field('qa_question') ? array_filter(explode("\n", get_field('qa_question'))) : [];
$qa_a_cf = get_field('qa_answer') ? array_filter(explode("\n", get_field('qa_answer'))) : [];

$content = get_the_content();

$qa_q = $qa_q_cf;
$qa_a = $qa_a_cf;

$pattern = '/<!-- wp:genesis-custom-blocks\/qa {\"question\":\"(.*?)\",\"answer\":\"(.*?)\"} \/-->/';

if (preg_match_all($pattern, $content, $matches, PREG_SET_ORDER)) {
	foreach ($matches as $match) {
		$qa_q[] = $match[1];
		$qa_a[] = $match[2];
	}
}

// カスタムフィールドのQ&Aに続けて本文中のカスタムブロックでのQ&Aも構造化データ化する
if (isset($qa_q[0]) && isset($qa_a[0]) && $qa_q[0] && $qa_a[0]):

?>
	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "FAQPage",
			"mainEntity": [
				<?php foreach ($qa_q as $key => $val):
					if (isset($qa_a[$key]) && $qa_a[$key]):
				?> {
							"@type": "Question",
							"name": "<?php echo esc_attr($qa_q[$key]); ?>",
							"acceptedAnswer": {
								"@type": "Answer",
								"text": "<?php echo esc_attr($qa_a[$key]); ?>"
							}
						}
						<?php 
						if (end($qa_q) != $val): ?>, <?php endif; ?>
				<?php
					endif;
				endforeach;
				?>
			]
		}
	</script>
<?php endif; ?>