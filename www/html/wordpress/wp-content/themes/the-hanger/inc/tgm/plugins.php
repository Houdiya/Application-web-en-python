<?php


function getbowtied_theme_register_required_plugins() {

  $plugins = array(
      'woocommerce' => array(
        'name'               => 'WooCommerce',
        'slug'               => 'woocommerce',
        'required'           => false,
        'description'        => 'The eCommerce engine of your WordPress site.',
        'demo_required'      => true
      ),
      'js_composer' => array(
          'name'               => 'WPBakery Page Builder',
          'slug'               => 'js_composer',
          'source'             => get_template_directory() . '/inc/plugins/js_composer.zip',
          'required'           => false,
          'external_url'       => '',
          'description'        => 'The page builder plugin coming with the theme.',
          'demo_required'      => true,
          'version'            => '6.2.0'
        ),
        'one-click-demo-import'=> array(
          'name'               => 'One Click Demo Import',
          'slug'               => 'one-click-demo-import',
          'required'           => false,
          'description'        => 'Adds easy-to-use demo import functionality.',
          'demo_required'      => true
        ),
        'envato-market'        => array(
          'name'               => 'Envato Market',
          'slug'               => 'envato-market',
          'required'           => false,
          'source'             => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
          'description'        => 'Enables updates for all your Envato purchases.',
          'demo_required'      => false,
        ),
        'the-hanger-extender' => array(
          'name'               => 'The Hanger Extender',
          'slug'               => 'the-hanger-extender',
          'source'             => 'https://github.com/getbowtied/the-hanger-extender/zipball/master',
          'required'           => true,
          'external_url'       => 'https://github.com/getbowtied/the-hanger-extender',
          'description'        => 'Extends the functionality of with theme-specific features.',
          'demo_required'      => true,
        ),
        'product-blocks-for-woocommerce' => array(
          'name'               => 'Product Blocks for WooCommerce',
          'slug'               => 'product-blocks-for-woocommerce',
          'required'           => false,
          'description'        => 'Create beautiful product displays for your WooCommerce store.',
          'demo_required'      => false
        ),
        'hookmeup'             => array(
          'name'               => 'HookMeUp – Additional Content for WooCommerce',
          'slug'               => 'hookmeup',
          'required'           => false,
          'description'        => 'Customize WooCommerce templates without coding.',
          'demo_required'      => false
        ),
      );

	$config = array(
	   'id'               => 'the-hanger',
		'default_path'      => '',
		'parent_slug'       => 'themes.php',
		'menu'              => 'tgmpa-install-plugins',
		'has_notices'       => false,
		'is_automatic'      => false,
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'getbowtied_theme_register_required_plugins' );
