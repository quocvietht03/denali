<?php
$post_id = get_the_ID();
$category = get_the_terms($post_id, 'category');
$description = get_field('description_service', $post_id);
$price = get_field('price_service', $post_id);
?>
<article <?php post_class('bt-post'); ?>>
  <div class="bt-post--inner">
    <?php echo denali_post_cover_featured_render($args['image-size']); ?>
    <div class="bt-post--infor">
      <div class="bt-post--content">

        <?php
        if (!empty($price)) {
          $price = number_format($price, 2);
          echo '<div class="bt-post--price">$' . $price . '</div>';
        }
        ?>
        <?php echo denali_post_title_render(); ?>
        <?php
        if (!empty($description)) {
          echo '<div class="bt-post--description">' . $description . '</div>';
        }
        ?>

      </div>
      <?php echo denali_service_button_book_now_render('Book Now'); ?>
    </div>

  </div>
</article>