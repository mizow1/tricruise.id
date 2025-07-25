<?php
if($_GET['a']){
	ini_set('display_errors', 1);

}
//自動更新を無効にする
add_filter('automatic_updater_disabled', '__return_true');

//タイトルタグ生成
add_theme_support('title-tag');
function rewrite_separator($separator)
{
	$separator = '|';
	return $separator;
}
add_filter('document_title_separator', 'rewrite_separator');

//アイキャッチを有効化
add_theme_support('post-thumbnails');

//固定ページで抜粋有効化
add_post_type_support('page', 'excerpt');

// ブロックエディタに実際のサイトのデザインを適用
add_action('after_setup_theme', function () {
	add_theme_support('editor-styles');
	add_editor_style('/css/editor-style.css');
});

//ダッシュボードのメディア項目の移動
function customize_menus()
{
	global $menu;
	$menu[19] = $menu[10];  //メディアの移動
	unset($menu[10]);
}
add_action('admin_menu', 'customize_menus');

//ログイン時
function my_login_logo()
{ ?>
	<style type="text/css">
		html body {
			background: #fff;
		}

		#login h1 a,
		.login h1 a {
			background: url(<?php echo get_theme_file_uri(); ?>/screenshot.png) 50% 50% no-repeat;
			background-size: 100%;
			display: block;
			width: 200px;
			margin: 0 auto;
		}
	</style>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');

//ログインロゴクリック遷移先
function custom_login_logo_url()
{
	return get_bloginfo('url');
}
add_filter('login_headerurl', 'custom_login_logo_url');


//カスタム投稿タイプ:インタビュー
add_action('init', 'post_type_interview');
function post_type_interview()
{
	register_post_type('interview', [ // 投稿タイプ名の定義
		'labels' => [
			'name'          => 'インタビュー', // 管理画面上で表示する投稿タイプ名
			'singular_name' => 'interview',    // カスタム投稿の識別名
		],
		'public'        => true,  // 投稿タイプをpublicにするか
		'has_archive'   => false, // アーカイブ機能ON/OFF
		'menu_position' => 5,     // 管理画面上での配置場所
		'show_in_rest'  => true,  // 新エディタ「Gutenberg」を有効にする
		'rewrite' => array('slug' => 'interview', 'with_front' => false),
		'supports' => array( //エディタに表示する入力欄
			'title',
			'editor',
			'custom-fields',
			'thumbnail',
			'excerpt'
		)
	]);
	register_taxonomy_for_object_type('category', 'interview');
	register_taxonomy_for_object_type('post_tag', 'interview');
}

//カスタム投稿タイプ:お客様の声
add_action('init', 'post_type_client');
function post_type_client()
{
	register_post_type('client', [ // 投稿タイプ名の定義
		'labels' => [
			'name'          => 'お客様の声', // 管理画面上で表示する投稿タイプ名
			'singular_name' => 'client',    // カスタム投稿の識別名
		],
		'public'        => true,  // 投稿タイプをpublicにするか
		'has_archive'   => false, // アーカイブ機能ON/OFF
		'menu_position' => 5,     // 管理画面上での配置場所
		'show_in_rest'  => true,  // 新エディタ「Gutenberg」を有効にする
		'rewrite' => array('slug' => 'client', 'with_front' => false),
		'supports' => array( //エディタに表示する入力欄
			'title',
			'editor',
			'custom-fields',
			'thumbnail',
			'excerpt'
		)
	]);
	register_taxonomy_for_object_type('category', 'client');
	register_taxonomy_for_object_type('post_tag', 'client');
}

//カスタム投稿タイプ:コラム
add_action('init', 'post_type_column');
function post_type_column()
{
	register_post_type('column', [ // 投稿タイプ名の定義
		'labels' => [
			'name'          => 'Blog', // 管理画面上で表示する投稿タイプ名
			'singular_name' => 'column',    // カスタム投稿の識別名
		],
		'public'        => true,  // 投稿タイプをpublicにするか
		'has_archive'   => false, // アーカイブ機能ON/OFF
		'menu_position' => 5,     // 管理画面上での配置場所
		'show_in_rest'  => true,  // 新エディタ「Gutenberg」を有効にする
		'rewrite' => array('slug' => 'column', 'with_front' => false),
		'supports' => array( //エディタに表示する入力欄
			'title',
			'editor',
			'custom-fields',
			'thumbnail',
			'excerpt'
		)
	]);
	register_taxonomy_for_object_type('category', 'column');
	register_taxonomy_for_object_type('post_tag', 'column');
}

//カスタム投稿タイプ:会員限定記事
add_action('init', 'post_type_member');
function post_type_member()
{
	register_post_type('member', [ // 投稿タイプ名の定義
		'labels' => [
			'name'          => '会員限定記事', // 管理画面上で表示する投稿タイプ名
			'singular_name' => 'member',    // カスタム投稿の識別名
		],
		'public'        => true,  // 投稿タイプをpublicにするか
		'has_archive'   => false, // アーカイブ機能ON/OFF
		'menu_position' => 5,     // 管理画面上での配置場所
		'show_in_rest'  => true,  // 新エディタ「Gutenberg」を有効にする
		'rewrite' => array('slug' => 'member', 'with_front' => false),
		'supports' => array( //エディタに表示する入力欄
			'title',
			'editor',
			'custom-fields',
			'thumbnail',
			'excerpt',
			'author'
		)
	]);
	register_taxonomy_for_object_type('category', 'member');
	register_taxonomy_for_object_type('post_tag', 'member');
}


//カスタム投稿タイプ:お知らせ
add_action('init', 'post_type_notice');
function post_type_notice()
{
	register_post_type('notice', [ // 投稿タイプ名の定義
		'labels' => [
			'name'          => '会員お知らせ', // 管理画面上で表示する投稿タイプ名
			'singular_name' => 'notice',    // カスタム投稿の識別名
		],
		'public'        => true,  // 投稿タイプをpublicにするか
		'has_archive'   => false, // アーカイブ機能ON/OFF
		'menu_position' => 5,     // 管理画面上での配置場所
		'show_in_rest'  => true,  // 新エディタ「Gutenberg」を有効にする
		'rewrite' => array('slug' => 'notice', 'with_front' => false),
		'supports' => array( //エディタに表示する入力欄
			'title',
			'editor',
			'custom-fields',
			'thumbnail',
			'excerpt'
		)
	]);
	register_taxonomy_for_object_type('category', 'notice');
	register_taxonomy_for_object_type('post_tag', 'notice');
}


//カスタム投稿タイプ:動画
add_action('init', 'post_type_video');
function post_type_video()
{
	register_post_type('video', [ // 投稿タイプ名の定義
		'labels' => [
			'name'          => '動画', // 管理画面上で表示する投稿タイプ名
			'singular_name' => 'video',    // カスタム投稿の識別名
		],
		'public'        => true,  // 投稿タイプをpublicにするか
		'has_archive'   => false, // アーカイブ機能ON/OFF
		'menu_position' => 5,     // 管理画面上での配置場所
		'show_in_rest'  => true,  // 新エディタ「Gutenberg」を有効にする
		'rewrite' => array('slug' => 'video', 'with_front' => false),
		'supports' => array( //エディタに表示する入力欄
			'title',
			'editor',
			'custom-fields',
			'thumbnail',
			'excerpt',
			'author'
		)
	]);
	register_taxonomy_for_object_type('category', 'video');
	register_taxonomy_for_object_type('post_tag', 'video');
}

//カスタム投稿タイプ:展示会情報
add_action('init', 'post_type_exhibition_indonesia');
function post_type_exhibition_indonesia()
{
	register_post_type('exhibition-indonesia', [ // 投稿タイプ名の定義
		'labels' => [
			'name'          => '展示会情報', // 管理画面上で表示する投稿タイプ名
			'singular_name' => 'exhibition-indonesia',    // カスタム投稿の識別名
		],
		'public'        => true,  // 投稿タイプをpublicにするか
		'has_archive'   => false, // アーカイブ機能ON/OFF
		'menu_position' => 5,     // 管理画面上での配置場所
		'show_in_rest'  => true,  // 新エディタ「Gutenberg」を有効にする
		'rewrite' => array('slug' => 'exhibition-indonesia', 'with_front' => false),
		'supports' => array( //エディタに表示する入力欄
			'title',
			'editor',
			'custom-fields',
			'thumbnail',
			'excerpt'
		)
	]);
	register_taxonomy_for_object_type('category', 'exhibition-indonesia');
	register_taxonomy_for_object_type('post_tag', 'exhibition-indonesia');
}

//カスタム投稿タイプ:採用
add_action('init', 'post_type_careers');
function post_type_careers()
{
	register_post_type('careers', [ // 投稿タイプ名の定義
		'labels' => [
			'name'          => '採用', // 管理画面上で表示する投稿タイプ名
			'singular_name' => 'careers',    // カスタム投稿の識別名
		],
		'public'        => true,  // 投稿タイプをpublicにするか
		'has_archive'   => false, // アーカイブ機能ON/OFF
		'menu_position' => 5,     // 管理画面上での配置場所
		'show_in_rest'  => true,  // 新エディタ「Gutenberg」を有効にする
		'rewrite' => array('slug' => 'careers', 'with_front' => false),
		'supports' => array( //エディタに表示する入力欄
			'title',
			'editor',
			'custom-fields',
			'thumbnail',
			'excerpt'
		)
	]);
	register_taxonomy_for_object_type('category', 'careers');
	register_taxonomy_for_object_type('post_tag', 'careers');
}


//管理画面投稿一覧にID表示
add_filter('manage_posts_columns', 'posts_columns_id', 5);
add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
add_filter('manage_pages_columns', 'posts_columns_id', 5);
add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);
function posts_columns_id($defaults)
{
	$defaults['wps_post_id'] = __('ID');
	return $defaults;
}
function posts_custom_id_columns($column_name, $id)
{
	if ($column_name === 'wps_post_id') {
		echo $id;
	}
}

