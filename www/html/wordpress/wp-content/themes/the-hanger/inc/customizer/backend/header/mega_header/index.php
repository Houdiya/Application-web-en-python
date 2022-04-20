<?php 
// ============================================
// Sections
// ============================================

Kirki::add_section( 'header_settings', array(
    'title'          => esc_attr__( 'Settings', 'the-hanger' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'section'          => 'panel_header',
) );

Kirki::add_section( 'header_logo', array(
    'title'          => esc_attr__( 'Logo', 'the-hanger' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'section'          => 'panel_header',
) );

Kirki::add_section( 'header_elements', array(
    'title'          => esc_attr__( 'Icons', 'the-hanger' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'section'          => 'panel_header',
) );

Kirki::add_section( 'header_top_bar', array(
    'title'          => esc_attr__( 'Top Bar', 'the-hanger' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'section'          => 'panel_header',
) );

Kirki::add_section( 'header_dropdowns', array(
    'title'          => esc_attr__( 'Dropdowns', 'the-hanger' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'section'          => 'panel_header',
) );

Kirki::add_section( 'header_mobile', array(
    'title'          => esc_attr__( 'Mobile Header', 'the-hanger' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'section'          => 'panel_header',
) );

Kirki::add_section( 'header_sticky', array(
    'title'          => esc_attr__( 'Sticky Header', 'the-hanger' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'section'          => 'panel_header',
) );