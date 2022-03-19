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
function commetpro_setup_theme() {
    // Text Domain
    load_theme_textdomain( 'cometpro', get_template_directory() . '/lang' );
}
add_action( 'after_setup_theme', 'commetpro_setup_theme' );





