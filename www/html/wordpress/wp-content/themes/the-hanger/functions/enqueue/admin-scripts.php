<?php

if ( is_admin() ) :
	
	// =============================================================================
	// Enqueue Admin Scripts
	// =============================================================================

	function getbowtied_admin_scripts() {
	    
	    global $pagenow, $post_type;
		
		wp_enqueue_script('getbowtied_admin_icon_picker', get_template_directory_uri() .'/js/admin/icon-picker.js', array('jquery'), getbowtied_theme_version());
		wp_enqueue_script('getbowtied_admin_go_to_page',  get_template_directory_uri() . '/js/admin/go-to-page.js', array('jquery'), getbowtied_theme_version(), true);
		wp_enqueue_script('getbowtied_admin_notice', 	  get_template_directory_uri() . '/js/admin/notice.js', 	array('jquery'), getbowtied_theme_version(), true);
	    
	}
	
	add_action( 'admin_enqueue_scripts', 'getbowtied_admin_scripts' );

endif;