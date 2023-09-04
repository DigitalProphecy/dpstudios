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
        <div>
            <ul id="filters" class="project_list__filter button-group">
                <li class="button is-checked" data-filter="*">All</li>
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
                                '<button class="button %1$s" data-filter=".%1$s">
                                 %2$s
                                </button>',
                                $termSlug,
                                $termName
                            );
                        }
                    }
                }
                ?>
            </ul>

            <ul class="project_list__items uk-child-width-full uk-child-width-1-2@m uk-child-width-1-3@l uk-text-center">
                <?php
                if ($items) {
                    foreach ($items as $key => $item) {
                        $metadata = ACF::getPostMeta($item);
                        $image = ACF::getField('modules_0_background_image', $metadata);
                        $img_src = Media::getAttachmentByID($image);
                        $img_bg_color = ACF::getField('modules_4_module_color', $metadata);
                        $project_title = ACF::getField('modules_0_headline', $metadata);
                        $categories = get_the_terms($item, 'project_type');
                ?>

                        <li class="project_list__item <?php
                                                        foreach ($categories as $cat) {
                                                            echo $cat->slug . ' ';
                                                        }
                                                        ?>">
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


    <h1>Isotope - filtering &amp; sorting</h1>
    <h2>Filter</h2>
    <div id="filters" class="button-group"> <button class="button is-checked" data-filter="*">show all</button>
        <button class="button" data-filter=".metal">metal</button>
        <button class="button" data-filter=".transition">transition</button>
        <button class="button" data-filter=".alkali, .alkaline-earth">alkali and alkaline-earth</button>
        <button class="button" data-filter=":not(.transition)">not transition</button>
        <button class="button" data-filter=".metal:not(.transition)">metal but not transition</button>
        <button class="button" data-filter="numberGreaterThan50">number > 50</button>
        <button class="button" data-filter="ium">name ends with &ndash;ium</button>
    </div>

    <div class="grid">
        <div class="element-item transition metal ">
            <h3 class="name">Mercury</h3>
        </div>
        <div class="element-item metalloid " data-category="metalloid">
            <h3 class="name">Tellurium</h3>
            <p class="symbol">Te</p>
            <p class="number">52</p>
            <p class="weight">127.6</p>
        </div>
        <div class="element-item post-transition metal " data-category="post-transition">
            <h3 class="name">Bismuth</h3>
            <p class="symbol">Bi</p>
            <p class="number">83</p>
            <p class="weight">208.980</p>
        </div>
        <div class="element-item post-transition metal " data-category="post-transition">
            <h3 class="name">Lead</h3>
            <p class="symbol">Pb</p>
            <p class="number">82</p>
            <p class="weight">207.2</p>
        </div>
        <div class="element-item transition metal " data-category="transition">
            <h3 class="name">Gold</h3>
            <p class="symbol">Au</p>
            <p class="number">79</p>
            <p class="weight">196.967</p>
        </div>
        <div class="element-item alkali metal " data-category="alkali">
            <h3 class="name">Potassium</h3>
            <p class="symbol">K</p>
            <p class="number">19</p>
            <p class="weight">39.0983</p>
        </div>
        <div class="element-item alkali metal " data-category="alkali">
            <h3 class="name">Sodium</h3>
            <p class="symbol">Na</p>
            <p class="number">11</p>
            <p class="weight">22.99</p>
        </div>
        <div class="element-item transition metal " data-category="transition">
            <h3 class="name">Cadmium</h3>
            <p class="symbol">Cd</p>
            <p class="number">48</p>
            <p class="weight">112.411</p>
        </div>
        <div class="element-item alkaline-earth metal " data-category="alkaline-earth">
            <h3 class="name">Calcium</h3>
            <p class="symbol">Ca</p>
            <p class="number">20</p>
            <p class="weight">40.078</p>
        </div>
        <div class="element-item transition metal " data-category="transition">
            <h3 class="name">Rhenium</h3>
            <p class="symbol">Re</p>
            <p class="number">75</p>
            <p class="weight">186.207</p>
        </div>
        <div class="element-item post-transition metal " data-category="post-transition">
            <h3 class="name">Thallium</h3>
            <p class="symbol">Tl</p>
            <p class="number">81</p>
            <p class="weight">204.383</p>
        </div>
        <div class="element-item metalloid " data-category="metalloid">
            <h3 class="name">Antimony</h3>
            <p class="symbol">Sb</p>
            <p class="number">51</p>
            <p class="weight">121.76</p>
        </div>
        <div class="element-item transition metal " data-category="transition">
            <h3 class="name">Cobalt</h3>
            <p class="symbol">Co</p>
            <p class="number">27</p>
            <p class="weight">58.933</p>
        </div>
        <div class="element-item lanthanoid metal inner-transition " data-category="lanthanoid">
            <h3 class="name">Ytterbium</h3>
            <p class="symbol">Yb</p>
            <p class="number">70</p>
            <p class="weight">173.054</p>
        </div>
        <div class="element-item noble-gas nonmetal " data-category="noble-gas">
            <h3 class="name">Argon</h3>
            <p class="symbol">Ar</p>
            <p class="number">18</p>
            <p class="weight">39.948</p>
        </div>
        <div class="element-item diatomic nonmetal " data-category="diatomic">
            <h3 class="name">Nitrogen</h3>
            <p class="symbol">N</p>
            <p class="number">7</p>
            <p class="weight">14.007</p>
        </div>
        <div class="element-item actinoid metal inner-transition " data-category="actinoid">
            <h3 class="name">Uranium</h3>
            <p class="symbol">U</p>
            <p class="number">92</p>
            <p class="weight">238.029</p>
        </div>
        <div class="element-item actinoid metal inner-transition " data-category="actinoid">
            <h3 class="name">Plutonium</h3>
            <p class="symbol">Pu</p>
            <p class="number">94</p>
            <p class="weight">(244)</p>
        </div>
    </div>

</div>