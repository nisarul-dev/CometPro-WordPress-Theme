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

// Including Stylesheets
function cometpro_styles_enqueue() {
    wp_enqueue_style( 'cometpro-style', get_stylesheet_uri() );
    wp_enqueue_style( 'bundle', get_template_directory_uri() . '/css/bundle.css', [], '3.3.5', 'all' );
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/style.css', [], '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'cometpro_styles_enqueue' );


