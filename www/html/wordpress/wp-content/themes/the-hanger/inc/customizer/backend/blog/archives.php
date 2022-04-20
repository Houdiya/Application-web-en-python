<?php

$sep_id  = 9576;
$section = 'blog';

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'blog_categories',
    'label'       => esc_attr__( 'Blog Categories', 'the-hanger' ),
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
    'settings'    => 'blog_highlighted_posts',
    'label'       => esc_attr__( 'Highlight first three posts', 'the-hanger' ),
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
    'settings'    => 'blog_sidebar',
    'label'       => esc_attr__( 'Blog Sidebar', 'the-hanger' ),
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
    'settings'    => 'blog_sidebar_position',
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
            'setting'  => 'blog_sidebar',
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
            'setting'  => 'blog_sidebar',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'blog_pagination',
    'label'       => esc_attr__( 'Pagination', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'default',
    'priority'    => 10,
    'choices'     => array(
        'default'           => esc_attr__( 'Classic', 'the-hanger' ),
        'load_more_button'  => esc_attr__( 'Load More', 'the-hanger' ),
        'infinite_scroll'   => esc_attr__( 'Infinite', 'the-hanger' ),
    ),
) );
