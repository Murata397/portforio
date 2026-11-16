<?php
// 制作実績を表示するときに使う関数

// 入力欄の値を取り出す（ACFが止まっていても画面が真っ白にならないように）
function riku_field($name, $post_id = null) {
  if (!function_exists('get_field')) {
    return '';
  }
  $value = get_field($name, $post_id ?: get_the_ID());
  return $value ? $value : '';
}

// 複数行の入力を1行ずつの配列にする（空の行は捨てる）
function riku_lines($text) {
  return array_values(array_filter(array_map('trim', preg_split('/\R/', (string) $text))));
}

// 「リンク名|URL」の行を、リンク名とURLの組にする
function riku_sub_links($post_id = null) {
  $links = array();
  foreach (riku_lines(riku_field('sub_links', $post_id)) as $line) {
    $parts = array_map('trim', explode('|', $line, 2));
    if (count($parts) === 2 && $parts[1] !== '') {
      $links[] = array('label' => $parts[0], 'url' => $parts[1]);
    }
  }
  return $links;
}

// 外部サイトへのボタンを出す
function riku_external_btn($label, $url, $fill = false) {
  printf(
    '<a class="btn%s" href="%s" target="_blank" rel="noopener">%s</a>',
    $fill ? ' btn-fill' : '',
    esc_url($url),
    esc_html($label)
  );
}

// 区分（黄色の行）を出す
function riku_category($post_id = null) {
  $type = riku_field('category_type', $post_id);
  $tool = riku_field('category_tool', $post_id);
  echo esc_html($type);
  if ($type && $tool) {
    echo '<span>／</span>';
  }
  echo esc_html($tool);
}

// 本文の中の {{theme}} を、テーマフォルダのURLに置き換える
// （本文に画像のURLを直接書くと、本番に移したときにリンク切れになるため）
function riku_replace_theme_url($content) {
  return str_replace('{{theme}}', untrailingslashit(get_theme_file_uri()), $content);
}
add_filter('the_content', 'riku_replace_theme_url');
