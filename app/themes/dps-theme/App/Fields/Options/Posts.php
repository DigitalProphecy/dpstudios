<?php

namespace DPS\App\Fields\Options;

use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Image;

/**
 * Class Posts
 *
 * @package DPS\App\Fields\Options
 */
class Posts
{
    /**
     * Defines fields used within Options tab.
     *
     * @return array
     */
    public function fields()
    {
        return apply_filters(
            'mc/options/posts',
            [
                Tab::make('Posts')
                    ->placement('left'),
                Repeater::make('Fallback Post Images')
                    ->fields([
                        Image::make(__('Fallback Image', 'dps-starter'), 'images')
                    ])
            ]
        );
    }
}
