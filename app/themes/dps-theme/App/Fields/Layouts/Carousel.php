<?php

namespace DPS\App\Fields\Layouts;

use WordPlate\Acf\Fields\ButtonGroup;
use WordPlate\Acf\Fields\Image as WPImage;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Select;

/**
 * Class Carousel
 *
 * @package DPS\App\Fields\Layouts
 */
class Carousel extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'mc/layout/carousel',
            Layout::make(__('Carousel'), 'carousel')
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Repeater::make(__('Carousel Items'))
                        ->layout('block')
                        ->min(1)
                        ->buttonLabel(__('Add Item'))
                        ->fields([
                            WPImage::make('Image')
                                ->returnFormat('array'),
                        ]),
                    $this->optionsTab(),
                    Select::make(__('Animation Type', 'dps-starter'), 'carousel-animation-type')
                        ->choices([
                            'fade'  => __('Fade', 'dps-starter'),
                            'pull'  => __('Pull', 'dps-starter'),
                            'push'  => __('Push', 'dps-starter'),
                            'scale' => __('Scale', 'dps-starter'),
                            'slide' => __('Slide', 'dps-starter'),
                        ])
                        ->defaultValue('slide')
                        ->returnFormat('value')
                        ->wrapper([
                            'width' => '33.33'
                        ]),
                    ButtonGroup::make(__('Enable Arrow Navigation', 'dps-starter'), 'show-carousel-arrows-nav')
                        ->choices([
                            'true'  => __('Enable', 'dps-starter'),
                            'false' => __('Disable', 'dps-starter'),
                        ])
                        ->instructions(__('Enabling will show a previous and next navigation arrow overlayed on the carousel.', 'dps-starter'))
                        ->defaultValue('true')
                        ->wrapper([
                            'width' => '33.33'
                        ]),
                    ButtonGroup::make(__('Enable Indicators', 'dps-starter'), 'show-carousel-indicators')
                        ->choices([
                            'true'  => __('Enable', 'dps-starter'),
                            'false' => __('Disable', 'dps-starter'),
                        ])
                        ->instructions(__('Enabling will show a dot navigation button group.', 'dps-starter'))
                        ->defaultValue('false')
                        ->wrapper([
                            'width' => '33.33'
                        ]),
                ])
        );
    }
}
