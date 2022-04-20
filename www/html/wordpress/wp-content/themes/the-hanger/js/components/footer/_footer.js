(function($){

	"use strict";

	// =============================================================================
	// Widget Area Trigger
	// =============================================================================

	$('.trigger-footer-widget-icon').on('click', function() {
		
		var trigger = $(this).parent();

		trigger.fadeOut('1000',function(){
			trigger.remove();
			$('.widget-area').fadeIn();
		});
	});

})(jQuery);