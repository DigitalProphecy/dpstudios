<?php

use DPS\App\Helpers;

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package DPS
 */

$helpers = new Helpers;

get_header();
?>

<div class="uk-container entry">
    <div class="uk-grid uk-child-width-1-2@m uk-child-width-1-3@l uk-text-center" uk-grid="masonry: true" uk-scrollspy="target: > article; cls: uk-animation-fade; delay: 300">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                // Loads the content/singular/page.php template.
                get_template_part('content/archive/content');
            }
        } else {
            // Loads the content/singular/page.php template.
            get_template_part('content/content', 'none');
        }
        ?>
    </div>
    <?php
    echo '<div class="container">';
    $helpers->dps_pagination();
    echo '</div>';
    ?>
</div>

<?php get_footer();