// パンくずリスト
function breadcrumb()
{
	global $post;
	$str = '';
	if (!is_home() && !is_admin()) {
		$str .= '<div class="breadcrumb area"><div class="inner"><ul>';
		$str .= '<li><a href="' . home_url() . '">Home</a></li>';
		if (is_page()) {
			if ($post->post_parent != 0) {
				$ancestors = array_reverse(get_post_ancestors($post->ID));
				foreach ($ancestors as $ancestor) {
					$str .= '<li><a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
				}
			}
		}
		if (is_single()) {
			if (get_post_type($post) == 'interview' ||  get_post_type($post) == 'client') {
				$str .= '<li><a href="' . home_url() . '/company/">会社概要</a></li>';
			}
			if (is_category()) {
				$categories = get_the_category($post->ID);
				$cat = $categories[0];
				if ($cat->parent != 0) {
					$ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
					foreach ($ancestors as $ancestor) {
						$str .= '<li><a href="' . get_category_link($ancestor) . '">' . get_cat_name($ancestor) . '</a></li>';
					}
				}
				$str .= '<li><a href="' . get_category_link($cat->term_id) . '">' . $cat->cat_name . '</a></li>';
			}
		}
		//デフォルト投稿タイプの場合
		if (get_post_type($post) == 'post') {
			$url = home_url() . '/';
			$url .= 'news/';
			$str .= '<li><a href="' . $url . '"">ニュースリリース一覧</a></li>';
		}
		//カスタム投稿タイプの場合
		if (get_post_type($post) == 'interview' || get_post_type($post) == 'column' || get_post_type($post) == 'client' || get_post_type($post) == 'exhibition-indonesia') {
			$url = home_url() . '/';
			if (get_post_type($post) == 'interview' || get_post_type($post) == 'client') {
				$url .= 'company/';
			}
			$url .= get_post_type($post) . '/';
			$str .= '<li><a href="' . $url . '"">' . esc_html(get_post_type_object(get_post_type())->label) . '</a></li>';
		}
		if (get_post_type($post) == 'notice') {
			$url = home_url() . '/';
			$str .= '<li><a href="' . $url . 'member_entry/">会員マイページ</a></li>';
			$str .= esc_html(get_post_type_object(get_post_type())->label) . '</a></li>';
		}
		if (is_category()) {
			$cat = get_queried_object();
			if ($cat->parent != 0) {
				$ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
				foreach ($ancestors as $ancestor) {
					$str .= '<li><a href="' . get_category_link($ancestor) . '">' . get_cat_name($ancestor) . '</a></li>';
				}
			}
			$str .= '<li><a href="' . get_category_link($cat->term_id) . '">' . $cat->cat_name . '</a></li>';
		}
		if (is_tag()) {
			$page_title = single_tag_title('', false);
		} else {
			$page_title = str_replace(array('<br>', '<br />'), '', get_the_title());
		}
		$str .= '<li>' . $page_title . '</li>';
		$str .= '</ul></div></div>';
	}
	echo $str;
}

// メタボックスの追加
function add_breadcrumb()
{
	add_meta_box(
		'custom_breadcrumb',
		'デフォルトパンくず',
		'admin_breadcrumb',
		array('post', 'page', 'interview', 'column', 'client', 'member', 'member_entry', 'careers', 'exhibition-indonesia', 'video'),
		'side'
	);
}
function admin_breadcrumb()
{

	$post_id = $_GET['post'];
	$post = get_post($post_id);

	$str = '';
	$str .= '<div class="breadcrumb area"><div class="inner"><ul>';
	$str .= '<li><a href="' . home_url() . '">ホーム</a></li>';
	if ($post->post_type == 'page') {
		if ($post->post_parent != 0) {
			$ancestors = array_reverse(get_post_ancestors($post->ID));
			foreach ($ancestors as $ancestor) {
				$str .= '<li><a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
			}
		}
	}
	// if(is_single()){
	if (get_post_type($post) == 'client') {
		$str .= '<li><a href="' . home_url() . '/company/">会社概要</a></li>';
	}
	if (is_category()) {

		$categories = get_the_category($post->ID);
		$cat = $categories[0];
		if ($cat->parent != 0) {
			$ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
			foreach ($ancestors as $ancestor) {
				$str .= '<li><a href="' . get_category_link($ancestor) . '">' . get_cat_name($ancestor) . '</a></li>';
			}
		}
		$str .= '<li><a href="' . get_category_link($cat->term_id) . '">' . $cat->cat_name . '</a></li>';
	}
	// }
	//カスタム投稿タイプの場合
	if (get_post_type($post) == 'interview' || get_post_type($post) == 'column' || get_post_type($post) == 'client') {
		$url = home_url() . '/';
		if (get_post_type($post) == 'client') {
			$url .= 'company/';
		}
		$url .= get_post_type($post) . '/';
		$str .= '<li><a href="' . $url . '">' . esc_html(get_post_type_object(get_post_type())->label) . '</a></li>';
	}
	if (is_category()) {
		$cat = get_queried_object();
		if ($cat->parent != 0) {
			$ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
			foreach ($ancestors as $ancestor) {
				$str .= '<li><a href="' . get_category_link($ancestor) . '">' . get_cat_name($ancestor) . '</a></li>';
			}
		}
		$str .= '<li><a href="' . get_category_link($cat->term_id) . '">' . $cat->cat_name . '</a></li>';
	}
	if (is_tag()) {
		$page_title = single_tag_title('', false);
	} else {
		$page_title = str_replace(array('<br>', '<br />'), '', get_the_title());
	}
	$str .= '<li>' . $page_title . '</li>';
	$str .= '</ul></div></div>';

	echo '<textarea style="width:100%;height:200px">' . $str . '</textarea>';
}
add_action('admin_menu', 'add_breadcrumb');


