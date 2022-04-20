<?php

Kirki::add_section( 'simple_header_settings', array(
    'title'          => esc_attr__( 'Settings', 'the-hanger' ),
    'priority'       => 9,
    'capability'     => 'edit_theme_options',
    'section'          => 'panel_header',
) );

Kirki::add_section( 'simple_header_logo', array(
    'title'          => esc_attr__( 'Logo', 'the-hanger' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'section'          => 'panel_header',
) );

Kirki::add_section( 'simple_header_elements', array(
    'title'          => esc_attr__( 'Icons', 'the-hanger' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'section'          => 'panel_header',
) );