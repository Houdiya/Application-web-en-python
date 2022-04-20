<?php


if ( ! function_exists( 'getbowtied_query_vars' ) ) :
	add_action( 'parse_query', 'getbowtied_query_vars' );
	/**
	 * Parse Wordpress query and look for on-sale page or new products page, add actions accordingly
	 *
	 * @return [type] [description]
	 */
	function getbowtied_query_vars() {
		if ( get_query_var( GBT_Opt::getOption('sale_page_slug') ) === '1' ) :
			add_action( 'woocommerce_product_query', 'getbowtied_on_sale_products_query' );
			add_filter( 'woocommerce_page_title', 'getbowtied_on_sale_products_title' );
			add_filter( 'woocommerce_layered_nav_link', 'getbowtied_onsale_filter_woocommerce_layered_nav_link', 10, 3 ); 
			add_filter( 'woocommerce_get_filtered_term_product_counts_query', 'getbowtied_onsale_filter_woocommerce_get_filtered_term_product_counts_query', 10, 1 );
		endif;

		if ( get_query_var( GBT_Opt::getOption('new_products_page_slug') ) === '1' ) :
			add_action( 'woocommerce_product_query', 'getbowtied_new_products_query' );
			add_filter( 'woocommerce_page_title', 'getbowtied_new_products_title' );
			add_filter( 'woocommerce_layered_nav_link', 'getbowtied_new_products_filter_woocommerce_layered_nav_link', 10, 3 ); 
			add_filter( 'woocommerce_get_filtered_term_product_counts_query', 'getbowtied_new_products_filter_woocommerce_get_filtered_term_product_counts_query', 10, 1 );
		endif;
	}
endif;

if ( ! function_exists( 'getbowtied_on_sale_products_query' ) ) :
	/**
	 * Modify the archive query to display on-sale products
	 *
	 * @param  object $q products query
	 */
	function getbowtied_on_sale_products_query( $q ) {
		$product_ids_on_sale = wc_get_product_ids_on_sale();
		$product_ids_on_sale= empty($product_ids_on_sale)? array(0) : $product_ids_on_sale;
		$q->set( 'post__in', (array)$product_ids_on_sale );
	}
endif;

if ( ! function_exists( 'getbowtied_on_sale_products_title' ) ) :
	/**
	 * Modify the on-sale archive title
	 *
	 * @param  string $page_title Page title
	 */
	function getbowtied_on_sale_products_title( $page_title ) {

		$page_title = empty( GBT_Opt::getOption('sale_page_title') ) ? $page_title : GBT_Opt::getOption('sale_page_title');

		return $page_title;
	}
endif;

if ( ! function_exists( 'getbowtied_new_products_query' ) ) :
	/**
	 * Modify the archive query to display on-sale products
	 *
	 * @param  object $q products query
	 */
	function getbowtied_new_products_query( $q ) {
		if ( GBT_Opt::getOption('new_products_number_type') == 'day' ):
			$q->set( 'orderby', 'date' );
			$q->set( 'order', 'DESC' );
			$q->set('date_query', array('after' => GBT_Opt::getOption('new_products_number').' days ago'));
			$q->set( 'no_found_rows', true);
			$per_page = 999;
		elseif ( GBT_Opt::getOption('new_products_number_type') == 'last_added'):
			$q->set( 'orderby', 'date' );
			$q->set( 'order', 'DESC' );
			$q->set( 'no_found_rows', true);
			$per_page = empty(GBT_Opt::getOption('new_products_number_last')) ? '8' : GBT_Opt::getOption('new_products_number_last');
			// $q->set( 'posts_per_page', $per_page );
		endif;

		$q->set( 'posts_per_page', $per_page );
	}
endif;

if ( ! function_exists( 'getbowtied_new_products_title' ) ) :
	/**
	 * Modify the on-sale archive title
	 *
	 * @param  string $page_title Page title
	 */
	function getbowtied_new_products_title( $page_title ) {

		$page_title = empty( GBT_Opt::getOption('new_products_page_title') ) ? $page_title : GBT_Opt::getOption('new_products_page_title');

		return $page_title;
	}
endif;

if ( ! function_exists( 'getbowtied_sale_page_url' )):
	/**
	 * Returns sale page URL or false if it's not active
	 *
	 * @return false|string
	 */
	function getbowtied_sale_page_url() {
		if ( (GBT_Opt::getOption('sale_page') === true) && ! empty( GBT_Opt::getOption('sale_page_slug') ) ) :
			$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );

			if (substr($shop_page_url, -1) == "/") {
				$shop_page_url .= '?'. GBT_Opt::getOption('sale_page_slug') .'=1';
			} else {
		   		$shop_page_url .= '&'. GBT_Opt::getOption('sale_page_slug') .'=1';
		   	}

			return $shop_page_url;
		else:
			return false;
		endif;
	}
endif;

if ( ! function_exists( 'getbowtied_new_products_page_url' )):
	/**
	 * Returns sale page URL or false if it's not active
	 *
	 * @return false|string
	 */
	function getbowtied_new_products_page_url() {
		if ( (GBT_Opt::getOption('new_products_page') === true) && ! empty( GBT_Opt::getOption('new_products_page_slug') ) ) :
			$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );

			if (substr($shop_page_url, -1) == "/") {
				$shop_page_url .= '?'. GBT_Opt::getOption('new_products_page_slug') .'=1';
			} else {
		   		$shop_page_url .= '&'. GBT_Opt::getOption('new_products_page_slug') .'=1';
		   	}

			return $shop_page_url;
		else:
			return false;
		endif;
	}
