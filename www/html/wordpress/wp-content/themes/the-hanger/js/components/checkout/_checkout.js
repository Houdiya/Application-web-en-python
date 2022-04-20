jQuery(function($) {
	
	"use strict";
	
	// =============================================================================
	// Sticky Colaterals - see foundation.sticky.js
	// =============================================================================

	/*if ( Foundation.MediaQuery.atLeast('large') ) {

		$( '.woocommerce-checkout #order_review' ).wrapInner( '<div class="your_order_sticky"></div>' );

		var options = {
			topAnchor: 'customer_details',
			btmAnchor: 'checkout_bottom_anchor',  
			stickyOn: 'large',
			marginTop: 5,
			marginBottom: 0
		};

		if ( $( '.woocommerce-checkout .checkout' ).length ) {
			var sticky = new Foundation.Sticky( $( '.woocommerce-checkout .your_order_sticky' ), options );
		}
	}*/


	// =============================================================================
	// Coupon Focus / Bottom Border
	// =============================================================================

	if ( ( $('.woocommerce-checkout').length ) && ( $('.checkout_coupon').length ) ) {

		$('body.woocommerce-checkout .woocommerce .checkout_coupon p.form-row .input-text').on('focus', function() {
			$(this).parent().addClass('bottom_line');
			$('.checkout_coupon .form-row-first, .checkout_coupon .form-row-last').addClass('show');
		});

		 $('body.woocommerce-checkout a.showcoupon, body.woocommerce-checkout button[name="apply_coupon"]').on('click', function() {
			$('.checkout_coupon:visible').find('p.form-row').removeClass('bottom_line');
			$('.checkout_coupon:visible .form-row-first, .form-row-last').removeClass('show');
		});

	}

	if ( ( $('.woocommerce-checkout').length ) && ( $('.woocommerce-form-login').length ) ) {

		 $('body.woocommerce-checkout .showlogin').on('click', function() {
		 	if($('.woocommerce-form-login').hasClass('show')) {
				$('.woocommerce-form-login').removeClass('show');
			 } else {
			 	setTimeout( function() {
					$('.woocommerce-form-login').addClass('show');
				}, 300);
			 }		 	
		});

	}
});