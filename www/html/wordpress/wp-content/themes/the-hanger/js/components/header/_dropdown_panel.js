jQuery(function($) {

	"use strict";

	$(".header-navigation, .header-tools, .gbt-mega-dropdown-wrapper")

	.on("mouseenter", "a[data-toggle]", function(e) {
		var panel_id = $(e.currentTarget).data("toggle");
		$(e.delegateTarget).find("#" + panel_id).addClass("animated");
	})

	.on("mouseleave", "a[data-toggle]", function(e) {
		$(e.delegateTarget).find(".dropdown-pane").removeClass("animated");
	});

	// Make sure the dropdown won't be longer than the window's height
	function adjust_megadropdowns_height() {
		var dropdown_selector = $('.gbt-mega-dropdown .gbt-mega-dropdown-content .gbt-mega-dropdown-content-inside');
		var megamenu_selector = $('.header-navigation .gbt-mega-menu-content');

		if( $(window).width() >= 1024 ) {
			var header_height = $('#wpadminbar').outerHeight() + $('.topbar').outerHeight() + $('.site-header').outerHeight();
			var dropdown_max_height = $(window).height() - header_height - 100;

			dropdown_selector.css( {
				'max-height': dropdown_max_height,
			 	'overflow-y': 'auto'
			} );

			megamenu_selector.css( {
				'max-height': dropdown_max_height,
			 	'overflow': 'hidden auto'
			} );
		} else {
			dropdown_selector.css( {
				'max-height': '',
				'overflow-y': ''
			} );

			megamenu_selector.css( {
				'max-height': '',
				'overflow': ''
			} );
		}
	}

	adjust_megadropdowns_height();
	$(window).on( 'resize', function() {
		adjust_megadropdowns_height();
	});

});
