<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 18.05.2017
 * Time: 0:55
 */

return [
    '/' => 'site/index',
    'contact' => 'site/contact',
    'loading' => 'site/loading',

    'search' => 'search/result',

    'site/<action:\w+>' => 'site/<action>',


    // 'result/<text:\d+>'=>'search/result',
    // '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    // '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    // '<controller:\w+>/<action:\w+>/<id:[0-9a-zA-Z\-]+>' => '<controller>/<action>',
    // 'company/<id:[0-9a-zA-Z\-]+>' => 'company/view',
    // '<controller:\w+>/<id:[0-9a-zA-Z\-]+>' => '<controller>/view',
    // '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

    // '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',

    'blog' => 'blog/index',
    'blog/<id:[0-9a-zA-Z\-]+>' => 'blog/view',

    'company' => 'company/index',
    'company/foreign' => 'company/foreign',
    'company/local' => 'company/local',
    'company/<type:\w+>/<id:[0-9a-zA-Z\-]+>' => 'company/view',

    '<category:[0-9a-zA-Z\-]+>/<sub_category:[0-9a-zA-Z\-]+>/<id:[0-9a-zA-Z\-]+>' => 'product/view',
    'products' => 'product/index',

    'services' => 'service/index',
    'services/<id:[0-9a-zA-Z\-]+>' => 'service/view',

    'blogs' => 'blog/index',
    'blogs/<id:[0-9a-zA-Z\-]+>' => 'blog/view',
    
    'about' => 'site/about',

    '<category:[0-9a-zA-Z\-]+>/<id:[0-9a-zA-Z\-]+>' => 'category/sub-category',
    '<id:[0-9a-zA-Z\-]+>' => 'category/index',

    // 'category/<id:[0-9a-zA-Z\-]+>' => 'category/index',
    // '<category:[a-z0-9\-_\.]+>/<subcategory:[a-z0-9\-_\.]+>/<product:[a-z0-9\-_\.]+>' => 'product/view',
    // '<controller:\w+>/<id:\d+>' => '<controller>/view',
    // '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    // '<controller:\w+>/<id:[0-9a-zA-Z\-]+>' => 'company/<action>',
    // '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
];