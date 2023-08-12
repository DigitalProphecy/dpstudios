<?php

/**
 * ACF Module: Item Slider
 *
 * @global $data
 */

use DPS\App\Fields\ACF;
use DPS\App\Media;
use DPS\App\Fields\Util;

$title = ACF::getField('item_content_title', $data);
$copy = ACF::getField('item_content_content', $data);
$items = ACF::getRowsLayout('item_repeater_item_list', $data);
$bg_color = ACF::getField('module_background_color', $data);
$bg_styles = $bg_color;

if (!$title) {
    return;
}
?>

<div class="module item-slider <?php echo $bg_styles; ?>">
    <div class="uk-container-large uk-margin-auto">
        <div class="item-slider__cols">
            <div class="item-slider__content module__content" data-aos="fade-right">
                <h2><?php echo $title; ?></h2>
                <p><?php echo $copy; ?></p>
            </div>
            <div class="item-slider__item-list" data-aos="fade-left">
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="clsActivated: uk-transition-active; center: true">
                    <ul class="uk-slider-items uk-child-width-1-2@s uk-grid">
                        <?php foreach ($items as $item) :
                            $title = ACF::getField('title', $item);
                            $content = ACF::getField('content', $item);
                            $link = ACF::getField('link', $item) ?: '';
                            $imageId = ACF::getField('item_image', $item);
                            $image = wp_get_attachment_image_src($imageId, 'full');
                        ?>
                            <li class="uk-width-3-4">
                                <div class="item-slider__item-list-bg" style="background-image: url('<?php echo $image[0] ?>');">
                                    <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom">
                                        <h4 class="uk-card-title"><?php echo esc_html($title); ?></h4>
                                        <p><?php echo esc_html($content); ?></p>

                                        <?php
                                        if ($link) {
                                            printf(
                                                '<a class="dps-btn-primary" href="%1$s" target="%3$s">%2$s</a>',
                                                esc_url($link['url']),
                                                esc_html($link['title']),
                                                esc_attr($link['target'])
                                            );
                                        }
                                        ?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                </div>
            </div>
        </div>
    </div>
</div>