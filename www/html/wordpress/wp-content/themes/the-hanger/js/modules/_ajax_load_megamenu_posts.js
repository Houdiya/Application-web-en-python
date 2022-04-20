jQuery(function($) {
	
	"use strict";

	// 0 for mega
	// 1 for nav 
	var posts_cache = new Array(new Array, new Array);
	posts_cache[0]['all']= $('.header-megamenu-placeholder .megamenu_posts').html();
	posts_cache[1]['all']= $('.gbt-mega-dropdown .megamenu_posts').html();
	var target = new Array();
	target[0]= '.header-megamenu-placeholder .megamenu_posts';
	target[1]= '.gbt-mega-dropdown-wrapper .megamenu_posts';

	$('.gbt-mega-menu-content .megamenu_posts_category_list a').on({
		mouseenter: function() {
			if ( $(this).parents('.header-mobiles-wrapper').length == 0 )
			{
				$('.megamenu_posts_overlay').addClass('on');
			}
		},
		mouseout: function() {
			if ( $(this).parents('.header-mobiles-wrapper').length == 0 )
			{
				$('.megamenu_posts_overlay').removeClass('on');
			}
		}
	});

	$('.gbt-mega-menu-content .megamenu_posts_category_list a').hoverIntent({
		
		over: function() {
			if ( $(this).parents('.header-mobiles-wrapper').length == 0 )
			{
				var catid = $(this).attr('data-catid');
				var menuType = $(this).parents('.gbt-mega-dropdown-wrapper').length;

				if (posts_cache[menuType][catid]!== undefined) {
					setTimeout(function() {
						$(target[menuType]).html(posts_cache[menuType][catid]);
						$(target[menuType]).children('.megamenu_posts_overlay').removeClass('on');
					}, 500)

					
				} else {
					$(target[menuType]).addClass('loading');
					jQuery.post(
					    wp_js_var.ajax_url, 
					    {
					        'action': 'getbowtied_ajax_posts',
					        'catid':   catid,
					        'menuType': menuType
					    }, 
					    function(response){

					        if (response != 0) {
					        	posts_cache[menuType][catid]= response;
					        	$(target[menuType]).html(response).imagesLoaded(function(){
						        	$(target[menuType]).removeClass('loading');
						        	setTimeout(function() {
							        	$(target[menuType]).children('.megamenu_posts_overlay').removeClass('on');
							        }, 500)
						        });
					        }
					    }
					);
				}
			}
		},

		out: function() {

		},
	});
});