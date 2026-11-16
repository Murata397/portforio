<?php
// 作品の画像（モックアップ、または作品画像1枚）
// 使い方：get_template_part('template-parts/works-visual', null, array('lazy' => true));
$lazy  = !empty($args['lazy']);
$attr  = $lazy ? array('loading' => 'lazy') : array('loading' => 'eager');
$title = get_the_title();
?>
<?php if (riku_field('visual') === 'image') : ?>
  <div class="works-image work-detail-image">
    <?php
    $main = riku_field('image_main');
    if ($main) {
      echo wp_get_attachment_image($main, 'full', false, $attr);
    }
    ?>
  </div>
<?php else : ?>
  <div class="mockup">
    <div class="mockup-pc">
      <div class="mockup-pc-bar" aria-hidden="true"><span></span><span></span><span></span></div>
      <?php
      $pc = riku_field('image_pc');
      if ($pc) {
        echo wp_get_attachment_image($pc, 'full', false, array_merge($attr, array('alt' => $title . 'のPC表示')));
      }
      ?>
    </div>
    <div class="mockup-sp">
      <?php
      $sp = riku_field('image_sp');
      if ($sp) {
        echo wp_get_attachment_image($sp, 'full', false, array_merge($attr, array('alt' => $title . 'のスマホ表示')));
      }
      ?>
    </div>
  </div>
<?php endif; ?>
