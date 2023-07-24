<?php

/**
 * The template for displaying the footer.
 *
 * @package DPS
 */

$footer_logo = get_field('footer_logo', 'option');
$image_id = $footer_logo['id'];
$image = wp_get_attachment_image_src($image_id, 'full')[0];
$footer_nav = get_field('footer_nav', 'option');
$footer_social = get_field('footer_social', 'option');
?>

<footer class="footer" role="contentinfo">
    <div class="uk-container-large uk-margin-auto">
        <div class="footer__info">
            <div class="footer__info-logo">
                <?php
                printf(
                    '<img src="%1$s" width="40" height="40" uk-svg>',
                    $image,
                );
                ?>
            </div>
            <div class="footer__nav">
                <?php
                foreach ($footer_nav as $nav_item) {
                    printf(
                        '<a href="%2$s">%1$s</a>',
                        $nav_item['link_item']['title'],
                        $nav_item['link_item']['url'],
                    );
                }
                ?>
            </div>
            <div class="footer__social-icons">
                <?php
                foreach ($footer_social as $key => $social_item) {
                    $image_id = $social_item['icon']['id'];
                    $image = wp_get_attachment_image_src($image_id, 'full')[0];
                    $social_url = $social_item['social_item_url'];
                    printf(
                        '<a href="%2$s"><img src="%1$s" width="40" height="40" uk-svg></a>',
                        $image,
                        $social_url,
                    );
                }
                ?>
            </div>
        </div>
        <div class="footer__copyright">
            <?php
            printf(
                '<p>&copy %1$s %2$s. ' . __('All Rights Reserved.', 'dps-starter') . '</p>',
                date('Y'),
                get_bloginfo('name')
            );
            ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>