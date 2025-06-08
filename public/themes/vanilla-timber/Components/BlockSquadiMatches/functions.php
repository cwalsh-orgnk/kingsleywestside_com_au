<?php

namespace Flynt\Components\BlockSquadiMatches;

use Flynt\FieldVariables;
use Flynt\Utils\Asset;
use Flynt\Utils\Options;
use Timber\Timber;

add_filter('Flynt/addComponentData?name=BlockSquadiMatches', function (array $data): array {

    // Hardcoded array of teams and parameters
    $data['teams'] = [
        'SL Div 1 First Team' => [
            'competitionId' => 809,
            'divisionId' => 5511,
            'teamIds' => [55005],
            'ignoreStatuses' => [1],
        ],
        'SL Div 1 Reserves' => [
            'competitionId' => 809,
            'divisionId' => 5512,
            'teamIds' => [55006],
            'ignoreStatuses' => [1],
        ],
        'SL Div 1 Under 18s' => [
            'competitionId' => 809,
            'divisionId' => 5513,
            'teamIds' => [55007],
            'ignoreStatuses' => [1],
        ],
        'Mens Amateur Premier' => [
            'competitionId' => 906,
            'divisionId' => 6262,
            'teamIds' => [63693],
            'ignoreStatuses' => [1],
        ],
         'Mens Amateur Premier Reserves' => [
            'competitionId' => 906,
            'divisionId' => 6263,
            'teamIds' => [63694],
            'ignoreStatuses' => [1],
        ],
         'Mens Metro' => [
            'competitionId' => 940,
            'divisionId' => 6534,
            'teamIds' => [66526],
            'ignoreStatuses' => [1],
        ],
          'Mens Masters Div 1' => [
            'competitionId' => 930,
            'divisionId' => 6413,
            'teamIds' => [65269],
            'ignoreStatuses' => [1],
        ],
        'Mens Masters Div 2 ' => [
            'competitionId' => 930,
            'divisionId' => 6417,
            'teamIds' => [65270],
            'ignoreStatuses' => [1],
        ],
        'Womens Central League' => [
            'competitionId' => 960,
            'divisionId' => 7761,
            'teamIds' => [71322],
            'ignoreStatuses' => [1],
        ],
        
    ];

    return $data;
});

function getACFLayout(): array
{
    return [
        'name' => 'BlockSquadiMatches',
        'label' => __('Block: Squadi Matches', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Display Title', 'flynt'),
                'name' => 'display_title',
                'type' => 'text',
                'default_value' => 'Latest Matches',
            ],
        ]
    ];
}
