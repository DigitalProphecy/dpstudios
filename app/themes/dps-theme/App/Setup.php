<?php

namespace DPS\App;

use DPS\App\Interfaces\WordPressHooks;

/**
 * Class Setup
 *
 * @package DPS\App
 */
class Setup implements WordPressHooks
{

    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_action('init', [$this, 'registerMenus']);
        add_action('widgets_init', [$this, 'registerSidebars'], 5);
        add_action('upload_mimes', [$this, 'ccMimeTypes']);
        add_action('get_menu_id', [$this, 'getMenuId']);
        add_action('acf/init', [$this, 'my_acf_init']);
        add_action('dps_excerpt', [$this, 'dps_the_excerpt']);
    }

    /**
     * Registers nav menu locations.
     */
    public function registerMenus()
    {
        register_nav_menu('primary', __('Primary', 'dps-starter'));
    }

    public static function getMenuId($location)
    {
        // get all menu locations
        $location = get_nav_menu_locations();

        var_dump($location);
    }

    /**
     * Registers sidebars.
     */
    public function registerSidebars()
    {
        register_sidebar(
            [
                'id'            => 'primary',
                'name'          => __('Sidebar', 'dps-starter'),
                'description'   => __('Main sidebar area displayed on right side of page via trigger.', 'dps-starter'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
            ]
        );
    }

    /**
     * Add SVG to upload
     */
    public function ccMimeTypes($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    public function my_acf_init()
    {
        acf_update_setting('google_api_key', 'AIzaSyDo0w2mOfLYXGiKst-PsaP2Uk7GOPv9L8Q');
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
}