endif;


if ( ! function_exists( 'getbowtied_onsale_filter_woocommerce_layered_nav_link' )):
	/**
	 * Append the "on-sale" query argument if we're on the on-sale archive
	 *
	 * @param   $link     
	 * @param   $term     
	 * @param   $taxonomy 
	 *
	 * @return $link          
	 */
	function getbowtied_onsale_filter_woocommerce_layered_nav_link( $link, $term, $taxonomy ) { 
		if (substr($link, -1) == "/") {
			$link .= '?' . GBT_Opt::getOption('sale_page_slug') .'=1';
		} else {
	   		$link .= '&' . GBT_Opt::getOption('sale_page_slug') .'=1';
	   	}
	    return $link;
	}; 
endif;


if ( ! function_exists( 'getbowtied_onsale_filter_woocommerce_get_filtered_term_product_counts_query' )):
	/**
	 * Modify the filter counts on onsale archive page
	 *
	 * @param  $query
	 *
	 * @return $query
	 */
	function getbowtied_onsale_filter_woocommerce_get_filtered_term_product_counts_query( $query ) {
		global $wpdb;

	    $product_ids_on_sale = wc_get_product_ids_on_sale();
	    $product_ids_on_sale= empty($product_ids_on_sale)? '0' : implode(',',$product_ids_on_sale);
	    $query['where'] .= "AND {$wpdb->posts}.ID IN (" . $product_ids_on_sale .")";

	    return $query;
	}; 
endif;

if ( ! function_exists( 'getbowtied_new_products_filter_woocommerce_layered_nav_link' )):
	/**
	 * Append the "new-products" query argument if we're on the new-products archive
	 *
	 * @param   $link     
	 * @param   $term     
	 * @param   $taxonomy 
	 *
	 * @return $link          
	 */
	function getbowtied_new_products_filter_woocommerce_layered_nav_link( $link, $term, $taxonomy ) { 
		if (substr($link, -1) == "/") {
			$link .= '?' . GBT_Opt::getOption('new_products_page_slug') .'=1';
		} else {
	   		$link .= '&' . GBT_Opt::getOption('new_products_page_slug') .'=1';
	   	}
	    return $link;
	}; 
endif;


if ( ! function_exists( 'getbowtied_new_products_filter_woocommerce_get_filtered_term_product_counts_query' )):
	/**
	 * Modify the filter counts on new products archive page
	 *
	 * @param  $query
	 *
	 * @return $query
	 */
	function getbowtied_new_products_filter_woocommerce_get_filtered_term_product_counts_query( $query ) {
		global $wpdb;

		if ( GBT_Opt::getOption('new_products_number_type') == 'day' ):
			$query['where'] .= " AND post_date > '" . date('Y-m-d', strtotime('-'.GBT_Opt::getOption('new_products_number').' days')) . "'";
		elseif ( GBT_Opt::getOption('new_products_number_type') == 'last_added' ):
			$query['limit'] .= "LIMIT ". GBT_Opt::getOption('new_products_number_last');
		endif;
	}; 
endif;

if (! function_exists( 'getbowtied_count_new_products')):
	/**
	 * Get number of "new" products
	 *
	 * @return int
	 */
	function getbowtied_count_new_products() {
		if ( GBT_Opt::getOption('new_products_number_type') == 'day' ):
			$args = array(	
				'post_type' => 'product', 
				'posts_per_page' => 999, 
				'date_query' => array('after' => GBT_Opt::getOption('new_products_number').' days ago') 
			);
		elseif( GBT_Opt::getOption('new_products_number_type') == 'last_added' ):
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => GBT_Opt::getOption('new_products_number_last'),
				'order'			=> 'DESC',
				'orderby'		=> 'date'
			);
		endif;
		$l = new WP_Query( $args );
		wp_reset_postdata();
		return $l->post_count;
	}
endif;       
 
if (! function_exists( 'getbowtied_count_sale_products')):
	/**
	 * Get number of sale products
	 *
	 * @return int
	 */
	function getbowtied_count_sale_products() {
		$product_ids_on_sale = wc_get_product_ids_on_sale();
		$product_ids_on_sale= empty($product_ids_on_sale)? array(0) : $product_ids_on_sale;
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 999,
			'post__in' => $product_ids_on_sale,
			'tax_query' => array(
			    array(
			        'taxonomy' => 'product_visibility',
			        'field'    => 'name',
			        'terms'    => 'exclude-from-catalog',
			        'operator' => 'NOT IN',
			    ),
			),
		);
		
		$l = new WP_Query( $args );
		wp_reset_postdata();
		return $l->post_count;
	}
endif;  

if (! function_exists( 'getbowtied_count_categories' )):
	/**
	 * Category count - get_term seems to return incorrect count?
	 *
	 * @return int
	 */
	function getbowtied_count_category() {
		global $wp_query;
		$cat_id = get_queried_object_id();

		$cs = get_terms('product_cat');
		$cC = false;

		if (!empty($cs) && is_array($cs)) {
			foreach ($cs as $c) {
				if ($c->term_id == $cat_id)
					$cC = $c;
			}
		}

		if (!empty($cC)) return $cC->count;

		return false;
	}
endif;

if (! function_exists( 'getbowtied_is_custom_archive')):
	/**
	 * Returns true on on-sale or new products archives
	 *
	 * @return bool
	 */
	function getbowtied_is_custom_archive() {
		return ( (get_query_var( GBT_Opt::getOption('new_products_page_slug') ) === '1') || (get_query_var( GBT_Opt::getOption('sale_page_slug') ) === '1') );
	}
endif;

