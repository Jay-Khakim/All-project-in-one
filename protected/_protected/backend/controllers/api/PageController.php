<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "PageController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PageController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Page';
}
