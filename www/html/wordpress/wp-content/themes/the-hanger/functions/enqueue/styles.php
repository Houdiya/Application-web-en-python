<?php

// =============================================================================
// Enqueue Styles (Front-end)
// =============================================================================

if ( ! function_exists('getbowtied_styles') ) :
function getbowtied_styles() {

    if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {
		wp_enqueue_style('select2');
	}

    if( GETBOWTIED_WOO_SWATCHES_IS_ACTIVE ) {
        wp_enqueue_style('thehanger-woo-swatches-styles', get_template_directory_uri() . '/css/plugins/woo-swatches.css', NULL, getbowtied_theme_version(), 'all');
    }

    wp_enqueue_style( 'motion-ui', get_template_directory_uri() . '/inc/_vendor/motion-ui/css/motion-ui.css', NULL, '2.0.3', 'all' );
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/inc/_vendor/swiper/css/swiper.css', NULL, '4.4.6', 'all' );

    wp_enqueue_style('thehanger-styles', get_template_directory_uri() . '/css/styles.css', NULL, getbowtied_theme_version(), 'all');
}
add_action( 'wp_enqueue_scripts', 'getbowtied_styles' );
endif;
