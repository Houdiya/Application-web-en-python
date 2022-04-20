<?php
/**
 * Plugin Name: The Hanger Extender
 * Plugin URI: https://thehanger.wp-theme.design/
 * Description: Extends the functionality of The Hanger with theme specific shortcodes and page builder elements.
 * Version: 1.7.3
 * Author: GetBowtied
 * Author URI: https://getbowtied.com
 * Requires at least: 5.0
 * Tested up to: 5.8.1
 *
 * @package  The Hanger Extender
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'is_plugin_active' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

global $theme;

$version = ( isset( get_plugin_data( __FILE__ )['Version'] ) && ! empty( get_plugin_data( __FILE__ )['Version'] ) ) ? get_plugin_data( __FILE__ )['Version'] : '1.0';
define( 'TH_EXT_VERSION', $version );

/*
 * Plugin Updater
 */
require dirname( __FILE__ ) . '/core/updater/plugin-update-checker.php';
$my_update_checker = Puc_v4_Factory::buildUpdateChecker(
	'https://raw.githubusercontent.com/getbowtied/the-hanger-extender/master/core/updater/assets/plugin.json',
	__FILE__,
	'the-hanger-extender'
);

if ( ! class_exists( 'TheHangerExtender' ) ) :

	/**
	 * TheHangerExtender class.
	 */
	class TheHangerExtender {

		/**
		 * The single instance of the class.
		 *
		 * @var TheHangerExtender
		 */
		protected static $instance = null;

		/**
		 * TheHangerExtender constructor.
		 */
		public function __construct() {

			$theme        = wp_get_theme();
			$parent_theme = $theme->parent();

			// Helpers.
			include_once dirname( __FILE__ ) . '/includes/helpers/helpers.php';

			// Vendor.
			include_once dirname( __FILE__ ) . '/includes/vendor/enqueue.php';

			// Include Theme Features.
			if ( class_exists( 'GBT_Opt' ) || class_exists( 'GBTHELPERS' ) ) {
				include_once dirname( __FILE__ ) . '/includes/shortcodes/wp/slider.php';
				include_once dirname( __FILE__ ) . '/includes/shortcodes/wp/blog-posts.php';
				include_once dirname( __FILE__ ) . '/includes/shortcodes/wp/custom-button.php';
				include_once dirname( __FILE__ ) . '/includes/shortcodes/wc/woocommerce_products_user_bought.php';

				// Add Shortcodes to VC.
				if ( defined( 'WPB_VC_VERSION' ) ) {

					// Add new WP shortcodes to VC.
					include_once dirname( __FILE__ ) . '/includes/shortcodes/vc/wp/slider.php';
					include_once dirname( __FILE__ ) . '/includes/shortcodes/vc/wp/blog-posts.php';
					include_once dirname( __FILE__ ) . '/includes/shortcodes/vc/wp/custom-button.php';
				}
			}

			// Blocks.
			include_once dirname( __FILE__ ) . '/includes/gbt-blocks/index.php';

			// Widgets.
			include_once dirname( __FILE__ ) . '/includes/widgets/widget-ecommerce-info.php';
			include_once dirname( __FILE__ ) . '/includes/widgets/widget-product-categories-with-icon.php';

			// Customizer.
			include_once dirname( __FILE__ ) . '/includes/customizer/repeater/class-th-ext-repeater-control.php';
			include_once dirname( __FILE__ ) . '/includes/customizer/toggle/class-control-toggle.php';

			// Addons.
			include_once dirname( __FILE__ ) . '/includes/addons/woocommerce-category-header.php';
			include_once dirname( __FILE__ ) . '/includes/addons/woocommerce-category-icon.php';

			// Social Media.
			include_once dirname( __FILE__ ) . '/includes/social-media/class-social-media.php';

			// Social Sharing.
			include_once dirname( __FILE__ ) . '/includes/social-sharing/class-social-sharing.php';
		}

		/**
		 * Ensures only one instance of TheHangerExtender is loaded or can be loaded.
		 *
		 * @return TheHangerExtender
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
	}
endif;

add_action(
	'after_setup_theme',
	function() {
		$thehanger_extender = new TheHangerExtender();
	}
);
