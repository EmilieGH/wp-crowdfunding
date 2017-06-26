<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<div class="wpneo-single-sidebar">
    <?php
    global $post, $woocommerce, $product;
    $currency = '$';
    if ($product->get_type() == 'crowdfunding') {
        if (WPNEOCF()->campaignValid()) {
            $recomanded_price = get_post_meta($post->ID, 'wpneo_funding_recommended_price', true);
            $min_price = get_post_meta($post->ID, 'wpneo_funding_minimum_price', true);
            $max_price = get_post_meta($post->ID, 'wpneo_funding_maximum_price', true);
            if(function_exists( 'get_woocommerce_currency_symbol' )){
                $currency = get_woocommerce_currency_symbol();
            }

            if (! empty($_GET['reward_min_amount'])){
                $recomanded_price = (int) esc_html($_GET['reward_min_amount']);
            } ?>

            <span class="wpneo-tooltip">
                <span class="wpneo-tooltip-min"><?php _e('Minimum amount is ','wp-crowdfunding'); echo $currency.$min_price; ?></span>
                <span class="wpneo-tooltip-max"><?php _e('Maximum amount is ','wp-crowdfunding'); echo $currency.$max_price; ?></span>
            </span>
            
            <form enctype="multipart/form-data" method="post" class="cart">
                <?php do_action('before_wpneo_donate_field'); ?>
                <input type="number" min="0" placeholder="<?php echo  get_woocommerce_currency_symbol().' '.$recomanded_price; ?>" name="wpneo_donate_amount_field" class="input-text amount wpneo_donate_amount_field text" value="<?php echo $recomanded_price; ?>" data-min-price="<?php echo $min_price ?>" data-max-price="<?php echo $max_price ?>" >
                <?php do_action('after_wpneo_donate_field'); ?>
                <input type="hidden" value="<?php echo esc_attr($post->ID); ?>" name="add-to-cart">
                <button type="submit" class="<?php echo apply_filters('add_to_donate_button_class', 'wpneo_donate_button'); ?>"><?php _e('Back This Campaign', 'wp-crowdfunding'); ?>
            </form>
            
            <?php
        } else {
            _e('This campaigns is over.','wp-crowdfunding');
        }
    }

    ?>
</div>