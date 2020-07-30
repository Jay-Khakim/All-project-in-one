<?php
/**
 * -----------------------------------------------------------------------------
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * -----------------------------------------------------------------------------
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use Yii;

// set @themes alias so we do not have to update baseUrl every time we change themes
Yii::setAlias('@themes', Yii::$app->view->theme->baseUrl);

/**
 * -----------------------------------------------------------------------------
 * @author Qiang Xue <qiang.xue@gmail.com>
 *
 * @since 2.0
 * -----------------------------------------------------------------------------
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@themes';
    
    public $css = [
        "css/all.css",
        "css/font-awesome.min.css",
        "css/flag-icon.min.css",
        "css/bootstrap.min.css",
        "css/mdb.min.css",
        "css/css/owl.carousel.min.css",
        "css/css/owl.theme.default.min.css",
        "css/style.css",
        "css/category-index.css",
        "css/response.css",
        "css/response2.css",
        // "css/app.css"
    ];
    public $js = [
        "js/jquery-3.4.1.min.js",
        "js/popper.min.js",
        "js/bootstrap.min.js",
        "js/mdb.min.js",
        "js/owl.carousel.min.js",
        "js/main.js",
        // "js/app.js"
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

