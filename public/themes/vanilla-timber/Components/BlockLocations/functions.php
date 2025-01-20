<?php

namespace Flynt\Components\BlockLocations;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'venue';

add_filter('Flynt/addComponentData?name=BlockLocations', function ($data) {
    $posts = Timber::get_posts([
        'post_status' => 'publish',
        'post_type' => POST_TYPE,
        'posts_per_page' => -1,
        'ignore_sticky_posts' => 0,
    ]);

    $data['venues'] = array_slice(array_filter($posts->to_array(), function ($post): bool {
        return $post->ID !== get_the_ID();
    }), 0, 5);

    return $data;
});

function getACFLayout(): array
{
    return [
        'name' => 'blockLocations',
        'label' => __('Block: Locations', 'flynt'),
        'sub_fields' => [
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
                    FieldVariables\getSize()
                ]
            ]
        ]
    ];
}
