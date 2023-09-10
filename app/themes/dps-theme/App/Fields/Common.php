<?php

namespace DPS\App\Fields;

use WordPlate\Acf\ConditionalLogic;
use WordPlate\Acf\Fields\ButtonGroup;
use WordPlate\Acf\Fields\ColorPicker;
use WordPlate\Acf\Fields\File;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Range;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Forms;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\TrueFalse;

class Common
{
    /**
     * Margin Options Group
     *
     * @param  string $label
     * @return void
     */
    public static function marginGroup($label = 'Margin',  $defaults = [3, 3])
    {
        return Group::make(__($label, 'dps-starter'))
            ->layout('block')
            ->fields([
                Group::make(__('Mobile', 'dps-starter'))
                    ->layout('block')
                    ->fields([
                        Range::make('Top')
                            ->min(0)
                            ->max(10)
                            ->step(0.5)
                            ->DefaultValue($defaults[0])
                            ->wrapper([
                                'width' => '50'
                            ])
                            ->append('rem'),
                    ]),
                Group::make(__('Desktop', 'dps-starter'))
                    ->layout('block')
                    ->fields([
                        Range::make('Top')
                            ->min(0)
                            ->max(10)
                            ->step(0.5)
                            ->DefaultValue($defaults[1])
                            ->wrapper([
                                'width' => '50'
                            ])
                            ->append('rem')
                    ]),
            ]);
    }


    /**
     * UIKit Animations
     */

    public static function uikitAnimation()
    {
        return Group::make(__('UIKit Animation Settings', 'dps-starter'))
            ->fields([]);
    }

    /**
     * Theme Background Color
     */

    public static function BackgroundColor($label)
    {
        return Group::make(__('Module Background Color', 'dps-starter'))
            ->fields([
                Select::make(__('Background Color', 'dps-starter'))
                    ->choices([
                        $label . '--transparent' => 'Transparent',
                        $label . '--theme-black' => 'Black',
                        $label . '--theme-orange' => 'Orange',
                    ]),
            ]);
    }

    /**
     * Theme Background Color
     */

    public static function SiteThemeColor()
    {
        return Group::make(__('Theme Color', 'dps-starter'))
            ->fields([
                Select::make(__('Color', 'dps-starter'))
                    ->choices([
                        'transparent' => 'Transparent',
                        '#211e26' => 'Black',
                        '#f2b035' => 'Orange',
                        '#012759' => 'Navy Blue',
                        '#0377bf' => 'Blue',
                        '#8c5246' => 'Brown',
                        'custom' => 'Custom Color',
                    ]),
                Textarea::make(__('Custom Module Color', 'dps-starter'))
                    ->rows(1)
                    ->conditionalLogic([
                        ConditionalLogic::if('color')->equals('custom')
                    ]),
                TrueFalse::make(__('Remove Background Effect', 'dps-starter'))
                    ->defaultValue(true)
                    ->stylisedUi(),
            ]);
    }

    /**
     * Forms
     */

    public static function Forms()
    {
        return Group::make(__('Forms', 'dps-starter'))
            ->fields([
                Forms::make(__('Form Select', 'dps-starter'))
            ]);
    }

    /**
     * Font Awesome Icons List
     * 
     */

    public static function FaIcons()
    {
        return Group::make(__('Font Awesome Icons', 'dps-starter'))
            ->fields([
                Select::make(__('Icons', 'dps-starter'))
                    ->choices([
                        'fa-brands fa-facebook-f'               => 'Facebook',
                        'fa-brands fa-twitter'                  => 'Twitter',
                        'fa-brands fa-instagram'                => 'Instagram',
                        'fa-brands fa-linkedin-in'              => 'Linkedin',
                        'fa-brands fa-youtube'                  => 'Youtube',
                        'fa-brands fa-envelope'                 => 'Envelope',
                        'fa-brands fa-clock'                    => 'Clock',
                        'fa-brands fa-headset'                  => 'Headset',
                        'fa-brands fa-wordpress-simple'         => 'WordPress',
                        'fa-regular fa-laptop-mobile'           => 'Responsive',
                        'fa-regular fa-head-side-goggles'       => 'XR',
                        'fa-regular fa-code' => 'Coding',
                        'fa-regular fa-object-group' => 'Design',
                        'fa-regular fa-magnifying-glass-location' => 'SEO',
                        'custom' => 'Custom Font Awesome Icon'
                    ]),
                Text::make(__('Custom Icon Class', 'dps-starter'))
                    ->conditionalLogic([
                        ConditionalLogic::if('icons')->equals('custom')
                    ]),
            ]);
    }
}
