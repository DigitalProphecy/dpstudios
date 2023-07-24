<?php

namespace DPS\App\Fields\Layouts;

use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Relationship;
use WordPlate\Acf\Fields\WysiwygEditor;
use WordPlate\Acf\Fields\Textarea;

/**
 * Class ProjectList
 *
 * @package DPS\App\Fields\Layouts
 */
class ProjectList extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'dps/layout/project_list',
            Layout::make(__('Project List', 'dps-starter'))
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Group::make(__('Project List', 'dps-starter'))
                        ->instructions('Add the text value')
                        ->fields([
                            Relationship::make(__('Item Object', 'dps-starter'))
                                ->instructions('Add the contacts.')
                                ->postTypes(['project'])
                                ->filters([
                                    'search',
                                    'post_type',
                                    'taxonomy'
                                ])
                                ->elements(['featured_image'])
                                ->returnFormat('object'), // id or object (default)
                        ]),

                ])
        );
    }
}
