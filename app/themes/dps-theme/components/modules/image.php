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

if (!empty($custom_bg)) {
    $bg_styles = "background-color:" . $custom_bg . "; background-image: url(" . $img_src->url . ");";
}
if (!$image) {
    return;
}
?>

<div class="module image" style="<?php echo $bg_styles; ?>" uk-scrollspy="cls: uk-animation-fade; delay: 500">
</div>