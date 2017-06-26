<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if (! class_exists('Wpneo_Crowdfunding_Common')) {

    class Wpneo_Crowdfunding_Common{

        /**
         * @var null
         *
         * Instance of this class
         */
        protected static $_instance = null;

        /**
         * @return null|Wpneo_Crowdfunding_Common
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * Wpneo_Crowdfunding_Common constructor.
         */
        public function __construct() {

            add_action( 'wp_ajax_remove_love_campaign_action',   array($this, 'remove_love_campaign_action') );
            add_action( 'wp_ajax_love_campaign_action',          array($this, 'love_this_campaign_action') );
            add_action( 'wp_ajax_nopriv_love_campaign_action',   array($this, 'love_this_campaign_action') );
        }



        public function love_this_campaign_action(){
            if ( ! is_user_logged_in()){
                die(json_encode(array('success'=> 0, 'message' => __('Please Sign In first', 'wp-crowdfunding') )));
            }

            $loved_campaign_ids  = array();
            $user_id            = get_current_user_id();
            $campaign_id         = sanitize_text_field($_POST['campaign_id']);
            $prev_campaign_ids   = get_user_meta($user_id, 'loved_campaign_ids', true);

            if ($prev_campaign_ids){
                $loved_campaign_ids = json_decode($prev_campaign_ids, true);
            }

            if (in_array($campaign_id, $loved_campaign_ids)){
                die(json_encode(array('success'=> 0, 'message' => __('Campaign already loved', 'wp-crowdfunding') )));
            }

            $loved_campaign_ids[]    = $campaign_id;
            $ids                    = json_encode($loved_campaign_ids);

            update_user_meta($user_id, 'loved_campaign_ids', $ids);

            die(json_encode(array('success'=> 1, 'message' => __('Loved campaign', 'wp-crowdfunding'), 'return_html' =>  '<a href="javascript:;" id="remove_from_love_campaign" data-campaign-id="'.$campaign_id.'"><i class="wpneo-icon wpneo-icon-love-full"></i></a>' )));
        }

        public function remove_love_campaign_action(){

            $loved_campaign_ids  = array();
            $user_id            = get_current_user_id();
            $campaign_id         = sanitize_text_field($_POST['campaign_id']);
            $prev_campaign_ids   = get_user_meta($user_id, 'loved_campaign_ids', true);

            if ($prev_campaign_ids){
                $loved_campaign_ids = json_decode( $prev_campaign_ids, true );
            }

            if (in_array($campaign_id, $loved_campaign_ids)){
                if(($key = array_search($campaign_id, $loved_campaign_ids)) !== false) {
                    unset( $loved_campaign_ids[$key] );
                }

                $json_update_campaign_ids = json_encode($loved_campaign_ids);
                update_user_meta($user_id, 'loved_campaign_ids', $json_update_campaign_ids);
                die(json_encode(array('success'=> 1, 'message' => __('Campaign has been deleted', 'wp-crowdfunding'), 'return_html' => is_campaign_loved_html(false) )));
            }
        }
    }
}
//Call base class
Wpneo_Crowdfunding_Common::instance();