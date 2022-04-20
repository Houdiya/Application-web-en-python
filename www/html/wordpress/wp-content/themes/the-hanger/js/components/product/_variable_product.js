(function($) {
	
	"use strict";

	// =============================================================================
	// Select2
	// =============================================================================

	if ( typeof $.fn.select2 === 'function' ) {
		$('.variations_form select').select2({
			minimumResultsForSearch: -1,
			placeholder: wp_js_var.select_placeholder,
			allowClear: true,
			containerCssClass: "select2_no_border",
			dropdownCssClass: "select2_no_border",
		});
	}

})(jQuery);