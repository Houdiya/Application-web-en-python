<?php

global $theme;

//==============================================================================
//	Main Editor Styles
//==============================================================================
add_action( 'enqueue_block_editor_assets', function() {
	wp_enqueue_style(
		'getbowtied-th-blocks-editor-styles',
		plugins_url( 'assets/css/editor.css', __FILE__ ),
		array( 'wp-edit-blocks' )
	);
});

//==============================================================================
//	Main JS
//==============================================================================
add_action( 'enqueue_block_editor_assets', function() {
	wp_enqueue_script(
		'getbowtied-th-blocks-editor-scripts',
		plugins_url( 'assets/js/main.js', __FILE__ ),
		array( 'wp-blocks', 'jquery' )
	);
});

// The Hanger Dependent Blocks
$theme = wp_get_theme();
if ( $theme->template == 'the-hanger') {
	include_once( dirname( __FILE__ ) . '/social_media_profiles/block.php' );
}

include_once( dirname( __FILE__ ) . '/posts_grid/block.php' );
include_once( dirname( __FILE__ ) . '/slider/block.php' );