<?php

if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {

	//==============================================================================
	// Remove Woocommerce Styles
	//==============================================================================

	if ( ! function_exists('getbowtied_remove_woocommerce_styles') ) :
	function getbowtied_remove_woocommerce_styles() {
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );
	}
	add_action( 'after_setup_theme', 'getbowtied_remove_woocommerce_styles' );
	endif;

	//==============================================================================
	// WooCommerce Cart is empty remove notice class
	//==============================================================================
	remove_action('woocommerce_cart_is_empty', 'wc_empty_cart_message', 10);
	add_action('woocommerce_cart_is_empty', 'thehanger_empty_cart_message', 10);
	 function thehanger_empty_cart_message() {
		echo '<p class="cart-empty">' . wp_kses_post( apply_filters( 'wc_empty_cart_message', __( 'Your cart is currently empty.', 'woocommerce' ) ) ) . '</p>';
	}


	//==============================================================================
    // Breadcrumbs
    //==============================================================================

    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    add_action( 'getbowtied_woocommerce_breadcrumb', 'woocommerce_breadcrumb', 20 );


    //==============================================================================
    // Result Count & Catalog Ordering
    //==============================================================================

    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0 );
    add_action( 'getbowtied_woocommerce_result_count', 'woocommerce_result_count', 20 );
    add_action( 'getbowtied_woocommerce_catalog_ordering', 'woocommerce_catalog_ordering', 30, 0 );


	//==============================================================================
	// Gallery
	//==============================================================================

	add_action( 'after_setup_theme', 'getbowtied_woocommerce_gallery' ); 
	function getbowtied_woocommerce_gallery() {
	    add_theme_support( 'wc-product-gallery-zoom' );
	    add_theme_support( 'wc-product-gallery-lightbox' );
	    add_theme_support( 'wc-product-gallery-slider' );
	}

	//==============================================================================
	// Cart
	//==============================================================================

	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
	add_action( 'woocommerce_after_cart_table', 'woocommerce_cross_sell_display' );


	//==============================================================================
	// Remove Woocommerce Store Notice from Footer
	//==============================================================================


	//==============================================================================
	// Woocommerce Product Out of Stock
	//==============================================================================

	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_stock', 10 );
	function woocommerce_template_loop_stock() {
	    global $product;
	    if ( ! $product->is_in_stock() )
	        echo '<span class="stock out-of-stock">' . esc_html__( 'Out of stock', 'woocommerce' ) . '</span>';
	}


	//==============================================================================
	// Add Wishlist Icon in Product Card
	//==============================================================================
	
	function add_wishlist_icon_in_product_card() {
		if (class_exists('YITH_WCWL')) : 
			global $product;
		?>
		
			<a href="<?php echo YITH_WCWL()->is_product_in_wishlist($product->get_id())? esc_url(YITH_WCWL()->get_wishlist_url()) : esc_url(add_query_arg('add_to_wishlist', $product->get_id())); ?>" 
				data-product-id="<?php echo esc_attr($product->get_id()); ?>" 
				data-product-type="<?php echo esc_attr($product->get_type()); ?>" 
				data-wishlist-url="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" 
				data-browse-wishlist-text="<?php echo esc_attr(get_option('yith_wcwl_browse_wishlist_text')); ?>" 
				class="getbowtied_product_wishlist_button <?php echo YITH_WCWL()->is_product_in_wishlist($product->get_id())? 'clicked added' : 'add_to_wishlist'; ?>" rel="nofollow">
				<span class="tooltip">
					<?php echo YITH_WCWL()->is_product_in_wishlist($product->get_id())? esc_attr(get_option( 'yith_wcwl_browse_wishlist_text' )) : esc_attr(get_option('yith_wcwl_add_to_wishlist_text'));; ?>
				</span>
			</a>			

		<?php
		endif;
	}


	//==============================================================================
	//	Product Quick View
	//==============================================================================

	if ( !function_exists('getbowtied_product_quick_view_fn')):
	add_action( 'wp_ajax_getbowtied_product_quick_view', 'getbowtied_product_quick_view_fn');
	add_action( 'wp_ajax_nopriv_getbowtied_product_quick_view', 'getbowtied_product_quick_view_fn');
	function getbowtied_product_quick_view_fn() {		
		if (!isset( $_REQUEST['product_id'])) {
			die();
		}
		$product_id = intval($_REQUEST['product_id']);
		// wp_query for the product
		wp('p='.$product_id.'&post_type=product');
		global $qv_product_id;
		$qv_product_id = $product_id;
		ob_start();
		get_template_part( 'woocommerce/quick-view' );
		echo ob_get_clean();
		die();
	}	
	endif;


	if ( !function_exists('getbowtied_product_quick_view_button')):
	function getbowtied_product_quick_view_button() {
		global $product, $custom_shop_quick_view;
		echo '
			<a href="#" class="getbowtied_product_quick_view_button" data-product_id="' . $product->get_id() . '" rel="nofollow">
				<span class="tooltip">' . esc_html__( 'Quick View', 'the-hanger') . '</span>
			</a>
		';
	}
	endif;


	//==============================================================================
	// Display Products Bought by user on My Account Dashboard
	//==============================================================================

	if ( ! function_exists('getbowtied_add_products_dashboard')) {
		add_action( 'woocommerce_after_my_account', 'getbowtied_add_products_dashboard');
		function getbowtied_add_products_dashboard() {
			echo do_shortcode('[my_products]');
		}
	}


	//==============================================================================
	// Active Filters Before Shop Loop
	//==============================================================================

	if ( ! function_exists('getbowtied_show_active_filters')) {
		add_action('woocommerce_before_shop_loop', 'getbowtied_show_active_filters');
		function getbowtied_show_active_filters() {
			the_widget('WC_Widget_Layered_Nav_Filters');
		}
	}


	//==============================================================================
	// Remove Single Product Sale from the original place
	//==============================================================================

	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	add_action( 'woocommerce_product_badges', 'woocommerce_show_product_sale_flash', 15 );


	//==============================================================================
	// Remove Tabs from after single product summary
	//==============================================================================

	remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs');

	//==============================================================================
	// woocommerce_before_add_to_cart_button Open Div
	//==============================================================================

	if( ! function_exists('woocommerce_before_add_to_cart_button_open_div') ) :
	add_action( 'woocommerce_before_add_to_cart_button', 'woocommerce_before_add_to_cart_button_open_div', 100 );
	function woocommerce_before_add_to_cart_button_open_div() {
		echo '<div class="add_to_cart_wrapper">';
	}
	endif;

	//==============================================================================
	// woocommerce_after_add_to_cart_button Closing Div
	//==============================================================================

	if( ! function_exists('woocommerce_after_add_to_cart_button_closing_div') ) :
	add_action( 'woocommerce_after_add_to_cart_button', 'woocommerce_after_add_to_cart_button_closing_div', 0 );
	function woocommerce_after_add_to_cart_button_closing_div() {
		echo '</div>';
	}
	endif;


	//==============================================================================
	// Add tabs after add to cart button & right after Wishlist button
	//==============================================================================

	add_filter('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 33);

	//==============================================================================
	//	Custom WooCommerce subcategory images
	//==============================================================================

	if ( ! function_exists('getbowtied_woocommerce_subcategory_thumbnail') ):
	remove_action('woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail');
	add_action('woocommerce_before_subcategory_title', 'getbowtied_woocommerce_subcategory_thumbnail', 10, 1);
	function getbowtied_woocommerce_subcategory_thumbnail( $category ) {

		$thumbnail_id  			= get_term_meta( $category->term_id, 'thumbnail_id', true );

		if ( $thumbnail_id ) {
			$image        = wp_get_attachment_image_src( $thumbnail_id, 'woocommerce_single' );
			$image        = $image[0];
			$image_srcset = function_exists( 'wp_get_attachment_image_srcset' ) ? wp_get_attachment_image_srcset( $thumbnail_id, 'shop_single_image_size' ) : false;
			$image_sizes  = function_exists( 'wp_get_attachment_image_sizes' ) ? wp_get_attachment_image_sizes( $thumbnail_id, 'shop_single_image_size' ) : false;
		} else {
			$image        = wc_placeholder_img_src();
			$image_srcset = $image_sizes = false;
		}

		if ( $image ) {
			// Prevent esc_url from breaking spaces in urls for image embeds
			// Ref: https://core.trac.wordpress.org/ticket/23605
			$image = str_replace( ' ', '%20', $image );

			echo '<span class="getbowtied-subcategory-image" style="background-image :url(' . esc_url( $image ) . ');"></span>';
		}
	}
	endif;


	//==============================================================================
	//	Single Product Modal Button
	//==============================================================================

	if (!function_exists('getbowtied_single_product_gallery_trigger')):
	add_action('product_tool_buttons', 'getbowtied_single_product_gallery_trigger');
	function getbowtied_single_product_gallery_trigger() {
		?>
		  
			<div class="single_product_gallery_trigger"><span class="tooltip"><?php esc_html_e( 'Zoom', 'the-hanger' ); ?></span></div>

		<?php
	}
	endif;


	//==============================================================================
	//	Single Product Video
	//==============================================================================

	if (!function_exists('getbowtied_single_product_video_button')):
	add_action('product_tool_buttons', 'getbowtied_single_product_video_button');
	function getbowtied_single_product_video_button() {
		if (!is_product()) return;
		global $post;

		$post_custom_values 	= get_post_custom( $post->ID );
		$page_product_youtube 	= isset($post_custom_values['page_product_youtube']) ? esc_attr( $post_custom_values['page_product_youtube'][0]) : '';

		if (!empty($page_product_youtube)):
		?>
		  
			<div class="single_product_video_trigger"><span class="tooltip"><?php esc_html_e('Play Video', 'the-hanger'); ?></span></div>

		<?php endif;
	}
	endif;

	if (!function_exists('getbowtied_single_product_video')):
	add_action('wp_footer', 'getbowtied_single_product_video');
	function getbowtied_single_product_video() {
		if (!is_product()) return;
		global $post;

		$post_custom_values 	= get_post_custom( $post->ID );
		$page_product_youtube 	= isset($post_custom_values['page_product_youtube']) ? esc_attr( $post_custom_values['page_product_youtube'][0]) : '';
		$embed_code 			= wp_oembed_get( $page_product_youtube );
		if (!empty($embed_code)):
		?>

			<div class="single_video_overlay"></div>

			<div class="single_video_container">
				<div class="youtube-video">
					<?php echo wp_oembed_get( $page_product_youtube ); ?>
					<span class="close_video_btn"><i class="thehanger-icons-close-dark-larger"></i></span>
				</div>
			</div>

		<?php endif;
	}
	endif;


	//==============================================================================
	//	Continue shopping button on cart page
	//==============================================================================
	
	add_action( 'woocommerce_after_cart_totals', 'add_continue_shopping_button_to_cart' );
	if  ( ! function_exists('add_continue_shopping_button_to_cart') ) :
		function add_continue_shopping_button_to_cart() {
		$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
		if (!empty($shop_page_url)):
			echo '<div class="continue-shopping">';
			echo ' <a href="'.$shop_page_url.'" class="button">'.__('Continue shopping', 'woocommerce').'</a>';
			echo '</div>';
		endif;
	}
	endif;

	//==============================================================================
	//	Wishlist Button Shortcode For QuickView
	//==============================================================================

	function quickview_add_to_wishlist() {
		if (class_exists('YITH_WCWL')):
	    	echo do_shortcode('[yith_wcwl_add_to_wishlist]');
	    endif;
	}

	//==============================================================================
	//	Quick View Go To Product Page
	//==============================================================================

	function quickview_go_to_product_page() {
		echo '<a href="'. get_the_permalink() .'" class="go_to_product_page">' . esc_html__('Go to product page', 'the-hanger') . '</a>';
	}

	//==============================================================================
	//	Cart Page Add custom div anchor for sticky
	//==============================================================================

	add_action( 'woocommerce_after_cart','custom_cart_page_bottom_anchor', 10, 1);
	function custom_cart_page_bottom_anchor($bottom_anchor) {
		echo '<div id="cart_bottom_anchor"></div>';
	}

	//==============================================================================
	//	Cart Page Add custom div anchor for sticky
	//==============================================================================

	add_action( 'woocommerce_after_checkout_form','custom_checkout_page_bottom_anchor', 10, 1);
	function custom_checkout_page_bottom_anchor($bottom_anchor) {
		echo '<div id="checkout_bottom_anchor"></div>';
	}

	//==============================================================================
	//	Woocommerce change default placeholder
	//==============================================================================

	add_action( 'init', 'getbowtied_change_default_woocommerce_placeholder' );
	function getbowtied_change_default_woocommerce_placeholder() {
	  add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');
		function custom_woocommerce_placeholder_img_src( $src ) {
			$src = get_template_directory_uri().'/images/placeholder.png';
			return $src;
		}
	}

	//==============================================================================
	//	Exclude products from default wordpress search
	//==============================================================================
	if ( !function_exists('getbowtied_exclude_products')):
	add_action( 'pre_get_posts', 'getbowtied_exclude_products', 99 );
	function getbowtied_exclude_products() {
		global $wp_post_types;
		if ( post_type_exists( 'product' ) && is_search()) {
			//die('test');
			$wp_post_types['product']->exclude_from_search = true;
		}
	}
	endif;

	//==============================================================================
	//	Ajax search form
	//==============================================================================
	if ( !function_exists('getbowtied_ajax_search_form')):
	add_action( 'getbowtied_ajax_search_form', 'getbowtied_ajax_search_form');
	function getbowtied_ajax_search_form() {

		if( ( 1 == GBT_Opt::getOption('header_search_toggle') && 'style-1' == GBT_Opt::getOption('header_template') ) || ( 1 == GBT_Opt::getOption('simple_header_search_toggle') && 'style-2' == GBT_Opt::getOption('header_template') ) ) :

			ob_start();
			$notsearch = false;

			if (isset($_GET['s']) && isset($_GET['post_type']) && $_GET['post_type']== 'product') {
				$args = array(
					's'						 => sanitize_text_field($_GET['s']),
					'posts_per_page'		 => 4,
					'post_type'				 => 'product',
					'post_status'			 => 'publish',
					'suppress_filters'		 => false,
					'tax_query'				 => array(
		              	array(
							'taxonomy' => 'product_visibility',
							'field'    => 'name',
							'terms'    => 'exclude-from-search',
							'operator' => 'NOT IN',
						)
					)
				);

				if ( isset( $_GET['search_category'] ) && ($_GET['search_category']!= 'all') ) {
			        $args['tax_query'] = array(
				        'relation' => 'AND',
				        array(
					        'taxonomy' => 'product_cat',
					        'field'    => 'slug',
					        'terms'    => sanitize_text_field($_GET['search_category'])
				        )
			        );
		        }
			} else {
				$notsearch = true;

				$meta_query  = WC()->query->get_meta_query();
			    $tax_query   = WC()->query->get_tax_query();
			    $tax_query[] = array(
			        'taxonomy' => 'product_visibility',
			        'field'    => 'name',
			        'terms'    => 'featured',
			        'operator' => 'IN',
			    );

			    $args = array(
			        'post_type'           => 'product',
			        'post_status'         => 'publish',
			        'ignore_sticky_posts' => 1,
			        'posts_per_page'      => 4,
			        'meta_query'          => $meta_query,
			        'tax_query'           => $tax_query,
			    );
			}

		    $featured = get_posts($args);
		    $featured_products= '';
		    

			echo '
				<form class="header_search_form" role="search" method="get" action="' . esc_url( home_url( '/'  ) ) .'">
												
					<div class="header_search_input_wrapper">
						<input
							name="s"
							id="search"
							class="header_search_input" 
							type="search" 
							autocomplete="off" 
							value="' . get_search_query() .'"
							data-min-chars="3"
							placeholder="' . esc_html__( 'Product Search', 'woocommerce' ) . '"
							/>

							<input type="hidden" name="post_type" value="product" />
					</div>';

					if( ( 'style-1' == GBT_Opt::getOption('header_template') && '1' == GBT_Opt::getOption('header_search_by_category') ) || ( 'style-2' == GBT_Opt::getOption('header_template') && '1' == GBT_Opt::getOption('simple_header_search_by_category') ) ) :

						$categories= get_terms( array( 'taxonomy' => 'product_cat','hide_empty' => 0,  'parent' => 0) );

						if( $categories ) {			

							echo '<div class="header_search_select_wrapper">
									<select name="search_category" id="header_search_category" class="header_search_select">
										<option value="all" selected>' . esc_html__( 'Select Category', 'the-hanger' ) . '</option>';

											foreach ($categories as $cat) {
												printf('<option %s value="%s">%s</option>', isset($_GET['search_category']) && $_GET['search_category']== $cat->slug? 'selected' : '', $cat->slug, $cat->name);
											}

							echo '</select>
							</div>';
						}

					endif;

				echo '
					<div class="header_search_button_wrapper">
						<button class="header_search_button" type="submit"></button>
					</div>

					<div class="header_search_ajax_results_wrapper">
						<div class="header_search_ajax_results">';
							if( $featured ) {
								echo '<div class="ajax_results_wrapper">';
									if($notsearch=== true) {
										echo '<span class="product-search-heading">' . esc_html__("Featured products", "woocommerce") . '</span>';
									}
									else {
										echo '<span class="product-search-heading">' . esc_html__("Search suggestions", "the-hanger") . '</span>';
									}
								if (!empty($featured) && is_array($featured)) {
							    	foreach ($featured as $post) {
							    		$_product = wc_get_product( $post );
							    		?>
							    		<div class="product-search-result">
											<a href="<?php echo esc_url($_product->get_permalink()); ?>">
												<div class="product-search-img">
													<?php echo wp_get_attachment_image($_product->get_image_id(), 'thumbnail'); ?>
												</div>
												<div class="product-search-info">
													<span class="product-search-title"><?php echo esc_html($_product->get_name());?></span><br/>
													<?php echo wc_price($_product->get_price()); ?>
												</div>
											</a>
										</div>
										<?php
							    	}
							    }
								echo '</div>';
							}
						echo '</div>
					</div>
				</form>';
			$output = ob_end_flush();

		endif;
	}
	endif;

	//==============================================================================
	//	External Product in new tab
	//==============================================================================
	remove_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
	add_action( 'woocommerce_external_add_to_cart', 'getbowtied_external_add_to_cart', 30 );
	function getbowtied_external_add_to_cart(){

	    global $product;

	    if ( ! $product->add_to_cart_url() ) {
	        return;
	    }

	    $product_url = $product->add_to_cart_url();
	    $button_text = $product->single_add_to_cart_text();

	    do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	    <p class="cart">
	        <a href="<?php echo esc_url( $product_url ); ?>" target="_blank" rel="nofollow" class="single_add_to_cart_button button alt"><?php echo esc_html( $button_text ); ?></a>
	    </p>
	    <?php do_action( 'woocommerce_after_add_to_cart_button' );
	}

	//==============================================================================
	//	0 count for categories in shop archive
	//==============================================================================\
	if (!function_exists('getbowtied_category_title')):
		function getbowtied_category_title( $category ) {
			?>
			<h2 class="woocommerce-loop-category__title">
				<?php
				echo esc_html( $category->name );

				if ( $category->count >= 0 ) {
					echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . esc_html( $category->count ) . ')</mark>', $category ); // WPCS: XSS ok.
				}
				?>
			</h2>
			<?php
		}
		remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
		add_action('woocommerce_shop_loop_subcategory_title', 'getbowtied_category_title', 10, 1);
	endif;

	if ( !function_exists( 'getbowtied_category_large_icons' )):
	add_action( 'getbowtied_category_large_icons', 'getbowtied_category_large_icons');
	/**
	 * Output category items as selected in mega dropdown
	 *
	 *
	 * @return html
	 */
	function getbowtied_category_large_icons() {
		if ( !GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) return;
			$cat_list = GBT_Opt::getOption('nav_button_categories', 0);
			$args= array( 'taxonomy' => 'product_cat','hide_empty' => 0, 'orderby' => 'ASC',  'parent' =>0, 'include' => $cat_list );
	
			$cats = get_terms( $args );
		
			if ( is_array($cat_list)):
			$unsorted = array();
			$sorted   = array();

			foreach ($cats as $v) {
				$unsorted[$v->term_id] = $v;
			}

			foreach ($cat_list as $v) {
				if (isset($unsorted[apply_filters( 'wpml_object_id', $v, 'category', TRUE)]))
					$sorted[] = $unsorted[apply_filters( 'wpml_object_id', $v, 'category', TRUE)];
			}
			else:
				$sorted = $cats;
			endif;

			echo '<div class="megamenu_icon_list">';

			if ( getbowtied_new_products_page_url() !== false ):
				echo '<a href="'.getbowtied_new_products_page_url().'"><i class="thehanger-icons-ui_star"></i><span>'. getbowtied_new_products_title('') .'</span></a>';
			endif;

			if ( getbowtied_sale_page_url() !== false ):
				echo '<a href="'.getbowtied_sale_page_url().'"><i class="thehanger-icons-ecommerce_discount-symbol"></i><span>'. getbowtied_on_sale_products_title('') .'</span></a>';
			endif;

			foreach( $sorted as $cat ) {
				$icon_type = get_term_meta( $cat->term_id, 'getbowtied_icon_type', true );
				if ( $icon_type == 'custom_icon' ) {
					$thumbnail_id 	= get_term_meta( $cat->term_id, 'icon_img_id', true );
					if ($thumbnail_id)
						$icon = wp_get_attachment_thumb_url( $thumbnail_id );
					else
						$icon = wc_placeholder_img_src();
					// Prevent esc_url from breaking spaces in urls for image embeds
					// Ref: https://core.trac.wordpress.org/ticket/23605
					$icon = str_replace( ' ', '%20', $icon );
					echo '<a href="'.esc_url( get_term_link( $cat->term_id ) ).'"><img src="'. $icon .'" /><span>'. $cat->name .'</span></a>';
				} else {
					$icon = get_term_meta( $cat->term_id, 'icon_id', true );
					echo '<a href="'.esc_url( get_term_link( $cat->term_id ) ).'"><i class="'. $icon .'"></i><span>'. $cat->name .'</span></a>';	
				} 
			}
			echo '</div>';
	}
	endif;
}