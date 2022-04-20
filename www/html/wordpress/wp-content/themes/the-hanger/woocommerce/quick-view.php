<?php

// @version 3.0.0

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post, $woocommerce, $wishlists, $qv_product_id;

$product = wc_get_product( $qv_product_id );

add_action( 'getbowtied_qv_product_data', 	'woocommerce_template_single_title', 		1 );
add_action( 'getbowtied_qv_product_data', 	'woocommerce_template_single_rating', 		2 );
add_action( 'getbowtied_qv_product_data', 	'woocommerce_template_single_price', 		3 );
add_action( 'getbowtied_qv_product_data', 	'woocommerce_template_single_excerpt', 		4 );
add_action( 'getbowtied_qv_product_data', 	'quickview_go_to_product_page', 			5 );
add_action( 'getbowtied_qv_product_data', 	'woocommerce_template_single_add_to_cart', 	6 );
add_action( 'getbowtied_qv_product_data', 	'quickview_add_to_wishlist', 				8 );
add_action( 'getbowtied_qv_product_data', 	'woocommerce_template_single_meta', 		9 );
add_action( 'getbowtied_qv_product_images', 'woocommerce_show_product_images' );

?>
<?php while ( have_posts() ) : the_post(); ?>
<button class="close-button" data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
</button>
<div class="row small-collapse">
	<div class="small-12 columns">
		
		<div class="site-content">

			<?php

				if ( post_password_required() ) {
					echo get_the_password_form();
					return;
				}
			?>

			<div id="product-<?php the_ID(); ?>" <?php function_exists('wc_product_class')? wc_product_class( 'product', $product ) : post_class(); ?>>

				<div class="row">

					<div class="small-12 large-7 columns">
						<div class="before-product-summary-wrapper">
					
							<?php do_action( 'getbowtied_qv_product_images' ); ?>

						</div>
					</div>

					<div class="small-12 large-5 columns">

						<div class="summary entry-summary">

							<?php do_action( 'getbowtied_qv_product_data' ); ?>

						</div>

					</div>

			</div>

		</div>
		
	</div>
</div>
<?php endwhile; // end of the loop. ?>