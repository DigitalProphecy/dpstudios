<?php

namespace DPS\App\Fields\Layouts;

use WordPlate\Acf\Fields\GoogleMap;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\WysiwygEditor;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Repeater;

/**
 * Class GravityForm
 *
 * @package DPS\App\Fields\Layouts
 */
class GravityForm extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'dps/layout/gravity-form.php',
            Layout::make(__('Gravity Form', 'dps-starter'))
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Group::make(__('Contact Heading', 'dps-starter'))
                        ->layout('block')
                        ->fields([
                            Textarea::make(__('Module Heading', 'dps-starter'))
                                ->rows(2)
                        ])
                        ->wrapper([
                            'width' => '100'
                        ]),
                    Group::make(__('Contact Form', 'dps-starter'))
                        ->layout('block')
                        ->fields([
                            Textarea::make(__('Gravity From ID', 'dps-starter'))
                                ->rows(1)
                        ])
                        ->wrapper([
                            'width' => '50'
                        ]),
                    Group::make(__('Contact Info', 'dps-starter'))
                        ->layout('block')
                        ->fields([
                            Textarea::make(__('Contact Heading', 'dps-starter'))
                                ->rows(1),
                            Repeater::make(__('Info', 'dps-starter'))
                                ->layout('block')
                                ->fields([
                                    Textarea::make('Info Heading', 'dps-starter')
                                        ->rows(1),
                                    WysiwygEditor::make(__('Copy', 'dps-starter')),
                                ]),
                            Repeater::make(__('Social Icons', 'dps-starter'))
                                ->fields([
                                    Image::make(__('Icon', 'dps-starter')),
                                    Textarea::make(__('url', 'dps-starter'))
                                        ->rows(1),
                                ]),

                        ])
                        ->wrapper([
                            'width' => '50'
                        ]),
                    $this->customOptionTab('Module Settings', 'dps-starter'),
                    GoogleMap::make(__('Contact Map', 'dps-starter'))
                        ->instructions('Add the Google Map address.')
                        ->center(57.456286, 18.377716)
                        ->zoom(14),
                    Image::make(__('Background Image', 'dps-starter')),
                ])
        );
    }
}
