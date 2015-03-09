<?php

global $wpdb, $table_prefix;

require '../mail_classess/class_phpmailer.php';
$mail = new PHPMailer;
require '../mail_classess/smtp_setting.php';

if (!isset($wpdb)) {
    require_once('../../../../wp-config.php');
    require_once('../../../../wp-includes/wp-db.php');
}
global $data;

//echo "IP addres".$ip_address = getClientIPs();exit;
//$ip_address_email = str_replace('.', '-', $ip_address);

$book_type = $_POST['book'];
$book_id = $_POST['bookid'];
$name = $_POST['name' . $book_id . ''];
$phone = $_POST['phone' . $book_id . ''];
$email = $_POST['email' . $book_id . ''];
$email_sub = $_POST['email_sub'];
$pdf_url = $_POST['pdfurl'];

if (strlen($phone) >= 15) {
    print "alert |-|An ERROR occured while processing your request, please try again.";
    exit();
}

/* ...........................Funcation For server side Validation................... */

function PhoneVal($phone) {
    $phone = strip_tags($phone);

    if (empty($phone)) {
        echo '*Please Enter Phone Number<br />';
        exit();
    } else {
        if (strlen($phone) >= 15) {
            echo '*Phone number Must be 10 Characters Long <br />';
            exit();
        } else {
            $phone_format = preg_replace("/[^0-9,.]/", "", $phone);

            if ($phone_format == '' || strlen($phone_format) != '10') {
                echo '*Please enter 10 Digit phone number<br />';
                exit();
            } else {
                return 1;
            }
        }
    }
}

function EmailVal($email) {
    $email = strip_tags($email);
    if (empty($email)) {
        echo '*Please Enter Email<br />';
        exit();
    } else {
        if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
            echo '*Please Enter Valid Email Address<br />';
            exit();
        } else {
            return 1;
        }
    }
}

/* .......................................End................................................. */

$check_phone = PhoneVal($phone);
$check_email = EmailVal($email);

