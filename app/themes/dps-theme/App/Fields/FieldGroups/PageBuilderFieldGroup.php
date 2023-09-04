<?php

namespace DPS\App\Fields\FieldGroups;

use DPS\App\Fields\Layouts\Carousel;
use DPS\App\Fields\Layouts\ContentArea;
use DPS\App\Fields\Layouts\Hero;
use DPS\App\Fields\Layouts\Image;
use DPS\App\Fields\FieldGroups\RegisterFieldGroups;
use DPS\App\Fields\Layouts\GravityForm;
use DPS\App\Fields\Layouts\ImageGrid;
use DPS\App\Fields\Layouts\InfoCard;
use DPS\App\Fields\Layouts\ItemSlider;
use DPS\App\Fields\Layouts\Details;
use DPS\App\Fields\Layouts\ProjectList;
use DPS\App\Fields\Layouts\FiftyFiftyImage;
use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\FlexibleContent;

/**
 * Class PageBuilderFieldGroup
 *
 * @package DPS\App\Fields\PageBuilderFieldGroup
 */
class PageBuilderFieldGroup extends RegisterFieldGroups
{
    /**
     * Register Field Group via Wordplate
     */
    public function registerFieldGroup()
    {
        register_extended_field_group([
            'title'    => __('Page Builder', 'dps-starter'),
            'fields'   => $this->getFields(),
            'location' => [
                Location::if('page_template', 'templates/page-builder.php'),
                Location::if('post_type', 'project')
            ],
            'style' => 'default'
        ]);
    }

    /**
     * Register the fields that will be available to this Field Group.
     *
     * @return array
     */
    public function getFields()
    {
        return apply_filters('mc/field-group/page-builder/fields', [
            FlexibleContent::make(__('Modules', 'dps-starter'))
                ->buttonLabel(__('Add Module', 'dps-starter'))
                ->layouts([
                    (new Carousel())->fields(),
                    (new ContentArea())->fields(),
                    (new Hero())->fields(),
                    (new Image())->fields(),
                    (new ItemSlider())->fields(),
                    (new InfoCard())->fields(),
                    (new ImageGrid())->fields(),
                    (new ProjectList())->fields(),
                    (new GravityForm())->fields(),
                    (new Details())->fields(),
                    (new FiftyFiftyImage())->fields(),
                ])
        ]);
    }
}
