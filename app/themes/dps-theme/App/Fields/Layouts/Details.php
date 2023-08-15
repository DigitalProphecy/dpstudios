<?php

namespace DPS\App\Fields\Layouts;

use WordPlate\Acf\Fields\DatePicker;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image as WPImage;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Taxonomy;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\TimePicker;
use WordPlate\Acf\Fields\TrueFalse;

/**
 * Class Details
 *
 * @package DPS\App\Fields\Layouts
 */
class Details extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'mc/layout/details',
            Layout::make('Details')
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Group::make(__('Detail Col 1', 'dps-starter'))
                        ->fields([
                            Textarea::make(__('Detail Project Field', 'dps-starer'))
                                ->rows(1),
                            Textarea::make(__('Detail Project Slogan', 'dps-starer'))
                                ->rows(1),
                        ])
                        ->wrapper([
                            'width' => '50'
                        ]),
                    Group::make(__('Detail Col 2', 'dps-starter'))
                        ->fields([
                            Taxonomy::make(__('Project Category', 'dps-starter'))
                                ->taxonomy('project_type')
                                ->appearance('checkbox') // checkbox, multi_select, radio or select
                                ->addTerm(true) // Allow new terms to be created whilst editing (true or false)
                                ->loadTerms(true) // Load value from posts terms (true or false)
                                ->saveTerms(true) // Connect selected terms to the post (true or false)
                                ->returnFormat('id'), // object or id (default),
                            TextArea::make(__('Client Name', 'dps-starter'))
                                ->rows(1),
                            DatePicker::make(__('Project Date', 'dps-starter'))
                        ])
                        ->wrapper([
                            'width' => '50'
                        ]),
                ])
        );
    }
}
