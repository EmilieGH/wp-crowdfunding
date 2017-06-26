<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<p class="wpneo-short-description"><?php echo WPNEOCF()->limit_word_text(strip_tags(get_the_content()), 130); ?></p>
