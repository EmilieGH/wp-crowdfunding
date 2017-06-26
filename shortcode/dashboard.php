<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'wpneo_crowdfunding_dashboard','wpneo_shortcode_croudfunding_dashboard' );

function wpneo_shortcode_croudfunding_dashboard( $attr ){

    $html = '';
    $get_id = '';

    if( isset($_GET['page_type']) ){ $get_id = $_GET['page_type']; }
    if ( is_user_logged_in() ) {
        $pagelink = get_permalink( get_the_ID() );

        $dashboard_menus = apply_filters('wpneo_crowdfunding_frontend_dashboard_menus', array(
            'dashboard' 	=>
                array(
                    'tab_name' => __('Dashboard','wp-crowdfunding'),
                    'load_form_file' => WPNEO_CROWDFUNDING_DIR_PATH.'includes/woocommerce/dashboard/dashboard.php'
                ),
            'profile' 	=>
                array(
                    'tab_name' => __('Profile','wp-crowdfunding'),
                    'load_form_file' => WPNEO_CROWDFUNDING_DIR_PATH.'includes/woocommerce/dashboard/profile.php'
                ),
            'contact' 	=>
                array(
                    'tab_name' => __('Contact','wp-crowdfunding'),
                    'load_form_file' => WPNEO_CROWDFUNDING_DIR_PATH.'includes/woocommerce/dashboard/contact.php'
                ),
            'campaign'  =>
                array(
                    'tab_name' => __('My Campaigns','wp-crowdfunding'),
                    'load_form_file' => WPNEO_CROWDFUNDING_DIR_PATH.'includes/woocommerce/dashboard/campaign.php'
                ),
            'backed_campaigns'   =>
                array(
                    'tab_name' => __('Backed Campaigns','wp-crowdfunding'),
                    'load_form_file' => WPNEO_CROWDFUNDING_DIR_PATH.'includes/woocommerce/dashboard/investment.php'
                ),
            'pledges_received'   =>
                array(
                    'tab_name' => __('Pledges Received','wp-crowdfunding'),
                    'load_form_file' => WPNEO_CROWDFUNDING_DIR_PATH.'includes/woocommerce/dashboard/order.php'
                ),
            'bookmark'   =>
                array(
                    'tab_name' => __('Bookmarks','wp-crowdfunding'),
                    'load_form_file' => WPNEO_CROWDFUNDING_DIR_PATH.'includes/woocommerce/dashboard/bookmark.php'
                ),
            'password'   =>
                array(
                    'tab_name' => __('Password','wp-crowdfunding'),
                    'load_form_file' => WPNEO_CROWDFUNDING_DIR_PATH.'includes/woocommerce/dashboard/password.php'
                ),
            'rewards'   =>
                array(
                    'tab_name' => __('Rewards','wp-crowdfunding'),
                    'load_form_file' => WPNEO_CROWDFUNDING_DIR_PATH.'includes/woocommerce/dashboard/rewards.php'
                ),
        ));

        $html .= '<div class="wpneo-wrapper">';
        $html .= '<div class="wpneo-head">';
        $html .= '<ul class="wpneo-links">';

        /**
         * Print menu with active link marking...
         */
        foreach ($dashboard_menus as $menu_name => $menu_value){
            if ( empty($get_id) && $menu_name == 'dashboard'){
                $active = 'active';
            }else{
                $active = ($get_id == $menu_name) ? 'active' : '';
            }
            $pagelink = add_query_arg( 'page_type', $menu_name , $pagelink );
            $html .= '<li class="'.$active.'"><a href="'.$pagelink.'">'.$menu_value['tab_name'].'</a></li>';
        }
        $html .= '<li><a href="'.wp_logout_url( home_url() ).'">'.__("Logout","wp-crowdfunding").'</a></li>';

        $html .= '<ul>';
        $html .= '</div>';

        $var = '';
        if( isset($_GET['page_type']) ){
            $var = $_GET['page_type'];
        }

        ob_start();
        if( $var == 'update' ){
            require_once WPNEO_CROWDFUNDING_DIR_PATH.'includes/woocommerce/dashboard/update.php';
        }else{
            if ( ! empty($dashboard_menus[$get_id]['load_form_file']) ) {
                if (file_exists($dashboard_menus[$get_id]['load_form_file'])) {
                    include $dashboard_menus[$get_id]['load_form_file'];
                }
            }else{
                include $dashboard_menus['dashboard']['load_form_file'];
            }
        }
        $html .= ob_get_clean();

        $html .= '</div>';

    }else{
        $html .= wpneo_crowdfunding_wc_toggle_login_form();
    }

    return $html;
}
