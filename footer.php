      <?php // トップ（ABOUTの下に入り口あり）とブログのページでは出さない ?>
      <?php if (!is_front_page() && !is_home() && !is_archive() && !is_singular('post')) : ?>
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
      <?php get_template_part('template-parts/sns-links'); ?>
      <p class="l-footer-copy"><small>&copy; <?php echo esc_html(wp_date('Y')); ?> RIKU MURATA</small></p>
    </footer>
    <?php wp_footer(); ?>
  </body>

</html>
