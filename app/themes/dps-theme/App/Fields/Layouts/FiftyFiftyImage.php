<?php

namespace DPS\App\Fields\Layouts;

use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image as WPImage;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\TrueFalse;

/**
 * Class FiftyFiftyImage
 *
 * @package DPS\App\Fields\Layouts
 */
class FiftyFiftyImage extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'mc/layout/fifty_fifty_image',
            Layout::make('Fifty Fifty Image')
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Group::make(__('Image Column 1', 'dps-starter'))
                        ->fields([
                            WPImage::make('Image')
                                ->returnFormat('array'),
                        ])
                        ->wrapper([
                            'width' => '50',
                        ]),
                    Group::make(__('Image Column 2', 'dps-starter'))
                        ->fields([
                            WPImage::make('Image')
                                ->returnFormat('array'),
                        ])
                        ->wrapper([
                            'width' => '50',
                        ])

                ])
        );
    }
}
