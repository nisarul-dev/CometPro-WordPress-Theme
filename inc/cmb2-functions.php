<?php

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
}

add_action( 'cmb2_admin_init', 'cometpro_register_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function cometpro_register_metabox() {
	/**
	 * Post Format metaboxs
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => 'cometpro_demo_metabox',
		'title'         => esc_html__( 'Post Fields', 'cmb2' ),
		'object_types'  => array( 'post' ), // Post type
	) );

	// SoundCloud
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'SoundCloud Link', 'cmb2' ),
		'desc' => esc_html__( 'Enter a SoundCloud video URL', 'cmb2' ),
		'id'   => 'cometpro_soundcloud_embed',
		'type' => 'oembed',
	) );

	// Youtube
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Youtube Link', 'cmb2' ),
		'desc' => esc_html__( 'Enter a youtube video URL', 'cmb2' ),
		'id'   => 'cometpro_youtube_embed',
		'type' => 'oembed',
	) );

	// Gallery Slider
	$cmb_demo->add_field( array(
		'name'         => esc_html__( 'Gallery Slider', 'cmb2' ),
		'desc'         => esc_html__( 'Upload or add multiple images', 'cmb2' ),
		'id'           => 'cometpro_demo_file_list',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );

}
