<?php

// [slider]

function getbowtied_slider($params = array(), $content = null) {

	wp_enqueue_script('swiper');
	wp_enqueue_style('swiper');
	wp_enqueue_script('thehanger-slider-script');
	wp_enqueue_style('thehanger-slider-styles');

	extract(shortcode_atts(array(
		'full_height' 		  	   	=> 'no',
		'custom_desktop_height' 	=> '800px',
		'custom_mobile_height' 	  	=> '600px',
		'slide_numbers'		  		=> 'true',
		'slide_numbers_color' 		=> '#000'
	), $params));

	if ( $full_height == 'no' && ( !empty($custom_desktop_height) || !empty($custom_mobile_height) ) ) {
		$extra_class = '';
	} else {
		$extra_class = 'full_height';
	}

	if ($full_height == 'no' && !empty($custom_desktop_height)) {
		$desktop_height = 'height:'.$custom_desktop_height.';';
	} else {
		$desktop_height = '';
	}

	if ($full_height == 'no' && !empty($custom_mobile_height)) {
		$mobile_height = '@media all and (max-width: 768px){.shortcode_getbowtied_slider{ height:'.$custom_mobile_height.'!important;}}';
	} else {
		$mobile_height = '';
	}

	$unique = uniqid();

	$getbowtied_slider = '

		<div class="shortcode_getbowtied_slider swiper-container swiper-'.esc_attr($unique).' '.$extra_class.'" style="'.$desktop_height.' width: 100%" data-id="'.esc_attr($unique).'">
			<div class="swiper-wrapper">
			'.do_shortcode($content).'
			</div>';

    if ($slide_numbers):
    	$getbowtied_slider .= '<div class="quickview-pagination shortcode-slider-pagination" style="color: ' . $slide_numbers_color . '"></div>';
    endif;

	$getbowtied_slider .=	'</div>';

	$getbowtied_slider .= '<style>'.$mobile_height.' .swiper-pagination-bullet-active:after{ background-color: '.$slide_numbers_color.' } </style>';

	return $getbowtied_slider;
}

add_shortcode('slider', 'getbowtied_slider');

function getbowtied_image_slide($params = array(), $content = null) {
	extract(shortcode_atts(array(
		'title' 					=> '',
		'description' 				=> '',
		'text_color'				=> '#000000',
		'button_text' 				=> '',
		'button_url'				=> '',
		'bg_color'					=> '#CCCCCC',
		'bg_image'					=> '',
		'title_font_size'			=> '0.8125rem',
		'description_font_size' 	=> '2.5rem',
		'text_align'				=> 'left'

	), $params));

	$class = 'left-align';
	switch ($text_align)
	{
		case 'left':
			$class = 'left-align';
			break;
		case 'right':
			$class = 'right-align';
			break;
		case 'center':
			$class = 'center-align';
	}

	if (!empty($title))
	{
		$title = '<p class="slide-title" style="font-size:'.$title_font_size.';color:'.$text_color.';">'.$title.'</p>';
	} else {
		$title = "";
	}

	if (is_numeric($bg_image))
	{
		$bg_image = wp_get_attachment_url($bg_image);
	} else {
		$bg_image = "";
	}

	if (!empty($description))
	{
		$description = '<h2 class="slide-description" style="font-size:'.$description_font_size.';color:rgb('.getbowtied_hex2rgb($text_color).');">'.$description.'</h2>';
	} else {
		$description = "";
	}

	if (!empty($button_text))
	{
		$button = '<a class="slide-button" style="border-color:rgb('.getbowtied_hex2rgb($text_color).'); color:rgb('.getbowtied_hex2rgb($text_color).');" href="'.$button_url.'">'.$button_text.'</a>';
	} else {
		$button = "";
	}

	$getbowtied_image_slide = '

		<div class="swiper-slide '.$class.'"
		style=	"background: '.$bg_color.' url('.$bg_image.') center center no-repeat ;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				color: '.$text_color.'">
			<div class="slider-content" data-swiper-parallax="-1000">
				<div class="slider-content-wrapper">
					'.$title.'
					'.$description.'
					'.$button.'
				</div>
			</div>
		</div>';

	return $getbowtied_image_slide;
}

add_shortcode('image_slide', 'getbowtied_image_slide');

add_action( 'wp_enqueue_scripts', 'getbowtied_th_shortcodes_scripts', 99 );
function getbowtied_th_shortcodes_scripts() {

	wp_register_style('thehanger-slider-styles',
		plugins_url( 'assets/css/slider.css', dirname(__FILE__) ),
		NULL
	);

	wp_register_script('thehanger-slider-script',
		plugins_url( 'assets/js/slider.js', dirname(__FILE__) ),
		array('jquery')
	);
}
