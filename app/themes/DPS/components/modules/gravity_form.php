<?php

/**
 * ACF Module: GForm
 *
 * @global $data
 */

use DPS\App\Fields\ACF;
use DPS\App\Media;


$module_heading = ACF::getField('content_heading_module_heading', $data);
$form_headline = ACF::getField('contact_info_content_heading', $data);
$form_body_copy = ACF::getField('contact_info_content_body', $data);
$gf_id = ACF::getField('contact_form_gravity_from_id', $data);
$image = ACF::getField('background_image', $data);
$img_src = Media::getAttachmentByID($image)->url;
$contact_info = ACF::getRowsLayout('contact_info_info', $data);
$social_icons = ACF::getRowsLayout('contact_info_social_icons', $data);
?>

<div class="module gform" style="background-image: url('<?php echo $img_src; ?>')">
    <div class="uk-container uk-margin-auto">
        <div class="gform__heading">
            <h2>
                <?php printf(
                    '%1$s',
                    apply_filters('the_content', $module_heading),
                )
                ?>
            </h2>
        </div>
        <div class="gform__cols">
            <div class="gform__form">
                <h3>Send us a message</h3>
                <?php gravity_form($gf_id, false, false, false, '', false); ?>
            </div>
            <div class="gform__copy">

                <div class="gform__info">
                    <h3>Contact Us</h3>
                    <?php
                    echo '<div class="gform__info-items">';
                    foreach ($contact_info as $info) {
                        $header = ACF::getField('dps-starter', $info);
                        $copy = ACF::getField('copy', $info);
                        printf(
                            '
                                <div class="gform__info-item">
                                <h4>%1$s</h4>
                                <p>%2$s</p>
                                </div>
                                ',
                            $header,
                            $copy,
                        );
                    }
                    echo '</div>';
                    ?>
                </div>
                <div class="gform__social">
                    <h3>Follow Us</h3>
                    <?php
                    echo '<div class="gform__social-icons">';
                    foreach ($social_icons as $icon) {
                        $icon_img = ACF::getField('icon', $icon);
                        $icon_src = Media::getAttachmentByID($icon_img)->url;
                        $icon_url = ACF::getField('url', $icon);

                        printf(
                            '
                                <div class="gform__social-icon">
                                    <a href="%2$s"><img src="%1$s" height="30" width="30" uk-svg/></a>
                                </div>
                                ',
                            $icon_src,
                            $icon_url,
                        );
                    }
                    echo '</div>';
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>