<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'wpbootscore_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function wpbootscore_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;

  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 

    'sections'        => array( 
      array(
        'id'          => 'general_settings',
        'title'       => __( 'General Settings', 'wpbootscore' )
      ),

      array(
        'id'          => 'section_settings',
        'title'       => __( 'Section Settings', 'wpbootscore' )
      ),

      array(
        'id'          => 'footer_settings',
        'title'       => __( 'Footer Settings', 'wpbootscore' )
      ),

    ),
    'settings'        => array( 
      
      array(
        'id'          => 'site_logo',
        'label'       => __( 'Upload Logo', 'wpbootscore' ),
        'desc'        => sprintf( __( 'Upload logo image here. Recommended size widthxheight', 'wpbootscore' ) ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_settings',
        'class'       => '',
      ),

    array(
        'id'          => 'site_favicon',
        'label'       => __( 'Upload Favicon Image', 'wpbootscore' ),
        'desc'        => sprintf( __( 'Upload favicon.ico image here. Recommended size 16x16', 'wpbootscore' ) ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_settings',
        'class'       => '',
      ),
        array(
        'id'          => 'custom_css',
        'label'       => __( 'Write Custom CSS', 'wpbootscore' ),
        'desc'        => sprintf( __( 'Write Custom CSS here.', 'wpbootscore' ) ),
        'std'         => '',
        'type'        => 'css',
        'section'     => 'general_settings',
        'class'       => '',
      ),

      // section settings starts
      array(
        'id'          => 'section_title',
        'label'       => __( 'Write Section Title', 'wpbootscore' ),
        'desc'        => sprintf( __( 'Section title here', 'wpbootscore' ) ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'section_settings',
        'class'       => '',
      ),
    array(
        'id'          => 'section_on_off',
        'label'       => __( 'On/Off', 'wpbootscore' ),
        'desc'        => sprintf( __( '', 'wpbootscore' ) ),
        'std'         => '',
        'type'        => 'Checkbox',
        'section'     => 'section_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'apple',
            'label'       => __( 'Apple', 'wpbootscore' ),
            'src'         => ''
          ),
          array(
            'value'       => 'banana',
            'label'       => __( 'Banana', 'wpbootscore' ),
            'src'         => ''
          ),
          
          array(
            'value'       => 'orange',
            'label'       => __( 'Orange', 'wpbootscore' ),
            'src'         => ''
          )
        )
      ),
      // section settings ends

    // footer settings starts
      array(
        'id'          => 'copyright_text',
        'label'       => __( 'Write Copyright Text', 'wpbootscore' ),
        'desc'        => sprintf( __( 'Copyright Text here', 'wpbootscore' ) ),
        'std'         => '',
        'type'        => 'textarea_simple',
        'section'     => 'footer_settings',
        'class'       => '',
      ),
    array(
        'id'          => 'custom_scripts',
        'label'       => __( 'Write custom scripts/analytics code', 'wpbootscore' ),
        'desc'        => sprintf( __( 'Write custom scripts', 'wpbootscore' ) ),
        'std'         => '',
        'type'        => 'JavaScript',
        'section'     => 'footer_settings',
        'class'       => '',
      ),
      // footer settings ends
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_wpbootscore_theme_options;
  $ot_has_wpbootscore_theme_options = true;
  
}