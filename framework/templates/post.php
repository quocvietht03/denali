<article <?php post_class('bt-post'); ?>>
	<div class="bt-post--featured-wrap">
		<?php echo denali_post_featured_render('full'); 
			echo denali_post_category_render();
		?>
	</div>
	<div class="bt-post--infor">
	<?php
	echo denali_post_publish_render();
	if (is_single()) {
		echo denali_single_post_title_render();
	} else {
		echo denali_post_title_render();
	}
	echo denali_post_meta_render();
	?>
	</div>
	<?php
	echo denali_post_content_render();
	?>
</article>