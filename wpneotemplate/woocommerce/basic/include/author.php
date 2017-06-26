<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $post;
$user_info = get_user_meta($post->post_author);
$creator = get_user_by('id', $post->post_author);
?>
<p class="wpneo-author-info"><?php _e('by','wp-crowdfunding'); ?><a href="javascript:;" class="wpneo-fund-modal-btn"><?php echo wpneo_crowdfunding_get_author_name(); ?></a>