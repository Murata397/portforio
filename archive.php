<?php
// カテゴリー・タグ・日付などで絞り込んだ記事の一覧
get_header();
?>
      <section class="l-section blog">
        <div class="l-container">
          <!-- パンくずリスト -->
          <nav class="work-detail-crumb" aria-label="パンくずリスト">
            <ol>
              <li><a href="<?php echo esc_url(home_url('/')); ?>">HOME</a></li>
              <li><a href="<?php echo esc_url(riku_blog_url()); ?>">BLOG</a></li>
              <li aria-current="page"><?php echo esc_html(wp_strip_all_tags(get_the_archive_title())); ?></li>
            </ol>
          </nav>

          <div class="section-head blog-archive-head">
            <h1 class="section-title">BLOG</h1>
            <p class="section-head-note"><?php echo esc_html(wp_strip_all_tags(get_the_archive_title())); ?> の記事</p>
          </div>

          <?php get_template_part('template-parts/post-list'); ?>
        </div>
      </section>
<?php get_footer(); ?>
