<?php

namespace WP_POWERCAL\Admin;

/**
 * The Menu handler class
 */
class Menu {

	public $settings;

	/**
	 * Initialize the class
	 */
	function __construct( $settings ) {
		$this->settings = $settings;

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	/**
	 * Register admin menu
	 *
	 * @return void
	 */
	public function admin_menu() {
		$parent_slug = 'wp-powercal';
		$capability  = 'manage_options';

		add_menu_page( __( 'WP Power Calculator', 'wp-powercal' ), __( 'WP Power Calculator', 'wp-powercal' ), $capability, $parent_slug, array( $this->settings, 'plugin_settings' ), 'dashicons-welcome-write-blog' );

	}

}
