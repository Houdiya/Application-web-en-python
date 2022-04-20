<?php

// @version 3.4.0

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' );
$sidebar = ( (1==GBT_Opt::getOption('shop_sidebar')) );
if (getbowtied_is_custom_archive()):
	remove_action( 'woocommerce_product_loop_start', 'woocommerce_maybe_show_product_subcategories' );
endif;

$page_title = 'on';
if (get_post_meta( getbowtied_page_id(), 'page_title_meta_box_check', true )) {
    $page_title = get_post_meta( getbowtied_page_id(), 'page_title_meta_box_check', true );
}
?>

<div class="row small-collapse">

	<div class="large-12 columns">

		<div class="site-content <?php echo esc_attr($sidebar) ? 'woocommerce-sidebar-active' : '' ?>">

			<?php do_action( 'woocommerce_before_main_content' ); ?>		
			
			<?php do_action( 'getbowtied_woocommerce_breadcrumb' );  ?>

			<div class="row">

				<?php if ( $sidebar && GBT_Opt::getOption('shop_sidebar_position') == 'left') : ?>

					<div class="small-12 large-3 columns show-for-large">
						<div class="woocommerce-sidebar-sticky">
							<?php do_action( 'woocommerce_sidebar' ); ?>
						</div>
					</div>

				<?php endif; ?>

				<div class="small-12 <?php echo esc_attr($sidebar) ? 'large-9' : 'large-12' ?> columns">

					<div class="site-main-content-wrapper">

						<div class="shop_header_placeholder">

							<header class="woocommerce-archive-header">

								<?php do_action( 'woocommerce_before_shop_products_header' ); ?>

								<div class="woocommerce-archive-header-inside">
									<?php if ( is_product_category() || ( is_shop() && ( $page_title == 1 || $page_title == 'on' ) ) ) : ?>
									<h1 class="woocommerce-products-header__title woocommerce-archive-header-title page-title">
										
										<?php woocommerce_page_title(); ?>&nbsp;
										
										<?php if ( is_product_category() ) : ?>
											<span class="category-title-count">
												<?php printf( esc_html__( '%d items', 'the-hanger' ), getbowtied_count_category() ); ?>
											</span>
										<?php endif; ?>
											
									</h1>
									<?php endif; ?>

									<?php 
										if( (( woocommerce_get_loop_display_mode() != 'subcategories' ) && (wc_get_loop_prop( 'total' ) > 0 )) || getbowtied_is_custom_archive() ): ?>
										<div class="woocommerce-archive-header-tools site-secondary-font site-secondary-color">
											<span class="filters-button"><?php esc_html_e('Filters', 'the-hanger'); ?></span>
											<?php do_action( 'getbowtied_woocommerce_catalog_ordering' ); ?>
											
											<div class="shop-tools">
												<span class="shop-display-grid <?php echo (GBT_Opt::getOption('shop_layout_style') == 'grid') ? 'active' : ''; ?>">
													<i class="thehanger-icons-display-grid"></i>
												</span>
												<span class="shop-display-list <?php echo (GBT_Opt::getOption('shop_layout_style') == 'list') ? 'active' : ''; ?>">
													<i class="thehanger-icons-display-list"></i>
												</span>
											</div>
										</div>

									<?php endif; ?>

								</div>

								<?php do_action( 'woocommerce_after_shop_products_header' ); ?>

								<?php get_template_part( 'template-parts/shop/shop_filters' ) ?>

							</header>

						</div>

						<?php do_action( 'woocommerce_archive_description' ); ?>

						<div class="row">

							<div class="large-12 columns">

								<div class="site-main-content" id="sticky_bottom_anchor">

									<?php if ( (function_exists('woocommerce_product_loop') && woocommerce_product_loop()) || have_posts() ) : 

										do_action( 'woocommerce_before_shop_loop' );

											woocommerce_product_loop_start();
											if ( wc_get_loop_prop( 'total' ) || ( getbowtied_is_custom_archive())) {
											?>
											<li class="flex-break"></li>
											<?php while ( have_posts() ) : the_post(); ?>

												<?php do_action( 'woocommerce_shop_loop' ); ?>
												<?php wc_get_template_part( 'content', 'product' ); ?>

											<?php endwhile; ?>
										<?php } ?>

										<?php woocommerce_product_loop_end(); ?>

										<?php do_action( 'woocommerce_after_shop_loop' ); ?>

									<?php else :  ?>

										<?php do_action( 'woocommerce_no_products_found' ); ?>

									<?php endif; ?>


								</div> <!-- end site-main-content -->

							</div> <!-- end large-12 -->

						</div><!-- end row -->

					</div> <!-- end site-main-content-wrapper -->

				</div> 

				<?php if ( $sidebar && GBT_Opt::getOption('shop_sidebar_position') == 'right') : ?>

					<div class="small-12 large-3 columns show-for-large">
						<div class="woocommerce-sidebar-sticky">
							<?php do_action( 'woocommerce_sidebar' ); ?>
						</div>
					</div>

				<?php endif; ?>

			</div> <!-- end row -->

			<?php do_action( 'woocommerce_after_main_content' ); ?>

		</div> <!-- end site-content -->

	</div> <!-- end large-12 -->

</div> <!-- end row -->

<?php
get_footer( 'shop' );