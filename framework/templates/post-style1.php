<?php
$post_id = get_the_ID();
$category = get_the_terms($post_id, 'category');

?>
<article <?php post_class('bt-post'); ?>>
  <div class="bt-post--inner">
    <div class="bt-post--image-wrap">
      <?php echo denali_post_cover_featured_render($args['image-size']); ?>
      <div class="bt-post--category">
        <?php
        if (!empty($category)) {
          echo  '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->name . '</a>';
        }
        ?>
      </div>
    </div>
    <div class="bt-post--content">
      <?php
      echo denali_post_publish_render();
      echo denali_post_title_render();
      ?>
      <div class="bt-post--info">
        <?php
        echo denali_author_icon_render();
        echo denali_reading_time_render();
        ?>
      </div>
    </div>

  </div>
</article>