<?php

	$widgets = wp_get_sidebars_widgets();
	$prefooter_area_widgets_counter = (count($widgets['prefooter-widget-area']) >= 7) ? 6 : count($widgets['prefooter-widget-area']);

	foreach( $widgets['prefooter-widget-area'] as $k ) {
		if(strpos($k, 'monster-') !== false) {
			$prefooter_area_widgets_counter = 6;
		}
	}

?>

<?php if( isset($widgets['prefooter-widget-area']) && is_active_sidebar( 'prefooter-widget-area' ) ) : ?>

	<div class="site-prefooter">

		<?php if (isset($widgets['prefooter-widget-area'])) : ?>

			<div class="row small-collapse">

				<div class="large-12 columns">

					<div class="prefooter-content">

						<aside class="widget-area">

							<div class="row small-up-1 medium-up-2 large-up-<?php echo esc_attr($prefooter_area_widgets_counter); ?>">
								<?php dynamic_sidebar( 'prefooter-widget-area' ); ?>
							</div>

						</aside>

						<div class="hover_overlay_footer"></div>
						
					</div>	

				</div>
			</div>

		<?php endif; ?>

	</div>

<?php endif; ?>