<div class="header-mobiles-wrapper mobile-header-<?php echo esc_html(GBT_Opt::getOption('header_template')); ?> <?php echo ( 1 == GBT_Opt::getOption('header_sticky_visibility') ) ? 'header-sticky' : ''; ?>">

	<header class="header-mobiles">

		<div class="header-mobiles-menu">

			<a><?php esc_html_e( GBT_Opt::getOption('header_mobile_menu_text'), 'the-hanger' ); ?></a>

		</div>

		<div class="header-mobiles-branding">

			<?php if ( ! empty( GBT_Opt::getOption('header_alt_logo') ) ) : ?>

				<div class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( GBT_Opt::getOption('header_alt_logo') ); ?>" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>"></a></div>

			<?php else : ?>

				<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></div>

			<?php endif; ?>

		</div>

		<div class="header-mobiles-tools">
			<?php if (GBT_Opt::getOption('header_template') == 'style-1'): ?>
			<ul class="header-tools">

				<li class="header-mobiles-search">
					<a>
						<i class="thehanger-icons-search"></i>
					</a>
				</li>

				<?php if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) : ?>
				<?php if ( GBT_Opt::getOption('header_cart') == 1 ) : ?>
					<li class="header-mobiles-cart">
						<a href="<?php echo esc_url(wc_get_cart_url()); ?>">
							<i class="thehanger-icons-shopping-bag"></i>
							<div class="tools_badge shopping_bag_items_number"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></div>
						</a>
					</li>
				<?php endif; ?>
				<?php endif; ?>

			</ul>
			<?php endif; ?>

			<?php if (GBT_Opt::getOption('header_template') == 'style-2'): ?>
			<ul class="header-tools">

				<?php if ( GBT_Opt::getOption('simple_header_search_toggle') == 1 ) : ?>
					<li class="header-mobiles-search">
						<a>
							<i class="thehanger-icons-search"></i>
						</a>
					</li>
				<?php endif; ?>

				<?php if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) : ?>
				<?php if ( GBT_Opt::getOption('simple_header_cart') == 1 ) : ?>
					<li class="header-mobiles-cart">
						<a href="<?php echo esc_url(wc_get_cart_url()); ?>">
							<i class="thehanger-icons-shopping-bag"></i>
							<div class="tools_badge shopping_bag_items_number"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></div>
						</a>
					</li>
				<?php endif; ?>
				<?php endif; ?>

			</ul>
			<?php endif; ?>
		</div>

	</header>

	<div class="header-mobiles-content">

		<?php if ( ( 1 == GBT_Opt::getOption('topbar_toggle') ) && ( GBT_Opt::getOption('topbar_info_2_toggle') == 1 ) ) : ?>
			<div class="header-mobiles-info-2"><?php echo GBT_Opt::getOption('topbar_info_2'); ?></div>
		<?php endif; ?>

		<?php if ( GBT_Opt::getOption('mega_dropdown_toggle', 1) == 1 && GBT_Opt::getOption('header_template') == 'style-1') : ?>

			<?php if ( GBT_Opt::getOption('header_mobile_megabutton_type') == 'default' ) : ?>
				<a class="header-mobiles-mega-dropdown-button site-secondary-font">
					<i class="thehanger-icons-hamburger"></i>
					<span><?php printf(esc_attr__( '%s' , 'the-hanger' ), GBT_Opt::getOption('nav_button_title')); ?></span>
				</a>
			<?php endif; ?>

			<?php if ( GBT_Opt::getOption('header_mobile_megabutton_type') == 'large_icons' ) : ?>
				<div class="header-mobiles-large-categories visible">
					<?php do_action('getbowtied_category_large_icons'); ?>
				</div>
			<?php else : ?>
				<?php if (GBT_Opt::getOption('header_template') == 'style-1'): ?>
					<?php getbowtied_mega_dropdown_action_output(); ?>
				<?php endif; ?>
			<?php endif; ?>

		<?php endif; ?>

		<div class="header-mobiles-primary-menu">
			<?php
				wp_nav_menu(array(
					'theme_location'    => 'gbt_primary',
					'container'         => false,
					'menu_class'        => 'vertical menu drilldown mobile-menu',
					'items_wrap'        => '<ul id="%1$s" class="%2$s" data-back-button="&lt;li class&#x3D;&quot;js-drilldown-back&quot;&gt;&lt;a tabindex&#x3D;&quot;0&quot;&gt;'.__("Back", "the-hanger").'&lt;/a&gt;&lt;/li&gt;" data-drilldown data-auto-height="true" data-animate-height="true" data-parent-link="true">%3$s</ul>',
					'link_before'       => '<span>',
					'link_after'        => '</span>',
					'fallback_cb'     	=> '',
					'walker'            => new Foundation_Drilldown_Menu_Walker(),
				));
			?>
		</div>

		<?php if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) : ?>
			<div class="header-mobiles-ecomm-menu">
				<ul>
					<?php if ( GBT_Opt::getOption('header_user_account') == 1 ) : ?>
						<li class="header-account">
							<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
								<i class="thehanger-icons-account"></i>
								<span><?php esc_html_e( 'My account', 'the-hanger' ); ?></span>
							</a>
						</li>
					<?php endif; ?>

					<?php if ( GBT_Opt::getOption('header_wishlist') == 1 && class_exists('YITH_WCWL') ) : ?>
						<li class="header-wishlist">
							<a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>">
								<i class="thehanger-icons-wishlist"></i>
								<span><?php esc_html_e( 'Wishlist', 'the-hanger' ); ?></span>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		<?php endif; ?>

		<?php if ( has_nav_menu( 'gbt_secondary' ) ) : ?>
			<div class="header-mobiles-secondary-menu">
				<?php
					wp_nav_menu(array(
						'theme_location'    => 'gbt_secondary',
						'container'         => false,
						'menu_class'        => 'vertical menu drilldown mobile-menu',
						'items_wrap'        => '<ul id="%1$s" class="%2$s" data-back-button="&lt;li class&#x3D;&quot;js-drilldown-back&quot;&gt;&lt;a tabindex&#x3D;&quot;0&quot;&gt;'.__("Back", "the-hanger").'&lt;/a&gt;&lt;/li&gt;" data-drilldown data-auto-height="true" data-animate-height="true" data-parent-link="true">%3$s</ul>',
						'link_before'       => '<span>',
						'link_after'        => '</span>',
						'fallback_cb'     	=> '',
						'walker'            => new Foundation_Drilldown_Menu_Walker(),
					));
				?>
			</div>
		<?php endif; ?>

		<?php if( ( 1 == GBT_Opt::getOption('topbar_toggle') ) && has_nav_menu( 'gbt_topbar' ) ) : ?>
			<div class="header-mobiles-topbar-menu">
				<?php
					wp_nav_menu(array(
						'theme_location'    => 'gbt_topbar',
						'container'         => false,
						'menu_class'        => 'vertical menu drilldown mobile-menu',
						'items_wrap'        => '<ul id="%1$s" class="%2$s" data-back-button="&lt;li class&#x3D;&quot;js-drilldown-back&quot;&gt;&lt;a tabindex&#x3D;&quot;0&quot;&gt;'.__("Back", "the-hanger").'&lt;/a&gt;&lt;/li&gt;" data-drilldown data-auto-height="true" data-animate-height="true" data-parent-link="true">%3$s</ul>',
						'link_before'       => '<span>',
						'link_after'        => '</span>',
						'fallback_cb'     	=> '',
						'walker'            => new Foundation_Drilldown_Menu_Walker(),
					));
				?>
			</div>
		<?php endif; ?>

		<?php do_action( 'header_topbar_socials' ); ?>

		<?php if ( ( 1 == GBT_Opt::getOption('topbar_toggle') ) && ( GBT_Opt::getOption('topbar_info_1_toggle') == 1 ) ) : ?>
			<div class="header-mobiles-info-1"><?php echo GBT_Opt::getOption('topbar_info_1'); ?></div>
		<?php endif; ?>

	</div>

	<div class="header-mobiles-search-content">
		<div class="header-mobiles-search-content-inside">
			<?php if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) : ?>
				<?php get_product_search_form(); ?>
			<?php else: ?>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</div>
	</div>

</div>
