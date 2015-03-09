<?php

include_once 'config.php';
include_once('gump.class.php');
$isValid = GUMP::is_valid($_POST, array(
            'namelabel' => 'required',
            'emaillabel' => 'required',
            'phonelabel' => 'required',
            'textarealabel' => 'required',
            'btnlabel' => 'required',
        ));

if ($isValid === true) {
    $table_name = $wpdb->prefix . "speak_api";
    $Array_Post = $_POST;
    $Data = $Array_Post['namelabel'] . ',' . $Array_Post['emaillabel'] . ',' . $Array_Post['phonelabel'] . ',' . $Array_Post['textarealabel'] . ',' . $Array_Post['btnlabel'];
    $wpdb->update(
            $table_name, array(
        'cform_options' => $Data,
            ), array('speak_api_id' => 1), array(
        '%s',
        '%d'
            ), array('%d')
    );
    
    $result = array(
        'result' => 'success',
        'msg' => array('Data Saved Wait for Page reload')
    );

    echo json_encode($result);
} else {
    $result = array(
        'result' => 'error',
        'msg' => $isValid
    );

    echo json_encode($result);
}