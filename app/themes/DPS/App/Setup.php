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
}
