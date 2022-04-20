<?php

$custom_code .= '

	.custom-dark-gray,
	.woocommerce-breadcrumb a,
	.woocommerce.woocommerce-wishlist .wishlist_table tr td.product-stock-status .wishlist-out-of-stock,
	.single-product .entry-summary .stock,
	.single-product .product .single_product_tabs ul.tabs .tab .tab_content .shop_attributes tr td,
	body.single .single_related_post_container .single_related_posts .related-post .related_post_content .date
	{
		color: ' . esc_html(GBT_Opt::getOption('content_dark_gray')) . ';
	}

	.site-content-wrapper .search-form:before,
	.site-content-wrapper .woocommerce-product-search:before,
	.site-content-wrapper .wpml-ls-legacy-dropdown-click ul li.wpml-ls-current-language:before,
	.site-content-wrapper .wpml-ls-legacy-dropdown ul li.wpml-ls-current-language:before,
	.site-content-wrapper .wcml-dropdown ul li.wcml-cs-active-currency:before,
	.site-content-wrapper .wcml-dropdown-click ul li.wcml-cs-active-currency:before
	{
		background-color: ' . esc_html(GBT_Opt::getOption('content_dark_gray')) . ';
	}
';

?>