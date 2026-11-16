<?php
// ブログの記事
get_header();
?>
      <?php while (have_posts()) : the_post(); ?>
      <article class="post">
        <div class="l-container post-inner">
          <!-- パンくずリスト -->
          <nav class="work-detail-crumb" aria-label="パンくずリスト">
            <ol>
              <li><a href="<?php echo esc_url(home_url('/')); ?>">HOME</a></li>
              <li><a href="<?php echo esc_url(riku_blog_url()); ?>">BLOG</a></li>
              <li aria-current="page"><?php the_title(); ?></li>
            </ol>
          </nav>

          <!-- タイトルまわり -->
          <header class="post-head">
            <p class="post-meta">
              <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
              <?php if (get_the_modified_date('Ymd') !== get_the_date('Ymd')) : ?>
                <span class="post-meta-updated">（更新：<time datetime="<?php echo esc_attr(get_the_modified_date('Y-m-d')); ?>"><?php echo esc_html(get_the_modified_date('Y.m.d')); ?></time>）</span>
              <?php endif; ?>
            </p>
            <?php $categories = get_the_category(); ?>
            <?php if ($categories) : ?>
              <ul class="post-categories">
                <?php foreach ($categories as $category) : ?>
                  <li><a href="<?php echo esc_url(get_category_link($category)); ?>"><?php echo esc_html($category->name); ?></a></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
            <h1 class="post-title"><?php the_title(); ?></h1>
          </header>

          <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
              <?php the_post_thumbnail('large', array('loading' => 'eager')); ?>
            </div>
          <?php endif; ?>

          <!-- 本文 -->
          <div class="post-content">
            <?php the_content(); ?>
          </div>

          <!-- 前後の記事 -->
          <?php
          $prev = get_previous_post();
          $next = get_next_post();
          ?>
          <?php if ($prev || $next) : ?>
            <nav class="post-nav" aria-label="前後の記事">
              <?php if ($prev) : ?>
                <a class="post-nav-link post-nav-prev" href="<?php echo esc_url(get_permalink($prev)); ?>">
                  <span>← 前の記事</span><?php echo esc_html(get_the_title($prev)); ?>
                </a>
              <?php endif; ?>
              <?php if ($next) : ?>
                <a class="post-nav-link post-nav-next" href="<?php echo esc_url(get_permalink($next)); ?>">
                  <span>次の記事 →</span><?php echo esc_html(get_the_title($next)); ?>
                </a>
              <?php endif; ?>
            </nav>
          <?php endif; ?>

          <!-- 一覧へ戻る -->
          <div class="work-detail-back">
            <a class="btn btn-back" href="<?php echo esc_url(riku_blog_url()); ?>">記事一覧へ戻る</a>
          </div>
        </div>
      </article>
      <?php endwhile; ?>
<?php get_footer(); ?>
