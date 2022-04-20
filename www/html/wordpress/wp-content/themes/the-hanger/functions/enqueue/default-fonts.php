<?php

// =============================================================================
// Enqueue Embed Fonts
// =============================================================================

if ( ! function_exists('getbowtied_default_fonts') ) :
function getbowtied_default_fonts() {
	wp_enqueue_style( 'getbowtied-default-fonts', get_template_directory_uri() . '/inc/fonts/default.css', false, getbowtied_theme_version(), 'all');
}
add_action( 'wp_enqueue_scripts', 'getbowtied_default_fonts', 100 );
endif;
