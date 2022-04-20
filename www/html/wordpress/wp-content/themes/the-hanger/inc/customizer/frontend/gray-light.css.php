<?php

$custom_code .= '

	.input-group-label,
	fieldset,
	.fieldset,
	hr,
	.comments-area,
	.widget_calendar caption,
	.widget_calendar tfoot tr > td,
	.widget.woocommerce.widget_shopping_cart .total,
	.comments-area .comment-list li.pingback
	{
		border-color: ' . esc_html(GBT_Opt::getOption('content_light_gray')) . ';
	}

	.widget.woocommerce.widget_layered_nav .woocommerce-widget-layered-nav-list .wc-layered-nav-term:not(.chosen) a:hover:before
	{
		background-color: ' . esc_html(GBT_Opt::getOption('content_light_gray')) . ';
	}
';

?>
