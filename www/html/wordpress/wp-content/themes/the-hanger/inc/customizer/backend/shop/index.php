<?php

// ============================================
// Panel
// ============================================

Kirki::add_panel( 'panel_shop', array(
    'title'         => esc_attr__( 'Shop', 'the-hanger' ),
    'priority'      => 45,
) );


// ============================================
// Sections
// ============================================

Kirki::add_section( 'shop', array(
    'title'          => esc_attr__( 'Layout', 'the-hanger' ),
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_shop'
) );

Kirki::add_section( 'shop_catalog_mode', array(
    'title'          => esc_attr__( 'Catalog Mode', 'the-hanger' ),
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_shop'
) );

Kirki::add_section( 'shop_custom_archives', array(
    'title'          => esc_attr__( 'Custom Archives', 'the-hanger' ),
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_shop'
) );


// ============================================
// Controls
// ============================================

require_once( get_template_directory() . '/inc/customizer/backend/shop/layout.php');
require_once( get_template_directory() . '/inc/customizer/backend/shop/catalog_mode.php');
require_once( get_template_directory() . '/inc/customizer/backend/shop/custom_archives.php');