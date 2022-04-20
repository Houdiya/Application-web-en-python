<?php

//==============================================================================
//  Nested Panels logic
//==============================================================================
Kirki::add_section( 'panel_mega_dropdown', array(
    'title'         => esc_attr__( 'Mega Button', 'the-hanger' ),
    'priority'      => 20,
    'section'         => 'panel_header'
) );

Kirki::add_section( 'panel_mega_dropdown_settings', array(
    'title'         => esc_attr__( 'Settings', 'the-hanger' ),
    'priority'      => 20,
    'section'         => 'panel_mega_dropdown'
) );

Kirki::add_section( 'panel_mega_dropdown_megamenu', array(
    'title'         => esc_attr__( 'Mega Menu', 'the-hanger' ),
    'priority'      => 10,
    'section'         => 'panel_mega_dropdown'
) );


// ==============================================================================
//  Navigation Button Megamenu
// ==============================================================================


function getbowtied_mega_dropdown_backend() {

    global $mega_header;

	$i = 1200;

    // Get Product categories for our sortable element
    if( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) :
        $prod_cats= Kirki_Helper::get_terms(array( 'taxonomy'=> 'product_cat','hide_empty' => 0, 'orderby' => 'ASC',  'parent' =>0));
        $default_prod_cats = [];
        foreach ($prod_cats as $k=>$v) {
            $default_prod_cats[] = (string)$k;
        }

        $dropdown_choices = array(
            'shop_mega'  => esc_attr__( 'Shop - Mega Menu', 'the-hanger' ),
            'shop_icons' => esc_attr__( 'Shop - Category Icons', 'the-hanger' ),
            'blog'       => esc_attr__( 'Blog', 'the-hanger'),
            'contact'    => esc_attr__( 'Contact', 'the-hanger')
        );
    else:
        $dropdown_choices = array(
            'blog'       => esc_attr__( 'Blog', 'the-hanger'),
            'contact'    => esc_attr__( 'Contact', 'the-hanger')
        );
    endif;

    $blog_cats= Kirki_Helper::get_terms(array('taxonomy'=> 'category', 'orderby'=> 'name', 'order'=> 'ASC'));
    $default_blog_cats = [];
    foreach ($blog_cats as $k=>$v) {
        $default_blog_cats[] = (string)$k;
    }

    Kirki::add_field( 'thehanger', array(
        'type'        => 'switch',
        'settings'    => 'mega_dropdown_toggle',
        'label'       => esc_attr__( 'Enable Mega Button?', 'the-hanger' ),
        'section'     => 'panel_mega_dropdown_settings',
        'default'     => 1,
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'On', 'the-hanger' ),
            'off' => esc_attr__( 'Off', 'the-hanger' ),
        ),
        'active_callback' => array($mega_header)
    ) );

    Kirki::add_field( 'thehanger', array(
        'type'        => 'separator',
        'settings'    => 'separator_' . $i++,
        'section'     => 'panel_mega_dropdown_settings',
        'active_callback'    => array(
            array(
                'setting'  => 'mega_dropdown_toggle',
                'operator' => '==',
                'value'    => true,     
            ),
            $mega_header
         ),
    ) );

    Kirki::add_field( 'thehanger', array(
        'type'        => 'text',
        'settings'    => 'nav_button_title',
        'label'       => esc_attr__( 'Wording', 'the-hanger' ),
        'section'     => 'panel_mega_dropdown_settings',
        'default'     => esc_attr__('Browse Categories', 'the-hanger'),
        'priority'    => 10,
        'active_callback'    => array(
            array(
                'setting'  => 'mega_dropdown_toggle',
                'operator' => '==',
                'value'    => true,     
            ),
            $mega_header
         ),
    ) );

    Kirki::add_field( 'thehanger', array(
        'type'        => 'separator',
        'settings'    => 'separator_' . $i++,
        'section'     => 'panel_mega_dropdown_settings',
        'active_callback'    => array(
            array(
                'setting'  => 'mega_dropdown_toggle',
                'operator' => '==',
                'value'    => true,     
            ),
            $mega_header
         ),
    ) );

    if( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) :
        Kirki::add_field( 'thehanger', array(
            'type'        => 'toggle',
            'settings'    => 'nav_button_show_categories',
            'label'       => esc_attr__( 'Product Categories', 'the-hanger' ),
            'section'     => 'panel_mega_dropdown_settings',
            'default'     => 'on',
            'priority'    => 10,
            'choices'     => array(
                'on'  => esc_attr__( 'On', 'the-hanger' ),
                'off' => esc_attr__( 'Off', 'the-hanger' ),
            ),
            'active_callback'    => array(
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                $mega_header
             ),
        ) );

        if( !empty($prod_cats) ) :

            Kirki::add_field( 'thehanger', array(
                'type'        => 'sortable',
                'settings'    => 'nav_button_categories',
                'section'     => 'panel_mega_dropdown_settings',
                'default'     => $default_prod_cats,
                'choices'     => $prod_cats,
                'priority'    => 10,
                'active_callback'    => array(
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
                    $mega_header
                 ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'toggle',
                'settings'    => 'nav_button_show_product_counts',
                'label'       => esc_attr__( 'Show Product Counts?', 'the-hanger' ),
                'section'     => 'panel_mega_dropdown_settings',
                'default'     => 'on',
                'priority'    => 10,
                'choices'     => array(
                    'on'  => esc_attr__( 'On', 'the-hanger' ),
                    'off' => esc_attr__( 'Off', 'the-hanger' ),
                ),
                'active_callback'    => array(
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
                    $mega_header
                 ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'separator',
                'settings'    => 'separator_' . $i++,
                'section'     => 'panel_mega_dropdown_settings',
                'active_callback'    => array(
                    array(
                        'setting'  => 'nav_button_show_categories',
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                 ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'toggle',
                'settings'    => 'nav_button_show_category_icons',
                'label'       => esc_attr__( 'Show Category Icons?', 'the-hanger' ),
                'section'     => 'panel_mega_dropdown_settings',
                'default'     => 'on',
                'priority'    => 10,
                'choices'     => array(
                    'on'  => esc_attr__( 'On', 'the-hanger' ),
                    'off' => esc_attr__( 'Off', 'the-hanger' ),
                ),
                'active_callback'    => array(
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
                    $mega_header
                 ),
            ) );

        else :

            Kirki::add_field( 'thehanger', array(
                'type'        => 'custom',
                'settings'    => 'no_categories_message_' . $i++,
                'section'     => 'panel_mega_dropdown_settings',
                'default'     => '<p class="kirki-message">Sorry, there are no categories. In order to customize your categories, go to Dashboard > Products > Categories and create some.</h2>',
                'priority'    => 10,
                'active_callback'    => array(
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
                    $mega_header
                )
            ) );

        endif;

        Kirki::add_field( 'thehanger', array(
            'type'        => 'separator',
            'settings'    => 'separator_' . $i++,
            'section'     => 'panel_mega_dropdown_settings',
            'active_callback'    => array(
                array(
                    'setting'  => 'mega_dropdown_toggle',
                    'operator' => '==',
                    'value'    => true,     
                ),
                $mega_header
             ),
        ) );
    endif;

    Kirki::add_field( 'thehanger', array(
        'type'        => 'toggle',
        'settings'    => 'nav_button_enable_menu',
        'label'       => esc_attr__( 'Menu Location', 'the-hanger' ),
        'section'     => 'panel_mega_dropdown_settings',
        'default'     => 'on',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'On', 'the-hanger' ),
            'off' => esc_attr__( 'Off', 'the-hanger' ),
        ),
        'active_callback'    => array(
            array(
                'setting'  => 'mega_dropdown_toggle',
                'operator' => '==',
                'value'    => true,     
            ),
            $mega_header
         ),
    ) );

    if( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) :
        foreach ( $prod_cats as $id=>$name ) {
            Kirki::add_section( 'megamenu_' . $id, array(
                'title'          => $name,
                'priority'       => 50,
                'capability'     => 'edit_theme_options',
                'section'          => 'panel_mega_dropdown_megamenu',
            ) );

            // Get Product subcategories for our sortable element
            $subcats = get_terms( array( 'taxonomy' => 'product_cat','hide_empty' => 0, 'orderby' => 'ASC',  'parent' =>$id) );
            $subcategory_choices = array();
            $default_subcategory_choices = array();
            foreach ($subcats as $subcat) {
                $default_subcategory_choices[] = (string)$subcat->term_id;
                $subcategory_choices[$subcat->term_id] = sprintf(esc_attr__('%s', 'the-hanger'), $subcat->name);
            }

            if( !empty($subcategory_choices) ) :

                Kirki::add_field( 'thehanger', array(
                    'type'        => 'switch',
                    'settings'    => 'enable_megamenu_' . $id,
                    'label'       => esc_attr__( 'Enable Megamenu?', 'the-hanger' ),
                    'section'     => 'megamenu_' . $id,
                    'default'     => '0',
                    'priority'    => 10,
                    'choices'     => array(
                        'on'  => esc_attr__( 'On', 'the-hanger' ),
                        'off' => esc_attr__( 'Off', 'the-hanger' ),
                    ),
                    'active_callback'    => array(
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
                    )
                ) );

                Kirki::add_field( 'thehanger', array(
                    'type'        => 'radio',
                    'settings'    => 'typeof_megamenu_' . $id,
                    'label'       => esc_attr__( 'Dropdown Type', 'the-hanger' ),
                    'section'     => 'megamenu_' . $id,
                    'default'     => 'shop_mega',
                    'priority'    => 10,
                    'choices'     => array(
                        'shop_mega'  => esc_attr__( 'Shop - Mega Menu', 'the-hanger' ),
                        'shop_icons' => esc_attr__( 'Shop - Category Icons', 'the-hanger' )
                    ),
                    'active_callback'    => array(
                        array(
                            'setting'  => 'enable_megamenu_' . $id,
                            'operator' => '==',
                            'value'    => true
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

                    )
                ) );

                include "partials/_nav_cat_shop_categories.php";
                include "partials/_nav_cat_shop_icons.php";

            else :

                Kirki::add_field( 'thehanger', array(
                    'type'        => 'custom',
                    'settings'    => 'no_categories_message_' . $i++,
                    'section'     => 'megamenu_' . $id,
                    'default'     => '<p class="kirki-message">Sorry, there are no subcategories. You cannot customize a megamenu for this category.</h2>',
                    'priority'    => 10,
                    'active_callback'    => array(
                        array(
                            'setting'  => 'enable_megamenu_' . $id,
                            'operator' => '==',
                            'value'    => true
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
                    )
                ) );

            endif;
        }
    endif;

    $menuloc = get_nav_menu_locations();
    if( isset($menuloc['gbt_nav_but']) && !empty($menuloc['gbt_nav_but']) ) :
        $topbarID = $menuloc['gbt_nav_but']; // Get the *primary* menu ID
        $topbarNav = wp_get_nav_menu_items($topbarID); // Get the array of wp objects, the nav items for our queried location.
    endif;

    if (isset($topbarNav) && is_array($topbarNav)):
        foreach ( $topbarNav as $navItem ) {

            if ($navItem->menu_item_parent != 0) continue;

            Kirki::add_section( 'megamenu_' . $navItem->ID, array(
                'title'          => $navItem->title,
                'priority'       => 50,
                'capability'     => 'edit_theme_options',
                'section'          => 'panel_mega_dropdown_megamenu',
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'separator',
                'settings'    => 'separator_'. $i++,
                'section'     => 'megamenu_' . $navItem->ID,
                'active_callback'    => array(
                    array(
                        'setting'  => 'mega_dropdown_toggle',
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    array(
                        'setting'   => 'nav_button_enable_menu',
                        'operator'  => '==',
                        'value'     => true
                    ),
                    $mega_header
                 ),
            ) );

             Kirki::add_field( 'thehanger', array(
                'type'        => 'switch',
                'settings'    => 'enable_megamenu_' . $navItem->ID,
                'label'       => esc_attr__( 'Enable Megamenu?', 'the-hanger' ),
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => '0',
                'priority'    => 10,
                'choices'     => array(
                    'on'  => esc_attr__( 'On', 'the-hanger' ),
                    'off' => esc_attr__( 'Off', 'the-hanger' ),
                ),
                'active_callback'    => array(
                    array(
                        'setting'  => 'mega_dropdown_toggle',
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    array(
                        'setting'   => 'nav_button_enable_menu',
                        'operator'  => '==',
                        'value'     => true
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
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    array(
                        'setting'  => 'mega_dropdown_toggle',
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    array(
                        'setting'   => 'nav_button_enable_menu',
                        'operator'  => '==',
                        'value'     => true
                    ),
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'radio',
                'settings'    => 'typeof_megamenu_' . $navItem->ID,
                'label'       => esc_attr__( 'Dropdown Type', 'the-hanger' ),
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => 'blog',
                'priority'    => 10,
                'choices'     => $dropdown_choices,
                'active_callback'    => array(
                    array(
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    array(
                        'setting'  => 'mega_dropdown_toggle',
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    array(
                        'setting'   => 'nav_button_enable_menu',
                        'operator'  => '==',
                        'value'     => true
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
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    array(
                        'setting'  => 'mega_dropdown_toggle',
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    array(
                        'setting'   => 'nav_button_enable_menu',
                        'operator'  => '==',
                        'value'     => true
                    ),
                    $mega_header
                ),
            ) );

            $id = $navItem->ID;

            include "partials/_nav_shop_categories.php";
            include "partials/_nav_shop_icons.php";
            include "partials/_nav_blog_categories.php";
            include "partials/_nav_contact.php";

        }
    endif;

}

add_action( 'init', 'getbowtied_mega_dropdown_backend');