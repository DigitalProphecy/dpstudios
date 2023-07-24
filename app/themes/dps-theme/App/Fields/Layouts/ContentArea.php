<?php

namespace DPS\App\Fields\Layouts;

use DPS\App\Fields\Common;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\WysiwygEditor;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Select;

/**
 * Class ContentArea
 *
 * @package DPS\App\Fields\Layouts
 */
class ContentArea extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'mc/layout/content_area',
            Layout::make(__('Content Area', 'dps-starter'))
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Textarea::make(__('Headline', 'dps-starter'))
                        ->rows(2),
                    WysiwygEditor::make(__('Content', 'dps-starter'))
                        ->mediaUpload(false),
                    $this->customOptionTab('Module Settings'),
                    Image::make(__('image', 'dps-starter'))
                        ->wrapper([
                            'width' => '50%'
                        ]),
                    Select::make(__('Image Placment', 'dps-starter'))
                        ->choices([
                            'left' => 'Left',
                            'right' => 'Right',
                        ])
                        ->defaultValue('left')
                        ->wrapper([
                            'width' => '50%'
                        ]),
                    Select::make(__('Text Aligment', 'dps-starter'))
                        ->choices([
                            'left' => 'Left',
                            'right' => 'Right',
                            'center' => 'Center',
                        ])
                        ->defaultValue('left'),
                    Common::SiteThemeColor(),
                ])
        );
    }
}