//親ページのスラッグを取得
function is_parent_slug()
{
	global $post;
	if ($post->post_parent) {
		$post_data = get_post($post->post_parent);
		return $post_data->post_name;
	}
}

//ブロックカテゴリ:コラム
add_filter('block_categories_all', 'add_block_categories', 10, 2);
function add_block_categories($block_categories, $editor_context)
{
	$add_categories = [
		[
			'slug' => 'column',
			'title' => 'コラム',
			'icon' => 'welcome-write-blog',
		],
	];
	return array_merge($block_categories, $add_categories);
}

// ページネーションの現在ページのクラス名
function custom_wp_pagenavi_class_current($class_name)
{
	return 'on';
}
add_filter('wp_pagenavi_class_current', 'custom_wp_pagenavi_class_current');

// ページネーション前へのクラス名
function custom_wp_pagenavi_class_previouspostslink($class_name)
{
	return 'pre_nex';
}
add_filter('wp_pagenavi_class_previouspostslink', 'custom_wp_pagenavi_class_previouspostslink');

// ページネーション次へのクラス名
function custom_wp_pagenavi_class_nextpostslink($class_name)
{
	return 'pre_nex';
}
add_filter('wp_pagenavi_class_nextpostslink', 'custom_wp_pagenavi_class_nextpostslink');

//ページネーションHTML
function custom_wp_pagenavi($html)
{
	$out = '';
	$out = str_replace("<div", "", $html);
	$out = str_replace("class='wp-pagenavi'", "", $out);
	$out = str_replace("role='navigation'>", "", $out);
	$out = str_replace(" class='pages'", "", $out);
	$out = str_replace(" aria-current='page'", "", $out);
	$out = str_replace("<a", "<li><a", $out);
	$out = str_replace("</a>", "</a></li>", $out);
	$out = str_replace("<span", "<li", $out);
	$out = str_replace("</span>", "</li>", $out);
	$out = str_replace("</div>", "", $out);
	return '<ul class="pager">' . $out . '</ul>';
}
add_filter('wp_pagenavi', 'custom_wp_pagenavi');


//記事内見出しリスト（ブロック生成見出し）
function get_index()
{
	global $post;
	preg_match_all('/<!-- wp:block-lab\/h4 {"h4":".+"/', $post->post_content, $tmp);
	// preg_match_all('/<h4\s.+>.+<\/h4>/u', $post->post_content, $tmp);
	if (!empty($tmp[0])) {
		foreach ($tmp[0] as $key => $val) {
			$target_txt = array('<!-- wp:block-lab/h4 {"h4":"', '"');
			$matches[$key] = str_replace($target_txt, '', $val);
		}
		return $matches;
	}
}

//記事内H2リスト
function get_h2()
{
	global $post;
	preg_match_all('/<!-- wp:block-lab\/h[2-3] {"text":".+"/', $post->post_content, $tmp);
	if (!empty($tmp[0])) {
		$h2_key = 0;
		$h3_key = 0;
		$h3_start = 0; //ulを入れ子にする必要があるかどうか
		foreach ($tmp[0] as $key => $val) {
			//H2の場合
			if (strpos($val, 'h2') !== false) {
				$ul_wrap_end = $h3_start == 1 ? '</ul>' : ''; //見出しh3のあとに来るh2はh3のulを閉じないといけない
				$h3_start = 0;
				$target_txt = array('<!-- wp:block-lab/h2 {"text":"', '"');
				$matches[$key] = $ul_wrap_end . '<li><a href="#h2-' . $h2_key . '">' . str_replace($target_txt, '', $val) . '</a></li>';
				$h2_key++;
			}
			//H3の場合
			if (strpos($val, 'h3') !== false) {
				$target_txt = array('<!-- wp:block-lab/h3 {"text":"', '"');
				$ul_wrap_start = $h3_start != 1 ? '<ul>' : ''; //h2の直後のh3はulで入れ子にしないといけない
				$matches[$key] = $ul_wrap_start . '<li><a href="#h3-' . $h3_key . '">' . str_replace($target_txt, '', $val) . '</a></li>';
				$h3_key++;
				$h3_start = 1;
			}
		}
		return $matches;
	}
}

//コラム、インタビューsingle目次
function index_link()
{
	global $post;
	preg_match_all('/^<h2', $post->post_content, $tmp);
	// preg_match_all('/<h3\s.+>.+<\/h3>/u', $post->post_content, $tmp);
	foreach ($tmp[0] as $key => $val) {
		$target_txt = array('<h2>', '</h2>');
		$matches[$key] = str_replace($target_txt, '', $val);
	}
	return $matches;
}


//リダイレクトさせない（ページネーションの前後ページが「/page/2」みたいになるのを止める）
add_filter('redirect_canonical', 'my_disable_redirect_canonical');
function my_disable_redirect_canonical($redirect_url)
{
	if (is_archive()) {
		$subject = $redirect_url;
		$pattern = '/\/page\//'; // URLに「/page/」があるかチェック
		preg_match($pattern, $subject, $matches);

		if ($matches) {
			//リクエストURLに「/page/」があれば、リダイレクトしない。
			$redirect_url = false;
			return $redirect_url;
		}
	}
}

//wp自動canonicalの精度が低いので自作出力
remove_action('wp_head', 'rel_canonical');
add_action('wp_head', 'add_canonical');
function add_canonical()
{
	$canonical = null;

	$now_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$pos = strpos($now_url, '?paged=');
	if ($pos !== false) {
		$canonical = $now_url;
	} elseif (is_home() || is_front_page()) {
		$canonical = home_url();
	} elseif (is_category()) {
		$canonical = get_category_link(get_query_var('cat'));
	} else if (is_tag()) {
		$canonical = get_tag_link(get_queried_object()->term_id);
	} elseif (is_search()) {
		$canonical = get_search_link();
	} elseif (is_page() || is_single()) {
		$canonical = get_permalink();
	} else {
		$canonical = home_url();
	}
	if (substr($canonical, -1) !== '/' && !$pos) {
		$canonical .= '/';
	}

	echo '<link rel="canonical" href="' . $canonical . '">' . "\n";
}



//スラッグ名が日本語だったら自動的に投稿タイプ＋id付与へ変更（スラッグを手動設定した場合はスルー）
function auto_post_slug($slug, $post_ID, $post_status, $post_type)
{
	if (preg_match('/(%[0-9a-f]{2})+/', $slug)) {
		$slug = utf8_uri_encode($post_type) . '_' . $post_ID;
	}
	return $slug;
}
add_filter('wp_unique_post_slug', 'auto_post_slug', 10, 4);


/*ショートコード サイトURL：[url]*/
function shortcode_url()
{
	return home_url();
}
add_shortcode('url', 'shortcode_url');

/*ショートコード テンプレートURL：[t_url]*/
function shortcode_templateurl()
{
	return get_bloginfo('template_url');
}
add_shortcode('t_url', 'shortcode_templateurl');

