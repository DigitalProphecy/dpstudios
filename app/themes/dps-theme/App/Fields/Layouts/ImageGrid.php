<?php

namespace DPS\App\Fields\Layouts;

use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\TrueFalse;

/**
 * Class ImageGrid
 *
 * @package DPS\App\Fields\Layouts
 */
class ImageGrid extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'dps/layout/image_grid',
            Layout::make(__('Image Grid', 'dps-starter'))
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Repeater::make(__('Grid Images', 'dps-starter'))
                        ->Layout('block')
                        ->fields([
                            Image::make(__('Image', 'dps-starter'))
                                ->wrapper([
                                    'width' => '33'
                                ]),

                        ]),
                    $this->customOptionTab('Module Settings'),
                    Textarea::make(__('Module Color', 'dps-starter'))
                        ->rows(1),
                    TrueFalse::make(__('Module Width', 'dps-starter'))
                        ->stylisedUi(),
                ])
        );
    }
}
