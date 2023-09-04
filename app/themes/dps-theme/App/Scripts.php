<?php

namespace DPS\App;

use DPS\App\Interfaces\WordPressHooks;

/**
 * Class Scripts
 *
 * @package DPS\App
 */
if (!defined('DPS_DIR_PATH')) {
    define('DPS_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('DPS_DIR_URI')) {
    define('DPS_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

class Scripts implements WordPressHooks
{

    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueStyles']);
    }

    /**
     * Load scripts for the front end.
     */
    public function enqueueScripts()
    {
        wp_enqueue_script(
            'dps-theme',
            DPS_DIR_URI . "/build/scripts/theme-scripts.min.js",
            ['jquery'],
            THEME_VERSION,
            true
        );

        wp_enqueue_script(
            'ui-kit-js',
            "https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/js/uikit.min.js",
            ['jquery'],
            THEME_VERSION,
            true
        );

        wp_enqueue_script(
            'aos-js',
            "https://unpkg.com/aos@next/dist/aos.js",
            ['jquery'],
            true
        );

        wp_enqueue_script(
            'fontawesome',
            "https://kit.fontawesome.com/36d832afa0.js",
            ['jquery'],
            true
        );

        wp_enqueue_script(
            'google-maps-api-js',
            "https://maps.googleapis.com/maps/api/js?key=AIzaSyDo0w2mOfLYXGiKst-PsaP2Uk7GOPv9L8Q=initMap",
            ['jquery'],
            THEME_VERSION,
            true
        );

        wp_enqueue_script(
            'isotope',
            "https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js",
            ['jquery'],
            THEME_VERSION,
            true
        );

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }


    /**
     * Load stylesheets for the front end.
     */
    public function enqueueStyles()
    {
        wp_enqueue_style(
            'dps-styles',
            DPS_DIR_URI . '/build/styles/theme-styles.min.css',
            [],
            THEME_VERSION
        );

        wp_enqueue_style(
            'aos-styles',
            'https://unpkg.com/aos@next/dist/aos.css',
            [],
            THEME_VERSION
        );
    }
}
