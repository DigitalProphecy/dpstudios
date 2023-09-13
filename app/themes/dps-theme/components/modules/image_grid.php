<?php

/**
 * ACF Module: Image
 *
 * @global $data
 */

use DPS\App\Fields\ACF;
use DPS\App\Media;
use DPS\App\Fields\Util;

$image_grid = ACF::getRowsLayout('grid_images', $data);
$project_color = ACF::getField('module_color', $data) ?: '#0377bf';

if (!$image_grid) {
    return;
}
?>


<style>
    .image_grid__image-container {
        background-color: <?php echo $project_color ?>;
    }
</style>

<div class="module image_grid spaces">
    <div class="uk-container-large uk-margin-auto">
        <ul class="uk-child-width-full uk-child-width-1-3@m uk-text-center" uk-grid="masonry: true" uk-scrollspy="target: > li; cls: uk-animation-slide-bottom-small; delay: 500">
            <?php
            foreach ($image_grid as $image) {
                $item_image = ACF::getField('image', $image);
                $img_src = Media::getAttachmentByID($item_image);
                $img_size = ACF::getField('image_size', $image);
            ?>
                <li>
                    <div class="image_grid__image-container uk-card uk-card-default uk-card-body">
                        <img src="<?php echo $img_src->url ?>" />
                    </div>
                </li>
            <?php }
            ?>
        </ul>
    </div>
</div>