<?php 
add_action( 'cmb2_admin_init', 'wpbootscore_register_wpbs_service_metabox' );

function wpbootscore_register_wpbs_service_metabox() {
	$prefix = 'wpbs_';

	$cmb_wpbs_service = new_cmb2_box( array(
		'id'            => $prefix . 'wpbs_service_metabox',
		'title'         => __( 'Additional informations', 'cmb2' ),
		'object_types'  => array( 'wpbs_service', ), // wpbs_service type
	) );

	$cmb_wpbs_service->add_field( array(
		'name'       => __( 'Image Link', 'cmb2' ),
		'desc'       => __( 'Put your image url here', 'cmb2' ),
		'id'         => $prefix . 'image_link',
		'type'       => 'text',
	) );

}