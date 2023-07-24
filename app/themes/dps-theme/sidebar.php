<?php

/**
 * The sidebar containing the main widget area
 *
 * @package DPS
 */
if (!is_active_sidebar('primary')) {
    return;
}
?>

<aside id="secondary" class="widget-area uk-width-1-4@s" role="complementary">
    <?php dynamic_sidebar('primary'); ?>
</aside><!-- #secondary -->