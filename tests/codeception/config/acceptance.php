<?php
/**
 * Application configuration for acceptance tests
 */
return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../../config/web.php'),
    require(__DIR__ . '/config.php'),
    [
        'components' => [
            'db' => [
                'dsn' => 'mysql:host=127.0.0.1;dbname=monstermash_test',
            ]
        ]
    ]
);
