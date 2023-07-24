<?php

namespace DPS\App\Fields\Layouts;

use DPS\App\Fields\Common;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Link;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\WysiwygEditor;

/**
 * Class InfoCard
 *
 * @package DPS\App\Fields\Layouts
 */
class InfoCard extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'mc/layout/info_card',
            Layout::make('Info Card')
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Group::make(__('Content Section', 'dps-starter'))
                        ->fields([
                            Textarea::make(__('Heading', 'dps-starter'))
                                ->rows(1),
                            WysiwygEditor::make(__('Card Content', 'dps-starter')),
                            Link::make(__('CTA Link', 'dps-starter')),
                        ])
                        ->wrapper([
                            'width' => '50'
                        ]),
                    Repeater::make(__('Items', 'dps-starter'))
                        ->fields([
                            Image::make(__('Icon Image', 'dps-starter')),
                            Textarea::make(__('Icon Header', 'dps-starter'))
                                ->rows(1),
                            Textarea::make(__('Icon Content', 'dps-starter'))
                                ->rows(3),
                        ])
                        ->Layout('block')
                        ->wrapper([
                            'width' => '50'
                        ]),
                    $this->customOptionTab('Module Settings'),
                    Common::BackgroundColor('info_card')
                        ->wrapper([
                            'width' => '50'
                        ]),
                    Select::make(__('Module Alignment', 'dps-starter'))
                        ->choices([
                            'stacked' => 'Stacked',
                            'sbs' => 'Side by Side'
                        ])
                        ->defaultValue('sbs')
                        ->wrapper([
                            'width' => '50'
                        ]),
                ])
        );
    }
}
