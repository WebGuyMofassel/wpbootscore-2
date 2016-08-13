<?php 
add_action( 'cmb2_admin_init', 'wpbootscore_register_post_metabox' );

function wpbootscore_register_post_metabox() {
	$prefix = 'wpbs_';

	$cmb_post = new_cmb2_box( array(
		'id'            => $prefix . 'post_metabox',
		'title'         => __( 'Additional informations', 'cmb2' ),
		'object_types'  => array( 'post', ), // Post type
	) );

	$cmb_post->add_field( array(
		'name'       => __( 'Image Link', 'cmb2' ),
		'desc'       => __( 'Put your image url here', 'cmb2' ),
		'id'         => $prefix . 'image_link',
		'type'       => 'text',
	) );

	$cmb_post->add_field( array(
		'name'       => __( 'Mobile', 'cmb2' ),
		'desc'       => __( 'Put your image url here', 'cmb2' ),
		'id'         => $prefix . 'mobile_number',
		'type'       => 'text',
	) );

}