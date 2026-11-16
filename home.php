<?php
// ブログ一覧（「設定 → 表示設定」で投稿ページにした固定ページ）
get_header();
?>
      <section class="l-section blog">
        <div class="l-container">
          <div class="section-head">
            <h1 class="section-title">BLOG</h1>
            <p class="section-head-note">学習記録や制作の裏側を書いています</p>
          </div>

          <?php get_template_part('template-parts/post-list'); ?>
        </div>
      </section>
<?php get_footer(); ?>
