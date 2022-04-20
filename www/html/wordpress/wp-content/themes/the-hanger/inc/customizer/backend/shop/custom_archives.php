<?php

$sep_id  = 7439;
$section = 'shop_custom_archives';

Kirki::add_field( 'thehanger', array(
    'settings'    => 'sales_section_heading',
    'section'     => $section,
    'type'        => 'custom',
    'default'     => '<span class="big-separator">'.esc_html__('Sales', 'the-hanger' ).'</span>',
) );

Kirki::add_field( 'thehanger', array(
    'type'        => 'text',
    'settings'    => 'sale_page_badge_text',
    'label'       => esc_html__( 'Sale Badge Wording', 'the-hanger' ),
    'section'     => $section,
    'default'     => esc_html__( 'Sale!', 'the-hanger' ),
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
    'settings'    => 'sale_page',
    'label'       => esc_attr__( 'Sales Section in Shop', 'the-hanger' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'active_callback' => array(
        array(
            'setting'  => 'sale_page',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'text',
    'settings'    => 'sale_page_title',
    'label'       => esc_html__( 'Sales Section Page Title', 'the-hanger' ),
    'section'     => $section,
    'default'     => esc_html__( 'On Sale!', 'the-hanger' ),
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'sale_page',
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
    'active_callback' => array(
        array(
            'setting'  => 'sale_page',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'text',
    'settings'    => 'sale_page_slug',
    'label'       => esc_html__( 'Sales Section Page Slug', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'on-sale',
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'sale_page',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );

// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'settings'    => 'newproducts_section_heading',
    'section'     => $section,
    'type'        => 'custom',
    'default'     => '<span class="big-separator margin-top">'.esc_html__('New Products', 'the-hanger' ).'</span>',
) );

Kirki::add_field( 'thehanger', array(
    'type'        => 'toggle',
    'settings'    => 'new_products_page',
    'label'       => esc_attr__( 'New Products Section in Shop', 'the-hanger' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'active_callback' => array(
        array(
            'setting'  => 'new_products_page',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'text',
    'settings'    => 'new_products_badge_text',
    'label'       => esc_html__( 'New Products Badge Wording', 'the-hanger' ),
    'section'     => $section,
    'default'     => esc_html__( 'New!', 'the-hanger' ),
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'new_products_page',
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
    'active_callback' => array(
        array(
            'setting'  => 'new_products_page',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'text',
    'settings'    => 'new_products_page_title',
    'label'       => esc_html__( 'New Products Section Page Title', 'the-hanger' ),
    'section'     => $section,
    'default'     => esc_html__( 'New Products', 'the-hanger' ),
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'new_products_page',
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
    'active_callback' => array(
        array(
            'setting'  => 'new_products_page',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'text',
    'settings'    => 'new_products_page_slug',
    'label'       => esc_html__( 'New Products Section Page Slug', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'new-products',
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'new_products_page',
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
    'active_callback' => array(
        array(
            'setting'  => 'new_products_page',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'new_products_number_type',
    'label'       => esc_html__( 'Show new products by:', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'last_added',
    'priority'    => 10,
    'choices'     => array(
        'day'       => esc_html__('Day Added', 'the-hanger'),
        'last_added'    => esc_html__('Last Added', 'the-hanger'),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'new_products_page',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );

// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'        => 'slider',
    'settings'    => 'new_products_number',
    'label'       => esc_attr__( 'Show products added in the past x days:', 'the-hanger' ),
    'section'     => $section,
    'default'     => 8,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 1,
        'max'  => 60,
        'step' => 1
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'new_products_page',
            'operator' => '==',
            'value'    => true,     
        ),
        array(
            'setting'  => 'new_products_number_type',
            'operator' => '==',
            'value'    => 'day',
        )
    ),
) );

Kirki::add_field( 'thehanger', array(
    'type'        => 'slider',
    'settings'    => 'new_products_number_last',
    'label'       => esc_attr__( 'Show last x products:', 'the-hanger' ),
    'section'     => $section,
    'default'     => 8,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 1,
        'max'  => 20,
        'step' => 1
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'new_products_page',
            'operator' => '==',
            'value'    => true,     
        ),
        array(
            'setting'  => 'new_products_number_type',
            'operator' => '==',
            'value'    => 'last_added',
        )
    ),
) );