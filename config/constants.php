<?php
/**
 * Created by PhpStorm.
 * User: Siahaan
 * Date: 14/04/2018
 * Time: 9:51
 */
return [
    //1. database tables
    'tables' => [
        'hunter' => [
            'name' => 'hunters',
            'primary_key' => 'hunter_id',
        ],
        'client' => [
            'name' => 'clients',
            'primary_key' => 'client_id',
        ],
        'bounty' => [
            'header' => [
                'name' => 'header_bounties',
                'primary_key' => 'bounty_id',
            ],
            'submission' => [
                'name' => 'submissions',
                'primary_key' => 'submission_id',
            ],
            'category' => [
                'name' => 'bounty_categories',
                'primary_key' => 'category_id',
            ]
        ],
    ],
    //2. constant parameter
    'rewards' => [
        'unpaid' => 0,
        'payment' => 1,
    ],
    'verification' => [
        'unverified' => 0,
        'verified' => 1,
    ],
    'status' => [
        'program' => [
            'closed' => 0,
            'open' => 1,
        ],
        'disclosure' => [
            'allowed' => 0,
            'denied' => 1,
        ],
        'submission' => [
            'declined' => 0,
            'pending' => 1,
            'approved' => 2,
        ],
    ],
    //3. program category
    'category' => [
        'SI' => [
            'alias' => 'Server Integrity',
            'route_name' => 'explore_server',
        ],
        'WS' => [
            'alias' => 'Web Application',
            'route_name' => 'explore_web',
        ],
        'AS' => [
            'alias' => 'Android Application',
            'route_name' => 'explore_android',
        ],
        'iOS' => [
            'alias' => 'iOS Application',
            'route_name' => 'explore_ios',
        ],
        'NS' => [
            'alias' => 'Network Security',
            'route_name' => 'explore_network',
        ],
    ],
];