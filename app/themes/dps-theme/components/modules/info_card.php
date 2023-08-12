<?php

/**
 * ACF Module: Image Card
 *
 * @global $data
 */

use DPS\App\Fields\ACF;
use DPS\App\Media;
use DPS\App\Fields\Util;

$heading = ACF::getField('content_section_heading', $data);
$copy = ACF::getField('content_section_card_content', $data);
$items = ACF::getRowsLayout('items', $data);
$bgColorClass = ACF::getField('module_background_color_background_color', $data);
$moduleAligment = ACF::getField('module_alignment',  $data);
$link = ACF::getField('content_section_cta_link', $data);
?>

<div class="module info_card <?php echo $bgColorClass; ?>">
    <div class="<?php echo 'info_card--' . $moduleAligment; ?> uk-container-large uk-margin-auto">
        <div class="info_card__content module__content" data-aos="fade-right">
            <?php
            printf(
                '
                    <h2>%1$s</h2>
                    <p>%2$s</p>
                    <a class="info_card__cta" href="%4$s" target="%5$s">%3$s</a>
                ',
                $heading,
                $copy,
                $link['title'],
                $link['url'],
                $link['target'],
            );
            ?>
        </div>
        <div class="info_card__items uk-flex">
            <?php
            foreach ($items as $item) {
                $icon_image = ACF::getField('icon_image', $item);
                $icon_header = ACF::getField('icon_header', $item);
                $icon_content = ACF::getField('icon_content', $item);
                $media = wp_get_attachment_image_src($icon_image, 'full');

                printf(
                    '
                    <div class="info_card__item" data-aos="fade-left" data-aos-delay="300">
                        <div class="info_card__item-icon">
                        <img src="%1$s" width="40" height="40" uk-svg>
                        </div>
                        <div><h4>%2$s</h4></div>
                        <div><p>%3$s</p></div>
                    </div>
                    ',
                    $media[0],
                    $icon_header,
                    $icon_content,
                );
            }
            ?>
        </div>

    </div>
</div>