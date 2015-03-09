<?php

global $wpdb, $table_prefix;

if (!isset($wpdb)) {
    require_once('../../../../wp-config.php');
    require_once('../../../../wp-includes/wp-db.php');
}

/* ......................Global Funcations................... */

function GetData_CForm() {
    global $wpdb, $table_prefix;
    $table_name = $wpdb->prefix . "speak_api";
    $data = $wpdb->get_var("SELECT cform_options FROM $table_name Where speak_api_id = 1");
    return $data;
}

function CheckApiKeyStatus() {
    global $wpdb, $table_prefix;
    $table_name = $wpdb->prefix . "speak_api";
    $data = $wpdb->get_var("SELECT speak_api_status FROM $table_name Where speak_api_id = 1");
    return $data;
}

function Update_Status_Api($V) {
    global $wpdb, $table_prefix;
    $table_name = $wpdb->prefix . "speak_api";
    $wpdb->update(
            $table_name, array(
        'speak_api_status' => $V,
            ), array('speak_api_id' => 1), array(
        '%s',
        '%d'
            ), array('%d')
    );
}

function Get_ApiKey() {
    global $wpdb, $table_prefix;
    $table_name = $wpdb->prefix . "speak_api";
    $data = $wpdb->get_var("SELECT speak_api_key FROM $table_name Where speak_api_id = 1");
    return $data;
}

function Get_ApiOptions() {
    global $wpdb, $table_prefix;
    $table_name = $wpdb->prefix . "speak_api";
    $data = $wpdb->get_var("SELECT speak_api_options FROM $table_name Where speak_api_id = 1");
    return $data;
}
