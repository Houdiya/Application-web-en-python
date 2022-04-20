<?php
    if( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) :
        if( !empty($category_choices) ) :

            Kirki::add_field( 'thehanger', array(
                'type'        => 'sortable',
                'settings'    => 'product_categories_megamenu_' . $navItem->ID,
                'label'       => esc_html__( 'Product Categories', 'the-hanger' ),
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => $default_category_choices,
                'choices'     => $category_choices,
                'priority'    => 10,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'separator',
                'settings'    => 'separator_'. $i++,
                'section'     => 'megamenu_' . $navItem->ID,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'checkbox',
                'settings'    => 'product_counter_megamenu_' . $navItem->ID,
                'label'       => esc_html__( 'Show Product Counts', 'the-hanger' ),
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => '1',
                'priority'    => 10,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'checkbox',
                'settings'    => 'thumbnail_shop_megamenu_' . $navItem->ID,
                'label'       => esc_html__( 'Thumbs for Parent Categories', 'the-hanger' ),
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => '0',
                'priority'    => 10,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'checkbox',
                'settings'    => 'subcategories_shop_megamenu_' . $navItem->ID,
                'label'       => esc_html__( 'Display Subcategories', 'the-hanger' ),
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => '1',
                'priority'    => 10,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'separator',
                'settings'    => 'separator_'. $i++,
                'section'     => 'megamenu_' . $navItem->ID,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'toggle',
                'settings'    => 'featured_shop_megamenu_' . $navItem->ID,
                'label'       => esc_html__( 'Featured Products', 'the-hanger' ),
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => 'off',
                'priority'    => 10,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'separator',
                'settings'    => 'separator_'. $i++,
                'section'     => 'megamenu_' . $navItem->ID,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'toggle',
                'settings'    => 'bottom_links_shop_megamenu_' . $navItem->ID,
                'label'       => esc_html__( 'Bottom Links', 'the-hanger' ),
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => 'on',
                'priority'    => 10,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'checkbox',
                'settings'    => 'bottom_new_shop_megamenu_' . $navItem->ID,
                'label'       => esc_html__( 'New Arrivals', 'the-hanger' ),
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => 'on',
                'priority'    => 10,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    array(
                        'setting'  => 'bottom_links_shop_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'checkbox',
                'settings'    => 'bottom_sale_shop_megamenu_' . $navItem->ID,
                'label'       => esc_html__( 'Sale', 'the-hanger' ),
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => 'on',
                'priority'    => 10,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    array(
                        'setting'  => 'bottom_links_shop_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'separator',
                'settings'    => 'separator_'. $i++,
                'section'     => 'megamenu_' . $navItem->ID,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'toggle',
                'settings'    => 'bottom_cta_shop_megamenu_' . $navItem->ID,
                'label'       => esc_html__( 'Bottom Call to Action', 'the-hanger' ),
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => 'on',
                'priority'    => 10,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'textarea',
                'settings'    => 'bottom_cta_text_shop_megamenu_' . $navItem->ID,
                'label'       => '',
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => 'Sale — Up to 50% Off — Limited time only, while stocks last',
                'priority'    => 10,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    array(
                        'setting'  => 'bottom_cta_shop_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

        else :

            Kirki::add_field( 'thehanger', array(
                'type'        => 'custom',
                'settings'    => 'no_categories_message_' . $i++,
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => '<p class="kirki-message">Sorry, there are no categories. In order to customize your categories, go to Dashboard > Products > Categories and create some.</h2>',
                'priority'    => 10,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_mega',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    array(
                        'setting'  => 'bottom_cta_shop_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                )
            ) );

        endif;
    endif;
