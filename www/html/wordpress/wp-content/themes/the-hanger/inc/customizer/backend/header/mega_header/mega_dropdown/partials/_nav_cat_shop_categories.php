<?php
    if( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) :
        Kirki::add_field( 'thehanger', array(
            'type'        => 'sortable',
            'settings'    => 'product_categories_megamenu_' . $id,
            'label'       => esc_attr__( 'Product Categories', 'the-hanger' ),
            'section'     => 'megamenu_' . $id,
            'default'     => $default_subcategory_choices,
            'choices'     => $subcategory_choices,
            'priority'    => 10,
            'active_callback'    => array(
                
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_mega',     
                ),
                array(
                    'setting'  => 'enable_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_show_categories',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_categories',
                    'operator' => 'contains',
                    'value'    => (string)$id,     
                ),
                $mega_header
            ),
        ) );

        Kirki::add_field( 'thehanger', array(
            'type'        => 'separator',
            'settings'    => 'separator_'. $i++,
            'section'     => 'megamenu_' . $id,
            'active_callback'    => array(
                
                array(
                    'setting'  => 'enable_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_show_categories',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_mega',     
                ),
                array(
                    'setting'  => 'nav_button_categories',
                    'operator' => 'contains',
                    'value'    => (string)$id,     
                ),
                $mega_header
            ),
        ) );

        Kirki::add_field( 'thehanger', array(
            'type'        => 'checkbox',
            'settings'    => 'product_counter_megamenu_' . $id,
            'label'       => esc_attr__( 'Show Product Counts', 'the-hanger' ),
            'section'     => 'megamenu_' . $id,
            'default'     => '1',
            'priority'    => 10,
            'active_callback'    => array(
                
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_mega',     
                ),
                array(
                    'setting'  => 'enable_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_show_categories',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_categories',
                    'operator' => 'contains',
                    'value'    => (string)$id,     
                ),
                $mega_header
            ),
        ) );

        Kirki::add_field( 'thehanger', array(
            'type'        => 'checkbox',
            'settings'    => 'thumbnail_shop_megamenu_' . $id,
            'label'       => esc_attr__( 'Thumbs for Parent Categories', 'the-hanger' ),
            'section'     => 'megamenu_' . $id,
            'default'     => '0',
            'priority'    => 10,
            'active_callback'    => array(
                
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_mega',     
                ),
                array(
                    'setting'  => 'enable_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_show_categories',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_categories',
                    'operator' => 'contains',
                    'value'    => (string)$id,     
                ),
                $mega_header
            ),
        ) );

        Kirki::add_field( 'thehanger', array(
            'type'        => 'checkbox',
            'settings'    => 'subcategories_shop_megamenu_' . $id,
            'label'       => esc_attr__( 'Display Subcategories', 'the-hanger' ),
            'section'     => 'megamenu_' . $id,
            'default'     => '1',
            'priority'    => 10,
            'active_callback'    => array(
                
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_mega',     
                ),
                array(
                    'setting'  => 'enable_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_show_categories',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_categories',
                    'operator' => 'contains',
                    'value'    => (string)$id,     
                ),
                $mega_header
            ),
        ) );

        Kirki::add_field( 'thehanger', array(
            'type'        => 'separator',
            'settings'    => 'separator_'. $i++,
            'section'     => 'megamenu_' . $id,
            'active_callback'    => array(
                
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_mega',     
                ),
                array(
                    'setting'  => 'enable_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_show_categories',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_categories',
                    'operator' => 'contains',
                    'value'    => (string)$id,     
                ),
                $mega_header
            ),
        ) );

        Kirki::add_field( 'thehanger', array(
            'type'        => 'toggle',
            'settings'    => 'featured_shop_megamenu_' . $id,
            'label'       => esc_attr__( 'Featured Products', 'the-hanger' ),
            'section'     => 'megamenu_' . $id,
            'default'     => 'off',
            'priority'    => 10,
            'active_callback'    => array(
                
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_mega',     
                ),
                array(
                    'setting'  => 'enable_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_show_categories',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_categories',
                    'operator' => 'contains',
                    'value'    => (string)$id,     
                ),
                $mega_header
            ),
        ) );

        Kirki::add_field( 'thehanger', array(
            'type'        => 'separator',
            'settings'    => 'separator_'. $i++,
            'section'     => 'megamenu_' . $id,
            'active_callback'    => array(
                
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_mega',     
                ),
                array(
                    'setting'  => 'enable_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_show_categories',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_categories',
                    'operator' => 'contains',
                    'value'    => (string)$id,     
                ),
                $mega_header
            ),
        ) );

        Kirki::add_field( 'thehanger', array(
            'type'        => 'toggle',
            'settings'    => 'bottom_links_shop_megamenu_' . $id,
            'label'       => esc_attr__( 'Bottom Links', 'the-hanger' ),
            'section'     => 'megamenu_' . $id,
            'default'     => 'on',
            'priority'    => 10,
            'active_callback'    => array(
                
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_mega',     
                ),
                array(
                    'setting'  => 'enable_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_show_categories',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_categories',
                    'operator' => 'contains',
                    'value'    => (string)$id,     
                ),
                $mega_header
            ),
        ) );

        Kirki::add_field( 'thehanger', array(
            'type'        => 'checkbox',
            'settings'    => 'bottom_new_shop_megamenu_' . $id,
            'label'       => esc_attr__( 'New Arrivals', 'the-hanger' ),
            'section'     => 'megamenu_' . $id,
            'default'     => 'on',
            'priority'    => 10,
            'active_callback'    => array(
                
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_mega',     
                ),
                array(
                    'setting'  => 'enable_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_show_categories',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'bottom_links_shop_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_categories',
                    'operator' => 'contains',
                    'value'    => (string)$id,     
                ),
                $mega_header
            ),
        ) );

        Kirki::add_field( 'thehanger', array(
            'type'        => 'checkbox',
            'settings'    => 'bottom_sale_shop_megamenu_' . $id,
            'label'       => esc_attr__( 'Sale', 'the-hanger' ),
            'section'     => 'megamenu_' . $id,
            'default'     => 'on',
            'priority'    => 10,
            'active_callback'    => array(
                
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_mega',     
                ),
                array(
                    'setting'  => 'enable_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_show_categories',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'bottom_links_shop_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_categories',
                    'operator' => 'contains',
                    'value'    => (string)$id,     
                ),
                $mega_header
            ),
        ) );

        Kirki::add_field( 'thehanger', array(
            'type'        => 'separator',
            'settings'    => 'separator_'. $i++,
            'section'     => 'megamenu_' . $id,
            'active_callback'    => array(
                
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_mega',     
                ),
                array(
                    'setting'  => 'enable_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_show_categories',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_categories',
                    'operator' => 'contains',
                    'value'    => (string)$id,     
                ),
                $mega_header
            ),
        ) );

        Kirki::add_field( 'thehanger', array(
            'type'        => 'toggle',
            'settings'    => 'bottom_cta_shop_megamenu_' . $id,
            'label'       => esc_attr__( 'Bottom Call to Action', 'the-hanger' ),
            'section'     => 'megamenu_' . $id,
            'default'     => 'on',
            'priority'    => 10,
            'active_callback'    => array(
                
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_mega',     
                ),
                array(
                    'setting'  => 'enable_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_show_categories',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_categories',
                    'operator' => 'contains',
                    'value'    => (string)$id,     
                ),
                $mega_header
            ),
        ) );

        Kirki::add_field( 'thehanger', array(
            'type'        => 'textarea',
            'settings'    => 'bottom_cta_text_shop_megamenu_' . $id,
            'label'       => '',
            'section'     => 'megamenu_' . $id,
            'default'     => 'Sale — Up to 50% Off — Limited time only, while stocks last',
            'priority'    => 10,
            'active_callback'    => array(
                
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_mega',     
                ),
                array(
                    'setting'  => 'enable_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_show_categories',
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'bottom_cta_shop_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => true,     
                ),
                array(
                    'setting'  => 'nav_button_categories',
                    'operator' => 'contains',
                    'value'    => (string)$id,     
                ),
                $mega_header
            ),
        ) );
    endif;
