<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$pages = wpneo_get_published_pages();
$page_array = array();
if (count($pages)>0) {
    foreach ($pages as $page) {
        $page_array[$page->ID] = $page->post_title;
    }
}
$pages = $page_array;


// #WooCommerce Settings (Tab Settings)
$arr =  array(
    // #Listing Page Seperator
    array(
        'type'      => 'seperator',
        'label'     => __('WooCommerce Settings','wp-crowdfunding'),
        'desc'      => __('All settings related to WooCommerce','wp-crowdfunding'),
        'top_line'  => 'true',
    ),

    // #Hide Crowdfunding Campaign From Shop Page
    array(
        'id'        => 'hide_cf_campaign_from_shop_page',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable/Disable','wp-crowdfunding'),
        'desc'      => __('Hide Crowdfunding Campaign From Shop Page','wp-crowdfunding'),
    ),

    // #Product Single Page Fullwith
/*    array(
        'id'        => 'wpneo_single_page_id',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable/Disable','wp-crowdfunding'),
        'desc'      => __('Crowdfunding Product Single Page Fullwith.','wp-crowdfunding'),
    ),*/

    // #Listing Page Select
    array(
        'id'        => 'hide_cf_address_from_checkout',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable/Disable','wp-crowdfunding'),
        'desc'      => __('Hide Billing Address From Checkout Page','wp-crowdfunding'),
    ),

    // #Listing Page Select
    array(
        'id'        => 'wpneo_listing_page_id',
        'type'      => 'dropdown',
        'option'    => $pages,
        'label'     => __('Select Listing Page','wp-crowdfunding'),
        'desc'      => __('Select Crowdfunding Product Listing Page.','wp-crowdfunding'),
    ),

    // #Campaign Registration Page Select
    array(
        'id'        => 'wpneo_registration_page_id',
        'type'      => 'dropdown',
        'option'    => $pages,
        'label'     => __('Select Registration Page','wp-crowdfunding'),
        'desc'      => __('Select Crowdfunding Registration Page.','wp-crowdfunding'),
    ),

    // #Listing Page Seperator
    array(
        'type'      => 'seperator',
        'label'     => __('Submit Form Text Settings','wp-crowdfunding'),
        'desc'      => __('All settings related to Submit Form Text.','wp-crowdfunding'),
        'top_line'  => 'true',
    ),

    // #Campaign Submit Form Requirement Title
    array(
        'id'        => 'wpneo_requirement_title',
        'type'      => 'text',
        'label'     => __('Submit Form Requirement Title','wp-crowdfunding'),
        'desc'      => __('This Text will show below the Submit Form Title.','wp-crowdfunding'),
        'value'     => ''
    ),

    // #Campaign Submit Form Requirement Text
    array(
        'id'        => 'wpneo_requirement_text',
        'type'      => 'textarea',
        'value'     => '',
        'label'     => __('Submit Form Requirement Text','wp-crowdfunding'),
        'desc'      => __('This Text will show below the Requirement Text.','wp-crowdfunding'),
    ),

    // #Campaign Submit Form Requirement Agree Title
    array(
        'id'        => 'wpneo_requirement_agree_title',
        'type'      => 'text',
        'value'     => '',
        'label'     => __('Submit Form Agree Title','wp-crowdfunding'),
        'desc'      => __('This Text will show below the Submit Form Agree Title.','wp-crowdfunding'),
    ),

    array(
        'id'        => 'wpneo_crowdfunding_add_to_cart_redirect',
        'type'      => 'radio',
        'option'    =>  array( 'checkout_page' => 'Checkout Page', 'cart_page' => 'Cart Page', 'none' => 'None' ) ,
        'label'     => __('Redirect after Back This Campaign Button submit','wp-crowdfunding'),
        'desc'      => __('You can set redirect page when you submit back amount and click Back This Campaign Button','wp-crowdfunding'),
    ),

    // #Listing Page Seperator
    array(
        'type'      => 'seperator',
        'label'     => __('Listing Page Settings','wp-crowdfunding'),
        'top_line'  => 'true',
    ),

    // #Number of Columns in a Row
    array(
        'id'        => 'number_of_collumn_in_row',
        'type'      => 'dropdown',
        'option'    => array(
            '2' => __('2','wp-crowdfunding'),
            '3' => __('3','wp-crowdfunding'),
            '4' => __('4','wp-crowdfunding'),
        ),
        'label'     => __('Number of Columns in a Row','wp-crowdfunding'),
        'desc'      => __('Number of Columns in your Listing Page','wp-crowdfunding'),
    ),

    // #Number of Words Shown in Listing Description
    array(
        'id'        => 'number_of_words_show_in_listing_description',
        'type'      => 'number',
        'min'       => '1',
        'max'       => '',
        'value'     => '20',
        'label'     => __('Number of Words Shown in Listing Description','wp-crowdfunding'),
    ),

    // #Single Page Seperator
    array(
        'type'      => 'seperator',
        'label'     => __('Single Page Settings','wp-crowdfunding'),
        'top_line'  => 'true',
    ),

    //Load campaign in single page
    array(
        'id'        => 'wpneo_single_page_template',
        'type'      => 'radio',
        'option'    => array(
            'in_wp_crowdfunding' => __('In WP Crowdfunding own template','wp-crowdfunding'),
            'in_woocommerce' => __('In WooCommerce Default','wp-crowdfunding'),
        ),
        'label'     => __('Load single campaign template','wp-crowdfunding'),
    ),

    // #Number of Columns in a Row
    array(
        'id'        => 'wpneo_single_page_reward_design',
        'type'      => 'dropdown',
        'option'    => array(
            '1' => __('1','wp-crowdfunding'),
            '2' => __('2','wp-crowdfunding'),
        ),
        'label'     => __('Rewards design in single page','wp-crowdfunding'),
    ),

    // #Reward fixed price
    array(
        'id'        => 'wpneo_reward_fixed_price',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable/Disable','wp-crowdfunding'),
        'desc'      => __('Reward show fixed price not range.','wp-crowdfunding'),
    ),


    // #Save Function
    array(
        'id'        => 'wpneo_crowdfunding_admin_tab',
        'type'      => 'hidden',
        'value'     => 'tab_woocommerce',
    ),
);
echo wpneo_crowdfunding_settings_generate_field( $arr );

do_action('wpneo_cf_select_theme');