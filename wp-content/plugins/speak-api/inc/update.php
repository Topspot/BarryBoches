<?php

include_once 'config.php';

/* ......................Include File Api key................... */
include_once 'check-api-key.php';

function _isCurl() {
    return function_exists('curl_version');
}

if (_isCurl()) {
    $Array_Post = $_POST;
    $Check_APIKey = CheckAPIKey($Array_Post);
    if ($Check_APIKey) {
        $table_name = $wpdb->prefix . "speak_api";
        $user_count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
        $Check_option = CheckOptions($Array_Post);
        if ($user_count > 0) {
            $wpdb->update(
                    $table_name, array(
                'speak_api_key' => $Array_Post['speak_api_key'],
                'speak_api_status' => '1',
                'speak_api_options' => $Check_option,
                'speak_api_date' => mysqlNow()
                    ), array('speak_api_id' => 1), array(
                '%s',
                '%d'
                    ), array('%d')
            );
            $result = array(
                'result' => 'success',
                'msg' => 'Data update, Please Wait for page reload.'
            );

            echo json_encode($result);
        } else {
            $wpdb->insert(
                    $table_name, array(
                'speak_api_key' => $Array_Post['speak_api_key'],
                'speak_api_status' => '1',
                'speak_api_options' => $Check_option,
                'speak_api_date' => mysqlNow()
                    ), array(
                '%s',
                '%d'
                    )
            );
            $result = array(
                'result' => 'success',
                'msg' => 'Data update, Please Wait for page reload.'
            );

            echo json_encode($result);
        }
    } else {
        $result = array(
            'result' => 'error',
            'msg' => 'Api Key Or Url is Not Valid'
        );

        echo json_encode($result);
    }
} else {
    $result = array(
        'result' => 'error',
        'msg' => 'Curl not Active in Hosting'
    );

    echo json_encode($result);
}
/* ................Get Curent Date.................... */

function mysqlNow() {
    return date('Y:m:d H:i:s');
}

/* ........................................ */

function CheckOptions($Array) {
    if (isset($Array['phone_email'])) {
        $Phone = 'PY';
    } else {
        $Phone = 'PN';
    }
    if (isset($Array['book_download_email'])) {
        $Book = 'BY';
    } else {
        $Book = 'BN';
    }
    if (isset($Array['contact_form_email'])) {
        $Contact = 'CY';
    } else {
        $Contact = 'CN';
    }
    if (isset($Array['robots_txt'])) {
        $Robots = 'RY';
    } else {
        $Robots = 'RN';
    }
    $Final_Result = $Phone . ',' . $Book . ',' . $Contact . ',' . $Robots;
    return $Final_Result;
}
