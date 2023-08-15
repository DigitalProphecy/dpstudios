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
?>

<div class="module details">
    <div class="uk-container uk-margin-auto uk-flex uk-flex-between">
        <div class="details__col-1 uk-width-1-2">
            <span class="" data-aos="fade-right"><?php echo __($project_detail_field); ?></span>
            <h3 class="uk-margin-top" data-aos="fade-right"><?php echo apply_filters('the_content', $project_solgan); ?></h3>
        </div>
        <div class="details__col-2 uk-width-1-2">
            <div class="uk-flex uk-flex-between">
                <div class="">
                    <h4 class="uk-margin-bottom" data-aos="fade-up" data-aos-delay="300">Categoty</h4>
                    <?php
                    $args = array(
                        'public'   => true,
                        '_builtin' => false
                    );

                    $output = 'names';
                    $operator = 'and';

                    $taxonomies = get_taxonomies($args, $output, $operator);

                    if ($taxonomies) {
                        foreach ($taxonomies as $taxonomy) {
                            $terms = get_terms($taxonomy);
                            echo "<div class='details__col-2-cats'>";
                            foreach ($terms as $term) {
                                $termName = $term->name;
                                $termId = $term->term_id;

                                printf(
                                    '
                                    <span class="uk-margin-small-bottom" data-aos="fade-up" data-aos-delay="500">%1$s</span>
                                ',
                                    $termName
                                );
                            };
                            echo "</div>";
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