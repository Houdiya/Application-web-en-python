<div class="topbar">

	<?php if ( GBT_Opt::getOption('topbar_layout') == 'boxed' ) : ?>
		<div class="row small-collapse">
		
			<div class="small-12 columns">
	<?php endif; ?>

	            <div class="topbar-content">

	            	<div class="topbar-wrapper-left">
	            		
	            		<?php do_action( 'topbar_socials' ); ?>

						<?php if ( GBT_Opt::getOption('topbar_info_1_toggle') == 1 ) : ?>
							<div class="topbar-info-1"><?php echo GBT_Opt::getOption('topbar_info_1'); ?></div>
						<?php endif; ?>
	            	</div>

					<?php if ( GBT_Opt::getOption('topbar_info_2_toggle') == 1 ) : ?>
						<div class="topbar-info-2"><?php echo GBT_Opt::getOption('topbar_info_2'); ?></div>
					<?php endif; ?>

					<?php 
					$menu = wp_nav_menu(
					    array (
					        'echo' => FALSE,
					        'theme_location'    => 'gbt_topbar',
					        'fallback_cb' => '__return_false'
					    )
					);

					if ($menu !== false): ?>
					<div class="topbar-navigation">
						<nav class="navigation-foundation">
							<?php
								$menu = wp_nav_menu(array(
										'theme_location'    => 'gbt_topbar',
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
				</div>

	<?php if ( GBT_Opt::getOption('topbar_layout') == 'boxed' ) : ?>
			</div>

		</div>
	<?php endif; ?>
</div>