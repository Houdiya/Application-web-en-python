<?php 
    Kirki::add_field( 'thehanger', array(
        'type'        => 'sortable',
        'settings'    => 'categories_megamenu_' . $navItem->ID,
        'label'       => esc_attr__( 'Blog Categories', 'the-hanger' ),
        'section'     => 'megamenu_' . $navItem->ID,
        'default'     => $default_blog_cats,
        'choices'     => $blog_cats,
        'priority'    => 10,
        'active_callback'    => array(
            array(
                'setting'  => 'typeof_megamenu_' . $navItem->ID,
                'operator' => '==',
                'value'    => 'blog',     
            ),
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
                'setting'  => 'nav_button_enable_menu',
                'operator' => '==',
                'value'    => true,     
            ),
            $mega_header
        ),
    ) );