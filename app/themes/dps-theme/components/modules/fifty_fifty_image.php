<?php

/**
 * ACF Module: 50/50 Image
 *
 * @global $data
 */

use DPS\App\Fields\ACF;
use DPS\App\Media;
use DPS\App\Fields\Util;

// Col 1 Image
$image_col_1 = ACF::getField('image_column_1_image', $data);
$img_col_1_obj = Media::getAttachmentByID($image_col_1);
$img_col_1_title = $img_col_1_obj->name;
$img_col_1_url = $img_col_1_obj->url;

// Col 2 Image
$image_col_2 = ACF::getField('image_column_2_image', $data);
$img_col_2_obj = Media::getAttachmentByID($image_col_2);
$img_col_2_title = $img_col_2_obj->name;
$img_col_2_url = $img_col_2_obj->url;

?>

<div class="module fifty-fifty-image">
    <div class="uk-container-large uk-margin-auto">
        <div class="fifty-fifty-image__wrap">
            <div class="fifty-fifty-image__wrap-item" data-aos="fade-right" class="uk-height-large uk-background-cover" data-aos="fade-right" data-src="<?php echo esc_url($img_col_1_url); ?>" uk-img></div>
            <div class="fifty-fifty-image__wrap-item" data-aos="fade-left" class="uk-height-small@s uk-height-large@l uk-background-cover" data-src="<?php echo esc_url($img_col_2_url); ?>" uk-img></div>
        </div>
    </div>
</div>