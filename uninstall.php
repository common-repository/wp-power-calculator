<?php
/**
 * trigger uninstall of plugin
 *
 * @package wp-pubg
 */


if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

delete_option( 'wp_powercal_settings' );
