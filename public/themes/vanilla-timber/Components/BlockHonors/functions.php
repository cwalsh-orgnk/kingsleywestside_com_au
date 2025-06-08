<?php

namespace Flynt\Components\BlockHonors;

use Flynt\FieldVariables;

function getACFLayout(): array
{
    return [
        'name' => 'blockHonors',
        'label' => __('Block: Club Honors', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Text', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'delay' => 0,
                'media_upload' => 0,
                'required' => 0,
            ],
            [
                'label' => 'Honors',
                'name' => 'honors',
                'type' => 'repeater',
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'row',
                'button_label' => 'Add Honor',
                'sub_fields' => [
                    [
                        'label' => 'League',
                        'name' => 'league',
                        'type' => 'text'
                    ],
                    [
                        'label' => 'Positon',
                        'name' => 'position',
                        'type' => 'text'
                    ],
                ]
            ],
            [
                'label' => __('Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    FieldVariables\getTheme(),
                    FieldVariables\getSize(),
                    FieldVariables\getAlignment(),
                    FieldVariables\getTextAlignment()
                ]
            ]
        ]
    ];
}
