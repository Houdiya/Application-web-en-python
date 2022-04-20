jQuery(function($) {
	
	"use strict";
	

	// =============================================================================
	// Cart Coupon Focus / Bottom Border
	// =============================================================================

	if ( ( $('.woocommerce-cart').length ) && ( $('.coupon').length ) ) {

		$('body.woocommerce-cart .woocommerce .woocommerce-cart-form tr:not(.cart_item) td.actions .coupon .input-text').on('focus', function() {
			$(this).parent().addClass('bottom_line');
		});

		$('body.woocommerce-cart .woocommerce .woocommerce-cart-form tr:not(.cart_item) td.actions .coupon .input-text').on('blur', function() {
			$(this).parent().removeClass('bottom_line');
		});

	}

});