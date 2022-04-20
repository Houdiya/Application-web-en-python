<?php

$custom_code .= '

	[type="text"]:focus,
	[type="password"]:focus,
	[type="date"]:focus,
	[type="datetime"]:focus,
	[type="datetime-local"]:focus,
	[type="month"]:focus,
	[type="week"]:focus,
	[type="email"]:focus,
	[type="number"]:focus,
	[type="search"]:focus,
	[type="tel"]:focus,
	[type="time"]:focus,
	[type="url"]:focus,
	[type="color"]:focus,
	textarea:focus,
	select:focus
	{
		box-shadow: 0 0 5px ' . esc_html(GBT_Opt::getOption('content_ultra_light_gray')) . ';
		background-color: ' . esc_html(GBT_Opt::getOption('content_ultra_light_gray')) . ';
	}

	[type="text"],
	[type="password"],
	[type="date"],
	[type="datetime"],
	[type="datetime-local"],
	[type="month"],
	[type="week"],
	[type="email"],
	[type="number"],
	[type="search"],
	[type="tel"],
	[type="time"],
	[type="url"],
	[type="color"],
	textarea,
	select,
	.select2 .select2-selection,
	.select2-dropdown,
	table tr,
	table thead tr:first-child td,
	table thead tr:first-child th,
	.site-shop-filters .widget-area.on-screen,
	.products .product .button:after,
	.products .product .getbowtied_product_wishlist_button:after,
	.products .product .getbowtied_product_quick_view_button:after,
	.single-product .woocommerce-gb_accordion ul.accordion .accordion-item,
	.single-product .product .getbowtied-single-product-share-wrapper a,
	.products .product .woocommerce-LoopProduct-link,
	.woocommerce.woocommerce-wishlist .wishlist_table tbody tr td,
	.comments-area .comment-list .comment article.comment-body + .comment-respond,
	body.page.content-layout-full .single-comments-container,
	body.page.content-layout-boxed .single-comments-container > .row,
	.single-product .product .before-product-summary-wrapper .product_tool_buttons_placeholder .single_product_gallery_trigger:after,
	.single-product .product .before-product-summary-wrapper .product_tool_buttons_placeholder .single_product_video_trigger:after,
	body.woocommerce-shop .site-shop-filters .site-shop-filters-inside,
	.blog-listing .blog-articles article:nth-child(4n+1).has-post-thumbnail,
	.getbowtied_popular_posts_container,
	.content-layout-full .blog-listing,
	.content-layout-boxed .blog-listing .site-content,
	.blog-listing .posts-navigation,
	.gbt-stack-nav a,
	body:not(.search-results) .blog-listing .blog-articles article:nth-child(4n+1).has-post-thumbnail,
	.single-product .product.product-type-variable .variations_form .variations td.value .select2,
	.site-content-wrapper .search-form,
	.site-content-wrapper .woocommerce-product-search,
	.content-layout-full .archive-header,
	.content-layout-boxed .archive-header .archive-header-inner,
	body.content-layout-full .blog_highlighted_posts,
	body.content-layout-boxed .blog_highlighted_posts .blog_highlighted_posts_container,
	body.content-layout-full .getbowtied_popular_posts_container,
	body.content-layout-boxed .getbowtied_popular_posts_container .popular_posts_columns,
	.site-content-wrapper .wpml-ls-legacy-dropdown-click ul li.wpml-ls-current-language,
	.site-content-wrapper .wpml-ls-legacy-dropdown ul li.wpml-ls-current-language,
	.site-content-wrapper .wcml-dropdown ul li.wcml-cs-active-currency,
	.site-content-wrapper .wcml-dropdown-click ul li.wcml-cs-active-currency,
	.woocommerce.woocommerce-wishlist .wishlist_table li
	{
		border-color: ' . esc_html(GBT_Opt::getOption('content_ultra_light_gray')) . ';
	}

	body.woocommerce-shop .woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools,
	body.single .single_navigation_container .nav-previous,
	body.woocommerce-shop .woocommerce-archive-header .woocommerce-archive-header-inside
	{
		border-top-color: ' . esc_html(GBT_Opt::getOption('content_ultra_light_gray')) . ';
		border-bottom-color: ' . esc_html(GBT_Opt::getOption('content_ultra_light_gray')) . ';
	}

	.select2.select2-container--open.select2-container--above .select2-selection.select2_no_border,
	.blog.content-layout-full .getbowtied_popular_posts_container
	.blog.content-layout-full .blog-listing,
	.blog.content-layout-boxed .blog-listing .site-content,
	body.single.content-layout-full .single_related_post_container,
	body.single.content-layout-boxed .single_related_post_container .single_related_posts,
	body.single.content-layout-full .single_navigation_container,
	body.single.content-layout-boxed .single_navigation_container .single_navigation,
	body.single.content-layout-full .single-comments-container,
	body.single.content-layout-boxed .single-comments-container .single-comments-row,
	body.single.content-layout-full .single_navigation_container .nav-next,
	body.single.content-layout-boxed .single_navigation_container .nav-next
	{
		border-top-color: ' . esc_html(GBT_Opt::getOption('content_ultra_light_gray')) . ';
	}

	ul.products .product .main-container .second-container .product_info,
	body.attachment .site-content .entry-header .entry-title,
	.widget.woocommerce.widget_product_categories_with_icon .product-categories-with-icon > li,
	.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li,
	body.woocommerce-cart.woocommerce-page .woocommerce .woocommerce-cart-form .cart_item,
	body.woocommerce-cart.woocommerce-page .woocommerce .woocommerce-cart-form .cart_item .product-quantity .quantity input,
	body.woocommerce-cart.woocommerce-page .woocommerce .woocommerce-cart-form tr:not(.cart_item) td.actions .coupon #coupon_code,
	body.woocommerce-checkout .woocommerce .woocommerce-checkout-payment .payment_methods .wc_payment_method,
	body.woocommerce-checkout.woocommerce-order-received .woocommerce-order .woocommerce-notice,
	body.woocommerce-checkout.woocommerce-order-received .woocommerce-order p,
	body.single .post .entry-meta,
	.select2.select2-container--open.select2-container--below .select2-selection.select2_no_border,
	ul.products.shop_display_list .product,
	.woocommerce-account .woocommerce-Payment ul.payment_methods .woocommerce-PaymentMethod
	{
		border-bottom-color: ' . esc_html(GBT_Opt::getOption('content_ultra_light_gray')) . '!important;
	}

	body.woocommerce-shop .woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filters-button,
	body.woocommerce-shop .woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .woocommerce-ordering,
	body.woocommerce-shop .woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .shop-tools .shop-display-grid,
	body.single .single_post_header .entry-categories ul.post-categories li
	{
		border-right-color: ' . esc_html(GBT_Opt::getOption('content_ultra_light_gray')) . ';
	}

	body.rtl.single .single_post_header .entry-categories ul.post-categories li
	{
		border-left-color: ' . esc_html(GBT_Opt::getOption('content_ultra_light_gray')) . ';
	}

	pre,
	single-product .product.product-type-grouped td a.button,
	.widget-area .widget_tag_cloud .tagcloud a,
	.widget-area .widget_product_tag_cloud .tagcloud a,
	.widget_layered_nav_filters ul .chosen a,
	.widget-area .widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content,
	body.single .post .entry-meta__item--tags a,
	.select2-container .select2-dropdown .select2-search .select2-search__field,
	.select2-container .select2-results__option[aria-selected=true],
	.select2-container .select2-results__option[data-selected=true],
	.getbowtied_popular_posts li.popular-post .sticky_post_image,
	.single-product .product.product-type-grouped .group_table tr td a.product_type_external,
	.single-product .product.product-type-grouped .group_table tr td a.product_type_simple,
	.single-product .product.product-type-grouped .group_table tr td a.product_type_variable,
	#getbowtied_woocommerce_quickview .getbowtied_qv_content .site-content .product.product-type-grouped .group_table tr td a.product_type_external,
	#getbowtied_woocommerce_quickview .getbowtied_qv_content .site-content .product.product-type-grouped .group_table tr td a.product_type_simple,
	#getbowtied_woocommerce_quickview .getbowtied_qv_content .site-content .product.product-type-grouped .group_table tr td a.product_type_variable,
	.wp-block-woocommerce-active-filters ul li
	{
		background-color:  ' . esc_html(GBT_Opt::getOption('content_ultra_light_gray')) . ';
	}
';

?>
