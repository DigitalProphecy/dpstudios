<?php

/**
 * ACF Module: Hero
 *
 * @global $data
 */

use DPS\App\Fields\ACF;
use DPS\App\Fields\Util;

$sub_headline = ACF::getField('sub_headline', $data);
$headline = ACF::getField('headline', $data);
$content  = ACF::getField('content', $data);
$button   = ACF::getField('button', $data);
$effect_color_hex = ACF::getField('background_color', $data);
$hero_size = ACF::getField('settings_hero_size', $data);
$hero_size_style = '';

if ($hero_size === 'small') {
    $hero_size_style = 'hero--small';
} elseif ($hero_size === 'medium') {
    $hero_size_style = 'hero--medium';
} else {
}

Util::ModuleMargin($data, $label = 'settings', $module_id = 'hero');
?>
<div id="hero" class="module hero <?php echo $hero_size_style; ?> uk-background-cover uk-height-large" uk-parallax="bgy: -200" <?php echo Util::getInlineBackgroundStyles($data); ?> uk-parallax="bgy: -200" uk-scrollspy="cls: uk-animation-fade; repeat: true">
    <div class="uk-container-large uk-margin-auto">
        <div class="hero__content">
            <?php if ($sub_headline) : ?>
                <div class="hero__sub-heading uk-margin-bottom uk-margin-medium-bottom@l" data-aos="fade-right" data-aos-delay="500">
                    <?php
                    echo nl2br(Util::getHTML(
                        $sub_headline,
                        'p',
                        ['class' => 'hero__sub-titled p']
                    ));
                    ?>
                </div>
            <?php endif; ?>
            <div class="hero__heading uk-margin-bottom uk-margin-medium-bottom@l" data-aos="fade-right" data-aos-delay="900">
                <?php
                echo nl2br(Util::getHTML(
                    $headline,
                    'h1',
                    ['class' => 'hero__title hdg hdg--1']
                ));
                ?>
            </div>
            <div class="hero__body uk-margin-bottom uk-margin-medium-bottom@l" data-aos="fade-right" data-aos-delay="1300">
                <?php echo apply_filters('the_content', $content); ?>
            </div>
            <div data-aos="fade-right" data-aos-delay="1600">
                <?php echo Util::getButtonHTML($button); ?>
            </div>

        </div>
    </div>
    <?php
    if (is_front_page()) {
        printf(
            '<div class="hero__effect" data-aos="fade-right" data-aos-delay="1900""></div>            ',
            $effect_color_hex,
        );
    }

    ?>
</div>