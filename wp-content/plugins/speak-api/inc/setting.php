<?php
include_once 'config.php';

$table_name = $wpdb->prefix . "speak_api";
$Get_Results = $wpdb->get_row("SELECT * FROM $table_name WHERE speak_api_id = 1");
$Option_Array = explode(',', $Get_Results->speak_api_options);
include_once 'check-api-key.php';
$data_Api['speak_api_key'] = $Get_Results->speak_api_key;
$CheckApiKey = CheckAPIKey($data_Api);
?>

<form id="spk-api-form">
    <table class="speak_api">
        <tbody>
            <tr>
                <td align="center" colspan="2"><h1>API Setting</h1><div id="check-api-form-msg"></div></td>
            </tr>
            <tr>
                <td class="sp-first"><label>Api Key : </label><div id="loader-form"></div>
                    <?php if ($CheckApiKey) { ?>
                        <?php if ($Get_Results->speak_api_status == '1') { ?>
                            <div id="active-icon"></div>
                        <?php } else { ?>
                            <div id="deactive-icon"></div>
                        <?php } ?>
                    <?php } else { ?>
                        <div id="deactive-icon"></div>
                    <?php } ?>
                </td>
                <td class="sp-second"><input type="text" name="speak_api_key" class="txt-long" value="<?php echo $Get_Results->speak_api_key; ?>" /></td>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
                <td class="sp-first"><label>Select Options</label></td>
                <td class="sp-second">
                    <?php if ($Option_Array[0] == 'PY') { ?>
                        <label><input type="checkbox" name="phone_email" checked="checked"/> Phone Email</label>
                    <?php } else { ?>
                        <label><input type="checkbox" name="phone_email"/> Phone Email</label>
                    <?php } ?>
                    <?php if ($Option_Array[1] == 'BY') { ?>
                        <label><input type="checkbox" name="book_download_email" checked="checked"/> Book Download Email</label>
                    <?php } else { ?>
                        <label><input type="checkbox" name="book_download_email" /> Book Download Email</label>
                    <?php } ?>
                    <?php if ($Option_Array[2] == 'CY') { ?>
                        <label><input type="checkbox" name="contact_form_email" checked="checked"/> Contact Form Email</label>
                    <?php } else { ?>
                        <label><input type="checkbox" name="contact_form_email"/> Contact Form Email</label>
                    <?php } ?>
                    <?php if ($Option_Array[3] == 'RY') { ?>
                        <label><input type="checkbox" name="robots_txt" checked="checked"/> Robots TXT File</label>
                    <?php } else { ?>
                        <label><input type="checkbox" name="robots_txt"/> Robots TXT File</label>
                    <?php } ?>
                </td>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
                <td colspan="2"><input type="button" value="Save" id="speak_api_submit"/></td>
            </tr>
        </tbody>
    </table>
</form>