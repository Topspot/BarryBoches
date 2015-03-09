jQuery(document).ready(function() {
    jQuery(function($) {
        jQuery("#cformphone").mask("(999) 999-9999");
    });

    /*..................................................................*/
    jQuery('body').on('click', '#cformsubmit', function(e) {

        jQuery('#cform-form-msg').removeClass('alert-success');
        jQuery('#cform-form-msg').removeClass('alert-danger');
        jQuery('#cformsubmit').attr('disabled', 'disabled');
        jQuery('#ajax-loader-cform').css('display', 'block');

        jQuery.ajax({
            type: "POST",
            url: "/wp-content/plugins/speak-api/inc/send-mail-cform.php",
            data: jQuery("#cform").serialize(),
            dataType: "json",
            success: function(data) {

                if ('success' == data.result)
                {
                    jQuery('#cform-form-msg').css('visibility', 'visible').hide().fadeIn().removeClass('hidden').addClass('alert-success');
                    jQuery('#cform-form-msg').html(data.msg[0]);
                    jQuery('#cformsubmit').removeAttr('disabled');
                    jQuery('#ajax-loader-cform').css('display', 'none');
                    window.setTimeout(function() {
                        window.location.href = "/thank-you";
                    }, 1000)
                }

                if ('error' == data.result)
                {
                    jQuery('#cform-form-msg').css('visibility', 'visible').hide().fadeIn().removeClass('hidden').addClass('alert-danger');
                    jQuery('#cform-form-msg').html(data.msg[0]);
                    jQuery('#cformsubmit').removeAttr('disabled');
                    jQuery('#ajax-loader-cform').css('display', 'none');
                }

            }
        });

        return false;
    });
});