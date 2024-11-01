<div>
	<?php
	$settings_options = get_option( 'wp_powercal_settings' );
	$show_exp         = isset( $settings_options['show_explanation_1'] ) ? esc_attr( $settings_options['show_explanation_1'] ) : 0;
	$energy_exp           = isset( $settings_options['explanation_for_energy_and_power_calculation_4'] ) ? esc_attr( $settings_options['explanation_for_energy_and_power_calculation_4'] ) : '';
	?>
	<form id="wp-powercal-energy-form">
		<label for="wp-powercal-energy-energy"><h5>Energy (J)</h5></label>
		<input type="number" id="wp-powercal-energy-energy" name="wp-powercal-energy-energy">
		<label for="wp-powercal-energy-time-period"><h5>Time Period (s)</h5></label>
		<input type="number" id="wp-powercal-energy-time-period" name="wp-powercal-energy-time-period">
		<label for="wp-powercal-energy-avg-pow"><h5>Average Power (W)</h5></label>
		<input type="number" id="wp-powercal-energy-avg-pow" name="wp-powercal-energy-avg-pow">

		<br>
		
		<button id="wp-powercal-cal-energy" type="button">Calculate</button>
		<button id="wp-powercal-res-energy" type="button">Reset</button>
	</form>
	<input type="hidden" id="wp-powercal-exp-energy" value="<?php echo esc_attr( $energy_exp ); ?>">
	<input type="hidden" id="wp-powercal-show-exp-energy" value="<?php echo esc_attr( $show_exp ); ?>">
	<div id="wp-powercal-show-exp-energy-val"></div> 
</div>