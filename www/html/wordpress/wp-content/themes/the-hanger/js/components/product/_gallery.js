(function($) {
	
	"use strict";	

	// =============================================================================
	// Show Gallery Buttons
	// =============================================================================

	setTimeout(function() {
		$('.product_tool_buttons_placeholder').addClass('loaded');
	}, 1000);


	// =============================================================================
	// Gallery Trigger
	// =============================================================================
	
	$( function() {

		if ($('.woocommerce-product-gallery__trigger').length) {
			
			$('.single_product_gallery_trigger').on("click", function() {
				$('.woocommerce-product-gallery__trigger').trigger("click");
			});

		} else {

			$('.single_product_gallery_trigger').hide();

		}

	});

})(jQuery);