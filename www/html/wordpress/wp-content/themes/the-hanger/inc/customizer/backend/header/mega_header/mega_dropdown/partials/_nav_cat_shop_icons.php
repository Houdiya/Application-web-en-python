<?php 
    if( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) :
        Kirki::add_field( 'thehanger', array(
            'type'        => 'sortable',
            'settings'    => 'product_categories_icons_megamenu_' . $id,
            'label'       => esc_attr__( 'Product Categories', 'the-hanger' ),
            'section'     => 'megamenu_' . $id,
            'default'     => $default_subcategory_choices,
            'choices'     => $subcategory_choices,
            'priority'    => 10,
            'active_callback'    => array(
                array(
                    'setting'  => 'typeof_megamenu_' . $id,
                    'operator' => '==',
                    'value'    => 'shop_icons',     
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
    endif;