<?php
$logo_dark = get_field('site_logo_dark', 'option');

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- skip to main content -->
    <a href="#primary" class="screen-reader-text"><?php _e('Skip to Main Content', 'dps-starter'); ?></a>

    <header id="masthead" class="header uk-margin-auto" role="banner">
        <!-- Mobile Nav Bar (.mobile_menu) -->
        <div class="mobile_menu uk-flex uk-flex-between">
            <div class="dps_logo">
                <?php
                printf(
                    '<a href="/"><img src="%1$s" class="" /></a>',
                    $logo_dark['sizes']['thumbnail']
                )
                ?>
            </div>

            <a class="mobile_menu__toggle uk-navbar-toggle uk-navbar-toggle-animate" uk-toggle="target: .mobile_modal" uk-navbar-toggle-icon href="#"></a>
        </div>
        <!-- /Mobile Nav Bar (.mobile_menu) -->

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light" uk-sticky="start: 100; animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; cls-inactive: uk-navbar-transparent uk-light">
            <div class="dps_logo__lg">
                <?php
                printf(
                    '<a href="/"><img src="%1$s" class="" /></a>',
                    $logo_dark['sizes']['thumbnail']
                )
                ?>
            </div>
            <div class="uk-visible@m">
                <?php
                // Loads the menu/primary.php template.
                get_template_part('menu/primary');
                ?>
            </div>
            <div class="mobile_modal" hidden>
                <div class="mobile_modal__container uk-flex uk-flex-right">
                    <a class="mobile_modal__toggle uk-navbar-toggle uk-navbar-toggle-animate" uk-toggle="target: .mobile_modal" uk-navbar-toggle-icon href="#"></a>
                </div>
                <?php
                // Loads the menu/primary.php template.
                get_template_part('menu/dps', 'primary');
                ?>
            </div>
        </nav>
        <!-- /Navbar -->
    </header><!-- .header -->