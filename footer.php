<footer id="footer" class="area">
	<div class="inner footer_new_box">
		<div class="footer_new_l">
			<script src="https://js-na2.hsforms.net/forms/embed/242405365.js" defer></script>
			<div class="hs-form-frame" data-region="na2" data-form-id="f7c0a558-198b-40dc-8b9e-28f17252099c" data-portal-id="242405365"></div>
		</div>

		<div class="footer_new_r">
		<p class="footer_new_ttl">Thank You for Reading to the Footer</p>
		<p class="footer_new_txt">Only about 10% of users reach this part of the footer. It's truly a small number.  However, the customers who have reached this point and are reading this article are very special to us. You have read our column articles and service pages with great enthusiasm, and we are excited about the possibility of working together with you. We invite you to contact us to discuss your concerns about expanding into Indonesia and attracting Indonesian customers. Even if you think "I might not need a consultation right now," you may gain unexpected insights and valuable information by talking with us. This encounter is somewhat miraculous, so please don't hesitate to contact us if you have even a second of doubt. Your initial inquiry is free, and our staff will personally talk with you with the utmost sincerity.</p>
			<!--<p class="footer_new_btn"><a href="<?php echo home_url(); ?>/contact/"><img src="<?php echo get_theme_file_uri(); ?>/img/common/footer_btn.png" alt="お問い合わせはこちら"></a></p>-->

			<div class="footer_new_bottom">
				<p class="logo"><a href="<?php echo home_url(); ?>"><img alt="TRICRUISE" src="<?php echo get_theme_file_uri(); ?>/img/common/header_logo.png"></a></p>

				<p class="ttl">PT. TRICRUISE MARKETING INDONESIA<br>
				GROWINK WISMA KEIAI JALAN JENDERAL SUDIRMAN B KARET TENGSIN, TANAH ABANG KOTA ADM.<br>JAKARTA PUSAT DKI JAKARTA
			</p>
			</div>

			<p class="copy">Copyright <span lang="en">&copy;</span> 2025 PT. TRICRUISE MARKETING INDONESIA</p>

			</div>
	</div>
</footer>
<!-- footer end -->

<!--sp_footer_btn-->
		<div class="sp_footer_btn sp">
			<div class="sp_footer_btn_wa"><a href="https://api.whatsapp.com/send?phone=6281519439549" target="_blank"><span>WhatsApp</span></a></div>
			<div class="sp_footer_btn_co"><a href="<?php echo home_url(); ?>/contact/"><span>Contact us</span></a></div>
		</div>
		<!--//sp_footer_btn-->


<!--固定LINE-->
<div class="footer_line">
	<a href="https://lin.ee/BM45FJY" target="_blank"><img src="<?php echo get_theme_file_uri(); ?>/img/common/footer_line.png" alt="LINE"></a>
</div>
<!--//固定LINE-->
<!--固定サイドバナー-->
<!--<div class="fix_side">
	<div class="fix_side_banner fix_side01"><a href="https://meetings.hubspot.com/kakemochi-yanagisawa/contact"><img src="<?php echo get_theme_file_uri(); ?>/img/common/side_contact_brn.png" alt="プロに無料相談をする" class="pc"><img src="<?php echo get_theme_file_uri(); ?>/img/common/side_contact_brn_sp.png" alt="プロに無料相談をする" class="sp"></a></div>
	<div class="fix_side_banner fix_side02"><a href="https://lin.ee/BM45FJY" target="_blank"><img src="<?php echo get_theme_file_uri(); ?>/img/common/side_line_brn.png" alt="LINEで無料相談をする" class="pc"><img src="<?php echo get_theme_file_uri(); ?>/img/common/side_line_brn_sp.png" alt="LINEで無料相談をする" class="sp"></a></div>
</div>-->
<!--//固定サイドバナー-->

<?php 
// if($args['sidebar']){
// 	get_template_part('/parts/main/d/'.$args['sidebar']);
// }
?>

<?php get_template_part('structured'); ?>
<?php 
//ログインした通知
$login_notice = isset($_SESSION['login_begin']) && $_SESSION['login_begin'] ? '<div class="login_notice">ログインしました</div>' : '';
unset($_SESSION['login_begin']);//1回通知するだけでいいのでアラート作成後は破棄
echo $login_notice;
 ?>
<?php
if(isset($_GET['a']) && $_GET['a']){
	global $template;
	$template_name = 'templatename:'.basename($template, '.php');
	echo $template_name;
}
 ?>
