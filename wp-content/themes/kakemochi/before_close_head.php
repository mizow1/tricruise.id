<!-- ここに書いたものが「</head>」の直前に入ります -->

<?php 
// 会員ID
$user = wp_get_current_user();
$user_id = (isset($user->data) && isset($user->data->user_login) && $user->data->user_login) ? $user->data->user_login : 'guest';
 ?>
<!-- start google tag manager user-id -->
<script>
var uid= '<?php echo $user_id ?>';
dataLayer = [];
dataLayer.push({
'uid': uid
});
</script>
<!-- end google tag manager user-id -->


<?php
if(is_singular() && get_post_meta($post->ID , 'noindex' , true)=='noindex'){
    echo '<meta name="robots" content="noindex,follow" />';
}
?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M6S8JXT9');</script>
<!-- End Google Tag Manager -->
