<?php

$custom_code .= '

	.header-mobiles-wrapper
	{
		font-size: ' . esc_html(GBT_Opt::getOption('header_font_size')) . 'px;
	}

	.mobile-header-style-1.header-mobiles-wrapper .header-mobiles,
	.mobile-header-style-1.header-mobiles-wrapper .header-mobiles-search-content,
	.mobile-header-style-1.header-mobiles-wrapper .header-mobiles-search-content .search-form,
	.mobile-header-style-1.header-mobiles-wrapper .header-mobiles-search-content .woocommerce-product-search
	{
		color: ' . esc_html(GBT_Opt::getOption('header_font_color')) . ';
		background-color: ' . esc_html(GBT_Opt::getOption('header_background_color')) . ';
		border-color: ' . esc_html(GBT_Opt::getOption('header_ultra_light_gray')) . ';
	}

	.mobile-header-style-2.header-mobiles-wrapper .header-mobiles,
	.mobile-header-style-2.header-mobiles-wrapper .header-mobiles-search-content,
	.mobile-header-style-2.header-mobiles-wrapper .header-mobiles-search-content .search-form,
	.mobile-header-style-2.header-mobiles-wrapper .header-mobiles-search-content .woocommerce-product-search
	{
		color: ' . esc_html(GBT_Opt::getOption('simple_header_font_color')) . ';
		background-color: ' . esc_html(GBT_Opt::getOption('simple_header_background_color')) . ';
		border-color: ' . esc_html(GBT_Opt::getOption('simple_header_ultra_light_gray')) . ';
	}

	.mobile-header-style-1.header-mobiles-wrapper .header-mobiles .header-mobiles-tools ul.header-tools li > a .tools_badge
	{
		color: ' . esc_html(GBT_Opt::getOption('header_background_color')) . ';
		background-color: ' . esc_html(GBT_Opt::getOption('header_accent_color')) . ';
	}

	.mobile-header-style-2.header-mobiles-wrapper .header-mobiles .header-mobiles-tools ul.header-tools li > a .tools_badge
	{
		color: ' . esc_html(GBT_Opt::getOption('simple_header_background_color')) . ';
		background-color: ' . esc_html(GBT_Opt::getOption('simple_header_accent_color')) . ';
	}

	.mobile-header-style-1.header-mobiles-wrapper .header-mobiles a:hover
	{
		color: ' . esc_html(GBT_Opt::getOption('header_accent_color')) . ';
	}

	.mobile-header-style-2.header-mobiles-wrapper .header-mobiles a:hover
	{
		color: ' . esc_html(GBT_Opt::getOption('simple_header_accent_color')) . ';
	}

	.header-mobiles-wrapper .header-mobiles .site-logo img
	{
		max-width: ' . esc_html(GBT_Opt::getOption('header_logo_width')) . 'px;
	}

';

?>