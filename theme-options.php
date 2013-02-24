<?php
/**
 * Define the Tabs appearing on the Theme Options page
 * Tabs contains sections
 * Options are assigned to both Tabs and Sections
 * See README.md for a full list of option types
 */

$general_settings_tab = array(
    "name" => "general_tab",
    "title" => __( "General", "gpp" ),
    "sections" => array(
        "general_section_1" => array(
            "name" => "general_section_1",
            "title" => __( "General", "gpp" ),
            "description" => __( "", "gpp" )
        )
    )
);

gpp_register_theme_option_tab( $general_settings_tab );

$colors_tab = array(
    "name" => "colors_tab",
    "title" => __( "Colors", "gpp" ),
    "sections" => array(
        "colors_section_1" => array(
            "name" => "colors_section_1",
            "title" => __( "Colors", "gpp" ),
            "description" => __( "", "gpp" )
        )
    )
);

gpp_register_theme_option_tab( $colors_tab );

$slideshow_tab = array(
    "name" => "slideshow_tab",
    "title" => __( "Slideshow", "gpp" ),
    "sections" => array(
        "slideshow_section_1" => array(
            "name" => "slideshow_section_1",
            "title" => __( "Slideshow", "gpp" ),
            "description" => __( "", "gpp" )
        )
    )
);

gpp_register_theme_option_tab( $slideshow_tab );

 /**
 * The following example shows you how to register theme options and assign them to tabs and sections:
*/
$options = array(
    'logo' => array(
        "tab" => "general_tab",
        "name" => "logo",
        "title" => "Logo",
        "description" => __( "Use a transparent png or jpg image", "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "image",
        "default" => ""
    ),
    'favicon' => array(
        "tab" => "general_tab",
        "name" => "favicon",
        "title" => "Favicon",
        "description" => __( "Use a transparent png or ico image", "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "image",
        "default" => ""
    ),
	
	'gpp_meta' => array(
        "tab" => "general_tab",
        "name" => "gpp_meta",
        "title" => "Metadata",
        "description" => __( 'Check this to show the metadata', "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "checkbox",
		"default" => array("show"),
		"valid_options" => array(
            "show" => array(
                "name" => "show",
                "title" => __( "Show", "gpp" )
            )
        )
	),
    'font' => array(
        "tab" => "general_tab",
        "name" => "font",
        "title" => "Headline Font",
        "description" => __( '<a href="' . get_option('siteurl') . '/wp-admin/admin-ajax.php?action=fonts&font=header&height=600&width=640" class="thickbox">Preview and choose a font</a>', "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "select",
        "default" => "Allan",
        "valid_options" => gpp_font_array()
    ),
    'font_alt' => array(
        "tab" => "general_tab",
        "name" => "font_alt",
        "title" => "Body Font",
        "description" => __( '<a href="' . get_option('siteurl') . '/wp-admin/admin-ajax.php?action=fonts&font=body&height=600&width=640" class="thickbox">Preview and choose a font</a>', "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "select",
        "default" => "Allan",
        "valid_options" => gpp_font_array()
    ),
	'categories' => array(
        "tab" => "general_tab",
        "name" => "categories",
        "title" => "Blog Category",
        "description" => __( 'Select your blog category', "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "checkbox",
		"default" => array("uncategorized"),
		"valid_options" => gpp_get_taxonomy_list()
    ),
    'color' => array(
        "tab" => "colors_tab",
        "name" => "color",
        "title" => "Color",
        "description" => __( "Select a color palette", "gpp" ),
        "section" => "colors_section_1",
        "since" => "1.0",
        "id" => "colors_section_1",
        "type" => "select",
        "default" => "",
        "valid_options" => array(
            "light" => array(
                "name" => "light",
                "title" => __( "Light", "gpp" )
            ),
            "dark" => array(
                "name" => "dark",
                "title" => __( "Dark", "gpp" )
            )
        )
    ),
    "css" => array(
        "tab" => "colors_tab",
        "name" => "css",
        "title" => "Custom CSS",
        "description" => __( "Add some custom CSS to your theme.", "gpp" ),
        "section" => "colors_section_1",
        "since" => "1.0",
        "id" => "colors_section_1",
        "type" => "textarea",
        "sanitize" => "html",
        "default" => ""
    ),
    "slideshow" => array(
        "tab" => "slideshow_tab",
        "name" => "slideshow",
        "title" => "Slideshow Images",
        "description" => __( "Select or create a gallery of images to use in the homepage slideshow.", "example" ),
        "section" => "slideshow_section_1",
        "since" => "1.0",
        "id" => "slideshow_section_1",
        "type" => "gallery",
        "default" => ""
    )
);

gpp_register_theme_options( $options );

?>