<?php

/**
 * The template for displaying all single posts.
 *
 * @package DPS
 */

get_header(); ?>
<div class="blog__hero" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>;')">
    <div class="uk-container uk-margin-auto">
        <h1><?php echo the_title(); ?></h1>
    </div>
</div>
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
