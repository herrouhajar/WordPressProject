<?php
/**
 * Sungit Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sungit_Lite
 */

if ( ! function_exists( 'sungit_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sungit_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'sungit-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sungit-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'sungit-lite-featured-image', 640, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Nav', 'sungit-lite' ),
		) );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 200,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sungit_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'post-formats', apply_filters( 'sungit_lite_post_formats', array('image', 'video', 'gallery', 'audio')) );
    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    add_editor_style( get_template_directory(). '/assets/css/editor-style.css' );
}
endif;
add_action( 'after_setup_theme', 'sungit_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sungit_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sungit_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'sungit_lite_content_width', 0 );

/**
 * Return early if Custom Logos are not available.
 *
 * @todo Remove after WP 4.7
 */
function sungit_lite_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sungit_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sungit-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Pre-footer 1', 'sungit-lite' ),
		'id'            => 'prefooter-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Pre-footer 2', 'sungit-lite' ),
		'id'            => 'prefooter-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Pre-footer 3', 'sungit-lite' ),
		'id'            => 'prefooter-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sungit_lite_widgets_init' );
if ( ! function_exists( 'sungit_lite_header_style' ) ) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see resortica_lite_custom_header_setup().
     */
    function sungit_lite_header_style($output = '') {
        $header_text_color = get_header_textcolor();


            $output ='.sl-header-sec .nav-wrapper .navbar .navbar-brand,.site-description {
                        color: #'.esc_attr( $header_text_color ).' }';
            return $output;
    }
endif;

if ( ! function_exists( 'sungit_lite_fonts_url' ) ) :
    function sungit_lite_fonts_url() {
        $fonts_url = '';
        $fonts     = array();

        if ( 'off' !== _x( 'on', 'Anton font: on or off', 'sungit-lite' ) ) {
            $fonts[] = 'Anton';
        }

        if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'sungit-lite' ) ) {
            $fonts[] = 'Poppins';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
            ), '//fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/**
 * Enqueue scripts and styles.
 */
function sungit_lite_scripts() {
	wp_enqueue_style( 'sungit-lite-fonts', sungit_lite_fonts_url() , array(), null);
	wp_enqueue_style( 'sungit-lite-style', get_stylesheet_uri() );
	$sungit_lite_theme_options = sungit_lite_theme_options();
    $sungit_lite_style = sungit_lite_header_style();
    wp_add_inline_style( 'sungit-lite-style', $sungit_lite_style );
    wp_enqueue_style( 'sungit-lite-allstyles', get_template_directory_uri() . '/assets/css/sungit-lite.css' );
	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.6.0', true );
	wp_enqueue_script( 'jquery-jaudio', get_template_directory_uri() . '/assets/js/jaudio.js', array('jquery'), '0.2', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	wp_enqueue_script( 'sungit-lite-app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '20160913', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sungit_lite_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom Header.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Sungit functions.
 */
require get_template_directory() . '/inc/lib/sungit-lite-functions.php';

/**
 * Load Sungit Nav Walker.
 */
require get_template_directory() . '/inc/lib/sungit-lite-nav-walker.php';

/*
 * Include resortca customizer control.
 */
 require get_template_directory() . '/inc/customizer/customizer-control.php';

 require get_template_directory() . '/inc/customizer/class-pro-discount.php';