<?php

$sep_id  = 8475;
$section = 'header_settings';

Kirki::add_field( 'thehanger', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'header_layout',
    'label'       => esc_attr__( 'Header Layout', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'full',
    'priority'    => 10,
    'choices'     => array(
        'boxed'   => esc_attr__( 'Boxed', 'the-hanger' ),
        'full'    => esc_attr__( 'Full', 'the-hanger' ),
    ),
    'active_callback'   => array($mega_header)
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'active_callback'   => array($mega_header)
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'color',
    'settings'    => 'header_background_color',
    'label'       => esc_attr__( 'Header Background Color', 'the-hanger' ),
    'section'     => $section,
    'default'     => '#fff',
    'priority'    => 10,
    'active_callback'   => array($mega_header)
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'active_callback'   => array($mega_header)
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'color',
    'settings'    => 'header_font_color',
    'label'       => esc_attr__( 'Header Text Color', 'the-hanger' ),
    'section'     => $section,
    'default'     => '#000',
    'priority'    => 10,
    'active_callback'   => array($mega_header)
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'active_callback'   => array($mega_header)
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'color',
    'settings'    => 'header_accent_color',
    'label'       => esc_attr__( 'Header Accent Color', 'the-hanger' ),
    'section'     => $section,
    'default'     => '#c4b583',
    'priority'    => 10,
    'active_callback'   => array($mega_header)
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'active_callback'   => array($mega_header)
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'slider',
    'settings'    => 'header_font_size',
    'label'       => esc_html__( 'Header Text Size', 'the-hanger' ),
    'section'     => $section,
    'default'     => 13,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 9,
        'max'  => 24,
        'step' => 1
    ),
    'active_callback'   => array($mega_header)
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'active_callback'   => array($mega_header)
) );
// ---------------------------------------------


Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'header_search_toggle',
    'label'       => esc_html__( 'Header Search', 'the-hanger' ),
    'section'     => $section,
    'default'     => 1,
    'priority'    => 10,
    'choices'     => array(
        'on'  => esc_attr__( 'On', 'the-hanger' ),
        'off' => esc_attr__( 'Off', 'the-hanger' ),
    ),
    'active_callback'   => array($mega_header)
) );

Kirki::add_field( 'thehanger', array(
    'type'        => 'checkbox',
    'settings'    => 'header_search_by_category',
    'label'       => esc_html__( 'Search by Category', 'the-hanger' ),
    'section'     => $section,
    'default'     => '1',
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'header_search_toggle',
            'operator' => '==',
            'value'    => true,     
        ),
        $mega_header
    ),
) );