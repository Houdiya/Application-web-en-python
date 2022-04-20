<?php

$custom_code .= '

	.row
	{
		max-width: ' . esc_html(GBT_Opt::getOption('site_width')) . 'px;
	}

	.site-bg-color,
	body
	{
		background-color: ' . esc_html(GBT_Opt::getOption('bg_color')) . ';
	}
';

if ( 1 == GBT_Opt::getOption('site_width_full') ) :
	$custom_code .= '
		.row
		{
			max-width: 100%;
		}
	';
endif;

?>
