      <?php if (is_front_page()) : ?>
        <?php
        // トップ：ブログの最新2件
        $latest = new WP_Query(array(
          'post_type'           => 'post',
          'posts_per_page'      => 2,
          'ignore_sticky_posts' => true,
        ));
        ?>
        <!-- blog -->
        <section class="blog-guide blog-guide-latest" id="blog">
          <div class="l-container">
            <div class="section-head">
              <h2 class="section-title">BLOG</h2>
              <p class="section-head-note">学習記録や制作の裏側をブログで発信しています</p>
            </div>
            <?php if ($latest->have_posts()) : ?>
              <ul class="post-list">
                <?php while ($latest->have_posts()) : $latest->the_post(); ?>
                  <?php get_template_part('template-parts/post-card'); ?>
                <?php endwhile; ?>
              </ul>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <div class="blog-guide-more">
              <a class="btn" href="<?php echo esc_url(riku_blog_url()); ?>">記事一覧を見る</a>
            </div>
          </div>
        </section>
      <?php elseif (!is_home() && !is_archive() && !is_singular('post')) : ?>
        <!-- blog（ブログ以外のページ） -->
        <section class="blog-guide" id="blog">
          <div class="l-container blog-guide-inner">
            <p class="blog-guide-text">学習記録や制作の裏側をブログで発信しています。</p>
            <a class="blog-guide-link" href="<?php echo esc_url(riku_blog_url()); ?>">BLOG</a>
          </div>
        </section>
      <?php endif; ?>
    </main>

    <!-- footer -->
    <footer class="l-footer">
      <p class="l-footer-copy"><small>&copy; <?php echo esc_html(wp_date('Y')); ?> RIKU MURATA</small></p>
    </footer>
    <?php wp_footer(); ?>
  </body>

</html>
