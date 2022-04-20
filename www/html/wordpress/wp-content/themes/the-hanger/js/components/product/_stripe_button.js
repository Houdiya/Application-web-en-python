(function($) {
	
	"use strict";

	$( function() {

		$(".single-product .product .cart .add_to_cart_wrapper #wc-stripe-payment-request-button-separator").css("display", "none");
		$(".single-product .product .cart .add_to_cart_wrapper #wc-stripe-payment-request-wrapper").css("display", "none");

		setTimeout(function(){
			if($(".single-product .product .cart .add_to_cart_wrapper .StripeElement").children().length > 0) {
				$(".single-product .product .cart .add_to_cart_wrapper").addClass("stripe-button");
				$(".single-product .product .cart .add_to_cart_wrapper #wc-stripe-payment-request-button-separator").css("display", "block");
				$(".single-product .product .cart .add_to_cart_wrapper #wc-stripe-payment-request-wrapper").css("display", "block");
			}
		},1000);

	});

})(jQuery);