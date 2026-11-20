<?php
// トップページ
get_header();
?>
      <!-- hero -->
      <section class="hero">
        <div class="l-container">
          <!-- 文字は上から順番に出てくる（hero-fade と --delay） -->
          <p class="hero-label hero-fade" style="--delay: 0.1s;">WEB DESIGN / CODING / WORDPRESS</p>
          <h1 class="hero-title">
            <span class="hero-title-line hero-fade" style="--delay: 0.35s;">丁寧に、確実に。</span>
            <span class="hero-title-line hero-fade" style="--delay: 0.6s;">整備士の目線でつくる<span class="hero-title-accent">Webサイト。</span></span>
          </h1>
          <p class="hero-lead hero-fade" style="--delay: 0.9s;">自動車整備士として培った「点検・確認」の習慣を、Web制作にも。<br class="is-pc-only">見た目だけでなく、更新しやすく壊れにくいサイトづくりを心がけています。</p>

          <!-- スクロール誘導（WORKSへ） -->
          <div class="scroll-guide hero-fade" style="--delay: 1.3s;">
            <p class="scroll-guide-text">制作実績・お問い合わせは下からご覧ください</p>
            <a class="scroll-guide-btn" href="#works" aria-label="制作実績へ進む">
              <span aria-hidden="true">↓</span>
            </a>
          </div>
        </div>
      </section>

      <!-- works -->
      <section class="l-section works" id="works">
        <div class="l-container">
          <div class="section-head js-reveal">
            <h2 class="section-title">WORKS</h2>
            <p class="section-head-note">PC・スマホ両方の表示をひと目で確認できます</p>
          </div>

          <?php
          // 制作実績を「順序」の小さい順に全部取り出す
          $works = new WP_Query(array(
            'post_type'      => 'works',
            'posts_per_page' => -1,
            'orderby'        => array('menu_order' => 'ASC', 'date' => 'ASC'),
          ));
          ?>
          <?php if ($works->have_posts()) : ?>
          <ul class="works-list">
            <?php while ($works->have_posts()) : $works->the_post(); ?>
            <li class="works-item">
              <div class="works-visual js-reveal">
                <?php get_template_part('template-parts/works-visual', null, array('lazy' => true)); ?>
              </div>
              <div class="works-body js-reveal">
                <p class="works-num"><?php echo esc_html(riku_field('num')); ?></p>
                <p class="works-category"><?php riku_category(); ?></p>
                <h3 class="works-title"><?php echo esc_html(riku_field('short_title') ?: get_the_title()); ?></h3>
                <p class="works-text"><?php echo esc_html(riku_field('summary')); ?></p>
                <p class="works-meta">担当：<?php echo esc_html(riku_field('role')); ?><span>／</span>制作期間：<?php echo esc_html(riku_field('period')); ?></p>
                <div class="works-links">
                  <a class="btn btn-fill" href="<?php the_permalink(); ?>">詳しく見る</a>
                  <?php
                  // メインのリンク、なければGitHub
                  if (riku_field('link_url')) {
                    riku_external_btn(riku_field('link_label') ?: 'サイトを見る', riku_field('link_url'));
                  } elseif (riku_field('github_url')) {
                    riku_external_btn('GitHubを見る', riku_field('github_url'));
                  }
                  ?>
                </div>
                <?php $sub_links = riku_sub_links(); ?>
                <?php if ($sub_links) : ?>
                  <!-- 2段目のリンク（コーディング練習の3サイトなど） -->
                  <div class="works-links works-links-sub">
                    <?php foreach ($sub_links as $sub) : ?>
                      <?php riku_external_btn($sub['label'], $sub['url']); ?>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
              </div>
            </li>
            <?php endwhile; ?>
          </ul>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>
      </section>

      <!-- about -->
      <section class="l-section about" id="about">
        <div class="l-container about-inner js-reveal">
          <!-- webp対応ブラウザは軽いwebp、それ以外はjpgを表示 -->
          <div class="about-photo">
            <picture>
              <source srcset="<?php echo esc_url(get_theme_file_uri('img/profile.webp')); ?>" type="image/webp">
              <img src="<?php echo esc_url(get_theme_file_uri('img/profile.jpg')); ?>" alt="村田 陸" width="240" height="240">
            </picture>
          </div>

          <div class="about-body">
            <h2 class="section-title">ABOUT</h2>
            <p class="about-name">村田 陸<span>Riku Murata</span></p>
            <p class="about-text">本業は自動車整備士。2025年6月からWeb制作を学び始め、現在はWordPressのオリジナルテーマ制作に取り組んでいます。整備の仕事で身についた「丁寧な確認」と「期限を守る段取り」を、Web制作でも大切にしています。</p>
            <ul class="about-skills">
              <li>HTML / CSS</li>
              <li>SCSS</li>
              <li>JavaScript</li>
              <li>WordPress</li>
              <li>Figma</li>
              <li>Canva</li>
            </ul>
            <p class="about-note">対応時間：平日夜間・休日中心（ご連絡には日中も気づき次第お返事します）</p>
            <?php get_template_part('template-parts/sns-links'); ?>
          </div>
        </div>
      </section>

      <!-- blog（ブログ一覧への入り口） -->
      <section class="blog-link-section">
        <div class="l-container">
          <a class="blog-link js-reveal" href="<?php echo esc_url(riku_blog_url()); ?>">
            <span class="blog-link-body">
              <span class="blog-link-title">BLOG</span>
              <span class="blog-link-text">学習記録や制作の裏側を書いています。ブログはこちら</span>
            </span>
            <span class="blog-link-arrow" aria-hidden="true">→</span>
          </a>
        </div>
      </section>

      <!-- contact -->
      <section class="l-section message" id="contact">
        <div class="l-container">
          <div class="message-inner">
            <h2 class="section-title">CONTACT</h2>
            <p class="message-lead">お仕事のご依頼・ご相談はこちらからお気軽にどうぞ。</p>

            <!-- フォームは Contact Form 7（管理画面の「お問い合わせ」で、タイトル「お問い合わせ」のフォームを使う） -->
            <?php if (shortcode_exists('contact-form-7')) : ?>
              <?php echo do_shortcode('[contact-form-7 title="お問い合わせ" html_class="message-form"]'); ?>
            <?php endif; ?>
            <!-- 送信後のお知らせ -->
            <p class="message-note">送信後、確認のための自動返信メールをお送りします。<br class="is-pc-only">届かない場合は、<strong>迷惑メールフォルダ</strong>もご確認ください。</p>
          </div>
        </div>
      </section>

<?php get_footer(); ?>
