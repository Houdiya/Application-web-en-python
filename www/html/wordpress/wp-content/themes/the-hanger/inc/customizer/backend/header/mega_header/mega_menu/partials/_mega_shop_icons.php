<?php 
    if( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) : 
        if( !empty($category_choices) ) :

            Kirki::add_field( 'thehanger', array(
                'type'        => 'sortable',
                'settings'    => 'product_categories_icons_megamenu_' . $navItem->ID,
                'label'       => esc_html__( 'Product Categories', 'the-hanger' ),
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => $default_category_choices,
                'choices'     => $category_choices,
                'priority'    => 10,
                'active_callback'    => array(
                    array(
                        'setting'  => 'typeof_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => 'shop_icons',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
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
                        'value'    => 'shop_icons',     
                    ),
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                )
            ) );

        endif;
    endif;