//wp_titleで出力する記事名の前にスペースが入るのをやめさせる
// $title_remove = function($a,$b){
// 	return str_replace(" $b ","",$a);
// }
// add_filter('wp_title', create_function('$a, $b','return str_replace(" $b ","",$a);'), 10, 2);
// add_filter('wp_title', $title_remove($a,$b),10,2);
add_filter('wp_title', function ($a, $b) {
	return str_replace(" $b ", "", $a);
}, 10, 2);


// メタボックスの追加
add_action('admin_menu', 'add_noindex_metabox');
function add_noindex_metabox()
{
	add_meta_box('custom_noindex', 'インデックス設定', 'create_noindex', array('post', 'page', 'member', 'video', 'member-entry', 'notice', 'exhibition-indonesia'), 'side');
}

// 管理画面にフィールドを出力
function create_noindex()
{
	$keyname = 'noindex';
	global $post;
	$get_value = get_post_meta($post->ID, $keyname, true);
	//会員記事のデフォルト
	if ($post->post_type == 'member' && !$get_value) {
		$get_value = 'noindex';
	}
	wp_nonce_field('action_' . $keyname, 'nonce_' . $keyname);
	$value = 'noindex';
	$checked = '';
	// if( $value === $get_value ) $checked = ' checked';
	if ($get_value == 'noindex') {
		$index_checked = '';
		$noindex_checked = ' checked';
	} else {
		$index_checked = ' checked';
		$noindex_checked = '';
	}

	// echo '<label><input type="checkbox" name="' . $keyname . '" value="' . $value . '"' . $checked . '>' . $keyname . '</label>';
	echo '<label>	<input type="radio" name="noindex" value="index"' . $index_checked . '>する</label><label>	<input type="radio" name="noindex" value="noindex"' . $noindex_checked . '>しない</label>';
}

// カスタムフィールドの保存
add_action('save_post', 'save_custom_noindex');
function save_custom_noindex($post_id)
{
	$keyname = 'noindex';
	if (isset($_POST['nonce_' . $keyname])) {
		if (check_admin_referer('action_' . $keyname, 'nonce_' . $keyname)) {
			if (isset($_POST[$keyname])) {
				update_post_meta($post_id, $keyname, $_POST[$keyname]);
			} else {
				delete_post_meta($post_id, $keyname, get_post_meta($post_id, $keyname, true));
			}
		}
	}
}

//コラムサイドバー指定
function my_custom_fields()
{
	global $post;
	if ($post->post_type == 'page' && !in_array($post->post_name, ['news', 'column', 'interview', 'member', 'video', 'member_entry', 'search_result'])) {
		echo '（このページはサイドバー指定できません）';
		return;
	}

	$path = get_template_directory();
	$list_tmp = glob($path . '/parts/side_bar/*.*');
	$list = [];
	foreach ($list_tmp as $val) {
		if (strpos($val, 'side_bar') !== false) {
			$list[] = str_replace($path . '/parts/side_bar/', '', $val);
		}
	}
	$asign = get_post_meta($post->ID, 'sidebar', true);
	$html = '<select name="sidebar">';
	$html .= '<option value="">（指定なし）</option>';
	foreach ($list as $val) {
		$html .= '<option value="' . esc_attr($val) . '"';
		if ($val == $asign) {
			$html .= ' selected';
		}
		$html .= '>' . esc_html($val) . '</option>';
	}
	$html .= '</select>';
	echo $html;
}


function add_custom_fields()
{
	add_meta_box('my_sectionid', 'サイドバー指定', 'my_custom_fields', ['column', 'interview', 'member', 'video', 'page', 'member_entry', 'exhibition-indonesia']);
}
add_action('admin_menu', 'add_custom_fields');

//お客様の声指定
function client_summary()
{
	global $post;
	//固定ページは一覧ページ以外表示させない
	// if($post->post_type=='page'&&$post->post_name!='news'&&$post->post_name!='column'&&$post->post_name!='interview'&&$post->post_name!='member'&&$post->post_name!='video'&&$post->post_name!='member_entry'){
	// 	echo '（このページはサイドバー指定できません）';
	// 	return;
	// }

	$path = get_template_directory();
	$list_tmp = glob($path . '/parts/client_summary/*.*');
	foreach ($list_tmp as $val) {
		if (strpos($val, 'client_summary') !== false) {
			$list[] = str_replace($path . '/parts/client_summary/', '', $val);
		}
	}
	$asign = get_post_meta($post->ID, 'client_summary', true);
	$html = '<select name="client_summary">';
	$html .= '<option value="-1">（表示しない）</option>';
	foreach ($list as $val) {
		$html .= '<option value="' . $val . '"';
		if ($val == $asign) {
			$html .= ' selected';
		}
		$html .= '>' . $val . '</option>';
	}
	$html .= '<select>';
	echo $html;
}
function client_summary_show()
{
	add_meta_box('client_summary_box', 'お客様の声', 'client_summary', ['column', 'interview', 'member', 'video', 'page', 'member_entry', 'exhibition-indonesia']);
}
add_action('admin_menu', 'client_summary_show');

// カスタムフィールドの値を保存
add_action('init', 'function_init');
function function_init()
{
	session_start();
}

function save_custom_fields($post_id)
{
	if (!empty($_POST['sidebar'])) {
		update_post_meta($post_id, 'sidebar', sanitize_text_field($_POST['sidebar']));
	} else {
		delete_post_meta($post_id, 'sidebar');
	}
	if (!empty($_POST['client_summary'])) {
		update_post_meta($post_id, 'client_summary', sanitize_text_field($_POST['client_summary']));
	} else {
		delete_post_meta($post_id, 'client_summary');
	}

	// POSTデータをダンプする前に、機密情報を除去するか、必要な情報のみを選択してダンプすることをお勧めします
	// $safe_post_data = array_intersect_key($_POST, array_flip(['sidebar', 'client_summary']));
	// dump($safe_post_data, 'original-custom-field');
}
add_action('save_post', 'save_custom_fields');



//コラムカテゴリー別関連記事指定（サジェスト式に変更したので不要に）
// function column_category_relate() {
// 	global $post;
// 	//固定ページは一覧ページ以外表示させない
// 	if($post->post_type=='page'&&$post->post_name!='column'&&$post->post_name!='interview'&&$post->post_name!='member'&&$post->post_name!='video'&&$post->post_name!='member_entry'){
// 		echo '（このページは関連記事を指定できません）';
// 		return;
// 	}

// 	$path = get_template_directory();
// 	$list_tmp = glob($path.'/parts/column_related/*.*');
// 	foreach($list_tmp as $val){
// 		if(strpos($val,'column_related')!==false){
// 			$list[] = str_replace($path.'/parts/column_related/','',$val);
// 		}
// 	}
// 	$asign = get_post_meta($post->ID,'column_related',true);
// 	$html = '<select name="column_related">';
// 	$html .= '<option value="">（指定なし）</option>';
// 	foreach($list as $val){
// 		$html .= '<option value="'.$val.'"';
// 		if($val == $asign){
// 			$html .= ' selected';
// 		}
// 		$html .= '>'.$val.'</option>';
// 	}
// 	$html .= '<select>';
// 	echo $html;

// }
// function add_column_category_relate() {
// 	add_meta_box( 'column_category_relate', '関連記事指定', 'column_category_relate', ['column','interview','member','video','page','member_entry','exhibition-indonesia']);
// }
// add_action('admin_menu', 'add_column_category_relate');

// カスタムフィールドの値を保存
// add_action('init', 'function_init');
// function save_column_related( $post_id ) {
// 	$_SESSION['post'] = $_POST;
// 	if(!empty($_POST['column_related']))
// 		update_post_meta($post_id, 'column_related', $_POST['column_related'] );
// 	else delete_post_meta($post_id, 'column_related');

// }
// add_action('save_post', 'save_column_related');

