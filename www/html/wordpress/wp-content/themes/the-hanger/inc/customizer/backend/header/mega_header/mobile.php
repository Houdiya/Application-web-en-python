<?php

$sep = 90000;
$i= 0;

$section = 'header_mobile';

Kirki::add_field( 'thehanger', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'header_mobile_megabutton_type',
    'label'       => esc_attr__( 'Mobile Mega Button', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'large_icons',
    'priority'    => 10,
    'choices'     => array(
        'default'   	=> esc_attr__( 'Default', 'the-hanger' ),
        'large_icons'   => esc_attr__( 'Large Category Icons', 'the-hanger' ),
        'hide'    		=> esc_attr__( 'Hide', 'the-hanger' )
    ),
    'active_callback'   => array($mega_header)
) );

Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $i++,
    'section'     => $section,
    'active_callback'   => array($mega_header)
) );

Kirki::add_field( 'thehanger', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'header_mobile_megamenu_show',
    'label'       => esc_html__( 'Mobile Megamenu', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'simple_links',
    'priority'    => 10,
    'choices'     => array(
        'default'  		=> esc_attr__( 'Default', 'the-hanger' ),
        'simple_links'  => esc_attr__( 'Simple links', 'the-hanger' ),
    ),
    'active_callback'   => array($mega_header)
) );

Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $i++,
    'section'     => $section,
    'active_callback'   => array($mega_header)
) );

Kirki::add_field( 'thehanger', array(
    'type'        => 'text',
    'settings'    => 'header_mobile_menu_text',
    'label'       => esc_html__( 'Mobile Menu Text', 'the-hanger' ),
    'section'     => $section,
    'default'     => esc_html__( 'Menu', 'the-hanger' ),
    'priority'    => 10,
) );
