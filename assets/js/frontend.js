(function ($) {
    "use strict"

    //for dc power calculation
    $('#wp-powercal-cal-dc').on('click', function () {
        var vol = $('#wp-powercal-dc-volt').val();
        var cur = $('#wp-powercal-dc-cur').val();
        var pow = $('#wp-powercal-dc-pow').val();
        var res = $('#wp-powercal-dc-res').val();

        if (vol == '' && cur == '' && res == '') {
            alert('Minimum 2 fields are required');
            return;
        }

        if (vol !='' && cur == '' && res == '') {
            alert('Minimum current or resistance is required');
            return;
        }

        if(vol=='' && cur !='' && res == ''){
            alert('Minimum voltage or resistance is required');
            return;
        }

        if(vol=='' && cur =='' && res != ''){
            alert('Minimum voltage or current is required');
            return;
        }
        

        if(vol && cur){
            $('#wp-powercal-dc-pow').val(vol*cur);
            $('#wp-powercal-dc-res').val(vol/cur);
        }
        else if(vol && res){
            $('#wp-powercal-dc-pow').val(vol*vol/res);
            $('#wp-powercal-dc-cur').val(vol/res);
        }
        else{
            $('#wp-powercal-dc-pow').val(cur*cur*res);
            $('#wp-powercal-dc-vol').val(cur*res);
        }

        if($('#wp-powercal-show-exp-dc').val()!=0){
            $('#wp-powercal-show-exp').html('<br><h5>Explanation: </h5>'+$('#wp-powercal-exp-dc').val());
        }
       
    })

    $('#wp-powercal-res-dc').on('click', function () {
        $('#wp-powercal-dc-form')[0].reset();
        $('#wp-powercal-show-exp').html('');
    })

    // for energy power calculation
    $('#wp-powercal-cal-energy').on('click', function () {
        var energy = $('#wp-powercal-energy-energy').val();
        var time = $('#wp-powercal-energy-time-period').val();
        var pow = $('#wp-powercal-energy-avg-pow').val();

        if (energy == '' && time == '' && pow == '') {
            alert('Minimum 2 fields are required');
            return;
        }

        if (energy !='' && time == '' && pow == '') {
            alert('Minimum time or power is required');
            return;
        }

        if(energy=='' && time !='' && pow == ''){
            alert('Minimum energy or power is required');
            return;
        }

        if(energy=='' && time =='' && pow != ''){
            alert('Minimum energy or time is required');
            return;
        }
        

        if(energy && time){
            $('#wp-powercal-energy-avg-pow').val(energy/time);
        }
        else if(energy && pow){
            $('#wp-powercal-energy-time-period').val(pow/energy);
        }
        else{
            $('#wp-powercal-energy-energy').val(pow/time);
        }

        if($('#wp-powercal-show-exp-energy').val()!=0){
            $('#wp-powercal-show-exp-energy-val').html('<br><h5>Explanation: </h5>'+$('#wp-powercal-exp-energy').val());
        }
       
    })

    $('#wp-powercal-res-energy').on('click', function () {
        $('#wp-powercal-energy-form')[0].reset();
        $('#wp-powercal-show-exp-energy-val').html('');
    })

    //for ac power
    $('#wp-powercal-cal-ac').on('click', function () {

        //current
        var cur = $('#wp-powercal-ac-cur').val();
        var cur_angle = $('#wp-powercal-ac-cur-angle').val();

        if(cur_angle==''){
            cur_angle=0;
        }

        //voltage
        var vol = $('#wp-powercal-ac-volt').val();
        var vol_angle = $('#wp-powercal-ac-volt-angle').val();

        if(vol_angle==''){
            vol_angle=0;
        }

        //impedence
        var res = $('#wp-powercal-ac-res').val();
        var res_angle = $('#wp-powercal-ac-res-angle').val();

        if(res_angle==''){
            res_angle=0;
        }

        //power
        var pow = $('#wp-powercal-ac-pow').val();
        var pow_angle = $('#wp-powercal-ac-pow-angle').val();

        if(pow_angle==''){
            pow_angle=0;
        }

        if (vol == '' && cur == '' && res == '') {
            alert('Minimum 2 fields are required');
            return;
        }

        if (vol !='' && cur == '' && res == '') {
            alert('Minimum current or resistance is required');
            return;
        }

        if(vol=='' && cur !='' && res == ''){
            alert('Minimum voltage or resistance is required');
            return;
        }

        if(vol=='' && cur =='' && res != ''){
            alert('Minimum voltage or current is required');
            return;
        }
        

        if(vol && cur){
            $('#wp-powercal-ac-pow').val(vol*cur);
            $('#wp-powercal-ac-pow-angle').val(vol_angle-cur_angle);
        }
        else if(vol && res){

            var cur_val=vol/res;
            var cur_angle=vol_angle-res_angle;

            $('#wp-powercal-ac-pow').val(vol*cur_val);
            $('#wp-powercal-ac-pow-angle').val(vol_angle+cur_angle);

            $('#wp-powercal-ac-cur').val(cur_val);
            $('#wp-powercal-ac-cur-angle').val(cur_angle);
        }
        else{

            var vol_val=cur*res;
            var vol_angle=cur_angle+res_angle;

            $('#wp-powercal-ac-pow').val(vol_val*cur);
            $('#wp-powercal-ac-pow-angle').val(vol_angle+cur_angle);

        }

        if($('#wp-powercal-show-exp-ac').val()!=0){
            $('#wp-powercal-show-exp-ac-val').html('<br><h5>Explanation: </h5>'+$('#wp-powercal-exp-ac').val());
        }
       
    })

    $('#wp-powercal-res-ac').on('click', function () {
        $('#wp-powercal-ac-form')[0].reset();
        $('#wp-powercal-show-exp-ac-val').html('');
    })

})(jQuery)