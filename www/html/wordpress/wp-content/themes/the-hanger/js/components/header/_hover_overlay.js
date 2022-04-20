jQuery(function($) {
	
	"use strict";	

	// Content Overlay

	var overlay_triggers_list = [
		
		".gbt-mega-dropdown-wrapper",
		".navigation-foundation > ul > .getbowtied_megamenu",
		".navigation-foundation > ul > .is-dropdown-submenu-parent",
		".header-megamenu-placeholder",
		"body:not(.woocommerce-cart):not(.woocommerce-checkout) .header-tools .header-cart",

	];

	var overlay_triggers = overlay_triggers_list.join(", ");

	$(overlay_triggers).on({
		mouseenter: function(e) {
			$('.hover_overlay_content').addClass('visible').trigger("show.gbt.overlay_content");
			$('.hover_overlay_footer').addClass('visible').trigger("show.gbt.overlay_content");
		},
		mouseleave: function(e) {
			$('.hover_overlay_content').removeClass('visible').trigger("hide.gbt.overlay_content");
			$('.hover_overlay_footer').removeClass('visible').trigger("hide.gbt.overlay_content");
		}
	});


	// Header Overlay

	var overlay_triggers_list = [
		
		".topbar .navigation-foundation > ul > .is-dropdown-submenu-parent"

	];

	var overlay_triggers = overlay_triggers_list.join(", ");

	$(overlay_triggers).on({
		mouseenter: function(e) {
			$('.hover_overlay_header').addClass('visible');
		},
		mouseleave: function(e) {
			$('.hover_overlay_header').removeClass('visible');
		}
	});


	// Remove Overlays on Click

	window.hover_overlay_remove = function(e) {
	    
	    // Exceptions
	    var containers = [
			
			".site-header-style-1 .header_search_input_wrapper input",
	    	".site-header-style-1 .header_search_ajax_results_wrapper",
	    	".select2-selection",
	    	".gbt-mega-dropdown-button",
	    	".gbt-mega-dropdown-content-inside",
	    	".is-dropdown-submenu",
	    	".dropdown-pane",
	    	".getbowtied_product_quick_view_button"

		];

		var container = $(containers.join(", "));
	    
	    if (!container.is(e.target) && container.has(e.target).length === 0) 
	    {
	        $('.hover_overlay_content').removeClass('visible');
	        $('.hover_overlay_footer').removeClass('visible');
	    }
	};

	$(document).on('click', function(e) {
	    hover_overlay_remove(e);
	});

});