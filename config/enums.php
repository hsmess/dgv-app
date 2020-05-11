<?php

return [
    'formats' => [
        1 => 'Harry & Rich present Tuesday Nights in the UK'
    ],
    'statuses' => [
        0 => 'Registration Open',
        1 => 'Registration Closed',
        2 => 'Started',
        3 => 'Completed'
    ],
    'format_details' => [
        1 => [
            'players' => [
                'min' => 12,
                'max' => 192
            ],
            'rounds' => [
                7 => [
                    'name' =>'Actually the final',
                    'games' => 1,
                    'players_per_group_min' => 0,
                    'players_per_group_max' => 4,
                    'progression' => [
                    ]
                ],
                6 => [
                    'name' => 'Probably the Final. Or Maybe not if a lot of you showed up',
                    'games' => 1,
                    'players_per_group_min' => 2,
                    'players_per_group_max' => 4,
                    'progression' => [
                        0 => [
                            'condition' => 'round.groups > 1',
                            'number' => 1,
                            'round' => 7
                        ]
                    ]
                ],
                5 => [
                    'name' => 'Fives of Death',
                    'games' => 1,
                    'players_per_group_min' => 5,
                    'players_per_group_max' => 5,
                    'progression' => [
                        0 => [
                            'number' => 1,
                            'round' => 6
                        ]
                    ]
                ],
                4 => [
                    'name' => 'Last Chance Saloon',
                    'games' => 1,
                    'players_per_group_min' => 4,
                    'players_per_group_max' => 8,
                    'progression' => [
                        0 => [
                            'number' => 1,
                            'round' => 5
                        ]
                    ]
                ],
                3 => [
                    'name' => 'Post Group Seeding Round',
                    'games' => 1,
                    'players_per_group_min' => 4,
                    'players_per_group_max' => 4,
                    'progression' => [
                        0 => [
                            'number' => 4,
                            'round' => 5
                        ]
                    ]
                ],
                2 => [
                    'name' => 'Knock-down round',
                    'games' => 1,
                    'players_per_group_min' => 3,
                    'players_per_group_max' => 6,
                    'progression' => [
                        0 => [
                            'number' => 2,
                            'round' => 3
                        ],
                        1 => [
                            'number' => 4,
                            'round' => 4
                        ]
                    ]
                ],
                1 => [
                    'name' => 'Group Stage',
                    'games' => 3,
                    'players_per_group_min' => 3,
                    'players_per_group_max' => 6,
                    'progression' => [
                        0 => [
                            'number' => 6,
                            'round' => 2
                        ]
                    ]
                ]
            ]
        ]
    ]
];
