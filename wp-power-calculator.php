<?php
/**
 * Plugin Name: WP POWER Calculator
 * Description: A plugin to calculate power
 * Plugin URI: https://srxwebdesign.com/shop
 * Author: bad_x
 * Author URI: https://srxwebdesign.com/
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class WP_POWERCAL {

	/**
	 * Plugin version
	 *
	 * @var string
	 */
	const version = '1.0';

	/**
	 * Class construcotr
	 */
	private function __construct() {
		$this->define_constants();

		register_activation_hook( __FILE__, array( $this, 'activate' ) );

		add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );
	}

	/**
	 * Initializes a singleton instance
	 *
	 * @return \WP_POWERCAL
	 */
	public static function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Define the required plugin constants
	 *
	 * @return void
	 */
	public function define_constants() {
		define( 'WP_POWERCAL_VERSION', self::version );
		define( 'WP_POWERCAL_FILE', __FILE__ );
		define( 'WP_POWERCAL_PATH', __DIR__ );
		define( 'WP_POWERCAL_URL', plugins_url( '', WP_POWERCAL_FILE ) );
		define( 'WP_POWERCAL_ASSETS', WP_POWERCAL_URL . '/assets' );
	}

	/**
	 * Initialize the plugin
	 *
	 * @return void
	 */
	public function init_plugin() {

		new WP_POWERCAL\Assets();

		if ( is_admin() ) {
			new WP_POWERCAL\Admin();
		} else {
			new WP_POWERCAL\Frontend();
		}

	}

	/**
	 * Do stuff upon plugin activation
	 *
	 * @return void
	 */
	public function activate() {
		$installer = new WP_POWERCAL\Installer();
		$installer->run();
	}
}

/**
 * Initializes the main plugin
 *
 * @return \WP_POWERCAL
 */
function WP_POWERCAL() {
	return WP_POWERCAL::init();
}

// kick-off the plugin
WP_POWERCAL();
