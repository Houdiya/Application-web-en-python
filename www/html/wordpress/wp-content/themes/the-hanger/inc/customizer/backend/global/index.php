<?php

// ============================================
// Panel
// ============================================

// no panel


// ============================================
// Sections
// ============================================

Kirki::add_section( 'global', array(
    'title'          => esc_attr__( 'Global', 'the-hanger' ),
    'priority'       => 25,
    'capability'     => 'edit_theme_options',
) );


// ============================================
// Controls
// ============================================

$sep_id  = 100;
$section = 'global';

Kirki::add_field( 'thehanger', array(
    'type'        => 'slider',
    'settings'    => 'site_width',
    'label'       => esc_html__( 'Site Width', 'the-hanger' ),
    'section'     => $section,
    'default'     => 1340,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 960,
        'max'  => 1920,
        'step' => 1
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
    'settings'    => 'site_width_full',
    'label'       => esc_attr__( 'Make it 100%', 'the-hanger' ),
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
    'type'        => 'color',
    'settings'    => 'bg_color',
    'label'       => esc_attr__( 'Body Background', 'the-hanger' ),
    'section'     => $section,
    'default'     => '#F9F9F9',
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'site_width_full',
            'operator' => '==',
            'value'    => false,
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
            'setting'  => 'site_width_full',
            'operator' => '==',
            'value'    => false,
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'radio-image',
    'settings'    => 'content_layout',
    'label'       => esc_attr__( 'Content Layout', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'full',
    'priority'    => 10,
    'choices'     => array(
        'boxed'   => get_template_directory_uri() . '/images/customiser/boxed.png',
        'full'    => get_template_directory_uri() . '/images/customiser/full.png',
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
    'type'        => 'color',
    'settings'    => 'content_bg_color',
    'label'       => esc_attr__( 'Content Background', 'the-hanger' ),
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
    'settings'    => 'primary_color',
    'label'       => esc_attr__( 'Main Font Color', 'the-hanger' ),
    'section'     => $section,
    'default'     => '#777',
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
    'settings'    => 'secondary_color',
    'label'       => esc_attr__( 'Secondary Font Color', 'the-hanger' ),
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
    'settings'    => 'accent_color',
    'label'       => esc_attr__( 'Accent Color', 'the-hanger' ),
    'section'     => $section,
    'default'     => '#C4B583',
    'priority'    => 10,
) );