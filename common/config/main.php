<?php

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db'            => [
            'class'       => 'yii\db\Connection',
            'dsn'         => 'mysql:host=localhost;dbname=gooffer',
            'username'    => 'root',
            'password'    => '111111',
            'charset'     => 'utf8',
            'tablePrefix' => 'go_'
        ],
        'cache'         => [
            'class' => 'yii\caching\FileCache',
        ],
        'session'=>[
            'class'=>'yii\web\Session',
            'savePath' => '@runtime/session'
        ],
        'RedisCache'    => [
            'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => '',
                'port'     => '',
                'database' => '',
            ]
        ],
        'Mcache'        => [
            'class'   => 'yii\caching\MemCache',
            'servers' => [
                [
                    'host'   => 'server1',
                    'port'   => 11211,
                    'weight' => 60,
                ],
                [
                    'host'   => 'server2',
                    'port'   => 11211,
                    'weight' => 40,
                ],
            ],
        ],
        'view'          => [
            'class'            => 'yii\web\View',
            'defaultExtension' => 'tpl',
            'renderers'        => [
                'tpl'  => [
                    'class'       => 'yii\smarty\ViewRenderer',
                    'cachePath'   => '@runtime/Smarty/cache',
                    'compilePath' => '@runtime/Smarty/compile'
                ],
                'twig' => [
                    'class'     => 'yii\twig\ViewRenderer',
                    'cachePath' => '@runtime/Twig/cache',
                    // Array of twig options:
                    'options'   => [
                        'auto_reload' => true,
                    ],
                    'globals'   => [
                        'html' => ['class' => '\yii\helpers\Html'],
                    ],
                    'uses'      => ['yii\bootstrap'],
                ],
            ],
            'theme'            => [
                'class'    => 'yii\base\Theme',
                'pathMap'  => [
                    '@app/views' => [
                        '@app/themes/basic',
                        '@app/themes/spring',
                    ]
                ],
                'basePath' => '@web/themes/basic',
                'baseUrl'  => '@web/themes/basic',
            ]

        ],
        'redis'         => [
            'class'    => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port'     => 6379,
            'database' => 0,
        ],
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'nodes' => [
                ['http_address' => '127.0.0.1:9200'],
                // configure more hosts if you have a cluster
            ],
        ],
        'mongodb'       => [
            'class' => '\yii\mongodb\Connection',
            'dsn'   => 'mongodb://developer:password@localhost:27017/mydatabase',
        ],
        'sphinx'        => [
            'class'    => 'yii\sphinx\Connection',
            'dsn'      => 'mysql:host=127.0.0.1;port=9306;',
            'username' => '',
            'password' => '',
        ],
        'request'       => [
        ],
        'log'           => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'          => 'common\extend\FileTarget',
                    'levels'         => ['error', 'warning'],
                    'exportInterval' => 1,
                    'maxFileSize'    => 1024 * 15,  //设置文件大小，以k为单位
                    'logFile'        => '@runtime/logs/app.log', //文件名 命名方式
                    'logVars'        => ['_GET', '_POST', '_FILES', '_COOKIE', '_SESSION', '_SERVER'],
                ],
                [
                    'class'   => 'common\extend\EmailTarget',
                    'mailer'  => 'mailer',
                    'levels'  => ['error', 'warning'],
                    'message' => [
                        'to'      => ['290559038@qq.com'],
                        'subject' => 'Error日志',
                    ],
                ],
            ],
        ],

    ],
];

