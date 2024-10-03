<?php
$avatar = get_field('avatar');
$job = get_field('job');
$desc = get_field('description');
$rating = get_field('rating');
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
      <div class="bt-post-title-inner">
        <h3 class="bt-post--title">
          <?php the_title(); ?>
        </h3>
        <?php
        if (!empty($job)) {
          echo '<div class="bt-post--job">' . $job . '</div>';
        }
        ?>
      </div>
      <?php
      if (!empty($rating)) {
        echo '<div class="bt-post--rating">';
        for ($i = 1; $i <= 5; $i++) {
          if ($i <= $rating) {
            echo  '<span class="bt-filled"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path d="M22.4335 10.3123L17.7618 14.8662L18.8651 21.2981C18.9131 21.5794 18.7976 21.8636 18.5666 22.0316C18.4361 22.1269 18.2808 22.1749 18.1256 22.1749C18.0063 22.1749 17.8863 22.1464 17.7768 22.0886L12.0004 19.0519L6.22478 22.0879C5.97278 22.2214 5.66604 22.1996 5.43504 22.0309C5.20404 21.8629 5.08854 21.5786 5.13654 21.2974L6.23978 14.8655L1.56735 10.3123C1.36336 10.1128 1.28911 9.81433 1.37761 9.54359C1.4661 9.27284 1.70085 9.07409 1.9836 9.03284L8.44024 8.09536L11.3277 2.24395C11.5804 1.73171 12.4204 1.73171 12.6732 2.24395L15.5606 8.09536L22.0173 9.03284C22.3 9.07409 22.5348 9.27209 22.6233 9.54359C22.7118 9.81508 22.6375 10.1121 22.4335 10.3123Z" fill="#FFFFFF"/>
</svg></span>';
          } else {
            echo '<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path d="M22.4335 10.3123L17.7618 14.8662L18.8651 21.2981C18.9131 21.5794 18.7976 21.8636 18.5666 22.0316C18.4361 22.1269 18.2808 22.1749 18.1256 22.1749C18.0063 22.1749 17.8863 22.1464 17.7768 22.0886L12.0004 19.0519L6.22478 22.0879C5.97278 22.2214 5.66604 22.1996 5.43504 22.0309C5.20404 21.8629 5.08854 21.5786 5.13654 21.2974L6.23978 14.8655L1.56735 10.3123C1.36336 10.1128 1.28911 9.81433 1.37761 9.54359C1.4661 9.27284 1.70085 9.07409 1.9836 9.03284L8.44024 8.09536L11.3277 2.24395C11.5804 1.73171 12.4204 1.73171 12.6732 2.24395L15.5606 8.09536L22.0173 9.03284C22.3 9.07409 22.5348 9.27209 22.6233 9.54359C22.7118 9.81508 22.6375 10.1121 22.4335 10.3123Z" fill="#CDCDCD"/>
</svg></span>';
          }
        }
        echo '</div>';
      }

      ?>
    </div>
  </div>
</article>