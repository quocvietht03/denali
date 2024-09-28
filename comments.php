<?php
if ( post_password_required() ) {
	return;
}
?>

<div class="bt-comment-wrapper">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h6 class="bt-heading-comment"><?php esc_html_e( 'Post Comments:', 'denali' ) ?></h6>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'denali' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'denali' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'denali' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<?php
			wp_list_comments( array(
				'style'      => 'div',
				'short_ping' => true,
				'avatar_size' => 150,
				'callback' => 'denali_custom_comment',
			) );
		?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'denali' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'denali' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'denali' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'denali' ); ?></p>
	<?php endif; ?>

	<?php
		$commenter = wp_get_current_commenter();

		$fields =  array(
			'author' => '<div class="bt-form-author">
										<label class="bt-form-author__label" for="bt-form-author__input">'.__('Name','denali').'<span class="required">*</span></label>
										<input class="bt-form-author__input" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="'.__('Your name','denali').'" aria-required="true" />
									</div>',
			'email' => '<div class="bt-form-email">
										<label class="bt-form-email__label" for="bt-form-author__input">'.__('Email','denali').'<span class="required">*</span></label>
										<input class="bt-form-email__input" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="'.__('Your email','denali').'" aria-required="true" />
									</div>',
			'url' => '<div class="bt-form-url">
									<label class="bt-form-url__label" for="bt-form-url__input">Search</label>
									<input class="bt-form-url__input" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="'.__('Website','denali').'" />
								</div>',
		);

		$args = array(
			'id_form'           => 'bt_comment_form',
			'class_submit'      => 'bt-form-submit',
			'name_submit'       => 'submit',
			'title_reply'       => '<span class="bt-label-reply">'.esc_html__( 'Leave A Comment', 'denali' ).'</span>',
			'title_reply_to'    => '<span class="bt-label-reply">'.esc_html__( 'Leave A Reply to %s', 'denali' ).'</span>',
			'cancel_reply_link' => esc_html__( 'Cancel Reply', 'denali' ),
			'label_submit'      => esc_html__( 'Submit Now', 'denali' ),
			'format'            => 'xhtml',

			'comment_field' =>  '<div class="bt-form-message">
														<label class="bt-form-message__label" for="bt-form-message__input">'.__('Message','denali').'<span class="required">*</span></label>
														<textarea id="comment" class="bt-form-message__input" name="comment" cols="60" rows="6" aria-required="true" placeholder="'.esc_attr__('Start typing here','denali').'">' . '</textarea>
													</div>',

			'must_log_in' => '<div class="bt-must-log-in">'.esc_html__('You must be', 'denali').' <a href="'.wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ).'">'.esc_html__('logged in', 'denali').'</a> '.esc_html__('to post a comment.', 'denali').'</div>',

			'logged_in_as' => '<div class="bt-logged-in-as">'.esc_html__('Logged in as', 'denali').' <a class="bt-name" href="'.admin_url( 'profile.php' ).'">'.$user_identity.'</a>. <a href="'.wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ).'" title="'.esc_attr__('Log out of this account', 'denali').'">'.esc_html__('Log out?', 'denali').'</a></div>',

			'comment_notes_before' => '',

			'comment_notes_after' => '',

			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	  );

		comment_form($args);
	?>

</div><!-- #comments -->
