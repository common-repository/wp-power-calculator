<div>
	<?php
	$settings_options = get_option( 'wp_powercal_settings' );
	$show_exp         = isset( $settings_options['show_explanation_1'] ) ? esc_attr( $settings_options['show_explanation_1'] ) : 0;
	$dc_exp           = isset( $settings_options['explanation_for_dc_power_calculation_3'] ) ? esc_attr( $settings_options['explanation_for_dc_power_calculation_3'] ) : '';
	?>
	<form id="wp-powercal-dc-form">
		<label for="wp-powercal-dc-volt"><h5>Voltage (V)</h5></label>
		<input type="number" id="wp-powercal-dc-volt" name="wp-powercal-dc-volt">
		<label for="wp-powercal-dc-cur"><h5>Current (I)</h5></label>
		<input type="number" id="wp-powercal-dc-cur" name="wp-powercal-dc-cur">
		<label for="wp-powercal-dc-res"><h5>Resistance (R)</h5></label>
		<input type="number" id="wp-powercal-dc-res" name="wp-powercal-dc-res">
		<label for="wp-powercal-dc-pow"><h5>Power (P)</h5></label>
		<input type="number" id="wp-powercal-dc-pow" name="wp-powercal-dc-pow">

		<br>
		
		<button id="wp-powercal-cal-dc" type="button">Calculate</button>
		<button id="wp-powercal-res-dc" type="button">Reset</button>
	</form>
	<input type="hidden" id="wp-powercal-exp-dc" value="<?php echo esc_attr( $dc_exp ); ?>">
	<input type="hidden" id="wp-powercal-show-exp-dc" value="<?php echo esc_attr( $show_exp ); ?>">
	<div id="wp-powercal-show-exp"></div> 
</div>
