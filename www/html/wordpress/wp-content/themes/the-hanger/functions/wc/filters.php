<?php

if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {



	//==============================================================================
	// Remove relative URLs for WooCommerce product images
	//==============================================================================

	add_filter( 'woocommerce_product_get_image', function( $url, $product, $size, $attr, $placeholder, $image ) {
		return $image;
	}, 10, 6 );
	

	//==============================================================================
	// Show Woocommerce Cart Widget Everywhere
	//==============================================================================

	if ( ! function_exists('getbowtied_woocommerce_widget_cart_everywhere') ) :
	function getbowtied_woocommerce_widget_cart_everywhere() { 
	    return false; 
	}
	add_filter( 'woocommerce_widget_cart_is_hidden', 'getbowtied_woocommerce_widget_cart_everywhere', 10, 1 );
	endif;

	
	//==============================================================================
	// WooCommerce Cross Sell Columns
	//==============================================================================	

	if ( ! function_exists('getbowtied_cross_sells_columns') ) :
	function getbowtied_cross_sells_columns( $columns ) {
		return 4;
	}
	add_filter( 'woocommerce_cross_sells_columns', 'getbowtied_cross_sells_columns' );
	endif;


	//==============================================================================
	// WooCommerce Number of Related Products
	//==============================================================================

	if ( ! function_exists('woocommerce_output_related_products') ) :
	function woocommerce_output_related_products() {
		$atts = array(
			'posts_per_page' => '4',
			'columns' 		 => '4',
			'orderby'        => 'rand'
		);
		woocommerce_related_products($atts);
	}
	endif;


	//==============================================================================
	// WooCommerce Product Carousel Options
	//==============================================================================

	if ( ! function_exists('getbowtied_woocommerce_single_product_carousel_options') ) :
	function getbowtied_woocommerce_single_product_carousel_options( $array ) { 
	    
	    $options = array(
			'rtl'            => is_rtl(),
			'animation'      => 'slide',
			'smoothHeight'   => true,
			'directionNav'   => false,
			'controlNav'     => 'thumbnails',
			'slideshow'      => false,
			'animationSpeed' => 300,
			'animationLoop'  => false,
		);
	    
	    return $options; 
	}
	add_filter( 'woocommerce_single_product_carousel_options', 'getbowtied_woocommerce_single_product_carousel_options', 10, 1 );
	endif;


	//==============================================================================
	// WooCommerce Post Count Filter
	//==============================================================================

	if ( ! function_exists('getbowtied_wc_categories_postcount_filter') ) :
	function getbowtied_wc_categories_postcount_filter($variable) {
		$variable = str_replace('<span class="count">(', '<span class="count">', $variable);
		$variable = str_replace(')</span>', '</span>', $variable);
		return $variable;
	}
	add_filter('wp_list_categories','getbowtied_wc_categories_postcount_filter');
	endif;


	//==============================================================================
	// WooCommerce Layered Nav Filter
	//==============================================================================

	if ( ! function_exists('getbowtied_layered_nav_filter') ) :
	function getbowtied_layered_nav_filter($variable) {
		$variable = str_replace('(', '', $variable);
		$variable = str_replace(')', '', $variable);
		return $variable;
	}
	add_filter( 'woocommerce_layered_nav_count', 'getbowtied_layered_nav_filter' );
	endif;


	//==============================================================================
	// WooCommerce Rating Count Filter
	//==============================================================================

	if ( ! function_exists('getbowtied_rating_filter_count') ) :
	function getbowtied_rating_filter_count($variable) {
		$variable = str_replace('(', '', $variable);
		$variable = str_replace(')', '', $variable);
		return $variable;
	}
	add_filter( 'woocommerce_rating_filter_count', 'getbowtied_rating_filter_count' );
	endif;


	//==============================================================================
	// WooCommerce Remove Description Title
	//==============================================================================

	function getbowtied_product_description_heading() {
	    echo "";
	}
	add_filter( 'woocommerce_product_description_heading', 'getbowtied_product_description_heading' );


	//==============================================================================
	// WooCommerce Remove Additional Information Title
	//==============================================================================
	
	function getbowtied_product_additional_information_heading() {
	    echo "";
	}
	add_filter( 'woocommerce_product_additional_information_heading', 'getbowtied_product_additional_information_heading' );


	//==============================================================================
	// WooCommerce Breadcrumb
	//==============================================================================

	if ( ! function_exists('getbowtied_custom_breadcrumb') ) :
	function getbowtied_custom_breadcrumb($defaults) {
		$defaults['delimiter'] = '<span class="delimiter">/</span>';
		$defaults['wrap_before'] = '<nav class="woocommerce-breadcrumb">';
		return $defaults;
	}
	add_filter( 'woocommerce_breadcrumb_defaults', 'getbowtied_custom_breadcrumb' );
	endif;


	//==============================================================================
	// WooCommerce Categories Product Count
	//==============================================================================
	
	if ( ! function_exists('getbowtied_categories_count') ) :
	add_filter( 'woocommerce_subcategory_count_html', 'getbowtied_categories_count');
	function getbowtied_categories_count( $count ) {
		$count = str_replace( '(', '', $count);
		$count = str_replace( ')', '', $count);
		return $count;
	}
	endif;


	//==============================================================================
	// Display Empty Subcategories
	//==============================================================================

	add_filter( 'woocommerce_product_subcategories_hide_empty', 'hide_empty_categories', 10, 1 );
	function hide_empty_categories ( $show_empty ) {
	    $hide_empty  =  FALSE;
	}


	//==============================================================================
	//	WooCommerce after cart empty products
	//==============================================================================

	if ( !function_exists('getbowtied_cart_is_empty') ) :
	add_filter( 'woocommerce_cart_is_empty','getbowtied_cart_is_empty');
	function getbowtied_cart_is_empty() {
		echo '<span class="after-cart-empty-title">'. esc_html__('You might like these', 'the-hanger') . '</span>';
		echo do_shortcode('[featured_products per_page="6" columns="6"]');
	}
	endif;


	//==============================================================================
	//	WooCommerce change number of orders per page
	//==============================================================================

	if ( !function_exists('getbowtied_filter_woocommerce_my_account_my_orders_query') ) :
	add_filter( 'woocommerce_my_account_my_orders_query', 'getbowtied_filter_woocommerce_my_account_my_orders_query', 10, 1 ); 
	function getbowtied_filter_woocommerce_my_account_my_orders_query( $array ) { 
	    $array['numberposts'] = 10;
	    return $array; 
	}; 
	endif;


	//==============================================================================
	//	New products badge
	//==============================================================================

	if ( !function_exists('getbowtied_new_product_badge') ) :
	add_filter( 'woocommerce_product_badges', 'getbowtied_new_product_badge');
	function getbowtied_new_product_badge() {
		static $latest_products;

		if ( GBT_Opt::getOption('new_products_number_type') == 'day' && GBT_Opt::getOption('new_products_page') === true && !empty(GBT_Opt::getOption('new_products_badge_text')) && !empty(GBT_Opt::getOption('new_products_number'))) {
			$postdate 		= get_the_time( 'Y-m-d' );			// Post date
			$postdatestamp 	= strtotime( $postdate );
			$new_interval 	= GBT_Opt::getOption('new_products_number');

			if ( ( time() - ( 60 * 60 * 24 * $new_interval ) ) < $postdatestamp ) { // If the product was published within the newness time frame display the new badge
				echo '<span class="getbowtied_new_product">' . sprintf(esc_html__( '%s', 'the-hanger' ), GBT_Opt::getOption('new_products_badge_text')) . '</span>';
			}
		}

		if ( GBT_Opt::getOption('new_products_number_type') == 'last_added' && GBT_Opt::getOption('new_products_page') === true && !empty(GBT_Opt::getOption('new_products_badge_text')) && !empty(GBT_Opt::getOption('new_products_number_last'))) {
			$thisID = get_the_ID();
			if (!(isset($latest_products) && is_array($latest_products))) :
				$args = array(
					'post_type' => 'product',
					'posts_per_page' => GBT_Opt::getOption('new_products_number_last'),
					'order'			=> 'DESC',
					'orderby'		=> 'date'
				);
				$l = new WP_Query( $args );
				// wp_reset_postdata();
				$latest_products = array();
				foreach ( $l->posts AS $lp ) {
					$latest_products[] = $lp->ID;
				}
				// set_transient('getbowtied_latest_products', $latest_products);
			endif;

			if (isset($latest_products) && is_array($latest_products) && in_array($thisID, $latest_products))
				echo '<span class="getbowtied_new_product">' . sprintf(esc_html__( '%s', 'the-hanger' ), GBT_Opt::getOption('new_products_badge_text')) . '</span>';
		}
	}
	endif;


	//==============================================================================
	//	Sale products badge
	//==============================================================================

	if ( !function_exists( 'getbowtied_sale_products_badge') ) :
	add_filter('woocommerce_sale_flash', 'getbowtied_sale_products_badge', 10, 3);
	function getbowtied_sale_products_badge($text, $post, $_product)
	{
		if (!empty(GBT_Opt::getOption('sale_page_badge_text')) && !empty(GBT_Opt::getOption('sale_page_badge_text'))) {
	    	return '<span class="onsale">' . sprintf(esc_html__('%s', 'the-hanger'), GBT_Opt::getOption('sale_page_badge_text')) . '</span>';
		}
	}
	endif;
	

	//==============================================================================
	//	Single Product - Number of Thumbnails
	//==============================================================================

	add_filter( 'woocommerce_single_product_image_gallery_classes', 'getbowtied_columns_product_gallery_thumbs' ); 
	function getbowtied_columns_product_gallery_thumbs( $wrapper_classes ) {
		$columns = 6; // change this to 2, 3, 5, etc. Default is 4.
		$wrapper_classes[2] = 'woocommerce-product-gallery--columns-' . absint( $columns );
		return $wrapper_classes;
	}

	//==============================================================================
	//	Enable Youtube JS API 
	//==============================================================================

	if ( !function_exists( 'getbowtied_enable_youtube_js_api') ) :
	add_filter( 'oembed_result', 'getbowtied_enable_youtube_js_api', 10, 3 );
	function getbowtied_enable_youtube_js_api( $html, $url, $args ) {
	 
		if ( strstr( $html,'youtube.com/embed/' ) ) {
			$html = str_replace( '?feature=oembed', '?feature=oembed&enablejsapi=1&rel=0&showinfo=0&color=white', $html );
		}
		
	    return $html;
	}
	endif;

	//==============================================================================
	//	Woocommerce Single Product Default Photoswipe Lightbox Options
	//==============================================================================

	add_filter( 'woocommerce_single_product_photoswipe_options', function( $options ) {
		$options['showHideOpacity'] = true;
		$options['showAnimationDuration'] = true;
		$options['hideAnimationDuration'] = true;
		return $options;
	}, 10 );
	
	
	//==============================================================================
	//	Update Cart Items Number
	//==============================================================================

	if ( !function_exists( 'getbowtied_shopping_bag_items_number') ) :
	add_filter('woocommerce_add_to_cart_fragments', 'getbowtied_shopping_bag_items_number');
	function getbowtied_shopping_bag_items_number($fragments) {
		ob_start(); ?>
        
        <div class="tools_badge shopping_bag_items_number animate"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></div>

		<?php
		$fragments['.shopping_bag_items_number'] = ob_get_clean();
		return $fragments;
	}
	endif;
}
