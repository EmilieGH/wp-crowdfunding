<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists('Neo_Social_Share_Init')) {
    class Neo_Social_Share_Init{
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
            add_action( 'init', array($this, 'wpneo_social_share_save_settings') ); // Social Share Settings
            add_action( 'wp_enqueue_scripts', array($this, 'wpneo_social_share_enqueue_frontend_script') ); //Add social share js in footer
            add_filter('wpneo_crowdfunding_settings_panel_tabs', array($this, 'add_social_share_tab_to_wpneo_crowdfunding_settings')); //Hook to add social share field with user registration form
        }

        public function add_social_share_tab_to_wpneo_crowdfunding_settings($tabs){
            $tabs['social-share'] = array(
                'tab_name' => __('Social Share','wp-crowdfunding'),
                'load_form_file' => plugin_dir_path(__FILE__).'pages/tab-social-share.php'
            );
            return $tabs;
        }

        public function wpneo_social_share_enqueue_frontend_script(){
            if ( get_option('wpneo_enable_social_share') == 'true') {
                wp_enqueue_script('wp-neo-jquery-social-share-front', WPNEO_CROWDFUNDING_DIR_URL .'addons/social-share/jquery.prettySocial.min.js', array('jquery'), WPNEO_CROWDFUNDING_VERSION, true);
            }
        }

          /**
         * All settings will be save in this method
         */
        public function wpneo_social_share_save_settings(){
            if (isset($_POST['wpneo_admin_settings_submit_btn']) && isset($_POST['wpneo_varify_social_share']) && wp_verify_nonce( $_POST['wpneo_settings_page_nonce_field'], 'wpneo_settings_page_action' ) ){
                // Checkbox
                $wpneo_enable_social_share = sanitize_text_field(wpneo_post('wpneo_enable_social_share'));
                wpneo_crowdfunding_update_option_checkbox('wpneo_enable_social_share', $wpneo_enable_social_share);

                $wpneo_twitter_social_share = sanitize_text_field(wpneo_post('wpneo_twitter_social_share'));
                wpneo_crowdfunding_update_option_checkbox('wpneo_twitter_social_share', $wpneo_twitter_social_share);

                $wpneo_facebook_social_share = sanitize_text_field(wpneo_post('wpneo_facebook_social_share'));
                wpneo_crowdfunding_update_option_checkbox('wpneo_facebook_social_share', $wpneo_facebook_social_share);

                $wpneo_facebook_social_share = sanitize_text_field(wpneo_post('wpneo_facebook_social_share'));
                wpneo_crowdfunding_update_option_checkbox('wpneo_facebook_social_share', $wpneo_facebook_social_share);

                $wpneo_googleplus_social_share = sanitize_text_field(wpneo_post('wpneo_googleplus_social_share'));
                wpneo_crowdfunding_update_option_checkbox('wpneo_googleplus_social_share', $wpneo_googleplus_social_share);

                $wpneo_pinterest_social_share = sanitize_text_field(wpneo_post('wpneo_pinterest_social_share'));
                wpneo_crowdfunding_update_option_checkbox('wpneo_pinterest_social_share', $wpneo_pinterest_social_share);

                $wpneo_linkedin_social_share = sanitize_text_field(wpneo_post('wpneo_linkedin_social_share'));
                wpneo_crowdfunding_update_option_checkbox('wpneo_linkedin_social_share', $wpneo_linkedin_social_share);

                //Text Field
                $wpneo_twitter_via = sanitize_text_field(wpneo_post('wpneo_twitter_via'));
                wpneo_crowdfunding_update_option_checkbox('wpneo_twitter_via', $wpneo_twitter_via);

                $wpneo_linkedin_via = sanitize_text_field(wpneo_post('wpneo_linkedin_via'));
                wpneo_crowdfunding_update_option_checkbox('wpneo_linkedin_via', $wpneo_linkedin_via);
            }
        }
    }
}
Neo_Social_Share_Init::instance();

/**
 * Add to hook share option.
 */
if ( ! function_exists( 'wpneo_crowdfunding_campaign_single_social_share' ) ) {
    function wpneo_crowdfunding_campaign_single_social_share() {
        wpneo_crowdfunding_load_template('include/social-share');
    }
}
if(get_option('wpneo_enable_social_share') == 'true') {
    add_action('wpneo_crowdfunding_single_campaign_summery', 'wpneo_crowdfunding_campaign_single_social_share', 11);
}
