<?php
add_shortcode( 'my_products', 'getbowtied_user_bought_products' );
 
function getbowtied_user_bought_products() { 
	$customer_orders = wc_get_orders( apply_filters( 'woocommerce_my_account_my_orders_query', array( 'customer' => get_current_user_id()) ) );
	$products_in = array();
	foreach ( $customer_orders as $customer_order ) :
		$order      = wc_get_order( $customer_order );
		foreach ( $order->get_items() as $item_id => $item )
		{
			if ( wc_customer_bought_product( '', get_current_user_id(), $item->get_product_id() ) ) {
				$products_in[]= $item->get_product_id();
			}
		}
	endforeach;

	if (empty($products_in)) return false;

	$args = array(
		'post_type' => 'product',
		'post__in' => $products_in,
		'posts_per_page'=> 8
		);
	$loop = new WP_Query( $args );

	ob_start();
	if ( $loop->have_posts() ) {
		while ( $loop->have_posts() ) : $loop->the_post();
			wc_get_template_part( 'content', 'product' );
		endwhile;
	} 
	wp_reset_postdata();

	return '<h6>'.__('Your Products', 'the-hanger-extender') .'</h6>'.
	'<ul class="products woocommerce columns-4">' . ob_get_clean() . '</ul>';
}