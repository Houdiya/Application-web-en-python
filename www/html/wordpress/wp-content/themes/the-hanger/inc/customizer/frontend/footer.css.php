<?php

$custom_code .= '

	body.footer-layout-full .site-prefooter,
	.site-prefooter .prefooter-content,
	body.footer-layout-full .site-footer,
	.site-footer .footer-content
	{
		color: ' . esc_html(GBT_Opt::getOption('footer_font_color')) . ';
		background-color: ' . esc_html(GBT_Opt::getOption('footer_background_color')) . ';
	}

	.site-footer .wpml-ls-sub-menu li,
	.site-footer .wcml-cs-submenu li,
	.site-prefooter .wpml-ls-sub-menu li,
	.site-prefooter .wcml-cs-submenu li
	{
		background-color: ' . esc_html(GBT_Opt::getOption('footer_background_color')) . ';
	}

	.site-footer .wpml-ls-sub-menu li:hover a span,
	.site-prefooter .wpml-ls-sub-menu li:hover a span,
	.site-footer .wcml-cs-submenu li:hover a,
	.site-prefooter .wcml-cs-submenu li:hover a,
	.site-footer .wcml-cs-submenu li:hover a:hover,
	.site-prefooter .wcml-cs-submenu li:hover a:hover,
	.site-footer .wpml-ls-sub-menu li:hover a:hover span,
	.site-prefooter .wpml-ls-sub-menu li:hover a:hover span
	{
		color: ' . esc_html(GBT_Opt::getOption('footer_background_color')) . '!important;
	}

	.site-prefooter .prefooter-content .ecommerce-info-widget-icon,
	.site-prefooter .prefooter-content table th,
	.widget_calendar table td#today,
	.site-prefooter .wcml-cs-submenu li a, 
	.site-prefooter .wpml-ls-sub-menu li a,
	.site-footer .wcml-cs-submenu li a, 
	.site-footer .wpml-ls-sub-menu li a
	{
		color: ' . esc_html(GBT_Opt::getOption('footer_font_color')) . ';
	}

	.site-footer .widget_calendar table td#today:after,
	.site-prefooter .widget_calendar table td#today:after
	{
		background-color: ' . esc_html(GBT_Opt::getOption('footer_headings_color')) . ';
	}

	.site-prefooter h1,
	.site-prefooter h2,
	.site-prefooter h3,
	.site-prefooter h4,
	.site-prefooter h5,
	.site-prefooter h6,
	.site-footer h1,
	.site-footer h2,
	.site-footer h3,
	.site-footer h4,
	.site-footer h5,
	.site-footer h6,
	.site-footer .footer-style-1 .footer-navigation .navigation-foundation > ul > li > a,
	.site-footer .search-form .search-field,
	.site-prefooter .search-form .search-field,
	.site-footer .woocommerce-product-search .search-field,
	.site-prefooter .woocommerce-product-search .search-field,
	.site-prefooter .wcml-cs-active-currency > a,
	.site-prefooter .wpml-ls-current-language > a span,
	.site-prefooter .wpml-ls-current-language > a:after,
	.site-footer .wcml-cs-active-currency > a,
	.site-footer .wpml-ls-current-language > a span,
	.site-footer .wpml-ls-current-language > a:after,
	.site-footer .widget_calendar table thead th,
	.site-prefooter .widget_calendar table thead th,
	.site-footer .widget_calendar caption,
	.site-prefooter .widget_calendar caption,
	.site-footer .widget-area .widget_calendar table tbody tr > td a,
	.site-prefooter .widget-area .widget_calendar table tbody tr > td a,
	.site-footer .widget-area select,
	.site-prefooter .widget-area select,
	.site-footer a.rsswidget,
	.site-prefooter a.rsswidget,
	.site-footer .recentcomments a,
	.site-prefooter .recentcomments a
	{
		color: ' . esc_html(GBT_Opt::getOption('footer_headings_color')) . ';
	}

	.site-footer .search-form .search-field::-ms-input-placeholder,
	.site-prefooter .search-form .search-field::-ms-input-placeholder,
	.site-footer .woocommerce-product-search .search-field::-ms-input-placeholder,
	.site-prefooter .woocommerce-product-search .search-field::-ms-input-placeholder
	{
		color: ' . esc_html(GBT_Opt::getOption('footer_headings_color')) . ';
	}

	.site-footer .search-form .search-field::-webkit-input-placeholder,
	.site-prefooter .search-form .search-field::-webkit-input-placeholder,
	.site-footer .woocommerce-product-search .search-field::-webkit-input-placeholder,
	.site-prefooter .woocommerce-product-search .search-field::-webkit-input-placeholder
	{
		color: ' . esc_html(GBT_Opt::getOption('footer_headings_color')) . ';
	}

	.site-footer .search-form .search-field::-moz-placeholder,
	.site-prefooter .search-form .search-field::-moz-placeholder,
	.site-footer .woocommerce-product-search .search-field::-moz-placeholder,
	.site-prefooter .woocommerce-product-search .search-field::-moz-placeholder
	{
		color: ' . esc_html(GBT_Opt::getOption('footer_headings_color')) . ';
	}

	body.footer-layout-full .site-footer .footer-style-1,
	body.footer-layout-boxed .site-footer .footer-style-1 .footer-content,
	body.footer-layout-full .site-prefooter,
	body.footer-layout-boxed .site-prefooter .prefooter-content,
	.site-prefooter .search-form,
	.site-footer .search-form,
	.site-prefooter .woocommerce-product-search,
	.site-footer .woocommerce-product-search,
	.site-footer .wpml-ls-legacy-dropdown-click ul li.wpml-ls-current-language,
	.site-footer .wpml-ls-legacy-dropdown ul li.wpml-ls-current-language,
	.site-footer .wcml-dropdown ul li.wcml-cs-active-currency,
	.site-footer .wcml-dropdown-click ul li.wcml-cs-active-currency,
	.site-prefooter .wpml-ls-legacy-dropdown-click ul li.wpml-ls-current-language,
	.site-prefooter .wpml-ls-legacy-dropdown ul li.wpml-ls-current-language,
	.site-prefooter .wcml-dropdown ul li.wcml-cs-active-currency,
	.site-prefooter .wcml-dropdown-click ul li.wcml-cs-active-currency,
	.widget select
	{
		border-color: ' . esc_html(GBT_Opt::getOption('footer_ultra_light_gray')) . ';
	}

	.site-footer .widget-area .widget.woocommerce.widget_product_search .search-field:focus,
	.site-footer .widget-area .widget.woocommerce.widget_product_search .search-field:hover
	{
		border-color: ' . esc_html(GBT_Opt::getOption('footer_dark_gray')) . ';
	}

	.site-footer .widget-area .widget_product_search form:before,
	.site-footer .search-form:before,
	.site-prefooter .search-form:before,
	.site-footer .woocommerce-product-search:before,
	.site-prefooter .woocommerce-product-search:before,
	.site-prefooter .wpml-ls-current-language:before,
	.site-prefooter .wcml-cs-active-currency:before,
	.site-footer .wpml-ls-current-language:before,
	.site-footer .wcml-cs-active-currency:before
	{
		background-color: ' . esc_html(GBT_Opt::getOption('footer_dark_gray')) . ';
	}
	
';

?>
