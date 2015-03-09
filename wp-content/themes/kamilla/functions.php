<?php
/**
 * @package WordPress
 * @subpackage Speakeasy Theme
 * @since law Firm 1.0
 */
global $data;
require_once('admin/index.php'); // To add custom Theme Options Framework
require_once('dist/css/custom-css.php'); // To add custom Style
require_once('framework/shortcodes.php'); // To add custom Style

function spk_lawyer_setup() {
    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('primary', __('Primary Menu', 'spk_lawyer'));
    register_nav_menu('top_footer', __('Top Footer Menu', 'spk_lawyer'));
    register_nav_menu('secondary', __('Secondary Menu', 'spk_lawyer'));
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'spk_lawyer_setup');

add_action('wp_enqueue_scripts', 'spk_lawyer_style');

function spk_lawyer_style() {
    wp_register_script('main_jquery', get_template_directory_uri() . '/dist/js/jquery.js', array('jquery'), '2.5.1');
    wp_register_script('spk-bootstrap', get_template_directory_uri() . '/dist/js/bootstrap.min.js', array('jquery'), '2.5.1');
    wp_register_script('spk-lawyer-custom-js', get_template_directory_uri() . '/dist/js/custom.js', array('jquery'), '2.5.1');
    wp_register_script('spk-lawyer-input-mask', get_template_directory_uri() . '/dist/js/jquery.inputmask.js', array('jquery'), '2.5.1');
   
    wp_register_style('theme_css', get_template_directory_uri() . '/style.css', false, '1.0.0', 'all');
    wp_register_style('bootstrap_css', get_template_directory_uri() . '/dist/css/bootstrap.css', false, '1.0.0', 'all');
    wp_register_style('font_awesome_css', get_template_directory_uri() . '/font-awesome/css/font-awesome.css', false, '1.0.0', 'all');
    
    
    wp_register_style('Bootstrap-Theme', get_template_directory_uri() . '/dist/css/bootstrap-theme.css', false, '1.0.0', 'all');
    
    //wp_register_style('opensans_font', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Adamina', false, '1.0.0', 'all');

    wp_enqueue_script('main_jquery');
    wp_enqueue_script('spk-bootstrap');
    wp_enqueue_script('spk-lawyer-custom-js');
    wp_enqueue_script('spk-lawyer-input-mask');
    wp_enqueue_script('spk-lawyer-input-mask');
    
    wp_enqueue_style('theme_css');
    wp_enqueue_style('bootstrap_css');
    wp_enqueue_style('Bootstrap-Theme');
    wp_enqueue_style('font_awesome_css');
    //wp_enqueue_style('opensans_font');
}

function spk_lawyer_wp_title($title, $sep) {
    global $paged, $page;

    if (is_feed())
        return $title;

    // Add the site name.
    $title .= get_bloginfo('name', 'display');

    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() ))
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2)
        $title = "$title $sep " . sprintf(__('Page %s', 'spk_lawyer'), max($paged, $page));

    return $title;
}

add_filter('wp_title', 'spk_lawyer_wp_title', 10, 2);

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function spk_lawyer_widgets_init() {
    register_sidebar(array(
        'name' => __('Desktop Language Change widget', 'spk_lawyer'),
        'id' => 'sidebar-1',
        'description' => __('', 'spk_lawyer'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Sidebar Widget', 'spk_lawyer'),
        'id' => 'sidebar-2',
        'description' => __('', 'spk_lawyer'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'spk_lawyer_widgets_init');

if (!function_exists('spk_lawyer_content_nav')) :

    /**
     * Displays navigation to next/previous pages when applicable.
     *
     * @since Twenty Twelve 1.0
     */
    function spk_lawyer_content_nav($html_id) {
        global $wp_query;

        $html_id = esc_attr($html_id);

        if ($wp_query->max_num_pages > 1) :
            ?>
            <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
                <h3 class="assistive-text"><?php _e('Post navigation', 'spk_lawyer'); ?></h3>
                <div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'spk_lawyer')); ?></div>
                <div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'spk_lawyer')); ?></div>
            </nav><!-- #<?php echo $html_id; ?> .navigation -->
            <?php
        endif;
    }

endif;

function get_sidebar_inner() {
    include_once 'sidebar-inner.php';
}
function get_sidebar_blog() {
    include_once 'sidebar-blog.php';
}

