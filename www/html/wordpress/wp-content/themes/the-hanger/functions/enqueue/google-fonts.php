<?php

// =============================================================================
// Enqueue Google Fonts
// =============================================================================

if ( ! function_exists('getbowtied_google_fonts') ) :
function getbowtied_google_fonts() {

	$mfont = GBT_Opt::getOption('main_font');
	$sfont = GBT_Opt::getOption('secondary_font');

	$main_font 					= $mfont['font-family'];
	$main_font_variants 		= array($mfont['variant'], '400', '700');
	$main_font_subsets 			= $mfont['subsets'];

	$secondary_font 			= $sfont['font-family'];	
	$secondary_font_variants 	= $sfont['variant'];	

	$main_family = FALSE;
	$secondary_family = FALSE;
	$font_family = FALSE;
	$subsets = '';

	$haystack 	= array($main_font, $secondary_font);
	$target 	= array_keys(Kirki_Fonts::get_google_fonts());

	if ( count(array_intersect($haystack, $target)) > 0 ) :

		if (!empty($main_font) && isset($mfont['downloadFont']) && $mfont['downloadFont'] !== true )
		{
			$main_family = $main_font.':';
			foreach ($main_font_variants as $variant)
			{
				$main_family .= $variant.',';
			}

			$main_family = rtrim($main_family, ',');
		} 

		if (!empty($secondary_font) && count(array_intersect(array($secondary_font), $target)) > 0 && isset($sfont['downloadFont']) && $sfont['downloadFont'] !== true )
		{
			$secondary_family = $secondary_font.':';
			$secondary_family .= $secondary_font_variants.',';
			$secondary_family = rtrim($secondary_family, ',');
		}

		if ( !empty($main_family) && !empty($secondary_family) )
		{
			$font_family = str_replace( '%2B', '+', urlencode( $main_family.'|'.$secondary_family ) );
		}
		elseif ( !empty($main_family) )
		{
			$font_family = str_replace( '%2B', '+', urlencode( $main_family ) );
		}
		elseif ( !empty($secondary_family) )
		{
			$font_family = str_replace( '%2B', '+', urlencode( $secondary_family ) );
		}



		if (!empty($main_font_subsets ))
		{
			$subsets .= urlencode( implode( ',', $main_font_subsets ) );
		}


		if ( !empty($font_family) ):
			$query_args = array(
				'family' => $font_family,
				'subset' => $subsets
			);

			$fonts_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
			wp_enqueue_style( 'getbowtied_google_fonts', $fonts_url, array(), null );

		endif;

	endif;
}            
	add_action('wp_head', 'getbowtied_google_fonts', 0);
endif;