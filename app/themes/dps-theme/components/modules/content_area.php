<?php

/**
 * ACF Module: Content Area
 *
 * @global $data
 */

use DPS\App\Fields\ACF;
use DPS\App\Fields\Util;

$headline = ACF::getField('headline', $data);
$content  = ACF::getField('content', $data);
$imageId = ACF::getField('image', $data);
$imageplacement = ACF::getField('image_placment', $data);
$text_aligment = ACF::getField('text_aligment', $data);
$themeColor = ACF::getField('theme_color_color', $data);
$moduleClasses = '';

if ($themeColor === 'custom') {
    $themeColor = ACF::getField('theme_color_custom_module_color', $data);
}

if (!empty($imageId)) {
    $image = wp_get_attachment_image_src($imageId, 'full');
    $no_effect = ACF::getField('theme_color_remove_background_effect', $data);
    $media = '
        <div class="uk-position-relative" data-aos="fade-up">
            <div class="content__media uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="' . $image[0] . '" style="
            background-color: ' . $themeColor . '" uk-img></div>
            <div class="content__media-effect" style="
            background-color: ' . $themeColor . '"></div>
        </div>
        ';

    if ($no_effect == 1) {
        $moduleClasses = $image ? 'content--has-image content--no-effect' : '';
    } else {
        $moduleClasses = $image ? 'content--has-image' : '';
    }
}



?>
<div class="uk-container-large uk-margin-auto">
    <div class="module content spaces <?php echo 'content__align-' . $text_aligment . '' ?> <?php echo $moduleClasses ?>">

        <?php
        if ($imageplacement === 'left' && !empty($imageId)) {
            echo $media;
        }
        ?>
        <div class="content__content">
            <div class="content__heading" data-aos="fade-down">
                <?php
                echo nl2br(Util::getHTML(
                    $headline,
                    'h2',
                    ['class' => 'content__title hdg hdg--2']
                ));
                ?>
            </div>
            <div class="content__body" data-aos="fade-up">
                <?php echo apply_filters('the_content', $content); ?>
            </div>
        </div>
        <?php
        if ($imageplacement === 'right' && !empty($imageId)) {
            echo $media;
        }
        ?>
    </div>
</div>