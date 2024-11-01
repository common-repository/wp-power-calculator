<?php

namespace WP_POWERCAL;

/**
 * Assets handlers class
 */
class Assets {

	/**
	 * Class constructor
	 */
	function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'register_assets' ) );
	}

	/**
	 * All available scripts
	 *
	 * @return array
	 */
	public function get_scripts() {
		return array(
			'wp-powercal-script' => array(
				'src'     => WP_POWERCAL_ASSETS . '/js/frontend.js',
				'version' => filemtime( WP_POWERCAL_PATH . '/assets/js/frontend.js' ),
				'deps'    => array( 'jquery', 'wp-util' ),
			),
		);
	}

	/**
	 * Register scripts and styles
	 *
	 * @return void
	 */
	public function register_assets() {
		$scripts = $this->get_scripts();

		foreach ( $scripts as $handle => $script ) {
			$deps = isset( $script['deps'] ) ? $script['deps'] : false;

			wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
		}

	}
}
