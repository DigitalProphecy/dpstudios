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
$bg_styles = "";
$bg_width = "";

if (!$image) {
    return;
}
?>

<div class="uk-container uk-margin-auto">
    <img src="<?php echo $img_src->url ?>" data-aos="fade-down">
</div>