<?php

add_action( 'wp_enqueue_scripts', 'theme_customiser_styles' );
function theme_customiser_styles() {

	$custom_code = '';

	$path = get_template_directory() . '/inc/customizer/frontend/';

	include( $path . 'global.css.php' );
	include( $path . 'topbar.css.php' );
	include( $path . 'header-style-1.css.php' );
	include( $path . 'header-style-2.css.php' );
	include( $path . 'header-mobiles.css.php' );
	include( $path . 'dropdowns.css.php' );
	include( $path . 'styling.css.php' );
	include( $path . 'fonts.css.php' );
	include( $path . 'buttons.css.php' );
	include( $path . 'shop.css.php' );
	include( $path . 'widgets.css.php' );
	include( $path . 'footer.css.php' );
	include( $path . 'gray-dark.css.php' );
	include( $path . 'gray-medium.css.php' );
	include( $path . 'gray-light.css.php' );
	include( $path . 'gray-ultra-light.css.php' );
	include( $path . 'catalog_mode.css.php' );
	include( $path . 'gutenberg.css.php' );

	$custom_code = thehanger_compress_styles($custom_code);

	wp_add_inline_style( 'thehanger-styles', $custom_code );
}
