<?php

$sep_id  = 5677;
$section = 'shop_catalog_mode';

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'catalog_mode',
    'label'       => esc_attr__( 'Catalog Mode', 'the-hanger' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'active_callback' => array(
        array(
            'setting'  => 'catalog_mode',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'catalog_mode_button',
    'label'       => esc_attr__( 'Remove Add to Cart Button', 'the-hanger' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback' => array(
        array(
            'setting'  => 'catalog_mode',
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
    'active_callback' => array(
        array(
            'setting'  => 'catalog_mode',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'catalog_mode_price',
    'label'       => esc_attr__( 'Remove Product Price', 'the-hanger' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback' => array(
        array(
            'setting'  => 'catalog_mode',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
