(function($) {

	"use strict";

	// =============================================================================
	// Filters Toggle
	// =============================================================================

	function filters_button_on_off() {

		$('.woocommerce-archive-header .filters-button').removeClass('with-filters');

		if (Foundation.MediaQuery.atLeast('large')) {

			if ($('.woocommerce-archive-header .shop-filters-area-content').children().length > 0) {
				$('.woocommerce-archive-header .filters-button').addClass('with-filters');
			}

		} else {

			if ( ( $('.woocommerce-archive-header .shop-widget-area').length > 0 ) || ( $('.woocommerce-archive-header .shop-filters-area-content').children().length > 0 ) ) {
				$('.woocommerce-archive-header .filters-button').addClass('with-filters');
			}

		}
	}

	filters_button_on_off();

	if ( $('.woocommerce-archive-header') ) {

		$( '.woocommerce-archive-header .filters-button' ).on( 'click', function() {

			if( $(this).hasClass('active') ) {
				$(this).removeClass('active');
				$( '.woocommerce-archive-header .site-shop-filters' ).slideUp(300).removeClass( "on-screen" );
			} else {
				$(this).addClass('active');
		    	$( '.woocommerce-archive-header .site-shop-filters' ).slideDown(300).addClass( "on-screen" );
			}

		});
	}


	// =============================================================================
	// Filters Scroll
	// =============================================================================

	var woocommerce_filter = $('.woocommerce-shop .widget-area .widget .woocommerce-widget-layered-nav-list');

	if ( woocommerce_filter.length ) {

		woocommerce_filter.each(function() {

			var max_filters 			= 5;
			var filter_length 			= $(this).find('li.woocommerce-widget-layered-nav-list__item').length;

			if ( filter_length > max_filters ) {
				$(this).addClass('add_scroll');
			}

		});
	}



	$(window).on( 'resize', function() {
		filters_button_on_off();
	});

	// wooswatches fixes
	$('.widget-area > br').remove();
	$('.shop-filters-area-content > br').remove();
	$('.shop-filters-area-content > .wcva-filter-widget').removeClass('widget-area').addClass('column');
	$('.widget-area > .wcva-filter-widget').removeClass('widget-area');

})(jQuery);
