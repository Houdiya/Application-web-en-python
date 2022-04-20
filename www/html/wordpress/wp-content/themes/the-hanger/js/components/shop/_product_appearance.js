(function($){

	"use strict";

	// =============================================================================
	// Switch Products Appearance
	// =============================================================================

	var shop_display_grid_btn 	= $('.shop-tools .shop-display-grid');
	var shop_display_list_btn 	= $('.shop-tools .shop-display-list');
	var products_container 	= '.site-main-content > ul.products';

	if( wp_js_var.woo_ajax_layered_nav_plugin ) {
		var products_container 	= '.site-main-content #products ul.products';
	}

	function shop_display_grid() {
		shop_display_list_btn.removeClass('active');
		shop_display_grid_btn.addClass('active');
		$('body').find(products_container).removeClass('shop_display_list')
		Cookies.set("shop_display", "grid");
		display_grid_buttons_wrapper();

		if( wp_js_var.woo_ajax_layered_nav_plugin ) {
			$('.site-main-content section#products').css('height', 'auto');
		}
	}

	function shop_display_list() {
		shop_display_grid_btn.removeClass('active');
		shop_display_list_btn.addClass('active');
		$('body').find(products_container).addClass('shop_display_list');
		Cookies.set("shop_display", "list");

		if( wp_js_var.woo_ajax_layered_nav_plugin ) {
			$('.site-main-content section#products').css('height', 'auto');
		}
	}

	shop_display_grid_btn.on('click', function() {
		$.scrollTo('.site-main-content', 500, {
			offset: -100,
			onAfter: function() {
				requestAnimationFrame(function() {
					shop_display_grid();
					display_grid_buttons_wrapper();
					product_card_animation('reset');
				});
			}
		});
	});

	shop_display_list_btn.on('click', function() {
		$.scrollTo('.site-main-content', 500, {
			offset: -100,
			onAfter: function() {
				requestAnimationFrame(function() {
					shop_display_list();
					product_card_animation('reset');
				});
			}
		});
	});

	if (wp_js_var.is_customize_preview == 1) {
		if(wp_js_var.shop_display == 'list') {
			shop_display_list();
		} else {
			shop_display_grid();
		}
	} else {
		switch(Cookies.get('shop_display')) {
			case 'list':
				shop_display_list();
				break;
			case 'grid':
				shop_display_grid();
				break;
			default:
				if(wp_js_var.shop_display == 'list') {
					shop_display_list();
				} else {
					shop_display_grid();
				}
		}
	}

})(jQuery);
