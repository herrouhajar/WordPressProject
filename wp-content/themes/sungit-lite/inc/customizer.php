<?php
/**
 * Sungit Lite Theme Customizer.
 *
 * @package Sungit_Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sungit_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

  $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site-title a',
        'render_callback' => 'sungit_lite_customize_partial_blogname',
    ) );
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description',
        'render_callback' => 'sungit_lite_customize_partial_blogdescription',
    ) );

    //Support section
    $wp_customize->add_section( 'sungit_lite_theme_support', array(
            'title' => __( 'Support','sungit-lite' ),
            'priority' => 2, // Mixed with top-level-section hierarchy.
      ) );

    $wp_customize->add_setting('sungit_lite_option[support_link]',
        array(
          'type' => 'option',
          'default' => '',
          'sanitize_callback' => 'esc_url_raw',
          'capability' => 'edit_theme_options',
          )
        );
    $wp_customize->add_control(new Sungit_Lite_Support_Control($wp_customize,'support_link',array(
      'label' => 'Support',
      'section' => 'sungit_lite_theme_support',
      'settings' => 'sungit_lite_option[support_link]',
      'type' => 'sungit-lite-support',
      )
      )
    );
    $wp_customize->add_panel('sungit_lite_theme_option',array(
    'title' => __('Theme Options','sungit-lite'),
    'priority' => 3,
    ));
    require get_template_directory() . '/inc/customizer/social-options.php';
    require get_template_directory() . '/inc/customizer/slider-options.php';
    require get_template_directory() . '/inc/customizer/tour-options.php';
    require get_template_directory() . '/inc/customizer/blog-options.php';

}
add_action( 'customize_register', 'sungit_lite_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 */
if (! function_exists('sungit_lite_customize_partial_blogname')){
  function sungit_lite_customize_partial_blogname() {
    bloginfo( 'name' );
  }
}

/**
 * Render the site tagline for the selective refresh partial.
 */
if (! function_exists('sungit_lite_customize_partial_blogdescription')){
  function sungit_lite_customize_partial_blogdescription() {
    bloginfo( 'description' );
  }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sungit_lite_customize_preview_js() {
	wp_enqueue_script( 'sungit_lite_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'sungit_lite_customize_preview_js' );
