<?php
$sungit_lite_theme_options = sungit_lite_theme_options();
$wp_customize->add_section('sungit_lite_blog_option',array(
    'title'    => __('Blog Options','sungit-lite'),
    'panel'    => 'sungit_lite_theme_option',
    'priority' => 4,
));

$wp_customize->add_setting('sungit_lite_option[blog_category]',
  array(
    'type'              => 'option',
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => '',
));
$wp_customize->add_control('blog_category',
  array(
    'type'     => 'select',
    'section'  => 'sungit_lite_blog_option',
    'label'    => __(' Select Category to be displayed in blog section','sungit-lite'),
    'description'    => __('The category selection will take effect in homepage and archive.','sungit-lite'),
    'choices'  => sungit_lite_get_categories_select(),
    'settings' => 'sungit_lite_option[blog_category]'
));

$wp_customize->add_setting('sungit_lite_option[latest_post_title]',array(
    'type'              => 'option',
    'default'           => $sungit_lite_theme_options['latest_post_title'],
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options'
));
$wp_customize->add_control('latest_post_title',array(
    'label'    => __('Block Title','sungit-lite'),
    'section'  => 'sungit_lite_blog_option',
    'settings' => 'sungit_lite_option[latest_post_title]',
    'type'     => 'text'
    ));

$wp_customize->add_setting('sungit_lite_option[latest_post_subtitle]',array(
    'type'              => 'option',
    'default'           => $sungit_lite_theme_options['latest_post_subtitle'],
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options'
));
$wp_customize->add_control('latest_post_subtitle',array(
    'label'    => __('Sub Title','sungit-lite'),
    'section'  => 'sungit_lite_blog_option',
    'settings' => 'sungit_lite_option[latest_post_subtitle]',
    'type'     => 'text'
    ));