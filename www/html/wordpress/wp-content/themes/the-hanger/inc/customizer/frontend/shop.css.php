<?php

if ( (!empty(GBT_Opt::getOption('shop_mobile_columns'))) && (GBT_Opt::getOption('shop_mobile_columns') == 1) ) :

	$custom_code .= '
	    @media screen and ( max-width: 480px )
	    {
	        ul.products:not(.shop_display_list) .product
	        {
	            width: 100%;
	        }
	    }
	';
	
endif;

?>