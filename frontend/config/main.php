<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'en-EN',
    'defaultRoute' => 'category/index',
    'modules' => [
    'admin' => [
        'class' => 'frontend\modules\admin\Module',
        'layout' => 'admin',
        'defaultRoute' => 'order/index',
    ],
],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'cookieValidationKey' => 'IfATBH33SVvRo8AAfbzznPs0qI5mBEFW',
            'baseUrl'=> '',
            'csrfParam' => '_csrf-frontend',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'frontend\models\User',
            'enableAutoLogin' => true,
//            'loginUrl' => 'cart',
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
//            'transport' => [
//                'class' => 'Swift_SmtpTransport',
//                'host' => 'smtp.gmail.com',
//                'username' => 'mihaivirlan93@gmail.com',
//                'password' => 'fotbal93',
//                'port' => '587',
//                'encryption' => 'ssl'
//            ],
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'category/<id:\d+>/page/<page:\d+>' => 'category/view/',
                'category/<id:\d+>' => 'category/view/',
                'product/<id:\d+>' => 'product/view/',
                'search' => 'category/search',
            ],
        ],
    ],
    'params' => $params,
];
