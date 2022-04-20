<?php

// ============================================
// Panel
// ============================================

// no panel


// ============================================
// Sections
// ============================================

Kirki::add_section( 'fonts', array(
    'title'          => esc_attr__( 'Fonts', 'the-hanger' ),
    'priority'       => 35,
    'capability'     => 'edit_theme_options',
) );


// ============================================
// Controls
// ============================================

$sep_id  = 59374;
$section = 'fonts';


Kirki::add_field( 'thehanger', array(
    'type'        => 'number',
    'settings'    => 'font_size',
    'label'       => esc_html__( 'Base Font Size', 'the-hanger' ),
    'description' => esc_attr__( 'The Base Font Size refers to the size applied to the paragraph text. All other elements, such as headings, links, buttons, etc will adjusted automatically to keep the hierarchy of font sizes based on this one size. Easy-peasy!', 'the-hanger' ),
    'section'     => $section,
    'default'     => 16,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 12,
        'max'  => 24,
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
    'type'        => 'typography',
    'settings'    => 'main_font',
    'label'       => esc_attr__( 'Body Font', 'the-hanger' ),
    'section'     => $section,
    'default'     => array(
        'font-family'    => 'Libre Franklin',
        'variant'        => 'regular',
        'subsets'        => array( 'latin-ext' ),
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
    'type'        => 'typography',
    'settings'    => 'secondary_font',
    'label'       => esc_attr__( 'Headings Font', 'the-hanger' ),
    'section'     => $section,
    'default'     => array(
        'font-family'    => 'NeueEinstellung',
        'variant'        => '500',
        'subsets'        => array( 'latin' ),
    ),
) );




