<?php

namespace WP_POWERCAL\Frontend;

/**
 * Shortcode handler class
 */
class Shortcode {

	/**
	 * Initializes the class
	 */
	function __construct() {
		add_shortcode( 'wp-powercal-dc', array( $this, 'render_shortcode' ) );
		add_shortcode( 'wp-powercal-energy', array( $this, 'render_shortcode_energy' ) );
		add_shortcode( 'wp-powercal-ac', array( $this, 'render_shortcode_ac' ) );
	}

	/**
	 * Shortcode handler class
	 *
	 * @param  array  $atts
	 * @param  string $content
	 *
	 * @return string
	 */
	public function render_shortcode( $atts, $content = '' ) {
		wp_enqueue_script( 'wp-powercal-script' );
		wp_enqueue_style( 'wp-powercal-style' );

		$template = __DIR__ . '/views/dc-cal.php';

		if ( file_exists( $template ) ) {
			ob_start();
			include $template;
			$data = ob_get_contents();
			ob_end_clean();

			return $data;
		}

	}

	public function render_shortcode_energy( $atts, $content = '' ) {
		wp_enqueue_script( 'wp-powercal-script' );
		wp_enqueue_style( 'wp-powercal-style' );

		$template = __DIR__ . '/views/energy-power-cal.php';

		if ( file_exists( $template ) ) {
			ob_start();
			include $template;
			$data = ob_get_contents();
			ob_end_clean();

			return $data;
		}

	}

	public function render_shortcode_ac( $atts, $content = '' ) {
		wp_enqueue_script( 'wp-powercal-script' );
		wp_enqueue_style( 'wp-powercal-style' );

		$template = __DIR__ . '/views/ac-cal.php';

		if ( file_exists( $template ) ) {
			ob_start();
			include $template;
			$data = ob_get_contents();
			ob_end_clean();

			return $data;
		}

	}
}
