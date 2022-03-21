<?php
/**
 * Comet Pro functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @since Comet Pro 1.0
 */

// Theme setup functions
function cometpro_setup_theme() {
    // Text Domain
    load_theme_textdomain( 'cometpro', get_template_directory() . '/lang' );

    // Theme supports
    add_theme_support( 'post-thumbnail' );
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'cometpro_setup_theme' );

// Register Google fonts
function cometpro_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /*
    * translators: If there are characters in your language that are not supported
    * by Montserrat, translate this to 'off'. Do not translate into your own language.
    */
    if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'cometpro' ) ) {
        $fonts[] = 'Montserrat:400,700';
    }

    /*
    * translators: If there are characters in your language that are not supported
    * by Merriweather, translate this to 'off'. Do not translate into your own language.
    */
    if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'cometpro' ) ) {
        $fonts[] = 'Raleway:300,400,500';
    }

    /*
    * translators: If there are characters in your language that are not supported
    * by Inconsolata, translate this to 'off'. Do not translate into your own language.
    */
    if ( 'off' !== _x( 'on', 'Halant font: on or off', 'cometpro' ) ) {
        $fonts[] = 'Halant:300,400';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg(
            array(
                'family'  => urlencode( implode( '|', $fonts ) ),
                'subset'  => urlencode( $subsets ),
                'display' => urlencode( 'fallback' ),
            ),
            'https://fonts.googleapis.com/css'
        );
    }

    return $fonts_url;
}

// Including Stylesheets
function cometpro_styles_enqueue() {
    wp_enqueue_style( 'cometpro-style', get_stylesheet_uri() );
    wp_enqueue_style( 'bundle', get_template_directory_uri() . '/css/bundle.css', [], '3.3.5', 'all' );
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/style.css', [], '1.0.0', 'all' );

    // Custom fonts
    wp_enqueue_style( 'google-fonts', cometpro_fonts_url() , [], null );
}
add_action( 'wp_enqueue_scripts', 'cometpro_styles_enqueue' );





