<?php

$sep_id  = 4574;
$section = 'header_sticky';

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'header_sticky_visibility',
    'label'       => esc_attr__( 'Sticky Header Visibility', 'the-hanger' ),
    'section'     => $section,
    'default'     => true,
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
    'type'        => 'toggle',
    'settings'    => 'header_sticky_topbar',
    'label'       => esc_attr__( 'Include Top Bar', 'the-hanger' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
        $mega_header
    ),
) );

// ---------------------------------------------