if ($check_phone == 1 && $check_email == 1) {
// to detect outside the domain hits
    $refer_by = substr($_SERVER['HTTP_REFERER'], 7);
    $refer_domain = explode('.', $refer_by);
//get website url without htttp://
    $site_url = substr(get_bloginfo('url'), 7);
    $hosted_domain = explode('.', $site_url);

    if ($refer_domain[0] != $hosted_domain[0]) {
        print "alert |-|An ERROR occured while processing your request, please try again.";
        exit();
    }
    if (empty($name) || empty($phone) || empty($email) || empty($book_type)) {
        print "alert |-|Please fill all fields.";
        exit();
    }
    $phone_format = preg_replace("/[^0-9,.]/", "", $phone);

    if ($phone_format == '' || strlen($phone_format) != '10') {
        print "alert |-| Please enter valid phone number";
        exit();
    }

    $lawyer_name = $data['lawyer_name'];
    $to = $data['alert_emails'];
    $email_array = explode(',', $to);
    $subject = 'This person downloaded the ' . $email_sub . ' guide from your website';
    $lead_source = 'Book-' . $email_sub;
// Formate email template and replace shortcodes
    $email_temp = $data['book_email_temp'];
    $email_temp = @str_replace("[booktype]", $email_sub, $email_temp);
    $email_temp = @str_replace("[name]", $name, $email_temp);
    $email_temp = @str_replace("[phone]", $phone, $email_temp);
    $email_temp = @str_replace("[email]", $email, $email_temp);
    $email_temp = @str_replace("[lawyername]", $lawyer_name, $email_temp);
    //$email_temp .= "<br /><br /><span style='color:#fff'>" . $ip_address_email . "</span>";

    $mail->From = 'support@speakeasymarketinginc.com';
    $mail->FromName = $site_url;
    for ($i = 0; $i < sizeof($email_array); $i++) {
        $mail->addAddress($email_array[$i]);
    }
    $mail->addReplyTo($to);

    $mail->WordWrap = 50;
    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body = $email_temp;

    if ($mail->send()) {
        $mail->ClearAllRecipients();
        print "alert alert-success|-| Sent successfully |-| $pdf_url";
    } else {
        print "error|-|An ERROR occured while processing your request, please try again.";
    }

    // check if smartsheet alerts are enabled
    if ($data['check_smartsheet'] == 1) {
        date_default_timezone_set("America/New_York");
        $lead_data2 = array();
        $main_sheet_id = '8eda7e4a0e5548fda3cc511af3e4e729';
        $lead_data2['ctlForm'] = 'ctlForm';
        $lead_data2['formName'] = 'fn_row';
        $lead_data2["formAction"] = "fa_insertRow";
        $lead_data2["parm1"] = $main_sheet_id;
        $lead_data2["parm2"] = "";
        $lead_data2["parm3"] = "";
        $lead_data2["parm4"] = "";
        $lead_data2["sk"] = "";
        $lead_data2["SFReturnURL"] = "";
        $lead_data2["SFImageURL"] = "";
        $lead_data2["SFImage2URL"] = "";
        $lead_data2["SFTaskNumber"] = "";
        $lead_data2["SFTaskID"] = "";
        $lead_data2["SFInstructions"] = "";
        $lead_data2["EQBCT"] = $main_sheet_id;
        $lead_data2["29239059"] = date('m/d/Y'); /* Date */
        $lead_data2["29239060"] = $lead_source; /* Phone call */
        $lead_data2["29239061"] = "[$lawyer_name] - $site_url"; /* Client Name */
        $lead_data2["30451525"] = $lead_source; /* Lead Type */
        $lead_data2["29239058"] = $phone; /* Caller id */
        $lead_data2["83141689"] = date('h:i A'); /* Time of lead */
        $lead_data2["29241150"] = ' '; /* Call duration */
        $lead_data2["29239062"] = $name; /* Caller name */
        $lead_data2["29239063"] = $email; /* Caller Email */
        $lead_data2["29241135"] = ' '; /* Book Type */
        $lead_data2["29241136"] = ' '; /* Office Location */

        $lead_server_data = array();
        $lead_server_data['comments'] = '';
        $lead_server_data['caller_type'] = '';
        $lead_server_data['lead_date'] = date('m/d/Y'); /* Date */
        $lead_server_data['lead_source'] = $lead_source; /* Phone call */
        $lead_server_data['client_name'] = $lawyer_name;
        $lead_server_data['website'] = $site_url;
        $lead_server_data['inc_phone'] = $phone; /* Caller id */
        $lead_server_data['call_time'] = date('h:i A'); /* Time of lead */
        $lead_server_data['call_duration'] = '';
        $lead_server_data['lead_name'] = $name; /* Caller name */
        $lead_server_data['lead_email'] = $email; /* Caller Email */

        $curl_options = array(
            CURLOPT_URL => "https://app.smartsheet.com/b/publish",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($lead_data2),
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

        /// Send to Speakeasy Dashboard
        $curl_options = array(
            CURLOPT_URL => "http://dashboard.speakeasymarketinginc.com/lead/leaddata",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($lead_server_data),
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
    }


    /* Get ip Address */

    function getClientIPs() {

        if (isset($_SERVER)) {

            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
                return $_SERVER["HTTP_X_FORWARDED_FOR"];

            if (isset($_SERVER["HTTP_CLIENT_IP"]))
                return $_SERVER["HTTP_CLIENT_IP"];

            return $_SERVER["REMOTE_ADDR"];
        }

        if (getenv('HTTP_X_FORWARDED_FOR'))
            return getenv('HTTP_X_FORWARDED_FOR');

        if (getenv('HTTP_CLIENT_IP'))
            return getenv('HTTP_CLIENT_IP');

        return getenv('REMOTE_ADDR');
    }

    /* Get ip Address */
}