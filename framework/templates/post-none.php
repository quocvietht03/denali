<div class="no-results">
	<h3 class="page-title"><?php esc_html_e( 'Nothing Found', 'denali' ); ?></h3>
	
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ){ ?>
		<p><?php echo esc_html__('Ready to publish your first post?', 'denali').' <a href="'.esc_url( admin_url( 'post-new.php' ) ).'">'.esc_html__('Get started here', 'denali').'</a>.'; ?></p>
	<?php }elseif ( is_search() ){ ?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'denali' ); ?></p>
		<?php get_search_form(); ?>

	<?php }else{ ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'denali' ); ?></p>
		<?php get_search_form(); ?>

	<?php } ?>
</div>
