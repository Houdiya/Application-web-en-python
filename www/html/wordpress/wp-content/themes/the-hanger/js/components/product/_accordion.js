(function($) {

	"use strict";
		
	$('body')
		
		// Accordion

		.on( 'init', '.woocommerce-gb_accordion', function() {
			
			var hash  = window.location.hash;
			var url   = window.location.href;
			var $tabs = $( this ).find( '.accordion' ).first();

			if ( hash.toLowerCase().indexOf( 'comment-' ) >= 0 || hash === '#reviews' || hash === '#tab-reviews' ) {
				$(".woocommerce-gb_accordion .accordion").foundation('down', $("#tab-reviews"));
			} else if ( url.indexOf( 'comment-page-' ) > 0 || url.indexOf( 'cpage=' ) > 0 ) {
				$(".woocommerce-gb_accordion .accordion").foundation('down', $("#tab-reviews"));
			} else if ( hash === '#tab-additional_information' ) {
				$(".woocommerce-gb_accordion .accordion").foundation('down', $("#tab-additional_information"));
			} else if(wp_js_var.accordion_description) {
				$(".woocommerce-gb_accordion .accordion").foundation('down', $('#tab-description'));
			} else {
				
			}

		} )
		
		// Review link

		.on( 'click', 'a.woocommerce-review-link', function() {
			$(".woocommerce-gb_accordion .accordion").foundation('down', $("#tab-reviews"));
			setTimeout(function(){
				var tag = $("#reviews");
	    		$('html,body').animate({scrollTop: tag.offset().top},'slow');
    		}, 300);
			return true;
		} );

	// Init Accordion
	
	$( '.woocommerce-gb_accordion' ).trigger( 'init' );

})(jQuery);