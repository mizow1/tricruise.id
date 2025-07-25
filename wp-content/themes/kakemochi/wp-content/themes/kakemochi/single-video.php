<?php 
if(strpos(get_the_permalink(),'member-thanks')){
	// $redirect_url = !empty($_SESSION['from_page']) ? $_SESSION['from_page'] : home_url();
	// wp_safe_redirect($redirect_url);
	// exit;
}
?>
<?php
if(is_single('member-thanks')){
	get_template_part('single-member_thanks');
}else{
	get_template_part('single-interview');
}
?>
