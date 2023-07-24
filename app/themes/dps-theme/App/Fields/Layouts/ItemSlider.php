<?php

namespace DPS\App\Fields\Layouts;

use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Link;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\WysiwygEditor;

/**
 * Class ItemSlider
 *
 * @package DPS\App\Fields\Layouts
 */
class ItemSlider extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'dps/layout/item_slider',
            Layout::make('Item Slider')
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Group::make(__('Item Content', 'dps-starter'))
                        ->fields([
                            Textarea::make(__('Item Header', 'dps-starter'), 'title')
                                ->rows(2),
                            WysiwygEditor::make(__('Item Copy', 'dps-starter'), 'content'),
                        ])
                        ->wrapper([
                            'width' => '50'
                        ]),
                    Group::make(__('Item Repeater', 'dps-starter'))
                        ->fields([
                            Repeater::make(__('Item List', 'dps-starter'))
                                ->fields([
                                    Image::make(__('Image', 'dps-starter'), 'item_image'),
                                    Textarea::make(__('Item Header', 'dps-starter'), 'title')
                                        ->rows(2),
                                    Textarea::make(__('Item Copy', 'dps-starter'), 'content')
                                        ->rows(5),
                                    Link::make(__('Link', 'dps-starter'))
                                ])
                                ->layout('block')
                                ->buttonLabel('Add Item')
                        ])
                        ->wrapper([
                            'width' => '50'
                        ]),
                    $this->customOptionTab('Module Settings'),
                    Select::make(__('Module Background Color', 'dps-starter'))
                        ->choices([
                            'item-slider--orange' => 'Theme Orange',
                            'item-slider--black' => 'Theme Black',
                            'item-slider--blue' => 'Theme Blue',
                        ])
                        ->defaultValue('item-slider--orange')
                        ->wrapper([
                            'width' => '20'
                        ]),
                ])
        );
    }
}
