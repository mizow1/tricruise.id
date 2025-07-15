<?php
/*
Template Name: 展示会記事一覧w
*/
if($_GET['mode']=='list'){
	get_template_part('exhibition-indonesia_list');
}else{
	get_template_part('exhibition-indonesia_top');
}
?>
