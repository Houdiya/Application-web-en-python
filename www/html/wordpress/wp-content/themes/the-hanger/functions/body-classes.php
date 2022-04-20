<?php

// -----------------------------------------------------------------------------
// Body Class - Site Main Font
// -----------------------------------------------------------------------------

function getbowtied_site_main_font($classes) {
    $classes[] = 'site-main-font';
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Header Template
// -----------------------------------------------------------------------------

function getbowtied_header_template($classes) {
    if      ( 'style-1' == GBT_Opt::getOption('header_template') ) $classes[] = 'header-style-1';
    elseif  ( 'style-2' == GBT_Opt::getOption('header_template') ) $classes[] = 'header-style-2';
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Header Layout
// -----------------------------------------------------------------------------

function getbowtied_header_layout($classes) {
    if ( 'style-1' == GBT_Opt::getOption('header_template') ) {
        if      ( 'boxed' == GBT_Opt::getOption('header_layout') ) $classes[] = 'header-layout-boxed';
        elseif  ( 'full'  == GBT_Opt::getOption('header_layout') ) $classes[] = 'header-layout-full';
    } elseif ( 'style-2' == GBT_Opt::getOption('header_template') ) {
        if      ( 'boxed' == GBT_Opt::getOption('simple_header_layout') ) $classes[] = 'header-layout-boxed';
        elseif  ( 'full'  == GBT_Opt::getOption('simple_header_layout') ) $classes[] = 'header-layout-full';
    }
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Header Sticky
// -----------------------------------------------------------------------------

function getbowtied_header_sticky($classes) {
    if ( 1 == GBT_Opt::getOption('header_sticky_visibility') ) $classes[] = 'header-sticky';
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Content Layout
// -----------------------------------------------------------------------------

function getbowtied_content_layout($classes) {
    if      ( 'boxed' == GBT_Opt::getOption('content_layout') ) $classes[] = 'content-layout-boxed';
    elseif  ( 'full'  == GBT_Opt::getOption('content_layout') ) $classes[] = 'content-layout-full';
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Blog Sidebar
// -----------------------------------------------------------------------------

function getbowtied_blog_sidebar($classes) {
    if ( ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE && !is_woocommerce() ) && ( is_archive() || is_author() || is_category() || is_home() || is_tag() ) ) {
        if ( 1 == GBT_Opt::getOption('blog_sidebar') ) {
            $classes[] = 'blog-sidebar-active';
            $classes[] = 'blog-sidebar-' . GBT_Opt::getOption('blog_sidebar_position');
        }
    } else if ( ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE && !is_woocommerce() ) && is_single() ) {
        if ( 1 == GBT_Opt::getOption('blog_single_sidebar') ) {
            $classes[] = 'blog-sidebar-active';
            $classes[] = 'blog-sidebar-' . GBT_Opt::getOption('blog_single_sidebar_position');
        } else {
            $classes[] = 'blog-sidebar-inactive';
        }
    }
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Page Without Title
// -----------------------------------------------------------------------------

function getbowtied_page_title($classes) {
    
    $page_title_option_class            = '';
    $page_title_option_class_no_title   = 'page-without-title';

    if (get_post_meta( getbowtied_page_id(), 'page_title_meta_box_check', true )) {
        
        $page_title_option = get_post_meta( getbowtied_page_id(), 'page_title_meta_box_check', true );

        switch ( $page_title_option ) {     
            case "off":
                $page_title_option_class = $page_title_option_class_no_title;
                break;
        }

    }

    $classes[] = $page_title_option_class;
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Shop
// -----------------------------------------------------------------------------

function getbowtied_shop($classes) {

    if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {
        if ( is_shop() || is_product_category() || is_product_tag() || (is_tax() && is_woocommerce()) ) {
            $classes[] = 'woocommerce-shop';
        }
    }
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Shop Pagination
// -----------------------------------------------------------------------------

function getbowtied_shop_pagination($classes) {

    if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {
        if ( is_shop() || is_product_category() || is_product_tag() || (is_tax() && is_woocommerce()) ) {
            $classes[] = 'shop-pagination-' . GBT_Opt::getOption('shop_pagination');
        }
    }
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Shop Sidebar
// -----------------------------------------------------------------------------

function getbowtied_shop_sidebar($classes) {
    if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {
        if ( is_shop() || is_product_category() || is_product_tag() || (is_tax() && is_woocommerce()) ) {
            if ( 1 == GBT_Opt::getOption('shop_sidebar') ) {
                $classes[] = 'shop-sidebar-active';
                $classes[] = 'shop-sidebar-' . GBT_Opt::getOption('shop_sidebar_position');
            }
        }
    }
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Shop Products per Row
// -----------------------------------------------------------------------------

// function getbowtied_shop_products_per_row($classes) {
//     if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {
//         if ( is_shop() || is_product_category() || is_product_tag() ) {
//             $classes[] = 'shop-products-per-row-' . GBT_Opt::getOption('products_columns');
//         }
//     }
//     return $classes;
// }

// -----------------------------------------------------------------------------
// Body Class - Single Product Sidebar
// -----------------------------------------------------------------------------

function getbowtied_single_product_sidebar($classes) {
    if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {
        if ( is_product() ) {
            if ( 1 == GBT_Opt::getOption('single_product_sidebar') ) {
                $classes[] = 'single-product-sidebar-active';
                $classes[] = 'single-product-sidebar-' . GBT_Opt::getOption('single_product_sidebar_position');
            }
        }
    }
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Catalog Mode
// -----------------------------------------------------------------------------

function getbowtied_catalog_mode($classes) {
    if ( 1 == GBT_Opt::getOption('catalog_mode') ) $classes[] = 'catalog-mode';
    return $classes;
}

// ----------------------------------------------------------------------------- 
// Body Class - Footer Layout 
// ----------------------------------------------------------------------------- 
 
function getbowtied_footer_layout($classes) { 
    if      ( 'boxed' == GBT_Opt::getOption('footer_layout') ) $classes[] = 'footer-layout-boxed'; 
    elseif  ( 'full'  == GBT_Opt::getOption('footer_layout') ) $classes[] = 'footer-layout-full'; 
    return $classes; 
} 

// -----------------------------------------------------------------------------
// Body Class - Shop Pagination
// -----------------------------------------------------------------------------
function getbowtied_blog_pagination($classes) {

    if ( is_home() || is_archive() || is_search() ) {
        $classes[] = 'blog-pagination-' . GBT_Opt::getOption('blog_pagination');
    }

    return $classes;
}

// -----------------------------------------------------------------------------
// Print Body Classes
// -----------------------------------------------------------------------------
    
function getbowtied_customiser_body_classes() {    

    add_filter( 'body_class', 'getbowtied_site_main_font' );
    //add_filter( 'body_class', 'getbowtied_header_template' );
    add_filter( 'body_class', 'getbowtied_header_layout' );
    //add_filter( 'body_class', 'getbowtied_header_sticky' );
    add_filter( 'body_class', 'getbowtied_content_layout' );
    add_filter( 'body_class', 'getbowtied_blog_sidebar' );
    add_filter( 'body_class', 'getbowtied_page_title' );
    add_filter( 'body_class', 'getbowtied_shop' );
    add_filter( 'body_class', 'getbowtied_shop_pagination' );
    add_filter( 'body_class', 'getbowtied_shop_sidebar' );
    // add_filter( 'body_class', 'getbowtied_shop_products_per_row' );
    add_filter( 'body_class', 'getbowtied_single_product_sidebar' );   
    //add_filter( 'body_class', 'getbowtied_catalog_mode' );
    add_filter( 'body_class', 'getbowtied_blog_pagination' );
    add_filter( 'body_class', 'getbowtied_footer_layout' );
}

add_action( 'wp_head', 'getbowtied_customiser_body_classes', 100 );

