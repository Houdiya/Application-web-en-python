<?php

/*
**	SLIDER
*/

//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name"			=> "Slider",
	"description"	=> "Slider",
	"base"			=> "slider",
	"class"			=> "",
	"icon"			=> get_template_directory_uri() . "/images/vc/slider-main.png",
	"as_parent" => array('only' => 'image_slide'),
	"content_element" => true,
	"params" => array(
        // add params same as with any other content element

 		array(
			"type"			=> "dropdown",
 			"holder"		=> "div",
 			"class" 		=> "hide_in_vc_editor",
 			"admin_label" 	=> true,
			"heading"		=> "Height",
			"std"			=> "no",
			"param_name"	=> "full_height",
			"value"			=> array('Full Height' => 'yes', 'Custom Height' => 'no'),
 		),

 		array(
 			"type"			=> "textfield",
 			"holder"		=> "div",
 			"class" 		=> "hide_in_vc_editor",
 			"admin_label" 	=> true,
			"heading"		=> "Custom Desktop Height",
			"param_name"	=> "custom_desktop_height",
 			"value"			=> "800px",
			"dependency"	=> array(
				"element" 	=> "full_height",
				"value"		=> array('no'),
			),
 		),

 		array(
 			"type"			=> "textfield",
 			"holder"		=> "div",
 			"class" 		=> "hide_in_vc_editor",
 			"admin_label" 	=> true,
			"heading"		=> "Custom Mobile Height",
			"param_name"	=> "custom_mobile_height",
 			"value"			=> "600px",
			"dependency"	=> array(
				"element" 	=> "full_height",
				"value"		=> array('no'),
			),
 		),

 		array(
			'type' => 'checkbox',
			'param_name' => 'slide_numbers',
			'heading' => 'Slide Numbers',
			'std' => 'true'
		),

		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Color Slide Numbers",
			"param_name"	=> "slide_numbers_color",
			"value"			=> "#000",
			"dependency"	=> array(
				"element" 	=> "slide_numbers",
				"value"		=> 'true',
			),
		),

    ),
    "js_view" => 'VcColumnView'
));

vc_map( array(
    "name" => 'Image Slide',
    "base" => "image_slide",
    "as_child" => array('only' => 'slider'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "icon"	=> get_template_directory_uri() . "/images/vc/slider.png",
    "params" => array(
        // add params same as with any other content element

        array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Title",
			"param_name"	=> "title",
			"value"			=> "",
		),

		array(
			"type"			=> "textarea",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Description",
			"param_name"	=> "description",
			"value"			=> "",
		),

		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Title & Description Text Color",
			"param_name"	=> "text_color",
			"value"			=> "#000000",
		),

		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "half_width hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Title Font Size",
			"param_name"	=> "title_font_size",
			"value"			=> "0.8125rem",
		),

		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "half_width hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Description Font Size",
			"param_name"	=> "description_font_size",
			"value"			=> "2.5rem",
		),

		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Button Text",
			"param_name"	=> "button_text",
			"value"			=> "",
		),

		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Button URL",
			"param_name"	=> "button_url",
			"value"			=> "",
		),

		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Slide Background Color",
			"param_name"	=> "bg_color",
			"value"			=> "#000000",
		),

		array(
			"type"			=> "attach_image",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Background Image",
			"param_name"	=> "bg_image",
			"value"			=> "",
		),

		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Text Align",
			"param_name"	=> "text_align",
			"value"			=> array(
				"Left"		=> "left",
				"Center"	=> "center",
				"Right"		=> "right",
			),
			"std"			=> "",
		),
    )
) );
//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Slider extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Image_Slide extends WPBakeryShortCode {
    }
}
