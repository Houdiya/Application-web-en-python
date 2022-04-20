jQuery(function($) {

	"use strict";

	// =================================================================================================

	function showNextSlide(container)
	{
		var itemToHide = container.children('.gbt-stack-item-front'),
			itemToShow = container.children('.gbt-stack-item-middle'),
			itemMiddle = container.children('.gbt-stack-item-back'),
			itemToBack = container.children('.gbt-stack-item-out').eq(0);

		itemToHide.addClass('item-moved').removeClass('gbt-stack-item-front');
		itemToShow.addClass('gbt-stack-item-front').removeClass('gbt-stack-item-middle');
		itemMiddle.addClass('gbt-stack-item-middle').removeClass('gbt-stack-item-back');
		itemToBack.addClass('gbt-stack-item-back').removeClass('gbt-stack-item-out');
	}

	function showPreviousSlide(container)
	{
		var itemToShow 	 = container.children('.item-moved').slice(-1),
			itemToMiddle = container.children('.gbt-stack-item-front'),
			itemToBack   = container.children('.gbt-stack-item-middle'),			
			itemToOut    = container.children('.gbt-stack-item-back');

		itemToShow.removeClass('item-moved').addClass('gbt-stack-item-front');
		itemToMiddle.removeClass('gbt-stack-item-front').addClass('gbt-stack-item-middle');
		itemToBack.removeClass('gbt-stack-item-middle').addClass('gbt-stack-item-back');
		itemToOut.removeClass('gbt-stack-item-back').addClass('gbt-stack-item-out');
	}

	function updateNavigation(navigation, container)
	{
		var isNextActive = (container.find('.gbt-stack-item-middle').length > 0) ? true : false,
			isPrevActive = (container.children('dt').eq(0).hasClass('gbt-stack-item-front')) ? false : true;
		(isNextActive) ? navigation.find('.next').removeClass('hidden') : navigation.find('.next').addClass('hidden');
		(isPrevActive) ? navigation.find('.prev').removeClass('hidden') : navigation.find('.prev').addClass('hidden');
	}
	
	// =================================================================================================

	updateNavigation($('.gbt-stack-nav'), $('.gbt-stack-items'));

	$('.gbt-stack-nav').on('click', 'a', function(e) {
		var container = $(e.delegateTarget).siblings('.gbt-stack-items');
		
		$(this).hasClass('next') ? showNextSlide(container) : showPreviousSlide(container);
		updateNavigation($(e.delegateTarget), container);
	});

});