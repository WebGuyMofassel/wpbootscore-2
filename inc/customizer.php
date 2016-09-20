<?php
/**
 * wpbootscore Theme Customizer.
 *
 * @package wpbootscore
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wpbootscore_customize_register( $wp_customize ) {

	// echo "<pre>";
	// print_r($wp_customize);
	// echo "</pre>";

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// $wp_customize->get_section('background_image')->title = 'Changed!';
	$wp_customize->get_control('blogname')->label = 'Changed!';

	$wp_customize->get_control('background_color')->section = 'background_image';




	$wp_customize->add_section( 'your_section_id' , array(
	    'title'      => __( 'Visible Section Name', 'wpbootscore' ),
	    'priority'   => 30,
	) );

	$wp_customize->add_setting( 'your_setting_id' , array(
	    'default'     => 'default message',
	    'transport'   => 'postMessage',
	) );

	// $wp_customize->add_control(
	//     new WP_Customize_Control(
	//         $wp_customize,
	//         'your_setting_id',
	//         array(
	//             'label'          => __( 'From control', 'wpbootscore' ),
	//             'section'        => 'your_section_id',
	//             'settings'       => 'your_setting_id',
	//             'type'           => 'textarea',
	//             // 'choices'        => array(
	//             //     'dark'   => __( 'Dark' ),
	//             //     'light'  => __( 'Light' )
	//             // )
	//         )
	//     )
	// );

	// $wp_customize->add_control( 
	// 	new WP_Customize_Color_Control( 
	// 	$wp_customize, 
	// 	'your_setting_id', 
	// 	array(
	// 		'label'      => __( 'Header Color', 'wpbootscore' ),
	// 		'section'    => 'your_section_id',
	// 		'settings'   => 'your_setting_id',
	// 	) ) 
	// );

	$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'your_setting_id',
           array(
               'label'      => __( 'Upload a logo', 'theme_name' ),
               'section'    => 'your_section_id',
               'settings'   => 'your_setting_id',
               'context'    => 'your_setting_context' 
           )
       )
   );

}
add_action( 'customize_register', 'wpbootscore_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wpbootscore_customize_preview_js() {
	wp_enqueue_script( 'wpbootscore_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wpbootscore_customize_preview_js' );
