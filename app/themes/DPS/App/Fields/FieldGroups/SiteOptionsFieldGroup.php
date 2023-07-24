<?php

namespace DPS\App\Fields\FieldGroups;

use WordPlate\Acf\Location;
use DPS\App\Fields\Options\Branding;
use DPS\App\Fields\Options\Footer;

/**
 * Class SiteOptionsFieldGroup
 *
 * @package DPS\App\Fields\SiteOptionsFieldGroup
 */
class SiteOptionsFieldGroup extends RegisterFieldGroups
{
    /**
     * Register Field Group via Wordplate
     */
    public function registerFieldGroup()
    {
        register_extended_field_group([
            'title'    => __('Site Options', 'dps-starter'),
            'fields'   => $this->getFields(),
            'location' => [
                Location::if('options_page', 'theme-general-options')
            ],
            'style' => 'default'
        ]);
    }

    /**
     * Register the fields that will be available to this Field Group.
     *
     * @return array
     */
    public function getFields()
    {
        return apply_filters(
            'mc/field-group/site-options/fields',
            array_merge(
                (new Branding())->fields(),
                (new Footer())->fields(),
            )
        );
    }
}
