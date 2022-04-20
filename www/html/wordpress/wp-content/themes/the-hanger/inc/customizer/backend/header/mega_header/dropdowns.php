<?php

$sep_id  = 200;
$section = 'header_dropdowns';

Kirki::add_field( 'thehanger', array(
    'type'        => 'color',
    'settings'    => 'dropdowns_bg_color',
    'label'       => esc_attr__( 'Dropdowns Background Color', 'the-hanger' ),
    'section'     => $section,
    'default'     => '#fff',
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
    'type'        => 'color',
    'settings'    => 'dropdowns_font_color',
    'label'       => esc_attr__( 'Dropdowns Text Color', 'the-hanger' ),
    'section'     => $section,
    'default'     => '#000',
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
    'type'        => 'color',
    'settings'    => 'dropdowns_accent_color',
    'label'       => esc_attr__( 'Dropdowns Accent Color', 'the-hanger' ),
    'section'     => $section,
    'default'     => '#c4b583',
    'priority'    => 10,
) );