<?php
// 静的HTML版の7作品を、カスタム投稿「制作実績」に取り込む（最初の1回だけ使う）
// 制作実績が1件もないときだけ、管理画面に取り込みボタンを出す

// 取り込むデータ（本文は works-〇〇.html から読み込む）
function riku_import_works_data() {
  return array(
    array(
      'slug' => 'dental', 'title' => 'さわやか歯科クリニック',
      'num' => 'NO.01', 'category_type' => 'ケーススタディ', 'category_tool' => 'WordPressオリジナルテーマ',
      'summary' => '青と白を基調にした歯科医院のサイト。提案からオリジナルテーマで構築し、オンライン予約は診療時間外を選べないようにしました。',
      'lead' => '歯科医院のサイト制作案件を想定し、提案から制作まで行ったケーススタディです。院長への提案文でページ構成・デザイン・機能・お見積もり・スケジュールを示し、その内容をもとにWordPressのオリジナルテーマで構築しました。',
      'meta_type' => 'ケーススタディ（WordPressオリジナルテーマ）', 'role' => '提案・デザイン・コーディング・WordPress構築', 'period' => '約1ヶ月',
      'skills_label' => '使用技術', 'skills' => "HTML\nSCSS\nJavaScript\nWordPress（PHP）\nBootstrap\nContact Form 7\nBooking Package",
      'visual' => 'mockup', 'image_pc' => 'dental-pc.jpg', 'image_sp' => 'dental-sp.jpg',
      'link_label' => 'サイトを見る', 'link_url' => 'https://atptdtmj0902.xsrv.jp/sawayakadentalclinic/',
      'github_url' => 'https://github.com/Murata397/WP_dentalclinic',
    ),
    array(
      'slug' => 'cmlogs', 'title' => 'CM_Logs',
      'num' => 'NO.02', 'category_type' => 'スクール制作', 'category_tool' => 'Ruby on Rails・AWS',
      'summary' => '車の整備手順を投稿・共有できるコミュニティサイト。スクールで作りAWSで公開したものを、Rails 8.1で一から作り直しました。',
      'lead' => '車の整備手順を投稿・共有し、点検時期や燃費も管理できるコミュニティサイトです。スクールでRails 6で作り、AWSで公開まで経験した「CM_Logs」（Ver.1）を、Rails 8.1で一から作り直しました（Ver.2）。',
      'note' => '※ Ver.1は公開を終了しています。Ver.2は本番公開していないため、GitHubのREADMEで画面や起動方法を確認できます。',
      'meta_type' => 'スクール制作（Ver.1）／ 自主制作で一から作り直し（Ver.2）', 'role' => '設計・開発', 'period' => 'Ver.1 約1ヶ月半・Ver.2 3日（AIを活用）',
      'skills_label' => '使用技術', 'skills' => "Ruby 3.4\nRuby on Rails 8.1\nHotwire（Turbo・Stimulus）\nSQLite\nDevise\nActive Storage\nSCSS（FLOCSS）\nJavaScript",
      'visual' => 'mockup', 'image_pc' => 'cmlogs-pc.jpg', 'image_sp' => 'cmlogs-sp.jpg',
      'github_url' => 'https://github.com/Murata397/cm_logs_v2',
    ),
    array(
      'slug' => 'cafe', 'title' => 'Cafe Harmonie',
      'num' => 'NO.03', 'category_type' => 'ケーススタディ', 'category_tool' => 'WordPress',
      'summary' => '個人経営のカフェを想定したWordPressサイト。既存テーマ「Bayside Cafe」を使い、提案からフォーム・地図の設置まで行いました。',
      'lead' => '個人経営のこだわりカフェから、ブログ付きWebサイトの制作を依頼された想定のケーススタディです。オーナーへの提案文でデザインの方針・サイト構成・お見積もり・納期を示し、既存のWordPressテーマ「Bayside Cafe」を使って構築しました。',
      'meta_type' => 'ケーススタディ（既存テーマ使用）', 'role' => '提案・テーマ選定・WordPress構築', 'period' => '2週間',
      'skills_label' => '使用技術', 'skills' => "WordPress\nBayside Cafe（テーマ）\nContact Form 7\nGoogleマップ",
      'visual' => 'mockup', 'image_pc' => 'cafe-pc.jpg', 'image_sp' => 'cafe-sp.jpg',
      'link_label' => 'サイトを見る', 'link_url' => 'https://atptdtmj0902.xsrv.jp/CafeHarmonie/',
    ),
    array(
      'slug' => 'studio', 'title' => 'AI業務効率化セミナー LP',
      'num' => 'NO.04', 'category_type' => 'ケーススタディ', 'category_tool' => 'STUDIO',
      'summary' => 'セミナー告知LPを想定したケーススタディ。STUDIOで、開催日時がすぐ分かり、迷わず申し込める1ページにまとめました。',
      'lead' => 'AI活用コンサル事業を行う「株式会社AIビジネスラボ」から、セミナー告知LPの制作を依頼された想定のケーススタディです。要件定義書をもとに提案文を書き、ノーコードツール「STUDIO」で1ページのLPを制作しました。',
      'meta_type' => 'ケーススタディ（LP制作）', 'role' => '提案・デザイン・STUDIO実装（画像などの素材は支給）', 'period' => '5日',
      'skills_label' => '使用ツール', 'skills' => 'STUDIO',
      'visual' => 'mockup', 'image_pc' => 'studio-pc.jpg', 'image_sp' => 'studio-sp.jpg',
      'link_label' => 'サイトを見る', 'link_url' => 'https://blue511433.studio.site/',
    ),
    array(
      'slug' => 'coding', 'title' => 'コーディング練習（store / SOUSAKU / MyWork）', 'short_title' => 'コーディング練習',
      'num' => 'NO.05', 'category_type' => '模写', 'category_tool' => 'HTML・SCSS・JavaScript',
      'summary' => '既存サイトの模写3点。SCSS・Grid・縦書き・JavaScriptなど、カリキュラムで触れていないことに挑戦しました。',
      'lead' => 'コーディング練習サイト「CodeJump」のデザインを模写した3つのサイトです。スクールのカリキュラムでは詳しく触れていないことに、あえて挑戦する場にしました。',
      'meta_type' => '模写（コーディング練習）', 'role' => 'コーディング', 'period' => '各3週間',
      'skills_label' => '使用技術', 'skills' => "HTML\nCSS\nSCSS\nJavaScript\nress\ndestyle.css\nFlexbox\nCSS Grid",
      'visual' => 'mockup', 'image_pc' => 'store-pc.jpg', 'image_sp' => 'store-sp.jpg',
      'github_url' => 'https://github.com/Murata397/Codejump',
      'sub_links' => "store|https://murata397.github.io/Codejump/store/\nSOUSAKU|https://murata397.github.io/Codejump/Creation/\nMyWork|https://murata397.github.io/Codejump/MyWork/",
    ),
    array(
      'slug' => 'banner', 'title' => 'OUTDOOR FESTIVAL バナー',
      'num' => 'NO.06', 'category_type' => 'スクール課題', 'category_tool' => 'Figma・ロゴ制作',
      'summary' => 'アウトドアイベントの告知バナー。ロゴの真下に開催日を置き、注目してほしい情報は反対色のバッジで強調しました。',
      'lead' => 'キャンプギアが集まるアウトドアイベントの告知バナーです。イベントの手書き風ロゴも自分で作り、見た人が「何のイベントで、いつ、どこで開かれるか」をひと目で分かるように組み立てました。',
      'meta_type' => 'スクール課題', 'role' => 'デザイン・ロゴ制作', 'period' => '2日',
      'skills_label' => '使用ツール', 'skills' => 'Figma',
      'visual' => 'image', 'image_main' => 'banner.jpg', 'image_main_alt' => 'OUTDOOR FESTIVAL 2024 告知バナー。キャンプ料理を楽しむ3人の写真と、手書き風のロゴ、開催日、会場、3つのバッジ',
      'link_label' => 'Figmaで見る', 'link_url' => 'https://www.figma.com/design/22U302Q8gfZxdEZKX73R5v',
    ),
    array(
      'slug' => 'thumbnail', 'title' => 'YouTubeサムネイル',
      'num' => 'NO.07', 'category_type' => 'ケーススタディ', 'category_tool' => 'Canva',
      'summary' => '日本の絶景を紹介する動画を想定したサムネイル。暗めの帯で文字を読みやすくし、「神絶景」「10選」を目立たせました。',
      'lead' => '日本の絶景を紹介する動画のサムネイル制作を依頼された想定のケーススタディです。「ひと目で内容が伝わること」と「クリックしたくなるインパクト」を大切にして、提案から制作まで行いました。',
      'meta_type' => 'ケーススタディ', 'role' => '提案・デザイン', 'period' => '2日',
      'skills_label' => '使用ツール', 'skills' => 'Canva',
      'visual' => 'image', 'image_main' => 'thumbnail.jpg', 'image_main_alt' => 'YouTubeサムネイル「日本の神絶景 厳選10選」。紅葉と神社の写真の中央に、暗めの帯と大きな文字',
      'link_label' => 'Canvaで見る', 'link_url' => 'https://canva.link/wtd3slhlqmqkh0d',
    ),
  );
}

