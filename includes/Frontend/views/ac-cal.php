<div>
	<?php
	$settings_options = get_option( 'wp_powercal_settings' );
	$show_exp         = isset( $settings_options['show_explanation_1'] ) ? esc_attr( $settings_options['show_explanation_1'] ) : 0;
	$ac_exp           = isset( $settings_options['explanation_for_ac_power_calculation_2'] ) ? esc_attr( $settings_options['explanation_for_ac_power_calculation_2'] ) : '';
	?>
	<form id="wp-powercal-ac-form">

        <label for="wp-powercal-ac-volt"><h5>Voltage (V)</h5></label>
        <input type="number" id="wp-powercal-ac-volt" placeholder="in volts" name="wp-powercal-dc-volt">
        <input type="number" id="wp-powercal-ac-volt-angle" placeholder="angle in degrees" name="wp-powercal-ac-volt-angle">
        

		<label for="wp-powercal-ac-cur"><h5>Current (I)</h5></label>
        <input type="number" id="wp-powercal-ac-cur" placeholder="in amp" name="wp-powercal-dc-cur">
        <input type="number" id="wp-powercal-ac-cur-angle" placeholder="angle in degrees" name="wp-powercal-ac-cur-angle">
        
        <label for="wp-powercal-ac-res"><h5>Impedence (Z)</h5></label>
        <input type="number" id="wp-powercal-ac-res" placeholder="in ohms" name="wp-powercal-dc-res">
        <input type="number" id="wp-powercal-ac-res-angle" placeholder="angle in degrees" name="wp-powercal-ac-cur-angle">

		<label for="pow"><h5>Power (S)</h5></label>
        <input type="number" id="wp-powercal-ac-pow" placeholder="in volt-amp" name="wp-powercal-ac-pow">
        <input type="number" id="wp-powercal-ac-pow-angle" placeholder="angle in degrees" name="wp-powercal-ac-pow-angle">

		<br>
		
		<button id="wp-powercal-cal-ac" type="button">Calculate</button>
		<button id="wp-powercal-res-ac" type="button">Reset</button>
	</form>
	<input type="hidden" id="wp-powercal-exp-ac" value="<?php echo esc_attr( $ac_exp ); ?>">
	<input type="hidden" id="wp-powercal-show-exp-ac" value="<?php echo esc_attr( $show_exp ); ?>">
	<div id="wp-powercal-show-exp-ac-val"></div> 
</div>
