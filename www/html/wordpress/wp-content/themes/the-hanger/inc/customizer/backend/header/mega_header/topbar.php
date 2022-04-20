<?php

$sep_id  = 74028;
$section = 'header_top_bar';

Kirki::add_field( 'thehanger', array(
    'type'        => 'switch',
    'settings'    => 'topbar_toggle',
    'label'       => esc_attr__( 'Top Bar', 'the-hanger' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),

) );

Kirki::add_field( 'thehanger', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'topbar_layout',
    'label'       => esc_attr__( 'Top Bar Layout', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'boxed',
    'priority'    => 10,
    'choices'     => array(
        'boxed'   => esc_attr__( 'Boxed', 'the-hanger' ),
        'full'    => esc_attr__( 'Full', 'the-hanger' ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
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
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'color',
    'settings'    => 'topbar_bg_color',
    'label'       => esc_attr__( 'Background Color', 'the-hanger' ),
    'section'     => $section,
    'default'     => '#fff',
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
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
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'color',
    'settings'    => 'topbar_font_color',
    'label'       => esc_attr__( 'Text Color', 'the-hanger' ),
    'section'     => $section,
    'default'     => '#777',
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
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
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'color',
    'settings'    => 'topbar_accent_color',
    'label'       => esc_attr__( 'Accent Color', 'the-hanger' ),
    'section'     => $section,
    'default'     => '#c4b583',
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
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
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'number',
    'settings'    => 'topbar_font_size',
    'label'       => esc_html__( 'Text Size', 'the-hanger' ),
    'section'     => $section,
    'default'     => 13,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 9,
        'max'  => 18,
        'step' => 1
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
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
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'topbar_info_1_toggle',
    'label'       => esc_attr__( 'Info 1', 'the-hanger' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );

Kirki::add_field( 'thehanger', array(
    'type'     => 'textarea',
    'settings' => 'topbar_info_1',
    'section'  => $section,
    'default'  => esc_html__( 'Call +40 123 456 789', 'the-hanger' ),
    'priority' => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'topbar_info_1_toggle',
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
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'topbar_info_2_toggle',
    'label'       => esc_attr__( 'Info 2', 'the-hanger' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );

Kirki::add_field( 'thehanger', array(
    'type'     => 'textarea',
    'settings' => 'topbar_info_2',
    'section'  => $section,
    'default'  => esc_html__( 'Free shipping on all orders over $75', 'the-hanger' ),
    'priority' => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'topbar_info_2_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );

