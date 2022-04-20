<?php

// =============================================================================
// Theme Setup
// =============================================================================

if ( ! function_exists( 'getbowtied_theme_setup' ) ) :
	
	function getbowtied_theme_setup() {

		load_theme_textdomain( 'the-hanger', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce', array(
			// 'thumbnail_image_width' => 284,
			// 'single_image_width' 	=> 666,
			'product_grid'          => array(
		        'default_rows'    => 3,
		        'min_rows'        => 1,
		        'max_rows'        => 10,
		        
		        'default_columns' => 3,
		        'min_columns'     => 1,
		        'max_columns'     => 6,
		    ),
		) );

		// gutenberg
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );

		add_editor_style( get_template_directory_uri() . '/css/editor-styles.css' );

		if ( wp_is_mobile() ) {
			remove_theme_support( 'wc-product-gallery-zoom' );
		}

		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

	}

	add_action( 'after_setup_theme', 'getbowtied_theme_setup', 100 );

	if ( ! isset( $content_width ) ) { 
		$content_width = 1920; // pixels
	}

endif;

// =============================================================================
// WC Notification Classes
// =============================================================================

add_filter('woocommerce_add_success', 'custom_wc_notices_class', 10, 1);
add_filter('woocommerce_add_error', 'custom_wc_notices_class', 10, 1);
function custom_wc_notices_class( $message) {
	$class = 'no-button';
	if ( (strpos($message, '</a>') !== false) || (strpos($message, '<button') !== false) ) {
	    $class = 'with-button';
	}

	return '<p class="'.$class.'">'.$message.'</p>';
}


// ==============================================================================
// Register custom query variables
// ==============================================================================

if ( ! function_exists( 'getbowtied_query_var_filters' ) ) :
	function getbowtied_query_var_filters( $vars ) {
		
		if ( (GBT_Opt::getOption('sale_page') === true) && ! empty( GBT_Opt::getOption('sale_page_slug') ) ) :
			$vars[] = GBT_Opt::getOption('sale_page_slug');
		endif;
		
		if ( (GBT_Opt::getOption('new_products_page') === true) && ! empty( GBT_Opt::getOption('new_products_page_slug') ) ) :
			$vars[] = GBT_Opt::getOption('new_products_page_slug');
		endif;
		
		return $vars;
	}
	add_filter( 'query_vars', 'getbowtied_query_var_filters' );
endif;

// ==============================================================================
// Favicon
// ==============================================================================
if ( ! function_exists( 'getbowtied_favicon' ) ) {
	function getbowtied_favicon() {

		if (has_site_icon() == false)
		    echo '<link rel="icon" href="' . get_stylesheet_directory_uri() . '/images/favicon.png" />';
		
	}
	add_action('wp_head', 'getbowtied_favicon');
}

if ( ! function_exists( 'getbowtied_vcSetAsTheme') ) {
	function getbowtied_vcSetAsTheme() {
	    vc_manager()->disableUpdater(true);
		vc_set_as_theme();
	}
	add_action( 'vc_before_init', 'getbowtied_vcSetAsTheme' );
}
