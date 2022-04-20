<?php
/**
 * Toggle control class
 *
 * @package Customize_Toggle_Control
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	include ABSPATH . WPINC . '/class-wp-customize-control.php';
}

/**
 * Class WP_TH_Customize_Toggle_Control
 */
if ( ! class_exists( 'WP_TH_Customize_Toggle_Control' ) ) {
	class WP_TH_Customize_Toggle_Control extends WP_Customize_Control {

		public $type = 'toggle';

		/**
		 * Constructor.
		 *
		 * Supplied `$args` override class property defaults.
		 *
		 * If `$args['settings']` is not defined, use the $id as the setting ID.
		 *
		 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
		 * @param string               $id      Control ID.
		 * @param array                $args    Optional. Arguments to override class property defaults.
		 */
		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
		}

		/**
		 * Render the control's content.
		 */
		public function render_content()
		{
			?>
			<label>
				<div class="th-toggle-content">
					<hr />
					<span class="customize-control-title" style="width: calc(100% - 55px);"><?php echo esc_html( $this->label ); ?></span>
					<input id="cb<?php echo $this->instance_number ?>" type="checkbox" class="th-tgl" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
					<label for="cb<?php echo $this->instance_number ?>" class="th-tgl-btn"></label>
				</div>
				<div class="th-toggle-description"><i><?php echo $this->description; ?></i></div>
			</label>
			<?php
		}

		/**
		 * Enqueue control related scripts/styles.
		 */
		public function enqueue() {
			wp_enqueue_style('th-ext-customizer-styles', plugins_url( 'assets/css/customizer_toggle.css', __FILE__ ), array(), TH_EXT_VERSION );
		}
	}
}
