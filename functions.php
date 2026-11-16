<?php
// 制作実績まわり（入力欄・表示用の関数・最初の取り込み）
require_once get_theme_file_path('inc/acf-works.php');
require_once get_theme_file_path('inc/works-helpers.php');
require_once get_theme_file_path('inc/import-works.php');

// テーマの基本設定
function riku_setup() {
  // <title>をWordPressに出力してもらう
  add_theme_support('title-tag');
  // アイキャッチ画像を使えるようにする
  add_theme_support('post-thumbnails');
  // フォームや画像のHTMLを新しい書き方で出力する
  add_theme_support('html5', array('search-form', 'gallery', 'caption', 'style', 'script'));
}
add_action('after_setup_theme', 'riku_setup');

// CSS・JavaScriptの読み込み
function riku_enqueue() {
  // Googleフォント
  wp_enqueue_style(
    'riku-fonts',
    'https://fonts.googleapis.com/css2?family=Archivo:wght@600;800&family=Noto+Sans+JP:wght@400;500;700&display=swap',
    array(),
    null
  );

  // SCSSから変換したCSS（更新した時刻をバージョンにして、キャッシュが残らないようにする）
  $css = get_theme_file_path('css/style.css');
  wp_enqueue_style('riku-style', get_theme_file_uri('css/style.css'), array('riku-fonts'), filemtime($css));

  // メニューの開閉など（head内でdefer読み込み）
  $js = get_theme_file_path('js/main.js');
  wp_enqueue_script('riku-main', get_theme_file_uri('js/main.js'), array(), filemtime($js), array('strategy' => 'defer'));
}
add_action('wp_enqueue_scripts', 'riku_enqueue');

// Googleフォントの事前接続
function riku_resource_hints($urls, $relation_type) {
  if ($relation_type === 'preconnect') {
    $urls[] = 'https://fonts.googleapis.com';
    $urls[] = array('href' => 'https://fonts.gstatic.com', 'crossorigin');
  }
  return $urls;
}
add_filter('wp_resource_hints', 'riku_resource_hints', 10, 2);

// <title>の区切りを「–」から「|」にする（例：CM_Logs | RIKU MURATA）
function riku_title_separator() {
  return '|';
}
add_filter('document_title_separator', 'riku_title_separator');

// Googleアナリティクス（GA4）
// 本番のサイトだけで計測し、ログイン中の自分のアクセスは数えない
function riku_google_analytics() {
  $measurement_id = 'G-34803BVEP2';
  if (wp_get_environment_type() !== 'production' || is_user_logged_in()) {
    return;
  }
  ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($measurement_id); ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?php echo esc_js($measurement_id); ?>');
  </script>
  <?php
}
add_action('wp_head', 'riku_google_analytics', 1);

// サイトアイコン（管理画面で設定していないときだけ、テーマのアイコンを出す）
function riku_fallback_icon() {
  if (has_site_icon()) {
    return;
  }
  printf('<link rel="icon" href="%s" type="image/png">' . "\n", esc_url(get_theme_file_uri('img/site-icon.png')));
  printf('<link rel="apple-touch-icon" href="%s">' . "\n", esc_url(get_theme_file_uri('img/apple-touch-icon.png')));
}
add_action('wp_head', 'riku_fallback_icon');

// ブログ一覧ページのURL（「設定 → 表示設定」の投稿ページ。未設定なら /blog/）
function riku_blog_url() {
  $page_id = (int) get_option('page_for_posts');
  return $page_id ? get_permalink($page_id) : home_url('/blog/');
}

// 抜粋の長さ（日本語は文字数）と、末尾の記号
function riku_excerpt_length() {
  return 70;
}
add_filter('excerpt_length', 'riku_excerpt_length');

function riku_excerpt_more() {
  return '…';
}
add_filter('excerpt_more', 'riku_excerpt_more');

// Contact Form 7 が勝手に <p> や <br> を足さないようにする（デザインが崩れるため）
add_filter('wpcf7_autop_or_not', '__return_false');

// カスタム投稿「制作実績（works）」
function riku_register_works() {
  register_post_type('works', array(
    'labels' => array(
      'name'          => '制作実績',
      'singular_name' => '制作実績',
      'add_new_item'  => '制作実績を追加',
      'edit_item'     => '制作実績を編集',
    ),
    'public'        => true,
    'has_archive'   => false, // 一覧はトップページの WORKS で見せる
    'menu_position' => 5,
    'menu_icon'     => 'dashicons-portfolio',
    'supports'      => array('title', 'editor', 'thumbnail', 'page-attributes'),
    'show_in_rest'  => true,
    // ブログのURLを /blog/記事名/ にしても、作品は /works/〇〇/ のままにする
    'rewrite'       => array('slug' => 'works', 'with_front' => false),
  ));
}
add_action('init', 'riku_register_works');
