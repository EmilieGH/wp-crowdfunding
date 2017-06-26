<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $post;
$user_info = get_user_meta($post->post_author);
$creator = get_user_by('id', $post->post_author);
?>

<div class="wpneo-campaign-creator-info-wrapper">
    <div class="wpneo-campaign-creator-avatar">
        <?php  echo get_avatar($post->post_author, 45); ?>
    </div>
    <div class="wpneo-campaign-creator-details">
        <p><a href="javascript:;" class="wpneo-fund-modal-btn"><?php echo wpneo_crowdfunding_get_author_name(); ?></a> </p>
        <p><?php echo wpneo_crowdfunding_author_all_campaigns()->post_count; ?> <?php _e("Campaigns","wp-crowdfunding"); ?> | <?php echo wpneo_loved_campaign_count(); ?> <?php _e("Loved campaigns","wp-crowdfunding"); ?> </p>
        <?php if ( ! empty($user_info['profile_website'][0])){ ?>
            <p><a href="<?php echo wpneo_crowdfunding_add_http($user_info['profile_website'][0]); ?>"><strong> <?php echo wpneo_crowdfunding_add_http($user_info['profile_website'][0]); ?></strong></a></p>
        <?php } ?>
        <p><a href="javascript:;" class="wpneo-fund-modal-btn wpneo-link-style1"><strong><?php _e('See full bio.', 'wp-crowdfunding'); ?></strong></a></p>
    </div>
</div>


<!-- Modal Content -->
<div class="wpneo-modal-wrapper">
    <div class="wpneo-modal-content">
        <div class="wpneo-modal-wrapper-head">
            <h4><?php _e('About the campaign creator','wp-crowdfunding'); ?></h4>
            <a href="javascript:;" class="wpneo-modal-close">&times;</a>
        </div>
        <div class="wpneo-modal-content-inner">
            
            <div  class="wpneo-profile-left">
                <?php
                    $img_src = '';
                    $image_id = get_user_meta( get_current_user_id(), 'profile_image_id', true );
                    if( $image_id != '' ){
                        $img_src = wp_get_attachment_image_src( $image_id, 'full' );
                        $img_src = $img_src[0];
                    }
                    if (!empty($img_src)){
                        echo '<img width="105" height="105" class="profile-avatar" srcset="'.$img_src.'" alt="">';
                    }
                ?>
            </div>
            <div class="wpneo-profile-right">
                <div class="wpneo-profile-name"><?php echo wpneo_crowdfunding_get_author_name(); ?></div>
                <?php if (wpneo_crowdfunding_get_campaigns_location()){ ?>
                    <div class="wpneo-profile-location">
                        <i class="wpneo-icon wpneo-icon-location"></i> <span><?php echo wpneo_crowdfunding_get_campaigns_location(); ?></span>
                    </div>
                <?php } ?>
                <div class="wpneo-profile-campaigns"><?php echo wpneo_crowdfunding_author_all_campaigns()->post_count.__( " Campaigns" , "wp-crowdfunding" ).' | '. wpneo_loved_campaign_count().__( " Loved campaigns" , "wp-crowdfunding" ); ?></div>
            </div>


            <?php
            if ( ! empty($user_info['profile_about'][0])){
                echo '<div class="wpneo-profile-about">';
                echo '<h3>'.__("About","wp-crowdfunding").'</h3>';
                echo '<p>'.$user_info['profile_about'][0].'</p>';
                echo '</div>';
            }


            if ( ! empty($user_info['profile_portfolio'][0])){
                echo '<div class="wpneo-profile-about">';
                echo '<h3>'.__("Portfolio","wp-crowdfunding").'</h3>';
                echo '<p>'.$user_info['profile_portfolio'][0].'</p>';
                echo '</div>';
            }
            

            echo '<div class="wpneo-profile-about">';
                echo '<h3>'.__("Contact Info","wp-crowdfunding").'</h3>';
                if ( ! empty($user_info['profile_email1'][0])){
                    echo '<p>'.__("Email: ","wp-crowdfunding").$user_info['profile_email1'][0].'</p>';
                }
                if ( ! empty($user_info['profile_mobile1'][0])){
                    echo '<p>'.__("Phone: ","wp-crowdfunding").$user_info['profile_mobile1'][0].'</p>';
                }
                if ( ! empty($user_info['profile_fax'][0])){
                    echo '<p>'.__("Fax: ","wp-crowdfunding").$user_info['profile_fax'][0].'</p>';
                }
                if ( ! empty($user_info['profile_website'][0])){
                    echo '<p>'.__("Website: ","wp-crowdfunding").' <a href="'.wpneo_crowdfunding_add_http($user_info['profile_website'][0]).'"> '.wpneo_crowdfunding_add_http($user_info['profile_website'][0]).' </a></p>';
                }
                if ( ! empty($user_info['profile_email1'][0])){
                    echo '<a class="wpneo-profile-button" href="mailto:'.$user_info['profile_email1'][0].'" target="_top">'.__("Contact Me","wp-crowdfunding").'</a>';
                }
            echo '</div>';



            echo '<div class="wpneo-profile-about">';
                echo '<h3>'.__("Social Link","wp-crowdfunding").'</h3>';
                if ( ! empty($user_info['profile_facebook'][0])){
                    echo '<a class="wpneo-social-link" href="'.$user_info["profile_facebook"][0].'"><i class="wpneo-icon wpneo-icon-facebook"></i></a>';
                }
                if ( ! empty($user_info['profile_twitter'][0])){
                    echo '<a class="wpneo-social-link" href="'.$user_info["profile_twitter"][0].'"><i class="wpneo-icon wpneo-icon-twitter"></i></a>';
                }
                if ( ! empty($user_info['profile_plus'][0])){
                    echo '<a class="wpneo-social-link" href="'.$user_info["profile_plus"][0].'"><i class="wpneo-icon wpneo-icon-gplus"></i></a>';
                }
                if ( ! empty($user_info['profile_linkedin'][0])){
                    echo '<a class="wpneo-social-link" href="'.$user_info["profile_linkedin"][0].'"><i class="wpneo-icon wpneo-icon-linkedin"></i></a>';
                }
                if ( ! empty($user_info['profile_pinterest'][0])){
                    echo '<a class="wpneo-social-link" href="'.$user_info["profile_pinterest"][0].'"><i class="wpneo-icon wpneo-icon-pinterest"></i></a>';
                }
            echo '</div>';

        ?>

    </div>
    </div>
</div>


