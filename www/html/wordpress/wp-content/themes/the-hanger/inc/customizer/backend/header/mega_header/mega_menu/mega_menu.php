<?php 
$i = 10000;
//==============================================================================
//  Nested Panels logic
//==============================================================================
Kirki::add_section( 'panel_megamenu', array(
    'title'         => esc_html__( 'Mega Menu', 'the-hanger' ),
    'priority'      => 10,
    'section'         => 'panel_header'
) );

//==============================================================================
//  End Nested Panels
//==============================================================================

function getbowtied_megamenu_backend() {

    global $mega_header;

    $i = 1100;
    $menuloc = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
    if( isset($menuloc['gbt_primary']) && !empty($menuloc['gbt_primary']) ) :
        $primaryID = $menuloc['gbt_primary']; // Get the *primary* menu ID
        $primaryNav = wp_get_nav_menu_items($primaryID); // Get the array of wp objects, the nav items for our queried location.
    endif;

    $categories = get_categories( array(
        'orderby'    => 'name',
        'order'      => 'ASC',
        'parent'     => 0,
        'hide_empty' => 0
    ) );

    // Get Blog post categories for our sortable element
    $blog_choices = array();
    $default_blog_choices = array();
    foreach ( $categories as $category ) {
        $default_blog_choices[] = (string)$category->cat_ID;
        $blog_choices[$category->cat_ID] = sprintf(esc_attr__('%s', 'the-hanger'), $category->name);
    }

    if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) :
        // Get Product categories for our sortable element
        $cats = get_terms( array( 'taxonomy' => 'product_cat','hide_empty' => 0, 'orderby' => 'ASC',  'parent' =>0) );
        $category_choices = array();
        $default_category_choices = array();
        foreach ($cats as $cat) {
            $default_category_choices[] = (string)$cat->term_id;
            $category_choices[$cat->term_id] = sprintf(esc_attr__('%s', 'the-hanger'), $cat->name);
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

    //==============================================================================
    //  Top Navigation Megamenu
    //==============================================================================
    if (isset($primaryNav) && is_array($primaryNav)):
        foreach ( $primaryNav as $navItem ) {
            if ($navItem->menu_item_parent != 0) continue;

            Kirki::add_section( 'megamenu_' . $navItem->ID, array(
                'title'          => $navItem->title,
                'priority'       => 50,
                'capability'     => 'edit_theme_options',
                'section'          => 'panel_megamenu',
            ) );


            Kirki::add_field( 'thehanger', array(
                'type'        => 'switch',
                'settings'    => 'enable_megamenu_' . $navItem->ID,
                'label'       => esc_html__( 'Enable Megamenu?', 'the-hanger' ),
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => '0',
                'priority'    => 10,
                'choices'     => array(
                    'on'  => esc_attr__( 'On', 'the-hanger' ),
                    'off' => esc_attr__( 'Off', 'the-hanger' ),
                ),
                'active_callback'   => array($mega_header)
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
                    $mega_header
                ),
            ) );

            Kirki::add_field( 'thehanger', array(
                'type'        => 'radio',
                'settings'    => 'typeof_megamenu_' . $navItem->ID,
                'label'       => esc_html__( 'Dropdown Type', 'the-hanger' ),
                'section'     => 'megamenu_' . $navItem->ID,
                'default'     => 'shop_mega',
                'priority'    => 10,
                'choices'     => $dropdown_choices,
                'active_callback'    => array(
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
                        'setting'  => 'enable_megamenu_' . $navItem->ID,
                        'operator' => '==',
                        'value'    => true,     
                    ),
                    $mega_header
                ),
            ) );

            include "partials/_mega_shop_categories.php";
            include "partials/_mega_shop_icons.php";
            include "partials/_mega_blog_categories.php";
            include "partials/_mega_contact.php";
        }
    endif;

}

add_action('init', 'getbowtied_megamenu_backend');