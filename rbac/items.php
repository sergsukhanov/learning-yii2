<?php
return [
    'updateMonster' => [
        'type' => 2,
        'description' => 'Update a monster',
        'ruleName' => 'ownsProfile',
    ],
    'deleteMonster' => [
        'type' => 2,
        'description' => 'Delete a monster',
    ],
    'member' => [
        'type' => 1,
        'children' => [
            'updateMonster',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'deleteMonster',
            'member',
        ],
    ],
];
