<?php

/******************************************************************************/
/* Archive Meta **************************************************************/
/******************************************************************************/

if ( ! function_exists( 'getbowtied_posted_on' ) ) :

	function getbowtied_posted_on() {
		
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			get_the_date( DATE_W3C ),
			get_the_date()
		);

		return '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

	}

endif;