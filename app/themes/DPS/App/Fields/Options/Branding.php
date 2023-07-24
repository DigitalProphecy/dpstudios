<?php

namespace DPS\App\Fields\Options;

use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Image;

/**
 * Class Branding
 *
 * @package DPS\App\Fields\Options
 */
class Branding
{
    /**
     * Defines fields used within Options tab.
     *
     * @return array
     */
    public function fields()
    {
        return apply_filters(
            'mc/options/branding',
            [
                Tab::make('Branding')
                    ->placement('left'),
                Image::make('Site Logo')
                    ->returnFormat('array')
                    ->previewSize('thumbnail'),
                Image::make('Site Logo Dark')
                    ->returnFormat('array')
                    ->previewSize('thumbnail')
            ]
        );
    }
}
