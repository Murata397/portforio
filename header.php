<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (is_front_page()) : ?>
      <meta name="description" content="自動車整備士・村田陸のWeb制作ポートフォリオ。デザイン・コーディング・WordPress構築。">
    <?php endif; ?>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- header -->
    <header class="l-header" id="top">
      <div class="l-header-inner l-container">
        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">RIKU MURATA</a>

        <!-- nav -->
        <nav class="gnav" id="global-nav" aria-label="メインメニュー">
          <ul class="gnav-list">
            <li><a class="gnav-link" href="<?php echo esc_url(home_url('/#works')); ?>">WORKS</a></li>
            <li><a class="gnav-link" href="<?php echo esc_url(home_url('/#about')); ?>">ABOUT</a></li>
            <li><a class="gnav-link" href="<?php echo esc_url(home_url('/#message')); ?>">MESSAGE</a></li>
            <li><a class="gnav-link gnav-link-accent" href="<?php echo esc_url(riku_blog_url()); ?>">BLOG</a></li>
          </ul>
        </nav>

        <!-- ハンバーガーメニュー（SP） -->
        <button class="menu-toggle" type="button" aria-label="メニューを開く" aria-expanded="false" aria-controls="global-nav">
          <span class="menu-toggle-bar"></span>
          <span class="menu-toggle-bar"></span>
          <span class="menu-toggle-bar"></span>
        </button>
      </div>
    </header>

    <!-- main -->
    <main>
