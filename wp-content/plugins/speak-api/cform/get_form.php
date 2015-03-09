<?php
include_once ABSPATH . '/wp-content/plugins/speak-api/inc/config.php';
$Data_Cform = GetData_CForm();
$Data_Cform_Array = explode(',', $Data_Cform);
?>
<div class="cForm_widget">
    <div id="cform-form-msg"></div>
    <form id="cform">
        <p><?php //echo $Data_Cform_Array[0]; ?>
            <span>
                <input type="text" class = "cfom-text" id="cfom-text" name = "name" placeholder="Your Name " ></span>
        </p>
        <p><?php //echo $Data_Cform_Array[1]; ?>
            <span>
                <input type = "text" class = "cfom-text" id="cformemail" name = "email"  placeholder="Email ">
            </span>

        </p>
        <p><?php //echo $Data_Cform_Array[2]; ?>
            <span>
                <input type = "text" autocomplete = "off" id="cformphone" name = "phone" placeholder="Phone: (999) 999-9999" ></span></p>
        <p><?php //echo $Data_Cform_Array[3]; ?>
            <span>
                <textarea rows = "10" cols = "40" class="cform-textarea" id = "cformmessage" name = "message" placeholder="Tell us what happened:"></textarea>
            </span>
            <input type = "hidden"  name = "cform_type" value="contact_speakapi">
        </p>
        <p><button  class="btn " id = "cformsubmit" ><?php echo $Data_Cform_Array[4]; ?></button> </p>
        <p><div id="ajax-loader-cform"></div></p>
    </form>
</div>