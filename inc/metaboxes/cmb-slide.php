<?php 
add_action( 'cmb2_admin_init', 'wpbootscore_register_wpbs_slide_metabox' );

function wpbootscore_register_wpbs_slide_metabox() {
	$prefix = 'wpbs_';

	$cmb_wpbs_slide = new_cmb2_box( array(
		'id'            => $prefix . 'wpbs_slide_metabox',
		'title'         => __( 'Additional informations', 'cmb2' ),
		'object_types'  => array( 'wpbs_slide', ), // wpbs_slide type
	) );

	$cmb_wpbs_slide->add_field( array(
		'name'       => __( 'Image Link', 'cmb2' ),
		'desc'       => __( 'Put your image url here', 'cmb2' ),
		'id'         => $prefix . 'image_link',
		'type'       => 'text',
	) );

}