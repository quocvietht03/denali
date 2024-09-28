<?php
$avatar = get_field('avatar');
$job = get_field('job');
$desc = get_field('description');

?>
<article <?php post_class('bt-post'); ?>>


  <div class="bt-post--inner">
    <div class="bt-post--quote-icon">
      <svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" viewBox="0 0 58 58" fill="none">
        <path d="M0 36.2384H14.7436L9.9151 46.1315V50.7964L27.2484 36.2384V8.98999H0L0 36.2384Z" fill="#ffffff" />
        <path d="M35.7559 14.13V36.2384H47.7178L43.7993 44.2656V48.049L57.8626 36.2384V14.13H35.7559Z" fill="#ffffff" />
      </svg>
    </div>
    <?php
    if (!empty($desc)) {
      echo '<div class="bt-post--desc">' . $desc . '</div>';
    }
    ?>
  </div>
  <div class="bt-post--infor">
    <div class="bt-post--avatar">
      <?php
      if (!empty($avatar)) {
        echo '<img src="' . esc_url($avatar['url']) . '" alt="' . esc_attr($avatar['title']) . '" />';
      }
      ?>
    </div>
    <div class="bt-post--title-wrap">
      <h3 class="bt-post--title">
        <?php the_title(); ?>
      </h3>
      <?php
      if (!empty($job)) {
        echo '<div class="bt-post--job">' . $job . '</div>';
      }
      ?>
    </div>
  </div>
</article>