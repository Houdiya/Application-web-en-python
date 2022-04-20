<?php

$sep_id  = 45785;
$section = 'shop';

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'shop_sidebar',
    'label'       => esc_attr__( 'Shop Sidebar', 'the-hanger' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'active_callback'    => array(
        array(
            'setting'  => 'shop_sidebar',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'shop_sidebar_position',
    'label'       => esc_attr__( 'Sidebar Position', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'left',
    'priority'    => 10,
    'choices'     => array(
        'left'    => esc_attr__( 'Left', 'the-hanger' ),
        'right'   => esc_attr__( 'Right', 'the-hanger' ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'shop_sidebar',
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
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'shop_pagination',
    'label'       => esc_attr__( 'Pagination', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'infinite_scroll',
    'priority'    => 10,
    'choices'     => array(
        'default'           => esc_attr__( 'Classic', 'the-hanger' ),
        'load_more_button'  => esc_attr__( 'Load More', 'the-hanger' ),
        'infinite_scroll'   => esc_attr__( 'Infinite', 'the-hanger' ),
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
    'type'        => 'radio-buttonset',
    'settings'    => 'shop_layout_style',
    'label'       => esc_attr__( 'Layout Style', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'grid',
    'priority'    => 10,
    'choices'     => array(
        'grid'  => esc_attr__( 'Grid', 'the-hanger' ),
        'list'  => esc_attr__( 'List', 'the-hanger' ),
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
    'settings'    => 'shop_second_image',
    'label'       => esc_attr__( 'Second Product Image on Hover', 'the-hanger' ),
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
    'type'        => 'slider',
    'settings'    => 'shop_mobile_columns',
    'label'       => esc_attr__( 'Number of Columns on Mobile', 'the-hanger' ),
    'section'     => $section,
    'default'     => 2,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 1,
        'max'  => 2,
        'step' => 1
    ),
) );
