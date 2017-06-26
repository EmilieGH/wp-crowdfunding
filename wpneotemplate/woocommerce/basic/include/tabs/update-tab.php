<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $post;
$saved_campaign_update = get_post_meta($post->ID, 'wpneo_campaign_updates', true);
$saved_campaign_update_a = json_decode($saved_campaign_update, true);

//print_r($saved_campaign_update);
?>
<div class='campaign_update_wrapper'>
<?php if (is_array($saved_campaign_update_a)) {
    if (count($saved_campaign_update_a) > 0) {
        ?>
        <ul class="wpneo-crowdfunding-update">
            <?php  foreach ($saved_campaign_update_a as $key => $value) { ?>
                <li>
                    <span class="round-circle"></span>
                    <h4><?php echo $value['date']; ?></h4>
                    <p class="wpneo-crowdfunding-update-title"><?php echo $value['title']; ?></p>
                    <p><?php echo $value['details']; ?></p>
                </li>
            <?php } ?>
        </ul>
        <?php
    }
} ?>
</div>
