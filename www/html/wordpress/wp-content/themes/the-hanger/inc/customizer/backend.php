<?php

$path = get_template_directory() . '/inc/customizer/backend/';

require_once( $path . 'gutenberg.php' );

if ( GETBOWTIED_KIRKI_IS_ACTIVE ) {

    require_once( $path . 'index.php' );
    require_once( $path . 'go-to-page.php' );

    require_once( $path . 'global/index.php' );
	require_once( $path . 'header/index.php' );
	require_once( $path . 'fonts/index.php' );
	require_once( $path . 'blog/index.php' );
	require_once( $path . 'footer/index.php' );

	if (GETBOWTIED_WOOCOMMERCE_IS_ACTIVE) {
		require_once( $path . 'shop/index.php' );
		require_once( $path . 'product/index.php' );
	}
}