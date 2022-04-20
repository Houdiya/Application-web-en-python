(function($) {

	"use strict";

	var add_to_wishlist_button = $('.add_to_wishlist');

	add_to_wishlist_button.on('click',function(){
		$(this).parents('.yith-wcwl-add-button').addClass('loading');
	});

	$('.add_to_wishlist').removeClass('button');

})(jQuery);
