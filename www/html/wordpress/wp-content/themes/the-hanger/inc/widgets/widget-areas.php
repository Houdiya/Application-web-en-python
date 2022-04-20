<?php

// =============================================================================
// Register Widget Areas
// =============================================================================

function getbowtied_theme_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__('Blog Sidebar', 'the-hanger'),
		'id'            => 'blog-widget-area',
		'description'   => '',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'the-hanger' ),
		'id'            => 'shop-widget-area',
		'description'   => '',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Filters', 'the-hanger' ),
		'id'            => 'shop-filters-area',
		'description'   => '',
		'before_widget' => '<div class="column"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Single Product Sidebar', 'the-hanger' ),
		'id'            => 'single-product-widget-area',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Pre-Footer Widgets', 'the-hanger' ),
		'id'            => 'prefooter-widget-area',
		'before_widget' => '<div class="column"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'the-hanger' ),
		'id'            => 'footer-widget-area',
		'before_widget' => '<div class="column"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'getbowtied_theme_widgets_init' );