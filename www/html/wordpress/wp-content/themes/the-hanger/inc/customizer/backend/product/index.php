<?php

// ============================================
// Panel
// ============================================

// no panel


// ============================================
// Sections
// ============================================

Kirki::add_section( 'product', array(
    'title'          => esc_attr__( 'Product Page', 'the-hanger' ),
    'priority'       => 55,
    'capability'     => 'edit_theme_options',
) );


// ============================================
// Controls
// ============================================

$sep_id  = 34532;
$section = 'product';

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'single_product_sidebar',
    'label'       => esc_attr__( 'Single Product Sidebar', 'the-hanger' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'radio-image',
    'settings'    => 'single_product_sidebar_position',
    'label'       => esc_attr__( 'Sidebar Position', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'left',
    'priority'    => 10,
    'choices'     => array(
        'left'    => get_template_directory_uri() . '/images/customiser/product-sidebar-left.png',
        'right'   => get_template_directory_uri() . '/images/customiser/product-sidebar-right.png',
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'single_product_sidebar',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'active_callback'    => array(
        array(
            'setting'  => 'single_product_sidebar',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'upsell_products',
    'label'       => esc_attr__( 'Up-sells Display', 'the-hanger' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'related_products',
    'label'       => esc_attr__( 'Related Products Display', 'the-hanger' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'product_tabs_position',
    'label'       => esc_attr__( 'Tabs Position', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'inside_product_summary',
    'priority'    => 10,
    'choices'     => array(
        'inside_product_summary' => esc_html__( 'Product summary', 'the-hanger' ),
        'after_product_summary'  => esc_html__( 'After product summary', 'the-hanger' )
    ),
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'description_accordion',
    'label'       => esc_attr__( 'Description Box Open At All Times', 'the-hanger' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );
