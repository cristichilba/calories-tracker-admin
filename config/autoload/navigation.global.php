<?php

return [
    'dot_navigation' => [

        //enable menu item active if any child is active
        'active_recursion' => true,

        'containers' => [
            'main_menu' => [
                'type' => 'ArrayProvider',
                'options' => [
                    'items' => [
                        [
                            'options' => [
                                'label' => 'Dashboard',
                                'route' => [
                                    'route_name' => 'dashboard',
                                ],
                                'icon' => 'fa fa-tachometer',
                            ]
                        ],
                        [
                            'options' => [
                                'label' => 'Manage admins',
                                'route' => [
                                    'route_name' => 'user',
                                    'route_params' => ['action' => 'manage']
                                ],
                                'icon' => 'fa fa-user-circle-o',
                            ]
                        ],
//                        [
//                            'options' => [
//                                'label' => 'Manage users',
//                                'route' => [
//                                    'route_name' => 'f_user',
//                                    'route_params' => ['action' => 'manage']
//                                ],
//                                'icon' => 'fa fa-user-o',
//                            ],
//                        ],
                        [
                            'options' => [
                                'label' => 'Products',
                                'route' => '',
                                'icon' => 'fa fa-cutlery',
                            ],
                            'pages' => [
                                [
                                    'options' => [
                                        'label' => 'Manage Products',
                                        'uri' => '/product/manage',
                                        'icon' => 'fa fa-list',
                                    ],
                                ],
                                [
                                    'options' => [
                                        'label' => 'Pending Products',
                                        'uri' => '/product/pending',
                                        'icon' => 'fa fa-pause',
                                    ],
                                ]
                            ]
                        ],
                    ]
                ]
            ],

            'account_menu' => [
                'type' => 'ArrayProvider',
                'options' => [
                    'items' => [
                        [
                            'options' => [
                                'label' => 'Profile',
                                'route' => [
                                    'route_name' => 'user',
                                    'route_params' => ['action' => 'account']
                                ],
                                'icon' => 'fa fa-user',
                            ]
                        ],
                        [
                            'options' => [
                                'label' => 'Settings',
                                'route' => [
                                    'route_name' => 'dashboard',
                                ],
                                'icon' => 'fa fa-cog',
                            ]
                        ],
                        [
                            'options' => [
                                'label' => 'Sign Out',
                                'route' => [
                                    'route_name' => 'logout',
                                ],
                                'icon' => 'fa fa-sign-out',
                            ]
                        ]
                    ]
                ]
            ]
        ],

        //register custom providers here
        'provider_manager' => []
    ],
];
