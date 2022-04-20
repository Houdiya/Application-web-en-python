<?php

$custom_code .= '

	.wp-block-file__button,
	.wp-block-cover .wp-block-cover-text,
	.wp-block-button,
	.gbt_18_th_slider_wrapper .gbt_18_th_slide_title,
	.gbt_18_th_slider_wrapper .gbt_18_th_slide_description,
	.gbt_18_th_slider_wrapper .gbt_18_th_slide_button,
	.gbt_18_th_slider_wrapper .swiper-pagination-bullet,
	.wp-block-latest-posts li a,
	.wp-block-calendar, .wp-block-calendar *,
	.wp-block-latest-comments .wp-block-latest-comments__comment-author,
	.wp-block-latest-comments .wp-block-latest-comments__comment-link,
	.wp-block-search .wp-block-search__label,
	.wc-block-grid__product-onsale
	{
		font-family: "' . GBT_Opt::getOption('secondary_font')['font-family'] . '", sans-serif;
	}

	.wc-block-grid__product-onsale
	{
		color: ' . esc_html(GBT_Opt::getOption('content_bg_color')) . '!important;
		background-color: ' . esc_html(GBT_Opt::getOption('accent_color')) . ';
	}

	body .wp-block-woocommerce-attribute-filter ul li input[type=checkbox]:checked
	{
		border-color: ' . esc_html(GBT_Opt::getOption('accent_color')) . ';
		background-color: ' . esc_html(GBT_Opt::getOption('accent_color')) . ';
	}

	.wp-block-button.is-style-outline .wp-block-button__link:hover
	{
		color: ' . esc_html(GBT_Opt::getOption('accent_color')) . '!important;
	}

	.wc-block-product-sort-select:hover,
	.wc-block-pagination .wc-block-pagination-page:hover,
	.wp-block-woocommerce-active-filters .wc-block-active-filters__clear-all:hover
	{
		color: ' . esc_html(GBT_Opt::getOption('accent_color')) . ';
	}

	.wp-block-pullquote blockquote:not(.has-text-color) cite,
	.wp-block-quote cite,
	.wc-block-grid__product-add-to-cart .wp-block-button__link,
	.wp-block-woocommerce-reviews-by-product .wc-block-review-list-item__author,
	.wc-block-product-sort-select,
	.wc-block-pagination .wc-block-pagination-page.wc-block-pagination-page--active,
	.wc-block-attribute-filter .wc-block-attribute-filter-list li label,
	.wp-block-woocommerce-active-filters .wc-block-active-filters__clear-all
	{
		color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . ';
	}

	.wp-block-preformatted,
	.wc-block-attribute-filter .wc-block-attribute-filter-list .wc-block-attribute-filter-list-count
	{
		color: ' . esc_html(GBT_Opt::getOption('primary_color')) . ';
	}

	.wp-block-latest-posts__post-date
	{
		color: ' . esc_html(GBT_Opt::getOption('content_dark_gray')) . ';
	}

	.wp-block-button.is-style-outline .wp-block-button__link:not(.has-background):hover,
	.wp-block-button.is-style-outline .wp-block-button__link:hover
	{
		border-color: ' . esc_html(GBT_Opt::getOption('accent_color')) . ';
	}

	.wp-block-button .wp-block-button__link:hover
	{
		background-color: ' . esc_html(GBT_Opt::getOption('dropdowns_accent_color')) . ';
	}

	@media all and (min-width: 1280px) {
		.blog-sidebar-inactive.content-layout-boxed .alignwide
		{
	        margin-left: calc( (-' . esc_html(GBT_Opt::getOption('site_width')) . 'px + 792px) / 4 );
	    	margin-right: calc( (-' . esc_html(GBT_Opt::getOption('site_width')) . 'px + 792px) / 4 );
		}
	}

	.blog-sidebar-inactive.content-layout-boxed .alignfull
	{
		margin-left: calc( -' . esc_html(GBT_Opt::getOption('site_width')) . 'px / 2 + 100% / 2 );
	    margin-right: calc( -' . esc_html(GBT_Opt::getOption('site_width')) . 'px / 2 + 100% / 2 );
	}

	.wp-block-latest-comments .wp-block-latest-comments__comment-author,
	.wp-block-latest-comments .wp-block-latest-comments__comment-link
	{
		font-size: ' . esc_html(GBT_Opt::getOption('font_size')) . 'px;
	}
';

?>
