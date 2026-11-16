<?php
// ブログ記事のカード（トップの最新記事・ブログ一覧・カテゴリー一覧で使う）
$categories = get_the_category();
?>
<li class="post-card">
  <a class="post-card-link" href="<?php the_permalink(); ?>">
    <div class="post-card-image">
      <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('medium_large', array('loading' => 'lazy', 'alt' => '')); ?>
      <?php else : ?>
        <span class="post-card-noimage" aria-hidden="true">BLOG</span>
      <?php endif; ?>
    </div>
    <div class="post-card-body">
      <p class="post-card-meta">
        <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
        <?php if ($categories) : ?>
          <span><?php echo esc_html($categories[0]->name); ?></span>
        <?php endif; ?>
      </p>
      <h3 class="post-card-title"><?php the_title(); ?></h3>
      <p class="post-card-excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
    </div>
  </a>
</li>
