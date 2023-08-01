<?php

/**
 * The template for displaying all single posts.
 *
 * @package DPS
 */

get_header(); ?>

<div class="uk-container uk-container-large">
    <div uk-grid>
        <div id="primary" class="uk-width-full@s">
            <?php
            while (have_posts()) {
                the_post();
                // Loads the content/singular/page.php template.
                get_template_part('content/singular/' . get_post_type());
            }
            ?>
        </div><!-- /#primary -->

    </div>
</div>

<?php get_footer();
