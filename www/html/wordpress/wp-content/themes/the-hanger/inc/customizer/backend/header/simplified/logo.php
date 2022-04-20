<?php

$sep_id  = 6308;
$section = 'simple_header_logo';

Kirki::add_field( 'thehanger', array(
    'type'        => 'image',
    'settings'    => 'simple_header_logo',
    'label'       => esc_html__( 'Logo', 'the-hanger' ),
    'section'     => $section,
    'default'     => get_template_directory_uri() . '/images/the-hanger.png',
    'priority'    => 10,
    'active_callback'   => array($simple_header)
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'active_callback'   => array($simple_header)
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'slider',
    'settings'    => 'simple_header_logo_width',
    'label'       => esc_html__( 'Logo Width', 'the-hanger' ),
    'section'     => $section,
    'default'     => 200,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 20,
        'max'  => 300,
        'step' => 1
    ),
    'active_callback'   => array($simple_header)
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'active_callback'   => array($simple_header)
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'image',
    'settings'    => 'simple_header_alt_logo',
    'label'       => esc_html__( 'Alternative Logo', 'the-hanger' ),
    'section'     => $section,
    'default'     => get_template_directory_uri() . '/images/alternative_logo.png',
    'priority'    => 10,
    'active_callback'   => array($simple_header)
) );

// ---------------------------------------------