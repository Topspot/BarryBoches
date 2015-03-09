jQuery(document).ready(function() {
    /*..................................................................*/
    jQuery('body').on('click', '#speak_api_submit', function(e) {

        jQuery('#loader-form').css('display', 'block');
        jQuery('#check-api-form-msg').removeClass('alert-success');
        jQuery('#check-api-form-msg').removeClass('alert-danger');
        //jQuery('#check-api-keys').attr('disabled', true);

        jQuery.ajax({
            type: "POST",
            url: "/wp-content/plugins//speak-api/inc/update.php",
            data: jQuery("#spk-api-form").serialize(),
            dataType: "json",
            success: function(data) {

                if ('success' == data.result)
                {
                    jQuery('#check-api-form-msg').css('visibility', 'visible').hide().fadeIn().removeClass('hidden').addClass('alert-success');
                    jQuery('#loader-form').css('display', 'none');
                    jQuery('#check-api-form-msg').html(data.msg);
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)
                }

                if ('error' == data.result)
                {
                    jQuery('#check-api-form-msg').css('visibility', 'visible').hide().fadeIn().removeClass('hidden').addClass('alert-danger');
                    jQuery('#loader-form').css('display', 'none');
                    jQuery('#check-api-form-msg').html(data.msg);
                }

            }
        });

        return false;
    });

    /*........................cForm update..........................................*/
    jQuery('body').on('click', '#cform-options-btn', function(e) {

        jQuery('#cform-options-btn').attr('value', 'Loading....');
        jQuery('#check-api-form-msg').removeClass('alert-success');
        jQuery('#check-api-form-msg').removeClass('alert-danger');

        jQuery.ajax({
            type: "POST",
            url: "/wp-content/plugins/speak-api/inc/cform_update.php",
            data: jQuery("#cform-settings").serialize(),
            dataType: "json",
            success: function(data) {

                if ('success' == data.result)
                {
                    jQuery('#check-api-form-msg').css('visibility', 'visible').hide().fadeIn().removeClass('hidden').addClass('alert-success');
                    jQuery('#cform-options-btn').attr('value', 'Save Settings');
                    jQuery('#check-api-form-msg').html(data.msg[0]);
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)
                }

                if ('error' == data.result)
                {
                    jQuery('#check-api-form-msg').css('visibility', 'visible').hide().fadeIn().removeClass('hidden').addClass('alert-danger');
                    jQuery('#loader-form').css('display', 'none');
                    jQuery('#cform-options-btn').attr('value', 'Save Settings');
                    jQuery('#check-api-form-msg').html(data.msg[0]);
                }

            }
        });

        return false;
    });
});