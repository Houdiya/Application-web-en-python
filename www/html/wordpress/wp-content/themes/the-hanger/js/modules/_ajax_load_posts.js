jQuery(function($) {
	
	"use strict";

	//comming from wp_localize_script

	//wp_js_var.blog_pagination_type
	//wp_js_var.blog_layout	
	//wp_js_var.ajax_load_more_locale
	//wp_js_var.ajax_loading_locale
	//wp_js_var.ajax_no_more_items_locale

	var listing_class 		= ".blog-articles";
	var item_class 			= ".blog-articles article";
	var pagination_class 	= ".posts-navigation";
	var next_page_class 	= ".posts-navigation .nav-previous a";
	var ajax_button_class 	= ".posts_ajax_button";
	var ajax_loader_class 	= ".posts_ajax_loader";
	
	var ajax_load_items = {
	    
	    init: function() {

	        if (wp_js_var.blog_pagination_type == 'load_more_button' || wp_js_var.blog_pagination_type == 'infinite_scroll') {
	        
		        $( function() {
		            
		            if ($(pagination_class).length) {
		                
		                $(pagination_class).before('<div class="pagination-container"><div class="'+ajax_button_class.replace('.', '')+'" data-processing="0"></div></div>');

		            }		            		            

		        });
		        
		        $('body').on('click', ajax_button_class, function() {
		            
		            if ($(next_page_class).length) {
		                
		                $(ajax_button_class).attr('data-processing', 1).addClass('loading');  	                
		                
		                var href = $(next_page_class).attr('href');
		                
		                if( ! ajax_load_items.msieversion() ) {
							history.pushState(null, null, href);
						}

		                ajax_load_items.onstart();		            
		                
		                $.get(href, function(response) {
		                    
		                    $(pagination_class).html($(response).find(pagination_class).html());

		                    $(response).find(item_class).each(function() {

		                        $('.blog-articles > article:last').after($(this));		                        

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
	        
	        if (wp_js_var.blog_pagination_type == 'infinite_scroll') {

		        var buffer_pixels = Math.abs(0);
		        
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