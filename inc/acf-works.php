<?php
// 制作実績（works）の入力欄（ACF）
// 管理画面で作るのではなくコードで書いておくと、Gitで管理でき、本番に移しても設定が消えない
function riku_register_works_fields() {
  if (!function_exists('acf_add_local_field_group')) {
    return;
  }

  // 入力欄を作る小さな関数（同じ書き方を何度も書かないため）
  $field = function ($name, $label, $type = 'text', $extra = array()) {
    return array_merge(array(
      'key'   => 'field_works_' . $name,
      'name'  => $name,
      'label' => $label,
      'type'  => $type,
    ), $extra);
  };

  acf_add_local_field_group(array(
    'key'      => 'group_works',
    'title'    => '制作実績の情報',
    'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'works'))),
    'position' => 'acf_after_title',
    'fields'   => array(
      // 一覧（トップ）と詳細の両方で使う
      $field('num', '番号', 'text', array('instructions' => '例：NO.01（並び順は「順序」で決めます）')),
      $field('category_type', '区分（黄色の左側）', 'text', array('instructions' => '例：ケーススタディ')),
      $field('category_tool', '区分（黄色の右側）', 'text', array('instructions' => '例：WordPressオリジナルテーマ')),
      $field('short_title', 'トップ用の短いタイトル', 'text', array('instructions' => '空ならタイトルをそのまま使います')),
      $field('summary', 'トップ用の説明（2行くらい）', 'textarea', array('rows' => 3)),
      $field('role', '担当', 'text'),
      $field('period', '制作期間', 'text'),

      // 詳細ページで使う
      $field('lead', '詳細ページの説明', 'textarea', array('rows' => 4)),
      $field('note', '注意書き（任意）', 'textarea', array('rows' => 2)),
      $field('meta_type', '作品情報の「区分」', 'text'),
      $field('skills_label', '技術の見出し', 'select', array(
        'choices'       => array('使用技術' => '使用技術', '使用ツール' => '使用ツール'),
        'default_value' => '使用技術',
      )),
      $field('skills', '使用技術・ツール', 'textarea', array('rows' => 4, 'instructions' => '1行に1つ書きます')),

      // 画像
      $field('visual', '画像の見せ方', 'select', array(
        'choices'       => array('mockup' => 'PCとスマホのモックアップ', 'image' => '作品画像を1枚'),
        'default_value' => 'mockup',
      )),
      $field('image_pc', 'PCの画像', 'image', array('return_format' => 'id', 'preview_size' => 'medium')),
      $field('image_sp', 'スマホの画像', 'image', array('return_format' => 'id', 'preview_size' => 'medium')),
      $field('image_main', '作品画像（バナーなど）', 'image', array('return_format' => 'id', 'preview_size' => 'medium')),

      // リンク
      $field('link_label', 'メインのリンク名', 'text', array('instructions' => '例：サイトを見る')),
      $field('link_url', 'メインのリンクURL', 'url'),
      $field('github_url', 'GitHubのURL（任意）', 'url'),
      $field('sub_links', 'トップの2段目のリンク（任意）', 'textarea', array(
        'rows'         => 3,
        'instructions' => '1行に「リンク名|URL」で書きます（コーディング練習の3サイトなど）',
      )),
    ),
  ));
}
add_action('acf/init', 'riku_register_works_fields');
