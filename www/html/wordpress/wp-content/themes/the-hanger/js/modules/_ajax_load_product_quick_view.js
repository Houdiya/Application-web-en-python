jQuery(function($) {
	
	"use strict";

	function product_quick_view_ajax(id) {
		
		$.ajax({
			
			url: wp_js_var.ajax_url,
			
			data: {
				"action" : "getbowtied_product_quick_view",
				'product_id' : id
			},

			success: function(results) {				
				$(".getbowtied_qv_content").empty().html(results);
				$("body").removeClass("progress");

				if ( typeof $.fn.select2 === 'function' ) {
					$('#getbowtied_woocommerce_quickview .variations_form select').select2({
						minimumResultsForSearch: -1,
						placeholder: wp_js_var.select_placeholder,
						allowClear: true,
						containerCssClass: "select2_no_border",
						dropdownCssClass: "select2_no_border",
					});
				}

				setTimeout(function() { 
					$( '#getbowtied_woocommerce_quickview .variations_form' ).each(function() {
						$(this).wc_variation_form();
					});
				}, 1100); 

				setTimeout(function() { 
		        	$( '#getbowtied_woocommerce_quickview .woocommerce-product-gallery' ).wc_product_gallery();
	            }, 1000); 

	            setTimeout(function() { 
   	        	 	$(document.body).trigger('opened_product_quickview');
		        	$('#getbowtied_woocommerce_quickview').addClass('open');
	            }, 500); 

	            setTimeout(function() { 
		        	$( '#getbowtied_woocommerce_quickview .getbowtied_qv_content' ).addClass('maybe_scroll');
	            }, 1200);

	           
			},
		});
	}

	function close_quickview_modal() {
		$('#getbowtied_woocommerce_quickview').removeClass('open');
        $('#getbowtied_woocommerce_quickview .getbowtied_qv_content').removeClass('maybe_scroll');
        $('#getbowtied_woocommerce_quickview .getbowtied_qv_content').empty();
        $(document.body).trigger('closed_product_quickview');
	}

    $('.site-content').on('click', '.getbowtied_product_quick_view_button', function(e) {
    	e.preventDefault();
        close_quickview_modal();
        var product_id  = $(this).data('product_id');
		product_quick_view_ajax(product_id);
    });

    $('#getbowtied_woocommerce_quickview').on('click', function(e) {
    	var containers = [
			".getbowtied_qv_content"
		];

		var container = $(containers.join(", "));
	    
	    if (!container.is(e.target) && container.has(e.target).length === 0) 
	    {
	        close_quickview_modal();
	    }
    });

    $('#getbowtied_woocommerce_quickview').on('click', 'button.close-button', function(e) {
    	close_quickview_modal();
    });
});
