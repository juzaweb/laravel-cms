<?php

return [
    [
        'code' => 'header',
        'name' => trans('app.header'),
        'cards' => [
            [
                'code' => 'site_header',
                'name' => trans('app.header'),
                'input_items' => [
                    [
                        'element' => 'site_header',
                        'title' => trans('app.header'),
                        'name' => 'site_header',
                    ],
                ]
            ],
            [
                'code' => 'main_menu',
                'name' => trans('app.main_menu'),
                'input_items' => [
                    [
                        'element' => 'menu',
                        'title' => trans('app.main_menu'),
                        'name' => 'menu',
                    ],
                ]
            ]
        ]
    ],
    [
        'code' => 'home_page',
        'name' => trans('app.home_page'),
        'cards' => [
            [
                'code' => 'slider',
                'name' => trans('app.slider'),
                'status' => true,
                'input_items' => [
                    [
                        'element' => 'slider',
                        'title' => trans('app.slider'),
                        'name' => 'slider'
                    ]
                ]
            ],
            [
                'code' => 'slider_movies',
                'name' => trans('app.slider') . ' ' . trans('app.movies'),
                'status' => true,
                'input_items' => [
                
                ]
            ],
            [
                'code' => 'category1',
                'status' => true,
                'name' => trans('app.movie_list') . ' 1',
                'input_items' => [
                    [
                        'element' => 'category',
                        'title' => trans('app.movie_list'),
                        'name' => 'category',
                    ]
                ]
            ],
        ]
    ],
    [
        'code' => 'footer',
        'name' => trans('app.footer'),
        'cards' => [
            [
                'code' => 'column1',
                'name' => trans('app.column') . ' 1',
                'input_items' => [
                    [
                        'element' => 'media',
                        'title' => trans('app.logo'),
                        'type' => 'text',
                        'name' => 'logo',
                    ],
                    [
                        'element' => 'textarea',
                        'title' => trans('app.description'),
                        'name' => 'description',
                    ],
                    [
                        'element' => 'slider',
                        'title' => trans('app.slider_payment_method'),
                        'name' => 'payment_methods',
                    ]
                ]
            ],
            [
                'code' => 'column2',
                'name' => trans('app.column') . ' 2',
                'input_items' => [
                    [
                        'element' => 'input',
                        'title' => trans('app.title'),
                        'type' => 'text',
                        'name' => 'title',
                    ],
                    [
                        'element' => 'menu',
                        'title' => trans('app.menu'),
                        'name' => 'menu',
                    ]
                ]
            ],
            [
                'code' => 'column3',
                'name' => trans('app.column') . ' 3',
                'input_items' => [
                    [
                        'element' => 'input',
                        'title' => trans('app.title'),
                        'type' => 'text',
                        'name' => 'title',
                    ],
                    [
                        'element' => 'menu',
                        'title' => trans('app.menu'),
                        'name' => 'menu',
                    ]
                ]
            ],
            [
                'code' => 'column4',
                'name' => trans('app.column') . ' 4',
                'input_items' => [
                    [
                        'element' => 'input',
                        'title' => trans('app.title'),
                        'type' => 'text',
                        'name' => 'title',
                    ],
                    [
                        'element' => 'menu',
                        'title' => trans('app.menu'),
                        'name' => 'menu',
                    ]
                ]
            ]
        ]
    ],
];