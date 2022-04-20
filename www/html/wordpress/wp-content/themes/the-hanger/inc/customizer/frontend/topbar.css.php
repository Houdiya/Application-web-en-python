<?php

$custom_code .= '

	.topbar
	{
		color: ' . esc_html(GBT_Opt::getOption('topbar_font_color')) . ';
		font-size: ' . esc_html(GBT_Opt::getOption('topbar_font_size') . "px") . ';
	}

	.topbar .topbar-socials .th_social_icon a svg
	{
		fill: ' . esc_html(GBT_Opt::getOption('topbar_font_color')) . ';
	}

	.topbar .topbar-socials .th_social_icon a:hover svg
	{
		fill: ' . esc_html(GBT_Opt::getOption('topbar_accent_color')) . ';
	}

	body.header-layout-full .topbar,
	.topbar .topbar-content
	{
		background-color: ' . esc_html(GBT_Opt::getOption('topbar_bg_color')) . ';
	}

	.topbar a:hover
	{
		color: ' . esc_html(GBT_Opt::getOption('topbar_accent_color')) . ';
	}

	.topbar .navigation-foundation > ul > li > a > span:before
	{
		background-color: ' . esc_html(GBT_Opt::getOption('topbar_font_color')) . ';
	}

	body.header-layout-full .topbar:after,
	body.header-layout-boxed .topbar .topbar-content
	{
		border-color: ' . esc_html(GBT_Opt::getOption('topbar_ultra_light_gray')) . ';
	}
';

?>