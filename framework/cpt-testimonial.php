<?php
/*
 * Testimonial CPT
 */

function denali_testimonial_register()
{

	$cpt_slug = get_theme_mod('denali_testimonial_slug');

	if (isset($cpt_slug) && $cpt_slug != '') {
		$cpt_slug = $cpt_slug;
	} else {
		$cpt_slug = 'testimonial';
	}

	$labels = array(
		'name'               => esc_html__('Testimonials', 'denali'),
		'singular_name'      => esc_html__('Testimonial', 'denali'),
		'add_new'            => esc_html__('Add New', 'denali'),
		'add_new_item'       => esc_html__('Add New Testimonial', 'denali'),
		'all_items'          => esc_html__('All Testimonials', 'denali'),
		'edit_item'          => esc_html__('Edit Testimonial', 'denali'),
		'new_item'           => esc_html__('Add New Testimonial', 'denali'),
		'view_item'          => esc_html__('View Item', 'denali'),
		'search_items'       => esc_html__('Search Testimonials', 'denali'),
		'not_found'          => esc_html__('No testimonial(s) found', 'denali'),
		'not_found_in_trash' => esc_html__('No testimonial(s) found in trash', 'denali')
	);

	$args = array(
		'labels'          => $labels,
		'public'          => true,
		'show_ui'         => true,
		'capability_type' => 'post',
		'publicly_queryable' => false,
		'hierarchical'    => false,
		'menu_icon'       => 'dashicons-admin-post',
		'rewrite'         => array('slug' => $cpt_slug), // Permalinks format
		'supports'        => array('title', 'thumbnail')
	);

	add_filter('enter_title_here',  'denali_testimonial_change_default_title');

	register_post_type('testimonial', $args);
}
add_action('init', 'denali_testimonial_register', 1);


function denali_testimonial_taxonomy()
{

	register_taxonomy(
		"testimonial_categories",
		array("testimonial"),
		array(
			"hierarchical"   => true,
			"label"          => "Categories",
			"singular_label" => "Category",
			"rewrite"        => true
		)
	);

	register_taxonomy(
		'testimonial_tag',
		'testimonial',
		array(
			'hierarchical'  => false,
			'label'         => __('Tags', 'denali'),
			'singular_name' => __('Tag', 'denali'),
			'rewrite'       => true,
			'query_var'     => true
		)
	);
}
add_action('init', 'denali_testimonial_taxonomy', 1);


function denali_testimonial_change_default_title($title)
{
	$screen = get_current_screen();

	if ('testimonial' == $screen->post_type)
		$title = esc_html__("Enter the testimonial's name here", 'denali');

	return $title;
}


function denali_testimonial_edit_columns($testimonial_columns)
{
	$testimonial_columns = array(
		"cb"                     => "<input type=\"checkbox\" />",
		"title"                  => esc_html__('Title', 'denali'),
		"thumbnail"              => esc_html__('Thumbnail', 'denali'),
		"testimonial_categories" 			 => esc_html__('Categories', 'denali'),
		"date"                   => esc_html__('Date', 'denali'),
	);
	return $testimonial_columns;
}
add_filter('manage_edit-testimonial_columns', 'denali_testimonial_edit_columns');

function denali_testimonial_column_display($testimonial_columns, $post_id)
{

	switch ($testimonial_columns) {

			// Display the thumbnail in the column view
		case "thumbnail":
			$width = (int) 64;
			$height = (int) 64;
			$thumbnail_id = get_post_meta($post_id, '_thumbnail_id', true);

			// Display the featured image in the column view if possible
			if ($thumbnail_id) {
				$thumb = wp_get_attachment_image($thumbnail_id, array($width, $height), true);
			}
			if (isset($thumb)) {
				echo wp_kses_post( $thumb ); 
			} else {
				echo esc_html__('None', 'denali');
			}
			break;

			// Display the testimonial tags in the column view
		case "testimonial_categories":

			if ($category_list = get_the_term_list($post_id, 'testimonial_categories', '', ', ', '')) {
				echo wp_kses_post( $category_list );
			} else {
				echo esc_html__('None', 'denali');
			}
			break;
	}
}
add_action('manage_testimonial_posts_custom_column', 'denali_testimonial_column_display', 10, 2);
