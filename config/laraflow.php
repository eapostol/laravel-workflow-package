<?php

return [
    /*
    |--------------------------------------------------------------------------
    | State machine configuration
    |--------------------------------------------------------------------------
    |
    | This array is the default state machine configuration. The value is used
    | when the Eloquent object which responsible for the state machine try
    | to save the required configuration, but the user didn't add that.
    |
    */

    'default' => [
        'property_path' => 'status',
        'steps' => [
            [
                'text' => 'Open',
                'extra' => [
                    'color' => 'primary',
                    'category' => 'primary',
                    'loc' => '-72.8125 139'
                ]
            ],
            [
                'text' => 'In Progress',
                'extra' => [
                    'color' => 'success',
                    'category' => 'warning',
                    'loc' => '-74.8125 452'
                ]
            ],
            [
                'text' => 'Resolved',
                'extra' => [
                    'color' => 'success',
                    'category' => 'success',
                    'loc' => '280.1875 140'
                ]
            ],
            [
                'text' => 'Reopen',
                'extra' => [
                    'color' => 'primary',
                    'category' => 'primary',
                    'loc' => '433.1875 535'
                ]
            ],
            [
                'text' => 'Closed',
                'extra' => [
                    'color' => 'success',
                    'category' => 'success',
                    'loc' => '54.1875 299',
                ]
            ]
        ],
        'transitions' => [
            [
                'from' =>  0,
                'to' => 1,
                'text' => 'Start Progress',
                'extra' => [
                    'fromPort' => 'B',
                    'toPort' => 'T',
                    'points' => [],
                ],
                'callbacks' => [
                    'pre' => [],
                    'post' => []
                ],
                'validators' => []
            ],
            [
                'from' => 1,
                'to' => 0,
                'text' => 'Stop Progress',
                'extra' => [
                    'fromPort' => 'L',
                    'toPort' => 'L',
                    'points' => []
                ],
                'callbacks' => [
                    'pre' => [],
                    'post' => []
                ],
                'validators' => []
            ],
            [
                'from' => 1,
                'to' =>  2,
                'text' => 'Resolve Issue',
                'extra' => [
                    'fromPort' => 'R',
                    'toPort' => 'L',
                    'points' => []
                ],
                'callbacks' => [
                    'pre' => [],
                    'post' => []
                ],
                'validators' => []
            ],
            [
                'from' => 2,
                'to' =>  3,
                'text' => 'Reopen Issue',
                'extra' => [
                    'fromPort' => 'B',
                    'toPort' => 'T',
                    'points' => []
                ],
                'callbacks' => [
                    'pre' => [],
                    'post' => []
                ],
                'validators' => []
            ],
            [
                'from' => 3,
                'to' =>  2,
                'text' => 'Resolve Issue',
                'extra' => [
                    'fromPort' => 'R',
                    'toPort' => 'R',
                    'points' => []
                ],
                'callbacks' => [
                    'pre' => [],
                    'post' => []
                ],
                'validators' => []
            ],
            [
                'from' => 1,
                'to' =>  4,
                'text' => 'Close Issue',
                'extra' => [
                    'fromPort' => 'R',
                    'toPort' => 'L',
                    'points' => []
                ],
                'callbacks' => [
                    'pre' => [],
                    'post' => []
                ],
                'validators' => []
            ],
            [
                'from' => 3,
                'to' =>  4,
                'text' => 'Close Issue',
                'extra' => [
                    'fromPort' => 'R',
                    'toPort' => 'L',
                    'points' => []
                ],
                'callbacks' => [
                    'pre' => [],
                    'post' => []
                ],
                'validators' => []
            ],

        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Laraflow validators
    |--------------------------------------------------------------------------
    |
    | This array is the list of the default validators. You can add these
    | to your state machine if you want to check one/more attribute(s)
    | before the status change. You can use ony Laravel validators.
    |
    */
    'custom_validators' => [
        'TestValidator' => [
            'name' => 'Field must be a valid timezone',
            'description' => 'The field under validation must be a valid timezone identifier according to the  timezone_identifiers_list PHP function.',
            'validator' => 'App\Validators\TestValidator',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Laraflow callbacks
    |--------------------------------------------------------------------------
    |
    | This array is the list of the post and pre function which can be assigned
    | to the transitions. Every callback has to be an array and each one of
    | them has three manadatory attributes. Name, description, class.
    |
    */
    'callbacks' => [
        // [
        //     'name' => 'Notify Users',
        //     'description' => 'Send an update email about the issue, when a user changed the status',
        //     'class' => 'App\\LaraflowCallbacks\\NotifyUsers'
        // ],
        // [
        //     'name' => 'Assign to Current User',
        //     'description' => 'Assign the issue to the current user',
        //     'class' => 'App\\LaraflowCallbacks\\AssignToCurrentUser'
        // ]
    ]
];
