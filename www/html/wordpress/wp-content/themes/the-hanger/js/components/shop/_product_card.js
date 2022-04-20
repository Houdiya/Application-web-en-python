(function($) {

	"use strict";

	$(window).on( 'load', function() {
        setTimeout(function() {
			$(".product_image.with_second_image").addClass("second_image_loaded");
        }, 300);
	});

	// =============================================================================
	// Buttons Wrapper Height
	// =============================================================================

	window.display_grid_buttons_wrapper = function() {

		if ( $(".products .buttons").length ) {
			$('ul.products li.product').imagesLoaded( function() {
				if (Foundation.MediaQuery.atLeast('xlarge')) {
					$(".products .buttons").each(function () {
						$(this).css("height", $(this).parent().siblings(".product_image_wrapper").find(".product_image").height());
					});
				} else {
					$(".products .buttons").css("height", "auto");
				}
			});
		}
	}

	display_grid_buttons_wrapper();

	$(window).on( 'resize', function() {
		display_grid_buttons_wrapper();
	});

	$(document).ajaxComplete(function() {
		display_grid_buttons_wrapper();
	});



	// =============================================================================
	// Shop Archive Buttons Click States
	// =============================================================================

	// Wishlist

	$(document).on('click', '.buttons .add_to_wishlist',  function(e) {
		var this_button = $(this);
		this_button.addClass('clicked');
		this_button.parents('.main-container').addClass('adding');
		setTimeout(function() {
        	this_button.addClass('loading');
        }, 400);
		$(document.body).on('added_to_wishlist', function() {
			$('.header-wishlist').addClass('animated');
			this_button.removeClass('loading');
			this_button.parents('.main-container').removeClass('adding');
			setTimeout(function() {
				this_button.css('opacity', '');
				this_button.css('zoom', '');
			}, 100);
			setTimeout(function() {
	        	$('.header-wishlist').removeClass('animated');
            }, 2000);
			this_button.removeClass('add_to_wishlist').addClass('added');
			this_button.attr("href", this_button.data("wishlist-url"));
			this_button.children('.tooltip').text(this_button.data("browse-wishlist-text"));
		});
	});


	// Quick View

	$(document).on('click', '.buttons .getbowtied_product_quick_view_button',  function() {
		var this_button = $(this);
		this_button.addClass('clicked');
		this_button.parents('.main-container').addClass('adding');
		setTimeout(function() {
        	this_button.addClass('loading');
        }, 400);

        $(document.body).on('opened_product_quickview', function() {
    		this_button.parents('.main-container').removeClass('adding');
			this_button.removeClass('loading').removeClass('clicked');
		});
	});



	// Add to Cart

	$(document).on('click', '.buttons .ajax_add_to_cart, .buttons .add_to_cart_button', function() {
		var this_button = $(this);
		this_button.addClass('clicked');
		this_button.parents('.main-container').addClass('adding');
		setTimeout(function() {
        	this_button.addClass('loading');
        }, 400);

		$(document.body).on('wc_cart_button_updated', function() {
			this_button.removeClass('loading').removeClass('clicked');
			this_button.parents('.main-container').removeClass('adding');
			$('.header-cart').addClass('animated');
			setTimeout(function() {
	        	$('.header-cart').removeClass('animated');
            }, 2000);

			if (this_button.siblings('.added_to_cart').length ) {
				var new_href = this_button.siblings('.added_to_cart').attr("href");
				var new_text = this_button.siblings('.added_to_cart').text();

				this_button.siblings('.added_to_cart').remove();
				this_button.attr("href", new_href);
				this_button.children('.tooltip').text(new_text);
				this_button.removeClass().addClass('button added wc-forward');

				// Open minicart ================
				/*$(".header-cart").addClass("minicart-open");
				$('.minicart').foundation('open');
				$(".header-cart a").trigger('mouseenter');
				$(document).on('hide.gb.dropdown', function() {
					$(".header-cart").removeClass("minicart-open");
				});*/
				// Open minicart ================
			}
		});
	});

})(jQuery);
