<?php

/**
 * Functions and definitions
 *
 * @package DPS
 */

use DPS\App\Core\Init;
use DPS\App\Setup;
use DPS\App\Scripts;
use DPS\App\Media;
use DPS\App\Shortcodes;
use DPS\App\Fields\ACF;
use DPS\App\Fields\Options;
use DPS\App\Fields\Modules;
use DPS\App\Fields\FieldGroups\SiteOptionsFieldGroup;
use DPS\App\Fields\FieldGroups\PageBuilderFieldGroup;

// use DPS\App\Blocks\RegisterBlocks;

/**
 * Define Theme Version
 * Define Theme directories
 */
define('THEME_VERSION', '1.0.9');
define('DPS_THEME_DIR', trailingslashit(get_template_directory()));
define('DPS_THEME_PATH_URL', trailingslashit(get_template_directory_uri()));

// Require Autoloader
require_once DPS_THEME_DIR . 'vendor/autoload.php';

/**
 * Theme Setup
 */
add_action('after_setup_theme', function () {

    (new Init())
        ->add(new Setup())
        ->add(new Scripts())
        ->add(new Media())
        ->add(new Shortcodes())
        ->add(new ACF())
        ->add(new Options())
        ->add(new Modules())
        ->add(new SiteOptionsFieldGroup())
        ->add(new PageBuilderFieldGroup())
        // ->add(new RegisterBlocks())
        ->initialize();

    // Translation setup
    load_theme_textdomain('dps-starter', DPS_THEME_DIR . '/languages');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Add automatic feed links in header
    add_theme_support('automatic-feed-links');

    // Add Post Thumbnail Image sizes and support
    add_theme_support('post-thumbnails');

    // Switch default core markup to output valid HTML5.
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ]);
});
