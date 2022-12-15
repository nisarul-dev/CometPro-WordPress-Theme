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
		'desc' => esc_html__( 'Enter a SoundCloud URL', 'cmb2' ),
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
		'id'           => 'cometpro_gallery_embed',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );


	/**
	 * Simple slider metabox
	 */
	$simple_slider = new_cmb2_box( array(
		'id'            => 'cometpro_simple_slider_metabox',
		'title'         => esc_html__( 'Simple Slider Fields', 'cmb2' ),
		'object_types'  => array( 'simple_slider' ), // Post type
	) );

	$simple_slider->add_field( array(
		'name' => esc_html__( 'Slider Subtitle', 'cmb2' ),
		'id'   => 'simple-slider-subtitle',
		'type' => 'textarea_small',
	) );

	$button_fields_group_id = $simple_slider->add_field( array(
		'id'                => '_button_fields',
		'type'              => 'group',
		'description'       => 'Add button, name it, set URL and select an pre-made style',
		'options'           => array(
			'group_title'   => 'Button {#}',
			'add_button'    => 'Add Another Button',
			'remove_button' => 'Remove Button',
			'sortable'      => true
		)
	) );

	$simple_slider->add_group_field( $button_fields_group_id, array(
		'name' => esc_html__( 'Button Text', 'cmb2' ),
		'id'   => '_simple_slider_button_text', // This is how the ID should be wirtten in CMB2
		'type' => 'text',
	) );

	$simple_slider->add_group_field( $button_fields_group_id, array(
		'name' => esc_html__( 'Button Link', 'cmb2' ),
		'id'   => '_simple_slider_button_link',
		'type' => 'text_url',
	) );

	$simple_slider->add_group_field( $button_fields_group_id, array(
		'name' => esc_html__( 'Button Style', 'cmb2' ),
		'id'   => '_simple_slider_button_style',
		'type' => 'radio',
		'options'          => array(
			'style-one' => __(
				'<span style="display:table-cell;vertical-align:middle;height:50px;" >
					Style One: &nbsp&nbsp
				</span>
				<img style="height:50px;" src="' . get_template_directory_uri() . '/images/button-style-1.png' . '">',
			'cmb2' ),
			'style-two'   => __(
				'<span style="display:table-cell;vertical-align:middle;height:50px;" >
					Style Two: &nbsp&nbsp
				</span>
				<img style="height:50px;" src="' . get_template_directory_uri() . '/images/button-style-2.png' . '">',
			'cmb2' ),
		),
	) );

}
