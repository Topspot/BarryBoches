<?php
include_once ABSPATH.'/wp-content/plugins/speak-api/inc/config.php';
$Data_Cform = GetData_CForm();
$Data_Cform_Array = explode(',', $Data_Cform);
?>
<div class="wrap">
    <h2>Getting Started with  cForm 2.0</h2>
    <br /><br />
    <div class="postbox-container"  style="width:70%;">
        <div id="breadcrumbssupport" class="postbox">

            <div class="inside">
                <h2>How to Setup?</h2>
                <ol>
                    <li>cForm  is very easy to integration, just choose label names and check checkboxes for required fields.</li>
                    <li>Assign any class name to submit button.</li>
                    <li>Just Use shortcode <code>[cForm]</code> to insert form anywhere in your theme templates files.</li>
                    <li>You done it. Enjoy</li>
                </ol>    
                <form method="post" id="cform-settings">
                    <div id="check-api-form-msg"></div>
                    <table class="form-table" >
                        <tr>
                            <th scope="row">
                                <label for="namelabel">Name Field Label</label>
                            </th>
                            <td>
                                <input name="namelabel"  type="text" class="admin-text-field" value="<?php echo $Data_Cform_Array[0]; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="emaillabel">Email Field Label</label>
                            </th>
                            <td>
                                <input name="emaillabel" type="text" class="admin-text-field" value="<?php echo $Data_Cform_Array[1]; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="phonelabel">Phone Field Label</label>
                            </th>
                            <td>
                                <input name="phonelabel"  type="text" class="admin-text-field" value="<?php echo $Data_Cform_Array[2]; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="textarealabel">Textarea Label</label>
                            </th>
                            <td>
                                <input name="textarealabel"  type="text" class="admin-text-field" value="<?php echo $Data_Cform_Array[3]; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="btnclass">Button Text</label>
                            </th>
                            <td>
                                <input name="btnlabel"  type="text" class="admin-text-field" value="<?php echo $Data_Cform_Array[4]; ?>"/>
                            </td>

                        </tr>
                    </table>
                    <p class="submit">
                        <input type="submit" class="button-primary" id="cform-options-btn" value="Save Settings" />
                    </p>
                </form> 
            </div>
        </div>
    </div>
    <?php include 'about-authors.php'; ?>
</div>