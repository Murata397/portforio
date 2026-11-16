<?php
// 記事の一覧とページ送り（home.php と archive.php で使う）
?>
<?php if (have_posts()) : ?>
  <ul class="post-list">
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('template-parts/post-card'); ?>
    <?php endwhile; ?>
  </ul>

  <?php
  // ページ送り（1ページに入りきらないときだけ出る）
  the_posts_pagination(array(
    'mid_size'           => 1,
    'prev_text'          => '←<span class="screen-reader-text">前のページ</span>',
    'next_text'          => '<span class="screen-reader-text">次のページ</span>→',
    'screen_reader_text' => 'ページ送り',
  ));
  ?>
<?php else : ?>
  <p class="post-empty">まだ記事がありません。</p>
<?php endif; ?>
