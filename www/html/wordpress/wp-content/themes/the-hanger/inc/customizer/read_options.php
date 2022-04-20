<?php

class GBT_Opt {

	/**
	 * Cache each request to prevent duplicate queries
	 *
	 * @var array
	 */
	protected static $cached = [];

	/**
	 *  We don't need a constructor
	 */
	private function __construct() {}

	/**
	 * Default values for theme options
	 *
	 * @return array
	 */
	private static function theme_defaults() {
		return [
			// Global
			'site_width'                   			=> 1340,
			'site_width_full'             			=> 0,
			'bg_color' 								=> '#F9F9F9',

			// Header
			'header_template' 						=> 'style-1',
			'header_layout' 						=> 'full',
			'header_background_color' 				=> '#fff',
			'header_font_color' 					=> '#000',
			'header_accent_color'					=> '#c4b583',
			'header_font_size' 						=> '13',
			'header_search_toggle'					=> 1,
			'header_search_by_category'				=> '1',
			'header_mobile_megabutton_type' 		=> 'large_icons',
			'header_mobile_megamenu_show'			=> 'simple_links',
			'header_mobile_menu_text'				=> esc_html__( 'Menu', 'the-hanger' ),
			'header_logo'                			=> get_template_directory_uri() . '/images/the-hanger.png',
			'header_logo_width' 					=> '200',
			'header_alt_logo'                		=> get_template_directory_uri() . '/images/alternative_logo.png',
			'header_user_account'               	=> 1,
			'header_wishlist' 						=> 1,
			'header_cart' 							=> 1,
			'header_cart_info'						=> esc_html__( 'Free shipping on all orders over $75', 'the-hanger' ),
			'topbar_toggle'             			=> 0,
			'topbar_layout'							=> 'boxed',
			'topbar_bg_color'						=> '#FFFFFF',
			'topbar_font_color'		    			=> '#777777',
			'topbar_accent_color'		    		=> '#C4B583',
			'topbar_font_size'          			=> '13',
			'topbar_info_1_toggle'         			=> 1,
			'topbar_info_1'          				=> esc_html__( 'Call +40 123 456 789', 'the-hanger' ),
			'topbar_info_2_toggle'         			=> 1,
			'topbar_info_2'          				=> esc_html__( 'Free shipping on all orders over $75', 'the-hanger' ),
			'dropdowns_bg_color'         			=> '#fff',
			'dropdowns_font_color'       			=> '#000',
			'dropdowns_accent_color'				=> '#c4b583',
			'header_sticky_visibility'				=> 1,
			'header_sticky_topbar'					=> 1,

			'simple_header_layout' 					=> 'full',
			'simple_header_background_color' 		=> '#fff',
			'simple_header_font_color' 				=> '#000',
			'simple_header_accent_color'			=> '#c4b583',
			'simple_header_menu_location'			=> 'gbt_alt_primary',
			'simple_header_font_size' 				=> '13',
			'simple_header_search_toggle'			=> 1,
			'simple_header_search_by_category'		=> '1',
			'simple_header_logo'                	=> get_template_directory_uri() . '/images/the-hanger.png',
			'simple_header_logo_width' 				=> '200',
			'simple_header_alt_logo'                => get_template_directory_uri() . '/images/alternative_logo.png',
			'simple_header_user_account'            => 1,
			'simple_header_wishlist' 				=> 1,
			'simple_header_cart' 					=> 1,
			'simple_header_cart_info'				=> esc_html__( 'Free shipping on all orders over $75', 'the-hanger' ),

			// Fonts
			'font_size' 							=> '16',
			'main_font' 							=> array('font-family' => 'Libre Franklin',  'variant' => '400', 'subsets' => array('latin')),
			'secondary_font' 						=> array('font-family' => 'NeueEinstellung', 'variant' => '500', 'subsets' => array('latin')),

			// Content Styling
			'content_layout' 						=> 'full',
			'content_bg_color'						=> '#fff',
			'primary_color'                     	=> '#777',
			'secondary_color'                   	=> '#000',
			'accent_color' 							=> '#C4B583',

			// Shop
			'shop_sidebar' 							=> 1,
			'shop_sidebar_position'             	=> 'left',
			'shop_layout_style'						=> 'grid',
			'shop_pagination' 						=> 'infinite_scroll',
			'shop_mobile_columns'					=> 2,
			'shop_second_image'						=> 0,
			'catalog_mode' 							=> 0,
			'catalog_mode_button'               	=> 0,
			'catalog_mode_price'                	=> 0,
			'sale_page'                         	=> true,
			'sale_page_slug'                    	=> 'on-sale',
			'sale_page_title'                   	=> esc_html__( 'On Sale!', 'the-hanger' ),
			'sale_page_badge_text'              	=> esc_html__( 'Sale!', 'the-hanger' ),
			'new_products_page'                 	=> true,
			'new_products_page_slug'            	=> 'new-products',
			'new_products_page_title'           	=> esc_html__( 'New Products', 'the-hanger' ),
			'new_products_badge_text'           	=> esc_html__( 'New!', 'the-hanger' ),
			'new_products_number_type'             	=> 'last_added',
			'new_products_number'               	=> 8,
			'new_products_number_last' 				=> 8,

			// Blog
			'blog_categories'						=> 0,
			'blog_sidebar'                      	=> 1,
			'blog_sidebar_position'             	=> 'right',
			'blog_pagination' 						=> 'default',
			'blog_single_sidebar'               	=> 0,
			'blog_single_sidebar_position'      	=> 'right',
			'blog_single_featured'              	=> 1,
			'blog_highlighted_posts'				=> 0,

		    // Product Page
			'upsell_products' 						=> 1,
			'related_products' 						=> 1,
			'single_product_sidebar'            	=> false,
			'single_product_sidebar_position'   	=> 'left',
			'description_accordion'					=> false,

			// Footer
			'footer_layout'             			=> 'full',
			'footer_prefooter'                  	=> 1,
			'expandable_footer'						=> 1,
			'footer_background_color' 				=> '#FFFFFF',
			'footer_font_color' 					=> '#777777',
			'footer_headings_color'             	=> '#000000',
			'footer_text' 							=> esc_html__('Powered by ', 'the-hanger' ) . '<a href="https://thehanger.getbowtied.com" title="eCommerce WordPress Theme for WooCommerce">' . esc_html__( 'The Hanger', 'the-hanger' ) . '</a>.',
			'footer_credit_card_icons' 				=> get_template_directory_uri() . '/images/footer/credit-card-icons.png',
			'footer_payment_options'					=> array(
															array(
													            'payment_option_name' => esc_attr__( 'Visa', 'the-hanger' ),
													            'payment_option_image'  => get_template_directory_uri() . '/images/footer/payment-icon-visa.png',
													        ),
													        array(
													            'payment_option_name' => esc_attr__( 'MasterCard', 'the-hanger' ),
													            'payment_option_image'  => get_template_directory_uri() . '/images/footer/payment-icon-mastercard.png',
													        ),
													        array(
													            'payment_option_name' => esc_attr__( 'Amex', 'the-hanger' ),
													            'payment_option_image'  => get_template_directory_uri() . '/images/footer/payment-icon-amex.png',
													        ),
													        array(
													            'payment_option_name' => esc_attr__( 'PayPal', 'the-hanger' ),
													            'payment_option_image'  => get_template_directory_uri() . '/images/footer/payment-icon-paypal.png',
													        ),
													        array(
													            'payment_option_name' => esc_attr__( 'Amazon', 'the-hanger' ),
													            'payment_option_image'  => get_template_directory_uri() . '/images/footer/payment-icon-amazon.png',
													        ),
														),

			'nav_button_title'						=> esc_html__( 'Browse Categories', 'the-hanger' )
		];
	}

