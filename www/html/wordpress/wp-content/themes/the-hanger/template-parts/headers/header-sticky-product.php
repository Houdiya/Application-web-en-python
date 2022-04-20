<?php 
	$prod = wc_get_product();
	$img = wp_get_attachment_image_src( $prod->get_image_id(), 'thumbnail' );
?>

<div class="site-header header-sticky-product">

	<div class="row small-collapse">
		
		<div class="small-12 columns">

			<div class="header-content header-sticky-product-content">

				<?php if (!empty($img[0])) : ?>
				
				<div class="header-sticky-product-image">
					<img src="<?php echo esc_url($img[0]); ?>" alt="<?php echo esc_attr($prod->get_name()); ?>" />
				</div>

				<?php endif; ?>
				
				<div class="header-sticky-product-title site-secondary-font"><?php echo esc_html($prod->get_title()); ?></div>

				<div class="header-sticky-product-add-to-cart site-secondary-font">

					<?php if( GETBOWTIED_GERMANIZED_IS_ACTIVE && ( $prod->get_type() != 'external' ) ) { ?>

						<?php 
							$button_text = 'Add to cart'; $class = 'product_type_simple';
							if($prod->get_type() == 'variable') { $button_text = 'Select options'; $class = 'product_type_variable'; }
							if($prod->get_type() == 'grouped')  { $button_text = 'View products';  $class = 'product_type_grouped'; }
						?>

						<?php if ( $price_html = $prod->get_price_html() ) { ?>
							<p class="price"><?php echo wp_kses($price_html, array('del' => array(), 'span' =>array('class' => array()), 'ins' => array())); ?></p>
						<?php } ?>

						<p>
							<a class="button germanized_button <?php echo esc_attr($class); ?> add_to_cart_button">
								<span><?php printf(esc_html__( '%s', 'woocommerce' ), $button_text);?></span>
							</a>
						</p>

					<?php } else { ?>

						<?php echo do_shortcode('[add_to_cart id="'.$prod->get_id().'"]'); ?>

					<?php } ?>
				</div>

				<div class="header-sticky-product-buttons">
						
					<ul>
						<?php if ( GETBOWTIED_WISHLIST_IS_ACTIVE ) { ?>
						<li>
							<?php if (YITH_WCWL()->is_product_in_wishlist( $prod->get_id())) { ?>
							<a class="header-sticky-product-wishlist exists" href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>">
								<i class="thehanger-icons-ecommerce_wishlist"></i>
							</a>
							<?php } else { ?>
							<a class="header-sticky-product-wishlist" href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>">
								<i class="thehanger-icons-wishlist"></i>
							</a>
							<?php } ?>
							<span><?php esc_html_e('Wishlist', 'the-hanger'); ?></span>
						</li>
						<?php } ?>

						<?php do_action( 'header_sticky_socials' ); ?>

					</ul>		        

				</div>

			</div>

		</div>

	</div>

	<!-- progress bar temp -->
	<div class="scroll-progress-bar-container">
		<div class="scroll-progress-bar"></div>
	</div>

</div>