jQuery(function($) {
	
	"use strict";

	var active_header = "normal";

	var old_header = active_header;
	var new_header = active_header;

	var sticky_header_toggle = function(header) {

		var header_normal = header + ".header-normal";
		var header_sticky = header + ".header-sticky";

		if( $(header_normal).length ) {
		
			if ( $(header_normal).visible("partial") ) {

				// Sticky -> Normal

				active_header = "normal";
				
				$(".sticky_header_placeholder").removeClass("visible");			

			} else {

				// Normal -> Sticky

				if ( ! $(header_normal).is(":hover") ) {

					active_header = "sticky";

					$(".sticky_header_placeholder").addClass("visible");

				}

			}

		}

	}

	sticky_header_toggle(".site-header-style-1");
	sticky_header_toggle(".site-header-style-2");


	$(window).on("scroll resize hide.zf.dropdown hide.zf.dropdownmenu hide.gbt.megadropdown", function() {
		
		sticky_header_toggle(".site-header-style-1");
		sticky_header_toggle(".site-header-style-2");

		new_header = active_header;
		if (new_header != old_header) {
			if( $(".dropdown-pane").length > 0 ) {
				$(".dropdown-pane").foundation("close");
			}
			$(".gbt-mega-dropdown-wrapper").removeClass("is-active");
		}
		old_header = active_header;

	});


	$(window).on("resize", function() {
		gb_throttle($('.drilldown').foundation('_getMaxDims'), 300);
	});

	$(window).on("orientationchange", function() {
		$('.drilldown').foundation('_hideAll');
	});

	// Sticky Header for Products - Add to Wishlist
	$(".header-sticky-product-wishlist").on("click", function(e) {
		if (!$(this).hasClass('exists')) {
			e.preventDefault();
			$(".single-product .entry-summary .add_to_wishlist").trigger("click");
		}
	});

	// Sticky Header for Products - Variable / Grouped Products - Scroll To Add to Cart Form
	var scroll_to_add_to_cart_form = function( form ) {

		var offset;

		if (form.height() < $(window).height()) {
		  offset = form.offset().top - (($(window).height() / 2) - (form.height() / 2));
		} else {
		  offset = form.offset().top;
		}

		$('html, body').animate({
	        scrollTop: offset
	    }, 1000);
	}

	$(".header-sticky-product-add-to-cart .product_type_variable").on("click", function(e) {
		e.preventDefault();
		scroll_to_add_to_cart_form( $(".variations_form") );
	});

	$(".header-sticky-product-add-to-cart .product_type_grouped, .header-sticky-product-add-to-cart .germanized_button.product_type_simple").on("click", function(e) {
		e.preventDefault();
		scroll_to_add_to_cart_form( $("form.cart") );
	});

});