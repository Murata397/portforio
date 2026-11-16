<?php
// 制作実績の詳細ページ（全作品この1つのテンプレートで表示する）
get_header();
?>
      <?php while (have_posts()) : the_post(); ?>
      <article class="work-detail">
        <div class="l-container">
          <!-- パンくずリスト -->
          <nav class="work-detail-crumb" aria-label="パンくずリスト">
            <ol>
              <li><a href="<?php echo esc_url(home_url('/')); ?>">HOME</a></li>
              <li><a href="<?php echo esc_url(home_url('/#works')); ?>">WORKS</a></li>
              <li aria-current="page"><?php the_title(); ?></li>
            </ol>
          </nav>

          <!-- タイトルまわり -->
          <div class="work-detail-head">
            <p class="work-detail-num"><?php echo esc_html(riku_field('num')); ?></p>
            <p class="work-detail-category"><?php riku_category(); ?></p>
            <h1 class="work-detail-title"><?php the_title(); ?></h1>
            <?php if (riku_field('lead')) : ?>
              <p class="work-detail-lead"><?php echo esc_html(riku_field('lead')); ?></p>
            <?php endif; ?>

            <?php
            $link   = riku_field('link_url');
            $github = riku_field('github_url');
            ?>
            <?php if ($link || $github) : ?>
              <div class="work-detail-links">
                <?php
                // メインのリンクがあればそれを塗りつぶし、なければGitHubを塗りつぶす
                if ($link) {
                  riku_external_btn(riku_field('link_label') ?: 'サイトを見る', $link, true);
                }
                if ($github) {
                  riku_external_btn('GitHubを見る', $github, !$link);
                }
                ?>
              </div>
            <?php endif; ?>

            <?php if (riku_field('note')) : ?>
              <p class="work-detail-note"><?php echo esc_html(riku_field('note')); ?></p>
            <?php endif; ?>
          </div>

          <!-- メインの画像 -->
          <div class="work-detail-visual">
            <?php get_template_part('template-parts/works-visual'); ?>
          </div>

          <!-- 作品情報 -->
          <dl class="work-detail-meta">
            <?php if (riku_field('meta_type')) : ?>
              <div>
                <dt>区分</dt>
                <dd><?php echo esc_html(riku_field('meta_type')); ?></dd>
              </div>
            <?php endif; ?>
            <?php if (riku_field('role')) : ?>
              <div>
                <dt>担当</dt>
                <dd><?php echo esc_html(riku_field('role')); ?></dd>
              </div>
            <?php endif; ?>
            <?php if (riku_field('period')) : ?>
              <div>
                <dt>制作期間</dt>
                <dd><?php echo esc_html(riku_field('period')); ?></dd>
              </div>
            <?php endif; ?>
            <?php $skills = riku_lines(riku_field('skills')); ?>
            <?php if ($skills) : ?>
              <div>
                <dt><?php echo esc_html(riku_field('skills_label') ?: '使用技術'); ?></dt>
                <dd>
                  <ul class="work-detail-skills">
                    <?php foreach ($skills as $skill) : ?>
                      <li><?php echo esc_html($skill); ?></li>
                    <?php endforeach; ?>
                  </ul>
                </dd>
              </div>
            <?php endif; ?>
          </dl>

          <!-- 本文（概要・工夫した点など。作品ごとに管理画面で書く） -->
          <?php the_content(); ?>

          <!-- 一覧へ戻る -->
          <div class="work-detail-back">
            <a class="btn btn-back" href="<?php echo esc_url(home_url('/#works')); ?>">作品一覧へ戻る</a>
          </div>
        </div>
      </article>
      <?php endwhile; ?>
<?php get_footer(); ?>
