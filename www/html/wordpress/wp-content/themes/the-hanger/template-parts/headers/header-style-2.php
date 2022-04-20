<header class="site-header site-header-style-2 header-normal">

	<?php if ( GBT_Opt::getOption('simple_header_layout') == 'boxed' ) : ?>
	<div class="row small-collapse">

		<div class="small-12 columns">
	<?php endif; ?>

			<div class="header-content">

				<div class="header-navigation">

					<nav class="navigation-foundation">
						<?php
							wp_nav_menu(array(
								'theme_location'    => GBT_Opt::getOption('simple_header_menu_location'),
								'container'         => false,
								'menu_class'        => 'gbt-primary-menu dropdown menu site-secondary-font',
								'items_wrap'        => '<ul id="%1$s" class="%2$s" data-dropdown-menu data-hover-delay="250" data-closing-time="250">%3$s</ul>',
								'link_before'       => '<span>',
								'link_after'        => '</span>',
								'fallback_cb'     	=> 'Foundation_Dropdown_Menu_Fallback',
								'walker'            => new Foundation_Dropdown_Menu_Walker(),
							));
						?>
					</nav>

				</div>

				<div class="header-branding site-secondary-font">

					<?php if ( ! empty( GBT_Opt::getOption('simple_header_logo') ) ) : ?>

						<div class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( GBT_Opt::getOption('simple_header_logo') ); ?>" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" width="<?php esc_html_e(GBT_Opt::getOption('simple_header_logo_width')); ?>"></a></div>

					<?php else : ?>

						<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></div>

					<?php endif; ?>

				</div>

				<ul class="header-tools">

					<?php if ( GBT_Opt::getOption('simple_header_search_toggle') == 1 ) : ?>
						<li class="offcanvas-menu-button simple-header-search">
							<a data-toggle="searchOffCanvas">
								<i class="thehanger-icons-search"></i>
							</a>
						</li>
					<?php endif; ?>

					<?php if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) : ?>
					<?php if ( GBT_Opt::getOption('simple_header_user_account') == 1 ) : ?>
						<li class="header-account">
							<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
								<i class="thehanger-icons-account"></i>
							</a>
						</li>
					<?php endif; ?>
					<?php endif; ?>

					<?php if ( GETBOWTIED_WISHLIST_IS_ACTIVE ) : ?>
					<?php if ( GBT_Opt::getOption('simple_header_wishlist') == 1 ) : ?>
						<li class="header-wishlist">
							<a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>">
								<i class="thehanger-icons-wishlist"></i>
								<div class="tools_badge wishlist_items_number"><?php echo yith_wcwl_count_products(); ?></div>
							</a>
						</li>
					<?php endif; ?>
					<?php endif; ?>

					<?php if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) : ?>
					<?php if ( GBT_Opt::getOption('simple_header_cart') == 1 ) : ?>
						<li class="header-cart">
							<a href="<?php echo esc_url(wc_get_cart_url()); ?>" data-toggle="header-normal-minicart">
								<i class="thehanger-icons-shopping-bag"></i>
								<div class="tools_badge shopping_bag_items_number"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></div>
							</a>
							<?php if( !is_cart() && !is_checkout() ) : ?>
								<div class="header-minicart-placeholder">
									<div class="dropdown-pane minicart" id="header-normal-minicart" data-dropdown data-hover="true" data-hover-pane="true" data-alignment="right">
										<?php if ( class_exists( 'WC_Widget_Cart' ) ) { the_widget( 'WC_Widget_Cart' ); } ?>
										<div class="minicart_infos"><?php echo GBT_Opt::getOption('simple_header_cart_info'); ?></div>
									</div>
								</div>
							<?php endif; ?>
						</li>
					<?php endif; ?>
					<?php endif; ?>

				</ul>

			</div>

	<?php if ( GBT_Opt::getOption('simple_header_layout') == 'boxed' ) : ?>
		</div>

	</div>
	<?php endif; ?>

</header>
