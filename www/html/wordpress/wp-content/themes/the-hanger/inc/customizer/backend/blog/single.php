<?php

$sep_id  = 365434;
$section = 'blog_single';

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'blog_single_sidebar',
    'label'       => esc_attr__( 'Blog Sidebar', 'the-hanger' ),
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
    'type'        => 'radio-buttonset',
    'settings'    => 'blog_single_sidebar_position',
    'label'       => esc_attr__( 'Sidebar Position', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'right',
    'priority'    => 10,
    'choices'     => array(
        'left'    => esc_attr__( 'Left', 'the-hanger' ),
        'right'   => esc_attr__( 'Right', 'the-hanger' ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'blog_single_sidebar',
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
            'setting'  => 'blog_single_sidebar',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'blog_single_featured',
    'label'       => esc_attr__( 'Display Featured Image', 'the-hanger' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );
