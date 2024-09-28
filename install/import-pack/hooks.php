<?php
/**
 * Import pack hooks
 *
 * @package Import Pack
 */

add_action( 'admin_init', 'denali_import_pack_defineds' );
add_action( 'admin_menu', 'denali_register_import_menu' );
