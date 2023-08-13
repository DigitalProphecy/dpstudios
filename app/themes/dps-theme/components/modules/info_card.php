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
            if ($heading) {
                echo '<h2>' . __($heading) . '</h2>';
            }

            if ($copy) {
                echo '<p>' . __($copy) . '</p>';
            }

            if ($link) {
                echo '<a class="info_card__cta" href="' . $link['url'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a>';
            }
            ?>
        </div>
        <div class="info_card__items uk-flex">
            <?php
            foreach ($items as $item) {
                $icon_header = ACF::getField('icon_header', $item);
                $icon_content = ACF::getField('icon_content', $item);
                $icon = ACF::getField('font_awesome_icons_icons', $item);

                printf(
                    '
                    <div class="info_card__item" data-aos="fade-left" data-aos-delay="300">
                        <i class="%1$s"></i>
                        <div><h4>%2$s</h4></div>
                        <div><p>%3$s</p></div>
                    </div>
                    ',
                    $icon,
                    $icon_header,
                    $icon_content,
                );
            }
            ?>
        </div>

    </div>
</div>