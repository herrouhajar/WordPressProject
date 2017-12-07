<?php
$wp_customize->add_section('sungit_lite_slider_option',array(
    'title'    => __('Slider Options','sungit-lite'),
    'panel'    => 'sungit_lite_theme_option',
    'priority' => 2,
));


$wp_customize->add_setting('sungit_lite_option[slider_page_id_1]',
  array(
    'type'              => 'option',
    'sanitize_callback' => 'absint',
    'default'           => '',
));
$wp_customize->add_control('slider_page_id_1',
  array(
    'type'    => 'dropdown-pages',
    'section'  => 'sungit_lite_slider_option',
    'label'    => esc_html__(' Select first page to be displayed as Slider','sungit-lite'),
    'description'    => esc_html__('Feature image of page will be used as slider image','sungit-lite'),
    'settings' => 'sungit_lite_option[slider_page_id_1]'
));

$wp_customize->add_setting('sungit_lite_option[slider_page_id_2]',
  array(
    'type'              => 'option',
    'sanitize_callback' => 'absint',
    'default'           => '',
));
$wp_customize->add_control('slider_page_id_2',
  array(
    'type'    => 'dropdown-pages',
    'section'  => 'sungit_lite_slider_option',
    'label'    => esc_html__(' Select second page to be displayed as Slider','sungit-lite'),
    'description'    => esc_html__('Feature image of page will be used as slider image','sungit-lite'),
    'settings' => 'sungit_lite_option[slider_page_id_2]'
));

$wp_customize->add_setting('sungit_lite_option[slider_page_id_3]',
  array(
    'type'              => 'option',
    'sanitize_callback' => 'absint',
    'default'           => '',
));
$wp_customize->add_control('slider_page_id_3',
  array(
    'type'    => 'dropdown-pages',
    'section'  => 'sungit_lite_slider_option',
    'label'    => esc_html__(' Select third page to be displayed as Slider','sungit-lite'),
    'description'    => esc_html__('Feature image of page will be used as slider image','sungit-lite'),
    'settings' => 'sungit_lite_option[slider_page_id_3]'
));