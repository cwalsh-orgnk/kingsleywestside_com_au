<?php

namespace Flynt\Components\BlockImageText;

use Flynt\FieldVariables;

function getACFLayout(): array
{
    return [
        'name' => 'blockImageText',
        'label' => __('Block: Image Text', 'flynt'),
        'sub_fields' => [
            [
                'label' => 'Media',
                'name' => 'media',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],

            [
                'label' => __('Image Position', 'flynt'),
                'name' => 'imagePosition',
                'type' => 'button_group',
                'choices' => [
                    'left' => sprintf('<i class=\'dashicons dashicons-align-left\' title=\'%1$s\'></i>', __('Image on the left', 'flynt')),
                    'right' => sprintf('<i class=\'dashicons dashicons-align-right\' title=\'%1$s\'></i>', __('Image on the right', 'flynt'))
                ]
            ],
            [
                'label' => __('Images', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG, WebP.', 'flynt'),
                'name' => 'images',
                'type' => 'gallery',
                'min' => 0,
                'max' => 5,
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => 0,
                'max_width' => 0,
                'min_height' => 0,
                'max_height' => 0,
                'min_size' => 0,
                'max_size' => 0,
                'mime_types' => 'jpg,jpeg,png,svg,webp',
            ],
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
                'required' => 1,
            ],
            [
                'label' => __('Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => 'Sub Content',
                'name' => 'subContent',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Sub Content Type',
                'name' => 'subContentType',
                'type' => 'button_group',
                'choices' => [
                    'highlights' => 'Highlights',
                    'list' => 'List',
                ],
                'default_value' => '',
                'layout' => 'horizontal',
            ],
            [
                'label' => 'Buttons',
                'name' => 'buttons',
                'type' => 'repeater',
                'instructions' => '',
                'min' => 0,
                'max' => 2,
                'layout' => 'row',
                'button_label' => 'Add Button',
                'sub_fields' => [
                    [
                        'label' => 'Button',
                        'name' => 'button',
                        'type' => 'link',
                        'instructions' => '',
                        'required' => 0,
                    ],
                ],
            ],
            [
                'label' => 'Highlights',
                'name' => 'highlights',
                'type' => 'repeater',
                'instructions' => 'For the best responsive appearance, it is recommended to include either 2 or 4 highlights in this section.',
                'min' => 0,
                'max' => 4,
                'layout' => 'row',
                'button_label' => 'Add Highlight',
                'sub_fields' => [
                    [
                        'label' => 'Icon',
                        'name' => 'icon',
                        'type' => 'image',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ],
                    [
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'textarea',
                        'rows' => 2,
                    ],
                ],
                'conditional_logic' => [
                    [
                        [
                            'fieldPath' => 'subContentType',
                            'operator' => '==',
                            'value' => 'highlights'
                        ]
                    ]
                ],
            ],
            [
                'label' => 'List',
                'name' => 'list',
                'type' => 'repeater',
                'instructions' => '',
                'min' => 0,
                'max' => 0, // Consider setting a maximum if appropriate.
                'layout' => 'table',
                'button_label' => 'Add List Item',
                'sub_fields' => [
                    [
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'text',
                    ],
                    [
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'link',
                    ],
                ],
                'conditional_logic' => [
                    [
                        [
                            'fieldPath' => 'subContentType',
                            'operator' => '==',
                            'value' => 'list'
                        ],
                    ],
                ],
            ],
        ]
    ];
}
