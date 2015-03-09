<?php

include_once 'config.php';

function CheckAPIKey($Array_Post) {
    $Url_Web = trim(get_bloginfo('url'));

    if (!filter_var($Url_Web, FILTER_VALIDATE_URL)) {
        $result = array(
            'result' => 'error',
            'msg' => 'Url is Not Valid in Wordpress (General Settings)'
        );

        echo json_encode($result);
    } else {

        $lead_data2['api_key'] = $Array_Post['speak_api_key'];
        $lead_data2['url'] = $Url_Web;

        $curl_options = array(
            CURLOPT_URL => "http://api.speakeasymarketinginc.com/check-api-key-client",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS =>
            http_build_query($lead_data2),
            CURLOPT_HTTP_VERSION => 1.0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_CONNECTTIMEOUT => 120,
            CURLOPT_TIMEOUT => 120,
            CURLOPT_MAXREDIRS => 10
        );
        $curl = curl_init();
        curl_setopt_array($curl, $curl_options);
        $result = curl_exec($curl);
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($http_status == '200') {
            if ($result == 'yes') {
                Update_Status_Api('1');
                return TRUE;
            } else {
                Update_Status_Api('0');
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
}
