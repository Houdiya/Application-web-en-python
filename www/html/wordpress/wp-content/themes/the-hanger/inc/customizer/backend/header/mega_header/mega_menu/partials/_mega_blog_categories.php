<?php 

    if( !empty($blog_choices) ) :

        Kirki::add_field( 'thehanger', array(
            'type'        => 'sortable',
            'settings'    => 'categories_megamenu_' . $navItem->ID,
            'label'       => esc_html__( 'Blog Categories', 'the-hanger' ),
            'section'     => 'megamenu_' . $navItem->ID,
            'default'     => $default_blog_choices,
            'choices'     => $blog_choices,
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
                $mega_header
            ),
        ) );

    else: 

        Kirki::add_field( 'thehanger', array(
            'type'        => 'custom',
            'settings'    => 'no_blog_message_' . $i++,
            'section'     => 'megamenu_' . $navItem->ID,
            'default'     => '<p class="kirki-message">Sorry, there are no blog categories. In order to customize your categories, go to Dashboard > Posts > Categories and create some.</h2>',
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
                $mega_header
            )
        ) );

    endif;