<?php

/**
 * The template for displaying the footer.
 *
 * @package DPS
 */

use DPS\App\Fields\ACF;

$footer_logo = get_field('footer_logo', 'option');
$image_id = $footer_logo['id'];
$image = wp_get_attachment_image_src($image_id, 'full')[0];
$footer_nav = get_field('footer_nav', 'option');
$footer_social = get_field('footer_social', 'option');
?>

<footer class="footer" role="contentinfo">
    <div class="uk-container-large uk-margin-auto">
        <div class="footer__info">
            <div class="footer__info-logo" data-aos="fade-right">
                <?php
                printf(
                    '<img src="%1$s" width="40" height="40" uk-svg>',
                    $image,
                );
                ?>
            </div>
            <div class="footer__nav" data-aos="fade-down">
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
            <div class="footer__social-icons" data-aos="fade-left">
                <?php
                foreach ($footer_social as $key => $social_item) {
                    $icon = ACF::getField('font_awesome_icons', $social_item);
                    $social_url = ACF::getField('social_item_url', $social_item);
                    printf(
                        '<a href="%2$s" target="_blank"><i class="fa-brands %1$s"></i></a>',
                        $icon['icons'],
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