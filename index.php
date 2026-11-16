<?php
// 予備のテンプレート（ほかのテンプレートが見つからないときに使われる）
get_header();
?>
      <section class="l-section">
        <div class="l-container">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <h1 class="section-title"><?php the_title(); ?></h1>
              <div class="work-detail-text">
                <?php the_content(); ?>
              </div>
            <?php endwhile; ?>
          <?php else : ?>
            <p>ページが見つかりませんでした。</p>
          <?php endif; ?>
        </div>
      </section>
<?php get_footer(); ?>
