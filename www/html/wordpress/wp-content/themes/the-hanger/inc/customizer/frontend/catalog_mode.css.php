<?php

if ( (!empty(GBT_Opt::getOption('catalog_mode_button'))) && (GBT_Opt::getOption('catalog_mode_button') == 1) ) :

    $custom_code .= '
        form.cart div.quantity,
        form.cart button.single_add_to_cart_button,
        .add_to_cart_button,
        .product-type-grouped,
        .product-type-external,
        .ajax_add_to_cart,
        .header-cart {
            display: none !important;
        }';
endif;

if ( (!empty(GBT_Opt::getOption('catalog_mode_price'))) && (GBT_Opt::getOption('catalog_mode_price') == 1) ) :

    $custom_code .= '
        .woocommerce-Price-amount,
        span.onsale,
        stock.out-of-stock {
        	display: none !important;
        }';
endif;

?>