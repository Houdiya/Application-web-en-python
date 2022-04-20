<?php //Start building your awesome child theme functions

add_action( 'wp_enqueue_scripts', 'thehanger_enqueue_styles', 99 );
function thehanger_enqueue_styles() {

    // enqueue parent styles
    wp_enqueue_style( 'thehanger-styles', get_template_directory_uri() . '/css/styles.css' );

    // enqueue child styles
    wp_enqueue_style( 'thehanger-child-styles',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'thehanger-styles' ),
        wp_get_theme()->get('Version')
    );
}
