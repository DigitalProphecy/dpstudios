<?php

use DPS\App\Helpers;

/**
 * @package DPS
 */

$helpers = new Helpers;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if (has_post_thumbnail()) : ?>
        <div class="entry__thumb">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php else : ?>
        <div class="entry__thumb">
            <img src="<?php echo DPS_THEME_DIR . 'screenshot.png'; ?>" />
            <?php
            var_dump(DPS_THEME_DIR . 'screenshot.png');
            ?>
        </div>
    <?php endif; ?>

    <header class="entry__header">
        <?php
        the_title(
            sprintf(
                '<h4 class="hdg hdg--3"><a href="%s" rel="bookmark">',
                esc_url(get_permalink())
            ),
            '</a></h4>'
        );
        ?>
    </header><!-- .entry__header -->

    <div class="entry__content">
        <?php
        if (is_single($post)) {
            the_content(
                sprintf(
                    wp_kses(
                        __('Continue reading <span class="meta-nav">&rarr;</span>', 'dps-starter'),
                        [
                            'span' => [
                                'class' => []
                            ]
                        ]
                    ),
                    the_title('<span class="screen-reader-text">"', '"</span>', false),
                )
            );

            wp_link_pages(
                [
                    'before' => '<div class="page-link">' . esc_html__('Pages:', 'dps-starter'),
                    'after' => '</div>',
                ]
            );
        } else {
            $helpers->dps_the_excerpt(500);
            echo '<br/>';
            $helpers->dps_excerpt_more();
        }

        ?>
    </div><!-- .entry__content -->

</article><!-- #post-## -->