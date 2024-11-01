<?php

namespace WP_POWERCAL;

/**
 * Installer class
 */
class Installer {

	/**
	 * Run the installer
	 *
	 * @return void
	 */
	public function run() {
		$this->add_version();
	}

	/**
	 * Add time and version on DB
	 */
	public function add_version() {
		$installed = get_option( 'wp_powercal_installed' );

		if ( ! $installed ) {
			update_option( 'wp_powercal_installed', time() );
		}

		update_option( 'wp_powercal_version', WP_POWERCAL_VERSION );
	}

}
