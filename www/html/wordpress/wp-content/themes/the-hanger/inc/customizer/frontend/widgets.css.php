<?php

$custom_code .= '

	.widget-area .widget_tag_cloud .tagcloud a:hover,
	.widget-area .widget_product_tag_cloud .tagcloud a:hover,
	.widget_layered_nav_filters ul .chosen a:hover
	{
		color: ' . esc_html(GBT_Opt::getOption('content_bg_color')) . ';
		background-color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . ';
	}

	.widget.woocommerce.widget_price_filter .ui-slider .ui-slider-range
	{
		background-color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . ';
	}

	.site-content-wrapper .calendar_wrap
	{
		background-color: ' . esc_html(GBT_Opt::getOption('content_ultra_light_gray')) . ';
	}

	.widget.woocommerce.widget_price_filter .ui-slider .ui-slider-handle
	{
		background-color: ' . esc_html(GBT_Opt::getOption('content_bg_color')) . ';
		border-color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . ';
	}

	.widget.woocommerce.widget_price_filter .price_slider_amount .button
	{
		color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . ';
	}

	.widget.woocommerce.widget_rating_filter .wc-layered-nav-rating:not(.chosen):hover:before,
	.widget.woocommerce.widget_rating_filter .wc-layered-nav-rating:not(.chosen):hover:after,
	.widget.woocommerce.widget_layered_nav .wc-layered-nav-term:not(.chosen):hover:before,
	.widget.woocommerce.widget_layered_nav .wc-layered-nav-term:not(.chosen):hover:after
	{
		background-color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . ';
	}

	.widget.woocommerce.widget_rating_filter .wc-layered-nav-rating:before,
	.widget.woocommerce.widget_rating_filter .wc-layered-nav-rating:after,
	.widget.woocommerce.widget_layered_nav .wc-layered-nav-term:before,
	.widget.woocommerce.widget_layered_nav .wc-layered-nav-term:after
	{
		border-color: ' . esc_html(GBT_Opt::getOption('primary_color')) . ';
	}

	.widget.woocommerce.widget_rating_filter .wc-layered-nav-rating .star-rating
	{
		color: ' . esc_html(GBT_Opt::getOption('primary_color')) . ';
	}

	.widget.woocommerce.widget_shopping_cart ul.woocommerce-mini-cart::-webkit-scrollbar-thumb
	{
		background-color: ' . esc_html(GBT_Opt::getOption('content_dark_gray')) . ';
	}

	.widget.woocommerce.widget_shopping_cart ul.woocommerce-mini-cart::-webkit-scrollbar-track,
	.widget.woocommerce.widget_shopping_cart ul.woocommerce-mini-cart::-webkit-scrollbar
	{
		background-color: ' . esc_html(GBT_Opt::getOption('content_ultra_light_gray')) . ';
	}

	.widget.woocommerce.widget_layered_nav .woocommerce-widget-layered-nav-list.add_scroll::-webkit-scrollbar-track,
	.widget.woocommerce.widget_layered_nav .woocommerce-widget-layered-nav-list.add_scroll::-webkit-scrollbar
	{
		background-color: ' . esc_html(GBT_Opt::getOption('content_ultra_light_gray')) . ';
	}

	.widget.woocommerce.widget_layered_nav .woocommerce-widget-layered-nav-list.add_scroll::-webkit-scrollbar-thumb
	{
		background-color: ' . esc_html(GBT_Opt::getOption('primary_color')) . ';
	}
';

?>