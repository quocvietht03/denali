<?php

/* Add Theme Options Page */
function denali_add_theme_options_page() {
    if( function_exists('acf_add_options_page') ) {
        $option_page = acf_add_options_page(array(
            'page_title'    => esc_html__('Theme Options', 'denali'),
            'menu_title'    => esc_html__('Theme Options', 'denali'),
            'menu_slug'     => 'theme-options-page',
            'capability'    => 'edit_posts',
            'redirect'      => false
      ));
    }
}
add_action('acf/init', 'denali_add_theme_options_page');

function denali_acf_json_save_point( $path ) {
	// update path
	$path = get_template_directory() . '/framework/acf-options';

	// return
	return $path;
}
add_filter( 'acf/settings/save_json', 'denali_acf_json_save_point' );

function denali_acf_json_load_point( $paths ) {
	// redenalive original path (optional)
	unset( $paths[0] );
	// append path
	$paths[] = get_template_directory() . '/framework/acf-options';

	// return
	return $paths;
}
add_filter( 'acf/settings/load_json', 'denali_acf_json_load_point' );
