jQuery(function($) {

    "use strict";

    function getSuggestions() {
       

        var keyword=  $('.header_search_form input.header_search_input').val();
        var category= $('.header_search_form select.header_search_select').val();



        if (keyword.length >= 3 && keyword != keydown) {
            $.xhrPool.abortAll();
            $('.header_search_ajax_results').addClass('loading');
            $('form.header_search_form .header_search_button').addClass('loading');

            if ( search_cache[keyword+category] !== undefined) {
                $('.header_search_ajax_results').html('<div class="ajax_results_wrapper">' + search_cache[keyword+category] + '</div>');
                $('.header_search_ajax_results').removeClass('loading');
                $('form.header_search_form .header_search_button').removeClass('loading');
            } else {        
                $.ajax({
                    type: 'GET',
                    url: wp_js_var.ajax_url,
                    cache: true,
                    data: {
                        "action" : "getbowtied_ajax_search",
                        "search_keyword"    : keyword,
                        "search_category"   : category
                    },
                    dataType: "json",
                    contentType: "application/json",
                    success: function( results ) {
                        if( $('header').hasClass('site-header-style-1') ) {
                            $('.hover_overlay_content').addClass('visible');
                            $('.hover_overlay_footer').addClass('visible');
                        }
                        search_cache[keyword+category]= results.suggestions;
                        $('.header_search_ajax_results').html('<div class="ajax_results_wrapper">' + results.suggestions + '</div>');
                        $('.header_search_ajax_results').removeClass('loading');
                        $('form.header_search_form .header_search_button').removeClass('loading');
                    }, 

                    always: function( results ) {
                       $('.header_search_ajax_results').removeClass('loading');
                       $('form.header_search_form .header_search_button').removeClass('loading');
                    }
                });
            }
        }
    };

    $.xhrPool = [];
    $.xhrPool.abortAll = function() {
        $(this).each(function(i, jqXHR) {   //  cycle through list of recorded connection
            jqXHR.abort();  //  aborts connection
            $.xhrPool.splice(i, 1); //  removes from list by index
        });
    }
    $.ajaxSetup({
        beforeSend: function(jqXHR) { $.xhrPool.push(jqXHR); }, //  annd connection to list
        complete: function(jqXHR) {
            var i = $.xhrPool.indexOf(jqXHR);   //  get index for current connection completed
            if (i > -1) $.xhrPool.splice(i, 1); //  removes from list by index
        }
    });

    var search_cache=  new Array;

    var keydown  = $('.header_search_form input.header_search_input').val();

    $('input.header_search_input').on('keydown', function(e) {
        keydown = $(this).val();
    })

    $('input.header_search_input').on('keyup focus', function(e) {
        getSuggestions();
    });

    $('select.header_search_select').change(function() {
        var keyword=  $('.header_search_form input.header_search_input').val();

        if ( keyword.length >= 3 ) {
            getSuggestions();
            $('input.header_search_input').trigger('click');
        }
    });

    $('form.header_search_form').on('click', 'span.view-all a', function(){
        $(this).parents('form.header_search_form').submit();
    })
})