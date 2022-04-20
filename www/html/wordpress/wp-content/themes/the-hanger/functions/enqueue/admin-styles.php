<?php

// =============================================================================
// Enqueue Admin Styles
// =============================================================================

if ( is_admin() ) :

	function getbowtied_admin_styles() {

		wp_enqueue_style('getbowtied_admin_styles', get_template_directory_uri() .'/css/admin-styles.css', false, getbowtied_theme_version(), 'all');
		wp_enqueue_style('getbowtied_icons', get_template_directory_uri() . '/inc/fonts/thehanger-icons/style.css', false, getbowtied_theme_version(), 'all');
	}

	add_action( 'admin_enqueue_scripts', 'getbowtied_admin_styles' );

endif;