	/**
	 * Switch case for options that need post processing
	 *
	 * @param  [string] $key   [name of option]
	 * @param  [string] $value [value]
	 *
	 * @return [string]        [processed value]
	 */
	private static function processOption($key, $value) {
			$opacity_dark           = .75;
		    $opacity_medium         = .5;
		    $opacity_light          = .3;
		    $opacity_ultra_light    = .15;
			switch ($key) {


				case 'topbar_dark_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('topbar_font_color')) 	. "," . $opacity_dark . ")";
					break;
				case 'topbar_medium_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('topbar_font_color')) 	. "," . $opacity_medium . ")";
					break;
				case 'topbar_light_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('topbar_font_color')) 	. "," . $opacity_light . ")";
					break;
				case 'topbar_ultra_light_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('topbar_font_color')) 	. "," . $opacity_ultra_light . ")";
					break;

				case 'header_dark_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('header_font_color')) 	. "," . $opacity_dark . ")";
					break;
				case 'header_medium_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('header_font_color')) 	. "," . $opacity_medium . ")";
					break;
				case 'header_light_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('header_font_color')) 	. "," . $opacity_light . ")";
					break;
				case 'header_ultra_light_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('header_font_color')) 	. "," . $opacity_ultra_light . ")";
					break;

				case 'simple_header_ultra_light_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('simple_header_font_color')) 	. "," . $opacity_ultra_light . ")";
					break;


				case 'dropdowns_dark_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('dropdowns_font_color')) 	. "," . $opacity_dark . ")";
					break;
				case 'dropdowns_medium_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('dropdowns_font_color')) 	. "," . $opacity_medium . ")";
					break;
				case 'dropdowns_light_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('dropdowns_font_color')) 	. "," . $opacity_light . ")";
					break;
				case 'dropdowns_ultra_light_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('dropdowns_font_color')) 	. "," . $opacity_ultra_light . ")";
					break;


				case 'content_dark_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_color')) 		. "," . $opacity_dark . ")";
					break;
				case 'content_medium_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_color')) 		. "," . $opacity_medium . ")";
					break;
				case 'content_light_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_color')) 		. "," . $opacity_light . ")";
					break;
				case 'content_ultra_light_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_color')) 		. "," . $opacity_ultra_light . ")";
					break;


				case 'footer_dark_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('footer_font_color')) 	. "," . $opacity_dark . ")";
					break;
				case 'footer_medium_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('footer_font_color')) 	. "," . $opacity_medium . ")";
					break;
				case 'footer_light_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('footer_font_color')) 	. "," . $opacity_light . ")";
					break;
				case 'footer_ultra_light_gray':
					return "rgba(" . getbowtied_hex2rgb(self::getOption('footer_font_color')) 	. "," . $opacity_ultra_light . ")";
					break;


				case 'header_logo':
					//return str_replace(array("http://","https://"), "//", self::getOption('header_logo'));
					return self::getOption('header_logo');
					break;
				case 'header_alt_logo':
					//return str_replace(array("http://","https://"), "//", self::getOption('header_alt_logo'));
					return self::getOption('header_alt_logo');
					break;
				case 'catalog_mode_button':
					return self::getOption('catalog_mode') && self::getOption('catalog_mode_button');
					break;
				case 'catalog_mode_price':
					return self::getOption('catalog_mode') && self::getOption( 'catalog_mode_price');
					break;
				case 'footer_credit_card_icons':
					//return str_replace(array("http://","https://"), "//", self::getOption('footer_credit_card_icons'));
					return self::getOption('footer_credit_card_icons');
					break;
				default:
					return $value;


			}

			return $value;
	}

	/**
	 * Return the theme option from cache; if it isn't cached fetch it and cache it
	 *
	 * @param  string $option_name
	 * @param  string $default
	 *
	 * @return string
	 */
	public static function getOption( $option_name, $default= '' ) {
		/* Return cached if possible */
		if ( array_key_exists($option_name, self::$cached) && empty($default) )
			return self::$cached[$option_name];
		/* If no default is given, fetch from theme defaults variable */
		if (empty($default)) {
			$default = array_key_exists($option_name, self::theme_defaults())? self::theme_defaults()[$option_name] : '';
		}

		$opt= get_theme_mod($option_name, $default);
		// echo '<br/>I did a database query<br/>';

		/* Cache the result */
		self::$cached[$option_name]= $opt;

		/* Process the variable */
		if ( $opt !== self::processOption($option_name, $opt) ) {
			self::$cached[$option_name]= self::processOption($option_name, $opt);
		}


		return self::$cached[$option_name];
	}
}
?>
