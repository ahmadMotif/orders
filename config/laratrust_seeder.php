<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'arbitrator' => [
            'profile' => 'r,u'
        ],
        'language_checker' => [
            'profile' => 'r,u'
        ],
        'technical_producer' => [
            'profile' => 'r,u'
        ],
        'finance' => [
            'profile' => 'r,u'
        ],
        'print' => [
            'profile' => 'r,u'
        ],
        'writer' => [
            'profile' => 'r,u'
        ],
        'translator' => [
            'profile' => 'r,u'
        ],
        'user' => [
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
