<?php

namespace Flynt\Components\BlockPageHero;

use Flynt\FieldVariables;
use Timber\Timber;
use Flynt\Utils\Options;
use Timber\Image;

add_filter('Flynt/addComponentData?name=BlockPageHero', function (array $data): array {

    $post = Timber::get_post()->id;
    $thumbnail_id = get_post_thumbnail_id($post);
    if ($thumbnail_id) {
        $data['featuredImage'] = Timber::get_image($thumbnail_id);
    }

    $data['pageTitle'] = Timber::get_post()->title;
    $data['globalOptions'] = Options::getGlobal('ThemeSettings');  // Retrieve global options

    return $data;
});

function getACFLayout(): array
{
    return [
        'name' => 'blockPageHero',
        'label' => __('Section: Page Hero', 'flynt'),
        'sub_fields' => [
            [
                'label' => 'Settings',
                'name' => 'settings',
                'type' => 'tab',
            ],
            [
                'label' => 'Section ID',
                'name' => 'sectionID',
                'type' => 'text',
            ],
            [
                'label' => 'Top Padding',
                'name' => 'topPadding',
                'type' => 'button_group',
                'choices' => [
                    'default' => 'Normal',
                    'none' => 'None',
                ],
                'default_value' => 'default',
                'layout' => 'horizontal',
            ],
            [
                'label' => 'Bottom Padding',
                'name' => 'bottomPadding',
                'type' => 'button_group',
                'choices' => [
                    'default' => 'Normal',
                    'none' => 'None',
                ],
                'default_value' => 'default',
                'layout' => 'horizontal',
            ],
            [
                'label' => 'Hero Media',
                'name' => 'heroMedia',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Hero Image', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG, WebP.', 'flynt'),
                'name' => 'heroImage',
                'instructions' => 'If no image is set the Featured Image will be used.',
                'type' => 'image',
                'preview_size' => 'thumbnail',
                'mime_types' => 'jpg,jpeg,png,svg,webp',
                'required' => 0,
            ],
            [
                'label' => __('Hero Images', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG, WebP.', 'flynt'),
                'name' => 'heroImages',
                'type' => 'gallery',
                'min' => 0,
                'max' => 0,
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
                'label' => 'Content',
                'name' => 'content',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Content',
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'toolbar' => 'default',
                'media_upload' => 0,
                'delay' => 0
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
            ],
        ],
    ];
}
