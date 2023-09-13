<?php

/**
 * ACF Module: Image
 *
 * @global $data
 */

use DPS\App\Fields\ACF;
use DPS\App\Media;
use DPS\App\Fields\Util;

$image = ACF::getField('image', $data);
$img_src = Media::getAttachmentByID($image);
$custom_bg = ACF::getField('background_custom-bg', $data);
$full_width_img = ACF::getField('background_full_width_image', $data);
$bg_styles = '';

if (!empty($custom_bg)) {
    $bg_styles = 'style="background-color: #' . $custom_bg . ';"';
}


if (!$image) {
    return;
}
?>
<div class="uk-container-large uk-margin-auto">
    <div class="image module spaces" <?php echo $bg_styles; ?>>
        <img src="<?php echo $img_src->url ?>" data-aos="fade-down">
    </div>
</div>