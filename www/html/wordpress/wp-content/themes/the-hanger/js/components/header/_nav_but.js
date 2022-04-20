jQuery(function($) {
	
	"use strict";

	$(".gbt-mega-dropdown-wrapper").hoverIntent({
		
		interval: 100,
		timeout: 700,
		
		over: function() {
			$(this).addClass("is-active").trigger("show.gbt.megadropdown");
		},

		out: function() {
			$(this).removeClass("is-active").trigger("hide.gbt.megadropdown");
		}

	});

});