<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Sungit_Lite_Discount_Customize {

	/**
	 * Returns the instance.
	 *
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( get_template_directory(). '/inc/customizer/section-pro-discount.php' );

		// Register custom section types.
		$manager->register_section_type( 'Sungit_Lite_Discount_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Sungit_Lite_Discount_Customize_Section_Pro(
				$manager,
				'sungit_lite_to_pro_discount',
				array(

					'pro_text' =>__(" Get Whitish Premium Theme", "sungit-lite"),
					'pro_subtext' =>__("We've launched a new theme 'Whitish Premium Theme'. Buy today and save $10", "sungit-lite"),
					'pro_url'  => esc_url('http://yudleethemes.com/product/whitish-premium-theme/?utm_source=wporg&utm_campaign=sungitlite'),
					'priority' => 1,
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_style( 'whitish-lite-customize-controls',get_template_directory_uri() . '/inc/customizer/css/customizer.css' );
	}
}

// Doing this customizer thang!
Sungit_Lite_Discount_Customize::get_instance();
