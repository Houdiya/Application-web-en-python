<?php

// ============================================
// Panel
// ============================================

// no panel


// ============================================
// Sections
// ============================================

Kirki::add_section( 'footer', array(
    'title'          => esc_attr__( 'Footer', 'the-hanger' ),
    'priority'       => 60,
    'capability'     => 'edit_theme_options',
) );


// ============================================
// Controls
// ============================================

$sep_id  = 48536;
$section = 'footer';

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'radio-image',
    'settings'    => 'footer_layout',
    'label'       => esc_attr__( 'Footer Layout', 'the-hanger' ),
    'section'     => $section,
    'default'     => 'full',
    'priority'    => 10,
    'choices'     => array(
        'boxed'   => get_template_directory_uri() . '/images/customiser/footer-boxed.png',
        'full'    => get_template_directory_uri() . '/images/customiser/footer-fullwidth.png',
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
    'settings'    => 'footer_prefooter',
    'label'       => esc_attr__( 'Pre Footer', 'the-hanger' ),
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
    'type'        => 'color',
    'settings'    => 'footer_background_color',
    'label'       => esc_attr__( 'Footer Background Color', 'the-hanger' ),
    'section'     => $section,
    'default'     => '#FFFFFF',
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
    'settings'    => 'footer_font_color',
    'label'       => esc_attr__( 'Footer Font Color', 'the-hanger' ),
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
    'settings'    => 'footer_headings_color',
    'label'       => esc_attr__( 'Footer Headings Color', 'the-hanger' ),
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
    'type'     => 'textarea',
    'settings' => 'footer_text',
    'label'    => esc_html__( 'Footnote / Copyright Text', 'the-hanger' ),
    'section'  => $section,
    'default'  => esc_html__('Powered by ', 'the-hanger' ) . '<a href="https://thehanger.getbowtied.com" title="eCommerce WordPress Theme for WooCommerce">' . esc_html__( 'The Hanger', 'the-hanger' ) . '</a>.',
    'description' => esc_html__( 'Allowed HTML tags: a, abbr, acronym, b, blockquote, cite, code, del, em, i, q, s, strike, strong', 'the-hanger' ),
    'sanitize_callback'  => 'wp_kses',
    'priority' => 10,
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
) );
// ---------------------------------------------

Kirki::add_field( 'thehanger', array(
    'type'     => 'toggle',
    'settings' => 'expandable_footer',
    'label'    => esc_html__( 'Collapsed Widget Area on Mobiles', 'the-hanger' ),
    'section'  => $section,
    'default'  => true,
    'priority' => 10,
) );

// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
) );


// ---------------------------------------------
Kirki::add_field( 'thehanger', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Payment Options', 'the-hanger' ),
    'section'     => $section,
    'priority'    => 10,
    'row_label'     => array(
        'type'      => 'field',
        'value'     => esc_attr__('Payment Option', 'the-hanger' ),
        'field'     => 'payment_option_name',
    ),
    'button_label' => esc_attr__('Add New Payment Option', 'the-hanger' ),
    'settings'     => 'footer_payment_options',
    'default'      => array(
        array(
            'payment_option_name' => esc_attr__( 'Visa', 'the-hanger' ),
            'payment_option_image'  => get_template_directory_uri() . '/images/footer/payment-icon-visa.png',
        ),
        array(
            'payment_option_name' => esc_attr__( 'MasterCard', 'the-hanger' ),
            'payment_option_image'  => get_template_directory_uri() . '/images/footer/payment-icon-mastercard.png',
        ),
        array(
            'payment_option_name' => esc_attr__( 'Amex', 'the-hanger' ),
            'payment_option_image'  => get_template_directory_uri() . '/images/footer/payment-icon-amex.png',
        ),
        array(
            'payment_option_name' => esc_attr__( 'PayPal', 'the-hanger' ),
            'payment_option_image'  => get_template_directory_uri() . '/images/footer/payment-icon-paypal.png',
        ),
        array(
            'payment_option_name' => esc_attr__( 'Amazon', 'the-hanger' ),
            'payment_option_image'  => get_template_directory_uri() . '/images/footer/payment-icon-amazon.png',
        ),
    ),
    'fields' => array(
        'payment_option_name' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Name', 'the-hanger' ),
            'default'     => '',
        ),
        'payment_option_image' => array(
            'type'        => 'image',
            'label'       => esc_attr__( 'Icon', 'the-hanger' ),
            'default'     => '',
        ),
    )
) );
