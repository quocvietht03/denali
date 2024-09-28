<?php
/*
 * Service CPT
 */

function denali_service_register() {

	$cpt_slug = get_theme_mod('denali_service_slug');

	if(isset($cpt_slug) && $cpt_slug != ''){
		$cpt_slug = $cpt_slug;
	} else {
		$cpt_slug = 'service';
	}

	$labels = array(
		'name'               => esc_html__( 'Services', 'denali' ),
		'singular_name'      => esc_html__( 'Service', 'denali' ),
		'add_new'            => esc_html__( 'Add New', 'denali' ),
		'add_new_item'       => esc_html__( 'Add New Service', 'denali' ),
		'all_items'          => esc_html__( 'All Services', 'denali' ),
		'edit_item'          => esc_html__( 'Edit Service', 'denali' ),
		'new_item'           => esc_html__( 'Add New Service', 'denali' ),
		'view_item'          => esc_html__( 'View Item', 'denali' ),
		'search_items'       => esc_html__( 'Search Services', 'denali' ),
		'not_found'          => esc_html__( 'No service(s) found', 'denali' ),
		'not_found_in_trash' => esc_html__( 'No service(s) found in trash', 'denali' )
	);

  $args = array(
		'labels'          => $labels,
		'public'          => true,
		'show_ui'         => true,
		'capability_type' => 'post',
		'hierarchical'    => false,
		'has_archive'     => true,
		'menu_icon'       => 'dashicons-admin-post',
		'rewrite'         => array('slug' => $cpt_slug), // Permalinks format
		'show_in_rest' 		=> true,
		'supports'        => array('title', 'editor', 'excerpt', 'thumbnail', 'comments')
  );

  add_filter( 'enter_title_here',  'denali_service_change_default_title');

  register_post_type( 'service' , $args );
}
add_action('init', 'denali_service_register', 1);


function denali_service_taxonomy() {

	register_taxonomy(
		"service_categories",
		array("service"),
		array(
			"hierarchical"   => true,
			"label"          => "Categories",
			"singular_label" => "Category",
			"rewrite"        => true
		)
	);

	register_taxonomy(
        'service_tag',
        'service',
        array(
            'hierarchical'  => false,
            'label'         => __( 'Tags', 'denali' ),
            'singular_name' => __( 'Tag', 'denali' ),
            'rewrite'       => true,
            'query_var'     => true
        )
    );

}
add_action('init', 'denali_service_taxonomy', 1);


function denali_service_change_default_title( $title ) {
	$screen = get_current_screen();

	if ( 'service' == $screen->post_type )
		$title = esc_html__( "Enter the service's name here", 'denali' );

	return $title;
}


function denali_service_edit_columns( $service_columns ) {
	$service_columns = array(
		"cb"                     => "<input type=\"checkbox\" />",
		"title"                  => esc_html__('Title', 'denali'),
		"thumbnail"              => esc_html__('Thumbnail', 'denali'),
		"service_categories" 			 => esc_html__('Categories', 'denali'),
		"date"                   => esc_html__('Date', 'denali'),
	);
	return $service_columns;
}
add_filter( 'manage_edit-service_columns', 'denali_service_edit_columns' );

function denali_service_column_display( $service_columns, $post_id ) {

	switch ( $service_columns ) {

		// Display the thumbnail in the column view
		case "thumbnail":
			$width = (int) 64;
			$height = (int) 64;
			$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );

			// Display the featured image in the column view if possible
			if ( $thumbnail_id ) {
				$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
			}
			if ( isset( $thumb ) ) {
				echo wp_kses_post( $thumb ); 
			} else {
				echo esc_html__('None', 'denali');
			}
			break;

		// Display the service tags in the column view
		case "service_categories":

		if ( $category_list = get_the_term_list( $post_id, 'service_categories', '', ', ', '' ) ) {
			echo wp_kses_post( $category_list );
		} else {
			echo esc_html__('None', 'denali');
		}
		break;
	}
}
add_action( 'manage_service_posts_custom_column', 'denali_service_column_display', 10, 2 );