/* ...........Remove Comments...................... */

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}

add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
    return false;
}

add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
    $comments = array();
    return $comments;
}

add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
}

add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}

add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}

add_action('init', 'df_disable_comments_admin_bar');

/* Custom Excerpt Length */

function excerpt_length($length) {
    global $data;
    return $data['blog_excerptlength'];
}

add_filter('excerpt_length', 'excerpt_length');

function excerpt_more($more) {
    global $post;
    return '… <a href="' . get_permalink($post->ID) . '" class="read-more-link">' . '' . __('Read more', 'law-firm') . ' &rarr;' . '</a>';
}

add_filter('excerpt_more', 'excerpt_more');

// send ifbyphone email
if ($_REQUEST['action'] != '' and $_REQUEST['action'] == 'ifbyphone') {
    // Remove spaces from phone number
    $number_1 = str_replace(' ', '', trim($data['phone1']));
    $number_1 = str_replace('-', '', trim($data['phone1']));
    $number_2 = str_replace(' ', '', trim($data['phone2']));
    $number_2 = str_replace('-', '', trim($data['phone2']));
    // Remove Special Characters
    $number_1 = preg_replace('/[^0-9\-]/', '', $number_1);
    $number_2 = preg_replace('/[^0-9\-]/', '', $number_2);
    //check if number is not empty
    if ($_REQUEST['phone-number'] == $number_1 || $_REQUEST['phone-number'] == $number_2) {
        $subject = "Incoming Call Using Your Website's Tracking#";
        $lead_source = 'Website-CA';

        sendmail($subject, $lead_source);
    }
}

function sendmail($subject, $lead_source) {
    global $data;
    require '../mail_classess/class_phpmailer.php';
    $mail = new PHPMailer;
    require '../mail_classess/smtp_setting.php';

    $admin_name = $data['lawyer_name'];
    $site_url = substr(get_bloginfo('url'), 7);
    $results = formatPhone($_GET['caller-id']);
    if (!empty($_GET['caller-id']) && !empty($results)) {
        $ifbyphone_number = formatPhone($_GET['caller-id']);
        ini_set('display_error', 0);
        $email = $data['alert_emails_phone'];

        $reply_to = 'info@' . substr(get_bloginfo('url'), 10);
        $email_temp = $data['phone_email_temp'];
        $email_temp = @str_replace("[caller-id]", formatPhone($ifbyphone_number), $email_temp);
        $email_temp = @str_replace("[duration]", $_REQUEST['duration'], $email_temp);
        $email_temp = @str_replace("[timedate]", date('m/d/Y'), $email_temp);
        $email_temp = @str_replace("[lawyername]", $admin_name, $email_temp);
        $email_temp = @str_replace("[dailled-number]", formatPhone($_REQUEST['phone-number']), $email_temp);

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
        $mail->send();
        $mail->ClearAllRecipients();

        if ($data['check_smartsheet'] == 1) {
            /* Smart Sheet papulate */
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
            $lead_data2["29239060"] = 'Phone Call'; /* Phone call */
            $lead_data2["29239061"] = "[$admin_name] - $site_url "; /* Client Name */
            $lead_data2["29239058"] = $ifbyphone_number; /* Caller id */
            $lead_data2["29241150"] = $_REQUEST['duration']; /* Call duration */
            $lead_data2["30451525"] = $lead_source; /* Lead Type */
            $lead_data2["29239062"] = ' '; /* Caller name */
            $lead_data2["29239063"] = ' '; /* Caller Email */
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
    }
}

function formatPhone($num) {
    $num = preg_replace('/[^0-9]/', '', $num);
    $len = strlen($num);

    if ($len == 10) {
        $num = preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1)  $2 - $3 ', $num);
        return $num;
    } else {
        return '0';
    }
}

/* ....................................Clients Testimonial Post type............................ */

add_action('init', 'spk_testimonial_custom_post');

function spk_testimonial_custom_post() {
    global $data;
    register_post_type(
            'testimonial', array(
        'labels' => array(
            'name' => 'Testimonial',
            'singular_name' => 'testimonial'
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => $data['testi_slug']),
        'supports' => array('title', 'editor'),
        'can_export' => true,
        'menu_icon' => get_template_directory_uri() . '/images/testi-icon.png',
            )
    );
}

register_taxonomy('testimonial_category', 'testimonial', array('hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true));
