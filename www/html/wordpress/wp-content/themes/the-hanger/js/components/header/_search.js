(function($) {
	
	"use strict";

	// =============================================================================
	// Header Search
	// =============================================================================
		
	// Init

	$(document).on( 'keyup', function(e) {
	    if( e.keyCode == 27 ) {
	    	$('.hover_overlay_body').removeClass('visible');
	    	$('.site-search.off-canvas .header_search_ajax_results_wrapper').removeClass('visible animated');
	    	return false;
    	}
	});

	if ( typeof $.fn.select2 === 'function' ) {
	
		$('.header_search_select').select2({
			minimumResultsForSearch: -1,
			allowClear: false,
			dropdownParent: $('.header_search_form'),
			containerCssClass: "select2_no_border",
			dropdownCssClass: "select2_no_border",
		});

	}

	// Show it

	$('.header_search_select_wrapper').addClass('visible');

	
	// Content Overlay

	$('.site-header-style-1 .header_search_select').on('select2:opening', function(e) {
	    $('.hover_overlay_content').addClass('visible');
	    $('.hover_overlay_footer').addClass('visible');
	    $(this).parents('form.header_search_form').addClass('active');
	});

	$('.site-header-style-1 .header_search_select').on('select2:closing', function(e) {
	    $('.hover_overlay_content').removeClass('visible');
	    $('.hover_overlay_footer').removeClass('visible');
	});

	$('.site-header-style-2 .simple-header-search').on('click', function() {
		$('.hover_overlay_body').addClass('visible');
	});

	$('.site-search.off-canvas .header-search .close-button').on('click', function() {
		$('.hover_overlay_body').removeClass('visible');
	});


	// Content Overlay

	// Open
	$('.site-header-style-1 .header_search_input_wrapper input').on('click', function() {
		$(this).parents('form.header_search_form').addClass('active');
	    $('.header_search_ajax_results_wrapper').addClass('visible animated');
	    if ($('.header_search_ajax_results').html() != '') {
		    $('.hover_overlay_content').addClass('visible');
		    $('.hover_overlay_footer').addClass('visible');
		}
	});

	$('.site-search.off-canvas .header_search_input_wrapper input').on('click', function() {
		$(this).parents('form.header_search_form').addClass('active');
	    $('.header_search_ajax_results_wrapper').addClass('visible animated');
	});

	$(".header-sticky .header-search").on( 'click', function() {
	    $('html, body').animate({
	        scrollTop: 0
	    }, 500);
	    

	    setTimeout(function() { 
        	$('.header_search_input_wrapper .header_search_input').focus().trigger('click');
        	$('.header-search .search-form .search-field').focus().trigger('click');
        }, 600); 
	});

	window.original_results = $('.header_search_ajax_results').html();

	// Start Close
	window.header_search_results_close = function(e) {

		var header_search_results_hiding = function(e) {
		    var container = $(".header_search_input_wrapper input, .header_search_ajax_results_wrapper");
		    if (!container.is(e.target) && container.has(e.target).length === 0) 
		    {
		        $('.header_search_ajax_results_wrapper').removeClass('animated');
		    }
		};

		var header_search_results_hide = gb_debounce(function(e) {
		    var container = $(".header_search_input_wrapper input, .header_search_ajax_results_wrapper");
		    if (!container.is(e.target) && container.has(e.target).length === 0) 
		    {
		        $('.header_search_ajax_results_wrapper').removeClass('visible');
		    }
		}, 300);

		var header_search_border = function(e) {
			var container = $('.header_search_form');
			if (!container.is(e.target) && container.has(e.target).length === 0) 
			{
				container.removeClass('active');
			}
		}

		var header_search_results_reset = gb_debounce(function(e) {
		    var container = $(".header_search_input_wrapper input, .header_search_ajax_results_wrapper");
		    if (!container.is(e.target) && container.has(e.target).length === 0) 
		    {
		        if(!$('.header_search_input').val()) {
		        	$('.header_search_ajax_results').html(window.original_results);
	        	}
		    }
		}, 400);

		header_search_results_hiding(e);
		header_search_results_hide(e);
		header_search_border(e);
		header_search_results_reset(e);

	}

	$(document).on('click', function(e) {
	    header_search_results_close(e);
	});

	$('.header_search_form').on('click', 'a.view-all', function(){
		$(this).parents('.header_search_form').submit();
	})
	// End Close
	
	// =============================================================================
	// WP Search
	// =============================================================================
	
	// Open
	$('.woocommerce-product-search input').on('click', function() {
		$(this).parents('form.woocommerce-product-search').addClass('active');
	});

	$('.search-form input').on('click', function() {
		$(this).parents('form.search-form').addClass('active');
	});

	// Close
	$(document).on('click', function(e) {
	    header_wp_search_border(e);
	    header_wc_search_border(e);
	});

	var header_wp_search_border = function(e) {
		var container = $('.search-form');
		if (!container.is(e.target) && container.has(e.target).length === 0) 
		{
			container.removeClass('active');
		}
	}

	var header_wc_search_border = function(e) {
		var container = $('.woocommerce-product-search');
		if (!container.is(e.target) && container.has(e.target).length === 0) 
		{
			container.removeClass('active');
		}
	}

})(jQuery);