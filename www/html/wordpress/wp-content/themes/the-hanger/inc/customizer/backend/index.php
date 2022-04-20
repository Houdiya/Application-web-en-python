<?php

// ==================================================================
// Remove Customize Pages
// ==================================================================

add_action('admin_menu', 'remove_customize_pages');
function remove_customize_pages(){
    global $submenu;

    unset($submenu['themes.php'][15]); // remove Header link
    unset($submenu['themes.php'][20]); // remove Background link
}


// ==================================================================
// Custom Controls
// ==================================================================

add_action( 'customize_register', function( $wp_customize ) {

    class Kirki_Control_Separator extends Kirki_Control_Base {
        public $type = 'separator';
        public function render_content() { ?>
            <hr />
            <?php
        }
    }

    add_filter( 'kirki_control_types', function( $controls ) {
        $controls['separator'] = 'Kirki_Control_Separator';
        return $controls;
    } );

} );

// ==================================================================
// Control Config
// ==================================================================

Kirki::add_config( 'thehanger', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
) );

// ==================================================================
// Custom Fonts
// ==================================================================

function getbowtied_custom_fonts_to_kirki( $fonts ) {
    $fonts = array(
        'NeueEinstellung' => array(
            'label' => 'NeueEinstellung',
            'stack' => 'NeueEinstellung',
            'variants'=> array('500')
        ));
        $fonts["Arial, Helvetica, sans-serif"] = array(
        "label" => "Arial, Helvetica, sans-serif",
        "stack" => "Arial, Helvetica, sans-serif",
        );

        $fonts["Arial Black, Gadget, sans-serif"] = array(
            "label" => "Arial Black, Gadget, sans-serif",
            "stack" => "Arial Black, Gadget, sans-serif",
        );

        $fonts["Bookman Old Style, serif"] = array(
            "label" => "Bookman Old Style, serif",
            "stack" => "Bookman Old Style, serif",
        );

        $fonts["Comic Sans MS, cursive"] = array(
            "label" => "Comic Sans MS, cursive",
            "stack" => "Comic Sans MS, cursive",
        );

        $fonts["Courier, monospace"] = array(
            "label" => "Courier, monospace",
            "stack" => "Courier, monospace",
        );

        $fonts["Garamond, serif" ] = array(
            "label" => "Garamond, serif" ,
            "stack" => "Garamond, serif" ,
        );

        $fonts["Georgia, serif"] = array(
            "label" => "Georgia, serif",
            "stack" => "Georgia, serif",
        );

        $fonts["Impact, Charcoal, sans-serif"] = array(
            "label" => "Impact, Charcoal, sans-serif",
            "stack" => "Impact, Charcoal, sans-serif",
        );

        $fonts["Lucida Console, Monaco, monospace"] = array(
            "label" => "Lucida Console, Monaco, monospace",
            "stack" => "Lucida Console, Monaco, monospace",
        );

        $fonts["MS Sans Serif, Geneva, sans-serif"] = array(
            "label" => "MS Sans Serif, Geneva, sans-serif",
            "stack" => "MS Sans Serif, Geneva, sans-serif",
        );

        $fonts["MS Serif, New York, sans-serif"] = array(
            "label" => "MS Serif, New York, sans-serif",
            "stack" => "MS Serif, New York, sans-serif",
        );

        $fonts["Palatino Linotype, Book Antiqua, Palatino, serif"] = array(
            "label" => "Palatino Linotype, Book Antiqua, Palatino, serif",
            "stack" => "Palatino Linotype, Book Antiqua, Palatino, serif",
        );

        $fonts["Tahoma,Geneva, sans-serif"] = array(
            "label" => "Tahoma,Geneva, sans-serif",
            "stack" => "Tahoma,Geneva, sans-serif",
        );

        $fonts["Times New Roman, Times,serif" ] = array(
            "label" => "Times New Roman, Times,serif" ,
            "stack" => "Times New Roman, Times,serif" ,
        );

        $fonts["Trebuchet MS, Helvetica, sans-serif"] = array(
            "label" => "Trebuchet MS, Helvetica, sans-serif",
            "stack" => "Trebuchet MS, Helvetica, sans-serif",
        );

        $fonts["Verdana, Geneva, sans-serif" ] = array(
            "label" => "Verdana, Geneva, sans-serif" ,
            "stack" => "Verdana, Geneva, sans-serif" ,
        );

        return $fonts;
}
add_filter( 'kirki/fonts/standard_fonts', 'getbowtied_custom_fonts_to_kirki' );
