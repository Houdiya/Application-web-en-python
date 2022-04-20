<?php

// @version 1.6.4

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<div class="row small-collapse">
	
	<div class="small-12 columns">

		<div class="site-content">

			<?php do_action( 'woocommerce_before_main_content' ); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'single-product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php do_action( 'woocommerce_after_main_content' ); ?>

			<?php do_action( 'woocommerce_sidebar' ); ?>

		</div>

	</div>
	
</div>

<?php get_footer( 'shop' );