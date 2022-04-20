jQuery(function($) {
	
	"use strict";

	/*
		Comming from wp_localize_script

		-> wp_js_var.shop_pagination_type
	*/

	var listing_class 		= ".products";
	var item_class 			= ".products > .product";
	var pagination_class 	= "body.woocommerce-shop .woocommerce-pagination";
	var next_page_class 	= ".woocommerce-pagination a.next";
	var ajax_button_class 	= ".products_ajax_button";
	var ajax_loader_class 	= ".products_ajax_loader";
	
	var ajax_load_items = {
	    
	    init: function() {

	        if (wp_js_var.shop_pagination_type == 'load_more_button' || wp_js_var.shop_pagination_type == 'infinite_scroll') {
	        
		        $( function() {
		            
		            if ($(pagination_class).length) {
		                
		                $(pagination_class).before('<div class="'+ajax_button_class.replace('.', '')+'" data-processing="0"></div>');

		            }		            		            

		        });
		        
		        $('body').on('click', ajax_button_class, function() {
		            
		            if ($(next_page_class).length) {
		                
		                $(ajax_button_class).attr('data-processing', 1).addClass('loading');                
		                
		                var href = $(next_page_class).attr('href');
		                
		                /*if( ! ajax_load_items.msieversion() ) {
							history.pushState(null, null, href);
						}*/

		                ajax_load_items.onstart();
		                
		                $.get(href, function(response) {
		                    
		                    $(pagination_class).html($(response).find(".woocommerce-pagination").html());

		                    $(response).find(item_class).each(function(i) {

		                    	$(this).find('.product_image.with_second_image').addClass('second_image_loaded');

		                        $(listing_class).append($(this));

								/*$(this).imagesLoaded(function() {
									product_card_animation('ajax');
								});*/
		                        
		                    });
                   
		                    $(ajax_button_class).attr('data-processing', 0).removeClass('loading');
		                    
		                    ajax_load_items.onfinish();

		                    if ($(next_page_class).length == 0) {
		                        $(ajax_button_class).addClass('disabled').show();
		                    } else {
		                    	$(ajax_button_class).show();
		                    }
		                });

		            } else {
		                		                
		                $(ajax_button_class).addClass('disabled').show();

		            }

		        });

	        }
	        
	        if (wp_js_var.shop_pagination_type == 'infinite_scroll') {

		        var buffer_pixels = Math.abs(100);
		        
		        $(window).on( 'scroll', function() {
		           
		            if ($(listing_class).length) {
		                
		                var a = $(listing_class).offset().top + $(listing_class).outerHeight();
		                var b = a - $(window).scrollTop();
		                
		                if ((b - buffer_pixels) < $(window).height()) {
		                    if ($(ajax_button_class).attr('data-processing') == 0) {
		                        $(ajax_button_class).trigger('click');
		                    }
		                }

		            }

		        });

	        }

	    },

	    onstart: function() {
	    },

	    onfinish: function() {
	    	
	    },

	    msieversion: function() {
	        var ua = window.navigator.userAgent;
	        var msie = ua.indexOf("MSIE ");

	        if (msie > 0)
	            return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)));

	        return false;
	    },

	};

	ajax_load_items.init();
	//ajax_load_items.onfinish();

});