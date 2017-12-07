<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @package Sungit_Lite
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses sungit_lite_header_style()
 */
function sungit_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'sungit_lite_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 2000,
		'height'                 => 250,
		'flex-height'            => true,
        'flex-width'             => true,
	) ) );
}
add_action( 'after_setup_theme', 'sungit_lite_custom_header_setup' );

if ( ! function_exists( 'sungit_lite_header_style' ) ) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see resortica_lite_custom_header_setup().
     */
    function sungit_lite_header_style($output = '') {
        $header_text_color = get_header_textcolor();


        // If we get this far, we have custom styles. Let's do this.
            // Has the text been hidden?
            if ( ! display_header_text() ) :
            $output = '.site-title,
                    .site-description {
                        position: absolute;
                        clip: rect(1px, 1px, 1px, 1px);
                    }';
            // If the user has set a custom color for the text use that.
            else :
            $output ='.site-title a,
                    .site-description {
                        color: #'.esc_attr( $header_text_color ).'}';
            endif;
            return $output;
    }
endif;