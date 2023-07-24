<?php

/**
 * ACF Module: services
 *
 * @global $data
 */

use DPS\App\Fields\ACF;
use DPS\App\Fields\Util;

$headline = ACF::getField('headline', $data);
$content = ACF::getField('content', $data);

$service_content_headline = ACF::getField('service_content_headline', $data);
$service_content_content = ACF::getField('service_content_content', $data);

$service_items_items = ACF::getRowsLayout('service_items_items', $data);
?>

<div class="module content-area" uk-scrollspy="target: > div; cls: uk-animation-slide-left-small; delay: 500">
    <div class="uk-container-large uk-margin-auto">
        <div>
            <?php
            echo $headline;
            echo $content;
            ?>
        </div>
        <div></div>
        <?php
        foreach ($service_items_items as $item) {
            echo $item['item_title'];
            echo $item['item_content'];
        }
        ?>
    </div>
</div>