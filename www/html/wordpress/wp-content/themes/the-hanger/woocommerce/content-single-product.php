<?php

// @version 3.6.0

global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Upsells Products
if ( 1 != GBT_Opt::getOption('upsell_products') ) {
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
}

// Related Products
if ( 1 != GBT_Opt::getOption('related_products') ) {
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}

if ( 'after_product_summary' === GBT_Opt::getOption('product_tabs_position') ) {
	remove_filter('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 33);
	add_action('woocommerce_after_single_product_summary_tabs', 'woocommerce_output_product_data_tabs');
}

$product_gallery_class  = GBT_Opt::getOption('single_product_sidebar') === true ? 'small-12 large-5 columns' : 'small-12 large-7 columns';
$product_info_class 	= GBT_Opt::getOption('single_product_sidebar') === true ? 'small-12 large-4 columns' : 'small-12 large-5 columns';
$product_sidebar_class  = 'small-12 large-3 columns';

?>


<?php
	do_action( 'woocommerce_before_single_product' );

	if ( post_password_required() ) {
		echo get_the_password_form();
		return;
	}
?>

<div id="product-<?php the_ID(); ?>" <?php function_exists('wc_product_class')? wc_product_class( 'product', $product ) : post_class(); ?>>
	<div class="product_infos">
		<div class="row">

			<?php if ( !empty(GBT_Opt::getOption('single_product_sidebar')) && GBT_Opt::getOption('single_product_sidebar') === true && GBT_Opt::getOption('single_product_sidebar_position') == 'left' ): ?>
				<div class="<?php echo esc_attr($product_sidebar_class); ?>">
					<div class="show-for-large">
						<div class="woocommerce-single-sidebar-sticky">
							<?php dynamic_sidebar( 'single-product-widget-area' ); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<div class="<?php echo esc_attr($product_gallery_class); ?>">

				<div class="before-product-summary-wrapper" id="sticky_bottom_anchor">

					<?php do_action( 'woocommerce_before_single_product_summary' ); ?>

					<div class="product_badges_wrapper">
						<?php do_action( 'woocommerce_product_badges' ); ?>
					</div>

					<div class="product_tool_buttons_placeholder">
						<?php do_action( 'product_tool_buttons' ); ?>
					</div>

				</div>

			</div>

			<div class="<?php echo esc_attr($product_info_class); ?>">
				<div class="summary entry-summary">
					<?php do_action( 'getbowtied_woocommerce_breadcrumb' ); ?>
					<?php do_action( 'woocommerce_single_product_summary' ); ?>
				</div>
			</div>

			<?php if ( !empty(GBT_Opt::getOption('single_product_sidebar')) && GBT_Opt::getOption('single_product_sidebar') === true && GBT_Opt::getOption('single_product_sidebar_position') == 'right' ): ?>
				<div class="<?php echo esc_attr($product_sidebar_class); ?>">
					<div class="show-for-large">
						<div class="woocommerce-single-sidebar-sticky">
							<?php dynamic_sidebar( 'single-product-widget-area' ); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div>

<div class="row">
	<div class="large-12 columns">
		<div class="after-product-summary">
			<?php if ( 'after_product_summary' === GBT_Opt::getOption('product_tabs_position') ) { ?>
				<div class="small-12 large-7 woocommerce_tabs">
					<?php do_action( 'woocommerce_after_single_product_summary_tabs' ); ?>
				</div>
			<?php } ?>

			<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
