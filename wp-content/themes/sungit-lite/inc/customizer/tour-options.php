<?php
$sungit_lite_theme_options = sungit_lite_theme_options();
$wp_customize->add_section('sungit_lite_tour_option',array(
    'title'    => __('Mid Section','sungit-lite'),
    'panel'    => 'sungit_lite_theme_option',
    'priority' => 3,
));

$wp_customize->add_setting(
  'sungit_lite_option[tour_title]',
  array(
    'default'           =>$sungit_lite_theme_options['tour_title'],
    'type'              =>'option',
    'sanitize_callback' =>'sanitize_text_field',
    'capability'        =>'edit_theme_options'
));
$wp_customize->add_control( 'tour_title', array(
  'label'    =>  __('Block Title', 'sungit-lite' ),
  'type'     =>'text',
  'section'  => 'sungit_lite_tour_option',
  'settings' => 'sungit_lite_option[tour_title]'
));

$wp_customize->add_setting(
  'sungit_lite_option[tour_subtitle]',
  array(
    'default'           =>$sungit_lite_theme_options['tour_subtitle'],
    'type'              =>'option',
    'sanitize_callback' =>'sanitize_text_field',
    'capability'        =>'edit_theme_options'
    )
  );
$wp_customize->add_control( 'tour_subtitle', array(
  'label'    =>  __('Sub Title', 'sungit-lite' ),
  'type'     =>'text',
  'section'  => 'sungit_lite_tour_option',
  'settings' => 'sungit_lite_option[tour_subtitle]'
  ) );

$wp_customize->add_setting('sungit_lite_option[tour_category]',
  array(
    'type'              => 'option',
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => '',
));
$wp_customize->add_control('tour_category',
  array(
    'type'     => 'select',
    'section'  => 'sungit_lite_tour_option',
    'label'    => __(' Select Category to be displayed','sungit-lite'),
    'choices'  => sungit_lite_get_categories_select(),
    'settings' => 'sungit_lite_option[tour_category]'
));