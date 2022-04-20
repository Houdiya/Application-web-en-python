<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class GBT_Ajax_Search {


	function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'getbowtied_js_scripts' ) );
		add_action( 'pre_get_posts', array( $this, 'getbowtied_search_in_category' ), 10 );

		// Search results ajax action
		add_action( 'wp_ajax_' . 'getbowtied_ajax_search', array( $this, 'getbowtied_get_search_results' ) );
		add_action( 'wp_ajax_nopriv_' . 'getbowtied_ajax_search', array( $this, 'getbowtied_get_search_results' ) );
	}

	/*
	 * Register scripts.
	 */
	public function getbowtied_js_scripts() {


	}

	/*
	 * Get search results via ajax
	 */

	public function getbowtied_get_search_results() {
		global $woocommerce;

		$output	 = array();
		$results = array();
		$keyword = sanitize_text_field( $_GET[ 'search_keyword' ] );
		$category= sanitize_text_field( $_GET[ 'search_category' ] );

		if( !isset($category) || empty($category) ) {
			$category = 'all';
		}

		$args = array(
			's'						 => $keyword,
			'posts_per_page'		 => 4,
			'post_type'				 => 'product',
			'post_status'			 => 'publish',
			// 'ignore_sticky_posts'	 => 1,
			// 'orderby'				 => 'title',
			// 'order'					 => 'asc',
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

		if ( isset( $category ) && ($category != 'all') ) {
	        $args['tax_query'] = array(
		        'relation' => 'AND',
		        array(
			        'taxonomy' => 'product_cat',
			        'field'    => 'slug',
			        'terms'    => $category
		        )
	        );
        }

		$args = apply_filters('search_products_args', $args);

		$products = get_posts( $args );

		$ids = '';

		if ( !empty( $products ) ) {

			foreach ( $products as $post ) {

				$_product = wc_get_product( $post );
				$ids .= $_product->get_id() . ',';

				$output['suggestions'] .= '<div class="product-search-result">
									<a href="'.$_product->get_permalink().'">
										<div class="product-search-img">
											'.wp_get_attachment_image($_product->get_image_id(), 'thumbnail').'
										</div>
										<div class="product-search-info">
											<span class="product-search-title">'.$_product->get_name().'</span><br/>'
											.wc_price($_product->get_price()) .'
										</div>
									</a>
								</div>';
			}
			if (count($products) == 4) {
				$output['suggestions'].= '<a class="view-all" href="#"><i class="thehanger-icons-arrow-right"></i>' . esc_html__('View All', 'the-hanger') . '</a>';
			}
			wp_reset_postdata();

		} else {
			$output['suggestions'] =  '<div class="search-no-suggestions"><span class="search-st">' . esc_html__('No results', 'the-hanger') . '</span></div>';
		}

		$output['suggestions'] = '<span class="product-search-heading">' . esc_html__("Search Suggestions", "the-hanger") . '</span>' . $output['suggestions'];

		echo json_encode( $output );
		die();
	}

	/*
	 * Search only in products titles
	 *
	 * @param string $search SQL
	 *
	 * @return string prepared SQL
	 */

	function getbowtied_search_in_category($query) {
	    if( $query->is_search() && isset($_GET[ 'search_category' ]) ) {
	    	$category= sanitize_text_field( $_GET[ 'search_category' ] );
	        if (isset($category) && !empty($category) && ($category != 'all')) {
	            $query->set('tax_query', array(
			        'relation' => 'AND',
			        array(
				        'taxonomy' => 'product_cat',
				        'field'    => 'slug',
				        'terms'    => $category
			        )
		        ));
	        }
	    }
	    return $query;
	}
}

$search = new GBT_Ajax_Search;

?>
