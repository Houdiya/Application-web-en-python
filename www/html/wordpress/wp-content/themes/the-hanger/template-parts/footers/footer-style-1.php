<footer class="site-footer">

	<div class="footer-style-1">

		<div class="row small-collapse">
			<div class="large-12 columns">
			
				<div class="footer-content">

					<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>

						<?php if( GBT_Opt::getOption('expandable_footer') == 1 ) : ?>
							<div class="trigger-footer-widget-area">
								<span class="trigger-footer-widget-icon thehanger-icons-ui_expand"></span>
							</div>
						<?php endif; ?>

						<aside class="widget-area">

							<div class="row small-up-1 medium-up-2 large-up-6">
								<?php dynamic_sidebar( 'footer-widget-area' ); ?>
							</div>

						</aside>

					<?php endif; ?>

					<div class="row align-top">
						
						<div class="large-6 small-12 columns">

							<?php if ( has_nav_menu("gbt_footer") ) : ?>

								<div class="footer-navigation">
									
									<nav class="navigation-foundation">
										<?php
											wp_nav_menu(array(
												'theme_location'    => 'gbt_footer',
												'container'         => false,
												'menu_class'        => 'dropdown menu',
												'items_wrap'        => '<ul id="%1$s" class="%2$s" data-dropdown-menu data-hover-delay="250" data-closing-time="250">%3$s</ul>',
												'link_before'       => '<span>',
				                                'link_after'        => '</span>',
												'fallback_cb'     	=> 'Foundation_Dropdown_Menu_Fallback',
												'walker'            => new Foundation_Dropdown_Menu_Walker(),
											));
										?>
									</nav>
									
								</div>

							<?php endif; ?>

							<div class="footer-text">
								<?php echo GBT_Opt::getOption('footer_text') ?>
							</div>

						</div>

						<div class="large-6 small-12 columns">

							<div class="footer-credit-card-icons">
								<?php	$payment_options = GBT_Opt::getOption('footer_payment_options');
										if(is_array($payment_options)) { 
											foreach($payment_options as $opt) {
												if (isset($opt['payment_option_image'])) {
													if (is_numeric($opt['payment_option_image'])) {
														$opt_img = wp_get_attachment_image_src($opt['payment_option_image'], 'full');
														if (isset($opt_img[0]))
														echo '<img src="'.$opt_img[0].'" alt="'.sprintf(esc_html__('%s', 'the-hanger'), $opt['payment_option_name']).'" title="'.sprintf(esc_html__('%s', 'the-hanger'), $opt['payment_option_name']).'"/>';
													} else {
														echo '<img src="'.$opt['payment_option_image'].'" alt="'.sprintf(esc_html__('%s', 'the-hanger'), $opt['payment_option_name']).'" title="'.sprintf(esc_html__('%s', 'the-hanger'), $opt['payment_option_name']).'"/>';
													}
												}
											}
										}
								?>
							</div>

						</div>

					</div>

					<div class="hover_overlay_footer"></div>

				</div>

			</div>
		</div>

	</div>

</footer>