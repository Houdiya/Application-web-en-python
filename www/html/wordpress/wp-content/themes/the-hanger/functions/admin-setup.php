<?php


	require_once( get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php' );
	require_once( get_template_directory() . '/inc/tgm/plugins.php' );
	require_once( get_template_directory() . '/inc/admin/wizard/class-gbt-helpers.php' );
	require_once( get_template_directory() . '/inc/admin/wizard/class-gbt-install-wizard.php' );

	require_once(get_template_directory() . '/inc/demo/ocdi-setup.php');

	/**
	 * On theme activation redirect to splash page
	 */
	global $pagenow;

	if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

		wp_redirect(admin_url("themes.php?page=gbt-setup")); // Your admin page URL
		
	}

/**
 * HookMeUp admin notice
 */
add_action( 'admin_notices', 'th_hookmeup_notice' );
if( !function_exists('th_hookmeup_notice') ) {
	function th_hookmeup_notice() {
		?>

		<?php if ( !get_option('dismissed-hookmeup-notice', FALSE ) && !class_exists('HookMeUp') ) : ?>
			<div class="notice-warning settings-error notice is-dismissible hookmeup_notice">
				<p>
					<strong>
						<span>This theme recommends the following plugin: <em><a href="https://wordpress.org/plugins/hookmeup/" target="_blank">HookMeUp – Additional Content for WooCommerce</a></em>.</span>
					</strong>
				</p>
			</div>
		<?php endif; ?>

		<?php
	}
}

if ( ! function_exists( 'gbt_dismiss_dashboard_notice' ) ) {
	function gbt_dismiss_dashboard_notice() {
		if( $_POST['notice'] == 'hookmeup' ) {
			update_option('dismissed-hookmeup-notice', TRUE );
		}
	}
	add_action( 'wp_ajax_gbt_dismiss_dashboard_notice', 'gbt_dismiss_dashboard_notice' );
}