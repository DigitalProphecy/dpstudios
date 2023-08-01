<?php

namespace DPS\App;

use DPS\App\Interfaces\WordPressHooks;

/**
 * Class Helpers
 *
 * @package DPS\App
 */
class Helpers implements WordPressHooks
{

    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_filter('upload_mimes', [$this, 'dps_excerpt_more']);
        add_filter('wp_check_filetype_and_ext', [$this, 'dps_the_excerpt']);
    }

    /**
     * Display the post excerpt with optional character limit.
     *
     * @param int $trim_character_count The number of characters to limit the excerpt to. (Default: 0, no limit)
     */
    public function dps_the_excerpt($trim_character_count = 0)
    {
        // Check if the post has an excerpt or if the character count is set to 0 (no limit).
        if (!has_excerpt() || 0 === $trim_character_count) {
            // If there's no excerpt or no character limit, display the full excerpt.
            the_excerpt();
            return;
        }

        // Get the raw excerpt without any HTML tags using wp_strip_all_tags().
        $excerpt = wp_strip_all_tags(get_the_excerpt());

        // Trim the excerpt to the specified character count.
        $excerpt = substr($excerpt, 0, $trim_character_count);

        // Ensure the excerpt ends at the last space to avoid cutting off words.
        $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

        // Output the trimmed excerpt with an ellipsis to indicate continuation.
        echo $excerpt . '[...]';
    }

    /**
     * Modify the "Read More" link for post excerpts.
     *
     * @param string $more The default "Read More" link.
     * @return string The modified "Read More" link.
     */
    public function dps_excerpt_more($more = '')
    {
        // Check if the current post is not a single post (i.e., not being viewed individually).
        if (!is_single()) {
            // Generate a custom "Read More" button link for excerpts.
            $more = sprintf(
                '<a class="dps-read-more" href="%1$s"><button class="text-white mt-4 btn btn-info">%2$s</button></a>',
                get_permalink(get_the_ID()),
                __('Read More', 'dps-starter'),
            );
        }

        // Return the modified "Read More" link.
        return $more;
    }

    /**
     * Display custom pagination
     */
    function dps_pagination()
    {
        // Define an array of allowed HTML tags and their allowed attributes for use in wp_kses()
        $allowed_tags = [
            'span' => [
                'class' => []
            ],
            'a' => [
                'class' => [],
                'href' => [],
            ]
        ];

        // Define the arguments for the paginate_links() function
        // These arguments will be used to customize the output of the pagination links
        $args = [
            'before_page_number' => '<span class="btn border border-secondary mr-2 mb-2">', // HTML to display before the page number link
            'after_page_number' => '</span>', // HTML to display after the page number link
        ];

        // Generate the pagination links using the paginate_links() function and store the result
        // The result will be in HTML format, but we want to ensure only allowed tags are included
        $pagination_links = wp_kses(paginate_links($args), $allowed_tags);

        // Output the pagination links inside a <nav> element with a class of "dps-pagination clearfix"
        printf('<nav class="dps-pagination uk-pagination">%s</nav>', $pagination_links);
    }
}
