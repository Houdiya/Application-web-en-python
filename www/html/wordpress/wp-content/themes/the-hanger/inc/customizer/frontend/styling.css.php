<?php

$custom_code .= '

	.site-content-bg-color,
	.site-content,
	body.content-layout-full .site-content-wrapper,
	body.content-layout-boxed .site-content-wrapper > .row,
	ul.products .product .main-container .product_image a .out-of-stock,
	ul.products .product .buttons a:after,
	.single-product .woocommerce-gb_accordion ul.accordion,
	.single-product .woocommerce-gb_accordion ul.accordion .accordion-item .accordion-content,
	.pswp .pswp__bg,
	.single-product .product .before-product-summary-wrapper .product_tool_buttons_placeholder .single_product_gallery_trigger:after,
	.single-product .product .before-product-summary-wrapper .product_tool_buttons_placeholder .single_product_video_trigger:after,
	.woocommerce-archive-header.is-stuck .woocommerce-archive-header-inside,
	.site-shop-filters,
	.select2-dropdown,
	.blog.content-layout-boxed .blog_highlighted_posts_container,
	.blog.content-layout-boxed .site-content-wrapper .archive-header > .row,
	.archive.content-layout-boxed .site-content-wrapper .archive-header > .row,
	.blog.content-layout-boxed .getbowtied_popular_posts_container .popular_posts_columns,
	.single-post.content-layout-boxed .single_navigation_container .single_navigation,
	.single-post.content-layout-boxed .single_related_post_container .single_related_posts,
	.single-post.content-layout-boxed .single-comments-container .single-comments-row,
	.search.content-layout-boxed .archive-title-wrapper,
	.site-content-wrapper .wpml-ls-legacy-dropdown-click li,
	.site-content-wrapper .wpml-ls-legacy-dropdown li,
	.site-content-wrapper .wcml-dropdown-click li,
	.site-content-wrapper .wcml-dropdown li,
	.site-content-wrapper li.wpml-ls-current-language > a,
	.site-content-wrapper li.wcml-cs-active-currency > a,
	.page .single-comments-container > .row
	{
		background-color: ' . esc_html(GBT_Opt::getOption('content_bg_color')) . ';
	}


	.onsale,
	.product:not(.product-type-grouped) .cart .quantity,
	.tooltip,
	.getbowtied_new_product,
	ul.products .product .main-container .second-container .buttons .button.added:after,
	ul.products .product .main-container .second-container .buttons a.clicked:after,
	.woocommerce-cart .cart-collaterals .cart_totals table.shop_table tr.shipping .woocommerce-shipping-calculator .shipping-calculator-form p:not(.form-row) .button:hover,
	.woocommerce-store-notice,
	.site-content .wpml-ls-sub-menu li:hover a,
	.site-content .wcml-cs-submenu li:hover a,
	.site-content .wpml-ls-sub-menu li a:hover,
	.site-content .wcml-cs-submenu li:hover a:hover:not(.button):not(.remove):not(.remove):not(.restore-item):not(.wpml-ls-link):not(.wcml-cs-item-toggle):not(.wpml-ls-item-toggle),
	.site-content .wpml-ls-sub-menu li:hover a:hover,
	.site-content .wcml-cs-submenu li:hover a:hover,
	.site-content-wrapper .select2-container .select2-results__option.select2-results__option--highlighted[aria-selected],
	ul.products .product .main-container .second-container .buttons > a.loading::before,
	ul.products .product .main-container .second-container .buttons .button.added:hover::after
	{
		color: ' . esc_html(GBT_Opt::getOption('content_bg_color')) . '!important;
	}

	.widget.woocommerce.widget_layered_nav_filters ul a:hover,
	body.single .post .entry-meta__item--tags a:hover
	{
		color: ' . esc_html(GBT_Opt::getOption('content_bg_color')) . '!important;
	}

	.blockUI
	{
		background-color: ' . esc_html(GBT_Opt::getOption('content_bg_color')) . '!important;
	}

	.site-primary-color,
	.site-content,
	ul.products .product .main-container .second-container .product_info a.title .woocommerce-loop-product__title,
	ul.products .product .main-container .second-container .buttons > a:after,
	body.woocommerce-cart .site-content .woocommerce .woocommerce-cart-form tr.cart_item .product-name a,
	body.woocommerce-checkout.woocommerce-order-received .woocommerce-order .woocommerce-order-details .woocommerce-table--order-details tr td.product-name a,
	.products_ajax_button.disabled,
	.posts_ajax_button.disabled,
	body.single .nav-links__item,
	.woocommerce-pagination li a.page-numbers,
	.blog-listing .blog-articles .post .entry-content-wrap .entry-meta time,
	.select2-dropdown,
	.woocommerce p.stars.selected a.active~a:before,
	.woocommerce-wishlist form#yith-wcwl-form table.wishlist_table td.product-name a,
	.site-content-wrapper .wcml-cs-submenu li a:not(.button):not(.wpml-ls-link):not([class^="star-"]):not(.showcoupon):not(.showlogin):not(.shipping-calculator-button):not(.remove):not(.page-numbers),
	.site-content-wrapper .wpml-ls-sub-menu li a,
	.header-mobiles-wrapper .header-mobiles-content .header-mobiles-info-2,
	body .wp-block-woocommerce-active-filters ul li,
	.wc-block-active-filters .wc-block-active-filters-list button,
	.wc-block-grid__product-title,
	.wc-block-grid__product-price__value *
	{
		color: ' . esc_html(GBT_Opt::getOption('primary_color')) . ';
	}

	.woocommerce-breadcrumb > a,
	ul.products.shop_display_list .product .main-container .product_image a,
	ul.products.shop_display_list .product .main-container .product_image a .out-of-stock,
	.widget.woocommerce.widget_layered_nav_filters ul a,
	body.single .post .entry-meta__item--tags a,
	body.single .post .entry-content .page-links > a,
	.woocommerce p.stars a:hover~a:before,
	.wp-block-calendar #next a, .wp-block-calendar #prev a,
	h2.wc-block-grid__product-title a
	{
		color: ' . esc_html(GBT_Opt::getOption('primary_color')) . '!important;
	}

	.site-secondary-color,
	h1, h2, h3, h4, h5, h6,
	table th,
	dl dt,
	blockquote,
	label,
	.site-content a:not(.wp-block-button__link):not(.button):not(.wpml-ls-link):not([class^="star-"]):not(.vc_btn3):not(.showcoupon):not(.showlogin):not(.shipping-calculator-button):not(.remove):not(.page-numbers),
	.woocommerce .wc-tabs a,
	.widget_calendar table td#today,
	.products_ajax_button,
	.posts_ajax_button,
	.woocommerce-pagination li span.page-numbers.current,
	body.single .post .entry-content .page-links > span,
	.widget_theme_ecommerce_info .ecommerce-info-widget-icon,
	.attachment .site-content .nav-links a,
	.widget.woocommerce.widget_product_categories_with_icon .product-categories-with-icon > li > a,
	.error404 section.error-404 .page-header .page-title,
	.woocommerce .after-cart-empty-title,
	.woocommerce.woocommerce-wishlist .wishlist_table tr td.product-stock-status .wishlist-in-stock,
	.woocommerce.woocommerce-wishlist .wishlist_table tr td.product-remove,
	.woocommerce.woocommerce-wishlist .wishlist_table tr td.product-remove div a:before,
	.woocommerce.woocommerce-wishlist .wishlist_table tr td.wishlist-empty,
	.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a,
	.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li:before,
	.woocommerce-orders .woocommerce-orders-table.shop_table_responsive tr td::before,
	.woocommerce-account .woocommerce-orders-table tbody tr td.woocommerce-orders-table__cell-order-actions .button,
	.woocommerce-account .woocommerce .woocommerce-MyAccount-content .woocommerce-pagination--without-numbers .woocommerce-button,
	.woocommerce-account .woocommerce-MyAccount-downloads tbody tr td.download-file a:before,
	.woocommerce-account .woocommerce-MyAccount-downloads tbody tr td.download-file a,
	.woocommerce-account.woocommerce-view-order .woocommerce-MyAccount-content p mark,
	.woocommerce-account.woocommerce-view-order .woocommerce-MyAccount-content .woocommerce-order-details .order_details tr td a + strong,
	.woocommerce-account.woocommerce-view-order .woocommerce-MyAccount-content .woocommerce-order-details .order_details tfoot tr td .amount,
	.woocommerce-account.woocommerce-view-order .woocommerce-MyAccount-content .woocommerce-order-details .order_details tfoot tr td .tax_label,
	.woocommerce-account.woocommerce-edit-account .edit-account fieldset legend,
	.woocommerce-account.woocommerce-edit-address .addresses .woocommerce-Address .woocommerce-Address-title .edit:before,
	.woocommerce-account.woocommerce-edit-address .addresses .woocommerce-Address .woocommerce-Address-title .edit,
	.product .entry-summary .yith-wcwl-add-to-wishlist .yith-wcwl-add-button.show .add_to_wishlist,
	.product .entry-summary .getbowtied-single-product-share,
	.product .entry-summary .woocommerce-Reviews .commentlist .comment_container .comment-text p.meta .woocommerce-review__author,
	.product .entry-summary  #review_form_wrapper #review_form .comment-reply-title,
	.product.product-type-grouped .cart .quantity input,
	.products_ajax_loader,
	.comments-area .comment-list .comment article.comment-body .comment-meta .comment-author b.fn,
	.comments-area .comment-list .comment article.comment-body .reply > a,
	.comments-area .comment-list .comment article.comment-body + .comment-respond .comment-reply-title small a,
	.comments-area .comment-list .comment article.comment-body .comment-meta .comment-metadata .edit-link .comment-edit-link,
	.comments-area .comments-pagination .nav-links .page-numbers,
	.widget.woocommerce.widget_product_categories_with_icon .product-categories-with-icon > li > ul.children li.current-cat,
	.entry-summary .price ins,
	.entry-summary .price,
	.entry-summary .woocommerce-grouped-product-list-item__price,
	.product.product-type-grouped td a.button:before,
	.product .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show .feedback,
	.product .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse.show .feedback,
	.woocommerce-gb_accordion ul.accordion .accordion-item .accordion-title,
	body.woocommerce-cart .woocommerce .cart-empty,
	.pswp button.pswp__button.pswp__button:before,
	.pswp button.pswp__button.pswp__button:after,
	.gb-gallery button.gb-gallery-btn:before,
	.gb-gallery button.gb-gallery-btn:after,
	body.woocommerce-cart.woocommerce-page .woocommerce .woocommerce-cart-form .cart_item .product-quantity .quantity input,
	body.woocommerce-cart.woocommerce-page .woocommerce .woocommerce-cart-form .cart_item .product-remove a.remove:after,
	body.woocommerce-cart .cart-collaterals .cart-subtotal td,
	body.woocommerce-cart .cart-collaterals .cart_totals tr.shipping .woocommerce-shipping-calculator .shipping-calculator-form p:not(.form-row) .button,
	body.woocommerce-cart .cart-collaterals .order-total td,
	body.woocommerce-checkout .woocommerce .woocommerce-info,
	body.woocommerce-cart.woocommerce-page .woocommerce .woocommerce-cart-form tr:not(.cart_item) td.actions .coupon .input-container:after,
	body.woocommerce-cart.woocommerce-page .woocommerce .woocommerce-cart-form tr.cart_item .product-remove a.remove:after,
	body.woocommerce-checkout .woocommerce table.woocommerce-checkout-review-order-table tr th,
	body.woocommerce-checkout .woocommerce table.woocommerce-checkout-review-order-table tr.cart_item td > strong,
	body.woocommerce-checkout .woocommerce table.woocommerce-checkout-review-order-table tr.order-total td,
	body.woocommerce-checkout .woocommerce table.woocommerce-checkout-review-order-table tr.cart-subtotal td .amount,
	body.woocommerce-checkout .woocommerce .woocommerce-checkout-payment .payment_methods label,
	body.woocommerce-cart .continue-shopping a,
	body.woocommerce-checkout.woocommerce-order-received .woocommerce-order .woocommerce-order-overview li strong,
	body.woocommerce-checkout.woocommerce-order-received .woocommerce-order .woocommerce-bacs-bank-details .wc-bacs-bank-details li strong,
	body.woocommerce-checkout.woocommerce-order-received .woocommerce-order .woocommerce-order-details .woocommerce-table--order-details tfoot tr td .amount,
	body.woocommerce-checkout.woocommerce-order-received .woocommerce-order .woocommerce-order-details .woocommerce-table--order-details tr td.product-name strong,
	body.woocommerce-cart .woocommerce .woocommerce-cart-form tr:not(.cart_item) td.actions button[name="update_cart"],
	body.woocommerce-cart .woocommerce .woocommerce-cart-form tr:not(.cart_item) td.actions .coupon .button,
	body.woocommerce-checkout .woocommerce .checkout_coupon p.form-row-last .button,
	#getbowtied_woocommerce_quickview .close-button,
	#getbowtied_woocommerce_quickview .getbowtied_qv_content .site-content .product .go_to_product_page,
	.woocommerce-account .woocommerce-table--order-downloads tbody tr td.download-file a.button,
	.woocommerce-account tr td .wc-item-meta li,
	.single-product .single_video_container .close_video_btn > i,
	.woocommerce-account .woocommerce-Payment ul.payment_methods li label,
	ul.woocommerce-mini-cart li.mini_cart_item .variation p,
	ul.woocommerce-mini-cart li.mini_cart_item .variation,
	ul.woocommerce-mini-cart li.mini_cart_item span.quantity,
	body.single .post .entry-meta_post_comments,
	body.single .post .entry-meta__item--tags,
	body.single .nav-links__item span,
	.archive-header .archive-title-wrapper ul li a,
	.getbowtied_popular_posts a,
	.blog_highlighted_posts_right a,
	.blog_highlighted_posts article .entry-content-wrap .entry-header .entry-meta > a,
	.blog_highlighted_posts article .entry-content-wrap .entry-header .entry-title  a,
	.blog_highlighted_posts article .entry-content-wrap .entry-content__readmore,
	body.single .post .entry-meta__item.entry-meta-author,
	.getbowtied_qv_loading,
	.product.product-type-grouped .group_table tr td a.product_type_external:before,
	.product.product-type-grouped .group_table tr td a.product_type_simple:before,
	.product.product-type-grouped .group_table tr td a.product_type_variable:before,
	.site-content-wrapper .search-form .search-field,
	.site-content-wrapper .woocommerce-product-search .search-field,
	.site-content-wrapper .widget_calendar table thead th,
	.site-content-wrapper .widget_calendar caption,
	#getbowtied_woocommerce_quickview .getbowtied_qv_content .site-content .product .yith-wcwl-add-to-wishlist .yith-wcwl-add-button .add_to_wishlist,
	body.single-product .variations .label,
	.getbowtied_qv_content .variations .label
	{
		color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . ';
	}

	.getbowtied-single-product-share-wrapper a svg
	{
		fill: ' . esc_html(GBT_Opt::getOption('secondary_color')) . ';
	}

	.getbowtied-single-product-share-wrapper a:hover svg
	{
		fill: ' . esc_html(GBT_Opt::getOption('accent_color')) . ';
	}

	.site-content-wrapper .search-form .search-field::-ms-input-placeholder,
	.site-content-wrapper .woocommerce-product-search .search-field::-ms-input-placeholder
	{
		color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . ';
	}

	.site-content-wrapper .search-form .search-field::-webkit-input-placeholder,
	.site-content-wrapper .woocommerce-product-search .search-field::-webkit-input-placeholder
	{
		color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . ';
	}

	.site-content-wrapper .search-form .search-field::-moz-placeholder,
	.site-content-wrapper .woocommerce-product-search .search-field::-moz-placeholder
	{
		color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . ';
	}

	.site-content-wrapper .wcml-cs-active-currency .wcml-cs-item-toggle:hover,
	.site-content-wrapper .wpml-ls-current-language .wpml-ls-item-toggle:hover,
	.comments-area .comment-list .pingback a,
	.product_infos .add_to_wishlist
	{
		color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . '!important;
	}

	.product:not(.product-type-grouped) .cart .quantity,
	.getbowtied_new_product,
	body.woocommerce-checkout .woocommerce .checkout_coupon p.form-row:before,
	body.woocommerce-cart .woocommerce .woocommerce-cart-form tr:not(.cart_item) td.actions .coupon:before,
	body.woocommerce-cart .cart-collaterals .cart_totals table.shop_table tr.shipping .woocommerce-shipping-calculator .shipping-calculator-form p:not(.form-row) .button:hover,
	body.single .post .entry-meta__item--tags a:hover,
	.archive-header .archive-title-wrapper ul li a:after,
	.archive-header .archive-title-wrapper ul li.current-cat a:after,
	.woocommerce-store-notice,
	.widget_calendar table td#today:after,
	.wp-block-woocommerce-active-filters ul.wc-block-active-filters-list li:hover
	{
		background-color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . ';
	}

	.header_search_form:before,
	.header-content .search-form:before,
	.select2:before,
	.woocommerce-product-search:before
	{
		background-color: ' . esc_html(GBT_Opt::getOption('header_font_color')) . ';
	}

	.woocommerce-wishlist .wishlist_table tr td.product-stock-status .wishlist-in-stock,
	.comments-area .comment-list .comment.byuser img.avatar,
	body.woocommerce-cart .cart-collaterals .cart_totals tr.shipping .woocommerce-shipping-calculator .shipping-calculator-form p:not(.form-row) .button
	{
		border-color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . ';
	}

	.products_ajax_button.loading:before,
	.posts_ajax_button.loading:before,
	body.woocommerce-cart .woocommerce .woocommerce-cart-form.processing .blockUI:before,
	body.woocommerce-cart .woocommerce .cart_totals.calculated_shipping.processing .blockUI:before,
	body.woocommerce-checkout .woocommerce table.woocommerce-checkout-review-order-table .blockUI:before,
	body.woocommerce-checkout .woocommerce .woocommerce-checkout-payment .blockUI.blockOverlay:before,
	.megamenu_posts_overlay:before,
	.site-header .header-content .header-line-1 .header-line-1-wrapper .header-search .header_search_form .header_search_button_wrapper .header_search_button.loading::before
	{
		border-top-color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . ';
	}

	.site-accent-color,
	ul.products .product .main-container .second-container .product_info .star-rating span:before,
	.wc-block-grid__product-rating .wc-block-grid__product-rating__stars span:before,
	.wc-block-grid .wc-block-grid__products .wc-block-grid__product .wc-block-grid__product-rating .star-rating span:before,
	.product .entry-summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show .feedback:before,
	.product.product-type-grouped .group_table tr td a.product_type_external:hover:before,
	.product.product-type-grouped .group_table tr td a.product_type_simple:hover:before,
	.product.product-type-grouped .group_table tr td a.product_type_variable:hover:before,
	body.woocommerce-shop .woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filters-button:hover,
	body.woocommerce-shop .woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filters-button.active,
	body.woocommerce-shop .woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .woocommerce-ordering .select2:hover,
	body.woocommerce-shop .woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .woocommerce-ordering .select2.select2-container--open,
	ul.products .product .main-container .second-container .product_info a.title .woocommerce-loop-product__title:hover,
	.woocommerce .star-rating span:before,
	.getbowtied_qv_content .star-rating span:before,
	.wc-block-grid .wc-block-grid__products .wc-block-grid__product .wc-block-grid__product-rating .star-rating span:before,
	body.woocommerce-cart .cart-collaterals .cart_totals table.shop_table tr.shipping .woocommerce-shipping-calculator > p .shipping-calculator-button,
	body.woocommerce-checkout .woocommerce .woocommerce-checkout-payment .payment_methods .wc_payment_method.payment_method_paypal label a,
	body.woocommerce-cart .continue-shopping a:hover,
	.products_ajax_button:not(.disabled):hover,
	.posts_ajax_button:not(.disabled):hover,
	body.woocommerce-checkout .woocommerce .checkout_coupon p.form-row-last .button:hover,
	body.woocommerce-cart .woocommerce .woocommerce-cart-form tr:not(.cart_item) td.actions .coupon .button:hover,
	.woocommerce-account .woocommerce-table--order-downloads tbody tr td.download-file a.button:hover,
	.single-product .single_video_container .close_video_btn:hover i,
	.single-product .product .before-product-summary-wrapper .product_tool_buttons_placeholder .single_product_gallery_trigger:hover:after,
	.single-product .product .before-product-summary-wrapper .product_tool_buttons_placeholder .single_product_video_trigger:hover:after,
	.blog_highlighted_posts article .entry-content-wrap .entry-header .entry-title  a:hover,
	.blog_highlighted_posts article .entry-content-wrap .entry-content__readmore:hover,
	.getbowtied_popular_posts a:hover,
	.comments-area .comment-list .comment article.comment-body .comment-meta .comment-metadata .edit-link .comment-edit-link:hover,
	.comments-area .comment-list .comment article.comment-body .reply > a:hover,
	body.single .single_related_post_container .single_related_posts .related-post .related_post_content .related_post_title:hover,
	.woocommerce p.stars.selected a.active:before,
	.woocommerce p.stars.selected a:not(.active):before,
	body.woocommerce-shop .categories-list .product-category .woocommerce-loop-category__title:hover,
	.woocommerce-account #customer_login.col2-set .u-column1.col-1 .woocommerce-form-login .woocommerce-LostPassword a,
	.gbt-stack-gallery .gbt-stack-nav a:hover
	.comments-area .comment-list .comment article.comment-body+.comment-respond .comment-reply-title small a:hover,
	.comments-area .comments-pagination .nav-links a:hover,
	.comments-area .comment-respond .comment-form .logged-in-as>a:hover,
	.comments-area .comment-list .comment article.comment-body .comment-meta .comment-author a:hover,
	.comments-area .comment-list .comment article.comment-body .comment-meta .comment-metadata a:hover,
	.wc-block-grid__product-title:hover,
	.wc-block-grid__product-add-to-cart .wp-block-button__link:hover,
	.wp-block-woocommerce-active-filters ul.wc-block-active-filters-list li:hover,
	.wp-block-woocommerce-active-filters ul.wc-block-active-filters-list li:hover button,
	#getbowtied_woocommerce_quickview .getbowtied_qv_content .site-content .product .yith-wcwl-add-to-wishlist .yith-wcwl-add-button .add_to_wishlist:hover
	{
		color: ' . esc_html(GBT_Opt::getOption('accent_color')) . ';
	}

	ul.products .product .getbowtied_product_quick_view_button:hover::after,
	ul.products .product .button:not(.added):hover:after,
	ul.products .product a:not(.clicked):hover:after,
	ul.products .product .yith-wcwl-add-to-wishlist:hover:after,
	.site-content a:hover:not(.wp-block-button__link):not(.button):not(.wp-block-file__button):not(.remove):not(.slide-button):not(.gbt_custom_link):not(.vc_btn3):not(.restore-item):not(.wpml-ls-link):not(.wcml-cs-item-toggle):not(.wpml-ls-item-toggle),
	body.woocommerce-checkout .woocommerce .lost_password,
	body.woocommerce-checkout .woocommerce .lost_password a,
	body.woocommerce-checkout .woocommerce .woocommerce-info a,
	.woocommerce-terms-and-conditions-link,
	body.single .post .entry-meta__item.entry-meta-author a:not(.author-all-posts):hover,
	body.single .single_navigation_container a:hover > span,
	.woocommerce p.stars:hover a:before,
	ul.products .product .main-container .second-container .buttons a.loading.clicked:hover::after,
	ul.products .product .main-container .second-container .buttons > a.loading:after,
	.comments-area .comment-list .pingback a:hover,
	.comments-area .comment-list .pingback .edit-link .comment-edit-link:hover
	{
		color: ' . esc_html(GBT_Opt::getOption('accent_color')) . '!important;
	}

	blockquote,
	.widget.woocommerce.widget_layered_nav .woocommerce-widget-layered-nav-list .wc-layered-nav-term.chosen a:before
	{
		border-color: ' . esc_html(GBT_Opt::getOption('accent_color')) . ';
	}

	body:not(.rtl) ul.products:not(.shop_display_list) .product .second-container .buttons .button .tooltip:after,
	body:not(.rtl) ul.products:not(.shop_display_list) .product .second-container .buttons .getbowtied_product_wishlist_button .tooltip:after,
	body:not(.rtl) ul.products:not(.shop_display_list) .product .second-container .buttons .getbowtied_product_quick_view_button .tooltip:after,
	body:not(.rtl) .single-product .product .before-product-summary-wrapper .product_tool_buttons_placeholder .single_product_video_trigger .tooltip:after,
	body:not(.rtl) .single-product .product .before-product-summary-wrapper .product_tool_buttons_placeholder .single_product_gallery_trigger .tooltip:after

	{
		border-left-color: ' . esc_html(GBT_Opt::getOption('accent_color')) . ';
	}

	body.rtl ul.products:not(.shop_display_list) .product .second-container .buttons .button .tooltip:after,
	body.rtl ul.products:not(.shop_display_list) .product .second-container .buttons .getbowtied_product_wishlist_button .tooltip:after,
	body.rtl ul.products:not(.shop_display_list) .product .second-container .buttons .getbowtied_product_quick_view_button .tooltip:after,
	body.rtl .single-product .product .before-product-summary-wrapper .product_tool_buttons_placeholder .single_product_video_trigger .tooltip:after,
	body.rtl .single-product .product .before-product-summary-wrapper .product_tool_buttons_placeholder .single_product_gallery_trigger .tooltip:after

	{
		border-right-color: ' . esc_html(GBT_Opt::getOption('accent_color')) . ';
	}

	.single-product .product.product-type-grouped .group_table tr td a.product_type_external .tooltip:after,
	.single-product .product.product-type-grouped .group_table tr td a.product_type_simple .tooltip:after,
	.single-product .product.product-type-grouped .group_table tr td a.product_type_variable .tooltip:after,
	ul.products.shop_display_list .product .main-container .second-container .buttons > a .tooltip:after,
	#getbowtied_woocommerce_quickview .getbowtied_qv_content .site-content .product.product-type-grouped .group_table tr td a.product_type_external .tooltip:after,
	#getbowtied_woocommerce_quickview .getbowtied_qv_content .site-content .product.product-type-grouped .group_table tr td a.product_type_simple .tooltip:after,
	#getbowtied_woocommerce_quickview .getbowtied_qv_content .site-content .product.product-type-grouped .group_table tr td a.product_type_variable .tooltip:after
	{
		border-top-color: ' . esc_html(GBT_Opt::getOption('accent_color')) . ';
	}

	.onsale,
	.tooltip,
	ul.products .product .main-container .second-container .buttons .button.added:after,
	ul.products .product .main-container .second-container .buttons a.clicked:after,
	ul.products .product .main-container .second-container .buttons > a.loading::before,
	.select2-container .select2-results__option.select2-results__option--highlighted[aria-selected],
	.wpml-ls-sub-menu li:hover,
	.wcml-cs-submenu li:hover,
	.site-content-wrapper .wpml-ls-sub-menu li:hover,
	.site-content-wrapper .wcml-cs-submenu li:hover,
	.site-prefooter .wpml-ls-sub-menu li:hover,
	.site-prefooter .wcml-cs-submenu li:hover,
	.site-footer .wpml-ls-sub-menu li:hover,
	.site-footer .wcml-cs-submenu li:hover,
	.widget.woocommerce.widget_layered_nav .woocommerce-widget-layered-nav-list .wc-layered-nav-term.chosen a:before
	{
		background-color: ' . esc_html(GBT_Opt::getOption('accent_color')) . ';
	}

	.site-content .archive-header .archive-title-wrapper ul li.cat-item a:hover
	{
		color: ' . esc_html(GBT_Opt::getOption('secondary_color')) . '!important;
	}

	.site-content .woocommerce > .woocommerce-error li a:hover:not(.button):not(.wpml-ls-link):not([class^="star-"]):not(.showcoupon):not(.showlogin):not(.shipping-calculator-button):not(.remove):not(.page-numbers)
	{
		color: #fff !important;
	}
';

?>
