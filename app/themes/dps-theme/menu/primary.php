<?php

/**
 * The Primary Site navigation
 *
 * @package DPS
 */

use DPS\App\Menus\PrimaryMenuWalker;

wp_nav_menu(
    [
        'theme_location'  => 'primary',
        'menu_class'      => 'uk-navbar-nav',
        'container_class' => 'navbar-container',
        'container_id'    => 'primary-menu',
        'fallback_cb'     => false,
        'depth'           => 2,
        'walker'          => new PrimaryMenuWalker()
    ]
);
