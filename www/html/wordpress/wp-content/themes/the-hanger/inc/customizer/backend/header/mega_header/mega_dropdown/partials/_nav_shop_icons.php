<?php 
    if( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) :
        Kirki::add_field( 'thehanger', array(
            'type'        => 'sortable',
            'settings'    => 'product_categories_icons_megamenu_' . $id,
            'label'       => esc_html__( 'Product Categories', 'the-hanger' ),
            'section'     => 'megamenu_' . $id,
            'default'     => $default_prod_cats,
            'choices'     => $prod_cats,
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
                    'setting'  => 'nav_button_enable_menu',
                    'operator' => '==',
                    'value'    => true,     
                ),
                $mega_header
            ),
        ) );
    endif;