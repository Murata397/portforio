<?php
// SNSへのリンク（ABOUTとフッターで使う）
$sns = array(
  'Instagram' => 'https://www.instagram.com/mrtbpcompany/',
  'Threads'   => 'https://www.threads.com/@mrtbpcompany',
  'Facebook'  => 'https://www.facebook.com/mrtbpcompany/',
);
?>
<ul class="sns-links">
  <?php foreach ($sns as $name => $url) : ?>
    <li>
      <a class="sns-link" href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener"><?php echo esc_html($name); ?><span class="sns-link-icon" aria-hidden="true">↗</span></a>
    </li>
  <?php endforeach; ?>
</ul>
