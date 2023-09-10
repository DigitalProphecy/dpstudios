<?php

/**
 * ACF Module: Details
 *
 * @global $data
 */

use DPS\App\Fields\ACF;
use DPS\App\Media;
use DPS\App\Fields\Util;

$project_detail_field = ACF::getField('detail_col_1_detail_project_field', $data);
$project_solgan = ACF::getField('detail_col_1_detail_project_slogan', $data);
$project_detail_cat = ACF::getField('detail_col_2_project_category', $data);
$project_detail_date = ACF::getField('detail_col_2_project_date', $data);
$post = get_post();
?>

<div class="uk-container-large uk-margin-auto">
    <div class="module details">
        <div class="uk-flex uk-flex-between">
            <div class="details__col-1 uk-width-1-2">
                <span class="" data-aos="fade-right"><?php echo __($project_detail_field); ?></span>
                <h3 class="uk-margin-top" data-aos="fade-right"><?php echo apply_filters('the_content', $project_solgan); ?></h3>
            </div>
            <div class="details__col-2 uk-width-1-2">
                <div class="uk-flex uk-flex-between">
                    <div class="">
                        <h4 class="uk-margin-bottom" data-aos="fade-up" data-aos-delay="300">Category</h4>
                        <?php
                        // Get the terms (categories or tags) associated with the current post
                        $superTerms = get_the_terms($post->ID, 'project_type');

                        // Check if there are terms and if they are not a WordPress error
                        if (!empty($superTerms) && !is_wp_error($superTerms)) {
                            // Extract the names of the terms and store them in the $cats array
                            $cats = wp_list_pluck($superTerms, 'name');

                            // Loop through each term in the $cats array
                            foreach ($cats as $cat) {
                                // Output a container div for each term
                                echo '<div class="details__col-2-cats">';

                                // Output the term name with specified attributes using printf
                                printf(
                                    '<span class="uk-margin-small-bottom" data-aos="fade-up" data-aos-delay="500">%1$s</span>',
                                    $cat
                                );

                                // Close the container div for the current term
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                    <div class="details__">
                        <h4 class="uk-margin-bottom" data-aos="fade-up" data-aos-delay="600">Clients</h4>
                        <?php echo '<div data-aos="fade-up" data-aos-delay="900">' . __($project_detail_field) . '</div>'; ?>
                    </div>
                    <div>
                        <h4 class="uk-margin-bottom" data-aos="fade-up" data-aos-delay="1000">Date</h4>
                        <?php
                        $date = date_create($project_detail_date);
                        echo '<div data-aos="fade-up" data-aos-delay="1300">' . date_format($date, 'j F Y') . '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>