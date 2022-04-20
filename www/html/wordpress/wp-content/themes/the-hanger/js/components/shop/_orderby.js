(function($) {
	
	"use strict";

	// =============================================================================
	// Shop Archive Orderby Select Options
	// =============================================================================
		
	if ( typeof $.fn.select2 === 'function' ) {
	
		$('.woocommerce-ordering .orderby').select2({
			minimumResultsForSearch: -1,
			placeholder: wp_js_var.select_placeholder,
			dropdownParent: $('.woocommerce-archive-header-inside'),
			allowClear: false,
			dropdownAutoWidth: true,
		})
		/*.on('.woocommerce-ordering select2:open', function () {
			$('span.select2-results').parent().parent().addClass('bigdropdown').css({ 
				'width': $('.woocommerce-ordering').outerWidth() + $('.shop-tools').outerWidth() + parseInt($('.woocommerce-ordering').css('marginRight'))
			});
		});*/
	}

})(jQuery);