<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
'modules' => [
    'admin' => [
        'class' => 'mdm\admin\Module',
    ]
],
'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
        ]
    ],
'components' => [

    'authManager' => [
        'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
    ],

    'user' => [

        'identityClass' => 'mdm\admin\models\User',
        'loginUrl' => ['admin/user/login'],
    ]
],
];