// works-〇〇.html から、作品情報の表のあと〜「一覧へ戻る」の前までを本文として取り出す
function riku_import_works_content($slug) {
  $file = get_theme_file_path('works-' . $slug . '.html');
  if (!file_exists($file)) {
    return '';
  }
  $html  = file_get_contents($file);
  $start = strpos($html, '</dl>');
  $end   = strpos($html, '<!-- 一覧へ戻る -->');
  if ($start === false || $end === false) {
    return '';
  }
  $body = trim(substr($html, $start + strlen('</dl>'), $end - $start - strlen('</dl>')));
  // 画像はテーマフォルダの画像を使う（{{theme}} は表示のときにURLへ置き換わる）
  $body = str_replace(array('src="img/', 'srcset="img/'), array('src="{{theme}}/img/', 'srcset="{{theme}}/img/'), $body);
  // ブロックエディタで「カスタムHTML」ブロックとして扱う
  return "<!-- wp:html -->\n" . $body . "\n<!-- /wp:html -->";
}

// テーマの画像をメディアライブラリに登録する
function riku_import_works_image($filename, $post_id, $alt = '') {
  $path = get_theme_file_path('img/works/' . $filename);
  if (!file_exists($path)) {
    return 0;
  }
  require_once ABSPATH . 'wp-admin/includes/file.php';
  require_once ABSPATH . 'wp-admin/includes/media.php';
  require_once ABSPATH . 'wp-admin/includes/image.php';

  // 元の画像を消さないように、一時ファイルにコピーしてから登録する
  $tmp = wp_tempnam($filename);
  copy($path, $tmp);
  $id = media_handle_sideload(array('name' => $filename, 'tmp_name' => $tmp), $post_id);
  if (is_wp_error($id)) {
    @unlink($tmp);
    return 0;
  }
  if ($alt) {
    update_post_meta($id, '_wp_attachment_image_alt', $alt);
  }
  return $id;
}

