<?php
function shopone_theme_setup() {
    load_child_theme_textdomain( 'shopone', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'shopone_theme_setup' );

function shopone_register_scripts() {
    $parent_style = 'storeone-style';
    wp_enqueue_style('storeone-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,500,700,900');
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'shopone-style', get_stylesheet_uri(), array( $parent_style ));
}
add_action('wp_enqueue_scripts', 'shopone_register_scripts', 20);