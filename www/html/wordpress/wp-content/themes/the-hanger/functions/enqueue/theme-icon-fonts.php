<?php

// =============================================================================
// Enqueue Theme Fonts
// =============================================================================

if ( ! function_exists('getbowtied_font') ) :
function getbowtied_font() {
	wp_enqueue_style('getbowtied_icons', get_template_directory_uri() . '/inc/fonts/thehanger-icons/style.css', false, getbowtied_theme_version(), 'all');
}
add_action( 'wp_enqueue_scripts', 'getbowtied_font' );
endif;