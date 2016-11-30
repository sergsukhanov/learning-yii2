<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'sourceLanguage' => 'en-US',
    'language' => 'de',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '5MkTQ6a35_PnyIZBJN7ieGKPfwE-q6P7',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Monster',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'security' => [
            'passwordHashStrategy' => 'password_hash'
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
            /*'transport' => [
              'class' => 'Swift_SmtpTransport',
              'host' => 'localhost',
              'username' => 'username',
              'password' => 'password',
              'port' => '587',
              'encryption' => 'tls',
            ],*/
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/register' => 'monster/create',
                '/profile/<id:[\d-]+>' => '/monster/view'
            ]
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager'
        ],
        'view' => [
            'class' => 'app\components\View',
            /*'theme' => [
                'pathMap' => [
                    '@app/views' => [
                        '@app/themes/feminine'
                    ]
                ]
            ]*/
        ],
        /*'assetManager' => [
          'bundles' => [
              'app\assets\AppAsset' => [
                  'css' => ['css/feminine.css']
              ]
          ]
        ],*/
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'monster' => 'monster.php',
                    ],
                ]
            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1'],
        'panels' => [
            'monsters' => ['class' => 'app\panels\MonsterPanel']
        ]
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1']
    ];
}

return $config;
