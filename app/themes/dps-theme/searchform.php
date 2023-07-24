<?php

/**
 * Default search form.
 *
 * @package DPS
 */
?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_home_url(); ?>">
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="<?php _e('Search …', 'dps-starter') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php _e('Search for:', 'dps-starter') ?>" />
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </div>
    </div>
</form>