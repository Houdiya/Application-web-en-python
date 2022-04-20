(function($){

	"use strict";

	//===============================================================
	// Global Debounce
	//===============================================================

	// Returns a function, that, as long as it continues to be invoked, will not
	// be triggered. The function will be called after it stops being called for
	// N milliseconds. If `immediate` is passed, trigger the function on the
	// leading edge, instead of the trailing.

	window.gb_debounce = function(func, wait, immediate) {
		var timeout;
		return function() {
			var context = this, args = arguments;
			var later = function() {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	};


	//===============================================================
	// Global Throttle
	//===============================================================

	// Returns a function, that, as long as it continues to be invoked, will only
	// trigger every N milliseconds. If <code>immediate</code> is passed, trigger the 
	// function on the leading edge, instead of the trailing.

	window.gb_throttle = function(func, wait, immediate) {
		var timeout;
		return function() {
			var context = this, args = arguments;
			var later = function() {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			if ( !timeout ) timeout = setTimeout( later, wait );
			if (callNow) func.apply(context, args);
		};
	};

	
	//===============================================================
	// Scroll Detection
	//===============================================================

	window.scroll_position = $(window).scrollTop();
	window.scroll_direction = 'fixed';

	function scroll_detection() {
		var scroll = $(window).scrollTop();
	    if (scroll > window.scroll_position) {
	        window.scroll_direction = 'down';
	    } else {
	        window.scroll_direction = 'up';
	    }
	    window.scroll_position = scroll;
	}

	$(window).on( 'scroll', function() {        
        scroll_detection();
    });

})(jQuery);