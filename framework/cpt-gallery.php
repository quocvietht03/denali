<?php
/*
 * Gallery CPT
 */

function denali_gallery_register()
{

	$cpt_slug = get_theme_mod('denali_gallery_slug');

	if (isset($cpt_slug) && $cpt_slug != '') {
		$cpt_slug = $cpt_slug;
	} else {
		$cpt_slug = 'gallery';
	}

	$labels = array(
		'name'               => esc_html__('Gallery', 'denali'),
		'singular_name'      => esc_html__('Gallery', 'denali'),
		'add_new'            => esc_html__('Add New', 'denali'),
		'add_new_item'       => esc_html__('Add New Gallery', 'denali'),
		'all_items'          => esc_html__('All Gallery', 'denali'),
		'edit_item'          => esc_html__('Edit Gallery', 'denali'),
		'new_item'           => esc_html__('Add New Gallery', 'denali'),
		'view_item'          => esc_html__('View Item', 'denali'),
		'search_items'       => esc_html__('Search Gallery', 'denali'),
		'not_found'          => esc_html__('No gallery(s) found', 'denali'),
		'not_found_in_trash' => esc_html__('No gallery(s) found in trash', 'denali')
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

	add_filter('enter_title_here',  'denali_gallery_change_default_title');

	register_post_type('gallery', $args);
}
add_action('init', 'denali_gallery_register', 1);


function denali_gallery_taxonomy()
{

	register_taxonomy(
		"gallery_categories",
		array("gallery"),
		array(
			"hierarchical"   => true,
			"label"          => "Categories",
			"singular_label" => "Category",
			"rewrite"        => true
		)
	);

	register_taxonomy(
		'gallery_tag',
		'gallery',
		array(
			'hierarchical'  => false,
			'label'         => __('Tags', 'denali'),
			'singular_name' => __('Tag', 'denali'),
			'rewrite'       => true,
			'query_var'     => true
		)
	);
}
add_action('init', 'denali_gallery_taxonomy', 1);


function denali_gallery_change_default_title($title)
{
	$screen = get_current_screen();

	if ('gallery' == $screen->post_type)
		$title = esc_html__("Enter the gallery's name here", 'denali');

	return $title;
}


function denali_gallery_edit_columns($gallery_columns)
{
	$gallery_columns = array(
		"cb"                     => "<input type=\"checkbox\" />",
		"title"                  => esc_html__('Title', 'denali'),
		"thumbnail"              => esc_html__('Thumbnail', 'denali'),
		"gallery_categories" 			 => esc_html__('Categories', 'denali'),
		"date"                   => esc_html__('Date', 'denali'),
	);
	return $gallery_columns;
}
add_filter('manage_edit-gallery_columns', 'denali_gallery_edit_columns');

function denali_gallery_column_display($gallery_columns, $post_id)
{

	switch ($gallery_columns) {

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

			// Display the gallery tags in the column view
		case "gallery_categories":

			if ($category_list = get_the_term_list($post_id, 'gallery_categories', '', ', ', '')) {
				echo wp_kses_post( $category_list );
			} else {
				echo esc_html__('None', 'denali');
			}
			break;
	}
}
add_action('manage_gallery_posts_custom_column', 'denali_gallery_column_display', 10, 2);
