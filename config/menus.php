<?php

return [
    'admin' => [
        [
            'name' => 'Dashboard',
            'items' => [
                [
                    'name' => 'Dashboard',
                    'permission' => 'user-list',
                    'route' => 'dashboard',
                    'icon' => 'bi-grid-fill'
                ]
            ]
        ],
        [
            'name' => 'Blog',
            'items' => [
                [
                    'name' => 'Articles',
                    'permission' => 'user-list',
                    'route' => 'dashboard',
                    'icon' => 'bi-pin-angle-fill'
                ],
                [
                    'name' => 'Categories',
                    'permission' => 'user-list',
                    'route' => 'dashboard',
                    'icon' => 'bi-tags-fill'
                ]
            ]
        ],
        [
            'name' => 'Contents',
            'items' => [
                [
                    'name' => 'Scholarships',
                    'permission' => 'user-list',
                    'route' => 'dashboard',
                    'icon' => 'bi-mortarboard-fill'
                ],
                [
                    'name' => 'Fundings',
                    'permission' => 'user-list',
                    'route' => 'dashboard',
                    'icon' => 'bi-cash-stack'
                ],
                [
                    'name' => 'Publications',
                    'permission' => 'user-list',
                    'route' => 'dashboard',
                    'icon' => 'bi-book-fill'
                ],
                [
                    'name' => 'Events',
                    'permission' => 'user-list',
                    'route' => 'dashboard',
                    'icon' => 'bi-megaphone-fill'
                ],
                [
                    'name' => 'Webinars',
                    'permission' => 'user-list',
                    'route' => 'dashboard',
                    'icon' => 'bi-person-video2'
                ],
            ]
        ],
        [
            'name' => 'Others',
            'items' => [
                [
                    'name' => 'Teams',
                    'permission' => 'user-list',
                    'route' => 'dashboard',
                    'icon' => 'bi-people-fill'
                ],
                [
                    'name' => 'Positions',
                    'permission' => 'user-list',
                    'route' => 'dashboard',
                    'icon' => 'bi-person-fill-gear'
                ]
            ]
        ],
        [
            'name' => 'User Access',
            'items' => [
                [
                    'name' => 'User Admin',
                    'permission' => 'user-list',
                    'route' => 'dashboard',
                    'icon' => 'bi-person-fill-lock'
                ]
            ]
        ]
    ]
];
