<?php

/*
  Plugin Name: Speakeasy Api
  Plugin URI: #
  Description: This Plugin is used for New Clients
  Version: 1.0
  Author: Muhammad Yousaf raza
 */

if (!class_exists("SpeakApi")) {

    class SpeakApi {

        var $_version = '1.0';
        var $_name = 'SpeakApi';
        var $_pluginPath = '';
        var $_FormName = 'cForm';
        var $_pluginRelativePath = '';
        var $_pluginURL = '';
        var $_supportURL = 'mailto:muhammadyousafraza@gmail.com';

        function __construct() {
            $this->_pluginURL = plugins_url('/speak-api/');
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                $this->_pluginURL = str_replace('http://', 'https://', $this->_pluginURL);
            }
            if (is_admin()) {
                add_action('admin_menu', array($this, 'SpeakApi_menu')); // Add menu in admin.
                register_activation_hook(__FILE__, array('SpeakApi', 'speak_api_create_tables'));
                add_action('admin_init', array($this, 'SpeakApi_css_and_js'));
            }
            if (!is_admin()) {
                add_action('wp_enqueue_scripts', array($this, 'speakapi_frontend'));
            }
            add_shortcode('cForm', array($this, 'get_cForm'));
        }

        /* .....................Add MEnu in Admin................................................. */

        public function SpeakApi_menu() {
            add_menu_page('SpeakApi', 'Speak API', 'administrator', 'speak-setting', array($this, 'speak_setting_page'), plugins_url('/speak-api/images/icon.png', 1));
            //Sub pages
            add_submenu_page('speak-setting', 'cForm Settings', 'cForm Settings', 'administrator', 'cform-settings', array($this, 'cForm'));
        }

        /* ....................Speak Api Page............................... */

        public function speak_setting_page() {
            include_once 'inc/setting.php';
        }

        /* ..........................Create Table In Databse............................. */

        public function speak_api_create_tables() {
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            global $wpdb, $table_prefix;
            $charset_collate = $wpdb->get_charset_collate();
            $table_name = $wpdb->prefix . "speak_api";
            $table_name2 = $wpdb->prefix . "speak_api_leads";

            $sql_create_table = "CREATE TABLE IF NOT EXISTS {$table_name} (
          speak_api_id bigint(20) unsigned NOT NULL auto_increment,
          speak_api_key varchar(255) NOT NULL default '0',
          speak_api_status int(20) unsigned NOT NULL default '0',
          speak_api_options varchar(255),          
          cform_options longtext,          
          speak_api_date datetime NOT NULL default '0000-00-00 00:00:00',
          PRIMARY KEY  (speak_api_id)
     )  $charset_collate";

            dbDelta($sql_create_table);

            /* ............................................... */
            $sql_create_table2 = "CREATE TABLE IF NOT EXISTS {$table_name2} (
          speak_api_leads bigint(20) unsigned NOT NULL auto_increment,
          speak_api_leads_name varchar(255) NOT NULL default '0',
          speak_api_leads_phone varchar(255) NOT NULL default '0',
          speak_api_leads_email varchar(255) NOT NULL default '0',          
          speak_api_leads_msg longtext,          
          speak_api_leads_type varchar(25) NOT NULL default '0',          
          speak_api_lead_time datetime NOT NULL default '0000-00-00 00:00:00',
          PRIMARY KEY  (speak_api_leads)
     )  $charset_collate";

            dbDelta($sql_create_table2);
        }

        /* ........................Include Js and Css............................... */

        function SpeakApi_css_and_js() {
            wp_enqueue_script('jquery-ui-core');
            wp_register_style('speakapi-css', $this->_pluginURL . '/css/css.css');
            wp_enqueue_style('speakapi-css');
            wp_register_script('speak-api-js', $this->_pluginURL . '/js/speak-api-js.js');
            wp_enqueue_script('speak-api-js');
            wp_localize_script("speakapiajax", "speakajax", $this->_pluginURL);
            wp_enqueue_script('speakapiajax');
        }

        /* .....................Include Js and Cs on Front End............................ */

        public function speakapi_frontend() {
            wp_register_script('speakapi-maskedinput', $this->_pluginURL . '/js/jquery.maskedinput-1.3.js');
            wp_enqueue_script('speakapi-maskedinput');
            wp_register_script('speakapi-frontend', $this->_pluginURL . '/js/speak-api-js-frontend.js');
            wp_enqueue_script('speakapi-frontend');
            wp_register_style('speakapi-css-frontend', $this->_pluginURL . '/css/cform_frontend.css');
            wp_enqueue_style('speakapi-css-frontend');
        }

        /* ........................cForm Funcations................................. */

        public function cForm() {
            include_once 'cform/index.php';
        }

        /* ...........................Get cForm Form.............................. */

        public function get_cForm() {
            include_once 'cform/get_form.php';
        }

    }

    $cFormObj = new SpeakApi(); // Create instance
}