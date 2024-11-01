<?php

namespace WP_POWERCAL\Admin;

/**
 * Settings Handler class
 */
class Settings {

	private $settings_options;

	public function __construct() {
		add_action( 'admin_init', array( $this, 'settings_page_init' ) );
	}

	public function plugin_settings() {

		$this->settings_options = get_option( 'wp_powercal_settings' ); ?>

		<div class="wrap">
			<h2><?php esc_html_e( 'Settings', 'wp-powercal' ); ?></h2>
			<p>settings for wp power calculator. use shortcode [wp-powercal-ac],[wp-powercal-dc],[wp-powercal-energy]</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'settings_option_group' );
					do_settings_sections( 'settings-admin' );
					submit_button();
				?>
			</form>
		</div>
		<?php
	}

	public function settings_page_init() {
		register_setting(
			'settings_option_group', // option_group
			'wp_powercal_settings', // option_name
			array( $this, 'settings_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'settings_setting_section', // id
			'Settings', // title
			array( $this, 'settings_section_info' ), // callback
			'settings-admin' // page
		);

		add_settings_field(
			'show_explanation_1', // id
			'Show explanation?', // title
			array( $this, 'show_explanation_1_callback' ), // callback
			'settings-admin', // page
			'settings_setting_section' // section
		);

		add_settings_field(
			'explanation_for_ac_power_calculation_2', // id
			'Explanation for AC power calculation', // title
			array( $this, 'explanation_for_ac_power_calculation_2_callback' ), // callback
			'settings-admin', // page
			'settings_setting_section' // section
		);

		add_settings_field(
			'explanation_for_dc_power_calculation_3', // id
			'Explanation for DC power calculation', // title
			array( $this, 'explanation_for_dc_power_calculation_3_callback' ), // callback
			'settings-admin', // page
			'settings_setting_section' // section
		);

		add_settings_field(
			'explanation_for_energy_and_power_calculation_4', // id
			'Explanation for Energy and Power calculation', // title
			array( $this, 'explanation_for_energy_and_power_calculation_4_callback' ), // callback
			'settings-admin', // page
			'settings_setting_section' // section
		);
	}

	public function settings_section_info() {

	}

	public function settings_sanitize( $input ) {
		$sanitary_values = array();

		if ( isset( $input['show_explanation_1'] ) ) {
			$sanitary_values['show_explanation_1'] = $input['show_explanation_1'];
		}

		if ( isset( $input['explanation_for_ac_power_calculation_2'] ) ) {
			$sanitary_values['explanation_for_ac_power_calculation_2'] = esc_textarea( $input['explanation_for_ac_power_calculation_2'] );
		}

		if ( isset( $input['explanation_for_dc_power_calculation_3'] ) ) {
			$sanitary_values['explanation_for_dc_power_calculation_3'] = esc_textarea( $input['explanation_for_dc_power_calculation_3'] );
		}

		if ( isset( $input['explanation_for_energy_and_power_calculation_4'] ) ) {
			$sanitary_values['explanation_for_energy_and_power_calculation_4'] = esc_textarea( $input['explanation_for_energy_and_power_calculation_4'] );
		}

		return $sanitary_values;
	}

	public function show_explanation_1_callback() {
		printf(
			'<input type="checkbox" name="wp_powercal_settings[show_explanation_1]" id="show_explanation_1" value="show_explanation_1" %s> <label for="show_explanation_1">please tick if you want to show the explanation</label>',
			( isset( $this->settings_options['show_explanation_1'] ) && $this->settings_options['show_explanation_1'] === 'show_explanation_1' ) ? 'checked' : ''
		);
	}

	public function explanation_for_ac_power_calculation_2_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="wp_powercal_settings[explanation_for_ac_power_calculation_2]" id="explanation_for_ac_power_calculation_2">%s</textarea>',
			isset( $this->settings_options['explanation_for_ac_power_calculation_2'] ) ? esc_attr( $this->settings_options['explanation_for_ac_power_calculation_2'] ) : ''
		);
	}

	public function explanation_for_dc_power_calculation_3_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="wp_powercal_settings[explanation_for_dc_power_calculation_3]" id="explanation_for_dc_power_calculation_3">%s</textarea>',
			isset( $this->settings_options['explanation_for_dc_power_calculation_3'] ) ? esc_attr( $this->settings_options['explanation_for_dc_power_calculation_3'] ) : ''
		);
	}

	public function explanation_for_energy_and_power_calculation_4_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="wp_powercal_settings[explanation_for_energy_and_power_calculation_4]" id="explanation_for_energy_and_power_calculation_4">%s</textarea>',
			isset( $this->settings_options['explanation_for_energy_and_power_calculation_4'] ) ? esc_attr( $this->settings_options['explanation_for_energy_and_power_calculation_4'] ) : ''
		);
	}

}
