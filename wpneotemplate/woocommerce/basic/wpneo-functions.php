<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_action('wpneo_campaign_listing_before_loop', 'campaign_listing_by_author_before_loop');
function campaign_listing_by_author_before_loop(){
    if (! empty($_GET['author'])) {
        echo '<h3>'.__('Campaigns by: ', 'wp-crowdfunding').' '.wpneo_crowdfunding_get_author_name_by_login(sanitize_text_field(trim($_GET['author']))).'</h3>';
    }

}
add_action('woocommerce_product_thumbnails', 'wpneo_crowdfunding_campaign_single_love_this');



function wpneo_campaign_order_number_data( $min_data, $max_data, $post_id ){
    global $woocommerce, $wpdb;
    $query  =   "SELECT 
                    COUNT(p.ID)
                FROM 
                    {$wpdb->prefix}posts as p,
                    {$wpdb->prefix}woocommerce_order_items as i,
                    {$wpdb->prefix}woocommerce_order_itemmeta as im
                WHERE 
                    p.post_type='shop_order' 
                    AND p.post_status='wc-completed' 
                    AND i.order_id=p.ID 
                    AND i.order_item_id = im.order_item_id
                    AND im.meta_key='_product_id' 
                    AND im.order_item_id IN (
                                            SELECT 
                                                DISTINCT order_item_id 
                                            FROM 
                                                {$wpdb->prefix}woocommerce_order_itemmeta 
                                            WHERE 
                                                meta_key = '_line_total' 
                                                AND meta_value 
                                                    BETWEEN 
                                                        {$min_data} 
                                                        AND {$max_data}
                                            )
                    AND im.meta_value={$post_id}";
    $orders = $wpdb->get_var( $query );
    return $orders;
}

