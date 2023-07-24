<?php

namespace DPS\App\Fields\Layouts;

use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image as WPImage;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\TrueFalse;

/**
 * Class Image
 *
 * @package DPS\App\Fields\Layouts
 */
class Image extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'mc/layout/image',
            Layout::make('Image')
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    WPImage::make('Image')
                        ->returnFormat('array'),
                    $this->customOptionTab('Module Options'),
                    Group::make('Background')
                        ->fields([
                            Textarea::make(__('Custom Background Color', 'dps-starter'), 'custom-bg')
                                ->rows(1),
                            TrueFalse::make(__('Full Width Image', 'dps-starter'))
                                ->stylisedUi(),
                        ])
                ])
        );
    }
}
