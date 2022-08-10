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
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );

    // Post Formats
    add_theme_support( 'post-formats', [
        'video',
        'quote',
        'gallery',
        'audio',
    ] );
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

// Including Conditional Scripts
function cometpro_conditional_scripts_enqueue() {
    wp_enqueue_script( 'html5shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', [], null, false );
    wp_script_add_data( 'html5shim', 'conditional', 'lt IE 9');

    wp_enqueue_script( 'respond', 'https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js', [], null, false );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9');
}
add_action( 'wp_enqueue_scripts', 'cometpro_conditional_scripts_enqueue' );

// Including Scripts
function cometpro_scripts_enqueue() {
    //wp_enqueue_script( 'jq', get_template_directory_uri() . '/js/jquery.js', [], '1.11.3', true );
    wp_enqueue_script( 'bundle', get_template_directory_uri() . '/js/bundle.js', [ 'jquery' ], '3.3.5', true );
    wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp', [ 'jquery' ], null, true );
    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main.js', [ 'jquery', 'bundle' ], '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'cometpro_scripts_enqueue' );

// Including Admin Scripts
function cometpro_admin_scripts_enqueue() {
    global $pagenow;
    if( get_post_type() == 'post' && $pagenow == 'post.php' ) {
        wp_enqueue_script( 'admin-script', get_template_directory_uri() . '/js/admin-area/wp-admin-edit-post.js', [], '1.0.0', true );
    }
}
add_action( 'admin_enqueue_scripts', 'cometpro_admin_scripts_enqueue' );

// Including Libraries

/**
 * CMB2 - a metabox, custom fields, and forms library
 *
 * @version 2.10.1
 */
if( file_exists( get_template_directory() . '/inc/lib/cmb2-functions.php' ) ) {
    require_once get_template_directory() . '/inc/lib/cmb2-functions.php';
}

/**
 * Redux Framework - a simple and extensible options framework for WordPress themes and plugins.
 *
 * @version 3.6.18
 */
if( file_exists( get_template_directory() . '/inc/lib/redux-framework/ReduxCore/framework.php' ) ) {
    require_once get_template_directory() . '/inc/lib/redux-framework/ReduxCore/framework.php';
}
if( file_exists( get_template_directory() . '/inc/lib/redux-framework/sample/barebones-config.php' ) ) {
    require_once get_template_directory() . '/inc/lib/redux-framework/sample/barebones-config.php';
}

/**
 * Custom Nav Walker Class - Commetpro_Header_Nav_Menu
 */
if( file_exists( get_template_directory() . '/inc/custom-mega-menu/custom-nav-walker.php' ) ) {
    require_once get_template_directory() . '/inc/custom-mega-menu/custom-nav-walker.php';
}

/**
 * WP Backend "Menu Page" Editing
 */
if( file_exists( get_template_directory() . '/inc/custom-mega-menu/custom-wp-admin-nav-menus.php' ) ) {
    require_once get_template_directory() . '/inc/custom-mega-menu/custom-wp-admin-nav-menus.php';
}

function cometpro_register_menus() {
    add_theme_support( 'menus' );

    register_nav_menus( [
        'main-menu' => 'Header Navigation Menu',
    ] );
}
add_action( 'after_setup_theme', 'cometpro_register_menus' );

/**
 * Registering Siderbars
 */
function cometpro_sidebars_setup() {
    // Right Sidebar
    register_sidebar( [
        'id'            => 'right-sidebar',
        'name'          => __('Right Sidebar', 'cometpro'),
        'description'   => __('Add widgets for Right Sidebar', 'cometpro'),
        'class'         => 'custom',
        'before_widget' => '<div class="widget">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<h6 class="upper">',
        'after_title'   => "</h6>\n",
    ] );

    // Footer Left col-md-6
    register_sidebar( [
        'id'            => 'footer-left',
        'name'          => __('Footer Left Area (col-md-6)', 'cometpro'),
        'description'   => __('Add widgets for Footer Left Area', 'cometpro'),
        'class'         => 'custom',
        'before_widget' => '<div class="col-sm-4"><div class="widget">',
        'after_widget'  => "</div></div>\n",
        'before_title'  => '<h6 class="upper">',
        'after_title'   => "</h6>\n",
    ] );

    // Footer Right col-md-4
    register_sidebar( [
        'id'            => 'footer-right',
        'name'          => __('Footer Right Area (col-md-4)', 'cometpro'),
        'description'   => __('Add widgets for Footer Right Area', 'cometpro'),
        'class'         => 'custom',
        'before_widget' => '<div class="widget">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<h6 class="upper">',
        'after_title'   => "</h6>\n",
    ] );
}
add_action( 'widgets_init', 'cometpro_sidebars_setup' );

/**
 * Custom widgets.
 */
if( file_exists( get_template_directory() . '/inc/custom-widgets/youtube-subs.php' ) ) {
    require_once get_template_directory() . '/inc/custom-widgets/youtube-subs.php';
}
if( file_exists( get_template_directory() . '/inc/custom-widgets/latest-posts.php' ) ) {
    require_once get_template_directory() . '/inc/custom-widgets/latest-posts.php';
}


/**
 * Shortcodes
 */
if ( file_exists( get_template_directory() . '/inc/shortcodes/shortcodes.php' ) ) {
    require_once get_template_directory() . '/inc/shortcodes/shortcodes.php';
}

/**
 * Custom Post Type: Portfolio
 */
function cometpro_portfolio_custom_post_type() {

    $labels = array(
        'name'               => 'Portfolio',
        'singular_name'      => 'Portfolio',
        'add_new'            => 'Add Item',
        'all_items'          => 'All Items',
        'add_new_item'       => 'Add Item',
        'edit_item'          => 'Edit Item',
        'new_item'           => 'New Item',
        'view_item'          => 'View Item',
        'search_item'        => 'Search Portfolio',
        'not_found'          => 'No items found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon'  => 'Parent Item'
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'publicly_queryable' => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'hierarchical'       => false,
        'supports'           => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
        ),
        'taxonomies'         => array( 'category', 'post_tag' ),
        'menu_position'      => 5,
        'exclude_from_search'=> false
    );
    register_post_type( 'portfolio', $args );
}
add_action( 'init','cometpro_portfolio_custom_post_type' );

/**
 * Custom Post Type: Simple Sliders
 */
function cometpro_simple_slider_custom_post_type() {

    $labels = array(
        'name'               => 'Simple Slider',
        'singular_name'      => 'Slide',
        'add_new'            => 'Add New Slide',
        'all_items'          => 'All Slides',
        'add_new_item'       => 'Add New Slide',
        'edit_item'          => 'Edit Slide',
        'new_item'           => 'New Slide',
        'view_item'          => 'View Slide',
        'search_item'        => 'Search Slide',
        'not_found'          => 'No slides found',
        'not_found_in_trash' => 'No slides found in trash',
        'parent_item_colon'  => 'Parent Item'
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'publicly_queryable' => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'hierarchical'       => false,
        'supports'           => array(
            'title',
            'editor',
            'thumbnail',
            'revisions',
        ),
        'taxonomies'         => array( ),
        'menu_position'      => 5,
        'exclude_from_search'=> false
    );
    register_post_type( 'simple_slider', $args );
}
add_action( 'init', 'cometpro_simple_slider_custom_post_type' );
