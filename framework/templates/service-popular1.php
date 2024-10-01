<?php
$icon = get_field('icon_service');
$svg_url = !empty($icon) && !empty($icon['url']) ? $icon['url'] : '';
?>
<article <?php post_class('bt-post'); ?>>
  <div class="bt-post--inner">
    <?php echo denali_post_cover_featured_render($args['image-size']); ?>
    <div class="bt-post--content">

      <?php if (!empty($svg_url) && 'svg' === pathinfo($svg_url, PATHINFO_EXTENSION)) {
        echo '<div class="bt-post--icon">' . file_get_contents($svg_url) . '</div>';
      } ?>
      <?php echo denali_post_title_render(); ?>
    </div>
  </div>
</article>