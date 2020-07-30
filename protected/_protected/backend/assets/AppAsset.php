<?php
/**
 * -----------------------------------------------------------------------------
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * -----------------------------------------------------------------------------
 */

namespace backend\assets;

use yii\web\AssetBundle;
use Yii;
use yii\web\AssetManager;

// set @themes alias so we do not have to update baseUrl every time we change themes
Yii::setAlias('@themes', Yii::$app->view->theme->baseUrl);

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 *
 * @since 2.0
 *
 * Customized by Nenad Živković
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@themes';

    public $css = [
        "css/bootstrap.min.css",
        "css/site.css",
//        '/themes/default/css/style.css',

      "fonts/css/font-awesome.min.css",
      "css/animate.min.css",

      "css/custom.css",
      "css/maps/jquery-jvectormap-2.0.3.css",
      "css/icheck/flat/green.css",
      "css/floatexamples.css",

    ];
    public $js = [
        "js/bootstrap.min.js",
        "js/nprogress.js",
        "js/progressbar/bootstrap-progressbar.min.js",
        "js/nicescroll/jquery.nicescroll.min.js",
        "js/icheck/icheck.min.js",
        "js/moment/moment.min.js",
        "js/datepicker/daterangepicker.js",
        "js/chartjs/chart.min.js",
        "js/maps/jquery-jvectormap-2.0.3.min.js",
        "js/maps/gdp-data.js",
        "js/maps/jquery-jvectormap-world-mill-en.js",
        "js/maps/jquery-jvectormap-us-aea-en.js",
        "js/pace/pace.min.js",
        "js/skycons/skycons.min.js",
        "js/flot/jquery.flot.js",
        "js/flot/jquery.flot.pie.js",
        "js/flot/jquery.flot.orderBars.js",
        "js/flot/jquery.flot.time.min.js",
        "js/flot/date.js",
        "js/flot/jquery.flot.spline.js",
        "js/flot/jquery.flot.stack.js",
        "js/flot/curvedLines.js",
        "js/custom.js",

    ];
    
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
