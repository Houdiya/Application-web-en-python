<?php

// =============================================================================
// Enqueue Scripts
// =============================================================================

if ( ! function_exists('getbowtied_scripts') ) :
function getbowtied_scripts() {

	// In Header

	// none


	// In Footer

	if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {
		wp_enqueue_script('select2');
		wp_enqueue_script('flexslider');
		wp_enqueue_script('wc-single-product');
		wp_enqueue_script('wc-add-to-cart-variation');
	}

	wp_enqueue_script( 'foundation-init-js', get_template_directory_uri() . '/inc/_vendor/foundation/dist/js/foundation.min.js', 	 array('jquery'), '6.4.3',   TRUE );
	wp_enqueue_script( 'js-cookie', 		 get_template_directory_uri() . '/inc/_vendor/cookies/js.cookie.js', 		 			 array('jquery'), '2.1.1', 	 TRUE );
	wp_enqueue_script( 'jquery-visible', 	 get_template_directory_uri() . '/inc/_vendor/jquery-visible/jquery.visible.js', 		 array('jquery'), '1.2.0', 	 TRUE );
	wp_enqueue_script( 'imagesloaded', 	 	 get_template_directory_uri() . '/inc/_vendor/imagesloaded/imagesloaded.pkgd.js', 		 array('jquery'), '4.1.3', 	 TRUE );
	wp_enqueue_script( 'jquery-scrollTo', 	 get_template_directory_uri() . '/inc/_vendor/scrollTo/jquery.scrollTo.min.js', 		 array('jquery'), '2.1.2', 	 TRUE );
	wp_enqueue_script( 'hoverintent', 	 	 get_template_directory_uri() . '/inc/_vendor/hoverIntent/jquery.hoverIntent.min.js', 	 array('jquery'), '1.9.0', 	 TRUE );
	wp_enqueue_script( 'mojs', 	 	 		 get_template_directory_uri() . '/inc/_vendor/mojs/mo.min.js', 		 					 array('jquery'), '0.288.2', TRUE );
	wp_enqueue_script( 'anime', 	 	 	 get_template_directory_uri() . '/inc/_vendor/anime/anime.min.js', 		 				 array('jquery'), '2.2.0', 	 TRUE );
	wp_enqueue_script( 'swiper', 	 	 	 get_template_directory_uri() . '/inc/_vendor/swiper/js/swiper.js', 					 array('jquery'), '4.4.6', 	 TRUE );

	if ( GETBOWTIED_VISUAL_COMPOSER_IS_ACTIVE) // If VC exists/active load scripts after VC
	{
		$dependencies = array('jquery', 'wpb_composer_front_js');
	}
	else // Do not depend on VC
	{
		$dependencies = array('jquery');
	}

	wp_enqueue_script('getbowtied-scripts', get_template_directory_uri() . '/js/scripts-dist.js', $dependencies, getbowtied_theme_version(), TRUE);

	// Send wp variables to js

	$wp_js_vars = array(
		'select_placeholder'        	=> esc_html__( 'Choose an option', 'woocommerce' ),
		'blog_pagination_type' 			=> GBT_Opt::getOption('blog_pagination'),
		'shop_pagination_type' 			=> GBT_Opt::getOption('shop_pagination'),
		'accent_color' 					=> GBT_Opt::getOption('accent_color'),
		'shop_display'					=> GBT_Opt::getOption('shop_layout_style'),
		'is_customize_preview'			=> is_customize_preview(),
		'accordion_description'			=> GBT_Opt::getOption('description_accordion'),
		'ajax_url'						=> admin_url('admin-ajax.php'),
		'woo_ajax_layered_nav_plugin'	=> class_exists('SOD_Widget_Ajax_Layered_Nav'),
	);

	wp_localize_script( 'getbowtied-scripts', 'wp_js_var', $wp_js_vars );

	if (is_singular() && comments_open() && get_option( 'thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

}
add_action( 'wp_enqueue_scripts', 'getbowtied_scripts' );
endif;