// 取り込みの本体
function riku_import_works() {
  if (!current_user_can('manage_options')) {
    wp_die('権限がありません。');
  }
  check_admin_referer('riku_import_works');

  $order = 0;
  foreach (riku_import_works_data() as $work) {
    $order++;
    $post_id = wp_insert_post(wp_slash(array(
      'post_type'    => 'works',
      'post_status'  => 'publish',
      'post_title'   => $work['title'],
      'post_name'    => $work['slug'],
      'menu_order'   => $order,
      'post_content' => riku_import_works_content($work['slug']),
    )), true);
    if (is_wp_error($post_id)) {
      continue;
    }

    // 文字の入力欄
    $text_fields = array('num', 'category_type', 'category_tool', 'short_title', 'summary', 'lead', 'note', 'meta_type',
      'role', 'period', 'skills_label', 'skills', 'visual', 'link_label', 'link_url', 'github_url', 'sub_links');
    foreach ($text_fields as $name) {
      if (isset($work[$name])) {
        update_field('field_works_' . $name, $work[$name], $post_id);
      }
    }

    // 画像の入力欄
    foreach (array('image_pc', 'image_sp', 'image_main') as $name) {
      if (!empty($work[$name])) {
        $alt = isset($work[$name . '_alt']) ? $work[$name . '_alt'] : '';
        $id  = riku_import_works_image($work[$name], $post_id, $alt);
        if ($id) {
          update_field('field_works_' . $name, $id, $post_id);
        }
      }
    }
  }

  wp_safe_redirect(admin_url('edit.php?post_type=works&riku_imported=1'));
  exit;
}
add_action('admin_post_riku_import_works', 'riku_import_works');

// 管理画面のお知らせ（取り込みボタン・完了メッセージ）
function riku_import_works_notice() {
  if (!current_user_can('manage_options')) {
    return;
  }
  if (isset($_GET['riku_imported'])) {
    echo '<div class="notice notice-success is-dismissible"><p>制作実績を取り込みました。</p></div>';
    return;
  }
  if (!function_exists('update_field')) {
    echo '<div class="notice notice-warning"><p>制作実績の入力欄を使うには、プラグイン「Advanced Custom Fields」を有効化してください。</p></div>';
    return;
  }
  $count = wp_count_posts('works');
  $total = 0;
  foreach ((array) $count as $status => $num) {
    $total += (int) $num;
  }
  if ($total > 0) {
    return;
  }
  ?>
  <div class="notice notice-info">
    <p>制作実績がまだありません。静的HTML版の7作品を取り込みますか？（画像はメディアライブラリに登録されます）</p>
    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
      <input type="hidden" name="action" value="riku_import_works">
      <?php wp_nonce_field('riku_import_works'); ?>
      <p><button type="submit" class="button button-primary">7作品を取り込む</button></p>
    </form>
  </div>
  <?php
}
add_action('admin_notices', 'riku_import_works_notice');
