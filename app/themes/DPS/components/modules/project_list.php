<?php

/**
 * ACF Module: Project List
 *
 * @global $data
 */

use DPS\App\Fields\ACF;
use DPS\App\Media;

global $post;
$id = get_the_id();
$items = ACF::getField('project_list_item_object', $data);

// create a fallback in for when there are no project selected
// if $items is empty
// create a $items using tridistional wp query
// set to a max default number (10)

?>
<div class="module project_list">
    <div class="uk-container-large uk-margin-auto">
        <div uk-filter="target: .js-filter">

            <ul class="project_list__filter" uk-scrollspy="target: > li; cls: uk-animation-fade; delay: 500">
                <li class="uk-active" uk-filter-control><a href="#">All</a></li>
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

                        foreach ($terms as $term) {
                            $termSlug = $term->slug;
                            $termName = $term->name;

                            printf(
                                '<li uk-filter-control="[data-type=%1$s]">
                                 <a href="#">%2$s</a>
                                </li>',
                                $termSlug,
                                $termName
                            );
                        }
                    }
                }
                ?>
            </ul>

            <ul class="project_list__items js-filter uk-child-width-full uk-child-width-1-2@m uk-child-width-1-3@l uk-text-center" uk-grid uk-scrollspy="target: > li; cls: uk-animation-slide-bottom-small; delay: 500">
                <?php
                if ($items) {
                    foreach ($items as $item) {
                        $metadata = ACF::getPostMeta($item);
                        $image = ACF::getField('modules_0_background_image', $metadata);
                        $img_src = Media::getAttachmentByID($image);
                        $img_bg_color = ACF::getField('modules_4_module_color', $metadata);
                        $project_title = ACF::getField('modules_0_headline', $metadata);
                        $categories = get_the_terms($item, 'project_type');
                ?>

                        <li data-type="<?php echo $categories[0]->slug; ?>">
                            <a href="<?php echo the_permalink($item) ?>">
                                <div class="uk-card uk-card-default uk-card-body">
                                    <div class="uk-height-medium uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="<?php echo $img_src->url ?>" uk-img>
                                        <p><?php echo $project_title; ?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                <?php }
                } else {
                    echo 'No Projects Selected';
                } ?>
            </ul>

        </div>
    </div>
</div>