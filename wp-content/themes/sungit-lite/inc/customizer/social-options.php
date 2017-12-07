<?php
$wp_customize->add_section('sungit_lite_social_option',array(
    'title'    => __('Social Options','sungit-lite'),
    'panel'    => 'sungit_lite_theme_option',
    'priority' => 1,
    ));

$wp_customize->add_setting('sungit_lite_option[facebook]',array(
    'type'              => 'option',
    'default'           => '',
    'sanitize_callback' => 'esc_url_raw',
    'capability'        => 'edit_theme_options'
));
$wp_customize->add_control('facebook',array(
    'label'    => __('Facebook','sungit-lite'),
    'section'  => 'sungit_lite_social_option',
    'settings' => 'sungit_lite_option[facebook]',
    'type'     => 'text'
    ));

$wp_customize->add_setting(
  'sungit_lite_option[twitter]',
  array(
    'default'           =>'',
    'type'              =>'option',
    'sanitize_callback' =>'esc_url_raw',
    'capability'        =>'edit_theme_options'
    )
  );
$wp_customize->add_control( 'twitter', array(
  'label'    =>  __('Twitter', 'sungit-lite' ),
  'type'     =>'url',
  'section'  => 'sungit_lite_social_option',
  'settings' => 'sungit_lite_option[twitter]'
  ) );

$wp_customize->add_setting(
  'sungit_lite_option[gplus]',
  array(
    'default'           =>'',
    'type'              =>'option',
    'sanitize_callback' =>'esc_url_raw',
    'capability'        =>'edit_theme_options'
    )
  );
$wp_customize->add_control( 'gplus', array(
  'label'    => __( 'Google+', 'sungit-lite' ),
  'type'     =>'url',
  'section'  => 'sungit_lite_social_option',
  'settings' => 'sungit_lite_option[gplus]'
  ) );

$wp_customize->add_setting(
  'sungit_lite_option[youtube]',
  array(
    'default'           =>'',
    'type'              =>'option',
    'sanitize_callback' =>'esc_url_raw',
    'capability'        =>'edit_theme_options'
    )
  );
$wp_customize->add_control( 'youtube', array(
  'label'    => __( 'Youtube', 'sungit-lite' ),
  'type'     =>'url',
  'section'  => 'sungit_lite_social_option',
  'settings' => 'sungit_lite_option[youtube]'
  ) );

$wp_customize->add_setting(
  'sungit_lite_option[instagram]',
  array(
    'default'           =>'',
    'type'              =>'option',
    'sanitize_callback' =>'esc_url_raw',
    'capability'        =>'edit_theme_options'
    )
  );
$wp_customize->add_control( 'instagram', array(
  'label'    => __( 'Instagram', 'sungit-lite' ),
  'type'     =>'url',
  'section'  => 'sungit_lite_social_option',
  'settings' => 'sungit_lite_option[instagram]'
  ) );

$wp_customize->add_setting(
  'sungit_lite_option[pinterest]',
  array(
    'default'           =>'',
    'type'              =>'option',
    'sanitize_callback' =>'esc_url_raw',
    'capability'        =>'edit_theme_options'
    )
  );
$wp_customize->add_control( 'pinterest', array(
  'label'    => __( 'Pinterest', 'sungit-lite' ),
  'type'     =>'url',
  'section'  => 'sungit_lite_social_option',
  'settings' => 'sungit_lite_option[pinterest]'
  ) );

$wp_customize->add_setting(
  'sungit_lite_option[tumblr]',
  array(
    'default'           =>'',
    'type'              =>'option',
    'sanitize_callback' =>'esc_url_raw',
    'capability'        =>'edit_theme_options'
    )
  );
$wp_customize->add_control( 'tumblr', array(
  'label'    => __( 'Tumblr', 'sungit-lite' ),
  'type'     =>'url',
  'section'  => 'sungit_lite_social_option',
  'settings' => 'sungit_lite_option[tumblr]'
  ) );

$wp_customize->add_setting(
  'sungit_lite_option[linkedin]',
  array(
    'default'           =>'',
    'type'              =>'option',
    'sanitize_callback' =>'esc_url_raw',
    'capability'        =>'edit_theme_options'
    )
  );
$wp_customize->add_control( 'linkedin', array(
  'label'    => __( 'Linkedin', 'sungit-lite' ),
  'type'     =>'url',
  'section'  => 'sungit_lite_social_option',
  'settings' => 'sungit_lite_option[linkedin]'
  ) );