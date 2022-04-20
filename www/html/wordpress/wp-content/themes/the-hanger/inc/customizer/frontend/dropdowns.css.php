<?php

$custom_code .= '

	.dropdown .is-dropdown-submenu,
	.dropdown-pane,
	.drilldown,
	.drilldown .is-drilldown-submenu,
	.gbt-mega-menu-content,
	.gbt-mega-dropdown-content-inside,
	.header_search_form .select2-dropdown,
	.header_search_ajax_results,
	.gbt-mega-menu-content .megamenu_blog_wrapper .megamenu_posts .megamenu_posts_overlay,
	dl.gbt-stack-gallery dl.gbt-stack-items dt,
	dl.gbt-stack-gallery dl.gbt-stack-nav dt a,
	.header-mobiles-wrapper .header-mobiles-content,
	.site-search.position-top
	{
		background-color: ' . esc_html(GBT_Opt::getOption('dropdowns_bg_color')) . ';
		color: ' . esc_html(GBT_Opt::getOption('dropdowns_font_color')) . ';
	}

	.minicart .woocommerce-mini-cart .woocommerce-mini-cart-item .blockUI.blockOverlay
	{
		background-color: ' . esc_html(GBT_Opt::getOption('dropdowns_bg_color')) . ' !important;
	}

	.dropdown .is-dropdown-submenu a:hover,
	.dropdown .is-dropdown-submenu .is-active > a,
	.dropdown-pane a:hover,
	.drilldown a:hover,
	.gbt-mega-menu-content a:hover,
	.gbt-mega-dropdown-content-inside a:hover,
	.header_search_ajax_results a:hover,
	.gbt-mega-menu-content .megamenu_blog_wrapper .megamenu_posts_category_list dt a:hover
	{
		color: ' . esc_html(GBT_Opt::getOption('dropdowns_accent_color')) . ';
	}
	.gbt-mega-menu-content .megamenu_cta,
	.header_search_form .select2-container .select2-results__option.select2-results__option--highlighted[aria-selected],
	.header-mobiles-wrapper .header-mobiles-content .header-mobiles-mega-dropdown-button.active,
	.site-search.off-canvas .header_search_form .select2-container .select2-results__option.select2-results__option--highlighted[aria-selected]
	{
		color: ' . esc_html(GBT_Opt::getOption('dropdowns_bg_color')) . ';
		background-color: ' . esc_html(GBT_Opt::getOption('dropdowns_accent_color')) . ';
	}

	.dropdown .is-submenu-item,
	.megamenu_subcategory_list,
	dl.gbt-stack-gallery dl.gbt-stack-items dt .gbt_featured_title,
	dl.gbt-stack-gallery dl.gbt-stack-items dt .amount,
	.gbt-mega-menu-content .megamenu_contact .megamenu_contact_info p span,
	.minicart .widget.woocommerce.widget_shopping_cart ul.woocommerce-mini-cart li.mini_cart_item a:not(.remove),
	.minicart_infos,
	.header-mobiles-wrapper .header-mobiles-content .header-mobiles-secondary-menu .is-drilldown ul li a,
	.header-mobiles-wrapper .header-mobiles-content .header-mobiles-topbar-menu .is-drilldown ul li a,
	.header-mobiles-wrapper .header-mobiles-content .header-mobiles-info
	{
		color: ' . esc_html(GBT_Opt::getOption('dropdowns_dark_gray')) . ';
	}

	.header-minicart-placeholder .minicart .widget.woocommerce.widget_shopping_cart ul.woocommerce-mini-cart li.mini_cart_item span.quantity,
	.widget.woocommerce.widget_shopping_cart ul.woocommerce-mini-cart li.mini_cart_item .variation dd p,
	.header_search_ajax_results .woocommerce-Price-amount,
	.gbt-mega-menu-content .megamenu_category a span.count,
	.gbt-mega-dropdown-wrapper .gbt-mega-dropdown .gbt-mega-dropdown-content .gbt-mega-dropdown-content-inside ul li>a span.count
	{
		color: ' . esc_html(GBT_Opt::getOption('dropdowns_medium_gray')) . ';
	}


	.gbt-mega-dropdown-wrapper .gbt-mega-dropdown .gbt-mega-dropdown-content .gbt-mega-dropdown-content-inside .is-drilldown ul li:before,
	.gbt-mega-dropdown-wrapper .gbt-mega-dropdown .gbt-mega-dropdown-content .gbt-mega-dropdown-content-inside,
	.gbt-mega-menu-content .megamenu_blog_wrapper .megamenu_posts_category_list,
	.gbt-mega-menu-content .megamenu_blog_wrapper .megamenu_posts_category_list dt:before,
	.gbt-mega-menu-content .megamenu_blog_wrapper .megamenu_posts_category_list > a,
	.gbt-mega-menu-content .megamenu_bottom_links,
	.header-minicart-placeholder .minicart .widget.woocommerce.widget_shopping_cart .woocommerce-mini-cart__total.total,
	.site-header-style-1 .header-cart .minicart .minicart_infos,
	.site-header-style-2 .header-cart .minicart .minicart_infos,
	dl.gbt-stack-gallery dl.gbt-stack-nav dt a,
	.header-mobiles-wrapper .header-mobiles-content .is-drilldown ul li:before,
	.archive-header .archive-title-wrapper ul.archive-mobile-list li:before,
	.header-mobiles-wrapper .header-mobiles-content .gbt-mega-dropdown-content,
	.header-mobiles-wrapper .header-mobiles-content .header-mobiles-primary-menu,
	.header-mobiles-wrapper .header-mobiles-content .header-mobiles-ecomm-menu,
	.header-mobiles-wrapper .header-mobiles-content .header-mobiles-secondary-menu,
	.header-mobiles-wrapper .header-mobiles-content .header-mobiles-topbar-menu,
	.header-mobiles-wrapper .header-mobiles-content .header-mobiles-large-categories,
	.header-mobiles-wrapper .header-mobiles-content .header-mobiles-info-2,
	.header-mobiles-wrapper .header-mobiles-content .header-mobiles-primary-menu .is-drilldown ul li .js-drilldown-back
	{
		border-color: ' . esc_html(GBT_Opt::getOption('dropdowns_ultra_light_gray')) . ';
	}

	.gbt-mega-menu-content .megamenu_blog_wrapper .megamenu_posts .megamenu_post .megamenu_post_image
	{
		background-color: ' . esc_html(GBT_Opt::getOption('dropdowns_ultra_light_gray')) . ';
	}

	.minicart .widget.woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons.buttons .button.checkout
	{
		color: ' . esc_html(GBT_Opt::getOption('dropdowns_bg_color')) . ';
		background-color: ' . esc_html(GBT_Opt::getOption('dropdowns_font_color')) . ';
	}

	.minicart .widget.woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons.buttons .button.checkout:hover
	{
		background-color: ' . esc_html(GBT_Opt::getOption('dropdowns_accent_color')) . ';
	}

	.minicart .widget.woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons.buttons .button:not(.checkout),
	.gbt-mega-menu-content .megamenu_blog_wrapper .megamenu_posts_category_list dt a,
	.site-search.position-top .header-search .close-button,
	.site-search.position-top .header-search .header_search_button:after,
	.site-search.position-top .header-search .header_search_form .header_search_input_wrapper .header_search_input,
	.site-search.position-top .header-search .header_search_form .select2-dropdown .select2-results ul li,
	.site-search.position-top .header-search .select2 .select2-selection__rendered
	{
		color: ' . esc_html(GBT_Opt::getOption('dropdowns_font_color')) . ';
	}

	.site-search.position-top .header-search .header_search_form .header_search_input_wrapper .header_search_input::-ms-input-placeholder,
	.site-search.position-top .header-search .search-field::-ms-input-placeholder
	{
		color: ' . esc_html(GBT_Opt::getOption('dropdowns_medium_gray')) . ';
	}

	.site-search.position-top .header-search .header_search_form .header_search_input_wrapper .header_search_input::-webkit-input-placeholder,
	.site-search.position-top .header-search .search-field::-webkit-input-placeholder
	{
		color: ' . esc_html(GBT_Opt::getOption('dropdowns_medium_gray')) . ';
	}

	.site-search.position-top .header-search .header_search_form .header_search_input_wrapper .header_search_input::-moz-placeholder,
	.site-search.position-top .header-search .search-field::-moz-input-placeholder
	{
		color: ' . esc_html(GBT_Opt::getOption('dropdowns_medium_gray')) . ';
	}

	.minicart .widget.woocommerce.widget_shopping_cart ul.woocommerce-mini-cart li.mini_cart_item a:not(.remove):hover,
	.minicart .widget.woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons.buttons .button:not(.checkout):hover,
	dl.gbt-stack-gallery dl.gbt-stack-nav dt a:hover
	{
		color: ' . esc_html(GBT_Opt::getOption('dropdowns_accent_color')) . ';
	}
';

?>