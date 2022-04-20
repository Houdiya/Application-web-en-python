<?php 

/*
**	CUSTOM BUTTON
*/

vc_map( array(
	"name"			=> "Simple Link",
	"description"	=> "Simple Link",
	"base"			=> "gbt_custom_link",
	"class"			=> "",
	"icon"			=> "icon-wpb-ui-button",

	"params" => array(
	
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
 			"type"			=> "textfield",
 			"holder"		=> "div",
 			"class" 		=> "hide_in_vc_editor",
 			"admin_label" 	=> true,
			"heading"		=> "URL",
			"param_name"	=> "url",
 			"value"			=> "",
 		),

 		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Color",
			"param_name"	=> "color",
			"value"			=> "#000",
		),
	)
) );