<?php

// =============================================================================
// Register Menus
// =============================================================================

if ( ! function_exists('getbowtied_get_theme_menus') ) :
function getbowtied_get_theme_menus() {
	$menus = array(
		'gbt_topbar' 		=> esc_html__('Top Bar', 'the-hanger'),
		'gbt_nav_but' 		=> esc_html__('Navigation Button', 'the-hanger'),
		'gbt_primary' 		=> esc_html__('Main Navigation', 'the-hanger'),
		'gbt_alt_primary'	=> esc_html__('Alternative Main Navigation', 'the-hanger'),
		'gbt_secondary' 	=> esc_html__('Secondary Navigation', 'the-hanger'),
		'gbt_footer' 		=> esc_html__('Footer Menu', 'the-hanger'),
	);

	return $menus;
}
endif;

if ( ! function_exists('getbowtied_theme_menus') ) :
function getbowtied_theme_menus() {
	register_nav_menus( getbowtied_get_theme_menus() );
}
add_action( 'after_setup_theme', 'getbowtied_theme_menus' );
endif;