<?php

use yii\web\UrlNormalizer;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        // 'mailer' => [
        //     'class' => 'yii\swiftmailer\Mailer',
        //     'useFileTransport' => false,
            // 'enableSwiftMailerLogging' => true,
            // 'transport' => [
            //     'class' => 'Swift_SmtpTransport',
            //     'host' => 'smtp.mail.ru', // SMTP сервер почтовика
            //     'username' => 'mistern070696@mail.ru', // Логин (адрес электронной почты)
            //     'password' => 'oaqcmdxeloqggyvz', // Пароль oaqcmdxeloqggyvz
            //     'port' => '465', // Порт
            //     'encryption' => 'ssl', // Шифрование,
            //     // 'streamOptions' => [
            //     //     'ssl' => [
            //     //       'allow_self_signed' => true,
            //     //       'verify_peer' => false,
            //     //       'verify_peer_name' => false,
            //     //     ]
            //     // ],
                
            // ],
        // ],
        // here you can set theme used for your frontend application 
        // - template comes with: 'default', 'slate', 'spacelab' and 'cerulean'
        'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@webroot/themes/default/views'],
                'baseUrl' => '@web/themes/default',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\UserIdentity',
            'enableAutoLogin' => true,
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
        'languageId' => [
            'class'=>'common\components\LanguageId'
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class'=>'common\components\LangUrlManager',
            'rules' => require ('urlRules.php')
        ],
        'request' => [
            'class' => 'common\components\LangRequest'
        ],
    ],
    'params' => $params,
];
