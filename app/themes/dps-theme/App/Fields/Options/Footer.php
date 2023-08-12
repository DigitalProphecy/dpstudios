<?php

namespace DPS\App\Fields\Options;

use DPS\App\Fields\Common;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Link;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Fields\Textarea;

/**
 * Class Footer
 *
 * @package DPS\App\Fields\Options
 */
class Footer
{
    /**
     * Defines fields used within Options tab.
     *
     * @return array
     */
    public function fields()
    {
        return apply_filters(
            'mc/options/footer',
            [
                Tab::make('Footer')
                    ->placement('left'),
                Image::make(__('Footer Logo', 'dps-starter'))
                    ->wrapper([
                        'width' => '20'
                    ]),
                Repeater::make(__('Footer Nav', 'dps-starter'))
                    ->fields([
                        Link::make(__('Link Item', 'dps-starter'))
                    ])
                    ->wrapper([
                        'width' => '40'
                    ]),
                Repeater::make(__('Footer Social', 'dps-starter'))
                    ->fields([
                        Common::FaIcons(),
                        Textarea::make(__('Social Item URL', 'dps-starter'))
                            ->rows(1)
                    ])
                    ->wrapper([
                        'width' => '40'
                    ]),
            ]
        );
    }
}
