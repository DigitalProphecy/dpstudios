<?php

get_header();

// hook: App/Fields/Modules/outputFlexibleModules()
do_action('mc/modules/output', get_the_ID());

get_footer();
