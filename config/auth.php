<?php

return [

    'guards' => [
        'member' => [
            'driver' => 'session',
            'provider' => 'members',
        ],
        'customer' => [
            'driver' => 'session',
            'provider' => 'customers',
        ],
    ],

    'providers' => [
        'members' => [
            'driver' => 'eloquent',
            'model' => Nemooon\Glitter\Member::class,
        ],
        'customers' => [
            'driver' => 'eloquent',
            'model' => Nemooon\Glitter\Customer::class,
        ],
    ],

    'passwords' => [
        'member' => [
            'provider' => 'members',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'customer' => [
            'provider' => 'customers',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
