<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//Adding reCAPTCHA before user registration
add_action('wpneo_before_user_registration_action', 'wpneo_before_user_registration_action');
add_action('wpneo_crowdfunding_before_campaign_submit_action', 'wpneo_before_user_campaign_submit_action');

if ( ! function_exists('wpneo_before_user_registration_action')) {
	function wpneo_before_user_registration_action() {
		if (get_option('wpneo_enable_recaptcha_in_user_registration') == 'true') {
			if (function_exists('wpneo_checking_recaptcha_api')){
				wpneo_checking_recaptcha_api();
			}
		}
	}
}

if ( ! function_exists('wpneo_before_user_campaign_submit_action')) {
	function wpneo_before_user_campaign_submit_action() {
		if (get_option('wpneo_enable_recaptcha_campaign_submit_page') == 'true') {
			if (function_exists('wpneo_checking_recaptcha_api')){
				wpneo_checking_recaptcha_api();
			}
		}
	}
}

if ( ! function_exists('wpneo_http_curl_post')) {
	function wpneo_http_curl_post($url, $params){
		$postData = '';
		//create name value pairs seperated by &
		foreach ($params as $k => $v) {
			$postData .= $k . '=' . $v . '&';
		}
		$postData = rtrim($postData, '&');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_POST, count($postData));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}
}

/**
 * Checking recaptcha through api
 */
if ( ! function_exists('wpneo_checking_recaptcha_api')) {
	function wpneo_checking_recaptcha_api(){
        //Start Session
        if( ! session_id()){
            session_start();
        }
		if (get_option('wpneo_enable_recaptcha') == 'true') {
			$recaptcha_return = (object)array('success' => false);
			if ( ! empty($_POST['g-recaptcha-response'])) {

                if ( ! isset($_SESSION['wpneo_crowdfunding_recaptcha_success'])) {
                    $wpneo_recaptcha_secret_key = get_option('wpneo_recaptcha_secret_key');
                    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$wpneo_recaptcha_secret_key.'&response='.$_POST['g-recaptcha-response']);
                    $recaptcha_return = json_decode($verifyResponse);
                }elseif($_SESSION['wpneo_crowdfunding_recaptcha_success'] === true) {
                    $recaptcha_return = (object) array('success' => true);
                }
			}
			if (!$recaptcha_return->success) {
				die(json_encode(array('success'=> 0, 'message' => __('Error with reCAPTCHA, please check again', 'wp-crowdfunding'))));
			}else{
				$_SESSION['wpneo_crowdfunding_recaptcha_success'] = true;
			}
		}
	}
}