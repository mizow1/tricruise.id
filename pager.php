<?php 
$page_links = paginate_links(array(
	'format' => '?paged=%#%',
	'prev_text'=>'&lt;',
	'next_text'=>'&gt;',
	'type'=>'array',
	'mid_size'=>1,
	'end_size'=>0,
	'current'=>(isset($_GET['paged']) && $_GET['paged'] > 0) ? intval($_GET['paged']) : 1
 ));

if( is_front_page() or is_home() ){
$page_links = str_replace('https://tricruise.id/', 'https://tricruise.id/column/',$page_links);
}

if($page_links){
echo '<ul class="pager"><li>';
echo join( '</li><li>', $page_links );
echo '</li></ul>';
}

 ?>
