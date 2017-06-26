<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists('Neo_Recaptcha_Init')) {
    class Neo_Recaptcha_Init
    {
        /**
         * @var null
         *
         * Instance of this class
         */
        protected static $_instance = null;

        /**
         * @return null|Wpneo_Crowdfunding
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function __construct(){
            add_action( 'init', array($this, 'wpneo_recaptcha_save_settings') );
            add_action( 'wp_enqueue_scripts', array($this, 'wpneo_recaptcha_enqueue_frontend_script') ); // Add recaptcha js in footer
            add_shortcode( 'wpneo_recaptcha', array($this, 'wpneo_recaptcha_shortcode_generator')); // Short code for HTML section google reCAPTCHA
            add_filter( 'wpneo_user_registration_fields', array($this, 'wpneo_recaptcha_add_user_registration_form')); // Hook to add recaptcha field with user registration form
            add_filter( 'wpneo_before_closing_crowdfunding_campaign_form', array($this, 'wpneo_recaptcha_add_campaign_form'));
            add_filter( 'wpneo_crowdfunding_settings_panel_tabs', array($this, 'add_recaptcha_tab_to_wpneo_crowdfunding_settings'));
        }

        /**
         * Some task during plugin activate
         */
        public static function initial_plugin_setup(){
            //Check is plugin used before or not
            if (get_option('wpneo_recaptcha_is_used')){ return false; }

            update_option('wpneo_recaptcha_is_used', WPNEO_CROWDFUNDING_RECAPTCHA_VERSION);
            update_option( 'wpneo_enable_recaptcha', 'false');
            update_option( 'wpneo_enable_recaptcha_in_user_registration', 'false');
            update_option( 'wpneo_enable_recaptcha_campaign_submit_page', 'false');
        }

        public function wpneo_recaptcha_shortcode_generator(){
            $wpneo_recaptcha_site_key = get_option('wpneo_recaptcha_site_key');
            $html = '<div class="g-recaptcha" data-sitekey="'.$wpneo_recaptcha_site_key.'"></div>';
            return $html;
        }

        public function wpneo_recaptcha_add_user_registration_form($registration_fields){
            if ( get_option('wpneo_enable_recaptcha') == 'true' && get_option('wpneo_enable_recaptcha_in_user_registration') == 'true') {
                $registration_fields[] =  array(
                    'type' => 'shortcode',
                    'shortcode' => '[wpneo_recaptcha]',
                );
            }
            return $registration_fields;
        }

        public function wpneo_recaptcha_add_campaign_form(){
            $html = '';
            if ( get_option('wpneo_enable_recaptcha') == 'true' && get_option('wpneo_enable_recaptcha_campaign_submit_page') == 'true') {
                $html .= '<div class="text-right">';
                $html .= do_shortcode('[wpneo_recaptcha]');
                $html .= '</div>';
            }
            return $html;
        }

        public function wpneo_recaptcha_enqueue_frontend_script(){
            if ( get_option('wpneo_enable_recaptcha') == 'true') {
                wp_enqueue_script('wpneo-recaptcha-js', 'https://www.google.com/recaptcha/api.js', null, WPNEO_CROWDFUNDING_VERSION, true);
            }
        }

        public function add_recaptcha_tab_to_wpneo_crowdfunding_settings($tabs){
            //Defining page location into variable
            $load_recaptcha_page = WPNEO_CROWDFUNDING_RECAPTCHA_DIR_PATH.'pages/tab-recaptcha-demo.php';
            if (WPNEO_CROWDFUNDING_TYPE === 'free'){
                $recaptcha_page = $load_recaptcha_page;
            }else{
                $recaptcha_page = WPNEO_CROWDFUNDING_RECAPTCHA_DIR_PATH.'pages/tab-recaptcha.php';
            }

            $tabs['recaptcha'] = array(
                'tab_name' => __('reCAPTCHA','wp-crowdfunding'),
                'load_form_file' => $recaptcha_page
            );
            return $tabs;
        }

        /**
         * All settings will be save in this method
         */
        public function wpneo_recaptcha_save_settings(){
            if (isset($_POST['wpneo_admin_settings_submit_btn']) && isset($_POST['wpneo_recaptcha_activation']) && wp_verify_nonce( $_POST['wpneo_settings_page_nonce_field'], 'wpneo_settings_page_action' ) ){
                //Checkbox
                update_option( 'wpneo_enable_recaptcha', 'false');
                update_option( 'wpneo_enable_recaptcha_in_user_registration', 'false');
                update_option( 'wpneo_enable_recaptcha_campaign_submit_page', 'false');

                if (!empty($_POST['wpneo_enable_recaptcha'])) {
                    update_option('wpneo_enable_recaptcha', $_POST['wpneo_enable_recaptcha']);
                }
                if (!empty($_POST['wpneo_enable_recaptcha_in_user_registration'])) {
                    update_option('wpneo_enable_recaptcha_in_user_registration', $_POST['wpneo_enable_recaptcha_in_user_registration']);
                }
                if (!empty($_POST['wpneo_enable_recaptcha_campaign_submit_page'])) {
                    update_option('wpneo_enable_recaptcha_campaign_submit_page', $_POST['wpneo_enable_recaptcha_campaign_submit_page']);
                }

                //Text Field
                if (!empty($_POST['wpneo_recaptcha_site_key'])) {
                    update_option('wpneo_recaptcha_site_key', $_POST['wpneo_recaptcha_site_key']);
                }
                if (!empty($_POST['wpneo_recaptcha_secret_key'])) {
                    update_option('wpneo_recaptcha_secret_key', $_POST['wpneo_recaptcha_secret_key']);
                }
            }
        }
    }
}

Neo_Recaptcha_Init::instance();