//SNSのシェア数
function get_twitter_count($url)
{
	$url = urlencode($url);
	$ch = curl_init("https://twitter.countoon.com/count.json?url=" . $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$json = curl_exec($ch);
	curl_close($ch);
	$array = json_decode($json, true);
	
	// $arrayがnullまたは配列でない場合、または'count'キーが存在しない場合は0を返す
	if (!$array || !is_array($array) || !isset($array['count'])) {
		return 0;
	}
	
	$count = strval($array['count']);
	$count = ($count);
	return $count;
}
function get_facebook_count($url)
{
	// $url = urlencode($url);
	// $ch = curl_init("https://graph.facebook.com/?id=$url&fields=og_object{engagement},engagement&access_token=6429006933836093|oNMlz3xnpslNOpKloyTXCUUApDE");
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// $json = curl_exec($ch);
	// curl_close($ch);
	// $array = json_decode($json, true ) ;
	// $count = $array['share']['share_count'];
	// $count = num_format($count);
	// return $count;

	// $fb_url = "https://graph.facebook.com/?id=$url&fields=og_object{engagement},engagement&access_token=6429006933836093|oNMlz3xnpslNOpKloyTXCUUApDE";
	// $json = file_get_contents($fb_url);
	// return json_decode($json)->engagement->share_count;
	
	// 現在はFacebook APIの制限により正確なシェア数を取得できないため0を返す
	return 0;
}
function num_format($count)
{
	//3桁区切りのカンマを削除
	$count = str_replace(',', '', $count);
	//数値に変換
	$count = intval($count);
	// 共有数を表示
	return isset($count) ? intval($count) : 0;
}

//管理画面「投稿」表記を「ニュース」に
function Change_menulabel()
{
	global $menu;
	global $submenu;
	$name = 'ニュース';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name . '一覧';
	$submenu['edit.php'][10][0] = '新しい' . $name;
}
function Change_objectlabel()
{
	global $wp_post_types;
	$name = 'ニュース';
	$labels = &$wp_post_types['post']->labels;
	$labels->name = $name;
	$labels->singular_name = $name;
	$labels->add_new = _x('追加', $name);
	$labels->add_new_item = $name . 'の新規追加';
	$labels->edit_item = $name . 'の編集';
	$labels->new_item = '新規' . $name;
	$labels->view_item = $name . 'を表示';
	$labels->search_items = $name . 'を検索';
	$labels->not_found = $name . 'が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
add_action('init', 'Change_objectlabel');
add_action('admin_menu', 'Change_menulabel');





/** 読むのにかかる時間を表示 */
function my_reading_time()
{
	global $post;

	/** 1分間に読める文字数の平均 */
	$per_min = 1600;

	$content = $post->post_content;
	$replace[] = '<!-- wp:block-lab\/question {"question":"';
	$replace[] = '<!-- wp:block-lab/answer {"name"';
	$replace[] = ':';
	$replace[] = '"';
	$replace[] = ',';
	$replace[] = '/';
	$replace[] = '}';
	$replace[] = '-';
	$replace[] = 'answer';
	$content = str_replace($replace, '', $content);
	$count = mb_strlen(strip_tags($content));
	$mins = round($count / $per_min) > 0 ? round($count / $per_min) . 'minutes' : null;
	$secs = round($count % $per_min / ($per_min / 60));

	echo <<<EOM

You can read this article <span class="b">in {$mins}</span>

EOM;
}


//会員登録後ログインしてリダイレクト
function my_reg_redirect($fields)
{
	//会員記事詳細から来た場合はmember-thanksに遷移
	if (strpos($_SESSION['from_page'], '/member/') !== false) {
		$redirect_url = home_url() . '/member/member-thanks/';
	} else {
		//全ページ共通header.phpで記録したそのページのURLがあればそこへ遷移、なければトップページ
		// $redirect_url = !empty($_SESSION['from_page']) ? $_SESSION['from_page'] : home_url();
		$redirect_url = home_url() . '/member_entry/';
	}

	if (isset($_POST['user_email'])) {
		$user_data = get_user_by('email', $_POST['user_email']);
	}
	if ($user_data) {
		$user_id = $user_data->ID;
		wp_set_auth_cookie($user_id, false, is_ssl()); //遷移前にログイン
		$_SESSION['login_begin'] = 1; //ログイン後のページで「ログインしました」通知のためのフラグ
		wp_safe_redirect($redirect_url); //登録前のページかトップへリダイレクト
		exit;
	}
}
add_action('wpmem_register_redirect', 'my_reg_redirect');

//会員ログイン後のリダイレクト
function my_login_redirect($redirect_to, $user_id)
{
	session_start();
	if (strpos($_SESSION['from_page'], '/member/') !== false || strpos($_SESSION['from_page'], '/video/') !== false) {
		$redirect_url = home_url() . '/member/member-thanks/';
	} else {
		// $redirect_url = !empty($_SESSION['from_page'])?$_SESSION['from_page']:home_url();
		$redirect_url = home_url() . '/member_entry/';
	}

	$_SESSION['login_begin'] = 1; //ログイン後のページで「ログインしました」通知のためのフラグ
	wp_safe_redirect($redirect_url);
	exit;
	// return $ref;
}
add_filter('wpmem_login_redirect', 'my_login_redirect', 10, 2);

//ログイン画面のinputラベルを変更
function change_the_content($the_content)
{
	$the_content = str_replace('Email (Use your mission email address if applicable)', 'メール', $the_content);
	$the_content = str_replace('既存ユーザのログイン', 'ログイン', $the_content);
	$the_content = str_replace('メールアドレスを確認', 'メールアドレス再確認', $the_content);
	$the_content = str_replace('新規ユーザー登録', '会員登録', $the_content);
	$the_content = str_replace('新規パスワード', '新パスワード', $the_content);
	$the_content = str_replace('新しいパスワードを確認', '新パスワード確認', $the_content);
	$the_content = str_replace('このページは会員限定です。登録またはログインをお願いいたします。', '<i class="fa-solid fa-lock"></i>This article is for members only. You can read the rest by registering.', $the_content);
	$the_content = str_replace('value="forever"', 'value="forever" checked', $the_content);
	$the_content = str_replace('value="forever"', 'value="forever" checked', $the_content);
	$the_content = str_replace('パスワードを忘れた場合', '<a href="' . home_url() . '/member_edit/?a=pwdreset">パスワードを忘れた場合</a>', $the_content);
	$the_content = str_replace('<a href="https://tricruise.id/member_edit/?a=pwdreset">パスワードリセット</a>', '', $the_content);
	//会員情報編集ページのみ適用対象
	if (strpos($the_content, 'a=edit')) {
		$the_content = str_replace('登録情報の編集', 'メールアドレスを変更', $the_content);
	}
	return $the_content;
}
add_filter('the_content', 'change_the_content', 100);

//会員登録項目からユーザー名削除	
function my_wpmem_register_form_rows($rows)
{
	if (isset($rows['username'])) {
		unset($rows['username']);
	}
	return $rows;
}
add_filter('wpmem_register_form_rows', 'my_wpmem_register_form_rows');

function my_wpmem_pre_validate_form($fields)
{
	if (! isset($fields['username']) || $fields['username'] == '') {
		$fields['username'] = $fields['user_email'];
	}
	return $fields;
}
add_filter('wpmem_pre_validate_form', 'my_wpmem_pre_validate_form');


//特定記事を記事リストから除外
function rssfilter($query)
{
	if (!is_admin() && $query->is_feed) {
		$query->set('post__not_in', [3344, 2488, 2410, 2362, 2360, 2114, 2109, 1754, 886, 675, 627, 557, 453, 407, 341, 312, 64, 3217]);
	}
	return $query;
}
add_filter('pre_get_posts', 'rssfilter');



//feedにカスタム投稿を含める
function mysite_feed_request($vars)
{
	if (isset($vars['feed']) && !isset($vars['post_type'])) {
		$vars['post_type'] = array('post', 'interview', 'member', 'column', 'client', 'careers', 'exhibition-indonesia');
	}
	return $vars;
}
add_filter('request', 'mysite_feed_request');

//feedキャッシュ持続時間
define('MAGPIE_CACHE_ON', 0);

//抜粋の文字数変更
function wpdocs_custom_excerpt_length($length)
{
	return 120;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

function new_excerpt_more($more)
{
	global $post;
	return '…';
}
add_filter('excerpt_more', 'new_excerpt_more', 9999);


//カノニカルと現在のURLが違う場合、カノニカルにリダイレクト
add_action('template_redirect', 'canonical_redirect');
function canonical_redirect()
{
	$canonical = null;

	if (is_home() || is_front_page()) {
		$canonical = home_url();
	} elseif (is_category()) {
		$canonical = get_category_link(get_query_var('cat'));
	} else if (is_tag()) {
		$canonical = get_tag_link(get_queried_object()->term_id);
	} elseif (is_search()) {
		$canonical = get_search_link();
	} elseif (is_page() || is_single()) {
		$canonical = get_permalink();
	} else {
		$canonical = home_url();
	}
	if (substr($canonical, -1) !== '/') {
		$canonical .= '/';
	}

	//現在のURLがcanonicalと違う場合はcanonical URLに飛ばす。
	// $current_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$current_url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

	if ($canonical !== $current_url && strpos($current_url, '?') === false) {
		header("Location: $canonical", true, 301);
		exit;
	}
}

// カスタムフィールドの値を管理画面の投稿一覧に表示する
function add_exhibition_start_day_to_post_list($columns)
{
	$columns['exhibition_start_day'] = '開始日';
	return $columns;
}
add_filter('manage_exhibition-indonesia_posts_columns', 'add_exhibition_start_day_to_post_list');

function add_exhibition_start_day_to_post_list_content($column_name, $post_id)
{
	if ($column_name == 'exhibition_start_day') {
		echo get_field('exhibition_start_day', $post_id);
	}
}
add_action('manage_exhibition-indonesia_posts_custom_column', 'add_exhibition_start_day_to_post_list_content', 10, 2);

// カスタムフィールドの値でソートする
function add_exhibition_start_day_to_post_list_sortable($columns)
{
	$columns['exhibition_start_day'] = 'exhibition_start_day';
	return $columns;
}
add_filter('manage_edit-exhibition-indonesia_sortable_columns', 'add_exhibition_start_day_to_post_list_sortable');

function sort_exhibition_start_day_by_post_list($vars)
{
	$columns = get_columns();
	if (isset($vars['orderby']) && $vars['orderby'] == 'exhibition_start_day') {
		$vars = array_merge($vars, array(
			'meta_key' => 'exhibition_start_day',
			'orderby' => 'meta_value_num'
		));
	}
	return $vars;
}
add_filter('request', 'sort_exhibition_start_day_by_post_list');

function get_columns()
{
	$columns = array(
		'cb' => '<input type=“checkbox” />',
		'title' => 'タイトル',
		'exhibition_start_day' => '開始日',
		'date' => '日付',
	);
	return $columns;
}


function set_posts_order_in_admin($wp_query)
{
	if (is_admin() && !isset($_GET['orderby']) && ($wp_query->query['post_type'] === 'post' || $wp_query->query['post_type'] === 'exhibition-indonesia' || $wp_query->query['post_type'] === 'page')) {
		$wp_query->set('orderby', 'date');
		$wp_query->set('order', 'DESC');
	}
}
add_action('pre_get_posts', 'set_posts_order_in_admin');


// 固定ページでカテゴリーを有効化
function add_category_to_page()
{
	register_taxonomy_for_object_type('category', 'page');
}
add_action('init', 'add_category_to_page');

//投稿画面の[client_summary]記載位置にお客様の声を表示
function client_summary_func()
{
	global $post;
	$asign = get_post_meta($post->ID, 'client_summary', true);
	$file_name = str_replace('.php', '', get_post_meta(get_the_ID())['client_summary'][0]);
	ob_start();
	get_template_part('parts/client_summary/' . $file_name);

	$html = ob_get_contents();
	ob_end_clean();

	return $html;
}
add_shortcode('client_summary', 'client_summary_func');

//投稿画面の[client_name]記載位置に企業ロゴスライダーを表示
function client_name_shortcode()
{
	ob_start();
	get_template_part('parts/client_name');
	$output = ob_get_clean();
	if (!$output) {
		$output = "Client Name Template Part Not Found";
	}
	return $output;
}
add_shortcode('client_name', 'client_name_shortcode');


//非同期などダンプが使えない処理でダンプさせたいときdump.txtに出力
function dump($msg, $title = '')
{
	$error_dir = wp_upload_dir()['basedir'] . '/debug.log';
	$date = date('d.m.Y h:i:s');
	$msg = print_r($msg, true);
	$log = $title . "  |  " . $msg . "\n";
	error_log($log, 3, $error_dir);
}

//サジェスト式関連記事選択機能
function my_column_related_suggest()
{
	//設定済みの値を入力欄に表示
	global $post;
	$current = '';
	if ($post) {
		$post_meta = get_post_meta($post->ID);
		if (isset($post_meta['column_related']) && is_array($post_meta['column_related']) && !empty($post_meta['column_related'][0])) {
			$current = $post_meta['column_related'][0];
		}
	}
	echo '<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>';


	//サジェストリスト
	$directory = get_template_directory() . '/parts/column_related/';
	$folderAndFileNames = getFolderAndFileNames($directory);
	// $folderAndFileNames_json = json_encode($folderAndFileNames);


	$list = 'jQuery(function(){let words = [';
	foreach ($folderAndFileNames as $val) {
		$list .= '"' . $val . '",';
	}
	$list .= '];jQuery(".column_related_suggest").autocomplete({source: words,appendTo:"#column_related_suggest_id",autoFocus:true})});';
	echo '<script>' . $list . '</script>';
	echo '<input type="text" name="column_related" class="column_related_suggest" value="' . esc_html($current) . '" size="60"></p>';
}

function add_column_related_suggest()
{
	add_meta_box('column_related_suggest_id', '関連記事', 'my_column_related_suggest', ['column', 'interview', 'member', 'video', 'page', 'member_entry', 'exhibition-indonesia']);
}

add_action('admin_menu', 'add_column_related_suggest');


function save_column_related_suggest($post_id)
{
	if (!empty($_POST['column_related'])) {
		update_post_meta($post_id, 'column_related', $_POST['column_related']);
	} else {
		delete_post_meta($post_id, 'column_related');
	}
}
add_action('save_post', 'save_column_related_suggest');


// 指定ディレクトリのフォルダ・ファイルリスト取得
function getFolderAndFileNames($dir)
{
	$result = [];
	$files = scandir($dir);
	foreach ($files as $file) {
		if ($file != '.' && $file != '..') {
			$fullPath = $dir . '/' . $file;

			// ディレクトリの場合は再帰的に処理
			if (is_dir($fullPath)) {
				$result = array_merge($result, getFolderAndFileNames($fullPath));
			} else {
				$result[] = $file;
			}
		}
	}
	return $result;
}

// 指定ディレ内から指定したファイル名のパス取得（関連記事用）
function get_file_path($file_name)
{
	$directory = new RecursiveDirectoryIterator(get_template_directory() . '/parts/column_related/');
	$iterator = new RecursiveIteratorIterator($directory);

	// ファイル名に$column_relatedを含むファイルのパスを探す
	foreach ($iterator as $file) {
		if ($file->isFile() && strpos($file->getFilename(), $file_name) !== false) {
			// echo 'Matched file path: ' . $file->getPathname();
			return $file->getPathname();
		}
	}
}

// 指定ディレ内から指定したファイル名のパス取得（文末CTA用）
function get_file_path_article_foot($file_name)
{
	$directory = new RecursiveDirectoryIterator(get_template_directory() . '/parts/main/7/');
	$iterator = new RecursiveIteratorIterator($directory);

	// ファイル名に$column_relatedを含むファイルのパスを探す
	foreach ($iterator as $file) {
		if ($file->isFile() && strpos($file->getFilename(), $file_name) !== false) {
			// echo 'Matched file path: ' . $file->getPathname();
			return $file->getPathname();
		}
	}
}


//記事詳細中の3つ目の見出しの前に関連記事パーツ挿入　→20241122に関連記事ではなくmain/bのファイル（記事編集の文中CTAで指定）を読み込む仕様に変更
// function insert_related_content_before_third_heading($content, $assign_column_related)
// {
// 	// h2, h3, h4, h5, h6タグでコンテンツを分割
// 	// $pattern = '/<h[2-6][^>]*>.*?<\/h[2-6]>/i';
// 	$pattern = '/<h2[^>]*>.*?<\/h2>/i';
// 	preg_match_all($pattern, $content, $headings);

// 	if (count($headings[0]) >= 3) {
// 		// 3つ目の見出しの位置を見つける
// 		$third_heading_pos = strpos($content, $headings[0][2]);

// 		// コンテンツを2つの部分に分割
// 		$content_before = substr($content, 0, $third_heading_pos);
// 		$content_after = substr($content, $third_heading_pos);

// 		// 関連コンテンツを取得
// 		ob_start();
// 		if ($assign_column_related) {
// 			require($assign_column_related);
// 		}
// 		$related_content = ob_get_clean();

// 		// 関連コンテンツを挿入して新しいコンテンツを作成
// 		$new_content = $content_before . $related_content . $content_after;

// 		return $new_content;
// 	}

// 	// 見出しが3つ未満の場合は、元のコンテンツをそのまま返す
// 	return $content;
// }




// 記事編集画面で指定したパーツを記事文末に表示 start
function article_cta_field()
{
	global $post;
	$path = get_template_directory() . '/parts/main/7/';
	$list = getFolderAndFileNames($path);

	$asign = get_post_meta($post->ID, 'article_cta_suggest', true);
	$html = '<input type="text" name="article_cta_suggest" id="article_cta_suggest" class="article_cta_suggest" value="' . esc_attr($asign) . '">';

	// 値を保存するためのhiddenフィールド
	// $html .= '<input type="hidden" name="article_cta_suggest" id="article_cta_suggest" value="' . esc_attr($asign) . '">';

	$list_json = json_encode($list);
	$html .= <<<JS
	<script>
	jQuery(function($) {
		let words = $list_json;
		$("#article_cta_suggest").autocomplete({
			source: words,
			minLength: 0,
			select: function(event, ui) {
				// hiddenフィールドに値を保存
				$('#article_cta_suggest').val(ui.item.value);
			}
		});
	});
	</script>
	JS;

	echo $html;
}
function add_article_cta_metabox()
{
	add_meta_box('article_cta_metabox', '文末CTA', 'article_cta_field', ['post', 'page', 'column', 'interview', 'member', 'video', 'member_entry', 'exhibition-indonesia']);
}
add_action('admin_menu', 'add_article_cta_metabox');
function save_article_cta($post_id)
{
	if (isset($_POST['article_cta_suggest'])) {
		update_post_meta($post_id, 'article_cta_suggest', $_POST['article_cta_suggest']);
	}
}
add_action('save_post', 'save_article_cta');
// 記事編集画面で指定したパーツを記事文末に表示 end


// SPサブメニュー下部CTA start
function get_main_parts_files() {
	$dir_path = get_template_directory() . '/parts/main/sp/';
	if (!is_dir($dir_path)) {
		return array();
	}

	$files = scandir($dir_path);
	$files = array_diff($files, array('.', '..', '.DS_Store')); // 不要なファイルを除外
	return $files;
}
function add_submenu_cta_metabox() {
	add_meta_box(
		'submenu_cta_metabox', // ID
		'SPサブメニューCTA', // タイトル
		'render_submenu_cta_metabox', // コールバック関数
		array('post','page', 'interview', 'column', 'client', 'member', 'member_entry', 'careers','video', 'exhibition-indonesia'), //対象投稿タイプ
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'add_submenu_cta_metabox');
function render_submenu_cta_metabox($post) {
	wp_nonce_field('submenu_cta_nonce', 'submenu_cta_nonce');
	$selected_file = get_post_meta($post->ID, 'submenu_cta_file', true);
	$files = get_main_parts_files();

	
	echo '<select name="submenu_cta_file" id="submenu_cta_file">';
	echo '<option value="">（表示しない）</option>'; // デフォルトの選択肢

	foreach ($files as $file) {
		$selected = ($selected_file === $file) ? 'selected' : '';
		echo '<option value="' . esc_attr($file) . '" ' . $selected . '>' . esc_html($file) . '</option>';
	}

	echo '</select>';
}
function save_submenu_cta_metabox($post_id) {
	if (!isset($_POST['submenu_cta_nonce']) || !wp_verify_nonce($_POST['submenu_cta_nonce'], 'submenu_cta_nonce')) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	if (isset($_POST['submenu_cta_file'])) {
		update_post_meta($post_id, 'submenu_cta_file', sanitize_text_field($_POST['submenu_cta_file']));
	}
}
add_action('save_post', 'save_submenu_cta_metabox');
// SPサブメニュー下部CTA end



// OW記事目次生成機能 20250131 start
add_shortcode('table_of_contents', 'gen_article_index');
function gen_article_index()
{
	//column配下のみ対象
	// if (strpos($_SERVER['REQUEST_URI'], '/column/') === false) {
	// 	return '';
	// }

	// グローバル変数で投稿内容を取得
	global $post;
	$content = $post->post_content;

	preg_match_all('/<h([23])[^>]*>(.*?)<\/h\1>/', $content, $matches, PREG_SET_ORDER);
	if (empty($matches)) {
		return '';
	}

	$toc = '<ol class="page_index_level_1">';
	$h2_count = 0;
	$h3_count = 0;
	$current_h2 = null;

	foreach ($matches as $match) {
		$level = $match[1];
		$title = strip_tags($match[2]);

		if ($level == 2) {
			// h2の処理
			if ($current_h2 !== null) {
				$toc .= '</ul></li>';
			}
			$h2_count++;
			$current_h2 = $h2_count;

			$toc .= sprintf(
				'<li class="page_index_item"><a href="#h2-%d">%s</a><ul class="page_index_level_2">',
				$h2_count,
				$title
			);
		} else {
			// h3の処理
			$h3_count++;
			$toc .= sprintf(
				'<li class="page_index_item"><a href="#h3-%d">%s</a></li>',
				$h3_count,
				$title
			);
		}
	}

	// 最後のh2のulを閉じる
	if ($current_h2 !== null) {
		$toc .= '</ul></li>';
	}

	$toc .= '</ol>';

	// h2, h3タグにIDを付与する処理
	add_filter('the_content', 'add_heading_ids');

	return $toc;
}
function add_heading_ids($content)
{
	// if (strpos($_SERVER['REQUEST_URI'], '/column/') === false) {
	// 	return $content;
	// }

	$h2_count = 0;
	$h3_count = 0;

	// h2タグの処理
	$content = preg_replace_callback(
		'/(<h2)([^>]*>)(.*?)(<\/h2>)/i',
		function ($matches) use (&$h2_count) {
			echo "<!--";var_dump('1484ee',$matches);echo "-->";
			$h2_count++;
			$tag_start = $matches[1]; // <h2
			$tag_attributes = $matches[2]; // 既存の属性 (class="..." など) >
			$tag_content = $matches[3]; // 見出しテキスト
			$tag_end = $matches[4];   // </h2>

			// 既存の属性に id 属性を追加
			$new_attributes = rtrim($tag_attributes, '>') . ' id="h2-' . $h2_count . '">';

			return $tag_start . $new_attributes . $tag_content . $tag_end;
		},
		$content
	);


	// h3タグの処理
	$content = preg_replace_callback(
		'/(<h3)([^>]*>)(.*?)(<\/h3>)/i', // 正規表現を修正
		function ($matches) use (&$h3_count) {
			$h3_count++;
			$tag_start = $matches[1]; // <h3
			$tag_attributes = $matches[2]; // 既存の属性 (class="..." など) >
			$tag_content = $matches[3]; // 見出しテキスト
			$tag_end = $matches[4];   // </h3>

			// 既存の属性に id 属性を追加
			$new_attributes = rtrim($tag_attributes, '>') . ' id="h3-' . $h3_count . '">';

			return $tag_start . $new_attributes . $tag_content . $tag_end; // タグを再構成
		},
		$content
	);


	return $content;
}
// OW記事目次生成機能 20250131 end





// 記事の1-6番目のH2前に編集画面で指定したパーツを表示　start
function get_cta_files($dir_number)
{
	$dir_path = get_template_directory() . "/parts/main/{$dir_number}/";
	if (!is_dir($dir_path)) {
		return array();
	}

	$files = scandir($dir_path);
	return array_filter($files, function ($file) {
		return !in_array($file, array('.', '..'));
	});
}
function add_cta_meta_boxes()
{
	add_meta_box(
		'cta_settings',
		'H2前CTA',
		'render_cta_meta_boxes',
		array('post', 'interview', 'column', 'client', 'member', 'member_entry', 'careers', 'exhibition-indonesia'), //対象投稿タイプ
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'add_cta_meta_boxes', 1);
function render_cta_meta_boxes($post)
{
	wp_nonce_field('cta_settings', 'cta_settings_nonce');

	for ($i = 1; $i <= 6; $i++) {
		$files = get_cta_files($i);
		$field_name = "add_cta_h2_" . $i;
		$current_value = get_post_meta($post->ID, $field_name, true);
		$label = sprintf('%d番目のH2の前', $i);

		echo "<p><label for='{$field_name}'>{$label}</label>";
		echo "<select name='{$field_name}' id='{$field_name}'>";
		echo "<option value=''>（表示しない）</option>";

		foreach ($files as $file) {
			$selected = ($current_value === $file) ? 'selected' : '';
			echo "<option value='{$file}' {$selected}>{$file}</option>";
		}

		echo "</select></p>";
	}
}
function save_cta_meta_boxes($post_id)
{
	if (
		!isset($_POST['cta_settings_nonce']) ||
		!wp_verify_nonce($_POST['cta_settings_nonce'], 'cta_settings')
	) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	// 繰り返し処理でカスタムフィールドを保存
	for ($i = 1; $i <= 6; $i++) {
		$field_name = "add_cta_h2_" . $i;
		if (isset($_POST[$field_name])) {
			update_post_meta($post_id, $field_name, sanitize_text_field($_POST[$field_name]));
		}
	}
}
add_action('save_post', 'save_cta_meta_boxes');
function add_cta_to_content($content)
{
	if (!is_single()) {
		return $content;
	}

	$h2_count = 0;
	$content_parts = preg_split('/(<h2[^>]*>.*?<\/h2>)/i', $content, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

	$new_content = '';
	foreach ($content_parts as $part) {
		if (preg_match('/<h2/i', $part)) {
			$h2_count++;
			if ($h2_count <= 6) {
				$cta_file = get_post_meta(get_the_ID(), "add_cta_h2_" . $h2_count, true);
				if ($cta_file) {
					$file_path = get_template_directory() . "/parts/main/$h2_count/" . $cta_file;
					if (file_exists($file_path)) {
						$cta_content = file_get_contents($file_path);
						$new_content .= $cta_content;
					}
				}
			}
		}
		$new_content .= $part;
	}

	return $new_content;
}
add_filter('the_content', 'add_cta_to_content',99);//目次のページ内リンク先の位置計算のズレ防止のため実行優先度を99に下げた
// 記事の1-6番目のH2前に編集画面で指定したパーツを表示　end



//クイック編集で自作カスタムフィールドがnullになる対策 start
function add_custom_field_columns($columns)
{
	$columns['sidebar'] = 'サイドバー';
	$columns['client_summary'] = 'お客様の声';
	$columns['column_related'] = '関連記事';
	return $columns;
}
add_filter('manage_posts_columns', 'add_custom_field_columns');
function display_custom_field_columns($column_name, $post_id)
{
	switch ($column_name) {
		case 'sidebar':
			$value = get_post_meta($post_id, 'sidebar', true);
			echo esc_html($value);
			break;
		case 'client_summary':
			$value = get_post_meta($post_id, 'client_summary', true);
			echo esc_html($value);
			break;
		case 'column_related':
			$value = get_post_meta($post_id, 'column_related', true);
			echo esc_html($value);
			break;
	}
}
add_action('manage_posts_custom_column', 'display_custom_field_columns', 10, 2);
function add_quick_edit_hidden_fields()
{
	global $post_type;

?>
	<fieldset class="inline-edit-col-right" style="display:none;">
		<div class="inline-edit-col">
			<input type="hidden" name="sidebar" value="">
			<input type="hidden" name="client_summary" value="">
			<input type="hidden" name="column_related" value="">
		</div>
	</fieldset>
<?php

}
add_action('quick_edit_custom_box', 'add_quick_edit_hidden_fields', 10, 2);
function quick_edit_javascript()
{
?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			var wp_inline_edit = inlineEditPost.edit;

			inlineEditPost.edit = function(id) {
				wp_inline_edit.apply(this, arguments);

				var post_id = 0;
				if (typeof(id) == 'object') {
					post_id = parseInt(this.getId(id));
				}

				if (post_id > 0) {
					// 各カスタムフィールドの値を取得して隠しフィールドに設定
					var row = $('#post-' + post_id);
					var sidebar = row.find('.column-sidebar').text();
					var client_summary = row.find('.column-client_summary').text();
					var column_related = row.find('.column-column_related').text();

					var edit_row = $('#edit-' + post_id);
					edit_row.find('input[name="sidebar"]').val(sidebar);
					edit_row.find('input[name="client_summary"]').val(client_summary);
					edit_row.find('input[name="column_related"]').val(column_related);
				}
			};
		});
	</script>
<?php
}
add_action('admin_footer', 'quick_edit_javascript');
function save_quick_edit_fields($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $post_id;

	if (!current_user_can('edit_post', $post_id))
		return $post_id;

	// 各カスタムフィールドの値を保存
	$fields = ['sidebar', 'client_summary', 'column_related'];

	foreach ($fields as $field) {
		if (isset($_POST[$field])) {
			update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
		}
	}
}
add_action('save_post', 'save_quick_edit_fields');
//クイック編集で自作カスタムフィールドがnullになる対策 end
